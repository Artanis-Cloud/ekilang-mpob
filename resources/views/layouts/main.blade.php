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
    <link href="{{ asset('nice-admin/assets/libs/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css') }}"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('nice-admin/dist/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('theme/kilangstyles/css/adminstyle.css') }}" rel=" stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}"> --}}

    {{-- quill textbox / form editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('nice-admin/assets/libs/quill/dist/quill.snow.css') }}">

    {{-- toastr --}}
    <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

    {{-- Datatable --}}
    <link href="{{ asset('nice-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">

    {{-- SweetAlert2 --}}
    <link href="{{ asset('nice-admin/assets/libs/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('nice-admin/assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('nice-admin/assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{-- <link rel="stylesheet" href="print.css" type="text/css" media="print" /> --}}
</head>
<style>
    .noScreenPelesen {
        display: none;
    }

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

    .highlight {
        background: #d3d3d3;
        border-radius: 10px;
        padding: 0px 20px;
    }



    @media print {
        @page {
            size: auto !important;
            overflow: visible !important;
        }

        .table-bordered {
            border: 1px solid #5d6161 !important;
            padding: 0.3rem !important;
            vertical-align: middle !important;
        }

        .table-bordered th,
        .table-bordered td {
            -webkit-print-color-adjust: exact !important;
            border: 1px solid #5d6161 !important;
            padding: 0.3rem !important;
            vertical-align: middle !important;
        }

        .table-bordered td.block {
            background: #C0C0C0 !important;
            padding: 0.3rem !important;
            vertical-align: middle !important;

        }

        .table-bordered td.headerColor {
            background: #d3d3d370 !important;
            padding: 0.3rem !important;
            vertical-align: middle !important;

        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
            padding: 0.3rem !important;
            vertical-align: middle !important;
        }




    }

    .disabledByMe {
        pointer-events: none;
    }

    button.fred {
        /* border-color: #25877b !important; */
        color: #095950 !important;
        font-family: "Rubik", sans-serif !important;
    }

    button.prodpdf {
        /* border-color: #25877b !important; */
        color: #f90a0a !important;
    }

    .global-loader {
        display: none;
        justify-content: center;
        align-items: center;
        margin-left: 9%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        background-color: #fff;
        opacity: 1;
        transition: opacity .5s ease-in-out;
    }

    .global-loader-fade-in {
        opacity: 0;
    }

    .global-loader-hidden {
        display: none;
    }

    .global-loader h1 {
        font-family: "Rubik", Rubik, sans-serif;
        font-weight: normal;
        font-size: 24px;
        letter-spacing: .04rem;
        white-space: pre;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        background-image:
            repeating-linear-gradient(to right,
                black,
                grey,
                black,
                grey,
                black,
                grey,
                black,
                grey);
        background-size: 750% auto;
        background-position: 0 100%;
        animation: gradient 20s infinite;
        animation-fill-mode: forwards;
        animation-timing-function: linear;
    }

    @keyframes gradient {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: -750% 0;
        }
    }

    .dataTables_filter,
    .dataTables_info {
        display: none;
    }

    @media screen {
        .noScreen {
            display: none;
        }

    }


    @media print {
        @page {
            size: auto !important
        }

        .noPrint {
            display: none;
        }

        .noScreen {}
    }

    body {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="globalLoader" class="global-loader" *ngIf="isSubmit">
        <h1>Sila Tunggu...</h1>
    </div>

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
                <div class="navbar-header" style="background: #3fd2c7 ">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand" >
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
                                @if (auth()->user()->category == 'PL91')
                                    <a href="{{ route('buah.dashboard') }}">
                                        <img src="{{ asset('logo7.png') }}" alt="homepage" class="light-logo"
                                            style="padding-top:20px; width:80%; margin-left:10%">
                                    </a>
                                @elseif (auth()->user()->category == 'PL101')
                                    <a href="{{ route('penapis.dashboard') }}">
                                        <img src="{{ asset('logo7.png') }}" alt="homepage" class="light-logo"
                                            style="padding-top:20px;height:110%; width:80%; margin-left:10%">
                                    </a>
                                @elseif (auth()->user()->category == 'PL102')
                                    <a href="{{ route('isirung.dashboard') }}">
                                        <img src="{{ asset('logo7.png') }}" alt="homepage" class="light-logo"
                                            style="padding-top:20px;height:110%; width:80%; margin-left:10%">
                                    </a>
                                @elseif (auth()->user()->category == 'PL104')
                                    <a href="{{ route('oleo.dashboard') }}">
                                        <img src="{{ asset('logo7.png') }}" alt="homepage" class="light-logo"
                                            style="padding-top:20px;height:110%; width:80%; margin-left:10%">
                                    </a>
                                @elseif (auth()->user()->category == 'PL111')
                                    <a href="{{ route('pusatsimpan.dashboard') }}">
                                        <img src="{{ asset('logo7.png') }}" alt="homepage" class="light-logo"
                                        style="padding-top:20px;height:110%; width:80%; margin-left:10%">
                                    </a>
                                @elseif (auth()->user()->category == 'PLBIO')
                                    <a href="{{ route('bio.dashboard') }}">
                                        <img src="{{ asset('logo7.png') }}" alt="homepage" class="light-logo"
                                        style="padding-top:20px;height:110%; width:80%; margin-left:10%">
                                    </a>
                                @elseif (auth()->user()->category == 'admin')
                                    <a href="{{ route('admin.dashboard') }}">
                                        <img src="{{ asset('logo7.png') }}" alt="homepage" class="light-logo"
                                            style="padding-top:20px; width:80%; margin-left:10%">
                                    </a>
                                @endif
                            </span>
                        </a>
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    {{-- <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a> --}}
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background-image:  url({{ asset('theme/images/nav-head-2.png') }}); background-size:cover ">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->

                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        {{-- <ul class="float-left navbar-nav"> --}}

                        {{-- @if (auth()->user()->category == 'PL91')
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
                        @endif --}}

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline font-22"></i>
                                <span
                                    class="badge badge-pill badge-info noti">{{ auth()->user()->unreadNotifications->count() }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <h4 class="m-b-0 m-t-5">Terdapat
                                                {{ auth()->user()->unreadNotifications->count() }}</h4>
                                            <span class="font-light">Notifikasi</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications">
                                            <!-- Message -->
                                            @forelse (auth()->user()->unreadNotifications as $notification)
                                                <a href="{{ route('notification.show', $notification->id) }}"
                                                    class="message-item">
                                                    <span class="btn btn-danger btn-circle">
                                                        <i class="fa fa-link"></i>
                                                    </span>
                                                    <div class="mail-contnet">
                                                        <h5 class="message-title">{{ $notification->data['tajuk'] }}
                                                        </h5>
                                                        <span
                                                            class="time">{{ date('d-m-Y H:i:s', strtotime($notification->created_at)) }}</span>
                                                    </div>
                                                </a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown border-right">
                            @if (auth()->user()->category == 'PL91')
                                <a class="nav-link dropdown-toggle waves-effect waves-dark"  href="{{ route('buah.email') }}"
                                    id="2" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                    <i class="font-22 mdi mdi-email-outline"></i>

                                </a>
                            @elseif (auth()->user()->category == 'PL101')
                                <a class="nav-link dropdown-toggle waves-effect waves-dark"   href="{{ route('penapis.email') }}"
                                id="2" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                <i class="font-22 mdi mdi-email-outline"></i>
                            @elseif (auth()->user()->category == 'PL102')
                                <a class="nav-link dropdown-toggle waves-effect waves-dark"   href="{{ route('isirung.email') }}"
                                id="2" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                <i class="font-22 mdi mdi-email-outline"></i>
                            @elseif (auth()->user()->category == 'PL104')
                                <a class="nav-link dropdown-toggle waves-effect waves-dark"   href="{{ route('oleo.email') }}"
                                id="2" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                <i class="font-22 mdi mdi-email-outline"></i>
                            @elseif (auth()->user()->category == 'PL111')
                                <a class="nav-link dropdown-toggle waves-effect waves-dark"   href="{{ route('pusatsimpan.email') }}"
                                id="2" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                <i class="font-22 mdi mdi-email-outline"></i>
                            @elseif (auth()->user()->category == 'PLBIO')
                                <a class="nav-link dropdown-toggle waves-effect waves-dark"   href="{{ route('bio.email') }}"
                                id="2" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                <i class="font-22 mdi mdi-email-outline"></i>
                            @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-22 mdi mdi-account-circle">

                                </i>
                                {{-- <img src="{{ asset('user_icon.png') }}" alt="user" class="rounded-circle"
                                    width="30"> --}}
                                <span class="m-l-5 font-medium d-none d-sm-inline-block"
                                    style="font-size:14px; line-height:15px; ">{{ auth()->user()->name }}<br>{{ auth()->user()->username }}<i class="mdi mdi-chevron-down"></i>
                                </span>
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
                                        {{-- <a class="dropdown-item" href="{{ route('admin.akaun.pentadbir') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Akaun Pentadbir </a> --}}
                                        <a class="dropdown-item" href="{{ route('admin.tukarpassword') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Tukar Kata Laluan </a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    @php
                                        $users = \App\Models\User::where('username', auth()->user()->username)->get();

                                    @endphp
                                    @if (count($users) > 1)
                                        @php
                                            foreach ($users as $key => $cat) {
                                                $category[$key] = $cat->category;
                                                $crypted[$key] = $cat->crypted_pass;
                                            }
                                            $check0 = Crypt::decryptString($crypted[0]);
                                            $check1 = Crypt::decryptString($crypted[1]);
                                        @endphp
                                        @if ($category[0] != $category[1])
                                            @if ($check1 == $check0)
                                                <a class="dropdown-item" href="{{ route('multiLogin') }}">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> Tukar Sektor </a>
                                                <div class="dropdown-divider"></div>
                                            @endif
                                        @endif
                                    @endif

                                    <a class="dropdown-item" href="#" aria-expanded="false"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Log Keluar</a>
                                    <form id="logoutform" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
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
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                  background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%); background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar" data-height="100%" data-init="true">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            {{-- <li class="nav-small-cap">
                                <span class="hide-menu font-weight-bold"> </span>
                            </li> --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:;"
                                    aria-expanded="false" >
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('buah.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('buah.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- {{ dd($res == true) }} --}}
                            @if ($res == false)
                            @if (!$layoutpenyata)
                                <li class="sidebar-item has-sub">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:;"
                                        aria-expanded="false">
                                        <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu font-weight-bold"> <b class="caret"></b> Kemasukan
                                            Penyata
                                            <br>Bulanan</span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>

                                    <ul aria-expanded="false" class="collapse first-level sub-menu"
                                        style="margin-left:5%">

                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagiani') }}" class="sidebar-link load">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianiv') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianv') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.bahagianvi') }}"class="btn sidebar-link">

                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 6 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('buah.paparpenyata') }}" class="sidebar-link ">
                                                <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('buah.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('buah.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li class="sidebar-item">

                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('buah.prestasioer') }}" class="sidebar-link">
                                    <i class="far fa-chart-bar" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Prestasi OER </b></span>
                                </a>

                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('buah.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('buah.kod.produk') }}" class="sidebar-link">
                                    <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('buah.kod.negara') }}" class="sidebar-link">
                                    <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </aside>
        @elseif (auth()->user()->category == 'PL101')
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                   background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%); background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                <span class="hide-menu font-weight-bold"> </span>
                            </li>

                            <li class="" style="padding: 5px; margin-left:10%; ">
                                <span class="date"></span><br>
                                <span class="hms"></span>
                                <span class="ampm"></span>

                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('penapis.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('penapis.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if ($res == false)

                            @if (!$layoutpenyata)
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">

                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagiani') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hidapise-menu"> Bahagian 1 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9"></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianiva') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 4 (a) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianivb') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 4 (b) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianv') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 5 (a) & (b) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.bahagianvi') }}" class="btn sidebar-link">

                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 6 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item ">
                                            <a href="{{ route('penapis.bahagianvii') }}"class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "> </i>
                                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                                <span class="hide-menu">Bahagian 7</span>
                                            </a>

                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('penapis.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('penapis.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li class="sidebar-item">
                                <a href="{{ route('penapis.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('penapis.kod.produk') }}" class="sidebar-link">
                                    <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('penapis.kod.negara') }}" class="sidebar-link">
                                    <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PL102')
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                  background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%); background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            {{-- <li class="nav-small-cap">
                                <span class="hide-menu font-weight-bold"> </span>
                            </li> --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('isirung.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('isirung.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if ($res == false)

                            @if (!$layoutpenyata)
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">

                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagiani') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianiii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianiv') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianv') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.bahagianvi') }}" class="btn sidebar-link">

                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 6 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item ">
                                            <a href="{{ route('isirung.bahagianvii') }}" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "> </i>
                                                {{-- <i data-feather="file-plus" width="20"></i> --}}
                                                <span class="hide-menu">Bahagian 7</span>
                                            </a>

                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('isirung.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('isirung.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('isirung.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li class="sidebar-item">
                                <a href="{{ route('isirung.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('isirung.kod.produk') }}" class="sidebar-link">
                                    <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('isirung.kod.negara') }}" class="sidebar-link">
                                    <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PL104')
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                   background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%); background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            {{-- <li class="nav-small-cap">
                                <span class="hide-menu font-weight-bold"> </span>
                            </li> --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false" >
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('oleo.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('oleo.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if ($res == false)

                            @if (!$layoutpenyata)
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagiania') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 (a) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianib') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 (b) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianic') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 (c) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianiv') }}" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.bahagianv') }}" class="btn sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('oleo.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('oleo.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li class="sidebar-item">
                                <a href="{{ route('oleo.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('oleo.kod.produk') }}" class="sidebar-link">
                                    <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('oleo.kod.negara') }}" class="sidebar-link">
                                    <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PL111')
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                   background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%);  background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            {{-- <li class="nav-small-cap">
                                <span class="hide-menu font-weight-bold"> </span>
                            </li> --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('pusatsimpan.maklumatasaspelesen') }}"
                                            class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('pusatsimpan.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if ($res == false)

                            @if (!$layoutpenyata)
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">

                                        <li class="sidebar-item">
                                            <a href="{{ route('pusatsimpan.bahagiana') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian A </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('pusatsimpan.bahagianb') }}" class=" sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian B </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('pusatsimpan.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('pusatsimpan.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('pusatsimpan.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li class="sidebar-item">
                                <a href="{{ route('pusatsimpan.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('pusatsimpan.kod.produk') }}" class="sidebar-link">
                                    <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('pusatsimpan.kod.negara') }}" class="sidebar-link">
                                    <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PLBIO')
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                   background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%); background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            {{-- <li class="nav-small-cap">
                                <span class="hide-menu font-weight-bold"> </span>
                            </li> --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false" >
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('bio.maklumatasaspelesen') }}" class="sidebar-link">
                                            <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('bio.tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if ($res == false)

                            @if (!$layoutpenyata)
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu font-weight-bold"> Kemasukan Penyata <br>Bulanan</span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">

                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagiania') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 (a) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianib') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 (b) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianic') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 1 (c) </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianii') }}" class="sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 2 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianiii') }}" class="sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 3 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianiv') }}" class="btn sidebar-link">
                                                <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 4 </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.bahagianv') }}" class="btn sidebar-link">
                                                <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Bahagian 5 </span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="{{ route('bio.paparpenyata') }}" class="sidebar-link">
                                                <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('bio.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            @else
                                <li class="sidebar-item">
                                    <a href="{{ route('bio.hantar.penyata') }}" class="sidebar-link">
                                        <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li class="sidebar-item">
                                <a href="{{ route('bio.penyatadahulu') }}" class="sidebar-link">
                                    <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                    <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('bio.kod.produk') }}" class="sidebar-link">
                                    <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('bio.kod.negara') }}" class="sidebar-link">
                                    <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'PL101' ?? 'PL104')
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                   background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%); background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            {{-- <li class="nav-small-cap">
                                <span class="hide-menu font-weight-bold"> </span>
                            </li> --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Kilang Penapis </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                        <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.maklumatasaspelesen') }}"
                                                class="sidebar-link">
                                                <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('penapis.tukarpassword') }}" class="sidebar-link">
                                                <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Tukar Kata Laluan </span>
                                            </a>
                                        </li>
                                    </ul>

                                    @if (!$layoutpenyata)
                                        <a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false">
                                            <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu font-weight-bold"> Kemasukan Penyata
                                                <br>Bulanan</span>
                                            {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level"
                                            style="margin-left:5%">

                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.bahagiani') }}" class="sidebar-link">
                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hidapise-menu"> Bahagian 1 </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.bahagianii') }}" class="sidebar-link">
                                                    <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 2 </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.bahagianiii') }}" class="sidebar-link">
                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 3 </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.bahagianiva') }}" class="sidebar-link">
                                                    <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 4 (a) </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.bahagianivb') }}" class="sidebar-link">
                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 4 (b) </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.bahagianv') }}" class="sidebar-link">
                                                    <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 5 (a) & (b) </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.bahagianvi') }}"
                                                    class="btn sidebar-link">

                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 6 </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item ">
                                                <a
                                                    href="{{ route('penapis.bahagianvii') }}"class="btn sidebar-link">
                                                    <i class="far fa-file-alt" style="color:#f6f8f9 "> </i>
                                                    {{-- <i data-feather="file-plus" width="20"></i> --}}
                                                    <span class="hide-menu">Bahagian 7</span>
                                                </a>

                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('penapis.paparpenyata') }}"
                                                    class="sidebar-link">
                                                    <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                    <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="{{ route('penapis.hantar.penyata') }}" class="sidebar-link">
                                            <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                            <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                            </span>
                                        </a>
                                    @endif
                                    <a href="{{ route('penapis.penyatadahulu') }}" class="sidebar-link">
                                        <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                    </a>
                                    <a href="{{ route('penapis.kod.produk') }}" class="sidebar-link">
                                        <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                    </a>
                                    <a href="{{ route('penapis.kod.negara') }}" class="sidebar-link">
                                        <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                    </a>
                                    {{-- <i class="mdi mdi-dots-horizontal"></i> --}}
                                    <span class="hide-menu font-weight-bold"> </span>

                                </ul>


                            </li>

                            <li class="sidebar-item">

                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-bold"> Kilang Oleokimia </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                        <span class="hide-menu font-weight-bold"> Maklumat Pelesen </span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.maklumatasaspelesen') }}"
                                                class="sidebar-link">
                                                <i class="far fa-id-badge" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Maklumat Asas Pelesen </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('oleo.tukarpassword') }}" class="sidebar-link">
                                                <i class="fas fa-key" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Tukar Kata Laluan </span>
                                            </a>
                                        </li>
                                    </ul>
                                    @if (!$layoutpenyata)
                                        {{-- <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%"> --}}
                                        <a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false">
                                            <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu font-weight-bold"> Kemasukan Penyata
                                                <br>Bulanan</span>
                                            {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level"
                                            style="margin-left:5%">
                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.bahagiania') }}" class="sidebar-link">
                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 1 (a) </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.bahagianib') }}" class="sidebar-link">
                                                    <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 1 (b) </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.bahagianic') }}" class="sidebar-link">
                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 1 (c) </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.bahagianii') }}" class="sidebar-link">
                                                    <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 2 </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.bahagianiii') }}" class="sidebar-link">
                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 3 </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.bahagianiv') }}" class="btn sidebar-link">
                                                    <i class="far fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 4 </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.bahagianv') }}" class="btn sidebar-link">
                                                    <i class="fas fa-file-alt" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Bahagian 5 </span>
                                                </a>
                                            </li>

                                            <li class="sidebar-item">
                                                <a href="{{ route('oleo.paparpenyata') }}" class="sidebar-link">
                                                    <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                                    <span class="hide-menu"> Semak & Hantar Penyata <br> Bulanan
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                        {{-- </ul> --}}
                                    @else
                                        {{-- <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%"> --}}
                                        <a href="{{ route('oleo.hantar.penyata') }}" class="sidebar-link">
                                            <i class="fas fa-paste" style="color:#f6f8f9"></i>
                                            <span class="hide-menu"><b>Penyata Bulanan Terkini</b>
                                            </span>
                                        </a>
                                        {{-- </ul> --}}
                                    @endif
                                    {{-- <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%"> --}}
                                    <a href="{{ route('oleo.penyatadahulu') }}" class="sidebar-link">
                                        <i class="far fa-calendar-alt" style="color:#f6f8f9"></i>
                                        <span class="hide-menu"><b> Papar Penyata Bulanan <br>Terdahulu </b></span>
                                    </a>
                                    {{-- </ul> --}}
                                    {{-- <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%"> --}}
                                    <a href="{{ route('oleo.kod.produk') }}" class="sidebar-link">
                                        <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu"><b> Kod & Nama Produk </b></span>
                                    </a>
                                    {{-- </ul> --}}
                                    {{-- <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%"> --}}
                                    <a href="{{ route('oleo.kod.negara') }}" class="sidebar-link">
                                        <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu"><b> Kod & Nama Negara </b></span>
                                    </a>
                                    {{-- </ul> --}}
                                </ul>

                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @elseif (auth()->user()->category == 'admin')
            <aside class="left-sidebar" style="margin-top: 20px; font-size:11px;
                    background: linear-gradient(to bottom, #3fd2c7 10%, #00458b 200%); background-size:cover;background-position:center;">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav" style="margin-top: -10%">
                        <ul id="sidebarnav">
                            {{-- <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu font-weight-bold"> MENU PENYELENGGARAAN </span>
                            </li> --}}
                            <li class="nav-small-cap" style="padding: 5px">

                                <span class="hide-menu font-weight-bold"
                                    style="color: black; text-align:center; margin-left:10%; ">
                                    {{ ucfirst(auth()->user()->role) }}
                                </span>

                            </li>
                            <li class="" style="padding: 5px; margin-left:10%; ">
                                <span class="date"></span><br>
                                <span class="hms"></span>
                                <span class="ampm"></span>

                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" style="color:#f6f8f9"></i>
                                    <span class="hide-menu font-weight-medium"> Profil Pelesen </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.1daftarpelesen') }}" class="sidebar-link"
                                            class="{{ request()->is('admin/1-daftarpelesen*') ? 'selected' : '' }}">
                                            <i class="fas fa-user-plus" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Daftar Pelesen Baru </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.senaraipelesenbuah') }}" class="sidebar-link">
                                            <i class="fas fa-id-badge" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Senarai Pemegang Lesen </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.2tukarpassword') }}" class="sidebar-link">
                                            <i class="fas fa-wrench" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Tukar Kata Laluan </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-desktop" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu font-weight-medium"> Papar Penyata </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.6penyatapaparcetakbuah') }}"
                                            class="sidebar-link">
                                            <i class="fas fa-clipboard-list" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Senarai Penyata Bulanan </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.9penyataterdahulu') }}" class="sidebar-link">
                                            <i class="fas fa-dolly" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Penyata Terdahulu </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            @if (json_decode(auth()->user()->sub_cat))

                                @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                {{-- @if (auth()->user()->role == 'Supervisor' || auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager') --}}

                                    @if ($cat == 'PLBIO' && auth()->user()->role == 'Admin')

                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow waves-effect waves-dark"
                                                href="javascript:void(0)" aria-expanded="false">
                                                <i class="fas fa-arrows-alt-h" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu font-weight-medium"> Pindahan Data </span>
                                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                            </a>
                                            <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.4ekilangbio') }}" class="sidebar-link">
                                                        <i class="fas fa-boxes" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Penyata Terkini ke <br> Penyata Arkib </span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                    @elseif (auth()->user()->role != 'Admin' && $cat == 'PLBIO')
                                    <li class="sidebar-item">
                                        <a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false">
                                            <i class="fas fa-arrows-alt-h" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu font-weight-medium"> Pindahan Data </span>
                                            {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.4ekilangbio') }}" class="sidebar-link">
                                                    <i class="fas fa-boxes" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Penyata Terkini ke <br> Penyata Arkib <br> (Biodiesel)</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.4ekilangpleid') }}" class="sidebar-link">
                                                    <i class="fas fa-boxes" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> e-Kilang ke PLEID </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.7portingmaklumat') }}" class="sidebar-link">
                                                    <i class="fas fa-barcode" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Produk Sawit/Negara/ <br>Daerah </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.8portdata') }}" class="sidebar-link">
                                                    <i class=" fas fa-book" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Stat Admin/Homepage </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.10portdatatodq') }}" class="sidebar-link">
                                                    <i class="fas fa-folder-open" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Dynamic Query </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    @elseif (auth()->user()->role != 'Admin' && $cat != 'PLBIO')
                                    <li class="sidebar-item">
                                        <a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false">
                                            <i class="fas fa-arrows-alt-h" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu font-weight-medium"> Pindahan Data </span>
                                            {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.4ekilangpleid') }}" class="sidebar-link">
                                                    <i class="fas fa-boxes" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> e-Kilang ke PLEID </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.7portingmaklumat') }}" class="sidebar-link">
                                                    <i class="fas fa-barcode" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Produk Sawit/Negara/ <br>Daerah </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.8portdata') }}" class="sidebar-link">
                                                    <i class=" fas fa-book" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Stat Admin/Homepage </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="{{ route('admin.10portdatatodq') }}" class="sidebar-link">
                                                    <i class="fas fa-folder-open" style="color:#f6f8f9 "></i>
                                                    <span class="hide-menu"> Dynamic Query </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif

                                    @if ($cat == 'PLBIO')
                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow waves-effect waves-dark"
                                                href="javascript:void(0)" aria-expanded="false">
                                                <i class="far fa-folder-open" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu font-weight-medium"> Dynamic Query<br>Biodiesel
                                                </span>
                                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                            </a>
                                            <ul aria-expanded="false" class="collapse first-level"
                                                style="margin-left:5%">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.ringkasan.penyata') }}"
                                                        class="sidebar-link">
                                                        <i class="fas fa-filter" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu">Ringkasan Penyata Bulanan <br> </span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.pl.lewat') }}" class="sidebar-link">
                                                        <i class="fas fa-filter" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Tarikh Penerimaan <br> Borang PL </span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.kapasiti') }}" class="sidebar-link">
                                                        <i class="fas fa-filter" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Kapasiti Kilang Biodiesel </span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.laporan.tahunan') }}"
                                                        class="sidebar-link">
                                                        <i class="fas fa-filter" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Laporan Biodiesel </span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a class="sidebar-link has-arrow " style=" margin-right:5%"
                                                        aria-expanded="false">
                                                        <i class="far fa-folder-open" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Hebahan 10hb </span>
                                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                                    </a>
                                                    <ul aria-expanded="false" class="collapse first-level"
                                                        style="margin-left:5%">
                                                        <li class="sidebar-item">
                                                            <a href="{{ route('admin.stok.akhir') }}"
                                                                class="sidebar-link">
                                                                <i class="fas fa-filter"
                                                                    style="color:#f6f8f9 "></i>
                                                                <span class="hide-menu"> Stok Akhir</span>
                                                            </a>
                                                        </li>
                                                        <li class="sidebar-item">
                                                            <a href="{{ route('admin.validasi.stok.akhir.proses') }}"
                                                                class="sidebar-link">
                                                                <i class="fas fa-filter"
                                                                    style="color:#f6f8f9 "></i>
                                                                <span class="hide-menu"> Validasi Stok Akhir</span>
                                                            </a>
                                                        </li>
                                                        <li class="sidebar-item">
                                                            <a href="{{ route('admin.validasi.stok.akhir.ikut.produk') }}"
                                                                class="sidebar-link">
                                                                <i class="fas fa-filter"
                                                                    style="color:#f6f8f9 "></i>
                                                                <span class="hide-menu"> Validasi Stok Akhir <br> Ikut
                                                                    Produk</span>
                                                            </a>
                                                        </li>
                                                        <li class="sidebar-item">
                                                            <a href="{{ route('admin.minyak.sawit.diproses') }}"
                                                                class="sidebar-link">
                                                                <i class="fas fa-filter"
                                                                    style="color:#f6f8f9 "></i>
                                                                <span class="hide-menu"> Minyak Sawit <br> Diproses</span>
                                                            </a>
                                                        </li>
                                                        <li class="sidebar-item">
                                                            <a href="{{ route('admin.validasi.minyak.sawit.diproses') }}"
                                                                class="sidebar-link">
                                                                <i class="fas fa-filter"
                                                                    style="color:#f6f8f9 "></i>
                                                                <span class="hide-menu"> Validasi Minyak<br>Sawit
                                                                    Diproses</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                {{-- <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow " style=" margin-right:5%"
                                                aria-expanded="false">
                                                <i class="far fa-folder-open" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Oleokimia </span>
                                                {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                                {{-- </a>
                                            <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.activities.all') }}" class="sidebar-link">
                                                        <i class="fas fa-filter" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Aktiviti</span>
                                                    </a>
                                                </li>

                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.monthly.all') }}" class="sidebar-link">
                                                        <i class="far fa-folder-open" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Bulanan </span>
                                                    </a>
                                                </li>


                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.yearly.all') }}" class="sidebar-link">
                                                        <i class="fas fa-filter" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> Tahunan</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('admin.eksport') }}" class="sidebar-link">
                                                        <i class="fas fa-filter" style="color:#f6f8f9 "></i>
                                                        <span class="hide-menu"> OE1 - Export</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                            </ul>
                                        </li>
                                    @endif


                                    @if (auth()->user()->role != 'Admin')
                                    @break
                                    @endif
                                @endforeach
                            @else
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                                        href="javascript:void(0)" aria-expanded="false">
                                        <i class="fas fa-arrows-alt-h" style="color:#f6f8f9 "></i>
                                        <span class="hide-menu font-weight-medium"> Pindahan Data </span>
                                        {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.4ekilangbio') }}" class="sidebar-link">
                                                <i class="fas fa-boxes" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Penyata Terkini ke <br> Penyata Arkib <br> (Biodiesel)</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.4ekilangpleid') }}" class="sidebar-link">
                                                <i class="fas fa-boxes" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> e-Kilang ke PLEID </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.7portingmaklumat') }}" class="sidebar-link">
                                                <i class="fas fa-barcode" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Produk Sawit/Negara/ <br>Daerah </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.8portdata') }}" class="sidebar-link">
                                                <i class=" fas fa-book" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Stat Admin/Homepage </span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.10portdatatodq') }}" class="sidebar-link">
                                                <i class="fas fa-folder-open" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Dynamic Query </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif



                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-cogs" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu font-weight-medium"> Konfigurasi </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        @if (auth()->user()->role == 'Superadmin' ||
                                            auth()->user()->role == 'Manager' ||
                                            auth()->user()->role == 'Supervisor')
                                            <a href="{{ route('admin.senarai.pentadbir') }}"
                                                class="sidebar-link">
                                                <i class="fas fa-users" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Pengurusan Pentadbir </span>
                                            </a>
                                        @else
                                        @endif

                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.pengumuman') }}" class="sidebar-link">
                                            <i class="fas fa-bell" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Pengumuman </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.3daftarpenyata') }}" class="sidebar-link">
                                            <i class="fas fa-server" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Initialize Penyata Baharu </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="fas fa-ellipsis-h" style="color:#f6f8f9 "></i>
                                    <span class="hide-menu font-weight-medium"> Lain - Lain </span>
                                    {{-- <span class="badge badge-pill badge-info ml-auto m-r-15">3</span> --}}
                                </a>
                                <ul aria-expanded="false" class="collapse first-level" style="margin-left:5%">
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.direktori') }}" class="sidebar-link">
                                            <i class="fas fa-database" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Direktori </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        {{-- <a href="{{ route('admin.panduan') }}" class="sidebar-link"> --}}
                                        <a href="{{ asset('manual/admin/panduan2.pdf') }}" target="_blank"
                                            class="sidebar-link">
                                            <i class="fas fa-user-circle" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Panduan Pengguna </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.11emel') }}" class="sidebar-link">
                                            <i class="fas fa-envelope-open" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Emel Pindaan </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.12validation') }}" class="sidebar-link">
                                            <i class="fas fa-check-square" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Validasi </span>
                                        </a>
                                    </li>
                                    @if (json_decode(auth()->user()->sub_cat))

                                    @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                    @if ($cat == 'PLBIO')
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.pembeli') }}" class="sidebar-link">
                                            <i class="fas fa-clipboard-list" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Pembeli </span>
                                        </a>
                                    </li>
                                    @endif

                                    @endforeach
                                    @endif
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.kod.produk') }}" class="sidebar-link">
                                            <i class="fas fa-flask" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Kod & Nama Produk </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.kod.negara') }}" class="sidebar-link">
                                            <i class="fas fa-globe" style="color:#f6f8f9 "></i>
                                            <span class="hide-menu"> Kod & Nama Negara </span>
                                        </a>
                                    </li>
                                    @if (auth()->user()->role == 'Superadmin')
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.log.superadmin') }}" class="sidebar-link">
                                                <i class=" fas fa-clock" style="color:#f6f8f9 "></i>
                                                <span class="hide-menu"> Audit Trail </span>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>

                        </ul>






                    </nav>

                </div>

                <!-- End Sidebar scroll-->
            </aside>
        @endif
    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="tutup" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">MAKLUMAN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>
                        Pemegang lesen tidak perlu melengkapkan maklumat di bahagian ini. Sila tekan butang 'Simpan
                        & Seterusnya' untuk ke bahagian seterusnya.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="tutup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">MAKLUMAN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>
                        Pemegang lesen tidak perlu melengkapkan maklumat di bahagian ini. Sila tekan butang 'Simpan & Seterusnya' untuk ke bahagian seterusnya.
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
    </div> --}}


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
        © Copyright 2022 Malaysian Palm Oil Board (MPOB). All Rights Reserved.
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
<script src="{{ asset('nice-admin/dist/js/app-style-switcher.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('nice-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('nice-admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('nice-admin/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('nice-admin/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('nice-admin/dist/js/custom.min.js') }}"></script>
<script src="{{ asset('nice-admin/dist/js/custom.js') }}"></script>
<script src="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('nice-admin/assets/extra-libs/toastr/toastr-init.js') }}"></script>
<!--Timer Idle Javascript -->
<script src="{{ asset('nice-admin/assets/extra-libs/jquery-sessiontimeout/jquery.sessionTimeout.min.js') }}"></script>
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

{{-- search select --}}
<link href="{{ asset('nice-admin/assets/css/cdn.css') }}  " rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('nice-admin/assets/libs/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js') }}">
</script>
<script src="{{ asset('nice-admin/dist/js/pages/forms/dual-listbox/dual-listbox.js') }}"></script>
<script src="{{ asset('nice-admin/dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
<script src="{{ asset('nice-admin/dist/js/custom.min.js') }}"></script>

{{-- search select --}}
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
{{-- notification --}}
<script>
    @if (Session::has('success'))
        toastr.success('{{ session('success') }}', 'Berjaya!', {
            "progressBar": true
        });
    @elseif (Session::has('error'))
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
<script>
    function autodecimal(data) {

        // let decimal = ".00"
        var value = data.value.replace(/,/g, '');

        var x = parseFloat(value);
        if (isNaN(x)) {
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        data.value = y;
        // console.log('data', data.value);
    }
</script>
<script>
    function enableKemaskini(key) {
        console.log('kemaskini masuk');
        console.log('#kemaskini' + key);
        $('#kemaskini' + key).prop("disabled", false);
    }
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
{{-- <script> --}}


<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });

        // DataTable
        var table = $('#example').DataTable({

            initComplete: function() {

                // Apply the search
                this.api()
                    .columns()
                    .every(function() {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            dom: 'Bfrtip',

            buttons: [

                'pageLength',

                {

                    extend: 'excel',
                    text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
                    className: "fred",

                    title: function(doc) {
                        return $('#title').text()
                    },

                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        var style = xlsx.xl['styles.xml'];
                        $('row c', sheet).attr('s', '25');
                        $('xf', style).find("alignment[horizontal='center']").attr("wrapText",
                            "1");
                        $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
                    },

                    filename: 'Senarai Penyata Yang Telah Dihantar Untuk Paparan dan Cetakan',



                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                    pageSize: 'TABLOID',
                    className: "prodpdf",

                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    title: function(doc) {
                        return $('#title').text()
                    },
                    customize: function(doc) {
                        let table = doc.content[1].table.body;
                        for (i = 1; i < table.length; i++) // skip table header row (i = 0)
                        {
                            var test = table[i][0];
                        }

                    },
                    customize: function(doc) {
                        doc.content[1].table.body[0].forEach(function(h) {
                            h.fillColor = '#0a7569';

                        });
                    },

                    filename: 'Senarai Penyata Yang Telah Dihantar Untuk Paparan dan Cetakan',

                },
            ],
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

        });

    });
</script>
<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example5 tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });

        // DataTable
        var table = $('#example5').DataTable({

            initComplete: function() {

                // Apply the search
                this.api()
                    .columns()
                    .every(function() {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            dom: 'Bfrtip',

            buttons: [

                'pageLength',

                {

                    extend: 'excel',
                    text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
                    className: "fred",

                    title: function(doc) {
                        return $('#title').text()
                    },

                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        var style = xlsx.xl['styles.xml'];
                        $('row c', sheet).attr('s', '25');
                        $('xf', style).find("alignment[horizontal='center']").attr("wrapText",
                            "1");
                        $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
                    },

                    filename: 'Penyata Bulanan Belum Hantar',


                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                    pageSize: 'TABLOID',
                    className: "prodpdf",

                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6]
                    },
                    title: function(doc) {
                        return $('#title').text()
                    },
                    customize: function(doc) {
                        let table = doc.content[1].table.body;
                        for (i = 1; i < table.length; i++) // skip table header row (i = 0)
                        {
                            var test = table[i][0];
                        }

                    },
                    customize: function(doc) {
                        doc.content[1].table.body[0].forEach(function(h) {
                            h.fillColor = '#0a7569';

                        });
                    },

                    filename: 'Penyata Bulanan Belum Hantar',

                },
            ],
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

        });

    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"rel="stylesheet">
{{-- </script> --}}

{{-- <script>
$('ul > li> a').on('click', function() {
  $('ul > li> a').removeClass('highlight')
  $(this).addClass('highlight');
  $(this).closest('ul').closest('li').find('a:eq(0)').addClass('highlight');

});
</script> --}}


{{-- clock --}}
<script>
    jQuery.migrateEnablePatches( "self-closed-tags" );
    console. log(jQuery(). jquery);
    </script>
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
                "Disember"
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

{{-- <script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode != 46 && charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        else if (charCode == 80)
        return true;


        return true;


    }
</script> --}}
<script>
    function point(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        console.log(charCode);
        if (charCode == 46)
            return false;

        else if (charCode != 45 && charCode > 31 && charCode > 57)
            return false;

        return true;


    }
</script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode != 46 && charCode != 45 && charCode > 31 && charCode > 57)
            return false;

        else if (charCode == 80)
            return true;


        return true;


    }
</script>
<script language="javascript" type="text/javascript">
    function FormatCurrency(ctrl) {
        //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
        if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
            return;
        }

        var val = ctrl.value;

        val = val.replace(/,/g, "")
        ctrl.value = "";
        val += '';
        x = val.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';

        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }

        ctrl.value = x1 + x2;
    }
</script>
{{-- <script type="text/javascript">
    $(document).keypress(
        function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });
</script> --}}
<script>
    function validate_two_decimal(e) {
        var t = e.value;
        e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
    }
</script>
{{-- <script>
    $('ul > li> a').on('click', function() {
        $('ul > li> a').removeClass('highlight')
        $(this).addClass('highlight');
        $(this).closest('ul').closest('li').find('a:eq(0)').addClass('highlight');

    });
</script> --}}
{{-- <script>
            $('#sa-title').click(function(){
        swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.")
    });

        </script> --}}
@yield('scripts')
@if ($map_url)
    @if ($not_admin)
        @if (auth()->user()->map_flg == 0)
            <script>
                $('#map-message-warning').click(function() {
                    swal({
                        title: "Makluman!",
                        text: "Anda dikehendaki untuk mengemaskini Maklumat Asas Pelesen.",
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

                @if (auth()->user()->map_flg == '0')
                    window.onload = function() {
                        document.getElementById('map-message-warning').click();
                    }
                @endif

                setTimeout(function() {
                    document.getElementById('map-flag-redirect').click();
                }, 7100);
            </script>
        @endif
    @endif
@endif
</body>

</html>
