<?php

namespace App\Http\Controllers;

use App\Models\Stipend;
use App\Models\Monk;
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
        $monks = Monk::where('dratshang_id', auth()->user()->monk->dratshang_id)->get();
        return view('manager.stipend.create')->with('monks', $monks);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request);
        for ($i=0; $i < count($request->monk_id); $i++) { 
            $stipend = new Stipend();
            $stipend->monk_id =  $request->monk_id[$i];
            $stipend->status = $request->status[$i] ? 1 : 0;
            $stipend->save();
        }
        return redirect()->route('manager.stipend');
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
