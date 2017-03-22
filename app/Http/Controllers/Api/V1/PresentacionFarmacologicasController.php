<?php

namespace App\Http\Controllers\Api\V1;

use App\PresentacionFarmacologica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresentacionFarmacologicasRequest;
use App\Http\Requests\UpdatePresentacionFarmacologicasRequest;

class PresentacionFarmacologicasController extends Controller
{
    public function index()
    {
        return PresentacionFarmacologica::all();
    }

    public function show($id)
    {
        return PresentacionFarmacologica::findOrFail($id);
    }

    public function update(UpdatePresentacionFarmacologicasRequest $request, $id)
    {
        $presentacion_farmacologica = PresentacionFarmacologica::findOrFail($id);
        $presentacion_farmacologica->update($request->all());

        return $presentacion_farmacologica;
    }

    public function store(StorePresentacionFarmacologicasRequest $request)
    {
        $presentacion_farmacologica = PresentacionFarmacologica::create($request->all());

        return $presentacion_farmacologica;
    }

    public function destroy($id)
    {
        $presentacion_farmacologica = PresentacionFarmacologica::findOrFail($id);
        $presentacion_farmacologica->delete();
        return '';
    }
}
