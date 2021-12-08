@extends('templateuser.layout')
@section('title','Vote')
@section('content')
<div class="alert alert-primary w-100">
    <li>Gunakan hak pilih anda</li>
</div>
<div class="row">
    @foreach($poll->choice as $data)
    <div class="col-12 col-md-4 mb-5" id="card-paslon">
        <div class="card shadow h-100 " id="paslon">
            <center>
                <img src="{{asset($data->sampul)}}" alt="" class=" w-100">
            </center>
            <div class="card-body">
                <center>
                    <h5 class="card-title">{{ $data->name }}</h5>
                </center>
            </div>
            <!-- Button trigger modal -->
            <button onClick="uservote({{$data->id}})" type="button" class="btn w-100 text-light" style="background-color:#045de9;" id="btn-vote" data-toggle="modal" data-target="#staticBackdrop">
                Vote <li class="fa fa-direction-right"></li>
            </button>
        </div>
    </div>
    @endforeach
    <?php
	$max = 6;
	$jlm = $max - $hitung;
	?>
    @for($i=0 ; $i < $jlm ; $i++) <div class="col-md-4 mb-3" id="img-none">
        <div class="card shadow w-100" id="paslon">
            <center>
                <button type="submit" class="bg-transparent" style="border:none;outline: none;"><img src="{{asset('gambar/deafult.png')}}" alt="" class="w-100"></button>
            </center>
            <div class="card-body">
                <center>
                    <i class="fa fa-2x fa-ban mt-3" aria-hidden="true"></i>
                </center>
            </div>
        </div>
</div>
@endfor
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-light">Vote</h4>
                <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="text-center loading">
                </div>
                <center>
                    <div class="alert alert-warning">
                        <center>Anda ingin Memilih:</center>
                    </div>
                    <form method="post" id="form-vote">
                        @csrf
                        <div class="h4 mb-3" id="votename"></div>
                        <img id="img-sampul" alt="" class="shadow mb-2 w-75">
                        <input type="hidden" value="id" name="userchoice" id="userchoice">
                        <div class="mb-1" align="center"><span class="h6">VISI <li class="fa fa-caret-right"></li></span>
                            <p id="visi" class="d-inline"></p>
                        </div>
                        <div class="" align="center"><span class="h6">MISI <li class="fa fa-caret-right"></li></span>
                            <p id="misi" class="d-inline"></p>
                        </div>
                        <div class="modal-footer mt-3 mr-auto">
                            <button id="btn-kembali" type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" id="pilih" class="btn btn-primary" style="width:120px">Pilih</button>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
<div style="margin-bottom: 100px;"></div>
<script>
function uservote(id) {
    $('.text-center').html(`<div class="spinner-border" role="status">
				    <span class="sr-only">Loading...</span>
				  </div>`);
    $('#pilih').attr('disabled', 'true');
    jQuery.ajax({
        url: '/vote/' + id,
        type: 'POST',
        data: {
            _token: $("input[name=_token]").val()
        },
        complete: function(response) {

        },
        success: function(response) {
            //called when successful
            const data = response['success'];
            // console.log(obj);
            $.each(data, function(i, val) {
                $('.loading').html(`<div class="spinner-border d-none text-primary" role="status">
				    <span class="sr-only">Loading...</span>
				  </div>`);
                $('#pilih').removeAttr('disabled');
                var src = "{{asset('/')}}" + data[i].sampul;
                var action = "/"
                $('#votename').html(data[i].name);
                $('#img-sampul').attr('src', src);
                $('#visi').html(data[i].visi);
                $('#misi').html(data[i].misi);
                $('#userchoice').val(data[i].id);


            });
        },
        error: function(response) {
            //called when there is an error
            console.log('error')

        }
    });


}
$('#form-vote').on('submit', function() {
    $('#pilih').attr('disabled', 'true');
    $('#btn-kembali').css('display', 'none');

});

</script>
@endsection