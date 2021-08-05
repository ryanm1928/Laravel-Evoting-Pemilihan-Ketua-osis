<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Vote;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('admin.datauser');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'username' => 'required',
            'password' => 'required|max:30',
            'kelas' => 'required'


        ],
        [
            'nama.required' => 'Nama harus di isi',
            'username.required' => 'Nama harus di isi',
            'nama.max' => 'Nama tidak boleh dari 30 huruf',
            'password.required' => 'Sandi harus di isi',
            'password.max' =>  'Sandi tidak boleh lebih dari 3 huruf',
            'kelas.required' => 'Kelas harus di isi'

        ]);

        $user = new User;
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->kelas_id = $request->kelas;
        $user->save();
        return redirect('datauser')->with('status','User berhasil di tambahkan');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
        public function show(User $user)
        {

            $vote = Vote::where("user_id",$user->id)->get();
            return view('admin.detailuser',compact('user','vote'));
        }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
        public function edit(User $user)
        {
            $kelas = Kelas::all();
            return view('admin.edituser',compact('user','kelas'));
        }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, User $user)
        {
            $request->validate([
                'nama' => 'required',
                'username' => 'required'

            ],
            [
                'nama.required' => 'Nama Harus di isi', 
            ]);

            if($request->password == null)
            {
             $data = User::where('id',$user->id)
             ->update([
                 'name' => $request->nama,
                 'username' => $request->username,
                 'password' => $user->password

             ]);

         }else{

            $data = User::where('id',$user->id)
            ->update([
                'name' => $request->nama,
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect('datauser')->with('status','Data barhasil di ubah');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
        public function destroy(User $user)
        {
            $data = User::destroy($user->id);
            return redirect('datauser')->with('delete','Data telah berhasil di hapus');

        }


        public function cari(Request $request)
        {

            $data = User::where('username' , 'like' ,'%'.$request->cari.'%')->get();
            return view('admin.userdata.userdata',compact('data','request'));
        }



        public function uservote()
        {
            $data = User::all();

            return view('admin.userdata.usercheck',compact('data'));

        }

        public function uservotetimes()
        {
            $data = User::all();

            return view('admin.userdata.usertimes',compact('data'));

        }

        public function userdata()
        {

            $data = User::all();
            return view('admin.userdata.userdata',compact('data'));
        }

        public function datavoteuser()
        {
           $vote = Vote::all()->count();
           $datapemilih = User::where('id','>',0)->count();
           return view('admin.userdata.datavoteuser',compact('datapemilih','vote'));
       }

   }
