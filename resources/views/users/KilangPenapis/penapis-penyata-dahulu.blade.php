@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Maklumat Pelesen</h4>
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
                <div style="padding: 2%">
                    <form action="{{ route('penapis.penyata.dahulu.process') }}" method="post">
                        @csrf
                        <div class="text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Terdahulu</h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Senarai Penyata Bulanan Terdahulu</h5>
                        </div>
                        <hr>


                        <div class="container center ">
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-2 form-group" style="margin: 0px">
                                        <label for="fname"
                                    class="control-label col-form-label required ">
                                    Sila Pilih Tahun</label>
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="tahun" required oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')" oninput="this.setCustomValidity('')">
                                            <option selected hidden disabled value="" >Sila Pilih Tahun</option>
                                            @for ($i = 2004; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                        </select>
                                    </fieldset>
                                    {{-- @error('alamat_kilang_1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-2 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required ">Bulan
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="bulan" required >
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

                        </div>
                        </div>
                        <div class="row justify-content-center form-group"  >
                                <button type="submit" class="btn btn-primary"  data-toggle="modal" style="margin-bottom: 13%"
                                    data-target="#next">Papar Penyata</button>
                        </div>
                    </form><br>
            </div>


@endsection
