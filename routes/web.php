<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EpinController;
use App\Http\Controllers\FundController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('token', [EpinController::class, 'pin'])->name('token');
    Route::get('epin', [EpinController::class, 'verify'])->name('epin');
    Route::get('sample', [EpinController::class, 'sample'])->name('sample');
    Route::post('getpin', [EpinController::class, 'getpin'])->name('getpin');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('timeline', [FundController::class, 'fund'])->name('timeline');
    Route::post('plan', [AuthController::class, 'plan'])->name('plan');
    Route::get('tran/{reference}', [FundController::class, 'tran'])->name('tran');
    Route::get('upgrade', function () {
        if (Auth::user()->plan==1) {
            return redirect(route('dashboard'))
                ->with('status1','You Are Already A Subscriber ');

        }else {
            return view('upgrade');
        }
    });


});
Route::get('logout', [AuthController::class, 'signOut'])->name('logout');
