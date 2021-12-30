@extends($layout)

@section('content')

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

        <link href="{{ asset('theme/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/libs/jquery-steps/steps.css') }}" rel="stylesheet" />



        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
            rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <meta charset=utf-8 />

        <!-- Template Main CSS File -->
        <link href="{{ asset('theme/kilangstyles/css/style.css') }}"" rel=" stylesheet">
        <!-- =======================================================
                      * Template Name: OnePage - v4.7.0
                      * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
                      * Author: BootstrapMade.com
                      * License: https://bootstrapmade.com/license/
                      ======================================================== -->
    </head>


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative"  data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-5 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}" style="color: white !important;" onMouseOver="this.style.color='lightblue'" onMouseOut="this.style.color='white'"> {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                <li class="breadcrumb-item active" aria-current="page" style="color: #fff03e  !important;">
                                                    {{ $breadcrumb['name'] }}
                                                </li>
                                                @endif
                                            @endforeach

                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin-right:10%; margin-left:10%">
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
                        <br>
                        <br>
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class="mb-5 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71)">Maklumat Asas Pelesen</h3>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>
                                    <h6 style="color: rgb(39, 80, 71, 0.8);"><b><i> Nota : Sila kemaskini jika ada perubahan </i></b></h6>
                                    <form action="" class="validation-wizard wizard-circle m-t-40" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- <h6><b>
                                                <h4 style="font-family:verdana; font-size:18px; color:white">Maklumat Kilang
                                                </h4>
                                            </b></h6> --}}


                                        <section>
                                            <br>

                                            {{-- <h4 class="card-title" style="text-align: center; color:rgb(39, 80, 71)">
                                                Maklumat
                                                Kilang</h4>
                                            <br> --}}
                                            {{-- <form action="index.html"> --}}
                                            {{-- <div class="clearfix content" style="background-color: black"> --}}
                                            <div class="row">
                                                <div class="col-12" style="margin-bottom:-5%">
                                                    <div class="form-group">
                                                        <label class="required control-label col-form-label" for="first-name-column">Alamat Premis Berlesen</label>
                                                        <input type="text" id="first-name-column" class="form-control" required title="Sila isikan butiran ini." placeholder="Alamat Premis 1"
                                                            name="fname-column">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column"></label>
                                                        <input type="text" id="first-name-column" class="form-control" placeholder="Alamat Premis 2"
                                                            name="fname-column">
                                                    </div>
                                                </div>
                                                <div class="col-12" style="margin-bottom:-5%">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Alamat Surat Menyurat</label>
                                                        <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 1"
                                                            name="lname-column">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column"></label>
                                                        <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 2"
                                                            name="lname-column">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="company-column">No. Telefon Pejabat / Kilang</label>
                                                        <input type="text" id="company-column" class="form-control" placeholder="No. Telefon Pejabat / Kilang"
                                                            name="company-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">No. Faks</label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="No. Faks"
                                                            name="email-id-column">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Alamat Emel</label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="Alamat Emel"
                                                            name="email-id-column">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column"> Nama Pegawai Melapor</label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="Nama Pegawai Melapor"
                                                            name="email-id-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column"> Jawatan Pegawai Melapor
                                                        </label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="Jawatan Pegawai Melapor"
                                                            name="email-id-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">No. Telefon Pegawai Melapor</label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="No. Telefon Pegawai Melapor"
                                                            name="email-id-column">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Nama Pegawai Bertanggungjawab</label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="Nama Pegawai Bertanggungjawab"
                                                            name="email-id-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Jawatan Pegawai
                                                            Bertanggungjawab</label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="Jawatan Pegawai Bertanggungjawab"
                                                            name="email-id-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Alamat Emel Pengurus</label>
                                                        <input type="email" id="email-id-column" class="form-control" placeholder="Alamat Emel Pengurus"
                                                            name="email-id-column">
                                                    </div>
                                                </div>





                                            </diV>
                                            <br>

                                            {{-- <div class="row float-left">
                                                <div class="col-md-12 offset-md-12">
                                                    <button type="submit" class="btn btn-primary" style="float: right; ">
                                                        {{ __('Simpan') }}
                                                    </button>
                                                </div>
                                            </div> --}}


                                            {{-- </div> --}}
                                        </section>
                                        <div class="row form-group" style="padding-top: 10px; ">


                                            {{-- <div class="text-left col-md-5">
                                                <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                                    style="float: left">Sebelumnya</a>
                                            </div> --}}
                                            <div class="text-right col-md-12 mb-4 ">
                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                    style="float: right" data-bs-target="#exampleModalCenter">Simpan</button>
                                            </div>

                                        </div>

                                            <!-- Vertically Centered modal Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                PENGESAHAN</h5>
                                                            <button type="button" class="close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Anda pasti mahu menyimpan maklumat ini?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block"
                                                                    style="color:#275047">Tidak</span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary ml-1"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Ya</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <br>
                                    <br>





                                </div>

                            </div>
                        </div>
                    </div>











                    <br>





    </section><!-- End Hero -->


    





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

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

@endsection
