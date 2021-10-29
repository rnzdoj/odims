<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StepTwoRegistration;
use App\Http\Controllers\DataTableController;
use App\Models\Rabdey;
use App\Models\Monk;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**Registration route */
Route::prefix('/register')->name('register.')->group(function () {
    Route::post('2',    [StepTwoRegistration::class,'storeMonk'])       ->name('monk.store');
    Route::get('2',     [StepTwoRegistration::class,'createMonk'])      ->name('monk.create');
    Route::post('3',    [StepTwoRegistration::class,'storeAddress'])    ->name('address.store');
    Route::post('4',    [StepTwoRegistration::class,'storeParents'])    ->name('parents.store');
    Route::get('5',     [StepTwoRegistration::class,'createOthers'])    ->name('others.create');
    Route::post('5',    [StepTwoRegistration::class,'storeOthers'])     ->name('others.store');
});
Auth::routes();
/**Home */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])      ->name('home');
/**Admin routes */
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::prefix('user')->name('user.')->group(function () {
        Route::prefix('role')->name('role.')->group(function () {
            Route::get('/',             [App\Http\Controllers\UserRoleController::class, 'index'])  ->name('index');
            Route::put('user/{user}',   [App\Http\Controllers\UserRoleController::class, 'update']) ->name('update');
        });
    });
});
/**Manager routes*///
Route::middleware('auth')->prefix('rabdey')->name('manager.')->group(function () {
    Route::get('{id}/dratshang', function($id){
        return view('dratshang.index')->with('id', $id);
    })->name('dratshang.index');
});
/**Datatables */
Route::middleware('auth')->prefix('datatables')->name('datatables.')->group(function ()
{
    /** admin and manager */
    Route::get('monks',  [DataTableController::class,'getMonks'])        ->name('getMonks');
    Route::get('rabdeys',[DataTableController::class,'getRabdeys'])                     ->name('getRabdeys');
    /**manager */
    Route::prefix('manager')->name('manager.')->group(function () 
    {
        Route::get('dratshangs/{id}',   [DataTableController::class,'getDratshangs'])   ->name('getDratshangs');
    });
    /**admin */
    Route::middleware('can:admin')->prefix('admin')->name('admin.')->group(function()
    {
        Route::get('budgets',   [DataTableController::class,'getBudgets'])              ->name('getBudgets');
        Route::get('dratshangs/{id?}',[DataTableController::class,'getDratshangsAdmin'])      ->name('getDratshangsAdmin');
        Route::get('educations',[DataTableController::class,'getEducations'])           ->name('getEducations');
        Route::get('groups',    [DataTableController::class,'getGroups'])               ->name('getGroups');
        Route::get('positions', [DataTableController::class,'getPositions'])            ->name('getPositions');
        Route::get('users',     [DataTableController::class,'getUsers'])                ->name('getUsers');
    });
});
/**Resource controller */
Route::resource('address',      App\Http\Controllers\AddressController::class);
Route::resource('budget',       App\Http\Controllers\BudgetController::class)       ->only([ 'index', 'store']);
Route::resource('dratshang',    App\Http\Controllers\DratshangController::class)    ->except([ 'create', 'show']);
Route::resource('education',    App\Http\Controllers\EducationController::class)    ->only([ 'index', 'store', 'update', 'destroy']);
Route::resource('father',       App\Http\Controllers\FatherController::class)       ->only([ 'update']);
Route::resource('group',        App\Http\Controllers\GroupController::class)        ->only([ 'index','store', 'update', 'destroy']);
Route::resource('monk',         App\Http\Controllers\MonkController::class)         ->except([ 'create', 'store']);
Route::resource('mother',       App\Http\Controllers\MotherController::class)       ->only([ 'update']);
Route::resource('position',     App\Http\Controllers\PositionController::class)     ->except([ 'create', 'show']);
Route::resource('rabdey',       App\Http\Controllers\RabdeyController::class)       ->except([ 'create', 'show', 'edit']);
Route::resource('role',         App\Http\Controllers\RoleController::class)         ->only([ 'index']);
Route::resource('user',         App\Http\Controllers\UserController::class)         ->only([ 'update']);

// Route::resource('stipend',      App\Http\Controllers\StipendController::class);