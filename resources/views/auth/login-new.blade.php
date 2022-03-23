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

    <link rel="stylesheet" href="{{ asset('theme/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/82f28bb8e5.js' crossorigin='anonymous'></script>

    <!-- Template Main CSS File -->
    {{-- <link href="{{ asset('theme/kilangstyles/css/style.css') }}" rel=" stylesheet"> --}}

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

</head>

<body>
    <div id="app">

        <div id="sidebar" class='active'>
            {{-- <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover;"> --}}
            <div class="sidebar-wrapper active" style="background-color: rgba(249, 208, 94)">

                <br>
                <div class="sidebar-menu">

 <div id="loginform">

                    <div class="logo">

                        <span class="db"><img src="{{ asset('theme/images/mpob2.png') }}"
                                class="brand-image img-circle elevation-3"
                                style="height:120px; width:115px; margin-right:2% " alt="logo"></span>
                        <br>
                        <br>
                        <h3 class="text-center"
                            style="color:rgba(15, 15, 15, 0.801); font-size:25px; font-family:verdana"><b> Sistem
                                e-Kilang </b></h3>
                        <h4 class="text-center"
                            style="color:rgba(15, 15, 15, 0.801); font-size:20px; font-family:Trebuchet MS (sans-serif)">
                            Lembaga
                            Minyak Sawit Malaysia </h4>
                        <br>
                        <h4 class="text-center"
                            style="color: white; font-size:20px; font-family:Trebuchet MS (sans-serif)">Log
                            Masuk
                        </h4>
                    </div>
                    <br>

                    <!-- Form -->
                    {{-- <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('login') }}" class="form-horizontal m-t-20"> --}}
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-user"></i></i></span>
                            </div>
                            <input id="e_nl" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" autocomplete="username" placeholder="No. Lesen">

                            @error('username')
                                <div class="col-12 alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            {{-- <input type="text" class="form-control form-control-lg" placeholder="ID KILANG (No.SSM)" name="email" aria-label="Username" aria-describedby="basic-addon1"> --}}
                        </div>
                        <div class="mb-3 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-key"></i></span>
                            </div>
                            {{-- <input type="text" class="form-control form-control-lg" placeholder="KATA LALUAN" aria-label="Password" name="password" aria-describedby="basic-addon1"> --}}
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password" placeholder="Kata Laluan">

                            @error('password')
                                <div class="col-12 alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                        </div>

                        {{-- <div class="text-center form-group"> --}}
                        {{-- <div class="col-xs-12 p-b-20"> --}}
                        <button class="btn btn-block btn-lg "
                            style="color: black; background-color: rgba(89, 194, 154, 0.801)" type="submit">
                            Log Masuk</button>

                    </form>
                </div>
            </div>
        </div>


                </div>

            </div>
        </div>





<body>
    <div class="main-wrapper"  style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover;">

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover;">
            <div class="row" style="justify-content: right;">
                {{-- <div class="col-md-1"></div> --}}
                <div class="col-md-9">
                    <div class="border card-header" style="background-color:rgba(89, 194, 154, 0.801)">
                        <h3 class="text-white m-b-0" style="text-align: center"><b>Pengumuman</b></h3>
                    </div>
                    <div class="container"
                        style="opacity: 0.7;background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%); height: 500px;">
                        <div class="card-body">
                            {{-- <h3 class="card-title">LOREM IPSUM:</h3> --}}
                            <p class="card-text">
                                <br>Sebarang pertanyaan sila hubungi :<br>
                                <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b> - Pn. Nor Syaida (Emel:
                                nor.syaida@mpob.gov.my atau Tel :
                                03-7802 2917)<br>
                                <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b> - En. Rominizam (Emel:
                                rominizam@mpob.gov.my atau Tel :
                                03-7802 2918)<br>
                                <b>Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</b> - Pn. Aziana (Emel:
                                aziana.misnan@mpob.gov.my atau Tel :
                                03-7802 2955)<br>
                                <b>Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</b> - Pn. Aziana (Emel:
                                aziana.misnan@mpob.gov.my atau Tel :
                                03-7802 2955)<br>
                                <b>Penyata Bulanan Kilang Isirong - MPOB (EL) CF4</b> - Pn. Nor Baayah (Emel
                                abby@mpob.gov.my atau Tel : 03-7802
                                2865)<br>
                                <b>Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</b> - Pn. Nor Baayah (Emel
                                abby@mpob.gov.my atau Tel : 03-7802
                                2865)<br>
                                <b>No Faks bagi Penyata Bulanan</b> : 03-7803 2323 / 03-7803 1399<br>
                                <br><mark><b>PERINGATAN : Pihak tuan/puan dikehendaki melapor maklumat mingguan (PENYATA
                                        MINGGUAN) melalui sistem
                                        ekilang sebelum pukul 12.00 malam pada hari pertama setiap minggu
                                        (ISNIN).</b><br></mark><br>
                        </div>


                    </div>
                </div>
            </div>

    </div>
    </div>


    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('nice-admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>


    <script src="{{ asset('nice-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

    {{-- toaster --}}
    {{-- <script src="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/toastr/toastr-init.js') }}"></script> --}}

    {{-- toaster display --}}
    <script>
        @if (Session::get('success'))
            toastr.success('{{ session('success') }}', 'Berjaya', { "progressBar": true });
        @elseif ($message = Session::get('error'))
            toastr.error('{{ session('error') }}', 'Ralat', { "progressBar": true });
        @endif
    </script>
</body>

</html>
