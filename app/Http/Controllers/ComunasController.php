<?php

namespace App\Http\Controllers;

use App\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreComunasRequest;
use App\Http\Requests\UpdateComunasRequest;

class ComunasController extends Controller
{
    /**
     * Display a listing of Comuna.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('comuna_access')) {
            return abort(401);
        }
        $comunas = Comuna::all();

        return view('comunas.index', compact('comunas'));
    }

    /**
     * Show the form for creating new Comuna.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('comuna_create')) {
            return abort(401);
        }
        $relations = [
            'provincias' => \App\Provincium::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('comunas.create', $relations);
    }

    /**
     * Store a newly created Comuna in storage.
     *
     * @param  \App\Http\Requests\StoreComunasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComunasRequest $request)
    {
        if (! Gate::allows('comuna_create')) {
            return abort(401);
        }
        $comuna = Comuna::create($request->all());

        return redirect()->route('comunas.index');
    }


    /**
     * Show the form for editing Comuna.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('comuna_edit')) {
            return abort(401);
        }
        $relations = [
            'provincias' => \App\Provincium::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $comuna = Comuna::findOrFail($id);

        return view('comunas.edit', compact('comuna') + $relations);
    }

    /**
     * Update Comuna in storage.
     *
     * @param  \App\Http\Requests\UpdateComunasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComunasRequest $request, $id)
    {
        if (! Gate::allows('comuna_edit')) {
            return abort(401);
        }
        $comuna = Comuna::findOrFail($id);
        $comuna->update($request->all());

        return redirect()->route('comunas.index');
    }


    /**
     * Display Comuna.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('comuna_view')) {
            return abort(401);
        }
        $relations = [
            'provincias' => \App\Provincium::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'laboratorios' => \App\Laboratorio::where('ciudad_id', $id)->get(),
            'clientes' => \App\Cliente::where('comuna_id', $id)->get(),
            'proveedors' => \App\Proveedor::where('comuna_id', $id)->get(),
        ];

        $comuna = Comuna::findOrFail($id);

        return view('comunas.show', compact('comuna') + $relations);
    }


    /**
     * Remove Comuna from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('comuna_delete')) {
            return abort(401);
        }
        $comuna = Comuna::findOrFail($id);
        $comuna->delete();

        return redirect()->route('comunas.index');
    }

    /**
     * Delete all selected Comuna at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('comuna_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Comuna::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
