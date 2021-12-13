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
    <link href="{{ asset('theme/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/libs/jquery-steps/steps.css') }}" rel="stylesheet" />



    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />

    {{-- <link rel="stylesheet" href="assets/css/app.css"> --}}
</head>

<body>
    <div id="auth" style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover; max-width: 100%;
    height: auto;">

        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-8 col-sm-12">
                    {{-- <div class="pt-5 card" style="background-color: rgba(255, 255, 255, 0.782)"> --}}
                    <div class="pt-5 card"
                        style="background: linear-gradient(to bottom, rgb(224, 255, 255,0.7) 0%, rgb(0, 139, 139,0.7) 100%);">
                        <div class="card-body">
                            <div class="mb-5 text-center">
                                <img src="theme/images/favicon.png" height="80" class='mb-4'>
                                <h3 style="color: rgb(39, 80, 71)">Pendaftaran Akaun Pelesen</h3>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <form action="{{ route('register') }}" class="validation-wizard wizard-circle m-t-40"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <h6><b>
                                        <h4 style="font-family:verdana; font-size:18px; color:white">Maklumat Kilang
                                        </h4>
                                    </b></h6>


                                <section>

                                    <h4 class="card-title"
                                        style="text-align: center; color:rgb(39, 80, 71)">Maklumat
                                        Kilang</h4>
                                        <br>
                                    {{-- <form action="index.html"> --}}
                                    {{-- <div class="clearfix content" style="background-color: black"> --}}
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column" style="color: white">Tahun</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    name="fname-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column" style="color: white">Negeri</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                    name="lname-column">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="username-column" style="color: white">Nama
                                                    Kilang</label>
                                                <input type="text" id="username-column" class="form-control"
                                                    name="username-column">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="country-floating" style="color: white">Alamat
                                                    Kilang</label>
                                                <input type="text" id="country-floating" class="form-control"
                                                    name="country-floating">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column" style="color: white">Poskod</label>
                                                <input type="text" id="company-column" class="form-control"
                                                    name="company-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white">Daerah</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white">No. Pendaftaran
                                                    Syarikat
                                                    (SSM)</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white"> No. Lesen</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white"> Laman Sesawang
                                                    (Website)
                                                </label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white"> Emel </label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white">No.
                                                    Telefon</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white">No. Faks </label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white"> Tarikh Kilang
                                                    Ditubuhkan</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white"> Tarikh Kilang
                                                    Mula
                                                    Operasi </label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white"> Status Hak Milik
                                                    Syarikat</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white">Status Warganegara
                                                </label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                    </diV>
                                    {{-- </div> --}}
                                </section>
                                <br>
                                <h6><b>
                                        <h4 style="font-family:verdana; font-size:18px; ">Maklumat Pengguna Kilang</h4>
                                    </b></h6>

                                <section>

                                    <h4 class="card-title"
                                        style="text-align: center; color:rgb(39, 80, 71)">Maklumat
                                        Pengguna Kilang</h4>
<br>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column" style="color: white">Nama
                                                    Pengguna</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    name="fname-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column" style="color: white">No. Kad
                                                    Pengenalan</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                    name="lname-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username-column" style="color: white">Warganegara</label>
                                                <input type="text" id="username-column" class="form-control"
                                                    name="username-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating" style="color: white">Jantina</label>
                                                <input type="text" id="country-floating" class="form-control"
                                                    name="country-floating">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column" style="color: white">Emel</label>
                                                <input type="text" id="company-column" class="form-control"
                                                    name="company-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column" style="color: white">No. Telefon</label>
                                                <input type="text" id="company-column" class="form-control"
                                                    name="company-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white">Jawatan</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column" style="color: white">No. Pekerja</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column">
                                            </div>
                                        </div>
                                </section>
                                {{-- <a href="auth-login.html">Have an account? Login</a> --}}
                                {{-- <div class="clearfix">

                                    {{-- <a class="btn btn-primary float-end" style="text-decoration:none; color: white;
                                    background-color: rgb(55, 104, 93); border:1px solid rgb(30, 53, 45)"
                                        href="{{ route('daftar.akaun2') }}">
                                        <b>Seterusnya</b>
                                    </a> --}}
                                {{-- </div> --}}
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
    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('asset/theme/js/app.js') }}"></script>

    <script src="assets/js/main.js"></script>

    <script>
        var form = $(".validation-wizard").show();

        $(".validation-wizard").steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> #title#',
                labels: {
                    finish: "Hantar",
                    next: "Seterusnya",
                    previous: "Sebelumnya",
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (
                        currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error")
                            .remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")),
                        form
                        .validate().settings.ignore = ":disabled,:hidden", form.valid())
                },
                onFinishing: function(event, currentIndex) {
                    return form.validate().settings.ignore = ":disabled", form.valid()
                },
                onFinished: function(event, currentIndex) {
                    // swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                    form.submit();
                }
            }),

            $(".validation-wizard").validate({
                ignore: "input[type=hidden]",
                errorClass: "text-danger",
                successClass: "text-success",
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element)
                },
                rules: {
                    email: {
                        email: !0
                    }
                }
            })
    </script>


</body>

</html>
