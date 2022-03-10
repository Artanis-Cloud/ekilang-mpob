<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Kilang Oleokimia</title>
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
    <link href="{{ asset('theme/kilangstyles/css/style.css') }}" rel=" stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

                    <h6 style="text-align:left; margin-left:15%; margin-top:-2%; color: rgb(29, 28, 24)">
                        <b>
                            e-Kilang</b>
                    </h6>
                    {{-- <img src="{{ asset('theme/images/logo.svg') }}" alt="" srcset=""> --}}
                    {{-- <img src="{{ asset('/mpob.png') }}" style="width:80px; height:80px"> --}}
                    {{-- <img src="{{ asset('/mspo.png') }}" style="width:80px; height:90px"> --}}

                </div>
                <br>
                <div class="sidebar-menu">
                    <ul class="menu">
                        {{-- <div class="container" style="margin-top: 30%; margin-left:6%; ">
                            <h6 style="color: rgb(54, 51, 41)"><b>KILANG Oleokimia</b></h6>
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
                                    <a href="{{ route('oleo.maklumatasaspelesen') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Maklumat Asas Pelesen</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('oleo.tukarpassword') }}">
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
                                    <a href="{{ route('oleo.bahagiania') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian Ia</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('oleo.bahagianib') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian Ib</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('oleo.bahagianic') }}">
                                        <i class="fas fa-seedling" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="file-text" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian Ic</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('oleo.bahagianii') }}">
                                        <i class="fas fa-filter" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="layout" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian II</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('oleo.bahagianiii') }}">
                                        <i class="fas fa-industry" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="layers" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian III</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('oleo.bahagianiv') }}">
                                        <i class="fas fa-flask" style="color:rgb(54, 51, 41) "> </i>
                                        {{-- <i data-feather="grid" width="20"></i> --}}
                                        <span style="color: rgb(0, 0, 0); ">Bahagian IV</span>
                                    </a>
                                </li>


                            </ul>

                        </li>

                        

                        <a  href="{{ route('oleo.penyatadahulu') }}" class='sidebar-link'>
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

                <a class="navbar-brand">

                    {{-- <img src="theme/images/background/favicon.png" height='45px' alt=""> --}}
                    {{-- <img src="theme/images/background/mspo.png" height='60px' alt=""> --}}
                    {{-- <img src="{{ asset('/mpob.png') }}" height='50px' width='60px' alt=""
                        style="margin-left:25%; margin-top: 3px;"> --}}
                    {{-- <img src="{{ asset('/mspo.png') }}" height='80px' width='60px' alt="" style="margin-top: 20px; margin-right:10%"> --}}
                </a>

                <span class="mx-2 mt-1 mb-1 text-center navbar-brand h1"
                    style="color: black; text-align:center; margin-left:20%; font-family:verdana; color: rgba(47, 112, 88, 0.726)"><b
                    style="font-family: Poppins, sans-serif; font-size:15px; margin-left:10%;">KILANG OLEOKIMIA</b>
                </span>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                        <li class="dropdown nav-icon">
                            <a href="{{ route('oleo.email') }}"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="mt-2">
                                    <i class="fa fa-envelope" style="font-size:18px;"></i>
                                </div>
                            </a>

                        </li>

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
                                <div class="d-none d-md-block d-lg-inline-block mt-1" style="margin-right: 10%">
                                    {{ auth()->user()->username }}</div>
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





            <!-- ======= Hero Section ======= -->
            <section id="hero" class="d-flex align-items-center ">
                <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                    <div class="row justify-content-center" style="margin-top: -5%">
                        <div class="col-xl-12 col-lg-8">

                            <h1 style="font-size:15px; margin-left:10%; margin-bottom:-1%">PENYATA BULANAN KILANG OLEOKIMIA</h1>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-md-12">
                            <div class="card" style="margin-right:10%; margin-left:10%">
                                <div class="card-header" style="margin-bottom: -1%">
                                    <h2 class='pl-3 card-heading'
                                        style="font-size: 18px; margin-bottom:-1%; margin-left:6%">Pengumuman
                                    </h2>
                                </div>
                                <hr>
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
                                                    Pemegang Lesen Kategori Kilang Oleokimia Kelapa Sawit (MF) dan
                                                    Kilang
                                                    Pelumat Oleokimia Sawit
                                                    (CF). <a href="#"><b>Klik Disini</b></a>

                                                </li>
                                                <ul>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card" style="margin-right:10%; margin-left:10%">
                                <div class="card-header " style="margin-bottom:-2%">
                                    <h2 class='pl-3 card-heading'
                                        style="font-size: 18px; margin-bottom:-1%; margin-left:6%">Peringatan
                                    </h2>
                                </div>
                                <hr>

                                <div class="card-body">
                                    <div class=" text-center">
                                        <h6 style="color:rgba(47, 112, 88, 0.823); text-align:left; text-align: justify;
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

                            <div class="card" style="margin-right:10%; margin-left:10%">
                                <div class="card-header" style="margin-bottom:-2%">
                                    <h2 class='pl-3 card-heading'
                                        style="font-size: 18px; margin-bottom:-1%; margin-left:6%">Penafian
                                    </h2>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 style="color:rgba(47, 112, 88, 0.823); text-align:left; text-align: justify;
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

                            </div>



                        </div>
                    </div>
                    <br>


                </div>





            </section><!-- End Hero -->





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


            <script href="{{ asset('theme/kilangstyles/vendor/purecounter/purecounter.js') }}" rel=" stylesheet"></script>
            <script href="{{ asset('theme/kilangstyles/vendor/aos/aos.js') }}" rel=" stylesheet"></script>
            <script href="{{ asset('theme/kilangstyles/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel=" stylesheet">
            </script>
            <script href="{{ asset('theme/kilangstyles/vendor/glightbox/js/glightbox.min.js') }}" rel=" stylesheet"></script>
            <script href="{{ asset('theme/kilangstyles/vendor/isotope-layout/isotope.pkgd.min.js') }}" rel=" stylesheet">
            </script>
            <script href="{{ asset('theme/kilangstyles/vendor/swiper/swiper-bundle.min.js') }}" rel=" stylesheet"></script>
            <script href="{{ asset('theme/kilangstyles/vendor/php-email-form/validate.js') }}" rel=" stylesheet"></script>



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
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
            </script>
            <!-- Toastr -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            {{-- toaster display --}}
            <script>
                toastr.options.fadeOut = 2500;
                @if (Session::get('success'))
                    toastr.success('{{ session('success') }}', 'Berjaya', { "progressBar": true });
                @elseif ($message = Session::get('error'))
                    toastr.error('{{ session('error') }}', 'Ralat', { "progressBar": true });
                @endif
            </script>
</body>

</html>
