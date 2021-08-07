<?php

namespace App\Http\Controllers;

use App\Models\Stipend;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StipendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // monk
        return view('monk.stipend',[
           "stipends" => Stipend::where('monk_id', auth()->user()->monk->id)->where('created_at', '>', \Carbon\Carbon::now())->latest()->get()
        ]);
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
     * @param  \App\Models\Stipend  $stipend
     * @return \Illuminate\Http\Response
     */
    public function show(Stipend $stipend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stipend  $stipend
     * @return \Illuminate\Http\Response
     */
    public function edit(Stipend $stipend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stipend  $stipend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stipend $stipend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stipend  $stipend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stipend $stipend)
    {
        //
    }
}
