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
    <title>Sistem e-Kilang</title>
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <!-- Toaster CSS -->
    <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

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
    <style>
    .auth-wrapper .auth-box.on-sidebar {
        top: 0;
        /* left: 0; */
        /* height: 100%; */
        margin: 0;
        position: inherit;

      }
      </style>
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
            <div class="row" style="justify-content: right;">
                {{-- <div class="col-md-1"></div> --}}
                {{-- <div class="col-md-9">
                    <div class="border card-header" style="background-color:rgba(89, 194, 154, 0.801)">
                        <h3 class="text-white m-b-0" style="text-align: center"><b>Pengumuman</b></h3>
                    </div>
                    <div class="container"
                        style="opacity: 0.7;background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%); height: 500px;">
                        <div class="card-body">

                        </div>


                    </div>
                </div> --}}
            </div>

            {{-- <div class="col-md-2"> --}}
            <div class="auth-box on-sidebar"
                style=" padding-top:3%; background-color: rgba(89, 194, 154, 0.801) !important;position: inherit; max-width:1800px; margin-left: auto; margin-right:auto">
                <div id="loginform">

                    <div class="logo">

                        <span class="db"><img src="{{ asset('theme/images/mpob2.png') }}"
                                class="brand-image img-circle elevation-3"
                                style="height:120px; width:115px; margin-right:1% " alt="logo"></span>
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
                            style="color: white; font-size:20px; font-family:Trebuchet MS (sans-serif)">Sila Pilih Sektor
                        </h4>
                        @foreach ($users as $user)
                <form method="POST" action="{{ route('multiLogin2.process') }}">
                    @csrf

                        <input id="e_nl" type="hidden" class="form-control @error('username') is-invalid @enderror" oninvalid="setCustomValidity('Sila isi butiran ini')"
                        oninput="setCustomValidity('')" required
                            name="username" value="{{ $user->username }}" autocomplete="username" maxlength="12"
                            placeholder="No. Lesen">

                        @error('username')
                            <div class="col-12 alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <input type="hidden" name="multilogin" value="true">
                        <input type="hidden" name="category" value="{{ $user->category }}">
                            @if ($user->category == 'PL91')
                            <button class="btn btn-block btn-lg mb-1 "
                            style="color: black; background-color: rgba(89, 194, 154, 0.801); width:30%; margin-left: auto; margin-right:auto" type="submit">
                            Kilang Buah</button>
                            @elseif ($user->category == 'PL101')
                            <button class="btn btn-block btn-lg mb-1 "
                            style="color: black; background-color: rgba(89, 194, 154, 0.801); width:30%; margin-left: auto; margin-right:auto" type="submit">
                            Kilang Penapis</button>
                            @elseif ($user->category == 'PL102')
                            <button class="btn btn-block btn-lg mb-1 "
                            style="color: black; background-color: rgba(89, 194, 154, 0.801); width:30%; margin-left: auto; margin-right:auto" type="submit">
                            Kilang Isirung</button>
                            @elseif ($user->category == 'PL104')
                            <button class="btn btn-block btn-lg mb-1 "
                            style="color: black; background-color: rgba(89, 194, 154, 0.801); width:30%; margin-left: auto; margin-right:auto" type="submit">
                            Kilang Oleokimia</button>
                            @elseif ($user->category == 'PL111')
                            <button class="btn btn-block btn-lg mb-1 "
                            style="color: black; background-color: rgba(89, 194, 154, 0.801); width:30%; margin-left: auto; margin-right:auto" type="submit">
                            Pusat Simpanan</button>
                            @elseif ($user->category == 'PLBIO')
                            <button class="btn btn-block btn-lg mb-1 "
                            style="color: black; background-color: rgba(89, 194, 154, 0.801); width:30%; margin-left: auto; margin-right:auto" type="submit">
                            Kilang Biodiesel</button>
                            @endif

                </form>
              @endforeach
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script src="{{ asset('nice-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/toastr/toastr-init.js') }}"></script>
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


</body>

</html>
