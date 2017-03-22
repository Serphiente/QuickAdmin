<?php

namespace App\Http\Controllers;

use App\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLaboratoriosRequest;
use App\Http\Requests\UpdateLaboratoriosRequest;

class LaboratoriosController extends Controller
{
    /**
     * Display a listing of Laboratorio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('laboratorio_access')) {
            return abort(401);
        }
        $laboratorios = Laboratorio::all();

        return view('laboratorios.index', compact('laboratorios'));
    }

    /**
     * Show the form for creating new Laboratorio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('laboratorio_create')) {
            return abort(401);
        }
        $relations = [
            'ciudads' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        return view('laboratorios.create', $relations);
    }

    /**
     * Store a newly created Laboratorio in storage.
     *
     * @param  \App\Http\Requests\StoreLaboratoriosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaboratoriosRequest $request)
    {
        if (! Gate::allows('laboratorio_create')) {
            return abort(401);
        }
        $laboratorio = Laboratorio::create($request->all());

        return redirect()->route('laboratorios.index');
    }


    /**
     * Show the form for editing Laboratorio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('laboratorio_edit')) {
            return abort(401);
        }
        $relations = [
            'ciudads' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Please select', ''),
        ];

        $laboratorio = Laboratorio::findOrFail($id);

        return view('laboratorios.edit', compact('laboratorio') + $relations);
    }

    /**
     * Update Laboratorio in storage.
     *
     * @param  \App\Http\Requests\UpdateLaboratoriosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaboratoriosRequest $request, $id)
    {
        if (! Gate::allows('laboratorio_edit')) {
            return abort(401);
        }
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->update($request->all());

        return redirect()->route('laboratorios.index');
    }


    /**
     * Display Laboratorio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('laboratorio_view')) {
            return abort(401);
        }
        $relations = [
            'ciudads' => \App\Comuna::get()->pluck('nombre', 'id')->prepend('Please select', ''),
            'productos' => \App\Producto::where('laboratorio_id', $id)->get(),
        ];

        $laboratorio = Laboratorio::findOrFail($id);

        return view('laboratorios.show', compact('laboratorio') + $relations);
    }


    /**
     * Remove Laboratorio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('laboratorio_delete')) {
            return abort(401);
        }
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->delete();

        return redirect()->route('laboratorios.index');
    }

    /**
     * Delete all selected Laboratorio at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('laboratorio_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Laboratorio::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
