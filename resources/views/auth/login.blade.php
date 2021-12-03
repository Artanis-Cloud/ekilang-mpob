

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">




@extends('layouts.app')

@section('content')



    <div class="container">
        {{-- <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"> --}}
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="">
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.459) !important;">
                        <div class="card-header">
                            <div class="">
                                <br>

                                <img src="theme/images/background/favicon.png" alt="logo" style=" display: block;
                                          margin-left: auto;
                                          margin-right: auto;
                                          width: 50%;; width: 90px;height: 90px;" />
                                {{-- <br> --}}

                            </div>
                            <h3 class="text-center" style="color:rgba(89, 194, 154, 0.801); font-size:25px; font-family:verdana"><b> Sistem
                                E-Kilang </b></h3>
                            <h4 class="text-center" style="color:rgba(89, 194, 154, 0.801); font-size:20px; font-family:verdana"> Lembaga
                                Minyak Sawit Malaysia </h4>
                            <br>
                            <h4 class="text-center" style="color: white; font-size:20px; font-family:verdana">Log Masuk</h3>
                        </div>

                        <div class="card-body">
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
                                <div class="form-group">
                                    <input type="submit" value="Log Masuk" class="float-right btn login_btn" style="color: black;
                background-color: rgba(89, 194, 154, 0.801);
                width: 100px;">
                                </div>
                            </form>
                        </div>


                        <div class="card-footer">
                            <div class="d-flex justify-content-center links" style="color: white; font-family:verdana">
                                Tidak Mempunyai Akaun? <a href="{{ route('register') }}"><b> Daftar Akaun</b></a>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center" style="font-family: Verdana">
                                <a href="#"><b>Terlupa Kata Laluan</b></a>
                            </div>
                        </div>
                        {{-- </div> --}}
                        <br>
                    </div>
                </div>
            </div>

            {{-- <div class="row" style="justify-content: left;">
            <div class="col-md-1"></div>
            <div class="col-md-8">
            <div class="border card-header" style="background-color:#388d69">
                <h3 style="text-align: center"><b>Log Masuk</b></h3>
            </div>
            <div class="container"
                style="opacity: 0.3;background: linear-gradient(135deg, #274b3c 0%, #274b3c 100%); height: 650px;">
                <div class="card-body">

                    <h3 class="card-title" style="color: white">Nota Arahan:</h3>



                </div>
            </div>
        </div>
    </div> --}}
        </div>
    </div>



    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
