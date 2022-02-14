<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Menu Penyelenggaraan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('theme/images/favicon.png') }}" rel="image/x-icon">
    <link href="{{ asset('theme/kilangstyles/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('theme/kilangstyles/vendor/aos/aos.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/bootstrap/css/bootstrap.min.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/boxicons/css/boxicons.min.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/glightbox/css/glightbox.min.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/remixicon/remixicon.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/swiper/swiper-bundle.min.css') }}" rel=" stylesheet">




    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/82f28bb8e5.js' crossorigin='anonymous'></script>



    <!-- Template Main CSS File -->
    <link href="{{ asset('theme/kilangstyles/css/adminstyle.css') }}" rel=" stylesheet">
    <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active" style="background-color: rgba(249, 208, 94)">
                <div class=" sidebar-header" style="margin-bottom: -20%;
                border-bottom: 2px solid rgb(0 0 0 / 24%);border-right: 1px solid #b0e9cc2b;
                box-shadow: 20px 0px 20px 0px rgb(22 44 60 / 21%); background-color: rgb(243, 213, 128)">

                    <img src="http://ekilang-mpob.test/mpob.png" style="float:left; margin-right:10%;margin-top:-10%;
                 width:50px; height:50px">
                    {{-- <strong>E-Kilang</strong><br />
                    <span>description</span> --}}

                    <h6 style="text-align:left; margin-left:15%; margin-top:-2%; color: rgb(29, 28, 24)">
                        <b>
                            E-Kilang</b>
                    </h6>
                    {{-- <img src="{{ asset('theme/images/logo.svg') }}" alt="" srcset=""> --}}
                    {{-- <img src="{{ asset('/mpob.png') }}" style="width:80px; height:80px"> --}}
                    {{-- <img src="{{ asset('/mspo.png') }}" style="width:80px; height:90px"> --}}

                </div>
                <br>


                <div class="sidebar-menu">
                    <ul class="menu">
                        {{-- <div class="container" style="margin-top: 30%; margin-left:6%; ">
                            <h6 style="color: rgb(54, 51, 41)"><b>KILANG BUAH</b></h6>
                        </div> --}}
                        </li>
                        <br>
                        <li class='mt-2 sidebar-title' style="color: rgb(54, 51, 41)">Menu Penyelenggaraan</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link' id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                                <i class="fas fa-user-edit" style="color:rgb(54, 51, 41) "></i>
                                <span><b>Profil Pelesen</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="{{ route('admin.senaraipelesenbuah') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Daftar Pelesen Baru</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.2tukarpassword') }}">
                                        <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="layout" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Tukar Kata Laluan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                                <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                <span><b>Papar Penyata</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%">

                                <li>
                                    <a href="{{ route('admin.6penyatapaparcetakbuah') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Senarai Penyata Bulanan</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.9penyataterdahulu') }}">
                                        <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="layout" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Penyata Terdahulu</span>
                                    </a>
                                </li>


                            </ul>

                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                                <i class="fas fa-people-arrows" style="color:rgb(54, 51, 41) "></i>
                                <span><b>Pindahan Data</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%">
                                <li>
                                    <a href="{{ route('admin.4ekilangpleid') }}">
                                        <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="user" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">e-Kilang ke PLEID</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.7portingmaklumat') }}">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Produk Sawit/Negara</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.8portdata') }}">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Stat Admin/Homepage</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.10portdatatodq') }}">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Dynamic Query</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                                <i class="fas fa-cogs" style="color:rgb(54, 51, 41) "></i>
                                <span><b>Konfigurasi</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%">
                                <li>
                                    <a href="{{ route('admin.pengurusan.pentadbir') }}">
                                        <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="user" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Pengurusan Pentadbir</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.pengumuman') }}">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Pengumuman</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.3daftarpenyata') }}">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); "><i>Initialize</i> Penyata Baharu</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                                <i class="fas fa-ellipsis-h" style="color:rgb(54, 51, 41) "></i>
                                <span><b>Lain-Lain</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%">
                                <li>
                                    <a href="{{ route('admin.direktori') }}">
                                        <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="user" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Direktori</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.panduan') }}">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Panduan Pengguna</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.11emel') }}">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Emel Pindaan</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.12validation') }}">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Validasi</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.kod.produk') }}">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Kod & Nama Produk</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Kod & Nama Negara</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                                <i class="fas fa-pen" style="color:rgb(54, 51, 41) "></i>
                                <span><b>Tetapan Akaun</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%">
                                <li>
                                    {{-- @foreach ($collection as $object) --}}
                                        {{-- {{ $object->title }} --}}

                                        <a href="{{ route('admin.akaun.pentadbir', [$user->id]) }}">
                                            <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "> </i>
                                            {{-- <i data-feather="user" width="20"></i> --}}
                                            <span style="color: rgb(0, 0, 0); ">Akaun Pentadbir</span>
                                        </a>
                                    {{-- @endforeach --}}
                                </li>

                                <li>
                                    <a href="{{ route('admin.tukarpassword') }}">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Tukar Kata Laluan</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="trending-up" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Log Keluar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>







        <div id="main">


            <nav class="navbar navbar-header navbar-expand navbar-light"
                style=" background:transparent; border-bottom: 2px solid rgba(0, 0, 0, 0.131); border-height:10px;">

                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand">

                    {{-- <img src="theme/images/background/favicon.png" height='45px' alt=""> --}}
                    {{-- <img src="theme/images/background/mspo.png" height='60px' alt=""> --}}
                    <img src="{{ asset('/mpob.png') }}" height='50px' width='60px' alt=""
                        style="margin-left:25%; margin-top: 3px;">
                    {{-- <img src="{{ asset('/mspo.png') }}" height='80px' width='60px' alt="" style="margin-top: 20px; margin-right:10%"> --}}
                </a>

                <span class="mx-2 mt-2 mb-0 text-center navbar-brand h1"
                    style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)"><b
                        style="margin-left:10%;">
                        E-Kilang </b></span>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="mt-2">
                                    <i class="fa fa-bell" style="font-size:18px;"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='px-4 py-2'>Notifications</h6>
                                <ul class="rounded-none list-group">
                                    <li class="border-0 list-group-item align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li> --}}
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                {{-- <div class="avatar me-1">
                                    <img src="{{ asset('theme/images/avatar/avatar-girl.png') }}" alt="" srcset="">
                                </div> --}}
                                <div class="d-none d-md-block d-lg-inline-block">{{ auth()->user()->username }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Akaun Pengguna</a>
                                {{-- <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a> --}}
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Tetapan</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                    <i class="fa fa-sign-out m-r-5 m-l-5"></i> Log Keluar</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>
            <br>

            {{-- <div class="row justify-content-center" style="margin-bottom: 10%; margin-top: 5%">
                <div class="col-xl-12 col-lg-9">

                    <h3 style="font-size:25px; margin-top:-2%">MENU PENYELENGGARAAN</h3>
                    <h4 style="font-size:18px; ">Menu Penyelenggaraan Penyata Bulanan </h4>
                </div>
            </div> --}}
            <div class="main-content container-fluid">
                {{-- <div class="page-title">
                    <h3>Dashboard</h3>
                    <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
                </div> --}}
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Jumlah Penyata Bulanan Yang Sudah Dihantar</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="pl-3">
                                                {{-- <h1 class='mt-5'>$21,102</h1>
                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart" width="15"></i> +19%</span> than last month</p> --}}
                                                <div class="legends">
                                                    <h6 class='pl-3' style="margin-top: -5%">Bulan:</h6>
                                                    <h6 class='pl-3' style="margin-bottom: 10%">Tahun:</h6>
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-red me-2'></div><span
                                                            class='text-xs'>Kilang
                                                            Buah</span>
                                                    </div>
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-green me-2'></div><span
                                                            class='text-xs'>Kilang Penapis</span>
                                                    </div>
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-orange me-2'></div><span
                                                            class='text-xs'>Kilang Isirung</span>
                                                    </div>
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-yellow me-2'></div><span
                                                            class='text-xs'>Kilang Oleokimia</span>
                                                    </div>
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-purple me-2'></div><span
                                                            class='text-xs'>Pusat Simpanan</span>
                                                    </div>
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-blue me-2'></div><span
                                                            class='text-xs'>Kilang Biodiesel</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <canvas id="bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <section id="hero" class="d-flex align-items-center ">
                                <div class="container position-relative" data-aos="fade-up" data-aos-delay="100"
                                    align="center">
                                    <div class="row justify-content-center" style="margin-bottom: 10%; margin-top: 5%">
                                        <div class="col-xl-12 col-lg-9">

                                            <h3 style="font-size:25px; margin-top:-5%">MENU PENYELENGGARAAN</h3>
                                            <h4 style="font-size:18px; ">Menu Penyelenggaraan Penyata Bulanan </h4>
                                        </div>
                                    </div>

                                    <div class="row icon-boxes" style="margin-top: -5%; margin-bottom:8%"
                                        align="center">
                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate"
                                            data-aos="zoom-in" data-aos-delay="200">
                                            <div class="icon-box">
                                                <div class="icon"><i class="fa fa-file-text-o fa-xs"></i>
                                                </div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.senaraipelesenbuah') }}">
                                                        Daftar
                                                        Pelesen</a></h4>
                                                <p class="description">Daftar maklumat pelesen, cipta id pengguna dan
                                                    password bagi
                                                    pelesen</p>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="200">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-key fa-xs"></i>
                                                </div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.2tukarpassword') }}">Tukar
                                                        Kata
                                                        Laluan</a></h4>
                                                <p class="description">Tukar kata laluan pelesen bagi kes lupa
                                                    laluan</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="300">
                                            <div class="icon-box">
                                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            3
                                        </strong>
                                    </span>
                                    </div> --}}
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-file-signature fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.3daftarpenyata') }}">Daftar
                                                        Penyata Bulanan Baru</a></h4>
                                                <p class="description">Daftar penyata bulanan baru bagi semua
                                                    pelesen
                                                    (Initialization
                                                    Penyata Bulanan)</p>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row icon-boxes" style="margin-top: -5%; margin-bottom:8%"
                                        align="center">
                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="400">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-file-export fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.4ekilangpleid') }}">E-Kilang
                                                        ke PLEID</a></h4>
                                                <p class="description">Pindah data dari E-Kilang ke PLEID</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="500">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-ban fa-xs"></i>
                                                </div>

                                                <h4 class="title"><a
                                                        href="{{ route('admin.6penyatapaparcetakbuah') }}">
                                                        Senarai Penyata Bulanan</a></h4>
                                                <p class="description">Senarai penyata bulanan terkini dan yang
                                                    belum
                                                    dihantar untuk
                                                    cetakan</p>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="500">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fa fa-upload fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.7portingmaklumat') }}">Port
                                                        Maklumat</a></h4>
                                                <p class="description">Pemindahan maklumat produk sawit dan maklumat
                                                    negara
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row icon-boxes" style="margin-top: -5%; margin-bottom:8%"
                                        align="center">
                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="500">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-eject fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.8portdata') }}">Port
                                                        Data</a>
                                                </h4>
                                                <p class="description">Pemindahan Data ke Stat Admin dan Stat
                                                    Homepage</p>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="500">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-folder-open fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.9penyataterdahulu') }}">Penyata
                                                        Bulan Terdahulu</a>
                                                </h4>
                                                <p class="description"> Papar penyata bulanan terdahulu di e-Kilang
                                                    dan
                                                    PLEID</p>
                                            </div>
                                        </div>



                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="500">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-file-archive fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.10portdatatodq') }}">Port
                                                        Data Ke Dynamic Query</a></h4>
                                                <p class="description">Pemindahan Data Ke Dynamic Query</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row icon-boxes" style="display: flex;
                                justify-content: center;
                                flex-direction: row; margin-top: -5%; margin-bottom:8%">
                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="500">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fa fa-envelope fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.11emel') }}">Emel
                                                        Pertanyaan
                                                        / Pindaan / Cadangan</a>
                                                </h4>
                                                <p class="description">Senarai Emel Pertanyaan / Pindaan / Cadangan
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0"
                                            data-aos="zoom-in" data-aos-delay="500">
                                            <div class="icon-box">
                                                <div class="icon" style="text-align: center"><i
                                                        class="fas fa-check-double fa-xs"></i></div>
                                                <h4 class="title"><a
                                                        href="{{ route('admin.12validation') }}">Validasi</a>
                                                </h4>
                                                <p class="description">Validasi - Semakan FFBProses dan Kapasiti</p>
                                            </div>
                                        </div>



                                    </div>

                                    <br>
                                    <br>
                                </div>
                            </section><!-- End Hero -->
                        </div>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Peratusan Penghantaran Penyata Bulanan</h4>
                                </div>
                                <div class="card-body">
                                    {{-- <div id="radialBars"></div> --}}
                                    <div id="piechart" style="margin-left:-25%"></div>
                                    {{-- <div class="text-center mb-5">
                                <h6>From last month</h6>
                                <h1 class='text-green'>+$2,134</h1>
                            </div> --}}
                                </div>
                            </div>
                            <div class="card widget-todo" style="margin-top: 5%" align="center">
                                <div
                                    class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h4 class="card-title d-flex">
                                        Menu Lain - Lain
                                    </h4>

                                </div>
                                <div class="card-body px-0 py-1">
                                    <table class='table table-borderless'>
                                        <tr>
                                            <td class='col-3'><a href="{{ route('admin.direktori') }}">
                                                    <img src="{{ asset('theme/kilangstyles/img/testimonials/dir4.png') }}"
                                                        class="testimonial-img" alt=""
                                                        style="height: 100%; width:100%; margin-left:70%">
                                                </a></td>
                                            <td class='col-9'>
                                                <h4 style="margin-left:20%; font-size:18px">Direktori</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'><a href="{{ route('admin.pengumuman') }}">
                                                    <img src="{{ asset('theme/kilangstyles/img/testimonials/ann2.png') }}"
                                                        class="testimonial-img" alt=""
                                                        style="height: 100%; width:100%; margin-left:70%">
                                                </a></td>
                                            <td class='col-9'>
                                                <h4 style="margin-left:20%; font-size:18px">Pengumuman</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'><a href="{{ route('admin.panduan') }}">
                                                    <img src="{{ asset('theme/kilangstyles/img/testimonials/manual.png') }}"
                                                        class="testimonial-img" alt=""
                                                        style="height: 100%; width:100%; margin-left:70%">
                                                </a></td>
                                            <td class='col-9'>
                                                <h4 style="margin-left:20%; font-size:18px">Panduan Pengguna</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'><a href="{{ route('admin.tukarpassword') }}">
                                                    <img src="{{ asset('theme/kilangstyles/img/testimonials/cp.png') }}"
                                                        class="testimonial-img" alt=""
                                                        style="height: 100%; width:100%; margin-left:70%">
                                                </a></td>
                                            <td class='col-9'>
                                                <h4 style="margin-left:20%; font-size:18px">Tukar Kata Laluan</h4>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-1">
                            <table class='table table-borderless'>
                                <tr>
                                    <td class='col-3'><a href="{{ route('admin.direktori') }}">
                                            <img src="{{ asset('theme/kilangstyles/img/testimonials/dir4.png') }}"
                                                class="testimonial-img" alt=""
                                                style="height: 100%; width:100%; margin-left:50%">
                                        </a></td>
                                    <td class='col-9'>
                                        <h4 style="margin-left:30%; font-size:18px">Direktori</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class='col-3'><a href="{{ route('admin.pengumuman') }}">
                                            <img src="{{ asset('theme/kilangstyles/img/testimonials/ann2.png') }}"
                                                class="testimonial-img" alt=""
                                                style="height: 100%; width:100%; margin-left:50%">
                                        </a></td>
                                    <td class='col-9'>
                                        <h4 style="margin-left:40%; font-size:18px">Pengumuman</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class='col-3'><a href="{{ route('admin.panduan') }}">
                                            <img src="{{ asset('theme/kilangstyles/img/testimonials/manual.png') }}"
                                                class="testimonial-img" alt=""
                                                style="height: 100%; width:100%; margin-left:50%">
                                        </a></td>
                                    <td class='col-9'>
                                        <h4 style="margin-left:40%; font-size:18px">Panduan Pengguna</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class='col-3'><a href="{{ route('admin.tukarpassword') }}">
                                            <img src="{{ asset('theme/kilangstyles/img/testimonials/cp.png') }}"
                                                class="testimonial-img" alt=""
                                                style="height: 100%; width:100%; margin-left:50%">
                                        </a></td>
                                    <td class='col-9'>
                                        <h4 style="margin-left:40%; font-size:18px">Tukar Kata Laluan</h4>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>

        </div>
        </section>
    </div>










    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- <footer>
                <div class="footer text-muted">
                    <div style="text-align: center">
                        <p style="font-size:10px">Developed by Artanis Cloud</a></p>
                    </div>
                </div>
            </footer> --}}



    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    {{-- <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> --}}


    <script href="{{ asset('theme/kilangstyles/vendor/purecounter/purecounter.js') }}"" rel=" stylesheet"></script>
    <script href="{{ asset('theme/kilangstyles/vendor/aos/aos.js') }}"" rel=" stylesheet"></script>
    <script href="{{ asset('theme/kilangstyles/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"" rel=" stylesheet">
    </script>
    <script href="{{ asset('theme/kilangstyles/vendor/glightbox/js/glightbox.min.js') }}"" rel=" stylesheet"></script>
    <script href="{{ asset('theme/kilangstyles/vendor/isotope-layout/isotope.pkgd.min.js') }}"" rel=" stylesheet">
    </script>
    <script href="{{ asset('theme/kilangstyles/vendor/swiper/swiper-bundle.min.js') }}"" rel=" stylesheet"></script>
    <script href="{{ asset('theme/kilangstyles/vendor/php-email-form/validate.js') }}"" rel=" stylesheet"></script>



    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>
    <script src="{{ asset('theme/vendors/chartjs/Chart.min.css') }}"></script>
    <script src="{{ asset('theme/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('theme/js/main.js') }}"></script>

    <!-- Template Main JS File -->

    <script href="{{ asset('theme/kilangstyles/js/main.js') }}"" rel=" stylesheet"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Kategori', 'Peratusan'],
                ['Sudah Hantar', 174],
                ['Belum Hantar', 85],
                //   ['Eat', 2],
                //   ['TV', 2],
                //   ['Gym', 2],
                //   ['Sleep', 8]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                'width': 400,
                'height': 250
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

    {{-- <script>
            window.addEventListener("load", function() {
                $.ajax({
                    url: "{{ route('graph_dashboard.default') }}",
                    method: "get",
                    dataType: "JSON",
                    success: function(data) {
                        drawChart(data.query_now);
                    }
                });
            });


        $(document).ready(function() {
            $('#bar').change(function() {
                var shuttle = $(this).val();
                if (shuttle != '') {
                    load_data(shuttle);
                }
            });
        });

        function load_data(shuttle) {
            $.ajax({
                url: "{{ route('graph_dashboard') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    shuttle_type: shuttle,
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data.query_now);
                    drawChart(data.query_now);
                }
            });
        }
        </script> --}}


</body>

</html>
