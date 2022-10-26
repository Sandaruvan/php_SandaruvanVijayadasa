<?php

use App\Http\Controllers\SalesTeamController;
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
    return redirect()->route('list');
});

Route::group([
    'prefix' => 'managers'
], function () {
    Route::get('/list', [SalesTeamController::class, 'index'])->name('list');
    Route::get('/create', [SalesTeamController::class, 'create'])->name('create');
    Route::post('/store', [SalesTeamController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SalesTeamController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [SalesTeamController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [SalesTeamController::class, 'destroy'])->name('delete');
});
