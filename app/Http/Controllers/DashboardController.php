<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monk;
use App\Models\Rabdey;
use App\Models\Dratshang;
use App\Models\Position;
use App\Models\Education;


class DashboardController extends Controller
{
    public function profile(){
        $monk = Monk::findOrFail(auth()->user()->monk->id);
        $rabdeys = Rabdey::all();
        $dratshangs = Dratshang::all();
        $positions = Position::all();
        $educations = Education::all();
        return view('monk.profile',[
            'monk' => $monk,
            'rabdeys' => $rabdeys,
            'dratshangs' => $dratshangs,
            'positions' => $positions,
            'educations' => $educations,
        ]);
    }
}
