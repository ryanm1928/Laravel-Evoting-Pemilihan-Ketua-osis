<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,PollController};
use App\Http\Controllers\MainController;
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




Route::get('/',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'actionlogin']);

//admin
Route::group(['middleware'=>['Authprotected']],function(){
	Route::get('/admin',[AuthController::class,'admin']);
	
	Route::get('/manageuser',[AuthController::class,'manageuser']);
	Route::post('/adduser',[PollController::class,'adduser']);
	
	Route::resource('poll',PollController::class);
	Route::get('/editchoice/{id}',[PollController::class,'editchoice']);
	Route::put('/updatechoice/{id}',[PollController::class,'updatechoice']);
	Route::get('/result/{id}',[PollController::class,'result']);
	Route::get('/resultvote',[PollController::class,'resultvote']);
	
	Route::get('/datauser',[UserController::class,'index']);
	Route::post('/datauser',[UserController::class,'store']);
	Route::delete('/datauser/{user}',[UserController::class,'destroy']);
	Route::get('/datauser/edit/{user}',[UserController::class,'edit']);
	Route::put('/datauser/edit/{user}',[UserController::class,'update']);
	Route::get('/datauser/{user}',[UserController::class,'show']);


	Route::get('mails',[PollController::class,'mails']);
	

});

//user
Route::group(['middleware' => ['Userprotected']],function(){
	Route::get('/user',[AuthController::class,'user']);
	Route::get('/polling/{id}',[MainController::class,'polling']);
	Route::post('/polling/{id}',[MainController::class,'actionpolling']);
});

Route::post('/gantisandi',[MainController::class,'updatepassword']);
Route::get('/logout',[AuthController::class,'logout']);



