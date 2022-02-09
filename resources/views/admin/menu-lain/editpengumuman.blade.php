@extends($layout)

@section('content')

  <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Pengumuman</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('theme/images/favicon.png') }}" rel="image/x-icon">
        <link href="{{ asset('theme/kilangstyles/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <link rel="stylesheet" href="{{ asset('theme/vendors/quill/quill.snow.css') }}">

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

        <link href="{{ asset('theme/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />




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
        <link href="{{ asset('theme/kilangstyles/css/style.css') }}" rel=" stylesheet">

        <!-- datepicker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>

 </head>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative"  data-aos-delay="100">

        {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
        {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

        <div class=" mt-2 mb-4  row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}" style="color: rgb(102, 100, 100) !important;"
                                                        onMouseOver="this.style.color='lightblue'"
                                                        onMouseOut="this.style.color='black'">
                                                        {{ $breadcrumb['name'] }}
                                                    </a>
                                                </li>
                                            @else
                                                <li class="breadcrumb-item active" aria-current="page"
                                                    style="color: #e8d255  !important;">
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
                <div class="card" style="margin-right:2%; margin-left:2%">
                    {{-- <div class="card-header border-bottom">
                        <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                    </div> --}}

                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class="text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:3%">Kemaskini Pengumuman</h3>
                                    {{-- <h5 style="color: rgb(39, 80, 71)">Eksport Produk Sawit
                                    </h5> --}}
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>

                                {{-- <form action="{{route('admin.updatepengumuman',[$data->id])}}" method="post"> --}}
                                <div class="container center mt-2">

                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                            Tarikh Mula</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name='Start_date' id="Start_date" required
                                                title="Sila isikan butiran ini."
                                                value="{{old('Start_date') ?? $pengumuman->Start_date}}">
                                            {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                            Tarikh Akhir</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name='End_date' id="End_date" required
                                                title="Sila isikan butiran ini."
                                                value="{{old('End_date') ?? $pengumuman->End_date}}">
                                            {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                           Icon New</label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option selected hidden disabled>{{old('Icon_new') ?? $pengumuman->Icon_new}}</option>
                                                    <option>Ya
                                                    </option>
                                                    <option>Tidak
                                                    </option>

                                                </select>
                                            </fieldset>
                                            {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 5%">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                            Mesej</label>

                                        <div class="col-md-6">
                                            <div id="snow">
                                                <input type="text" class="form-control" name='Message' id="Message" required
                                                title="Sila isikan butiran ini.">
                                                {{old('Message') ?? $pengumuman->Message}}
                                            {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label align-items-center">
                                        </label>
                                        <div class="col-md-6">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input" id="file">
                                                <label class="form-file-label" for="file">

                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- <div class="col-md-3">
                                            <p>Gambar Dimuatnaik:</p>
                                            <img src="" alt="Sila Muatnaik Gambar Sijil SSM"
                                                id="category-img-ssm"
                                                style="width:100%;height:30vh;display: none;">
                                        </div> --}}
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                        </div>
                                    </div>

                                </div>
                            </form>
                            </div>




                        </div>




                        <div class="row form-group" style="padding-top: 10px; ">


                            {{-- <div class="text-left col-md-5">
                                <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                    style="float: left">Sebelumnya</a>
                            </div> --}}
                            <div class="text-right col-md-12 ">
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
                                                Anda pasti mahu menghantar emel ini?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block"
                                                    style="color:#275047">Kembali</span>
                                            </button>
                                            <button type="button" class="btn btn-primary ml-1"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Hantar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        </div>


    </section><!-- End Hero -->





    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}



    {{-- </body>

    </html> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


@endsection
