<?php

namespace App\Http\Controllers\Api\V1;

use App\Factura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacturasRequest;
use App\Http\Requests\UpdateFacturasRequest;

class FacturasController extends Controller
{
    public function index()
    {
        return Factura::all();
    }

    public function show($id)
    {
        return Factura::findOrFail($id);
    }

    public function update(UpdateFacturasRequest $request, $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->update($request->all());

        return $factura;
    }

    public function store(StoreFacturasRequest $request)
    {
        $factura = Factura::create($request->all());

        return $factura;
    }

    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return '';
    }
}
