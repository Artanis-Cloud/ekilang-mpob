@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Penyata Bulanan</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                    @if (!$loop->last)
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['link'] }}" style="color: rgb(64, 69, 68) !important;"
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
            <div class="card-body">
                <div class="">
                    <form action="{{ route('isirung.penyata.dahulu.process') }}" method="post">
                        @csrf
                        <div class="text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Terdahulu</h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Senarai Penyata Bulanan Terdahulu</h5>
                        </div>
                        <hr>
                        <div class="container center mt-2">
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-2 form-group" style="margin: 0px">
                                    <label for="fname"
                                        class="control-label col-form-label required">
                                        Sila Pilih Tahun</label>
                                </div>
                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="tahun" required>
                                            <option selected hidden disabled>Sila Pilih Tahun</option>
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

                                        </select>
                                    </fieldset>
                                    @error('tahun')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-2 form-group" style="margin: 0px">
                                    <label for="fname"
                                        class="control-label col-form-label required">Bulan
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="bulan" required>
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
                                    @error('bulan')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                </div>
                {{-- <div class="row form-group" style="padding-top: 20px; ">



                                            <div class="text-right col-md-12 mb-4 ">
                                                <button type="submit" class="btn btn-primary " data-toggle="modal"
                                                    style="float: right" data-target="#confirmation">Papar Penyata</button>
                                            </div>

                                    </div> --}}
                <div class="row justify-content-center form-group" style="margin-top:20px; ">
                        <button type="submit" class="btn btn-primary" data-toggle="modal"
                            data-target="#next">Papar Penyata</button>


                </div>
                </form><br><br>
            </div>@endsection
        </div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

