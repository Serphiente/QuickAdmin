<?php

namespace App\Http\Controllers;

use App\PresentacionFarmacologica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePresentacionFarmacologicasRequest;
use App\Http\Requests\UpdatePresentacionFarmacologicasRequest;

class PresentacionFarmacologicasController extends Controller
{
    /**
     * Display a listing of PresentacionFarmacologica.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('presentacion_farmacologica_access')) {
            return abort(401);
        }
        $presentacion_farmacologicas = PresentacionFarmacologica::all();

        return view('presentacion_farmacologicas.index', compact('presentacion_farmacologicas'));
    }

    /**
     * Show the form for creating new PresentacionFarmacologica.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('presentacion_farmacologica_create')) {
            return abort(401);
        }
        return view('presentacion_farmacologicas.create');
    }

    /**
     * Store a newly created PresentacionFarmacologica in storage.
     *
     * @param  \App\Http\Requests\StorePresentacionFarmacologicasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresentacionFarmacologicasRequest $request)
    {
        if (! Gate::allows('presentacion_farmacologica_create')) {
            return abort(401);
        }
        $presentacion_farmacologica = PresentacionFarmacologica::create($request->all());

        return redirect()->route('presentacion_farmacologicas.index');
    }


    /**
     * Show the form for editing PresentacionFarmacologica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('presentacion_farmacologica_edit')) {
            return abort(401);
        }
        $presentacion_farmacologica = PresentacionFarmacologica::findOrFail($id);

        return view('presentacion_farmacologicas.edit', compact('presentacion_farmacologica'));
    }

    /**
     * Update PresentacionFarmacologica in storage.
     *
     * @param  \App\Http\Requests\UpdatePresentacionFarmacologicasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresentacionFarmacologicasRequest $request, $id)
    {
        if (! Gate::allows('presentacion_farmacologica_edit')) {
            return abort(401);
        }
        $presentacion_farmacologica = PresentacionFarmacologica::findOrFail($id);
        $presentacion_farmacologica->update($request->all());

        return redirect()->route('presentacion_farmacologicas.index');
    }


    /**
     * Display PresentacionFarmacologica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('presentacion_farmacologica_view')) {
            return abort(401);
        }
        $relations = [
            'productos' => \App\Producto::where('presentacion_id', $id)->get(),
        ];

        $presentacion_farmacologica = PresentacionFarmacologica::findOrFail($id);

        return view('presentacion_farmacologicas.show', compact('presentacion_farmacologica') + $relations);
    }


    /**
     * Remove PresentacionFarmacologica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('presentacion_farmacologica_delete')) {
            return abort(401);
        }
        $presentacion_farmacologica = PresentacionFarmacologica::findOrFail($id);
        $presentacion_farmacologica->delete();

        return redirect()->route('presentacion_farmacologicas.index');
    }

    /**
     * Delete all selected PresentacionFarmacologica at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('presentacion_farmacologica_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PresentacionFarmacologica::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
