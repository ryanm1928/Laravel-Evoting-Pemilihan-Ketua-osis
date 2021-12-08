<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, KelasController, PollController};
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
//ajax login
Route::post('/login/getkelas/{id}',[AuthController::class,'findUsername']);
Route::post('/login/getname/{id}',[AuthController::class,'findName']);
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


	Route::get('/contact',[PollController::class,'contact']);

	Route::get('/mails',[PollController::class,'mails']);
	Route::get('/reply/{id}',[PollController::class,'reply']);
	Route::post('/sendreply',[PollController::class,'sendreply']);

	//Route serach
	Route::get('/userdata',[UserController::class,'userdata']);

	//ajax Route Hapus
	Route::post('/polldelete/{id}',[PollController::class,'polldelete']);
	Route::delete('/voting/delete',[PollController::class,'destroy']);



	//ajax route datauser
	Route::get('voteusercheck',[UserController::class,'uservote']);
	Route::get('voteusertimes',[UserController::class,'uservotetimes']);
	Route::get('datavoteuser',[UserController::class,'datavoteuser']);

	Route::get('/importdata',[UserController::class,'importdata']);
	Route::post('/import',[UserController::class,'import']);
	Route::get('/unduh_file_users',[UserController::class,'fileexportuser']);
	Route::get('/unduh_data_kelas',[UserController::class,'unduh_data_kelas']);


	Route::get('/datasiswa',[UserController::class,'kelas']);

	
	//kelas
	Route::resource('kelas',KelasController::class);

	Route::delete('kelas',[KelasController::class,'deletekelas']);
	
});

//user
Route::group(['middleware' => ['Userprotected']],function(){
	Route::get('/user',[AuthController::class,'user']);
	Route::get('/voting/{id}/{poll::slug}',[MainController::class,'polling']);
	Route::post('/vote/{id}',[MainController::class,'voteuser']);
	Route::post('/voting/{id}/{poll::slug}',[MainController::class,'actionpolling']);
	Route::get('/user-mails',[MainController::class,'pesan']);
	Route::post('/send-mails',[MainController::class,'send']);
});

Route::post('/gantisandi',[MainController::class,'updatepassword']);
Route::post('/logout',[AuthController::class,'logout']);



