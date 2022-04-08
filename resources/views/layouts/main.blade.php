<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="RnD Project">
    <meta name="author" content="Luke AC">

    <!-- Favicon icon -->
    <link href="{{ asset('theme/images/favicon.png') }}" rel="image/x-icon">
    <link href="{{ asset('theme/kilangstyles/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title> e-Kilang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Custom CSS -->
    <link href="{{ asset('nice-admin/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('nice-admin/assets/extra-libs/c3/c3.min.css') }}  " rel="stylesheet">
    {{-- <link href="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('nice-admin/dist/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('theme/kilangstyles/css/adminstyle.css') }}" rel=" stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}"> --}}

    {{-- quill textbox / form editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('nice-admin/assets/libs/quill/dist/quill.snow.css') }}">


    <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

    {{-- Datatable --}}
    <link href="{{ asset('nice-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="javascript:void(0)" class="logo">
                            <!-- Logo icon -->
                            {{-- <b class="logo-icon">
                                <img src="{{ asset('mpob.png') }}" alt="homepage" class="light-logo"
                                    style="padding-top:10px;height:90%; width:40%">
                            </b> --}}
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- Light Logo text -->
                                <img src="{{ asset('mpob-text.png') }}" alt="homepage" class="light-logo"
                                    style="padding-top:10px;height:90%; width:70%; margin-left:10%">
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)"
                            data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                            style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                            <b style="margin-left:10%;">
                                {{ ucfirst(auth()->user()->category) }} | </b>
                        </span>
                        <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                            style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                        <div class="time text-right">
                            <span class="hms"></span>
                            <span class="ampm"></span>
                            <span class="date"></span>
                        </div>
                    </span>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown border-right">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline font-22"></i>
                                <span class="badge badge-pill badge-info noti">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <h4 class="m-b-0 m-t-5">Tiada</h4>
                                            <span class="font-light">Notifikasi</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications">
                                            <!-- Message -->
                                            {{-- <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-danger btn-circle">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Luanch Admin</h5>
                                                    <span class="mail-desc">Just see the my new admin!</span>
                                                    <span class="time">9:30 AM</span>
                                                </div>
                                            </a> --}}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('user_icon.png') }}" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ auth()->user()->name }}<i
                                        class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ auth()->user()->name }}</h4>
                                        <p class="m-b-0">{{ auth()->user()->email }}</p>
                                        <p class="m-b-0">{{ ucfirst(auth()->user()->category) }}</p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Akaun Pentadbir </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Tukar Kata Laluan </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" aria-expanded="false"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Log Keluar</a>
                                    {{-- <div class="dropdown-divider"></div> --}}
                                </div>
                                {{-- <div class="p-l-30 p-10">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View
                                        Profile</a>
                                </div> --}}
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu font-weight-bold"> MENU PENYELENGGARAAN </span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-edit" style="color:rgb(54, 51, 41)"></i>
                                <span class="hide-menu font-weight-bold"> Profil Pelesen </span>
                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                            </a>
                            <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.senaraipelesenbuah') }}" class="sidebar-link">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Daftar Pelesen Baru </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.2tukarpassword') }}" class="sidebar-link">
                                        <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Tukar Kata Laluan </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                <span class="hide-menu font-weight-bold"> Papar Penyata </span>
                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                            </a>
                            <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.6penyatapaparcetakbuah') }}" class="sidebar-link">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Senarai Penyata Bulanan </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.9penyataterdahulu') }}" class="sidebar-link">
                                        <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Penyata Terdahulu </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-arrows-alt-h" style="color:rgb(54, 51, 41) "></i>
                                <span class="hide-menu font-weight-bold"> Pindahan Data </span>
                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                            </a>
                            <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.4ekilangpleid') }}" class="sidebar-link">
                                        <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> e-Kilang ke PLEID </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.7portingmaklumat') }}" class="sidebar-link">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Produk Sawit/Negara </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.8portdata') }}" class="sidebar-link">
                                        <i class=" fas fa-book" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Stat Admin/Homepage </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.10portdatatodq') }}" class="sidebar-link">
                                        <i class=" fas fa-book" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Dynamic Query </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-cogs" style="color:rgb(54, 51, 41) "></i>
                                <span class="hide-menu font-weight-bold"> Konfigurasi </span>
                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                            </a>
                            <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.senarai.pentadbir') }}" class="sidebar-link">
                                        <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Pengurusan Pentadbir </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.pengumuman') }}" class="sidebar-link">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Pengumuman </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.3daftarpenyata') }}" class="sidebar-link">
                                        <i class=" fas fa-book" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Initialize Penyata Baharu </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-ellipsis-h" style="color:rgb(54, 51, 41) "></i>
                                <span class="hide-menu font-weight-bold"> Lain - Lain </span>
                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                            </a>
                            <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.direktori') }}" class="sidebar-link">
                                        <i class="fas fa-leaf" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Direktori </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    {{-- <a href="{{ route('admin.panduan') }}" class="sidebar-link"> --}}
                                    <a href="{{ asset('manual/admin/panduan2.pdf') }}" target="_blank" class="sidebar-link">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Panduan Pengguna </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.11emel') }}" class="sidebar-link">
                                        <i class="fas fa-globe" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Emel Pindaan </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.12validation') }}" class="sidebar-link">
                                        <i class=" fas fa-book" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Validasi </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.kod.produk') }}" class="sidebar-link">
                                        <i class=" fas fa-book" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Kod & Nama Produk </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.kod.negara') }}" class="sidebar-link">
                                        <i class=" fas fa-book" style="color:rgb(54, 51, 41) "></i>
                                        <span class="hide-menu"> Kod & Nama Negara </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <div class="dropdown-divider"></div>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"
                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <i class="mdi mdi-directions" style="color:rgb(54, 51, 41) "></i>
                                <span class="hide-menu"> Log Keluar</span>
                            </a>
                            <form id="logoutform" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            @yield('content')

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        <!-- Modal Confirmation -->
        <div class="modal fade" id="confirmation" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"
                                aria-hidden="true"></i>&nbspConfirmation!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you want to continue?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Proceed</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="text-center footer">
            All Rights Reserved by Artanis Cloud. Designed and Developed by
            <a href="https://www.artaniscloud.com/">ArtanisCloud</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('nice-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('nice-admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('nice-admin/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/app-style-switcher.horizontal.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('nice-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('nice-admin/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('nice-admin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('nice-admin/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/toastr/toastr-init.js') }}"></script>
    <!--Timer Idle Javascript -->
    <script src="{{ asset('nice-admin/assets/extra-libs/jquery-sessiontimeout/jquery.sessionTimeout.min.js') }}">
    </script>
    {{-- <script src="{{ asset('assets/extra-libs/jquery-sessiontimeout/session-timeout-init.js') }}"></script> --}}
    <!--TouchSpin Javascript -->
    <script src="{{ asset('nice-admin/assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}">
    </script>

    {{-- datatable --}}
    <script src="{{ asset('nice-admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>

    {{-- notification --}}
    <script>
        @if (Session::has('success'))
            toastr.success( '{{ session('success') }}', 'Success', { "progressBar": true });
        @elseif(Session::has('error'))
            toastr.error( '{{ session('error') }}', 'Error', { "progressBar": true });
        @endif
    </script>

    {{-- session timeout --}}
    <script>

        var SessionTimeout = function() {
            var session = (10 * 300000)
            var sessionRedir = (10 * 300000) + 30000 //plus 30 seconds after warn

            var i = function() {
                $.sessionTimeout({
                    title: "Amaran Sesi Tamat",
                    message: "Sesi Anda akan Berakhir.",
                    redirUrl: "{{ route('session.timeout') }}",
                    logoutUrl: "{{ route('session.timeout') }}",
                    logoutButton: "Log Keluar",
                    keepAliveButton: "Teruskan Sesi",
                    warnAfter: session, // milliseconds
                    redirAfter: sessionRedir, //20s
                    ignoreUserActivity: !0, //0 = false, !0 = true
                    countdownMessage: "Sesi akan tamat dalam {timer} saat..",
                    countdownBar: !0
                })
            };
            return {
                init: function() {
                    i()
                }
            }
        }();
        jQuery(function() {
            SessionTimeout.init()
        });
    </script> --}}

    {{-- clock --}}
    <script type="text/javascript">
        function updateTime() {
            var dateInfo = new Date();

            /* time */
            var hr,
                _min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
                sec = (dateInfo.getSeconds() < 10) ? "0" + dateInfo.getSeconds() : dateInfo.getSeconds(),
                ampm = (dateInfo.getHours() >= 12) ? "PM" : "AM";

            if (dateInfo.getHours() == 0) {
                hr = 12;
            } else if (dateInfo.getHours() > 12) {
                hr = dateInfo.getHours() - 12;
            } else {
                hr = dateInfo.getHours();
            }

            var currentTime = hr + ":" + _min + ":" + sec;

            // print time
            document.getElementsByClassName("hms")[0].innerHTML = currentTime;
            document.getElementsByClassName("ampm")[0].innerHTML = ampm;

            /* date */
            var dow = [
                    "Ahad",
                    "Isnin",
                    "Selasa",
                    "Rabu",
                    "Khamis",
                    "Jumaat",
                    "Sabtu"
                ],
                month = [
                    "Januari",
                    "Februari",
                    "Mac",
                    "April",
                    "Mei",
                    "Jun",
                    "Julai",
                    "Ogos",
                    "September",
                    "Oktober",
                    "November",
                    "Desember"
                ],
                day = dateInfo.getDate();

            // store date
            var currentDate = dow[dateInfo.getDay()] + ", " + day + " " + month[dateInfo.getMonth()] + " " + dateInfo.getFullYear();

            document.getElementsByClassName("date")[0].innerHTML = currentDate;
        };

        // print time and date once, then update them every second
        updateTime();
        setInterval(function() {
            updateTime()
        }, 1000);
    </script>

    @yield('scripts')

</body>

</html>
