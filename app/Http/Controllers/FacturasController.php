<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreFacturasRequest;
use App\Http\Requests\UpdateFacturasRequest;

class FacturasController extends Controller
{
    /**
     * Display a listing of Factura.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('factura_access')) {
            return abort(401);
        }
        $facturas = Factura::all();

        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating new Factura.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('factura_create')) {
            return abort(401);
        }
        $relations = [
            'vendedors' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'clientes' => \App\Cliente::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('facturas.create', $relations);
    }

    /**
     * Store a newly created Factura in storage.
     *
     * @param  \App\Http\Requests\StoreFacturasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacturasRequest $request)
    {
        if (! Gate::allows('factura_create')) {
            return abort(401);
        }
        $factura = Factura::create($request->all());

        return redirect()->route('facturas.index');
    }


    /**
     * Show the form for editing Factura.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('factura_edit')) {
            return abort(401);
        }
        $relations = [
            'vendedors' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'clientes' => \App\Cliente::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $factura = Factura::findOrFail($id);

        return view('facturas.edit', compact('factura') + $relations);
    }

    /**
     * Update Factura in storage.
     *
     * @param  \App\Http\Requests\UpdateFacturasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacturasRequest $request, $id)
    {
        if (! Gate::allows('factura_edit')) {
            return abort(401);
        }
        $factura = Factura::findOrFail($id);
        $factura->update($request->all());

        return redirect()->route('facturas.index');
    }


    /**
     * Display Factura.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('factura_view')) {
            return abort(401);
        }
        $relations = [
            'vendedors' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'clientes' => \App\Cliente::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $factura = Factura::findOrFail($id);

        return view('facturas.show', compact('factura') + $relations);
    }


    /**
     * Remove Factura from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('factura_delete')) {
            return abort(401);
        }
        $factura = Factura::findOrFail($id);
        $factura->delete();

        return redirect()->route('facturas.index');
    }

    /**
     * Delete all selected Factura at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('factura_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Factura::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
