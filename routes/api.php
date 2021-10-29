<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Dzongkhag;
use App\Models\Dratshang;
use App\Models\Group;
use App\Models\Gewog;
use App\Models\Rabdey;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/rabdey/dratshangs/{id}', function($id){
    $rabdey = Rabdey::findOrFail($id);
    return $rabdey->dratshangs()->select('id','name')->get();
});
Route::get('/rabdey/list',function(){
    return Rabdey::all();
});
Route::get('/rabdey/{id}',function($id){
    return Dratshang::where('rabdey_id', $id)->get();
});
Route::get('/groups', function () {
    return Group::all();
});
Route::get('/dzongkhags', function () {
    return Dzongkhag::all();
});
Route::get('/dzongkhags/{id}/gewogs', function ($id) {
    return Gewog::where('dzongkhag_id', $id)->get();
});
