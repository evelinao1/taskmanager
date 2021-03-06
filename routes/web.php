<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::group(['prefix'=>'tasks'],function(){
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[TaskController::class,'index'])->name('task.index');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[TaskController::class,'create'])->name('task.create');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[TaskController::class,'store'])->name('task.store');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{id}',[TaskController::class,'edit'])->name('task.edit');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{id}',[TaskController::class,'update'])->name('task.update');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/destroy/{id}',[TaskController::class,'destroy'])->name('task.destroy');
});

Route::group(['prefix'=>'user'],function(){
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[UserController::class,'index'])->name('user.index');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // get('/create',[TaskController::class,'create'])->name('profile.create');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[UserController::class,'storePhoto'])->name('user.storePhoto');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{User}',[UserController::class,'edit'])->name('user.edit');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/delete',[UserController::class,'deletePhoto'])->name('user.deletePhoto');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{User}',[UserController::class,'update'])->name('user.update');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // post('/destroy/{id}',[TaskController::class,'destroy'])->name('profile.destroy');
});
// Route::group(['prefix'=>'tasks'], function(){
//     Route::get('/{User}',[TaskController::class,'index'])->name('task.index');
//     Route::get('/create',[TaskController::class,'create'])->name('task.create');
//     Route::post('/store',[TaskController::class,'store'])->name('task.store');
    // Route::get('/edit/{Task}',[TaskController::class,'edit'])->name('task.edit');
    // Route::post('/update/{Task}',[TaskController::class,'update'])->name('task.update');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/tasks', function () {
//     return view('tasks.index');
// })->name('tasks');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
