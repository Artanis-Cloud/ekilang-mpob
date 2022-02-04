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

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Pindahan Penyata Bulanan ke Dynamic Query</h4>
                                    {{-- <h5 style="color: rgb(39, 80, 71); font-size:14px;">Porting Penyata Bulanan Selepas Release</h5>--}}
                                    <h6 style="color: rgb(242, 68, 68); margin-bottom:1%"><i>
                                        Perhatian: Proses ini akan memindahkan semua penyata daripada sistem PLEID</i>
                                    </h6>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>

                                <div class="container center" >


                                    <br>

                                    {{-- </diV> --}}

                                    <div class="row mt-1" >
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
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

                                    <div class="row" >
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
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
                                </div>


                                <div class="row form-group" style="padding-top: 10px; ">


                                    {{-- <div class="text-left col-md-5">
                                        <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>
                                    </div> --}}
                                    <div class="text-right col-md-12 mb-2 ">
                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            style="float: right" data-bs-target="#exampleModalCenter">Porting</button>
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
                                                            Anda pasti mahu cetak maklumat ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
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
                        </div>
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
