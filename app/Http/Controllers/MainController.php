<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Choice;
use App\Models\Vote;
use App\Models\User;
class MainController extends Controller
{

	public function polling(Poll $id)
	{

		return view('user.polling',['poll' => $id]);
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
		return redirect('user')->with('status','anda berhasil melakukan polling');


	}
	public function resultvote($id)
	{
		$data  = Poll::where('id',$id)->with('choice.vote')->first();
		$jml = 0;
		foreach($data->choice as $ch) {
			$jml += $ch->vote->count();
		}

		return view('User.result',['data' => $data,'jml' => $jml]);

		// return view('user.result',['data' => $data]);
		// return view('user.result');
	}

	public function adduser(Request $request)
	{
		$request->validate([
			'nama' => 'required|max:30',
			'password' => 'required|max:30',
			'kelas' => 'required'


		],
		[
			'nama.required' => 'Nama harus di isi',
			'nama.max' => 'Nama tidak boleh dari 30 huruf',
			'password.required' => 'Sandi harus di isi',
			'password.max' =>  'Sandi tidak boleh lebih dari 3 huruf',
			'kelas.required' => 'Kelas harus di isi'

		]);

		$user = new User;
		$user->name = $request->nama;
		$user->password = bcrypt($request->password);
		$user->role = 'user';
		$user->kelas_id = $request->kelas;
		$user->save();
		return redirect('manageuser')->with('status','User berhasil di tambahkan');
	}
}
