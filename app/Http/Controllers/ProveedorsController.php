<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProveedorsRequest;
use App\Http\Requests\UpdateProveedorsRequest;

class ProveedorsController extends Controller
{
    /**
     * Display a listing of Proveedor.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('proveedor_access')) {
            return abort(401);
        }
        $proveedors = Proveedor::all();

        return view('proveedors.index', compact('proveedors'));
    }

    /**
     * Show the form for creating new Proveedor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('proveedor_create')) {
            return abort(401);
        }
        $relations = [
            'comunas' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('proveedors.create', $relations);
    }

    /**
     * Store a newly created Proveedor in storage.
     *
     * @param  \App\Http\Requests\StoreProveedorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorsRequest $request)
    {
        if (! Gate::allows('proveedor_create')) {
            return abort(401);
        }
        $proveedor = Proveedor::create($request->all());

        return redirect()->route('proveedors.index');
    }


    /**
     * Show the form for editing Proveedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('proveedor_edit')) {
            return abort(401);
        }
        $relations = [
            'comunas' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $proveedor = Proveedor::findOrFail($id);

        return view('proveedors.edit', compact('proveedor') + $relations);
    }

    /**
     * Update Proveedor in storage.
     *
     * @param  \App\Http\Requests\UpdateProveedorsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorsRequest $request, $id)
    {
        if (! Gate::allows('proveedor_edit')) {
            return abort(401);
        }
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedors.index');
    }


    /**
     * Display Proveedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('proveedor_view')) {
            return abort(401);
        }
        $relations = [
            'comunas' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'proveedorocs' => \App\Proveedoroc::where('proveedor_id', $id)->get(),
            'contacto_proveedors' => \App\ContactoProveedor::where('proveedor_id', $id)->get(),
        ];

        $proveedor = Proveedor::findOrFail($id);

        return view('proveedors.show', compact('proveedor') + $relations);
    }


    /**
     * Remove Proveedor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('proveedor_delete')) {
            return abort(401);
        }
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedors.index');
    }

    /**
     * Delete all selected Proveedor at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('proveedor_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Proveedor::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
