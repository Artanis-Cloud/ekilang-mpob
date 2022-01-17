<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-KILANG</title>

    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/kilangstyles/css/adminstyle.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/82f28bb8e5.js' crossorigin='anonymous'></script>
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

                    <h6
                        style="text-align:left; margin-left:15%; margin-top:-2%; color: rgb(29, 28, 24)">
                        <b>
                            E-Kilang</b>
                    </h6>
                    {{-- <img src="{{ asset('theme/images/logo.svg') }}" alt="" srcset=""> --}}
                    {{-- <img src="{{ asset('/mpob.png') }}" style="width:80px; height:80px"> --}}
                    {{-- <img src="{{ asset('/mspo.png') }}" style="width:80px; height:90px"> --}}

                </div>
                <br>
                <br>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class='mt-2 sidebar-title' style="color: rgb(54, 51, 41)">Menu Penyelenggaraan</li>


                        <li class="sidebar-item ">
                            <a href="{{ route('admin.senaraipelesen') }}" class='sidebar-link'>
                            {{-- <a href="index.html" class='sidebar-link'> --}}
                                <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i class="fas fa-seedling" style="color: rgb(54, 51, 41)" data-feather="home" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">1. Daftar Pelesen</span>
                            </a>

                        </li>

                        {{-- <li class="sidebar-item has-sub"> --}}
                        <li class="sidebar-item">
                            <a href="{{ route('admin.tukarpassword') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="triangle" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0); ">2. Tukar Kata Laluan</span>
                            </a>


                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.daftarpenyata') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-tint" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0); margin-left:21px ">3. Daftar Penyata Bulanan Baru</span>
                            </a>



                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.kilangoleokimia') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0);">4. E-Kilang ke PLEID</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pusatsimpanan') }}" class='sidebar-link'>
                            {{-- <a href="#" class='sidebar-link'> --}}
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0);">5. Penyata Bulanan Belum Dihantar</span>
                            </a>

                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">6. Papar & Cetak Penyata Bulanan</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">7. Porting Maklumat</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">8. Port Data</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">9. Penyata Bulan Terdahulu</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">10. Port Data Ke Dynamic Query</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">11. Emel Pertanyaan / Pindaan / Cadangan</span>
                            </a>


                        </li>
                        <li class="sidebar-item">
                            {{-- <a href="{{ route('admin.ebiodiesel') }}" class='sidebar-link'> --}}
                             <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0)">12. Validasi</span>
                            </a>


                        </li>


                        {{-- </li> --}}

                        <br>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Tetapan Akaun</li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-user" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-text" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0); ">Akaun Pentadbir</span>
                            </a>



                        </li>

                        <li class="sidebar-item ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="fa fa-gear" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layout" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0); ">Tetapan</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="form-editor.html" class='sidebar-link'>
                                <i class="fa fa-sign-out" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layers" width="20"></i> --}}
                                <span style="color: rgb(0, 0, 0); ">Log Keluar</span>
                            </a>

                        </li>



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
                                <div class="mt-2" >
                                    <i class="fa fa-bell" style="font-size:18px;" ></i>
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

            {{-- CONTENT BODY --}}
            @yield('content')

            {{-- <footer>
                <div class="footer text-muted"> --}}
                    {{-- <div class="float-start">
                        <p>2020 &copy; Voler</p>
                    </div> --}}
                    {{-- <div style="text-align: center">
                        <p style="font-size:10px">Developed by Artanis Cloud</a></p>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="{{ asset('theme/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/apexcharts/apexcharts.min.js') }}"></script>
    {{-- <script src="{{ asset('theme/js/pages/dashboard.js') }}"></script> --}}

    <script src="{{ asset('theme/js/main.js') }}"></script>
</body>

</html>
