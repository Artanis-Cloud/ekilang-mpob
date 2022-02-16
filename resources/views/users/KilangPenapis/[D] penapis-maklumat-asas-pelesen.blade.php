@extends($layout)

@section('content')

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
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class=" text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan </i>
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <div class="container center mt-5" >
                                        <div class="row" style="margin-bottom:2.5%; margin-top:-2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label required col-form-label align-items-center">
                                                Alamat Premis Berlesen</label>
                                            <div class="col-md-6">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 1"
                                                            name="lname-column" >
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%; ">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 2"
                                                            name="lname-column">
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%;">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 3"
                                                            name="lname-column" >
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom:2.5%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Alamat Surat Menyurat</label>
                                            <div class="col-md-6">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 1"
                                                            name="lname-column">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 2"
                                                            name="lname-column">
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 3"
                                                            name="lname-column">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                No. Telefon (Pejabat / Kilang)</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control" placeholder="No. Telefon Pejabat / Kilang"
                                                            name="company-column">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                No. Faks</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="No. Faks"
                                                            name="email-id-column">
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
                                                Alamat Emel</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Alamat Emel"
                                                            name="email-id-column">
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
                                                Nama Pegawai Melapor</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Nama Pegawai Melapor"
                                                            name="email-id-column">
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
                                                Jawatan Pegawai Melapor</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Jawatan Pegawai Melapor"
                                                            name="email-id-column">
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
                                                No. Telefon Pegawai Melapor</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="No. Telefon Pegawai Melapor"
                                                            name="email-id-column">
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
                                                Nama Pegawai Bertanggungjawab</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Nama Pegawai Bertanggungjawab"
                                                            name="email-id-column">
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
                                                Jawatan Pegawai
                                                Bertanggungjawab</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Jawatan Pegawai Bertanggungjawab"
                                                            name="email-id-column">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:2.5%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Alamat Emel Pengurus</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Alamat Emel Pengurus"
                                                            name="email-id-column">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                    </div>


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
                                </div>




                                </div>


                            </div>
                            <br>


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




    </body>

    </html>

@endsection
