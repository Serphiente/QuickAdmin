<?php

namespace App\Http\Controllers;

use App\ModoUso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreModoUsosRequest;
use App\Http\Requests\UpdateModoUsosRequest;

class ModoUsosController extends Controller
{
    /**
     * Display a listing of ModoUso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('modo_uso_access')) {
            return abort(401);
        }
        $modo_usos = ModoUso::all();

        return view('modo_usos.index', compact('modo_usos'));
    }

    /**
     * Show the form for creating new ModoUso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('modo_uso_create')) {
            return abort(401);
        }
        return view('modo_usos.create');
    }

    /**
     * Store a newly created ModoUso in storage.
     *
     * @param  \App\Http\Requests\StoreModoUsosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModoUsosRequest $request)
    {
        if (! Gate::allows('modo_uso_create')) {
            return abort(401);
        }
        $modo_uso = ModoUso::create($request->all());

        return redirect()->route('modo_usos.index');
    }


    /**
     * Show the form for editing ModoUso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('modo_uso_edit')) {
            return abort(401);
        }
        $modo_uso = ModoUso::findOrFail($id);

        return view('modo_usos.edit', compact('modo_uso'));
    }

    /**
     * Update ModoUso in storage.
     *
     * @param  \App\Http\Requests\UpdateModoUsosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModoUsosRequest $request, $id)
    {
        if (! Gate::allows('modo_uso_edit')) {
            return abort(401);
        }
        $modo_uso = ModoUso::findOrFail($id);
        $modo_uso->update($request->all());

        return redirect()->route('modo_usos.index');
    }


    /**
     * Display ModoUso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('modo_uso_view')) {
            return abort(401);
        }
        $relations = [
            'productos' => \App\Producto::where('modo_uso_id', $id)->get(),
        ];

        $modo_uso = ModoUso::findOrFail($id);

        return view('modo_usos.show', compact('modo_uso') + $relations);
    }


    /**
     * Remove ModoUso from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('modo_uso_delete')) {
            return abort(401);
        }
        $modo_uso = ModoUso::findOrFail($id);
        $modo_uso->delete();

        return redirect()->route('modo_usos.index');
    }

    /**
     * Delete all selected ModoUso at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('modo_uso_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ModoUso::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
