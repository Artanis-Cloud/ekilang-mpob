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
    <link href="{{ asset('nice-admin/assets/libs/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('nice-admin/dist/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('theme/kilangstyles/css/adminstyle.css') }}" rel=" stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}"> --}}

    {{-- quill textbox / form editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('nice-admin/assets/libs/quill/dist/quill.snow.css') }}">


    <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

    {{-- Datatable --}}
    <link href="{{ asset('nice-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">

    {{-- SweetAlert2 --}}
    <link href="{{ asset('nice-admin/assets/libs/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    .required:after {
        content: " *";
        color: red;
    }

    tfoot {
        display: table-header-group;
    }

    .no-sort::after {
        display: none !important;
    }

    .no-sort {
        pointer-events: none !important;
        cursor: default !important;
    }


</style>

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
                        @if (auth()->user()->category == 'PL91')
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <b style="margin-left:10%;">
                                    Kilang Buah | </b>
                            </span>
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <div class="time text-right">
                                    <span class="hms"></span>
                                    <span class="ampm"></span>
                                    <span class="date"></span>
                                </div>
                            </span>
                        @elseif (auth()->user()->category == 'PL101')
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <b style="margin-left:10%;">
                                    Kilang Penapis | </b>
                            </span>
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <div class="time text-right">
                                    <span class="hms"></span>
                                    <span class="ampm"></span>
                                    <span class="date"></span>
                                </div>
                            </span>
                        @elseif (auth()->user()->category == 'PL102')
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <b style="margin-left:10%;">
                                    Kilang Isirung | </b>
                            </span>
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <div class="time text-right">
                                    <span class="hms"></span>
                                    <span class="ampm"></span>
                                    <span class="date"></span>
                                </div>
                            </span>
                        @elseif (auth()->user()->category == 'PL104')
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <b style="margin-left:10%;">
                                    Kilang Oleokimia | </b>
                            </span>
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <div class="time text-right">
                                    <span class="hms"></span>
                                    <span class="ampm"></span>
                                    <span class="date"></span>
                                </div>
                            </span>
                        @elseif (auth()->user()->category == 'PL111')
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <b style="margin-left:10%;">
                                    Pusat Simpanan | </b>
                            </span>
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <div class="time text-right">
                                    <span class="hms"></span>
                                    <span class="ampm"></span>
                                    <span class="date"></span>
                                </div>
                            </span>
                        @elseif (auth()->user()->category == 'PLBIO')
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <b style="margin-left:10%;">
                                    Kilang Biodiesel | </b>
                            </span>
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <div class="time text-right">
                                    <span class="hms"></span>
                                    <span class="ampm"></span>
                                    <span class="date"></span>
                                </div>
                            </span>
                        @elseif (auth()->user()->category == 'admin')
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <b style="margin-left:10%;">
                                    {{ ucfirst(auth()->user()->role) }} | </b>
                            </span>
                            <span class="mx-2 mt-1 mb-0 text-center navbar-brand h1"
                                style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)">
                                <div class="time text-right">
                                    <span class="hms"></span>
                                    <span class="ampm"></span>
                                    <span class="date"></span>
                                </div>
                            </span>
                        @endif

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline font-22"></i>
                                <span class="badge badge-pill badge-info noti">{{ auth()->user()->unreadNotifications->count() }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <h4 class="m-b-0 m-t-5">Terdapat {{ auth()->user()->unreadNotifications->count() }}</h4>
                                            <span class="font-light">Notifikasi</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications">
                                            <!-- Message -->
                                            @forelse (auth()->user()->unreadNotifications as $notification)
                                            <a href="{{ route('notification.show', $notification->id) }}" class="message-item">
                                                <span class="btn btn-danger btn-circle">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">{{ $notification->data['tajuk'] }}</h5>
                                                    <span class="time">{{ date('d-m-Y H:i:s', strtotime($notification->created_at)) }}</span>
                                                </div>
                                            </a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon">
                            @if (auth()->user()->category == 'PL91')
                                <a href="{{ route('buah.email') }}"
                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <div style="margin-top:13px">
                                        <i class="fa fa-envelope" style="font-size:20px;"></i>
                                    </div>
                                </a>
                            @elseif (auth()->user()->category == 'PL101')
                                <a href="{{ route('penapis.email') }}"
                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <div class="mt-3">
                                        <i class="fa fa-envelope" style="font-size:20px;"></i>
                                    </div>
                                @elseif (auth()->user()->category == 'PL102')
                                    <a href="{{ route('isirung.email') }}"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                        <div class="mt-3">
                                            <i class="fa fa-envelope" style="font-size:20px;"></i>
                                        </div>
                                    @elseif (auth()->user()->category == 'PL104')
                                        <a href="{{ route('oleo.email') }}"
                                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                            <div class="mt-3">
                                                <i class="fa fa-envelope" style="font-size:20px;"></i>
                                            </div>
                                        @elseif (auth()->user()->category == 'PL111')
                                            <a href="{{ route('pusatsimpan.email') }}"
                                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                                <div class="mt-3">
                                                    <i class="fa fa-envelope" style="font-size:20px;"></i>
                                                </div>
                                            @elseif (auth()->user()->category == 'PLBIO')
                                                <a href="{{ route('bio.email') }}"
                                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                                    <div class="mt-3">
                                                        <i class="fa fa-envelope" style="font-size:20px;"></i>
                                                    </div>
                            @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <img src="{{ asset('user_icon.png') }}" alt="user" class="rounded-circle" width="30">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block" style="font-size:14px; line-height:20px; padding-top:15px">{{ auth()->user()->name }} <br> {{ auth()->user()->username }}</span>
                                {{-- <span class="m-l-5 font-medium d-none d-sm-inline-block" style="font-size: 15px"><i
                                    class="mdi mdi-chevron-down"></i></span> --}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                    </div>
                                    <div class="m-l-10">

                                        <p class="m-b-0">{{ auth()->user()->email }}</p>


                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    @if (auth()->user()->category == 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.akaun.pentadbir') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Akaun Pentadbir </a>
                                        <a class="dropdown-item" href="{{ route('admin.tukarpassword') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Tukar Kata Laluan </a>
                                        <div class="dropdown-divider"></div>
                                    @endif

                                    <a class="dropdown-item" href="#" aria-expanded="false"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Log Keluar</a>
                                    <form id="logoutform" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    {{-- <div class="dropdown-divider"></div> --}}
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        @if (auth()->user()->category == 'PL91')
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                {{-- <i class="mdi mdi-dots-horizontal"></i> --}}
                                <span class="hide-menu font-weight-bold"> </span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false" style="margin-top:-9%">
                                    <i class="fas fa-edit" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('buah.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('buah.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>

                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    @if (!$layoutpenyata)
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagiani') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianiv') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianv') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a data-toggle="modal" data-target="#tutup" class="btn sidebar-link">

                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 6 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu"> Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.hantar.penyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu"> Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="sidebar-item">

                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('buah.prestasioer') }}" class="sidebar-link">
                                    <i class="far fa-chart-bar" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu"><b> Prestasi OER </b></span>
                                </a>

                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('buah.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        @elseif (auth()->user()->category == 'PL101')
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                {{-- <i class="mdi mdi-dots-horizontal"></i> --}}
                                <span class="hide-menu font-weight-bold"> </span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('penapis.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('penapis.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    @if (!$layoutpenyata)
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagiani') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianiva') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 4 (a) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianivb') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 4 (b) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianv') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a data-toggle="modal" data-target="#tutup" class="btn sidebar-link">

                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 6 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item ">
                                            <a data-toggle="modal" data-target="#tutup" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "> </i>
                                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                                <span class="hide-menu">Bahagian 7</span>
                                            </a>

                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu"> Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.hantar.penyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu">Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('penapis.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PL102')
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                {{-- <i class="mdi mdi-dots-horizontal"></i> --}}
                                <span class="hide-menu font-weight-bold"> </span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('isirung.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('isirung.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    @if (!$layoutpenyata)
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagiani') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianiii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianiv') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianv') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a data-toggle="modal" data-target="#tutup" class="btn sidebar-link">

                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 6 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item ">
                                            <a data-toggle="modal" data-target="#tutup" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "> </i>
                                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                                <span class="hide-menu">Bahagian 7</span>
                                            </a>

                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu"> Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.hantar.penyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu">Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('isirung.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PL104')
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                {{-- <i class="mdi mdi-dots-horizontal"></i> --}}
                                <span class="hide-menu font-weight-bold"> </span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false" style="margin-top:-9%">
                                    <i class="fas fa-edit" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('oleo.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('oleo.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    @if (!$layoutpenyata)
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagiania') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 (a) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianib') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 (b) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianic') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 (c) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianiv') }}" data-toggle="modal"
                                                data-target="#tutup" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianiv') }}" data-toggle="modal"
                                                data-target="#tutup" class="btn sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu"> Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.hantar.penyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu">Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('oleo.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PL111')
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                {{-- <i class="mdi mdi-dots-horizontal"></i> --}}
                                <span class="hide-menu font-weight-bold"> </span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false" style="margin-top:-9%">
                                    <i class="fas fa-edit" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('pusatsimpan.maklumatasaspelesen') }}"
                                            class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('pusatsimpan.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    @if (!$layoutpenyata)
                                        <li class="sidebar-item">
                                            <a href="{{ route('pusatsimpan.bahagiana') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian A </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a data-toggle="modal" data-target="#tutup" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian B </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('pusatsimpan.paparpenyata') }}"
                                                class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu"> Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a href="{{ route('pusatsimpan.hantar.penyata') }}"
                                                class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu">Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('pusatsimpan.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PLBIO')
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                {{-- <i class="mdi mdi-dots-horizontal"></i> --}}
                                <span class="hide-menu font-weight-bold"> </span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false" style="margin-top:-9%">
                                    <i class="fas fa-edit" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('bio.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('bio.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-desktop" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    @if (!$layoutpenyata)
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagiania') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 (a) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianib') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1 (b) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianic') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 1(c) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianiv') }}" data-toggle="modal"
                                                data-target="#tutup" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianiv') }}" data-toggle="modal"
                                                data-target="#tutup" class="btn sidebar-link">
                                                <i class="fas fa-file-alt" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu"> Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.hantar.penyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:rgb(54, 51, 41)"></i>
                                                <span class="hide-menu">Papar & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('bio.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:rgb(54, 51, 41)"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'admin')
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
                                        <a href="{{ route('admin.1daftarpelesen') }}" class="sidebar-link">
                                            <i class="fas fa-user-plus" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Daftar Pelesen Baru </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.senaraipelesenbuah') }}" class="sidebar-link">
                                            <i class="fas fa-id-badge" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Senarai Pemegang Lesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.2tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-wrench" style="color:rgb(54, 51, 41) "></i>
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
                                        <a href="{{ route('admin.6penyatapaparcetakbuah') }}"
                                            class="sidebar-link">
                                            <i class="fas fa-clipboard-list" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Senarai Penyata Bulanan </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.9penyataterdahulu') }}" class="sidebar-link">
                                            <i class="fas fa-dolly" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Penyata Terdahulu </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if (auth()->user()->sub_category == 'PLBIO' || auth()->user()->role == 'Superadmin')
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="far fa-folder-open" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Laporan Dynamic <br> Query </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.maklumat.penyata.bulanan') }}"
                                            class="sidebar-link">
                                            <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Maklumat Penyata Bulanan </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.pl.lewat') }}" class="sidebar-link">
                                            <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> PL Lewat </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.kapasiti') }}" class="sidebar-link">
                                            <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Kapasiti Kilang Biodiesel </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.laporan.tahunan') }}" class="sidebar-link">
                                            <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Laporan Tahunan </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link has-arrow " style=" margin-right:5%"
                                            aria-expanded="false">
                                            <i class="far fa-folder-open" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Hebahan 10hb </span>
                                            {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.stok.akhir') }}" class="sidebar-link">
                                                    <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                                    <span class="hide-menu"> Stok Akhir</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.validasi.stok.akhir') }}" class="sidebar-link">
                                                    <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                                    <span class="hide-menu"> Validasi Stok Akhir</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.validasi.stok.akhir.ikut.produk') }}" class="sidebar-link">
                                                    <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                                    <span class="hide-menu"> Validasi Stok Akhir <br> Ikut Produk</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.minyak.sawit.diproses') }}" class="sidebar-link">
                                                    <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                                    <span class="hide-menu"> Minyak Sawit <br> Diproses</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.validasi.minyak.sawit.diproses') }}" class="sidebar-link">
                                                    <i class="fas fa-filter" style="color:rgb(54, 51, 41) "></i>
                                                    <span class="hide-menu"> Validasi Minyak<br>Sawit Diproses</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @else
                            @endif
                            @if (auth()->user()->role != 'Admin')
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
                                                <i class="fas fa-boxes" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> e-Kilang ke PLEID </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.7portingmaklumat') }}" class="sidebar-link">
                                                <i class="fas fa-barcode" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Produk Sawit/Negara/ <br>Daerah </span>
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
                                                <i class="fas fa-folder-open" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Dynamic Query </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                            @endif

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-cogs" style="color:rgb(54, 51, 41) "></i>
                                    <span class="hide-menu font-weight-bold"> Konfigurasi </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        @if ( auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Manager' || auth()->user()->role == 'Supervisor')
                                            <a href="{{ route('admin.senarai.pentadbir') }}" class="sidebar-link">
                                                <i class="fas fa-users" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Pengurusan Pentadbir </span>
                                            </a>
                                        @else
                                        @endif

                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.pengumuman') }}" class="sidebar-link">
                                            <i class="fas fa-bell" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Pengumuman </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.3daftarpenyata') }}" class="sidebar-link">
                                            <i class="fas fa-server" style="color:rgb(54, 51, 41) "></i>
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
                                            <i class="fas fa-database" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Direktori </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        {{-- <a href="{{ route('admin.panduan') }}" class="sidebar-link"> --}}
                                        <a href="{{ asset('manual/admin/panduan2.pdf') }}" target="_blank"
                                            class="sidebar-link">
                                            <i class="fas fa-user-circle" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Panduan Pengguna </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.11emel') }}" class="sidebar-link">
                                            <i class="fas fa-envelope-open" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Emel Pindaan </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.12validation') }}" class="sidebar-link">
                                            <i class="fas fa-check-square" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Validasi </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.kod.produk') }}" class="sidebar-link">
                                            <i class="fas fa-flask" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Kod & Nama Produk </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.kod.negara') }}" class="sidebar-link">
                                            <i class="fas fa-globe" style="color:rgb(54, 51, 41) "></i>
                                            <span class="hide-menu"> Kod & Nama Negara </span>
                                        </a>
                                    </li>
                                    @if ( auth()->user()->role == 'Superadmin')
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.log.superadmin') }}" class="sidebar-link">
                                                <i class=" fas fa-clock" style="color:rgb(54, 51, 41) "></i>
                                                <span class="hide-menu"> Log </span>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>

                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @endif
        <div id="tutup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">PERHATIAN</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Anda tidak dibenarkan akses bahagian ini
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


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
        <footer class="text-center footer" style="background-color: white;  ">
            ©Copyright 2022 Malaysian Palm Oil Board (MPOB). All Rights Reserved.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->

        @if (auth()->user()->category == 'PL91')
            <button id="map-message-warning" hidden></button>
            <a id="map-flag-redirect" href="{{ route('buah.maklumatasaspelesen') }}" hidden></a>
        @elseif (auth()->user()->category == 'PL101')
            <button id="map-message-warning" hidden></button>
            <a id="map-flag-redirect" href="{{ route('penapis.maklumatasaspelesen') }}" hidden></a>
        @elseif (auth()->user()->category == 'PL102')
            <button id="map-message-warning" hidden></button>
            <a id="map-flag-redirect" href="{{ route('isirung.maklumatasaspelesen') }}" hidden></a>
        @elseif (auth()->user()->category == 'PL104')
            <button id="map-message-warning" hidden></button>
            <a id="map-flag-redirect" href="{{ route('oleo.maklumatasaspelesen') }}" hidden></a>
        @elseif (auth()->user()->category == 'PL111')
            <button id="map-message-warning" hidden></button>
            <a id="map-flag-redirect" href="{{ route('pusatsimpan.maklumatasaspelesen') }}" hidden></a>
        @elseif (auth()->user()->category == 'PLBIO')
            <button id="map-message-warning" hidden></button>
            <a id="map-flag-redirect" href="{{ route('bio.maklumatasaspelesen') }}" hidden></a>
        @endif

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
    <script src="{{ asset('nice-admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>


    {{-- plotly --}}
    <script src="https://cdn.plot.ly/plotly-2.11.1.min.js"></script>

    {{-- sweetalert2 --}}
    <script src="{{ asset('nice-admin/assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/libs/sweetalert2/sweet-alert.init.js') }}"></script>


    <script src="{{ asset('nice-admin/assets/libs/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/pages/forms/dual-listbox/dual-listbox.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/custom.min.js') }}"></script>

    {{-- notification --}}
    <script>
        @if (Session::has('success'))
            toastr.success('{{ session('success') }}', 'Berjaya!', {
                "progressBar": true
            });
        @elseif(Session::has('error'))
            toastr.error('{{ session('error') }}', 'Ralat!', {
                "progressBar": true
            });
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
    </script>
        {{-- <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
                        "zeroRecords": "Maaf, tiada rekod.",
                        "info": "",
                        "infoEmpty": "Tidak ada rekod yang tersedia",
                        "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                        "search": "Carian",
                        "previous": "Sebelum",
                        "paginate": {
                            "first": "Pertama",
                            "last": "Terakhir",
                            "next": "Seterusnya",
                            "previous": "Sebelumnya"
                        },
                    },
                    // 'processing': true,
                    // 'serverSide': true,
                    // 'serverMethod': 'POST',
                    // 'columns': [{
                    //         data: 'Bil.'
                    //     }, /* index = 0 */
                    //     {
                    //         data: 'Nama Premis'
                    //     }, /* index = 1 */
                    //     {
                    //         data: 'Emel'
                    //     }, /* index = 2 */
                    //     {
                    //         data: 'No. Telefon'
                    //     }, /* index = 3 */
                    //     {
                    //         data: 'Kod Pegawai'
                    //     } /* index = 4 */ {
                    //         data: 'No. Siri'
                    //     } /* index = 5 */ {
                    //         data: 'Status e-Kilang'
                    //     } /* index = 6 */ {
                    //         data: 'Status e-Stok'
                    //     } /* index = 7 */ {
                    //         data: 'Direktori'
                    //     } /* index = 8 */ {
                    //         data: 'Pretasi OER'
                    //     } /* index = 9 */
                    // ],
                    "columnDefs": [{
                        'targets': [0, 7, 8],
                        /* column index */
                        'orderable': false,
                        /* true or false */
                    }]

                });
            });
            </script> --}}
            <script>

                // Setup - add a text input to each footer cell
                $('#example tfoot th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control" placeholder="' + title + '" />');
                });

                // DataTable
                var otable = $('#example').DataTable();

                // Apply the search
                otable.columns().every(function() {

                    var that = this;
                    $('input', this.footer()).on('keyup change', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            </script>


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
            var currentDate = dow[dateInfo.getDay()] + ", " + day + " " + month[dateInfo.getMonth()] + " " + dateInfo
                .getFullYear();

            document.getElementsByClassName("date")[0].innerHTML = currentDate;
        };

        // print time and date once, then update them every second
        updateTime();
        setInterval(function() {
            updateTime()
        }, 1000);
    </script>

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode != 46 && (charCode < 48 || charCode > 57)))
                return false;
            return true;
        }
    </script>

    <script>
        function validate_two_decimal(e) {
            var t = e.value;
            e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
        }
    </script>

        @yield('scripts')
        @if ($map_url)
            @if ($not_admin)
                @if (now() > $map_date_expired)
                    <script >
                        $('#map-message-warning').click(function() {
                            swal({
                                title: "Perhatian!",
                                text: "Anda dikehendaki untuk mengemaskini Maklumat Asas Pelesen. Sistem akan membawa anda ke halaman tersebut dalam masa 5 saat",
                                type: "warning",
                                showCancelButton: false,
                                showConfirmButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, delete it!",
                                closeOnConfirm: false
                            }, function() {
                                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            });
                        });
                    // $('#map-message').click(function(){
                    //     swal({
                    //         title: "Perhatian!",
                    //         text: "Anda dikehendaki untuk mengemaskini Maklumat Asas Pelesen. Sistem akan membawa anda ke halaman tersebut dalam masa 5 saat",
                    //         timer: 5000,
                    //         showConfirmButton: false
                    //     });
                    // });

                    @if (auth()->user()->map_flg == false)
                        window.onload = function() {
                            document.getElementById('map-message-warning').click();
                        }
                    @endif

                    setTimeout(function() {
                        document.getElementById('map-flag-redirect').click();
                    }, 5100);
    </script>
    @endif
    @endif
    @endif
</body>

</html>
