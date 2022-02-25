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
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: rgb(64, 69, 68) !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='grey'">
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
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- <div class="card-header border-bottom">
                        <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                    </div> --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" style="background-color: rgb(238, 70, 70)"
                                     type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Pusat Simpanan
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('admin.9penyataterdahulu') }}">Kilang Buah</a>
                                      <a class="dropdown-item" href="{{ route('admin.9penyataterdahulupenapis') }}">Kilang Penapis</a>
                                      <a class="dropdown-item" href="{{ route('admin.9penyataterdahuluisirung') }}">Kilang Isirung</a>
                                      <a class="dropdown-item" href="{{ route('admin.9penyataterdahuluoleokimia') }}">Kilang Oleokimia</a>
                                      {{-- <a class="dropdown-item" href="{{ route('admin.9penyataterdahulusimpanan') }}">Pusat Simpanan</a> --}}
                                      <a class="dropdown-item" href="{{ route('admin.9penyataterdahulubiodiesel') }}">E-Biodiesel</a>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">
                                    <form action="{{ route('admin.9penyataterdahulu.process') }}" method="post">
                                        @csrf
                                        <div class=" text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses 9</h3>
                                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Papar Penyata Bulanan
                                                Terdahulu di MYSQL dan PLEID</h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>

                                        <div class="container center">
                                            <br>
                                            {{-- </diV> --}}

                                            <div class="row mt-1">
                                                <label for="fname"
                                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                                </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="tahun">
                                                            <option selected hidden disabled>Sila Pilih Tahun</option>

                                                            <option>2003</option>
                                                            <option>2004</option>
                                                            <option>2005</option>
                                                            <option>2006</option>
                                                            <option>2007</option>
                                                            <option>2008</option>
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                            <option>2014</option>
                                                            <option>2015</option>
                                                            <option>2016</option>
                                                            <option>2017</option>
                                                            <option>2018</option>
                                                            <option>2019</option>
                                                            <option>2020</option>
                                                            <option>2021</option>
                                                            <option>2022</option>



                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                                </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="bulan">
                                                            <option selected hidden disabled>Sila Pilih Bulan</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Mac</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Jun</option>
                                                            <option value="07">Julai</option>
                                                            <option value="08">Ogos</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Disember</option>



                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Sumber
                                                    Data
                                                </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="sumber">
                                                            <option selected hidden disabled>Sila Pilih Sumber Data</option>
                                                            <option>e-Kilang</option>
                                                            <option>PLEID</option>
                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row form-group" style="padding-top: 10px; ">
                                            <div class="text-right col-md-12 mb-2 ">
                                                {{-- <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                    style="float: right"
                                                    data-bs-target="#exampleModalCenter">Porting</button> --}}
                                                    <button type="submit">YA</button>
                                            </div>
                                        </div>
                                        <div class="row" style=" float:right">

                                            <div class="col-md-12">


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
                                                                    Anda pasti mahu porting maklumat ini?
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
                                </form>
                            </div>
                        </div>
                        <br>

    </section><!-- End Hero -->




    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>




    </body>

    </html>



@endsection
