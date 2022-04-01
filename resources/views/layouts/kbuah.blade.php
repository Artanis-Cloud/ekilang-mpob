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
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {{-- <link href="{{ asset('theme/kilangstyles/vendor/bootstrap/css/bootstrap.min.css') }}" rel=" stylesheet"> --}}
    {{-- <link href="{{ asset('theme/kilangstyles/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel=" stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="{{ asset('theme/kilangstyles/css/style.css') }}"" rel=" stylesheet">

    {{-- DataTables --}}
    {{-- <link rel="stylesheet" href="{{ asset('theme/vendors/simple-datatables/style.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/r-2.2.9/sc-2.0.5/datatables.min.css"/>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active" style="background-color: rgba(249, 208, 94)">
                <div class=" sidebar-header" style="margin-bottom: -20%;
                border-bottom: 2px solid rgb(0 0 0 / 24%);border-right: 1px solid #b0e9cc2b;
                box-shadow: 20px 0px 20px 0px rgb(22 44 60 / 21%); background-color:  rgb(243, 213, 128)">

                    <img src="http://ekilang-mpob.test/mpob.png" style="float:left; margin-right:10%;margin-top:-10%;
                 width:50px; height:50px">
                    {{-- <strong>E-Kilang</strong><br />
                    <span>description</span> --}}

                    <h6 style="text-align:left; margin-left:15%; margin-top:-2%; ">
                        <a href="{{ route('buah.dashboard') }}" style="color: rgb(29, 28, 24)">
                        <b>
                            e-Kilang</b>
                        </a>
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
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                                <i class="fas fa-user-edit" style="color:rgb(54, 51, 41) "></i>
                                <span><b>Maklumat Pelesen</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%">
                                <li>
                                    <a href="{{ route('buah.maklumatasaspelesen') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Maklumat Asas Pelesen</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('buah.tukarpassword') }}">
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
                                <i class="fas fa-pen" style="color:rgb(54, 51, 41) "></i>

                                <span><b>Kemasukan Penyata Bulanan</b></span>
                            </a>

                            <ul class="submenu " style="margin-left:-5%">

                                <li>
                                    <a href="{{ route('buah.bahagiani') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian 1</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('buah.bahagianii') }}">
                                        <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="layout" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian 2</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('buah.bahagianiii') }}">
                                        <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="layers" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian 3</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('buah.bahagianiv') }}">
                                        <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="grid" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian 4</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('buah.bahagianv') }}">
                                        <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-plus" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian 5</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn" style="text-align: left" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter">
                                        <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-plus" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian 6</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('buah.paparpenyata') }}">
                                        <i class="fas fa-archive" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-plus" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Papar & Hantar Penyata Bulanan</span>
                                    </a>

                                </li>
                            </ul>

                        </li>


                        <a  href="{{ route('buah.prestasioer') }}" class='sidebar-link'>
                            <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                            <i class="fas fa-globe" style="color:rgb(54, 51, 41) "></i>
                            <span><b>Prestasi OER</b></span>
                        </a>

                        <a  href="{{ route('buah.penyatadahulu') }}" class='sidebar-link'>
                            <i data-feather="#" width="20" style="margin-left:-10px; "></i>
                            <i class="fas fa-book-open" style="color:rgb(54, 51, 41) "></i>
                            <span><b>Papar Penyata Bulanan Terdahulu</b></span>
                        </a>

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

                {{-- <a class="navbar-brand">


                    <img src="{{ asset('/mpob.png') }}" height='50px' width='60px' alt=""
                        style="margin-left:25%; margin-top: 3px;">

                </a>--}}

                <span class="mx-2 mt-1 mb-1 text-center navbar-brand h1"
                    style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)"><b
                    style="font-family: Poppins, sans-serif; font-size:15px; margin-left:10%;"> {{ auth()->user()->name }} </b>
                </span>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="{{ route('buah.email') }}"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="mt-2">
                                    <i class="fa fa-envelope" style="font-size:18px;"></i>
                                </div>
                            </a>

                        </li>

                        {{-- <li class="dropdown nav-icon">
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
                        </li> --}}


                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                {{-- <div class="avatar me-1">
                                    <img src="{{ asset('theme/images/avatar/avatar-girl.png') }}" alt="" srcset="">
                                </div> --}}
                                <div class="d-none d-md-block d-lg-inline-block mt-1" style="margin-right: 10%">{{ auth()->user()->username }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i>&nbsp Akaun
                                    Pengguna</a>
                                {{-- <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a> --}}
                                <a class="dropdown-item" href="#"><i class="fa fa-gear"></i>&nbsp Tetapan</a>
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
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            PERINGATAN</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Anda tidak dibenarkan mengisi maklumat bahagian ini
                        </p>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>



            {{-- CONTENT BODY --}}
            @yield('content')




            {{-- <footer>
                <div class="footer text-muted">

                    <div style="text-align: center">
                        <p style="font-size:14px; color:white">Developed by Artanis Cloud</a></p>
                    </div>
                </div>
            </footer> --}}

        </div>
    </div>

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode != 46 && (charCode < 48 || charCode > 57)))
                return false;
            return true;
        }
    </script>

    <script src="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script href="{{ asset('theme/kilangstyles/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"" rel=" stylesheet">
    <script src="{{ asset('theme/kilangstyles/js/main.js') }}"></script>
    <script src="{{ asset('theme/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/form-editor.js') }}"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"/></script>

    {{-- Datatable Scripts --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/r-2.2.9/sc-2.0.5/datatables.min.js"></script>
    {{-- <script src="{{ asset('theme/vendors/simple-datatables/simple-datatables.js') }}"></script> --}}


    <!-- Template Main JS File -->
    <script src="{{ asset('theme/js/app.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('datatable')
    @yield('javascript')

    <script>
        $(document).ready(function() {
            var table = $('#table1').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
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

    {{-- toaster display --}}
    <script>
        toastr.options.fadeOut = 2500;
        @if (Session::get('success'))
            toastr.success('{{ session('success') }}', 'Berjaya', { "progressBar": true });
        @elseif ($message = Session::get('error'))
            toastr.error('{{ session('error') }}', 'Ralat', { "progressBar": true });
        @endif
        console.log('toastr')
    </script>

    <script>
                .sidebar .main-navigation .main-nav .sub-menu {
            opacity: 1 !important;
            display: block !important;
            left: auto;
            right: auto !important;
            position: relative;
            width: 100%;
            clear: both !important;
            top: auto;
            float: none;
        }

        .sidebar .dropdown-menu-toggle {
            display: none;
}
    </script>

</body>

</html>
