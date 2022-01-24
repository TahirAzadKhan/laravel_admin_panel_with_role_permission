<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuAController;
use App\Http\Controllers\MenuBController;
use App\Http\Controllers\MenuCController;
use Illuminate\Support\Facades\DB;

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
    return view('index');
});
Route::post('/login',[LoginController::class,'login']);
Route::get('/dashboard',[LoginController::class,'dashboard']);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/menu-a',[MenuAController::class,'showData']);
Route::get('/menu-b',[MenuBController::class,'showDataUpdatable']);
Route::get('/menu-b-delete/{user_id}',[MenuBController::class,'deleteData']);
Route::post('/menu-b-update/{user_id}', [MenuBController::class,'updateData']);
Route::get('/menu-b-edit/{user_id}', [MenuBController::class,'editData']);
Route::get('/menu-c', [MenuCController::class,'addData']);
Route::post('/menu-c-add', [MenuCController::class,'storeData']);
Route::get('/menu-b-permission/{user_id}', [MenuBController::class,'showPermission']);


