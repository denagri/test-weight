<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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


Route::middleware('guest')->group(function(){
    Route::get('/register/step1',[AuthController::class,'createStep1'])
    ->name('register.step1');
    Route::post('/register/step1',[AuthController::class,'postStep1'])
    ->name('register.step1.post');
    Route::get('/register/step2',[AuthController::class,'createStep2'])
    ->name('register.step2');
    Route::post('/register/step2',[AuthController::class,'store'])
    ->name('register.step2.post');
});
Route::middleware('auth')->group(function(){
    Route::get('/weight_logs',[AdminController::class,'index'])
    ->name('home');
    Route::get('/weight_logs/{weightLogId}',[AdminController::class,'detail']);
    Route::get('/weight_logs/goal_setting',[AdminController::class,'goal']);
});
    


Route::get('/', function () {
    return view('welcome');
});
