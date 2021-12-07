<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem E-Kilang</title>
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="assets/css/bootstrap.css"> --}}
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">
    {{-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> --}}
    <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">

    {{-- <link rel="stylesheet" href="assets/css/app.css"> --}}
</head>

<body>
    <div id="auth" style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover; max-width: 100%;
    height: auto;">

        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-8 col-sm-12">
                    <div class="pt-5 card" style="background-color: rgba(255, 255, 255, 0.782)">
                        <div class="card-body">
                            <div class="mb-5 text-center">
                                <img src="theme/images/favicon.png" height="80" class='mb-4'>
                                <h3 style="color: rgb(53 178 150)">Pendaftaran Akaun Pengguna</h3>
                                <p>Maklumat Kilang</p>
                            </div>
                            <form action="index.html">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tahun</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                name="fname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Negeri</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                name="lname-column">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="username-column">Nama Kilang</label>
                                            <input type="text" id="username-column" class="form-control"
                                                name="username-column">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Alamat Kilang</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="country-floating">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Poskod</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="company-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Daerah</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">No. Pendaftaran Syarikat (SSM)</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"> No. Lesen</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"> Laman Sesawang (Website) </label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"> Emel </label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">No. Telefon</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">No. Faks </label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"> Tarikh Kilang Ditubuhkan</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"> Tarikh Kilang Mula Operasi </label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"> Status Hak Milik Syarikat</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Status Warganegara </label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                </diV>
                                <br>
                                {{-- <a href="auth-login.html">Have an account? Login</a> --}}
                                <div class="clearfix">

                                    <a style="text-decoration:none" href="{{ route('daftar.akaun2') }}">
                                        <button class="btn btn-primary float-end"
                                            style="color: white;
                                    background-color: rgb(55, 104, 93); border:1px solid rgb(56, 104, 86)"><b>Seterusnya</b></button></a>
                                </div>
                            </form>
                            {{-- <div class="divider">
                                <div class="divider-text">OR</div>
                            </div> --}}
                            {{-- <div class="row">
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

    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
