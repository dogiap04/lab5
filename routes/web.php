<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function (){
   Route::get('movie/list', [\App\Http\Controllers\Admin\MovieController::class,'index'])->name('movie.index');
   Route::get('movie/create', [\App\Http\Controllers\Admin\MovieController::class,'create'])->name('movie.create');
   Route::post('movie/create', [\App\Http\Controllers\Admin\MovieController::class,'store'])->name('movie.store');
   Route::get('movie/edit/{movie}', [\App\Http\Controllers\Admin\MovieController::class,'edit'])->name('movie.edit');
   Route::put('movie/edit/{movie}', [\App\Http\Controllers\Admin\MovieController::class,'update'])->name('movie.update');
   Route::delete('movie/delete/{movie}', [\App\Http\Controllers\Admin\MovieController::class,'destroy'])->name('movie.destroy');
    Route::get('movie/detail/{movie}', [\App\Http\Controllers\Admin\MovieController::class,'detail'])->name('movie.detail');

});