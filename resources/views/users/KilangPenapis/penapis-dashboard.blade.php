<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Kilang Penapis</title>
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
    <link href="{{ asset('theme/kilangstyles/css/penapisstyle.css') }}"" rel=" stylesheet">
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
                <div class="mt-3 sidebar-header" style="margin-bottom: -5%">

                    <img src="{{ asset('/mpob.png') }}"
                        style="float:left; margin-right:10%; width:60px; height:55px">
                    {{-- <strong>E-Kilang</strong><br />
                    <span>description</span> --}}

                    <h4
                        style="text-align:left; font-family:Verdana; margin-left:15%; margin-top:5%; color: rgb(78, 73, 57)">
                        <b>
                            E-Kilang </b>
                    </h4>
                    {{-- <img src="{{ asset('theme/images/logo.svg') }}" alt="" srcset=""> --}}
                    {{-- <img src="{{ asset('/mpob.png') }}" style="width:80px; height:80px"> --}}
                    {{-- <img src="{{ asset('/mspo.png') }}" style="width:80px; height:90px"> --}}

                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <div class="container" style="margin-top: 30%; margin-left:6%; ">
                            <h6 style="color: rgb(54, 51, 41)"><b>KILANG PENAPIS</b></h6>
                        </div>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Maklumat Pelesen</li>


                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.maklumatasaspelesen') }}" class='sidebar-link'>
                                <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i class="fas fa-seedling" style="color: rgb(54, 51, 41)" data-feather="home" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57)">Maklumat Asas Pelesen</span>
                            </a>

                        </li>

                        {{-- <li class="sidebar-item has-sub"> --}}
                        <li class="sidebar-item">
                            <a href="{{ route('penapis.tukarpassword') }}" class='sidebar-link'>
                                <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="triangle" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Tukar Kata Laluan</span>
                            </a>



                        </li>
                        <br>


                        </li>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Kemasukan Penyata Bulanan</li>

                        <li class="sidebar-item">
                            <a href="{{ route('penapis.bahagiani') }}" class='sidebar-link'>
                                <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-text" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian I</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianii') }}" class='sidebar-link'>
                                <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layout" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian II</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianiii') }}" class='sidebar-link'>
                                <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layers" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian III</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianiva') }}"class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="grid" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian IV(a)</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianivb') }}"class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="grid" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian IV(b)</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianva') }}" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian V(a)</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianvb') }}" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian V(b)</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianvi') }}" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian VI</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('penapis.bahagianvii') }}" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian VII</span>
                            </a>

                        </li>
                        {{-- <li class="sidebar-item ">
                            <a href="{{ route ('penapis.bahagianvi') }}" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i> --}}
                        {{-- <i data-feather="file-plus" width="20"></i> --}}
                        {{-- <span style="color: rgb(78, 73, 57); ">Bahagian VI</span>
                            </a>

                        </li> --}}
                        <li class="sidebar-item ">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Papar & Hantar Penyata Bulanan</span>
                            </a>

                        </li>
                        <br>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Menu-Menu Lain</li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="user" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">E-mail Pertanyaan / Pindaan / Cadangan</span>
                            </a>



                        </li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-globe" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="trending-up" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Prestasi OER</span>
                            </a>


                        </li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="trending-up" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Papar Penyata Bulanan Terdahulu</span>
                            </a>

                            {{-- <ul class="submenu ">

                                <li>
                                    <a href="ui-chart-chartjs.html">ChartJS</a>
                                </li>

                                <li>
                                    <a href="ui-chart-apexchart.html">Apexchart</a>
                                </li>

                            </ul> --}}

                        </li>
                        <br>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">

            {{-- <nav class="shadow-sm navbar navbar-expand-md" style="background: transparent">

                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">

                        <img src="theme/images/background/favicon.png" height='45px' alt="">
                        <img src="theme/images/background/mspo.png" height='60px' alt="">
                    </a>
                    <div class="col-md-3"></div>
                    <div class="col-md-1">
                        {{-- <a class="mx-1 navbar-brand" href="{{ url('/') }}">

                                <img src="theme/images/background/favicon.png"  height='45px' alt="">
                                <img src="theme/images/background/mspo.png"  height='60px' alt=""> --}}

            {{-- <span class="mx-5 mb-0 text-center navbar-brand h1"
                                style="color: white; text-align:center; font-family:verdana"><b>
                                    Sistem E-Kilang </b></span> --}}


            {{-- </a> --}}
            {{-- </div> --}}


            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand">

                    {{-- <img src="theme/images/background/favicon.png" height='45px' alt=""> --}}
                    {{-- <img src="theme/images/background/mspo.png" height='60px' alt=""> --}}
                    <img src="{{ asset('/mpob.png') }}" height='60px' width='70px' alt=""
                        style="margin-left:25%; margin-top: 15px;">
                    {{-- <img src="{{ asset('/mspo.png') }}" height='80px' width='60px' alt="" style="margin-top: 20px; margin-right:10%"> --}}
                </a>

                <span class="mx-2 mt-3 mb-0 text-center navbar-brand h1"
                    style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)"><b
                        style="margin-left:10%;">
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
            <br>




            <!-- ======= Hero Section ======= -->
            <section id="hero" class="d-flex align-items-center ">
                <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                    <div class="row justify-content-center" style="margin-bottom: 3%">
                        <div class="col-xl-12 col-lg-9">

                            <h1 style="font-size:40px;">KILANG PENAPIS</h1>
                            <h2>Penyata Bulanan Kilang Penapis</h2>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-md-12">
                            <div class="card" style="margin-right:10%; margin-left:10%">
                                <div class="card-header border-bottom">
                                    <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                                </div>
                                <br>
                                <br>
                                <div class="card-body">
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-12"> --}}
                                        <div class="pl-3">

                                            <ul>
                                                <li style="text-align: justify">Berkuatkuasa 1 Mac 2021, <b> ses minyak
                                                        sawit mentah yang
                                                        perlu dibayar di bawah
                                                        Perintah Lembaga Minyak Sawit Malaysia (Ses) pindaan 2021 adalah
                                                        sebanyak <span style="color:blue">RM16.00</span>
                                                        (Ringgit Malaysia : Enam Belas Sahaja) atas tiap-tiap tan metrik
                                                        atau sebahagian
                                                        daripada suatu tan metrik minyak sawit mentah yang
                                                        dikeluarkan.</b> Ses perlu
                                                    dibayar
                                                    kepada Lembaga tidak lewat dari hari terakhir setiap bulan dalam
                                                    satu tahun kalendar
                                                    atas minyak sawit mentah yang dikeluarkan olehnya dalam bulan yang
                                                    sebelumnya.
                                                    <span style="color:blue"><b>Pembayaran ses
                                                            perlu melalui akaun bank CIMB Islamik Malaysia dengan nombor
                                                            virtual akaun
                                                            seperti
                                                            berikut :</b></span><br>

                                                    <br>
                                                    <br>
                                                    <div class="container" style="
                                                            border: 1px solid black;">

                                                        <p class="card-text" style="text-align: justify;">
                                                            <br>
                                                            <b> Nama akaun : Lembaga Minyak Sawit Malaysia
                                                                <br>
                                                                <br>

                                                                Nombor Virtual Akaun : 98-997-333-000-XXX *
                                                                <br>(3 digit terakhir adalah sama seperti
                                                                nombor Virtual Akaun yang digunapakai bagi bayaran Ses
                                                                sebelum ini)</b>
                                                            <br>
                                                            <br>

                                                    </div>
                                                    <br>
                                                    <br> Jika terdapat sebarang pertanyaan atau kemusykilan berkenaan
                                                    bayaran ses, sila
                                                    hubungi
                                                    pegawai MPOB iaitu <b>Puan Nurul Asyikin (03-87694811)
                                                        (nurul.asyikin@mpob.gov.my) atau
                                                        Puan
                                                        Nurul Fara Ain (03-87694697)
                                                        (nurulfarain.rusdi@mpob.gov.my).</b>
                                                    <br>
                                                    <br>
                                                    Untuk muat turun borang pembayaran ses <a href="#"><b>Klik
                                                            sini</b></a> dan Surat
                                                    Makluman Cara Pembayaran Ses <a href="#"><b>Klik
                                                            sini</b></a><br>
                                                </li>
                                                <br>
                                                <li style="text-align: justify"> Penguatkuasaan Perintah Lembaga Minyak
                                                    Sawit Malaysia (Ses) (Pindaan) 2021 Ke Atas
                                                    Pemegang Lesen Kategori Kilang Penapis Kelapa Sawit (MF) dan Kilang
                                                    Pelumat Isirung Sawit
                                                    (CF). <a href="#"><b>Klik Disini</b></a>

                                                </li>
                                                <ul>
                                                    <br>
                                                    <br>




                                                    {{-- <h1 class='mt-5'>$21,102</h1>
                                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart" width="15"></i>
                                                        +19%</span> than last month</p>
                                                <div class="legends">
                                                    <div class="flex-row legend d-flex align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-info me-2'></div><span class='text-xs'>Last
                                                            Month</span>
                                                    </div>
                                                    <div class="flex-row legend d-flex align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-blue me-2'></div><span class='text-xs'>Current
                                                            Month</span>
                                                    </div>
                                                </div> --}}
                                        </div>
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-8 col-12">
                                            <canvas id="bar"></canvas>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Sebarang Pertanyaan Sila Hubungi:</h4>
                                    <div class="d-flex ">
                                        {{-- <i data-feather="download"></i> --}}
                            {{-- </div>
                                </div>
                                <div class="px-0 pb-0 card-body">
                                    <div class="table-responsive">
                                        <table class='table mb-0' id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Bahagian</th>
                                                    <th>Nama</th>
                                                    <th>No. Telefon</th>
                                                    <th>Emel</th> --}}
                            {{-- <th>Status</th> --}}
                            {{-- </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Penyata Bulanan Kilang Penapis - MPOB (EL) MF4</td>
                                                    <td>Pn. Nor Syaida</td>
                                                    <td>03-7802 2917</td>
                                                    <td>nor.syaida@mpob.gov.my</td> --}}
                            {{-- <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td> --}}
                            {{-- </tr>
                                                <tr>
                                                    <td>Penyata Bulanan Kilang Penapis - MPOB (EL) MF4</td>
                                                    <td>En. Rominizam</td>
                                                    <td>03-7802 2918</td>
                                                    <td>rominizam@mpob.gov.my</td> --}}
                            {{-- <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td> --}}
                            {{-- </tr>
                                                <tr>
                                                    <td>Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</td>
                                                    <td>Pn. Aziana</td>
                                                    <td>03-7802 2955</td>
                                                    <td>aziana.misnan@mpob.gov.my</td> --}}
                            {{-- <td>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    </td> --}}
                            {{-- </tr>
                                                <tr>
                                                    <td>Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</td>
                                                    <td>Pn. Aziana</td>
                                                    <td>03-7802 2955</td>
                                                    <td>aziana.misnan@mpob.gov.my</td> --}}
                            {{-- <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td> --}}
                            {{-- </tr>
                                                <tr>
                                                    <td>Penyata Bulanan Kilang Isirong - MPOB (EL) CF4 </td>
                                                    <td>Pn. Nor Baayah</td>
                                                    <td>03-7802 2865</td>
                                                    <td>abby@mpob.gov.my</td> --}}
                            {{-- <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td> --}}
                            {{-- </tr>
                                                <tr>
                                                    <td>Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</td>
                                                    <td>Pn. Nor Baayah</td>
                                                    <td>03-7802 2865</td>
                                                    <td>abby@mpob.gov.my</td> --}}
                            {{-- <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td> --}}
                            {{-- </tr>
                                                <tr>
                                                    <td>No Faks bagi Penyata Bulanan </td>
                                                    <td>-</td>
                                                    <td>03-7803 2323 / <br> 03-7803 1399</td>
                                                    <td>-</td> --}}
                            {{-- <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td> --}}
                            {{-- </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}



                            <div class="col-md-12">
                                <div class="card " style="margin-right: 10%; margin-left:10%">
                                    <div class="card-header border-bottom "
                                        style="background-color: rgba(47, 112, 88, 0.823)">
                                        <h4 style="color: white"><b>Peringatan</b></h4>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="card-body">
                                        <div id="radialBars"></div>
                                        <div class="mb-5 text-center">
                                            <h6 style="color:rgba(47, 112, 88, 0.823); text-align:left; text-align: justify; font-size:16px;
                                                                text-justify: inter-word;">Adalah menjadi kesalahan
                                                dibawah syarat-syarat
                                                dan
                                                sekatan
                                                lesen
                                                yang terkandung di bawah
                                                Peraturan 21(1), Peraturan-peraturan Lembaga Minyak Sawit
                                                Malaysia(Pelesenan) 2005, jika
                                                gagal/lewat menyerahkan Penyata Bulanan tidak lewat dari 7hb. bagi bulan
                                                berikutnya dan apabila
                                                disabitkan boleh dikenakan denda.</h6>
                                            {{-- <h1 class='text-green'>+$2,134</h1> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card widget-todo" style="margin-right: 10%; margin-left:10%">
                                    <div class="card-header border-bottom d-flex justify-content-between align-items-center"
                                        style="background-color: rgba(47, 112, 88, 0.823)">
                                        <h4 class="card-title d-flex">
                                            <i class='bx bx-check font-medium-5 pl-25 pr-75'></i><b
                                                style="color: white">Penafian
                                            </b>
                                        </h4>

                                    </div>
                                    <br>
                                    <br>
                                    <div class="card-body">
                                        <div id="radialBars"></div>
                                        <div class="mb-5 text-center">
                                            <h6 style="color:rgba(47, 112, 88, 0.823); text-align:left; text-align: justify; font-size:16px;
                                                                text-justify: inter-word;">Kerajaan Malaysia dan
                                                Lembaga Minyak Sawit
                                                Malaysia
                                                (MPOB)
                                                adalah
                                                tidak bertanggungjawab bagi apa-apa kehilangan atau kerugian yang
                                                disebabkan oleh penggunaan
                                                mana-mana maklumat yang diperolehi dari laman web ini .Syarikat-syarikat
                                                yang dirujuk di dalam
                                                laman web ini tidak boleh ditafsirkan sebagai ejen kepada, ataupun
                                                syarikat yang disyorkan oleh
                                                Lembaga Minyak Sawit Malaysia (MPOB).</h6>
                                            {{-- <h1 class='text-green'>+$2,134</h1> --}}
                                        </div>
                                    </div>







                                    {{-- <div class="px-0 py-1 card-body">
                                    <table class='table table-borderless'>
                                        <tr>
                                            <td class='col-3'>UI Design</td>
                                            <td class='col-6'>
                                                <div class="progress progress-info">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='text-center col-3'>60%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>VueJS</td>
                                            <td class='col-6'>
                                                <div class="progress progress-success">
                                                    <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='text-center col-3'>30%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>Laravel</td>
                                            <td class='col-6'>
                                                <div class="progress progress-danger">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='text-center col-3'>50%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>ReactJS</td>
                                            <td class='col-6'>
                                                <div class="progress progress-primary">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='text-center col-3'>80%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>Go</td>
                                            <td class='col-6'>
                                                <div class="progress progress-secondary">
                                                    <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='text-center col-3'>65%</td>
                                        </tr>
                                    </table>
                                </div> --}}
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                        <br>


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


    </section><!-- End Hero -->


    <!-- ======= Testimonials Section ======= -->
    {{-- <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu Lain-Lain</h2> --}}
                {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
            {{-- </div> --}}

            {{-- <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100"> --}}
            {{-- <div class="swiper-wrapper">
                <div class="row" style=" display: flex;
                        justify-content: center;
                        flex-direction: row; margin-left:5%; margin-right:5%;">
                    <div class="col-md-4 col-lg-3">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                            Maecen aliquam, risus at semper.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/email2.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Emel Semua Pelesen Aktif</h3>
                                <h4>Penghantaran e-mail kepada semua pelesen aktif</h4>
                            </div>
                        </div><!-- End testimonial item -->
                    </div> --}}

                    {{-- <div class="col-md-4 col-lg-3">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum
                                            quid cillum eram malis quorum velit fore eram velit sunt aliqua noster
                                            fugiat
                                            irure amet legam anim culpa.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/dir4.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Direktori</h3>
                                <h4>Direktori</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item --> --}}

                    {{-- <div class="col-md-4 col-lg-3">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                            quem
                                            veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                            quis
                                            sint minim.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/ann2.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Pengumuman</h3>
                                <h4>Pengumuman</h4>
                            </div>
                        </div>

                    </div><!-- End testimonial item -->

                    {{-- <div class="row"> --}}
                    {{-- <div class="col-md-4 col-lg-3">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export
                                            minim
                                            fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit
                                            fore
                                            quem dolore labore illum veniam.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/sch.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Jadual Penerimaan PL</h3>
                                <h4>Jadual Penerimaan PL Bagi Semua Sektor</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/list.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Senarai Gagal Penerimaan PL</h3>
                                <h4>Senarai Gagal Penerimaan PL </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/manual.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Panduan Penyelenggaraan</h3>
                                <h4>Panduan bagi menyelenggara penyata bulanan</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/uem.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Emel Pelesen</h3>
                                <h4>Penghantaran e-mail kepada pelesen</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                        <div class="swiper-slide">
                            <div class="testimonial-item"> --}}
                                {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/cp.png') }}"
                                    class="testimonial-img" alt="">
                                <h3>Tukar Kata Laluan</h3>
                                <h4>Tukar kata laluan bagi pengguna</h4>
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

        </div>
    </section><!-- End Testimonials Section --> --}}

    </main><!-- End #main -->

    {{-- <!-- ======= Footer ======= -->
    <footer>
        <div class="footer text-muted"> --}}
            {{-- <div class="float-start">
            <p>2020 &copy; Voler</p>
        </div> --}}
            {{-- <div style="text-align: center">
                <p style="font-size:10px">Developed by Artanis Cloud</a></p>
            </div>
        </div>
    </footer> --}}



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
