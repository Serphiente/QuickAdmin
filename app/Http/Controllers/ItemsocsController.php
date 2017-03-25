<?php

namespace App\Http\Controllers;

use App\Itemsoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreItemsocsRequest;
use App\Http\Requests\UpdateItemsocsRequest;

class ItemsocsController extends Controller
{
    /**
     * Display a listing of Itemsoc.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('itemsoc_access')) {
            return abort(401);
        }
        $itemsocs = Itemsoc::all();

        return view('itemsocs.index', compact('itemsocs'));
    }

    /**
     * Show the form for creating new Itemsoc.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('itemsoc_create')) {
            return abort(401);
        }
        $relations = [
            'folios' => \App\Proveedoroc::get()->pluck('folio', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'presentancions' => \App\PresentacionFarmacologica::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('itemsocs.create', $relations);
    }

    /**
     * Store a newly created Itemsoc in storage.
     *
     * @param  \App\Http\Requests\StoreItemsocsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemsocsRequest $request)
    {
        if (! Gate::allows('itemsoc_create')) {
            return abort(401);
        }
        $itemsoc = Itemsoc::create($request->all());

        return redirect()->route('itemsocs.index');
    }


    /**
     * Show the form for editing Itemsoc.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('itemsoc_edit')) {
            return abort(401);
        }
        $relations = [
            'folios' => \App\Proveedoroc::get()->pluck('folio', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'presentancions' => \App\PresentacionFarmacologica::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $itemsoc = Itemsoc::findOrFail($id);

        return view('itemsocs.edit', compact('itemsoc') + $relations);
    }

    /**
     * Update Itemsoc in storage.
     *
     * @param  \App\Http\Requests\UpdateItemsocsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemsocsRequest $request, $id)
    {
        if (! Gate::allows('itemsoc_edit')) {
            return abort(401);
        }
        $itemsoc = Itemsoc::findOrFail($id);
        $itemsoc->update($request->all());

        return redirect()->route('itemsocs.index');
    }


    /**
     * Display Itemsoc.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('itemsoc_view')) {
            return abort(401);
        }
        $relations = [
            'folios' => \App\Proveedoroc::get()->pluck('folio', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'presentancions' => \App\PresentacionFarmacologica::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $itemsoc = Itemsoc::findOrFail($id);

        return view('itemsocs.show', compact('itemsoc') + $relations);
    }


    /**
     * Remove Itemsoc from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('itemsoc_delete')) {
            return abort(401);
        }
        $itemsoc = Itemsoc::findOrFail($id);
        $itemsoc->delete();

        return redirect()->route('itemsocs.index');
    }

    /**
     * Delete all selected Itemsoc at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('itemsoc_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Itemsoc::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
