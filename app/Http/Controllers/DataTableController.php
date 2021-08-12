<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monk;
use App\Models\Stipend;
use App\Models\Dratshang;
use App\Models\Rabdey;

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
            ->addColumn('action', function(Monk $monk){
                $btn = '<a href="'.route('monk.show',$monk->id).'" class="edit btn btn-info btn-sm mr-1">View</a>';
                $btn = $btn.'<a href="'.route('monk.edit', $monk->id).'" class="edit btn btn-primary btn-sm mr-1">Edit</a>';
                return $btn;
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
        $dratshang = Dratshang::find(auth()->user()->monk->dratshang_id);
        return Datatables::of($dratshang->stipends)
            ->addColumn('name', function(Stipend $stipend){
                return $stipend->monk->user->name;
            })
            ->addColumn('month', function(Stipend $stipend){
                return $stipend->created_at->format('M');
            })
            ->editColumn('status', function(Stipend $stipend){
                return $stipend->status == 1 ? 'Yes' : "No";
            })
            ->make(true);
    }
    public function getRabdeys(){
        $rabdeys = Rabdey::all();
        return Datatables::of($rabdeys)
                ->addColumn('totalDratshang',function(Rabdey $rabdey){
                    $total = Dratshang::where('rabdey_id', $rabdey->id)->count();
                    return $total;
                })
                ->addColumn('action',function(Rabdey $rabdey){
                    $btn = '<a href="'.route('manager.dratshang.index', $rabdey->id).'" class="edit btn btn-info btn-sm mr-1">View All Dratshang</a>';
                    return $btn;
                })
                ->make(true);
    }
    public function getDratshangs($id){
        $dratshangs = Dratshang::where('rabdey_id', $id)->get();
        return Datatables::of($dratshangs)
                ->addColumn('totalMonk', function(Dratshang $dratshang){
                    $total = Monk::where('dratshang_id', $dratshang->id)->count();
                    return $total;
                })
                ->make(true);
    }
}
