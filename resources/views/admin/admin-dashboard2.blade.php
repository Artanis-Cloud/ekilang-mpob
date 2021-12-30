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
    <link href="{{ asset('theme/kilangstyles/css/adminstyle.css') }}"" rel=" stylesheet">
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
            <div class="sidebar-wrapper active" style="background-color: rgba(87, 168, 137, 0.664)">
                <div class="mt-2 sidebar-header">
                    <h2 style="text-align:left; font-family:Verdana; margin-right:30%; color: rgb(78, 73, 57)"><b>
                            E-Kilang </b>
                    </h2>
                    {{-- <img src="{{ asset('theme/images/logo.svg') }}" alt="" srcset=""> --}}
                    <img src="{{ asset('/mpob.png') }}" style="width:60px; height:60px">
                    <img src="{{ asset('/mspo.png') }}" style="width:60px; height:70px">

                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Menu Penyelenggaraan</li>


                        <li class="sidebar-item ">
                            <a href="{{ route('admin.kilangbuah') }}" class='sidebar-link'>
                            {{-- <a href="index.html" class='sidebar-link'> --}}
                                <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i class="fas fa-seedling" style="color: rgb(54, 51, 41)" data-feather="home" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57)">Kilang Buah</span>
                            </a>

                        </li>

                        {{-- <li class="sidebar-item has-sub"> --}}
                        <li class="sidebar-item">
                            <a href="{{ route('admin.kilangpenapis') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="triangle" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Kilang Penapis</span>
                            </a>


                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.kilangisirung') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-tint" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); margin-left:21px ">Kilang Isirung</span>
                            </a>



                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.kilangoleokimia') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57);">Kilang Oleokimia</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pusatsimpanan') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57);">Pusat Simpanan</span>
                            </a>

                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57)">E-Biodiesel</span>
                            </a>


                        </li>
                        <br>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Tetapan Akaun</li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-user" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-text" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Akaun Pentadbir</span>
                            </a>



                        </li>

                        <li class="sidebar-item ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="fa fa-gear" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layout" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Tetapan</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="form-editor.html" class='sidebar-link'>
                                <i class="fa fa-sign-out" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layers" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Log Keluar</span>
                            </a>

                        </li>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">


            <nav class="navbar navbar-header navbar-expand navbar-light" style=" background:transparent">

                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand">

                    {{-- <img src="theme/images/background/favicon.png" height='45px' alt=""> --}}
                    {{-- <img src="theme/images/background/mspo.png" height='60px' alt=""> --}}
                    <img src="{{ asset('/mpob.png') }}" height='40px' width='50px' alt=""
                        style="margin-left: 10%; margin-right:2%;">
                    <img src="{{ asset('/mspo.png') }}" height='46px' width='35px' alt=""
                        style=" margin-right:10%; margin-left:2%;">
                </a>

                <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                    style="color: black; text-align:center; margin-left:10%; font-family:verdana; color: rgba(47, 112, 88, 0.726)"><b
                        style="margin-left:30%;">
                        E-Kilang </b></span>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
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
                                <div class="avatar me-1">
                                    <img src="{{ asset('theme/images/avatar/avatar-girl.png') }}" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hai, Syn</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Akaun Pengguna</a>
                                {{-- <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a> --}}
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Tetapan</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Log Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>



            <!-- ======= Header ======= -->
            {{-- <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="">Kilang Buah</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto o" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header --> --}}

            <!-- ======= Hero Section ======= -->
            <section id="hero" class="d-flex align-items-center ">
                <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="row justify-content-center" style="margin-bottom: 10%">
                        <div class="col-xl-12 col-lg-9">

                            <h1 style="font-size:40px;">MENU PENYELENGGARAAN</h1>
                            <h2>Menu Penyelenggaraan Penyata Bulanan </h2>
                        </div>
                    </div>
                    {{-- <div class="text-center">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div> --}}

                    <div class="row icon-boxes" style="margin-top: -5%; margin-bottom:8%">
                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate"
                            data-aos="zoom-in" data-aos-delay="200">

                            <div class="icon-box">
                                {{-- <div class="icon">
                                <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                    <strong class="" style="font-size:20px;">
                                        1
                                    </strong>
                                </span>
                                </div> --}}
                                <div class="icon"><i class="fa fa-file-text-o fa-xs"></i></div>
                                <h4 class="title"><a href="">1. Daftar Pelesen</a></h4>
                                <p class="description">Daftar maklumat pelesen, cipta id pengguna dan password bagi
                                    pelesen</p>
                            </div>
                        </div>


                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="200">

                            <div class="icon-box">
                                {{-- <div class="icon">
                                <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                    <strong class="" style="font-size:20px;">
                                        2
                                    </strong>
                                </span>
                                </div> --}}
                                {{-- <div class="text-center"> --}}
                                <div class="icon" style="text-align: center"><i class="fas fa-key fa-xs"></i>
                                </div>
                                <h4 class="title"><a href="">2. Tukar Kata Laluan</a></h4>
                                <p class="description">Tukar kata laluan pelesen bagi kes lupa laluan</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="300">
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
                                <h4 class="title"><a href="">3. Daftar Penyata Bulanan Baru</a></h4>
                                <p class="description">Daftar penyata bulanan baru bagi semua pelesen (Initialization
                                    Penyata Bulanan)</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="400">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            4
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fas fa-file-export fa-xs"></i></div>
                                <h4 class="title"><a href="">4. E-Kilang ke PLEID</a></h4>
                                <p class="description">Pindah data dari E-Kilang ke PLEID</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            5
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i class="fas fa-ban fa-xs"></i>
                                </div>

                                <h4 class="title"><a href="">5. Penyata Bulanan Belum Dihantar</a></h4>
                                <p class="description"> Senarai penyata bulanan yang belum dihantar</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i class="fa fa-print fa-xs"></i>
                                </div>
                                <h4 class="title"><a href="">6. Papar & Cetak Penyata Bulanan</a></h4>
                                <p class="description">Papar penyata bulanan untuk cetakan</p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row icon-boxes" style="margin-top: -5%; margin-bottom:8%">
                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box"> --}}
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                {{-- <div class="icon" style="text-align: center"><i class="	fa fa-calendar-o fa-xs"></i>
                                </div>
                                <h4 class="title"><a href="">7. Penyata Bulan Terkini</a></h4>
                                <p class="description">Senarai penyata bulanan terkini</p>
                            </div>
                        </div> --}}

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fa fa-upload fa-xs"></i></div>
                                <h4 class="title"><a href="">8. Porting Maklumat Sawit</a></h4>
                                <p class="description">Pemindahan maklumat produk sawit</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fa fa-globe fa-xs"></i></div>
                                <h4 class="title"><a href="">9. Porting Maklumat Negara</a></h4>
                                <p class="description">Pemindahan maklumat negara</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="	fas fa-share-square fa-xs"></i></div>
                                <h4 class="title"><a href="">10. Porting Maklumat Pelesen </a></h4>
                                <p class="description">Pemindahan maklumat pelesen ke BEPI</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fas fa-eject fa-xs"></i></div>
                                <h4 class="title"><a href="">11. Port Data ke Stat Admin</a></h4>
                                <p class="description">Pemindahan Data ke Stat Admin</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="	fas fa-laptop-house fa-xs"></i></div>
                                <h4 class="title"><a href="">12. Port Data ke Stat Homepage</a></h4>
                                <p class="description">Pemindahan Data ke Stat Homepage</p>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row icon-boxes" style="margin-top: -5%; margin-bottom:8%; display: flex;
                        justify-content: center;
                        flex-direction: row;">
                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fas fa-folder-open fa-xs"></i></div>
                                <h4 class="title"><a href="">13. Penyata Bulan Terdahulu di e-Kilang</a>
                                </h4>
                                <p class="description"> Papar penyata bulanan terdahulu di e-Kilang</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="	fas fa-archive fa-xs"></i></div>
                                <h4 class="title"><a href="">14. Penyata Bulan Terdahulu di PLEID</a></h4>
                                <p class="description">Papar penyata bulanan terdahulu di PLEID</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fas fa-file-archive fa-xs"></i></div>
                                <h4 class="title"><a href="">15. Port Data Ke Dynamic Query</a></h4>
                                <p class="description">Pemindahan Data Ke Dynamic Query</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fa fa-envelope fa-xs"></i></div>
                                <h4 class="title"><a href="">16. Emel Pertanyaan / Pindaan / Cadangan</a>
                                </h4>
                                <p class="description">Senarai Emel Pertanyaan / Pindaan / Cadangan</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box">
                                {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                                <div class="icon" style="text-align: center"><i
                                        class="fas fa-check-double fa-xs"></i></div>
                                <h4 class="title"><a href="">17. Validasi</a></h4>
                                <p class="description">Validasi - Semakan FFBProses dan Kapasiti</p>
                            </div>
                        </div>

                        {{-- <div class="col-md-4 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                            data-aos-delay="500">
                            <div class="icon-box"> --}}
                        {{-- <div class="icon">
                                    <span class="fa-stack" style="margin-top:-15%; margin-bottom:-15%" >
                                        <strong class="" style="font-size:20px;">
                                            6
                                        </strong>
                                    </span>
                                    </div> --}}
                        {{-- <div class="icon" style="text-align: center"><i class="fa fa-print fa-xs"></i></div>
                                <h4 class="title"><a href="">12. Port Data ke Stat Homepage</a></h4>
                                <p class="description">Pemindahan Data ke Stat Homepage</p>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div> --}}

                    </div>
                    <br>
                    <br>
                </div>
            </section><!-- End Hero -->


            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Menu Lain-Lain</h2>
                        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                    </div>

                    {{-- <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100"> --}}
                    <div class="swiper-wrapper">
                        <div class="row" style=" display: flex;
                        justify-content: center;
                        flex-direction: row; margin-left:5%; margin-right:5%;">
                            <div class="col-md-4 col-lg-3">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                            Maecen aliquam, risus at semper.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/email2.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Emel Semua Pelesen Aktif</h3>
                                        <h4>Penghantaran e-mail kepada semua pelesen aktif</h4>
                                    </div>
                                </div><!-- End testimonial item -->
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum
                                            quid cillum eram malis quorum velit fore eram velit sunt aliqua noster
                                            fugiat
                                            irure amet legam anim culpa.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/dir4.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Direktori</h3>
                                        <h4>Direktori</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="col-md-4 col-lg-3">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                            quem
                                            veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                            quis
                                            sint minim.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/ann2.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Pengumuman</h3>
                                        <h4>Pengumuman</h4>
                                    </div>
                                </div>

                            </div><!-- End testimonial item -->

                            {{-- <div class="row"> --}}
                            <div class="col-md-4 col-lg-3">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export
                                            minim
                                            fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit
                                            fore
                                            quem dolore labore illum veniam.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/sch.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Jadual Penerimaan PL</h3>
                                        <h4>Jadual Penerimaan PL Bagi Semua Sektor</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/list.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Senarai Gagal Penerimaan PL</h3>
                                        <h4>Senarai Gagal Penerimaan PL </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/manual.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Panduan Penyelenggaraan</h3>
                                        <h4>Panduan bagi menyelenggara penyata bulanan</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/uem.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Emel Pelesen</h3>
                                        <h4>Penghantaran e-mail kepada pelesen</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/cp.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Tukar Kata Laluan</h3>
                                        <h4>Tukar kata laluan bagi pengguna</h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>


                </div>

        </div>
        </section><!-- End Testimonials Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer>
            <div class="footer text-muted">
                {{-- <div class="float-start">
            <p>2020 &copy; Voler</p>
        </div> --}}
                <div style="text-align: center">
                    <p style="font-size:10px">Developed by Artanis Cloud</a></p>
                </div>
            </div>
        </footer>



        {{-- <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>OnePage</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>OnePage</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer --> --}}

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

        <script src="{{ asset('theme/vendors/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('theme/vendors/apexcharts/apexcharts.min.js') }}"></script>
        {{-- <script src="{{ asset('theme/js/pages/dashboard.js') }}"></script> --}}

        <script src="{{ asset('theme/js/main.js') }}"></script>

        <!-- Template Main JS File -->

        <script href="{{ asset('theme/kilangstyles/js/main.js') }}"" rel=" stylesheet"></script>


        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


</body>

</html>
