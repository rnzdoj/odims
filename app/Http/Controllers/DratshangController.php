<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monk;

class DratshangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 
    public function index(){
        return view('manager.dratshang.index');
    }
}
