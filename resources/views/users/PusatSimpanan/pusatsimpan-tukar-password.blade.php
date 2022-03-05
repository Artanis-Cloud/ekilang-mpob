@extends($layout)

@section('content')


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

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
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="margin-left:25%; color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-6 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #25877b  !important;">
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
                                        <h3 style="color: rgb(39, 80, 71)">Tukar Kata Laluan</h3>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <form method="POST" action="{{ route('buah.tukarpassword') }}">
                                        {{ csrf_field() }}
                                        {{-- <h6><b>
                                                <h4 style="font-family:verdana; font-size:18px; color:white">Maklumat Kilang
                                                </h4>
                                            </b></h6> --}}



                                        <br>

                                        {{-- <h4 class="card-title" style="text-align: center; color:rgb(39, 80, 71)">
                                                Maklumat
                                                Kilang</h4>
                                            <br> --}}
                                        {{-- <form action="index.html"> --}}
                                        {{-- <div class="clearfix content" style="background-color: black"> --}}


                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Kata
                                                Laluan Terdahulu <i>(8 Aksara)</i></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='old_password'
                                                    id="old_password" placeholder="Kata Laluan Terdahulu" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Kata
                                                Laluan Baru <i>(8 Aksara)</i></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='new_password'
                                                    id="new_password" placeholder="Kata Laluan Baru" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Sahkan
                                                Kata Laluan Baru <i>(8 Aksara)</i></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='password_confirmation'
                                                    id="password_confirmation" placeholder="Sahkan Kata Laluan Baru"
                                                    required title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
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
                                                            <button type="submit" class="btn btn-primary ml-1"
                                                                data-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Ya</span>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </form>
                                </div>




                                </div>


                            </div>


                        </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
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





    </body>

    </html>

@endsection
