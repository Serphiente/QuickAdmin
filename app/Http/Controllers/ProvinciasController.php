<?php

namespace App\Http\Controllers;

use App\Provincium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProvinciasRequest;
use App\Http\Requests\UpdateProvinciasRequest;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of Provincium.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('provincium_access')) {
            return abort(401);
        }
        $provincias = Provincium::all();

        return view('provincias.index', compact('provincias'));
    }

    /**
     * Show the form for creating new Provincium.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('provincium_create')) {
            return abort(401);
        }
        $relations = [
            'regions' => \App\Region::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('provincias.create', $relations);
    }

    /**
     * Store a newly created Provincium in storage.
     *
     * @param  \App\Http\Requests\StoreProvinciasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvinciasRequest $request)
    {
        if (! Gate::allows('provincium_create')) {
            return abort(401);
        }
        $provincium = Provincium::create($request->all());

        return redirect()->route('provincias.index');
    }


    /**
     * Show the form for editing Provincium.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('provincium_edit')) {
            return abort(401);
        }
        $relations = [
            'regions' => \App\Region::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $provincium = Provincium::findOrFail($id);

        return view('provincias.edit', compact('provincium') + $relations);
    }

    /**
     * Update Provincium in storage.
     *
     * @param  \App\Http\Requests\UpdateProvinciasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvinciasRequest $request, $id)
    {
        if (! Gate::allows('provincium_edit')) {
            return abort(401);
        }
        $provincium = Provincium::findOrFail($id);
        $provincium->update($request->all());

        return redirect()->route('provincias.index');
    }


    /**
     * Display Provincium.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('provincium_view')) {
            return abort(401);
        }
        $relations = [
            'regions' => \App\Region::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'comunas' => \App\Comuna::where('provincia_id', $id)->get(),
        ];

        $provincium = Provincium::findOrFail($id);

        return view('provincias.show', compact('provincium') + $relations);
    }


    /**
     * Remove Provincium from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('provincium_delete')) {
            return abort(401);
        }
        $provincium = Provincium::findOrFail($id);
        $provincium->delete();

        return redirect()->route('provincias.index');
    }

    /**
     * Delete all selected Provincium at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('provincium_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Provincium::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
