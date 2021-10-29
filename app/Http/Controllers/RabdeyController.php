<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Rabdey;

class RabdeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Rabdey::class);
        return view('rabdey.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Rabdey::class);
        $rabdey = new Rabdey();
        $rabdey->name = $request->name;
        $rabdey->save();
        return redirect()->back()->with('success',"Your request for new rabdey have been successfull");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rabdey  $rabdey
     * @return \Illuminate\Http\Response
     */
    public function show(Rabdey $rabdey){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rabdey  $rabdey
     * @return \Illuminate\Http\Response
     */
    public function edit(Rabdey $rabdey){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rabdey  $rabdey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rabdey $rabdey)
    {
        $this->authorize('update', $rabdey);
        $rabdey->name = $request->name;
        $rabdey->save();
        return redirect()->back()->with('success', 'Your update request has been successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rabdey  $rabdey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rabdey $rabdey)
    {
        $this->authorize('forceDelete', $rabdey);
        $rabdey->delete();
        return redirect()->back()->with('success', 'Your delete request has been successfull');
    }
}
