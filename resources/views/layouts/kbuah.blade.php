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

                            {{-- <ul class="submenu ">

                                <li>
                                    <a href="component-alert.html">Alert</a>
                                </li>

                                <li>
                                    <a href="component-badge.html">Badge</a>
                                </li>

                                <li>
                                    <a href="component-breadcrumb.html">Breadcrumb</a>
                                </li>

                                <li>
                                    <a href="component-buttons.html">Buttons</a>
                                </li>

                                <li>
                                    <a href="component-card.html">Card</a>
                                </li>

                                <li>
                                    <a href="component-carousel.html">Carousel</a>
                                </li>

                                <li>
                                    <a href="component-dropdowns.html">Dropdowns</a>
                                </li>

                                <li>
                                    <a href="component-list-group.html">List Group</a>
                                </li>

                                <li>
                                    <a href="component-modal.html">Modal</a>
                                </li>

                                <li>
                                    <a href="component-navs.html">Navs</a>
                                </li>

                                <li>
                                    <a href="component-pagination.html">Pagination</a>
                                </li>

                                <li>
                                    <a href="component-progress.html">Progress</a>
                                </li>

                                <li>
                                    <a href="component-spinners.html">Spinners</a>
                                </li>

                                <li>
                                    <a href="component-tooltips.html">Tooltips</a>
                                </li>

                            </ul> --}}

                        </li>
                        <br>
                        {{-- <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                            <i class="fas fa-tint" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                        {{-- <span style="color: rgb(78, 73, 57); margin-left:21px ">Kilang Isirung</span>
                            </a> --}}

                        {{-- <ul class="submenu ">

                                <li>
                                    <a href="component-extra-avatar.html">Avatar</a>
                                </li>

                                <li>
                                    <a href="component-extra-divider.html">Divider</a>
                                </li>

                            </ul> --}}

                        {{-- </li> --}}

                        {{-- <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                        {{-- <span style="color: rgb(78, 73, 57);">Kilang Oleokimia</span>
                            </a> --}}

                        {{-- <ul class="submenu ">

                                <li>
                                    <a href="component-extra-avatar.html">Avatar</a>
                                </li>

                                <li>
                                    <a href="component-extra-divider.html">Divider</a>
                                </li>

                            </ul> --}}
                        {{-- </li>
                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                        {{-- <span style="color: rgb(78, 73, 57);">Pusat Simpanan</span>
                            </a> --}}
                        {{-- <ul class="submenu ">

                                <li>
                                    <a href="component-extra-avatar.html">Avatar</a>
                                </li>

                                <li>
                                    <a href="component-extra-divider.html">Divider</a>
                                </li>

                            </ul> --}}

                        {{-- </li>
                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                        {{-- <span style="color: rgb(78, 73, 57)">E-Biodiesel</span>
                            </a> --}}

                        {{-- <ul class="submenu ">

                                <li>
                                    <a href="component-extra-avatar.html">Avatar</a>
                                </li>

                                <li>
                                    <a href="component-extra-divider.html">Divider</a>
                                </li>

                            </ul> --}}

                        {{-- </li>
                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-briefcase" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i style="color: rgb(54, 51, 41)" data-feather="briefcase" width="20"></i> --}}
                        {{-- <span style="color: rgb(78, 73, 57)">MPOB (EL) MF 4A - QC/MF/1</span>
                            </a> --}}

                        {{-- <ul class="submenu ">

                                <li>
                                    <a href="component-extra-avatar.html">Avatar</a>
                                </li>

                                <li>
                                    <a href="component-extra-divider.html">Divider</a>
                                </li>

                            </ul> --}}

                        </li>

                        <li class='sidebar-title' style="color: rgb(54, 51, 41)">Kemasukan Penyata Bulanan</li>

                        <li class="sidebar-item">
                            <a href="{{ route('buah.bahagiani') }}" class='sidebar-link'>
                                <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-text" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian I</span>
                            </a>

                            {{-- <ul class="submenu ">

                                <li>
                                    <a href="form-element-input.html">Input</a>
                                </li>

                                <li>
                                    <a href="form-element-input-group.html">Input Group</a>
                                </li>

                                <li>
                                    <a href="form-element-select.html">Select</a>
                                </li>

                                <li>
                                    <a href="form-element-radio.html">Radio</a>
                                </li>

                                <li>
                                    <a href="form-element-checkbox.html">Checkbox</a>
                                </li>

                                <li>
                                    <a href="form-element-textarea.html">Textarea</a>
                                </li>

                            </ul> --}}

                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route ('buah.bahagianii') }}" class='sidebar-link'>
                                <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layout" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian II</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="form-editor.html" class='sidebar-link'>
                                <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="layers" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian III</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="table.html" class='sidebar-link'>
                                <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="grid" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian IV</span>
                            </a>

                        </li>

                        <li class="sidebar-item ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian V</span>
                            </a>

                        </li>
                        <li class="sidebar-item ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Bahagian VI</span>
                            </a>

                        </li>
                        <li class="sidebar-item ">
                            <a href="table-datatable.html" class='sidebar-link'>
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

                            {{-- <ul class="submenu ">

                                <li>
                                    <a href="ui-chatbox.html">Chatbox</a>
                                </li>

                                <li>
                                    <a href="ui-pricing.html">Pricing</a>
                                </li>

                                <li>
                                    <a href="ui-todolist.html">To-do List</a>
                                </li>

                            </ul> --}}

                        </li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-globe" style="color:rgb(54, 51, 41) "> </i>
                                {{-- <i data-feather="trending-up" width="20"></i> --}}
                                <span style="color: rgb(78, 73, 57); ">Prestasi OER</span>
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

                        {{-- <li class='sidebar-title'>Pages</li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Authentication</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="auth-login.html">Login</a>
                                </li>

                                <li>
                                    <a href="auth-register.html">Register</a>
                                </li>

                                <li>
                                    <a href="auth-forgot-password.html">Forgot Password</a>
                                </li>

                            </ul>

                        </li> --}}

                        {{-- <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="alert-circle" width="20"></i>
                                <span>Errors</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="error-403.html">403</a>
                                </li>

                                <li>
                                    <a href="error-404.html">404</a>
                                </li>

                                <li>
                                    <a href="error-500.html">500</a>
                                </li>

                            </ul>

                        </li> --}}

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
                        <p style="font-size:10px">Developed by Artanis Cloud</a></p>
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

    <!-- Template Main JS File -->

    <script href="{{ asset('theme/kilangstyles/js/main.js') }}"" rel=" stylesheet"></script>


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</body>

</html>
