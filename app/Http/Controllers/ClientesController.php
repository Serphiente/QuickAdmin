<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClientesRequest;

class ClientesController extends Controller
{
    /**
     * Display a listing of Cliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cliente_access')) {
            return abort(401);
        }
        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating new Cliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cliente_create')) {
            return abort(401);
        }
        $relations = [
            'comunas' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Necesario seleccionar', ''),
        ];

        return view('clientes.create', $relations);
    }

    /**
     * Show the form for creating new Cliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($idoc)
    {
        if (! Gate::allows('cliente_create')) {
            return abort(401);
        }
        $ticket="0E1DFD13-C558-47B7-9E29-A07D8632FCC0";
        $consulta="http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json?codigo=".$idoc."&ticket=".$ticket;
         $ocs = file_get_contents($consulta);
         $json = json_decode($ocs, true);
        
        $relations = [
            'comunas' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Necesario seleccionar', ''),
            'json' => $json,
        ];

        return view('clientes.crear', $relations);
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param  \App\Http\Requests\StoreClientesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientesRequest $request)
    {
        if (! Gate::allows('cliente_create')) {
            return abort(401);
        }
        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index');
    }


    /**
     * Show the form for editing Cliente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cliente_edit')) {
            return abort(401);
        }
        $relations = [
            'comunas' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Necesario seleccionar', ''),
        ];

        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente') + $relations);
    }

    /**
     * Update Cliente in storage.
     *
     * @param  \App\Http\Requests\UpdateClientesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientesRequest $request, $id)
    {
        if (! Gate::allows('cliente_edit')) {
            return abort(401);
        }
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }


    /**
     * Display Cliente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cliente_view')) {
            return abort(401);
        }
        $relations = [
            'comunas' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Necesario seleccionar', ''),
            'facturas' => \App\Factura::where('cliente_id', $id)->get(),
            'contacto_clientes' => \App\ContactoCliente::where('cliente_id', $id)->get(),
        ];

        $cliente = Cliente::findOrFail($id);

        return view('clientes.show', compact('cliente') + $relations);
    }


    /**
     * Remove Cliente from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cliente_delete')) {
            return abort(401);
        }
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index');
    }

    /**
     * Delete all selected Cliente at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cliente_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Cliente::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
