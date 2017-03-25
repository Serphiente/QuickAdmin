<?php

namespace App\Http\Controllers;

use App\Recepcionmercaderium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreRecepcionmercaderiasRequest;
use App\Http\Requests\UpdateRecepcionmercaderiasRequest;

class RecepcionmercaderiasController extends Controller
{
    /**
     * Display a listing of Recepcionmercaderium.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('recepcionmercaderium_access')) {
            return abort(401);
        }
        $recepcionmercaderias = Recepcionmercaderium::all();

        return view('recepcionmercaderias.index', compact('recepcionmercaderias'));
    }

    /**
     * Show the form for creating new Recepcionmercaderium.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('recepcionmercaderium_create')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedoroc::get()->pluck('folio', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('recepcionmercaderias.create', $relations);
    }

    /**
     * Store a newly created Recepcionmercaderium in storage.
     *
     * @param  \App\Http\Requests\StoreRecepcionmercaderiasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecepcionmercaderiasRequest $request)
    {
        if (! Gate::allows('recepcionmercaderium_create')) {
            return abort(401);
        }
        $recepcionmercaderium = Recepcionmercaderium::create($request->all());

        return redirect()->route('recepcionmercaderias.index');
    }


    /**
     * Show the form for editing Recepcionmercaderium.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('recepcionmercaderium_edit')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedoroc::get()->pluck('folio', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $recepcionmercaderium = Recepcionmercaderium::findOrFail($id);

        return view('recepcionmercaderias.edit', compact('recepcionmercaderium') + $relations);
    }

    /**
     * Update Recepcionmercaderium in storage.
     *
     * @param  \App\Http\Requests\UpdateRecepcionmercaderiasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecepcionmercaderiasRequest $request, $id)
    {
        if (! Gate::allows('recepcionmercaderium_edit')) {
            return abort(401);
        }
        $recepcionmercaderium = Recepcionmercaderium::findOrFail($id);
        $recepcionmercaderium->update($request->all());

        return redirect()->route('recepcionmercaderias.index');
    }


    /**
     * Display Recepcionmercaderium.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('recepcionmercaderium_view')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedoroc::get()->pluck('folio', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $recepcionmercaderium = Recepcionmercaderium::findOrFail($id);

        return view('recepcionmercaderias.show', compact('recepcionmercaderium') + $relations);
    }


    /**
     * Remove Recepcionmercaderium from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('recepcionmercaderium_delete')) {
            return abort(401);
        }
        $recepcionmercaderium = Recepcionmercaderium::findOrFail($id);
        $recepcionmercaderium->delete();

        return redirect()->route('recepcionmercaderias.index');
    }

    /**
     * Delete all selected Recepcionmercaderium at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('recepcionmercaderium_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Recepcionmercaderium::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
