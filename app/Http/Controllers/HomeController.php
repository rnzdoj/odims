<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Monk;
use App\Models\Rabdey;
use App\Models\Dratshang;
use App\Models\Position;
use App\Models\Education;
use App\Models\Stipend;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Gate::allows('admin')){
            return view('admin.index', [
                'total' => Monk::count(),
                'dratshangs' => Dratshang::count(),
                'rabdeys' => Rabdey::count(),
            ]);
        } else if(Gate::allows('manager')){
            return view('manager.dashboard',[
                'total' => Monk::where('dratshang_id', auth()->user()->monk->dratshang_id)->count(),
                'dratshangs' => Dratshang::count(),
                'rabdeys' => Rabdey::count(),
            ]);
        } else if(Gate::allows('user')){
            return view('user.profile',[
                'monk' => Monk::findOrFail(auth()->user()->monk->id),
                'rabdeys' => Rabdey::all(),
                'dratshangs' => Dratshang::all(),
                'positions' => Position::all(),
                'educations' => Education::all(),
            ]);
        }
    }
}
