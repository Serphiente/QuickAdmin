<?php

namespace App\Http\Controllers;

use App\ContactoCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreContactoClientesRequest;
use App\Http\Requests\UpdateContactoClientesRequest;

class ContactoClientesController extends Controller
{
    /**
     * Display a listing of ContactoCliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contacto_cliente_access')) {
            return abort(401);
        }
        $contacto_clientes = ContactoCliente::all();

        return view('contacto_clientes.index', compact('contacto_clientes'));
    }

    /**
     * Show the form for creating new ContactoCliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('contacto_cliente_create')) {
            return abort(401);
        }
        $relations = [
            'clientes' => \App\Cliente::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('contacto_clientes.create', $relations);
    }

    /**
     * Store a newly created ContactoCliente in storage.
     *
     * @param  \App\Http\Requests\StoreContactoClientesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactoClientesRequest $request)
    {
        if (! Gate::allows('contacto_cliente_create')) {
            return abort(401);
        }
        $contacto_cliente = ContactoCliente::create($request->all());

        return redirect()->route('contacto_clientes.index');
    }


    /**
     * Show the form for editing ContactoCliente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contacto_cliente_edit')) {
            return abort(401);
        }
        $relations = [
            'clientes' => \App\Cliente::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $contacto_cliente = ContactoCliente::findOrFail($id);

        return view('contacto_clientes.edit', compact('contacto_cliente') + $relations);
    }

    /**
     * Update ContactoCliente in storage.
     *
     * @param  \App\Http\Requests\UpdateContactoClientesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactoClientesRequest $request, $id)
    {
        if (! Gate::allows('contacto_cliente_edit')) {
            return abort(401);
        }
        $contacto_cliente = ContactoCliente::findOrFail($id);
        $contacto_cliente->update($request->all());

        return redirect()->route('contacto_clientes.index');
    }


    /**
     * Display ContactoCliente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('contacto_cliente_view')) {
            return abort(401);
        }
        $relations = [
            'clientes' => \App\Cliente::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $contacto_cliente = ContactoCliente::findOrFail($id);

        return view('contacto_clientes.show', compact('contacto_cliente') + $relations);
    }


    /**
     * Remove ContactoCliente from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('contacto_cliente_delete')) {
            return abort(401);
        }
        $contacto_cliente = ContactoCliente::findOrFail($id);
        $contacto_cliente->delete();

        return redirect()->route('contacto_clientes.index');
    }

    /**
     * Delete all selected ContactoCliente at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('contacto_cliente_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ContactoCliente::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
