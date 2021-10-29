<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\User;

class UserRoleController extends Controller
{
    public function index(){
        return view('role.index');
    }
    public function update(Request $request, User $user){
        Gate::authorize('admin');
        $user->role_id = $request->role;
        $user->save();
        return redirect()->back()->with('success','Your request has been successfull');
    }
}
