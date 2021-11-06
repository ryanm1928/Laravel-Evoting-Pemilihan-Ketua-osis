@extends('template.layout')
@section('title','Manage Kelas')
@section('managekelas','active-nav-item')
@section('content')

@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
@if(session('delete'))
<div class="alert alert-danger"><li class="fa fa-check-circle"></li> {{ session('delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="row">
    <div class="col-sm-6">
        <form action="">
            <div class="row">
                <div class="col-sm-9 mb-2">
                    <input id="jumlah" type="number" value="{{$_GET['jumlah'] ?? '' }}" min="1" max="15" name="jumlah" class="form-control" id="jumlah" required="" step="" placeholder="Masukan Jumlah kelas">        
                </div>
                <div class="col-sm-3">
                    <button type="submit" id="jml" class="btn btn-success w-100"><li class="fa fa-floppy-o"></li> Submit</button>
                </div>
            </div>
        </form>

        @if(isset($_GET['jumlah']))
        <form action="{{ route('kelas.store') }}" method="post">
            @csrf
            <div class="row">
               @for($i = 0; $i < $_GET['jumlah'];$i++)
               <div class="col-sm-6 mt-4">
                <input class="form-control" required type="text" name="kelas[]" placeholder="Masukan kelas">
            </div>
            @endfor
            <div class="col-sm-12 my-3">
                <button type="submit" class="btn btn-primary w-100"><li class="fa fa-plus"></li> Buat Kelas</button>
            </div>
        </div>
    </form>
    @endif
</div>


<div class="col-sm-6">
    <form action="" method="post">
        @csrf
        @method('delete')
        <table class="table mb-3 table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" name="checkall" id="checkall"></th>
                    <th scope="col">Kelas_id</th>
                    <th scope="col">Kelas</th>
                    <th>
                        <button type="button" class="btn btn-danger btn-modal" data-toggle="modal" href='#modal-id'><li class="fa fa-trash"></li></button>
                        <div class="modal fade" id="modal-id">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h4 class="modal-title text-white">Peringatan</h4>
                                        <button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" align="center">Anda yakin ingin menghapus:</div>
                                        <div class="" align="center">
                                            <li class="fa fa-5x fa-exclamation-triangle text-danger mb-4 mt-2"></li><br>
                                            <div>Jika data kelas di hapus maka data siswa juga akan ikut terhapus</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger"><li class="fa fa-trash"></li> Hapus kelas</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $key => $data)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $data->id }}" class="cekkelas" name="cekkelas[]">
                    </td>
                    <td scope="row">{{ $kelas->firstItem() + $key }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    <div class="d-flex justify-content-center">
        {{ $kelas->links() }}
    </div>
</div>
</div>

<script>
    $('.btn-modal').attr('disabled', 'true');
    $(function()
    {
        $('[name="cekkelas[]"]').change(function()
        {
            if ($('[name="cekkelas[]"]').is(':checked')) {
           // Do something...
           $('.btn-modal').removeAttr('disabled');

       }else{
        $('.btn-modal').attr('disabled', 'true');

    }
});
    });

    $(function()
    {
        $('[name="checkall"]').change(function()
        {
            if ($(this).is(':checked')) {
           // Do something...
           $('.btn-modal').removeAttr('disabled');

       }else{
        // $('.btn-modal').css('cursor', 'not-allowed');
        $('.btn-modal').attr('disabled', 'true');

    }
});
    });


    $(function(e){
        $("#checkall").click(function (e) { 
            $('.cekkelas').prop('checked',$(this).prop('checked'));

        });
    })


    let jumlah = document.getElementById('jumlah').value;
    let page = '/kelas'
    if (jumlah < 0) {
        alert('Jumlah field input kelas Tidak boleh kurang dari 0')
        window.location = page;

    }else if (jumlah > 15) {
        alert('Jumlah field input kelas di batasi hanya sampai 15 inputan saja')
        window.location = page;
    }
</script>

@endsection