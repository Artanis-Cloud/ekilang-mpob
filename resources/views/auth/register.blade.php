@extends('layouts.app')

@section('content')

    <div class="main-w3layouts">
        <h3 style="color: white; text-align:center; font-family:Verdana">Pendaftaran Akaun Pengguna</h3>

        {{-- <div class="col-12"> --}}
        <div class="main-agileinfo">
            <div class="agileits-top" ">
                        <form action=" #" method="post">

                <div class="row">
                    <div class="col-6">
                        <h6 style="color: white"> Tahun </h6>
                        <input class="text" type="text" name="Username" placeholder="Tahun" required="">
                    </div>
                    <div class="col-6">
                        <h6 style="color: white"> Negeri </h6>
                        <input class="text" type="text" name="Username" placeholder="Negeri" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-13">
                        <h6 style="color: white"> Nama Kilang </h6>
                        <input class="text" type="text" name="Username" placeholder="Nama Kilang" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <h6 style="color: white"> Alamat Kilang </h6>
                        <input class="text" type="text" name="Username" placeholder="Alamat Kilang" required="">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-6">
                        <h6 style="color: white"> Poskod </h6>
                        <input class="text" type="text" name="Username" placeholder="Poskod" required="">
                    </div>
                    <div class="col-6">
                        <h6 style="color: white"> Daerah </h6>
                        <input class="text" type="text" name="Username" placeholder="Daerah" required="">
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
                    <button class="btn btn-primary float-end">Seterusnya</button>
                </div>
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
            </div>
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
</div> --}}
@endsection
