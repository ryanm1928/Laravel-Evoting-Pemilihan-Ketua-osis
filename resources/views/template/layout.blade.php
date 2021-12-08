<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/header/style.css">
    <link rel="stylesheet" href="/icon/css/font-awesome.min.css">

    <!-- Our Custom CSS -->
    <!-- Font Awesome JS -->
    
    <script src="/js/jquery-slim.js"></script>
</head>

<body>
	<div class="wrapper">
		<!-- Sidebar  -->
		<nav id="sidebar">
			<div class="sidebar-header" style="font-size: 22px;font-style: bold;">
				<i class="fa fa-user-circle" aria-hidden="true"></i> Admin Dashboard
			</div>
            <ul class="list-unstyled components">
                <li  class="@yield('home')" >
                   <a class=" " href="/admin" ><i class="fa fa-home" aria-hidden="true"></i></i> Home</a>
               </li>

               <li  class="@yield('buat')" >
                <a class="" href="{{ route('poll.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Buat Voting</a>
            </li>
            <li  class="@yield('lihat')" >
                <a class="" href="/resultvote">  <i class="fa fa-eye" aria-hidden="true"></i> Lihat Voting </a>
            </li>
            <li  class="@yield('datauser')" >
                <a class="" href="/datauser">  <i class="fa fa-bar-chart" aria-hidden="true"></i> Statistik Pengguna</a>
            </li>
            <li  class="@yield('tambah')" >
                <a class="" href="/manageuser"> <i class="fa fa-user-plus" aria-hidden="true"></i> Tambah Pengguna</a>
            </li>
            <li  class="@yield('managekelas')" >
                <a class="" href="{{ route('kelas.index') }}"> <i class="fa fa-university" aria-hidden="true"></i></i> Data Kelas</a>
            </li>
            <li  class="@yield('kelas')" >
                <a class="" href="/datasiswa"> <i class="fa fa-users" aria-hidden="true"></i></i> Data Pengguna</a>
            </li>
            <li  class="@yield('pesan')" >
                <a class="" href="/mails">   <i class="fa fa-envelope" aria-hidden="true"></i> Pesan</a>
            </li>
            <li  class="@yield('contact')" >
                <a class="" href="/contact"><i class="fa fa-user-secret" aria-hidden="true"></i> Contact</a>
            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                        <button class="text-light" id="btn-logout" type="submit" style="background-color: transparent;border: none;">
                            <i class="fa fa-sign-out text-left" aria-hidden="true"></i> Logout
                        </button>
                </form>
            </li>
        </ul>
        <div>
            <div class="fs-5 mx-2">Evoting ©{{ date('Y') }}</div>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <nav class="nav-bar">
            <div class="">
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-toggle">
                    <i class="fa fa-2x fa-bars" aria-hidden="true"></i>
                </button>
            </div>
        </nav>
        <div class="container content">
            @yield('content')
        </div>

    </div>
</div>
</body>
<script src="/js/jquery.js"></script>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="/footer/script.js"></script>
</body>

</html>