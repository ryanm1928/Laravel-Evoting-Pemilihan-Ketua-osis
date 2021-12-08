@extends('template.layout')
@section('title','Admin Dashboard')
@section('home','active-nav-item')
@section('content')
@if(session('status'))
<div class="alert alert-success">
    <li class="fa fa-check-circle"></li> {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
@if(session('delete'))
<div class="alert alert-danger">
    <li class="fa fa-trash"></li> {{session('delete')}}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="h3">Data Voting</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover ">
        <caption>Made by MOHAMAD RIYAN</caption>
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Batas Waktu</th>
                <th scope="col">Dibuat oleh</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($poll as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td align="center">{{$data->title}}</td>
                <td align="center">{{$data->description}}</td>
                <td align="center">{{$data->deadline}}</td>
                <td>{{$data->creator->name}}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" onClick="hapus({{$data->id}})" title="Hapus" class="btn btn-outline-danger mt-2 " data-toggle="modal" data-target="#staticBackdrop">
                        <li class="fa fa-trash"></li>
                    </button>
                    <a href="{{route('poll.edit',['poll' => $data->id])}}" title="Edit data" class="btn btn-outline-warning mt-2 "><i class="fa fa-edit" aria-hidden="true"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Peringatan</h5>
            </div>
            <div class="modal-body">
                <form action="/voting/delete" method="post" class="d-inline" id="form-delete">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" id="id_voting">
                    <div class="alert alert-danger" align="center">Anda yakin ingin menghapus voting:</div>
                    <div class="" align="center">
                        <li class="fa fa-5x fa-exclamation-triangle text-danger mb-4 mt-2"></li><br>
                        <div class="title h3"></div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn-delete" type="submit" class="btn btn-danger" style="width: 130px;"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/script-admin.js"></script>
@endsection
