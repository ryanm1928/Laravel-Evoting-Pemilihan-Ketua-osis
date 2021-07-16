@extends('template.header')

<body>
	<div class="wrapper">
		<!-- Sidebar  -->
		<nav id="sidebar">
			<div class="sidebar-header" style="font-size: 22px;font-style: bold;">
				<i class="fas fa-user-circle"></i> Admin Dashboard
			</div>
            <ul class="list-unstyled components">
                <li  class="@yield('home')" >
                 <a class=" " href="/admin" ><i class="fa fa-home" aria-hidden="true"></i></i> Home</a>
             </li>

             <li  class="@yield('buat')" >
                <a class="" href="{{ route('poll.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Buat Polling</a>
            </li>
            <li  class="@yield('lihat')" >
                <a class="" href="/resultvote">  <i class="fa fa-eye" aria-hidden="true"></i> Lihat Voting </a>
            </li>
            <li  class="@yield('datauser')" >
                <a class="" href="/datauser">  <i class="fa fa-chart-bar" aria-hidden="true"></i> Statistik Pengguna</a>
            </li>
            <li  class="@yield('tambah')" >
                <a class="" href="/manageuser"> <i class="fa fa-user-plus" aria-hidden="true"></i> Tambah Pengguna</a>
            </li>
            <li  class="@yield('pesan')" >
                <a class="" href="/mails">   <i class="fa fa-envelope" aria-hidden="true"></i> Pesan</a>
            </li>
            <li>
                <a class="" href="/logout">   <i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>

        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <nav class="nav-bar">
            <div class="">
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-toggle">
                    <i class="fa fa-2x fa-bars" aria-hidden="true"></i>
                    <span  ></span>
                </button>
            </div>
        </nav>
        <div class="container content">
            @yield('content')
        </div>

    </div>
</div>
@extends('template.footer')