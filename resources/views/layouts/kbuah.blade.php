<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Kilang Buah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('theme/images/favicon.png') }}" rel="image/x-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor


    <!-- Vendor CSS Files -->
    <link href="{{ asset('theme/kilangstyles/vendor/aos/aos.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/bootstrap/css/bootstrap.min.css') }}" rel=" stylesheet">
    <link href="{{ asset('theme/kilangstyles/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel=" stylesheet">




    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/simple-datatables/style.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/82f28bb8e5.js' crossorigin='anonymous'></script>



    <!-- Template Main CSS File -->
    <link href="{{ asset('theme/kilangstyles/css/style.css') }}"" rel=" stylesheet">

</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active" style="background-color: rgba(249, 208, 94)">
                <div class="mt-3 sidebar-header" style="margin-bottom: -13%">

                    <img src="{{ asset('/mpob.png') }}"
                        style="float:left; margin-right:10%; width:60px; height:55px">
                    {{-- <strong>E-Kilang</strong><br />
                    <span>description</span> --}}

                    <h4
                        style="text-align:left; font-family:Verdana; margin-left:15%; margin-top:5%; color: rgb(78, 73, 57)">
                        <b>
                            E-Kilang</b>
                    </h4>
                    {{-- <img src="{{ asset('theme/images/logo.svg') }}" alt="" srcset=""> --}}
                    {{-- <img src="{{ asset('/mpob.png') }}" style="width:80px; height:80px"> --}}
                    {{-- <img src="{{ asset('/mspo.png') }}" style="width:80px; height:90px"> --}}

                </div>


                <div class="sidebar-menu">
                    <ul class="menu">
                        <div class="container" style="margin-top: 30%; margin-left:6%; ">
                            <h6 style="color: rgb(54, 51, 41)"><b>KILANG BUAH</b></h6>
                        </div>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Maklumat Pelesen</li>


                        <li class="sidebar-item ">
                            <a href="{{ route('buah.maklumatasaspelesen') }}" class='sidebar-link'>
                                <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i class="fas fa-seedling" style="color: rgb(54, 51, 41)" data-feather="home" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57)">Maklumat Asas Pelesen</span>
                            </a>

                        </li>

                        {{-- <li class="sidebar-item has-sub"> --}}
                        <li class="sidebar-item">
                            <a href="{{ route('buah.tukarpassword') }}" class='sidebar-link'>
                                <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="triangle" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Tukar Kata Laluan</span>
                            </a>



                        </li>
                        <br>


                        </li>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Kemasukan Penyata Bulanan</li>

                        <li class="sidebar-item">
                            <a href="{{ route('buah.bahagiani') }}" class='sidebar-link'>
                                <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-text" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian I</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('buah.bahagianii') }}" class='sidebar-link'>
                                <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layout" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian II</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('buah.bahagianiii') }}" class='sidebar-link'>
                                <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layers" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian III</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('buah.bahagianiv') }}" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="grid" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian IV</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('buah.bahagianv') }}" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian V</span>
                            </a>

                        </li>
                        {{-- <li class="sidebar-item ">
                            <a href="{{ route ('buah.bahagianvi') }}" class='sidebar-link'>
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
                            <a href="{{ route('buah.email') }}" class='sidebar-link'>
                                <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="user" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">E-mail Pertanyaan / Pindaan / Cadangan</span>
                            </a>



                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('buah.prestasioer') }}" class='sidebar-link'>
                                <i class="fas fa-globe" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="trending-up" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Prestasi OER</span>
                            </a>


                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('buah.penyatadahulu') }}" class='sidebar-link'>
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
                                <div class="d-none d-md-block d-lg-inline-block">Hai, Pelesen</div>
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




            <footer>
                <div class="footer text-muted">
                    {{-- <div class="float-start">
                        <p>2020 &copy; Voler</p>
                    </div> --}}
                    <div style="text-align: center">
                        <p style="font-size:14px; color:white">Developed by Artanis Cloud</a></p>
                    </div>
                </div>
            </footer>

        </div>
    </div>
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

    <script src="{{ asset('theme/vendors/simple-datatables/simple-datatables.js') }}"></script>

    <script src="{{ asset('theme/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/apexcharts/apexcharts.min.js') }}"></script>
    {{-- <script src="{{ asset('theme/js/pages/dashboard.js') }}"></script> --}}

    <script src="{{ asset('theme/js/vendors.js') }}"></script>

    <script src="{{ asset('theme/js/main.js') }}"></script>

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode != 46 && (charCode < 48 || charCode > 57)))
                return false;
            return true;
        }
    </script>



    <!-- Template Main JS File -->

    <script href="{{ asset('theme/kilangstyles/js/main.js') }}"" rel=" stylesheet"></script>


    <script src="{{ asset('theme/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/form-editor.js') }}"></script>


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>



    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- this file was missing -->
    {{-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

    <!-- this file was moved after the jQuery Datatables library was laoded -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>

</body>

</html>
