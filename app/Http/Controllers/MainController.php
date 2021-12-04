<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Choice;
use App\Models\Vote;
use App\Models\User;
use App\Models\Mail;
use App\Models\Reply;
use Hash;
class MainController extends Controller
{

	public function polling(Poll $id)
	{
		$value = User::where('id',auth()->user()->id)->get();
		$data = Poll::where('id',$id->id)->get();

		foreach ($value as $user) {
			if($user->voteuser->count() >= 1){
				return redirect('/user');
			}	
		}

		foreach ($data as $value) {
			if($value->deadline < date('Y-m-d'))
			{
				abort('404');
			}else{
				$hitung = Choice::where('poll_id',$id->id)->count();
				return view('user.polling',['poll' => $id,'hitung' => $hitung]);
			}
		}

		
	}

	public function voteuser($id)
	{
		$value = User::where('id',auth()->user()->id)->get();
		$vote = Choice::where('id',$id)->get();
		return response()->json(['success' => $vote]);


	}

	public function actionpolling(Request $request, $id)
	{


		$request->validate(
			[
				'userchoice'=> 'required'

			],
			[
				'userchoice.required' => "Anda harus memilih"
			]
		);

		$data = new Vote;



		$data->choice_id = $request->userchoice;
		$data->user_id = auth()->user()->id;
		$data->poll_id = $id;
		$data->kelas_id = auth()->user()->kelas_id;
		$data->save();
		return redirect('user')->with('status','Voting berhasil');


	}
	public function updatepassword(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'old_password' => 'required',
			'new_password' => 'required'
		],
		[
			'username.required' => "Username harus di isi",
			'old_password.required' => "Password lama harus di isi",
			'new_password.required' => "Password baru harus di isi"
		]);

		$user = User::where('username' , $request->username)->get();
		$check = User::where('username' ,$request->username)->count();

		if($check == 0)
		{
			return back()->with('status','Gagal Username tidak ada');
		}else{
			foreach ($user as $value) {
				$id = $value->id;
				$default = $value->password;
				$old_pw = $request->old_password;	

				if(Hash::check($old_pw,$default))
				{
					User::where('id',$id)
					->update([

						'password' =>bcrypt($request->new_password)
					]);

					return redirect('/')->with('berhasil','Password Berhasil di ubah');

				}else{
					return redirect('/')->with('status','Gagal Password lama salah');
				}
			}

		}
	}

	public function pesan()
	{
		$id = auth()->user()->id;
		$reply = Reply::where('user_id',$id)->get();
		return view('user.mail',compact('reply'));
	}
	public function send(Request $request)
	{
		$mail = new Mail;
		$request->validate([

			'pesan' => 'required'
		],
		[
			'pesan.required' => 'Kolom harus di isi'
		]);

		date_default_timezone_set('Asia/Jakarta');
		$time = date("H:i:s");

		$mail->pesan = $request->pesan;
		$mail->tanggal = date('Y-m-d');
		$mail->waktu = $time;
		$mail->user_id = auth()->user()->id;

		$mail->save();

		return redirect('user')->with('pesan','Pesan berhasil di kirim');
	}




}
