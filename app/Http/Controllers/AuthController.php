<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Kelas;
use App\Models\User;

class AuthController extends Controller
{

	public function index()
	{
		return view('login',
			[
				'kelas' => Kelas::where("kelas",'!=','admin')->get()
			]
		);
	}

	public function findUsername($id)
	{

		return response()->json(['success' => User::where('kelas_id' , $id)->get() ]);


	}

	public function findName($id)
	{

		return response()->json(['success' => User::where('id' , $id)->get() ]);


	}	


	public function admin()
	{
		$poll = Poll::all();

		if(!auth()->user()){
			return redirect('/')->with('status','Kamu harus login dahulu');
		}else{
			return view('admin.admin',['poll'=>$poll]);
		}

	}
	public function manageuser()
	{
		$kelas = Kelas::all();

		if(!auth()->user()){
			return redirect('/')->with('status','Kamu harus login dahulu');
		}else{
			return view('admin.manageuser',['kelas'=>$kelas]);
		}

	}

	public function user()
	{
		$poll = Poll::all();
		if(!auth()->user()){
			return redirect('/')->with('status','Kamu harus login dahulu');
		}else{
			$user = auth()->user();
			$poll = Poll::where("deadline",">=",date("Y-m-d"))
			->with(["vote" => function($query) use ($user){
				$query->where('user_id',$user->id);
			}])->get();

			$deadline = Poll::where("deadline",">=",date("Y-m-d"))->count();

			return view('user.user',compact('poll','deadline'));
		}

	}

	public function  actionlogin(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'password' => 'required'
		],
		[
			'name.required' => 'Username harus di isi',
			'password.required' => 'Password harus di isi'
		]);

		$data = (object) $request->only('name','password');
		if(Auth::attempt(['name' => $data->name,'password' => $data->password]))
		{
			if (auth()->user()->role == 'admin') {
				$request->session()->regenerate();
				return redirect()->intended('/admin');

			}else{
				$request->session()->regenerate();
				return redirect()->intended('/user');
			}
		}else{
			return redirect('/')->with('status','Login gagal cek kembali Password anda');
		}
	}

	public function  logout()
	{
		Auth::logout();
		request()->session()->invalidate();
		request()->session()->regenerateToken();
		return redirect('/');

	}
}
