<?php

namespace App\Http\Controllers;

use App\Proveedoroc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProveedorocsRequest;
use App\Http\Requests\UpdateProveedorocsRequest;

class ProveedorocsController extends Controller
{
    /**
     * Display a listing of Proveedoroc.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('proveedoroc_access')) {
            return abort(401);
        }
        $proveedorocs = Proveedoroc::all();

        return view('proveedorocs.index', compact('proveedorocs'));
    }

    /**
     * Show the form for creating new Proveedoroc.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('proveedoroc_create')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedor::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('proveedorocs.create', $relations);
    }

    /**
     * Store a newly created Proveedoroc in storage.
     *
     * @param  \App\Http\Requests\StoreProveedorocsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorocsRequest $request)
    {
        if (! Gate::allows('proveedoroc_create')) {
            return abort(401);
        }
        $proveedoroc = Proveedoroc::create($request->all());

        return redirect()->route('proveedorocs.index');
    }


    /**
     * Show the form for editing Proveedoroc.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('proveedoroc_edit')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedor::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $proveedoroc = Proveedoroc::findOrFail($id);

        return view('proveedorocs.edit', compact('proveedoroc') + $relations);
    }

    /**
     * Update Proveedoroc in storage.
     *
     * @param  \App\Http\Requests\UpdateProveedorocsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorocsRequest $request, $id)
    {
        if (! Gate::allows('proveedoroc_edit')) {
            return abort(401);
        }
        $proveedoroc = Proveedoroc::findOrFail($id);
        $proveedoroc->update($request->all());

        return redirect()->route('proveedorocs.index');
    }


    /**
     * Display Proveedoroc.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('proveedoroc_view')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedor::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'itemsocs' => \App\Itemsoc::where('folio_id', $id)->get(),
            'recepcionmercaderia' => \App\Recepcionmercaderium::where('proveedor_id', $id)->get(),
        ];

        $proveedoroc = Proveedoroc::findOrFail($id);

        return view('proveedorocs.show', compact('proveedoroc') + $relations);
        //return $relations;
    }


    /**
     * Remove Proveedoroc from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('proveedoroc_delete')) {
            return abort(401);
        }
        $proveedoroc = Proveedoroc::findOrFail($id);
        $proveedoroc->delete();

        return redirect()->route('proveedorocs.index');
    }

    /**
     * Delete all selected Proveedoroc at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('proveedoroc_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Proveedoroc::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
