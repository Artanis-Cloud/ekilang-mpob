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



    {{-- @extends('layouts.app')

@section('content') --}}
    <nav class="mx-3 mt-3 shadow-sm navbar navbar-expand-md" style="background: transparent">

            <a class="navbar-brand" style="margin-right: 75px" href="{{ url('/') }}">

                <img src="theme/images/background/favicon.png" height='45px' alt="">
                <img src="theme/images/background/mspo.png" height='60px' alt="">
            </a>
            {{-- <div class="ml-6"></div> --}}
            {{-- <div class="col-md-3"></div> --}}
             {{-- <div class="col-xs-4"></div> --}}
                {{-- <a class="mx-1 navbar-brand" href="{{ url('/') }}">

                <img src="theme/images/background/favicon.png"  height='45px' alt="">
                <img src="theme/images/background/mspo.png"  height='60px' alt=""> --}}

                <h3 style="color: white;  font-family:Verdana; margin-left:21%">Pendaftaran Akaun Pengguna</h3>


                {{-- </a> --}}

    </nav>


    {{-- <div class="main-w3layouts"> --}}

        {{-- <h3 style="color: white; text-align:center; font-family:Verdana">Pendaftaran Akaun Pengguna</h3> --}}



        {{-- <div class="col-12"> --}}
        <div class="main-agileinfo">
            <div class="agileits-top" style="background-color:rgba(0, 0, 0, 0.767) ">
<br>
                <h5 style="font-family: verdana; color:white; text-align:center"> Maklumat Kilang
                </h5>
                <form action=" #" method="post">
                    <br>


                    <div class="row">
                        <div class="col-6">
                            <h6 style="color: white"> Tahun </h6>
                            <input class="text" type="text" name="Username" placeholder="Tahun" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);
                            ">
                        </div>
                        <div class="col-6">
                            <h6 style="color: white"> Negeri </h6>
                            <input class="text" type="text" name="Username" placeholder="Negeri" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-13">
                            <h6 style="color: white"> Nama Kilang </h6>
                            <input class="text" type="text" name="Username" placeholder="Nama Kilang"
                                required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <h6 style="color: white"> Alamat Kilang </h6>
                            <input class="text" type="text" name="Username" placeholder="Alamat Kilang"
                                required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <h6 style="color: white"> Poskod </h6>
                            <input class="text" type="text" name="Username" placeholder="Poskod" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                        <div class="col-6">
                            <h6 style="color: white"> Daerah </h6>
                            <input class="text" type="text" name="Username" placeholder="Daerah" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h6 style="color: white"> No. Pendaftaran Syarikat (SSM) </h6>
                            <input class="text" type="text" name="Username" placeholder="No. SSM" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                        <div class="col-6">
                            <h6 style="color: white"> No. Lesen </h6>
                            <input class="text" type="text" name="Username" placeholder="No. Lesen"
                                required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h6 style="color: white"> Laman Sesawang (Website) </h6>
                            <input class="text" type="text" name="Username" placeholder="Laman Sesawang"
                                required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>

                        <div class="col-6">
                            <h6 style="color: white"> Emel </h6>
                            <input class="text" type="text" name="Username" placeholder="Emel" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <h6 style="color: white"> No. Telefon </h6>
                            <input class="text" type="text" name="Username" placeholder="No. Telefon"
                                required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                        <div class="col-6">
                            <h6 style="color: white"> No. Faks </h6>
                            <input class="text" type="text" name="Username" placeholder="No. Faks"
                                required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h6 style="color: white"> Tarikh Kilang Ditubuhkan </h6>
                            <input class="text" type="text" name="Username"
                                placeholder="Tarikh Kilang Ditubuhkan" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                        <div class="col-6">
                            <h6 style="color: white"> Tarikh Kilang Mula Operasi </h6>
                            <input class="text" type="text" name="Username"
                                placeholder="Tarikh Kilang Mula Operasi" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h6 style="color: white"> Status Hak Milik Syarikat </h6>
                            <input class="text" type="text" name="Username"
                                placeholder="Status Hak Milik Syarikat" required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                        <div class="col-6">
                            <h6 style="color: white"> Status Warganegara </h6>
                            <input class="text" type="text" name="Username" placeholder="Status Warganegara"
                                required="" style=" border: solid 1px rgba(255, 255, 255, 0.878);">
                        </div>
                    </div>

                    {{-- <div class="container">
    <div class="row">
        <div class="mx-auto col-md-7 col-sm-12">
            <div class="pt-4 card">
                <div class="card-body">
                    <div class="mb-5 text-center">
                        {{-- <img src="assets/images/favicon.svg" height="48" class='mb-4'> --}}
                    {{-- <h3>Sign Up</h3>
                        <p>Please fill the form to register.</p>
                    </div>
                    <form action="index.html"> --}}
                    {{-- <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="first-name-column">First Name</label>
                            <input type="text" id="first-name-column" class="form-control" name="fname-column">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="last-name-column">Last Name</label>
                            <input type="text" id="last-name-column" class="form-control" name="lname-column">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="username-column">Username</label>
                            <input type="text" id="username-column" class="form-control" name="username-column">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country-floating">Country</label>
                            <input type="text" id="country-floating" class="form-control" name="country-floating">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="company-column">Company</label>
                            <input type="text" id="company-column" class="form-control" name="company-column">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="email-id-column">Email</label>
                            <input type="email" id="email-id-column" class="form-control" name="email-id-column">
                        </div>
                    </div>
                </div> --}}

                    {{-- <a href="auth-login.html" style="text-align: center">Have an account? Login</a> --}}
                    <br>
                    <div class="clearfix">
                        <button class="btn btn-primary float-end"><a style="color: white; text-decoration:none"
                                href="{{ route('daftar.akaun2') }}">Seterusnya</button>
                    </div>
                    <br>
                </form>
                {{-- <div class="divider">
                        <div class="divider-text">OR</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="mb-2 btn btn-block btn-primary"><i data-feather="facebook"></i>
                                Facebook</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="mb-2 btn btn-block btn-secondary"><i data-feather="github"></i>
                                Github</button>
                        </div>
                    </div> --}}
            {{-- </div> --}}
        </div>
    </div>
    </div>
    </div>




    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
    {{-- @endsection --}}
