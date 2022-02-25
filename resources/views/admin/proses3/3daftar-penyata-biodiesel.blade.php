@extends($layout)

@section('content')

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid rgba(204, 204, 204, 0);
        background-color: #f7f9fd00;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #dee2e6;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }

</style>

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
                    <div class="tab" style="margin-right:10%; margin-left:10%">
                        <button class="tablinks" onclick="openInit(event, 'All')">Initialize
                            Semua Pelesen</button>
                        <button class="tablinks" onclick="openInit(event, 'One')" id="defaultOpen">Initialize Satu Pelesen</button>

                    </div>

                    <div class="card" style="margin-right:10%; margin-left:10%">


                        <!-- Tab content -->
                        <div id="All" class="tabcontent">
                        <div class="card-body">
                            <div class="row">
                                <div class="pl-3">

                                    <div class=" text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Initialize Semua Pelesen
                                        </h3>
                                        <h5 style="color: rgb(39, 80, 71); font-size:14px ">Daftar Penyata Bulanan Baru
                                            Semua
                                            Kilang
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <div class="container center mt-5">

                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                User ID</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control"
                                                    placeholder=" No. Lesen" name="company-column">
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
                                                Kata Laluan</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control"
                                                    placeholder="Kata Laluan Baru (8 Aksara)" name="company-column">
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
                                                Tahun</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" style="font-size:smaller"
                                                        id="basicSelect">
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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Bulan</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" style="font-size:smaller"
                                                        id="basicSelect">
                                                        <option selected hidden disabled>Sila Pilih Bulan</option>
                                                        <option>Januari</option>
                                                        <option>Februari</option>
                                                        <option>Mac</option>
                                                        <option>April</option>
                                                        <option>Mei</option>
                                                        <option>Jun</option>
                                                        <option>Julai</option>
                                                        <option>Ogos</option>
                                                        <option>September</option>
                                                        <option>Oktober</option>
                                                        <option>November</option>
                                                        <option>Disember</option>



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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Tarikh Akhir Submit</label>
                                            <div class="col-md-6">
                                                <input type="date" id="company-column" class="form-control"
                                                    placeholder="Bulan" name="company-column">
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row form-group" style="padding-top: 10px; ">

                            <div class="text-right col-md-12 mb-4 ">
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                    style="float: right" data-bs-target="#exampleModalCenter">Initialize
                                    Semua</button>

                            </div>
                        </div>

                        <!-- Vertically Centered modal Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            PENGESAHAN</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Anda pasti mahu initialize semua pelesen?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Ya</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-right:10%; margin-left:10%">
                    <div class="card-body">
                        <div id="One" class="tabcontent">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" style="background-color: rgb(238, 70, 70)"
                                     type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Kilang Biodiesel
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('admin.3daftarpenyata') }}">Kilang Buah</a>
                                      <a class="dropdown-item" href="{{ route('admin.3daftarpenyatapenapis') }}">Kilang Penapis</a>
                                      <a class="dropdown-item" href="{{ route('admin.3daftarpenyataisirung') }}">Kilang Isirung</a>
                                      <a class="dropdown-item" href="{{ route('admin.3daftarpenyataoleokimia') }}">Kilang Oleokimia</a>
                                      <a class="dropdown-item" href="{{ route('admin.3daftarpenyatasimpanan') }}">Pusat Simpanan</a>

                                    </div>
                                </div>
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class=" text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Initialize Pelesen</h3>
                                        <h5 style="color: rgb(39, 80, 71); font-size:14px ">Daftar Penyata Bulanan Baru
                                            Pelesen
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <div class="container center mt-5" >

                                        <div class="row" >
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                User ID</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control" placeholder=" No. Lesen"
                                                            name="company-column">
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
                                                Kata Laluan</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control" placeholder="Kata Laluan Baru (8 Aksara)"
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
                                                Tahun</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" style="font-size:smaller" id="basicSelect">
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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Bulan</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" style="font-size:smaller" id="basicSelect">
                                                            <option selected hidden disabled>Sila Pilih Bulan</option>
                                                            <option>Januari</option>
                                                            <option>Februari</option>
                                                            <option>Mac</option>
                                                            <option>April</option>
                                                            <option>Mei</option>
                                                            <option>Jun</option>
                                                            <option>Julai</option>
                                                            <option>Ogos</option>
                                                            <option>September</option>
                                                            <option>Oktober</option>
                                                            <option>November</option>
                                                            <option>Disember</option>



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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Tarikh Akhir Submit</label>
                                            <div class="col-md-6">
                                                <input type="date" id="company-column" class="form-control" placeholder="Bulan"
                                                            name="company-column">
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
                                                No. Lesen (Untuk Initialize satu pelesen)</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control" placeholder="No. Lesen"
                                                            name="company-column">
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
                                                style="float: right" data-bs-target="#exampleModalCenter">Initialize Semua</button>

                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter">Initialize Satu Pelesen</button>
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
                                                            Anda pasti mahu initialize maklumat ini?
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


    <script>
        function openInit(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>



@endsection

