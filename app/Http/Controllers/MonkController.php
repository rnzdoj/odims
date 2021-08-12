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
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function show(Monk $monk)
    {
        // dratshang
        return view('manager.monk.show',['monk'=>$monk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function edit(Monk $monk)
    {
        // dratshang
        return view('manager.monk.edit',[
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
        // monk
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
            return redirect()->back()->with('bio-data-update-success', 'UPdated');
        } catch (\Throwable $th) {
            return redirect()->back()->with('bio-data-update-fail', 'Failed');
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
        //
    }
}
