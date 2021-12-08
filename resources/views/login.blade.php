@extends('template.login')
@section('title','Login')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-6 mt-3">
        <img src="{{asset('gambar/img-login.png')}}" alt="" class="img-fluid">
    </div>
    <div class="col-md-12 col-lg-12 col-xl-6 p-5">
        <div class="" id="form-login">
            <center>
                <div class="h1 mb-4" style="font-style: bold;"> Login</div>
            </center>
            <div class="mb-3">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="" id="basic-addon1">
                            <li class="fa fa-graduation-cap mr-2 mt-2"></li>
                        </span>
                    </div>
                    <input type="hidden" name="kelas" id="kelas">
                    <select class="form-control garis" id="choiceKelas" onchange="choiceClass()" required>
                        <option value="">--Pilih Kelas--</option>
                        @foreach($kelas as $datakelas)
                        <option value="{{ $datakelas->id }}">{{ $datakelas->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm mb-4 mt-4">
                    <div class="input-group-prepend">
                        <span class="" id="basic-addon1">
                            <li class="fa fa-user mr-2 mt-2"></li>
                        </span>
                    </div>
                    <select class="form-control garis" id="username" onchange="getName()">
                        <option value="">--Pilih Nama--</option>
                    </select>
                </div>
            </div>
            <form action="/login" method="post" id="login-form">
                @csrf
                <div class="">
                    <input value="admin" required="" type="hidden" id="usernameid" placeholder="Nama" name="name" class="form-control @error('name') is-invalid @enderror garis">
                </div>
                <div class="">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="bg-transparent" id="basic-addon1">
                                <li class="fa fa-lock mr-2 mt-2"></li>
                            </span>
                        </div>
                        <input required="" type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror garis">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <button id="btn-login" type="submit" class="btn btn-primary mt-5 p-2 w-100">
                    <li class="fa fa-key"></li> Login
                </button>
                <div class="text-primary my-2" id="gantipw" style="text-decoration: underline; cursor:pointer;"> Ubah Password?
                </div>
            </form>
        </div>
        <div class="hilang" id="form-ganti">
            <form action="/gantisandi" method="post" id="gantisandi-form">
                @csrf
                <center>
                    <div class="h1 mb-4" style="font-style: bold;">Ubah password</div>
                </center>
                <div class=" mb-4">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="" id="basic-addon1">
                                <li class="fa fa-user mr-2 mt-2"></li>
                            </span>
                        </div>
                        <input required="" type="text" placeholder="ID" name="username" class="form-control @error('username') is-invalid @enderror garis">
                        @error('username')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="bg-transparent" id="basic-addon1">
                                <li class="fa fa-unlock mr-2 mt-2"></li>
                            </span>
                        </div>
                        <input required="" type="password" placeholder="Password" name="old_password" class="form-control @error('old_password') is-invalid @enderror garis">
                        @error('old_password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="bg-transparent" id="basic-addon1">
                                <li class="fa fa-lock mr-2 mt-2"></li>
                            </span>
                        </div>
                        <input required="" type="password" placeholder="New password" name="new_password" class="form-control @error('new_password') is-invalid @enderror garis">
                        @error('new_password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button id="btn-ganti" type="submit" class="btn btn-primary mt-3 p-2 w-100">
                            <li class="fa fa-lock"></li> Ubah Password
                        </button>
                        <div class="text-primary my-2 w-100" id="cancel" style="text-decoration: underline;cursor: pointer;">Login?</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row justify-content-center mx-1" id="foot-login">
    <div class="col-6 col-sm-6 col-md-8 col-lg-8 mt-5">
        <a href="#" class="text-primary">Cara voting? </a>
        <a href="#" class="text-primary"> Bantuan?</a>
    </div>
    <div class="col-6 col-sm-6 col-md-4 col-lg-4 mt-4" id="login-contact">
        <a href="https://web.facebook.com/profile.php?id=100010510620299" target="_blank"><i class="text-dark mt-2 mx-1 fa fa-facebook-official" aria-hidden="true" style="font-size: 26px"></i></a>
        <a href="https://api.whatsapp.com/send/?phone=6289513653977&text&app_absent=0" target="_blank"><i class="text-dark mx-1 mt-2 fa fa-whatsapp" aria-hidden="true" style="font-size: 26px"></i></a>
        <a href="https://www.instagram.com/riyan.rar/" target="_blank"><i class="text-dark mx-1 mt-2 fa fa-instagram" aria-hidden="true" style="font-size: 26px"></i></a>
        <a href="https://github.com/ryanm1928?tab=repositories" target="_blank"><i class="text-dark mx-1 mt-2 fa fa-github" aria-hidden="true" style="font-size: 26px"></i></a>
        <div class="text text-muted" style="font-size: 13px">made by MOHAMAD RIYAN</div>
    </div>
</div>
<script type="text/javascript" src="/js/script-login.js"></script>
@endsection
@section('content-alert')
<div class="row">
    <div class="col-sm-12">
        @if(session('status'))
        <div class="alert alert-danger w-100" style="position: absolute;z-index: 9999">
            <li class="fa fa-exclamation-triangle"></li> {{session('status')}}
        </div>
        @endif
        @if(session('berhasil'))
        <div class="alert alert-success w-100" style="position: absolute;z-index: 9999">
            <li class="fa fa-check-circle"></li> {{session('berhasil')}}
        </div>
        @endif
    </div>
</div>
@endsection
