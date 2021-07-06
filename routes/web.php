<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,PollController};
use App\Http\Controllers\MainController;

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




Route::get('/',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'actionlogin']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('/admin',[AuthController::class,'admin']);
Route::get('/manageuser',[AuthController::class,'manageuser']);
Route::post('/adduser',[MainController::class,'adduser']);
Route::get('/user',[AuthController::class,'user']);
Route::resource('poll',PollController::class);

Route::get('/editchoice/{id}',[PollController::class,'editchoice']);
Route::put('/updatechoice/{id}',[PollController::class,'updatechoice']);


Route::get('/polling/{id}',[MainController::class,'polling']);
Route::post('/polling/{id}',[MainController::class,'actionpolling']);
Route::get('/result/{id}',[MainController::class,'resultvote']);
//polling


//polling user


