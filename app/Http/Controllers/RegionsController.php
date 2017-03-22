<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreRegionsRequest;
use App\Http\Requests\UpdateRegionsRequest;

class RegionsController extends Controller
{
    /**
     * Display a listing of Region.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('region_access')) {
            return abort(401);
        }
        $regions = Region::all();

        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating new Region.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('region_create')) {
            return abort(401);
        }
        return view('regions.create');
    }

    /**
     * Store a newly created Region in storage.
     *
     * @param  \App\Http\Requests\StoreRegionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionsRequest $request)
    {
        if (! Gate::allows('region_create')) {
            return abort(401);
        }
        $region = Region::create($request->all());

        return redirect()->route('regions.index');
    }


    /**
     * Show the form for editing Region.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('region_edit')) {
            return abort(401);
        }
        $region = Region::findOrFail($id);

        return view('regions.edit', compact('region'));
    }

    /**
     * Update Region in storage.
     *
     * @param  \App\Http\Requests\UpdateRegionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionsRequest $request, $id)
    {
        if (! Gate::allows('region_edit')) {
            return abort(401);
        }
        $region = Region::findOrFail($id);
        $region->update($request->all());

        return redirect()->route('regions.index');
    }


    /**
     * Display Region.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('region_view')) {
            return abort(401);
        }
        $relations = [
            'provincia' => \App\Provincium::where('region_id', $id)->get(),
        ];

        $region = Region::findOrFail($id);

        return view('regions.show', compact('region') + $relations);
    }


    /**
     * Remove Region from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('region_delete')) {
            return abort(401);
        }
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('regions.index');
    }

    /**
     * Delete all selected Region at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('region_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Region::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
