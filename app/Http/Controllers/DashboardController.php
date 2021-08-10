<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monk;
use App\Models\Rabdey;
use App\Models\Dratshang;
use App\Models\Position;
use App\Models\Education;
use App\Models\Stipend;

use Datatables;


class DashboardController extends Controller
{
    public function profile(){
        return view('monk.profile',[
            'monk' => Monk::findOrFail(auth()->user()->monk->id),
            'rabdeys' => Rabdey::all(),
            'dratshangs' => Dratshang::all(),
            'positions' => Position::all(),
            'educations' => Education::all(),
        ]);
    }
}
