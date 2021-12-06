
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Sistem E-Kilang</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/images/favicon.png') }}">



</head>

<body style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover; max-width: 100%;
height: auto;">


    <nav class="mx-3 mt-3 shadow-sm navbar navbar-expand-md" style="background: transparent">

        <a class="navbar-brand" style="margin-right: 65px" href="{{ url('/') }}">

            <img src="theme/images/background/favicon.png" height='45px' alt="">
            <img src="theme/images/background/mspo.png" height='60px' alt="">
        </a>
        {{-- <div class="ml-6"></div> --}}
        <div class="col-md-3"></div>
        {{-- <div class="col-md-1"> --}}
        {{-- <a class="mx-1 navbar-brand" href="{{ url('/') }}">

        <img src="theme/images/background/favicon.png"  height='45px' alt="">
        <img src="theme/images/background/mspo.png"  height='60px' alt=""> --}}

        <h3 style="color: white; text-align:center; font-family:Verdana">Pendaftaran Akaun Pengguna</h3>


        {{-- </a> --}}
        {{-- </div> --}}
    </nav>

{{-- @extends('layouts.app')

@section('content') --}}

    {{-- <div class="main-w3layouts wrapper"> --}}
        {{-- <h3 style="color: white">Pendaftaran Akaun Pengguna</h3> --}}
        {{-- <div class="col-12"> --}}
        <div class="main-agileinfo">
            <div class="agileits-top" style="background-color:rgba(0, 0, 0, 0.767)  ">
                <form action=" #" method="post">
<br>
                    <h5 style="font-family: verdana; color:white; text-align:center"> Maklumat Pengguna </h5>
                    <form action=" #" method="post">
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <h6 style="color: white"> Nama Pengguna </h6>
                                <input class="text" type="text" name="Username" placeholder="Nama Pengguna"
                                    required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <h6 style="color: white"> No. Kad Pengenalan </h6>
                                <input class="text" type="text" name="Username" placeholder="No. Kad Pengenalan"
                                    required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                            </div>


                            <div class="col-6">
                                <h6 style="color: white"> Warganegara </h6>
                                <input class="text" type="text" name="Username" placeholder="Warganegara"
                                    required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <h6 style="color: white"> Jantina </h6>
                                <input class="text" type="text" name="Username" placeholder="Jantina" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                            </div>

                            <div class="col-6">
                                <h6 style="color: white"> Emel </h6>
                                <input class="text" type="text" name="Username" placeholder="Emel" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <h6 style="color: white"> Jawatan </h6>
                                <input class="text" type="text" name="Username" placeholder="Jawatan" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                            </div>

                            <div class="col-6">
                                <h6 style="color: white"> No. Pekerja </h6>
                                <input class="text" type="text" name="Username" placeholder="No. Pekerja" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                            </div>
                        </div>
                        <br>




                        {{-- <h6 style="color: white"> Nama Kilang </h6>
            <input class="text email" type="email" name="email" placeholder="Email" required="">
            <input class="text" type="password" name="password" placeholder="Password" required="">
            <input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required=""> --}}
                        {{-- <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div> --}}
                        <br>
                        <br>

                        <div class="text-right form-group ">
                            <div class="col-md-12">
                                <button type="button" class="btn" alt="default" style="background-color: gray"><a
                                        style="color: white; text-decoration:none" href="{{ route('register') }}">
                                        Sebelumnya</button>
                                <button type="button" wire:loading.attr="disabled" class="btn btn-primary" alt="default"><a
                                        style="color: white; text-decoration:none" href="#">
                                        Hantar</a></button>
                            </div>
                        </div>

                        <br>

                        {{-- <div class="text-right form-group m-b-0">
                <div class="col-12">

                <button type="button"class="btn" alt="default" style="background-color: gray; color:black" class="model_img img-fluid">
                    {{-- <a style="color: black" href="{{ route('daftar.akaun') }}"> --}}
                        {{-- Sebelumnya</button>
                <button type="button" class="btn btn-primary" alt="default" class="model_img img-fluid"><a style="color: white" href="{{ route('daftar.akaun3') }}">
                    Seterusnya</button> --}}
                        {{-- <input type="submit" value="Seterusnya"> --}}
            </div>

        {{-- </div> --}}
        </form>

        {{-- <input type="submit" value="Daftar">
            </form>
            <p>Sudah? <a href="#"> Login Now!</a></p> --}}
    </div>
    </div>
    </div>
    <!-- copyright -->
    {{-- <div class="colorlibcopy-agile">
        <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
    </div>
    <!-- //copyright -->
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul> --}}
    </div>
    <!-- //main -->
    </body>

    </html>
{{-- @endsection --}}
