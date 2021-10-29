<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Dratshang;
use App\Models\Rabdey;
use App\Models\Group;


class DratshangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Dratshang::class);
        return view('dratshang.index');
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
        $this->authorize('create', Dratshang::class);
        $dratshang = new Dratshang();
        $dratshang->name = $request->dratshang;
        $dratshang->rabdey_id = $request->rabdey;
        $dratshang->group_id = $request->group;
        $dratshang->save();
        return redirect()->back()->with('success', 'your request has been successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dratshang  $dratshang
     * @return \Illuminate\Http\Response
     */
    public function show(Dratshang $dratshang){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dratshang  $dratshang
     * @return \Illuminate\Http\Response
     */
    public function edit(Dratshang $dratshang)
    {
        $this->authorize('update', $dratshang);
        return view('dratshang.edit',[
            'dratshang' => $dratshang,
            'rabdeys' => Rabdey::all(),
            'groups' => Group::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dratshang  $dratshang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dratshang $dratshang)
    {
        $this->authorize('update', $dratshang);
        try {
            $dratshang->name = $request->name;
            $dratshang->group_id = $request->group;
            $dratshang->rabdey_id = $request->rabdey;
            $dratshang->save();
            return redirect()->route('admin.dratshang')->with('success', "Your edit request has been successfull");
        } catch (\Throwable $th) {
            return redirect()->route('admin.dratshang')->with('fail', "Your request faild");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dratshang  $dratshang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dratshang $dratshang)
    {
        $this->authorize('forceDelete', $dratshang);
        $dratshang->delete();
        return redirect()->back()->with('success','Your delete request has been successfull');
    }
}
