<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductosRequest;
use App\Http\Requests\UpdateProductosRequest;

class ProductosController extends Controller
{
    /**
     * Display a listing of Producto.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('producto_access')) {
            return abort(401);
        }
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating new Producto.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('producto_create')) {
            return abort(401);
        }
        $relations = [
            'laboratorios' => \App\Laboratorio::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'presentacions' => \App\PresentacionFarmacologica::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'modo_usos' => \App\ModoUso::get()->pluck('uso', 'id')->prepend('Please select', ''),
        ];

        return view('productos.create', $relations);
    }

    /**
     * Store a newly created Producto in storage.
     *
     * @param  \App\Http\Requests\StoreProductosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductosRequest $request)
    {
        if (! Gate::allows('producto_create')) {
            return abort(401);
        }
        $producto = Producto::create($request->all());

        return redirect()->route('productos.index');
    }


    /**
     * Show the form for editing Producto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('producto_edit')) {
            return abort(401);
        }
        $relations = [
            'laboratorios' => \App\Laboratorio::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'presentacions' => \App\PresentacionFarmacologica::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'modo_usos' => \App\ModoUso::get()->pluck('uso', 'id')->prepend('Please select', ''),
        ];

        $producto = Producto::findOrFail($id);

        return view('productos.edit', compact('producto') + $relations);
    }

    /**
     * Update Producto in storage.
     *
     * @param  \App\Http\Requests\UpdateProductosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductosRequest $request, $id)
    {
        if (! Gate::allows('producto_edit')) {
            return abort(401);
        }
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index');
    }


    /**
     * Display Producto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('producto_view')) {
            return abort(401);
        }
        $relations = [
            'laboratorios' => \App\Laboratorio::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'presentacions' => \App\PresentacionFarmacologica::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'modo_usos' => \App\ModoUso::get()->pluck('uso', 'id')->prepend('Please select', ''),
            'itemsocs' => \App\Itemsoc::where('producto_id', $id)->get(),
            'recepcionmercaderia' => \App\Recepcionmercaderium::where('producto_id', $id)->get(),
            'facturas' => \App\Factura::where('producto_id', $id)->get(),
        ];

        $producto = Producto::findOrFail($id);

        return view('productos.show', compact('producto') + $relations);
    }


    /**
     * Remove Producto from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('producto_delete')) {
            return abort(401);
        }
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index');
    }

    /**
     * Delete all selected Producto at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('producto_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Producto::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
