<?php

namespace App\Http\Controllers;

use App\Models\Monk;
use Illuminate\Http\Request;
use App\Models\Rabdey;
use App\Models\Dratshang;
use App\Models\Position;
use App\Models\Education;

class MonkController extends Controller
{
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $this->authorize('viewAny', Monk::class);
        return view('monk.index');
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
    public function store(Request $request){}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function show(Monk $monk)
    {
        $this->authorize('view', $monk);
        return view('monk.show',['monk'=>$monk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function edit(Monk $monk)
    {
        $this->authorize('update', $monk);
        return view('monk.edit',[
            'monk'=>$monk,
            'rabdeys' => Rabdey::all(),
            'dratshangs' => Dratshang::all(),
            'positions' => Position::all(),
            'educations' => Education::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monk $monk)
    {
        $request->user()->can('update', $monk);
        // $this->authorize('update', $monk);
        try {
            $monk->update([
                'cid' => $request->cid,
                'choename' => $request->choename,
                'year' => $request->year,
                'regage' => $request->regage,
                'position_id' => $request->position,
                'dratshang_id' => $request->dratshang,
                'education_id' => $request->education
            ]);
            return redirect()->back()->with('success', 'Your request have been successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail', 'Your request failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monk $monk)
    {
        $this->authorize('forceDelete', $monk);
        // $monk->delete();
        return redirect()->route('monk.index')->with('success','Your request have been successfull');
    }
}
