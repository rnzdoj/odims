<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monk;
use App\Models\Stipend;
use Datatables;

class DataTableController extends Controller
{
    public function getMyStipend(Datatables $datatables){
        $stipends = Stipend::where('monk_id',auth()->user()->monk->id)->get();
        return $datatables->of($stipends)
            ->editColumn('created_at', function(Stipend $stipend){
                return $stipend->created_at->format('M');
            })
            ->editColumn('status', function(stipend $stipend){
                return $stipend->status == 1 ? '༡' : '༠';
            })
            ->setRowClass(function(Stipend $stipend){
                return $stipend->status == 1 ?  'text-success' : 'text-danger';
            })
            ->make(true);
    }

    public function getMonks(Datatables $datatables){
        $monks = Monk::where('dratshang_id', auth()->user()->monk->dratshang_id)->get();
        return $datatables->of($monks)
            ->addColumn('name', function(Monk $monk){
                return $monk->user->name;
            })
            ->addColumn('position', function(Monk $monk){
                return $monk->position->name;
            })
            ->addColumn('education', function(Monk $monk){
                return $monk->education->level;
            })
            ->removeColumn('id')
            ->removeColumn('dratshang_id')
            ->removeColumn('user_id')
            ->removeColumn('image')
            ->removeColumn('position_id')
            ->removeColumn('education_id')
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->make(true);
    }
    public function getDratshangStipend(Datatables $datatables) {
        $stipends = Stipend::all();
        return Datatables::of($stipends)->make(true);
    }


}
