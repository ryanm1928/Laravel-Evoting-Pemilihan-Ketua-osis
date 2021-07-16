<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Photo;
use App\Models\Choice;
use App\Models\Mail;


class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $poll = Poll::where('deadline','>=',date('Y.m.d'))->count();
      
      return view('admin.create',compact('poll'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate(
        [
          'title' => 'required',
          'description' => 'required',
          'deadline' => 'required',

        ],
        [
          'title.required' => 'Kolom judul harus di isi.',
          'description.required' => 'Kolom descripsi harus di isi.',
          'deadline.required' => 'Kolom Batas waktu harus di isi.'
        ]);

      $data = new Poll;

      $data->title = $request->title;
      $data->description = $request->description;
      $data->deadline = $request->deadline;
      $data->created_by = auth()->user()->id;
      $data->save();
        // $data->sampul = $request->sampul;
      $request->validate(
        [
          "choice" => "required"
        ],
        [
          "choice.required" => "Kolom ini harus di isi"
        ]);

      $pilih = $request->choice;
      $url = $request->file('gambar');
      $request->sampul = $url;
      foreach ($pilih as $i => $value) {
        $choice = new Choice;
        $choice->name = $value;
        $choice->sampul = $url[$i]->store('gambar');
        $choice->poll_id = $data->id;
        $choice->save();

      }



      return redirect('/admin')->with('status' ,'Data berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $id = Poll::find($id);
      return view('admin.updatepoll',compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate(
        [
          'title' => 'required',
          'description' => 'required',
          'deadline' => 'required',

        ],
        [
          'title.required' => 'Kolom judul harus di isi.',
          'description.required' => 'Kolom descripsi harus di isi.',
          'deadline.required' => 'Kolom Batas waktu harus di isi.'
        ]);


      Poll::where('id',$id)
      ->update([
        'title' => $request->title,
        'description' => $request->description,
        'deadline' => $request->deadline


      ]);
      return redirect('/admin')->with('status' ,'Data berhasil di update');
    }



    public function editchoice($id)
    {
      $id = Choice::find($id);
      return view('admin.editchoice',compact('id'));
    }

    public function updatechoice(Request $request,$id)
    {   
      $request->validate(
        [
          "choice" => "required"
        ],
        [
          "choice.required" => "Kolom ini harus di isi"
        ]); 


      if($request->file('sampul') == null)
      {
        Choice::where('id',$id)
        ->update([
          'name' => $request->choice
        ]);
        return redirect('/admin')->with('status','Choice berhasil di update');

      }else{
        $sampul = $request->file('sampul');
        $sampul = $request->sampul;
        Choice::where('id',$id)
        ->update([
          'name' => $request->choice,
          'sampul' => $sampul->store('gambar')
        ]);

      }



      return redirect('/admin')->with('status','Choice berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(poll $poll)
    {
     $poll = Poll::destroy($poll->id);

     return redirect('admin')->with('delete','Data telah berhasil di hapus');
   }

   //vote
   public function resultvote()
   {
    $poll = Poll::all();
    return view('admin.resultvote',['poll' => $poll]);
  }

  public function result($id)
  {
    $data  = Poll::where('id',$id)->with('choice.vote')->first();
    $jml = 0;
    foreach($data->choice as $ch) {
      $jml += $ch->vote->count();
    }

    return view('admin.result',['data' => $data,'jml' => $jml]);

  }

  public function mails()
  {
    $mail = Mail::all();
    return view('admin.mail',compact('mail'));

  }

}
