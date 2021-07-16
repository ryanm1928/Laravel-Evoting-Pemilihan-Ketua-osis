<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Choice;
use App\Models\Vote;
use App\Models\User;
use Hash;
class MainController extends Controller
{

	public function polling(Poll $id)
	{
		$hitung = Choice::where('id',">",0)->count();
		return view('user.polling',['poll' => $id,'hitung' => $hitung]);
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
			'new_password' => "Password baru harus di isi"
		]);

		$user = User::where('name' , $request->username)->get();
		$check = User::where('name' ,$request->username)->count();

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



	
}
