<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="target-densitydpi=device-dpi">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/images/favicon.png') }}">
    <title>Sistem E-Kilang</title>
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <!-- Toaster CSS -->
    {{-- <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet"> --}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

 {{-- <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'> --}}


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!--Bootsrap 4 CDN-->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    {{-- <--[endif]--> --}}

</head>

<body>





    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        {{-- <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div> --}}
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover;">


            <div class="row" style="justify-content: left;">
                {{-- <div class="col-md-1"></div> --}}

<br>


                <div class="col-md-10">

                    <div id="auth">
<br>
<br>
<br>
                        <div class="container">

                            {{-- <div class="border card-header"
                                style="width:400px; background-color:rgba(89, 194, 154, 0.801);">
                                <h3 class="text-white m-b-0" style="text-align: center"><b>&nbsp;</b></h3>
                            </div> --}}
                            <div class="container"
                                style="opacity: 0.8; background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%); width:400px; height: 500px;">
                                <div class="card-body">
                                    <div id="loginform">
                                        <div class="logo">

                                            <span class="db"><img
                                                    src="{{ asset('theme/images/favicon2.png') }}"
                                                    style="height:75px; width:95px; margin-left:35%"
                                                    alt="logo" /></span>

                                            <br>
                                            <br>
                                            <h3 class="text-center"
                                                style="color:rgba(89, 194, 154, 0.801); font-size:25px; font-family:verdana">
                                                <b> Sistem
                                                    E-Kilang </b></h3>
                                            <h4 class="text-center"
                                                style="color:rgba(89, 194, 154, 0.801); font-size:20px; font-family:verdana">
                                                Lembaga
                                                Minyak Sawit Malaysia </h4>
                                            <br>
                                            <h4 class="text-center"
                                                style="color: white; font-size:20px; font-family:verdana">Log
                                                Masuk
                                            </h4>
                                        </div>

                                        <div class="card-body">
                                            <form>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="No Kad Pengenalan">

                                                </div>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-key"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control"
                                                        placeholder="Kata Laluan">
                                                </div>
                                                <div class="row align-items-center remember">
                                                    <input type="checkbox">&nbsp; Remember Me
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Log Masuk"
                                                        class="float-right btn login_btn" style="color: black;
                            background-color: rgba(89, 194, 154, 0.801);
                            width: 100px;">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>

                </div>
            </div>


        </div>

        <!-- ============================================================== -->
        <!-- All Required js -->
        <!-- ============================================================== -->
        {{-- <script src="{{ asset('nice-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>

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

<footer>

    <p style=" color:rgb(26, 24, 24); width:100%; text-align: center; background-color:rgba(35, 143, 101, 0.801);">
        <br>Sebarang pertanyaan sila hubungi :<br>
        <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b> - Pn. Nor Syaida (Emel: nor.syaida@mpob.gov.my atau Tel :
        03-7802 2917)<br>
        <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b> - En. Rominizam (Emel: rominizam@mpob.gov.my atau Tel :
        03-7802 2918)<br>
        <b>Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</b> - Pn. Aziana (Emel: aziana.misnan@mpob.gov.my atau Tel :
        03-7802 2955)<br>
        <b>Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</b> - Pn. Aziana (Emel: aziana.misnan@mpob.gov.my atau Tel :
        03-7802 2955)<br>
        <b>Penyata Bulanan Kilang Isirong - MPOB (EL) CF4</b> - Pn. Nor Baayah (Emel abby@mpob.gov.my atau Tel : 03-7802
        2865)<br>
        <b>Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</b> - Pn. Nor Baayah (Emel abby@mpob.gov.my atau Tel : 03-7802
        2865)<br>
        <b>No Faks bagi Penyata Bulanan</b> : 03-7803 2323 / 03-7803 1399<br>
        <br><b>PERINGATAN : Pihak tuan/puan dikehendaki melapor maklumat mingguan (PENYATA MINGGUAN) melalui sistem
            ekilang sebelum pukul 12.00 malam pada hari pertama setiap minggu (ISNIN).</b>
    </p>

</footer>

</html>


<head>
    <title>Automatic Popup</title>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!--Stylesheets-->
    <link rel="stylesheet" href="{{ asset('theme/kilangstyles/css/popuploginstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/style.css') }}">
</head>

<body>
    <div class="popup" style="width:1000px; align:center " ;>

        <h3>Sebarang pertanyaan sila hubungi :</h3>
        <p>
            <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b> - Pn. Nor Syaida (Emel: nor.syaida@mpob.gov.my atau Tel :
            03-7802 2917)<br>
            <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b> - En. Rominizam (Emel: rominizam@mpob.gov.my atau Tel :
            03-7802 2918)<br>
            <b>Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</b> - Pn. Aziana (Emel: aziana.misnan@mpob.gov.my atau Tel
            : 03-7802 2955)<br>
            <b>Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</b> - Pn. Aziana (Emel: aziana.misnan@mpob.gov.my atau
            Tel : 03-7802 2955)<br>
            <b>Penyata Bulanan Kilang Isirong - MPOB (EL) CF4</b> - Pn. Nor Baayah (Emel abby@mpob.gov.my atau Tel :
            03-7802 2865)<br>
            <b>Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</b> - Pn. Nor Baayah (Emel abby@mpob.gov.my atau Tel :
            03-7802 2865)<br>
            <b>No Faks bagi Penyata Bulanan</b> : 03-7803 2323 / 03-7803 1399<br>
            <br><b>PERINGATAN : Pihak tuan/puan dikehendaki melapor maklumat mingguan (PENYATA MINGGUAN) melalui sistem
                ekilang sebelum pukul 12.00 malam pada hari pertama setiap minggu (ISNIN).</b>
        </p>
        <div class="col-7">
            <button id="close" class="btn btn-primary" style="font-size: 18px">TERUSKAN</button>
        </div>
    </div>
    <!--Script-->
    <script src="{{ asset('theme/kilangstyles/js/popuplogin.js') }}"></script>
</body>
