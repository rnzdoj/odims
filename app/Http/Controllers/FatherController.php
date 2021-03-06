<?php

namespace App\Http\Controllers;

use App\Models\Father;
use Illuminate\Http\Request;

class FatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function show(Father $father)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function edit(Father $father)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Father $father)
    {
        $this->authorize('update', $father);
        try {
            $father->cid = $request->cid;
            $father->name = $request->name;
            $father->save();
            return redirect()->back()->with('success','Your request have been successfull');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','Your request failed');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function destroy(Father $father)
    {
        //
    }
}
