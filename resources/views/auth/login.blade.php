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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
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
                <div class="col-md-8">
                    <div class="border card-header" style="background-color:rgba(89, 194, 154, 0.801)">
                        <h3 class="text-white m-b-0" style="text-align: center"><b>Pengumuman</b></h3>
                    </div>
                    <div class="container"
                        style="opacity: 0.7;background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%); height: 650px;">
                        <div class="card-body">
                            <h3 class="card-title">LOREM IPSUM:</h3>
                            <p class="card-text" style="text-align: justify;"><br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nihil dolores quam optio nesciunt quisquam? Necessitatibus ut ad, iusto in explicabo
                                quaerat pariatur amet deleniti, minima harum sequi commodi. Hic, adipisci.<br>

                                <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit eveniet dolore
                                soluta aperiam minima optio veniam nam, fugiat ea? Expedita dolorem sunt sapiente, optio
                                ex dolor sequi unde? In, labore?.<br>

                                <br> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore rem eos architecto
                                at ea dolore assumenda quae corporis! Quas facilis, ea fuga delectus ipsam temporibus
                                doloremque hic? Eius, iste esse.<br>

                                <br> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed, facilis sequi nemo
                                quos voluptate ipsam consectetur aliquid, quas unde, nobis debitis ratione amet? Autem,
                                saepe. Dicta similique velit mollitia sequi!<br>

                                <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quisquam distinctio eum
                                ratione ullam similique provident asperiores quae officiis, nulla dolor suscipit amet
                                tenetur? Modi inventore nam maxime sint laborum!<br>

                                <br> Lorem ipsum<br><br>
                                <b>lorem ipsum</b>
                            </p>
                            <span> <b>Lembaga Minyak Sawit Malaysia</b></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-2"> --}}
                <div class="auth-box on-sidebar"
                    style="padding-top:8.5%; background-color: rgba(0, 0, 0, 0.650) !important;">
                    <div id="loginform">
                        <div class="logo">

                            <span class="db"><img src="{{ asset('theme/images/favicon2.png') }}"
                                    style="height:75px; width:95px; margin-right:2%" alt="logo" /></span>
                            <span class="db"><img src="{{ asset('theme/images/background/mspo.png') }}"
                                    style="height:95px" alt="logo" /></span>
                            <br>
                            <br>
                            <h3 class="text-center"
                                style="color:rgba(89, 194, 154, 0.801); font-size:25px; font-family:verdana"><b> Sistem
                                    E-Kilang </b></h3>
                            <h4 class="text-center"
                                style="color:rgba(89, 194, 154, 0.801); font-size:20px; font-family:verdana"> Lembaga
                                Minyak Sawit Malaysia </h4>
                            <br>
                            <h4 class="text-center" style="color: white; font-size:20px; font-family:verdana">Log
                                Masuk
                            </h4>
                        </div>
                        <br>

                        {{-- <div class="card-body">
                            <form>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="No Kad Pengenalan">

                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Kata Laluan">
                                </div>
                                {{-- <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div> --}}
                                {{-- <div class="form-group">
                                    <input type="submit" value="Log Masuk" class="float-right btn login_btn" style="color: black;
                    background-color: rgba(89, 194, 154, 0.801);
                    width: 100px;">
                                </div>
                            </form>
                        </div> --}}




                        <!-- Form -->
                        {{-- <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('login') }}" class="form-horizontal m-t-20">
                                    {{-- <form method="POST" action="{{ route('login') }}"> --}}

                                    @csrf
                                    <div class="mb-3 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></i></span>
                                        </div>
                                        <input id="login_id" type="text"
                                            class="form-control @error('login_id') is-invalid @enderror" name="login_id"
                                            value="{{ old('login_id') }}" required autocomplete="login_id"
                                            placeholder="No. KP">

                                        @error('login_id')
                                                <div class="alert alert-danger">
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
                                            required autocomplete="current-password" placeholder="Kata Laluan">

                                        @error('password')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                {{-- <label class="custom-control-label" for="customCheck1">Remember me</label> --}}
                                                {{-- <a href="javascript:void(0)" id="to-recover" class="float-right text-dark"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center form-group">
                                        <div class="col-xs-12 p-b-20">
                                         {{-- <input type="submit" value="Log Masuk" class="float-right btn login_btn" style="color: black;
                    background-color: rgba(89, 194, 154, 0.801);
                    width: 100px;"> --}}
                                            <button class="btn btn-block btn-lg " style="color: black;
                                            background-color: rgba(89, 194, 154, 0.801) type="submit">Log
                                                Masuk</button>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="text-center col-xs-12 col-sm-12 col-md-12 m-t-10">
                                            <div class="social">
                                                <a href="javascript:void(0)" class="btn btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook"></i> </a>
                                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group m-b-0 m-t-10"> --}}
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="text-center ">
                                                <span style="color: white">Tidak Mempunyai Akaun? &nbsp<a style="text-decoration:none"
                                                    href="{{ route('register') }}"><b>Daftar Disini</b></a></span>
                                            </div>


                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="text-center ">
                                               <a href="#">
                                                <b style="color: #2962ff">Terlupa Kata
                                                    Laluan</b></a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- </div> --}}
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
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

</html>
