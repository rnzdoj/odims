<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monk;

class DratshangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 
    // nav link
    public function dashboard(){
        return view('dratshang.dashboard');
    }
    public function monk(){
        return view();
    }
    public function stipend(){
        return view();
    }
}
