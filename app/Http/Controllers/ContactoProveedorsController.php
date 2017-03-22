<?php

namespace App\Http\Controllers;

use App\ContactoProveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreContactoProveedorsRequest;
use App\Http\Requests\UpdateContactoProveedorsRequest;

class ContactoProveedorsController extends Controller
{
    /**
     * Display a listing of ContactoProveedor.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contacto_proveedor_access')) {
            return abort(401);
        }
        $contacto_proveedors = ContactoProveedor::all();

        return view('contacto_proveedors.index', compact('contacto_proveedors'));
    }

    /**
     * Show the form for creating new ContactoProveedor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('contacto_proveedor_create')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedor::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('contacto_proveedors.create', $relations);
    }

    /**
     * Store a newly created ContactoProveedor in storage.
     *
     * @param  \App\Http\Requests\StoreContactoProveedorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactoProveedorsRequest $request)
    {
        if (! Gate::allows('contacto_proveedor_create')) {
            return abort(401);
        }
        $contacto_proveedor = ContactoProveedor::create($request->all());

        return redirect()->route('contacto_proveedors.index');
    }


    /**
     * Show the form for editing ContactoProveedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contacto_proveedor_edit')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedor::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $contacto_proveedor = ContactoProveedor::findOrFail($id);

        return view('contacto_proveedors.edit', compact('contacto_proveedor') + $relations);
    }

    /**
     * Update ContactoProveedor in storage.
     *
     * @param  \App\Http\Requests\UpdateContactoProveedorsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactoProveedorsRequest $request, $id)
    {
        if (! Gate::allows('contacto_proveedor_edit')) {
            return abort(401);
        }
        $contacto_proveedor = ContactoProveedor::findOrFail($id);
        $contacto_proveedor->update($request->all());

        return redirect()->route('contacto_proveedors.index');
    }


    /**
     * Display ContactoProveedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('contacto_proveedor_view')) {
            return abort(401);
        }
        $relations = [
            'proveedors' => \App\Proveedor::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $contacto_proveedor = ContactoProveedor::findOrFail($id);

        return view('contacto_proveedors.show', compact('contacto_proveedor') + $relations);
    }


    /**
     * Remove ContactoProveedor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('contacto_proveedor_delete')) {
            return abort(401);
        }
        $contacto_proveedor = ContactoProveedor::findOrFail($id);
        $contacto_proveedor->delete();

        return redirect()->route('contacto_proveedors.index');
    }

    /**
     * Delete all selected ContactoProveedor at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('contacto_proveedor_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ContactoProveedor::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
