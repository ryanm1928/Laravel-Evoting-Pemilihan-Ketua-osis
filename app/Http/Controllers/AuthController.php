<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Kelas;
class AuthController extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function admin()
	{
		$poll = Poll::all();

		if(!auth()->user()){
			return redirect('/')->with('status','Kamu harus login dahulu');
		}elseif (auth()->user()->role == "user") {
			Auth::logout();
			return redirect('/')->with('status','Kamu user tidak boleh mengakses halaman admin');
		}else{
			return view('admin.admin',['poll'=>$poll]);
		}

	}
	public function manageuser()
	{
		$kelas = Kelas::all();

		if(!auth()->user()){
			return redirect('/')->with('status','Kamu harus login dahulu');
		}elseif (auth()->user()->role == "user") {
			Auth::logout();
			return redirect('/')->with('status','Kamu user tidak boleh mengakses halaman admin');
		}else{
			return view('admin.manageuser',['kelas'=>$kelas]);
		}

	}

	public function user()
	{
		$poll = Poll::all();
		if(!auth()->user()){
			return redirect('/')->with('status','Kamu harus login dahulu');
		}elseif (auth()->user()->role == "admin") {
			Auth::logout();
			return redirect('/')->with('status','Kamu user tidak boleh mengakses halaman admin');
		}else{
			$user = auth()->user();
			$poll = Poll::where("deadline",">=",date("Y-m-d"))
			->with(["vote" => function($query) use ($user){
				$query->where('user_id',$user->id);
			}])->get();
			return view('user.user',['poll' => $poll]);
		}

	}

	public function  actionlogin(Request $request)
	{

		$data = (object) $request->only('name','password');
		if(Auth::attempt(['name' => $data->name,'password' => $data->password]))
		{
			if (auth()->user()->role == 'admin') {
				return redirect('/admin');

			}else{
				return redirect('/user');
			}
		}else{
			return redirect('/')->with('status','Login gagal Nama Password salah ');
		}
	}

	public function  logout()
	{
		Auth::logout();
		return redirect('/');

	}
}
