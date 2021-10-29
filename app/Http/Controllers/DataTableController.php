<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Monk;
use App\Models\Stipend;
use App\Models\Dratshang;
use App\Models\Rabdey;
use App\Models\Position;
use App\Models\Group;
use App\Models\Education;
use App\Models\Role;
use App\Models\User;
use App\Models\Budget;



use Datatables;

class DataTableController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function getMonks(Datatables $datatables)
    {
        if(auth()->user()->isAdmin()){
            $monks = Monk::all();
        }else if(auth()->user()->isManager()){
            $monks = Monk::where('dratshang_id', auth()->user()->monk->dratshang_id)->get();
        } 
        return Datatables::of($monks)
            ->addColumn('name', function(Monk $monk){
                return $monk->user->name ;
            })
            ->addColumn('position', function(Monk $monk){
                return $monk->position->name;
            })
            ->addColumn('education', function(Monk $monk){
                if($monk->education != null)
                    return $monk->education->level;
                else return "-";
            })
            ->addColumn('dratshang', function(Monk $monk){
                return $monk->dratshang->name;
            })
            ->addColumn('rabdey', function(Monk $monk){
                return $monk->dratshang->rabdey->name;
            })
            ->addColumn('action', function(Monk $monk){
                $btn = " ";
                if($this->authorize('view', $monk)){
                    $btn = '<a href="'.route('monk.show',$monk->id).'" class="edit btn btn-dark btn-sm mr-1">View</a>';
                }if($this->authorize('update', $monk))
                {
                    $btn = $btn.'<a href="'.route('monk.edit', $monk->id).'" class="edit btn btn-primary btn-sm mr-1">Edit</a>';
                }
                return $btn;
            })
            ->removeColumn('user_id')
            ->removeColumn('dratshang_id')
            ->removeColumn('education_id')
            ->removeColumn('position_id')
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
    // admin manager
    public function getRabdeys(){
        $rabdeys = Rabdey::all();
        return Datatables::of($rabdeys)
                ->addColumn('totalDratshang',function(Rabdey $rabdey){
                    $total = Dratshang::where('rabdey_id', $rabdey->id)->count();
                    return $total;
                })
                ->addColumn('action',function(Rabdey $rabdey){
                    $btn = '<a href="'.route('manager.dratshang.index', $rabdey->id).'" class="view btn btn-dark btn-sm mr-1 text-white">All Dratshang</a>';
                    if(Gate::allows('admin')){
                        $btn = $btn.'<button type="button" class="btn btn-sm btn-primary" data-name="'.$rabdey->name.'" data-action="'.route('rabdey.update',$rabdey->id).'" data-toggle="modal" data-target="#editRabdeyModal">Edit</button>';
                        $btn = $btn.'<button type="button" data-action="'.route("rabdey.destroy",$rabdey->id).'" class="btn btn-sm btn-danger delete-btn ml-1" data-toggle="modal" data-target="#deleteRabdeyModal">del</button>';
                    }
                    return $btn;
                })
                ->make(true);
    }
    public function getDratshangs($id){
        if(!(Gate::allows('admin') || Gate::allows('manager'))) return ;
        $dratshangs = Dratshang::where('rabdey_id', $id)->get();
        return Datatables::of($dratshangs)
                ->addColumn('totalMonk', function(Dratshang $dratshang){
                    $total = Monk::where('dratshang_id', $dratshang->id)->count();
                    return $total;
                })
                ->make(true);
    }
    public function getDratshangsAdmin(Request $request,$id = null) {
        Gate::authorize('admin');
        if($id == null){
            $dratshangs = Dratshang::all();
        } else {
            $dratshangs = Dratshang::where('rabdey_id', $id)->get();
        }
        return Datatables::of($dratshangs)
                ->addColumn('group', function(Dratshang $dratshang){
                    if($dratshang->group != null)
                        return $dratshang->group->name;
                    else 
                        return null;
                })
                ->addColumn('action', function(Dratshang $dratshang){
                    if(Gate::allows('admin')){
                        $btn = '<a href="'.route('dratshang.edit', $dratshang->id).'" class="edit btn btn-primary btn-sm mr-1">Edit</a>';
                        $btn = $btn.'<button type="button" data-action="'.route("dratshang.destroy",$dratshang->id).'" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#deleteDratshangModal">del</button>';
                    } else {
                        $btn = "No Permision";
                    }
                    return $btn; 
                })
                ->addColumn('rabdey', function(Dratshang $dratshang){
                    return $dratshang->rabdey->name;
                })
                ->removeColumn('group_id')
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->make(true);
    }
    public function getPositions(){
        $positions = Position::all();
        return Datatables::of($positions)
                ->addColumn('action', function(Position $position){
                    $btn = '<button type="button" data-value="'.$position->name.'"data-action="'.route('position.update', $position->id).'" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#editPositionModal">Edit</button>';
                    $btn = $btn.'<button type="button" data-action="'.route("position.destroy",$position->id).'" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#deletePositionModal">del</button>';
                    return $btn;
                })
                ->make(true);
    }
    public function getGroups()
    {
        $groups = Group::all();
        return Datatables::of($groups)
                ->addColumn('action', function(Group $group){
                    $btn = '<button type="button" data-value="'.$group->name.'"data-action="'.route('group.update', $group->id).'" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#editGroupModal">Edit</button>';
                    $btn = $btn.'<button type="button" data-action="'.route("group.destroy",$group->id).'" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#deleteGroupModal">del</button>';
                    return $btn;
                })
                ->editColumn('created_at', function(Group $group){
                    return $group->created_at->format('D d M Y');
                })
                ->editColumn('updated_at', function(Group $group){
                    return $group->updated_at->format('D d M Y');
                })
                ->make(true);
    }
    public function getEducations()
    {
        $educations = Education::all();
        return Datatables::of($educations)
                ->addColumn('action', function(Education $education){
                    $btn = '<button type="button" data-value="'.$education->level.'"data-action="'.route('education.update', $education->id).'" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#editEducationModal">Edit</button>';
                    $btn = $btn.'<button type="button" data-action="'.route("education.destroy",$education->id).'" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#deleteEducationModal">del</button>';
                    return $btn;
                })
                ->editColumn('created_at', function(Education $education){
                    return $education->created_at->format('D d M Y');
                })
                ->editColumn('updated_at', function(Education $education){
                    return $education->updated_at->format('D d M Y');
                })
                ->make(true);
    }
    public function getUsers(){
        Gate::authorize('admin');
        $users = User::all();
        // $users = User::all();
        return Datatables::of($users)
                ->addColumn('role',function(User $user){
                    return $user->role->name;
                })
                ->addColumn('cid', function(User $user){
                    return $user->monk == null ? "༠༠༠༠༠༠༠༠༠༠༠" : $user->monk->cid;
                })
                ->addColumn('action',function(User $user){
                    if(Gate::allows('admin')){
                        $btn = '<button type="button" data-action="'.route('admin.user.role.update', $user->id).'" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#editUserRoleModal">Edit role</button>';
                    } else {
                        $btn = 'No Permission';
                    }
                    return $btn;
                })
                ->removeColumn('role_id')
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->removeColumn('email_verified_at')
                ->make(true);
    }
    public function getBudgets(){
        Gate::authorize('admin');
        $budgets = Budget::whereYear('created_at', '=', \Carbon\Carbon::now()->format('Y'))->get();
        return Datatables::of($budgets)
            ->addColumn('rabdey', function(Budget $budget){
                return $budget->dratshang->rabdey->name;
            })
            ->addColumn('dratshang', function(Budget $budget){
                return $budget->dratshang->name;
            })
            ->addColumn('month', function(Budget $budget){
                return $budget->created_at->format('M');
            })
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->make(true);
    }
}
