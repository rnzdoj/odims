<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StepTwoRegistration;
use App\Models\Rabdey;
use App\Http\Controllers\DataTableController;

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
Route::prefix('/register/step/')->name('register.')->group(function () {
    Route::get('2',[StepTwoRegistration::class,'createMonk'])->name('monk.create');
    Route::post('2',[StepTwoRegistration::class,'storeMonk'])->name('monk.store');
    Route::post('3',[StepTwoRegistration::class,'storeAddress'])->name('address.store');
    Route::post('4',[StepTwoRegistration::class,'storeParents'])->name('parents.store');
    Route::get('5',[StepTwoRegistration::class,'createOthers'])->name('others.create');
    Route::post('5',[StepTwoRegistration::class,'storeOthers'])->name('others.store');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('profile',[App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');
});
Route::prefix('dratshang')->name('dratshang.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DratshangController::class, 'dashboard'])->name('dashboard');
});


Route::prefix('datatables')->name('datatables.')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('stipend',[DataTableController::class, 'getMyStipend'])->name('getMyStipend');
    });
    Route::prefix('dratshang')->name('dratshang.')->group(function () {
        Route::get('monks',[DataTableController::class,'getMonks'])->name('getMonks');
        Route::get('stipends',[DataTableController::class,'getDratshangStipend'])->name('getDratshangStipend');
    });
});

Route::resource('monk', App\Http\Controllers\MonkController::class);
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('father', App\Http\Controllers\FatherController::class);
Route::resource('mother', App\Http\Controllers\MotherController::class);
Route::resource('stipend', App\Http\Controllers\StipendController::class);

