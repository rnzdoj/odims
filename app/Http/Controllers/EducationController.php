<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Education::class);
        return view('education.index');
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
        $this->authorize('create', Education::class);
        try {
            $education = new Education();
            $education->level = $request->level;
            $education->save();
            return redirect()->back()->with('success','Your request for new education is successfull');
        } catch(\Thorowable $th) {
            return redirect()->back()->with('fail','Your request failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $this->authorize('update', $education);
        try {
            $education->level = $request->level;
            $request->save();
            return redirect()->back()->with('success','Your update request is successfull');
        } catch(\Thorowable $th) {
            return redirect()->back()->with('fail','Your request failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $this->authorize('forceDelete', $education);
        try {
            $education->delete();
            return redirect()->back()->with('success','Your delete request is successfull');
        } catch(\Thorowable $th) {
            return redirect()->back()->with('fail','Your request failed');
        }
    }
}
