@extends('layouts.main')

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid rgba(204, 204, 204, 0);
        background-color: #f7f9fd00;
    }

    /* Style the buttons that are used to open the tab content */
    .tab a {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab a:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab a.active {
        background-color: #dee2e6;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }


    tr {
    border-top: 1px solid #ccc;
    }
    td, th {
    vertical-align: top;
    text-align: left;
    width:150px;
    padding: 5px;
    }

    @media screen
    {
        .noPrint{}
        .noScreen{display:none;}
    }

    @media print
    {
        @page {size: auto !important}
        .noPrint{display:none;}
        .noScreen{}
    }




</style>

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
                <div class="col-12 align-self-center">
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
                <div class="col-7 align-self-center" id="breadcrumb">
                    <div class="d-flex align-items-center justify-content-end">

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a  href="{{ route('admin.ringkasan.penyata') }}"
                    style="color:black; border-radius:unset; font-size:14.4px;"
                    class="btn btn-work tablinks" >Ringkasan Penyata</a>

                <a href="{{ route('admin.ringkasan.bahagian1') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks">Bahagian 1</a>

                <a href="{{ route('admin.ringkasan.bahagian2') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks">Bahagian 2</a>

                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem; background-color: lightgray"
                    class="btn btn-work tablinks" >Bahagian 3</a>

                <a href="{{ route('admin.ringkasan.jualan.bio') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" >Maklumat Jualan Biodiesel</a>

            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" style="margin-right:2%; margin-left:2%">

                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Produk Biodiesel dan Glycerine</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:-1%">Bahagian 3</h5>
                        </div>


                        <div class="card-body">
                            <hr>
                            <div class="mb-5 col-8" style="text-align: left">
                                <i>Arahan: Sila pastikan anda melengkapkan semua maklumat di kawasan yang bertanda '</i><b style="color: red">
                                    *</b><i>'</i>
                            </div>
                            <form action="{{ route('admin.ringkasan.bahagian3.process') }}" method="get">
                            @csrf
                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto ">

                                            <div class="form-group">
                                                <label class="required">Tahun</label>
                                                <select class="form-control" name="tahun"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')" required>
                                                    <option  selected hidden disabled value=''>Sila Pilih Tahun</option>
                                                    @for ($i = 2011; $i <= date('Y'); $i++)
                                                        <option>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Bulan</label>
                                                <select class="form-control" name="bulan"  id="bulan" onchange="showTable()">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                    <option value="between">Between</option>
                                                </select>

                                            </div>
                                            <div id="equal_container" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label>Pada</label>
                                                            <select class="form-control" name="start" >
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                <option value="1">Januari</option>
                                                                <option value="2">Februari</option>
                                                                <option value="3">Mac</option>
                                                                <option value="4">April</option>
                                                                <option value="5">Mei</option>
                                                                <option value="6">Jun</option>
                                                                <option value="7">Julai</option>
                                                                <option value="8">Ogos</option>
                                                                <option value="9">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Disember</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="between_container" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label>Dari</label>
                                                            <select class="form-control" name="start_month">
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                <option value="1">Januari</option>
                                                                <option value="2">Februari</option>
                                                                <option value="3">Mac</option>
                                                                <option value="4">April</option>
                                                                <option value="5">Mei</option>
                                                                <option value="6">Jun</option>
                                                                <option value="7">Julai</option>
                                                                <option value="8">Ogos</option>
                                                                <option value="9">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Disember</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label>Ke</label>
                                                            <select class="form-control" name="end_month">
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                <option value="1">Januari</option>
                                                                <option value="2">Februari</option>
                                                                <option value="3">Mac</option>
                                                                <option value="4">April</option>
                                                                <option value="5">Mei</option>
                                                                <option value="6">Jun</option>
                                                                <option value="7">Julai</option>
                                                                <option value="8">Ogos</option>
                                                                <option value="9">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Disember</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="lain_container" style="display:none">
                                            </div>
                                            <div class="form-group">
                                                <label>Negeri</label>
                                                <select class="form-control" id="negeri_id" name="e_negeri"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')"
                                                onchange="ajax_daerah(this)" >
                                                    <option selected  value="">Sila Pilih Negeri</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}" {{(old('e_negeri', $negeri_req) == $data->kod_negeri ? 'selected' : '')}}>
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Daerah</label>
                                                <select class="form-control" id="daerah_id" name='e_daerah'
                                                    placeholder="Daerah"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')">
                                                    <option selected hidden disabled value="">
                                                        Sila Pilih Negeri Terlebih Dahulu
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group">
                                                <label>No. Pelesen</label>
                                                <select class="form-control select2" name="e_nl" style="width: 10%">
                                                    <option value=""  >Sila Pilih Jenis Data</option>
                                                        {{-- <option selected hidden>{{ $result[0]->ebio_nl  }} - {{  $result[0]->e_np }}</option> --}}
                                                        @foreach ($users2 as $data)
                                                        @if ($data->pelesen)
                                                            @foreach ($data->pelesen as $pelesen)
                                                            <option value="{{ $data->e_nl }}">
                                                                {{ $data->e_nl }} - {{ $pelesen->e_np }}
                                                            </option>
                                                            @endforeach

                                                            @endif

                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kumpulan Produk</label>
                                                <select class="form-control" id="kumpproduk" name="kumpproduk"  onchange="ajax_produk(this);" >
                                                    <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                    @foreach ($kumpproduk as $data)
                                                        <option value="{{ $data->kumpulan }}"  {{(old('kumpproduk', $kump_prod) == $data->kumpulan ? 'selected' : '')}} >
                                                            {{ $data->kumpulan }} - {{ $data->nama_kumpulan }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kod Produk</label>
                                                <select class="form-control select2" id="kod_produk" name="kod_produk" oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')" style="width: 10%">
                                                        <option selected value="">Sila Pilih Kumpulan Terlebih Dahulu
                                                        </option>
                                                        {{-- @foreach ($produk as $data)
                                                            <option value="{{ $data->nama_produk }}">
                                                                {{ $data->nama_produk }} - {{ $data->kod_produk }}  - {{ $data->namapanjang_produk }}
                                                            </option>
                                                        @endforeach --}}

                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Data</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan" required>
                                                        <option selected hidden disabled value=''>Sila Pilih Jenis Data</option>
                                                        <option value="ebio_c4" {{ ($laporan == 'ebio_c4') ? 'selected' : '' }}>Stok Awal Di Premis</option>
                                                        <option value="ebio_c5" {{ ($laporan == 'ebio_c5') ? 'selected' : '' }}>Belian / Terimaan</option>
                                                        <option value="ebio_c6" {{ ($laporan == 'ebio_c6') ? 'selected' : '' }}>Pengeluaran</option>
                                                        <option value="ebio_c7" {{ ($laporan == 'ebio_c7') ? 'selected' : '' }}>Digunakan Untuk Proses Selanjutnya</option>
                                                        <option value="ebio_c8" {{ ($laporan == 'ebio_c8') ? 'selected' : '' }}>Jualan / Edaran Tempatan</option>
                                                        <option value="ebio_c9" {{ ($laporan == 'ebio_c9') ? 'selected' : '' }}>Eksport</option>
                                                        <option value="ebio_c10" {{ ($laporan == 'ebio_c10') ? 'selected' : '' }}>Stok Akhir Dilapor</option>
                                                    </select>
                                                </fieldset>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4" id="scroll-section" >
                                    <button type="submit" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        data-target="#next">Carian</button>
                                </div>
                            </form>
                            <section class="section"><hr>
                                <div class="card"><br>
                                    <h3 style="color: rgb(30, 28, 28); text-align:center">Senarai Ringkasan Bahagian 3</h3>
                                    <div class="text-center">
                                        <h4 style="color: black; text-align:center; font-weight:500">
                                            @if ($laporan == 'ebio_c4')
                                            Stok Awal Di Premis
                                            @elseif($laporan == 'ebio_c5')
                                            Belian / Terimaan
                                            @elseif($laporan == 'ebio_c6')
                                            Pengeluaran
                                            @elseif($laporan == 'ebio_c7')
                                            Digunakan Untuk Proses Selanjutnya
                                            @elseif($laporan == 'ebio_c8')
                                            Jualan / Edaran Tempatan
                                            @elseif($laporan == 'ebio_c9')
                                            Eksport
                                            @elseif($laporan == 'ebio_c10')
                                            Stok Akhir Dilapor
                                            @endif
                                        </h4>
                                        <h4 style="color: rgb(30, 28, 28); text-align:center">Tahun:  {{ $tahun }} </h4>
                                    </div>
                                    @if ($laporan == 'ebio_c4' )
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>
                                        <div class="table-responsive"  id="printableArea">
                                            <div class="noScreen text-center">
                                                <h4 style="color: black; text-align:center; font-weight:500">Stok Awal Di Premis</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>


                                            <table id="example4" class="table table-hover table-bordered" style="font-size:13px; margin-top:10%">
                                            <thead>
                                                <tr style="background-color: #d3d3d34d">

                                                    <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                        rowspan="2">No. Lesen</th>
                                                    <th scope="col" style="vertical-align: middle; text-align:center; width:30%"
                                                        rowspan="2">Nama Pemegang Lesen</th>
                                                    <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                        rowspan="2">Negeri</th>
                                                    <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                        rowspan="2">Daerah</th>
                                                    <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                        rowspan="2">Kod Produk</th>
                                                    <th scope="col" style="vertical-align: middle; text-align:center; width:40%"
                                                        rowspan="2">Nama Produk</th>
                                                        @if ($bulan == 'equal')

                                                            <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                colspan="1">Kuantiti (Tan Metrik) </th>

                                                        @elseif ($bulan == 'between')
                                                            @php
                                                                $i = $end_month - $start_month + 2;
                                                            @endphp
                                                            {{-- @for ($i = ) --}}
                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan={{ $i }}>Kuantiti (Tan Metrik) </th>
                                                            {{-- @endfor --}}

                                                        @else

                                                            <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                colspan="13">Kuantiti (Tan Metrik) </th>

                                                        @endif
                                                </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Dis
                                                            </th>

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                            >Jumlah</th>

                                                        @elseif ($bulan == 'equal')
                                                            {{-- @for ($i = $equal_month;) --}}
                                                                @if ($equal_month == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($equal_month == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($equal_month == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($equal_month == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($equal_month == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($equal_month == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($equal_month == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($equal_month == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($equal_month == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($equal_month == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($equal_month == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($equal_month == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $total_bulan5[$i] = 0;

                                                                @endphp
                                                                @if ($i == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($i == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($i == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($i == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($i == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($i == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($i == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($i == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($i == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($i == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($i == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($i == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            @endfor

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                                >Jumlah</th>


                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($result)

                                                        @if ($bulan == null)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_c4[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as  $key => $data)
                                                                <tr>
                                                                    @if($data->ebio_nobatch)
                                                                    @foreach ($ebio_c4_bhg3[$data->e_nl] as $kodProduk => $test)
                                                                        <tr>
                                                                            <td class="text-centter">{{ $data->e_nl }}</td>
                                                                            <td class="text-left">{{ $data->e_np }}</td>

                                                                            @if ($data->e_negeri == '01')
                                                                                <td>JOHOR</td>
                                                                            @elseif ($data->e_negeri == '02')
                                                                                <td>KEDAH</td>
                                                                            @elseif ($data->e_negeri == '03')
                                                                                <td>KELANTAN</td>
                                                                            @elseif ($data->e_negeri == '04')
                                                                                <td>MELAKA</td>
                                                                            @elseif ($data->e_negeri == '05')
                                                                                <td>NEGERI SEMBILAN</td>
                                                                            @elseif ($data->e_negeri == '06')
                                                                                <td>PAHANG</td>
                                                                            @elseif ($data->e_negeri == '07')
                                                                                <td>PERAK</td>
                                                                            @elseif ($data->e_negeri == '08')
                                                                                <td>PERLIS</td>
                                                                            @elseif ($data->e_negeri == '09')
                                                                                <td>PULAU PINANG</td>
                                                                            @elseif ($data->e_negeri == '10')
                                                                                <td>SELANGOR</td>
                                                                            @elseif ($data->e_negeri == '11')
                                                                                <td>TERENGGANU</td>
                                                                            @elseif ($data->e_negeri == '12')
                                                                                <td>WILAYAH PERSEKUTUAN</td>
                                                                            @elseif ($data->e_negeri == '13')
                                                                                <td>SABAH</td>
                                                                            @elseif ($data->e_negeri == '14')
                                                                                <td>SARAWAK</td>
                                                                            @else
                                                                                <td>-</td>
                                                                            @endif
                                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>

                                                                            <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>
                                                                            @php
                                                                                $jumlah_c4 = 0;
                                                                                $total_all_bulan_c4 = 0;
                                                                            @endphp
                                                                            <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td sstyle="text-align: center; mso-number-format:'#,##0.00'" width= "100">
                                                                                    {{ number_format($ebio_c4_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                @php
                                                                                    $jumlah_c4 += $ebio_c4_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    $total_col_bulan_c4[$i] += $ebio_c4_bhg3[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                @endphp
                                                                            @endfor

                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                <b>{{ number_format($jumlah_c4 ?? 0,2)}}</b>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    @endif

                                                                </tr>

                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                    <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                        <b>{{ number_format($total_col_bulan_c4[$i] ?? 0,2) }}</b>
                                                                    </td>
                                                                    @php
                                                                        $total_all_bulan_c4 += $total_col_bulan_c4[$i] ?? 0 ;
                                                                    @endphp
                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_bulan_c4 ?? 0,2) }}</b></td>

                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_bulan_c4 = 0;
                                                            @endphp
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c4_bhg3[$data->e_nl] as $kodProduk => $ebio_c4_bhg3_data)
                                                                    <tr>
                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'" width= "100">
                                                                            {{ number_format($ebio_c4_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0,2) }}
                                                                        </td>
                                                                        @php
                                                                            $total_bulan_c4 += $ebio_c4_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_bulan_c4 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else

                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_bulan5[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c4_bhg3[$data->e_nl] as $kodProduk => $ebio_c4_bhg3_data)
                                                                    <tr>

                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                        @php
                                                                            $jumlah5 = 0;
                                                                            $total_between_bulan_c4 = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_c4 != 0) --}}

                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'"  width= "100">
                                                                                    {{ number_format($ebio_c4_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah5 += $ebio_c4_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan5[$i] += $ebio_c4_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah5 ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                    <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                        <b>{{ number_format($jumlah_bulan5[$i] ?? 0,2) }}</b>
                                                                    </td>
                                                                    @php
                                                                        $total_between_bulan_c4 += $jumlah_bulan5[$i] ?? 0 ;
                                                                    @endphp
                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_bulan_c4 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>

                                        </div>
                                    @elseif ($laporan == 'ebio_c5' )
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>
                                        <div class="table-responsive"  id="printableArea">
                                            <div class="noScreen text-center">
                                                <h4 style="color: black; text-align:center; font-weight:500">Belian / Penerimaan</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>


                                            <table id="example4" class="table table-hover table-bordered" style="font-size:13px; margin-top:10%">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">

                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:30%"
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                            rowspan="2">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:40%"
                                                            rowspan="2">Nama Produk</th>
                                                            @if ($bulan == 'equal')

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="1">Kuantiti (Tan Metrik) </th>

                                                            @elseif ($bulan == 'between')
                                                                @php
                                                                    $i = $end_month - $start_month + 2;
                                                                @endphp
                                                                {{-- @for ($i = ) --}}
                                                                    <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                        colspan={{ $i }}>Kuantiti (Tan Metrik) </th>
                                                                {{-- @endfor --}}

                                                            @else

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="13">Kuantiti (Tan Metrik) </th>

                                                            @endif
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Dis
                                                            </th>

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                            >Jumlah</th>

                                                        @elseif ($bulan == 'equal')
                                                            {{-- @for ($i = $equal_month;) --}}
                                                                @if ($equal_month == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($equal_month == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($equal_month == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($equal_month == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($equal_month == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($equal_month == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($equal_month == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($equal_month == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($equal_month == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($equal_month == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($equal_month == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($equal_month == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $total_bulan5[$i] = 0;

                                                                @endphp
                                                                @if ($i == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($i == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($i == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($i == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($i == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($i == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($i == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($i == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($i == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($i == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($i == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($i == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            @endfor

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                                >Jumlah</th>


                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($result)

                                                        @if ($bulan == null)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_c5[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                                <tr>
                                                                    @if($data->ebio_nobatch)
                                                                    @foreach ($ebio_c5_bhg3[$data->e_nl] as $kodProduk => $test)
                                                                        <tr>
                                                                            <td class="text-centter">{{ $data->e_nl }}</td>
                                                                            <td class="text-left">{{ $data->e_np }}</td>

                                                                            @if ($data->e_negeri == '01')
                                                                                <td>JOHOR</td>
                                                                            @elseif ($data->e_negeri == '02')
                                                                                <td>KEDAH</td>
                                                                            @elseif ($data->e_negeri == '03')
                                                                                <td>KELANTAN</td>
                                                                            @elseif ($data->e_negeri == '04')
                                                                                <td>MELAKA</td>
                                                                            @elseif ($data->e_negeri == '05')
                                                                                <td>NEGERI SEMBILAN</td>
                                                                            @elseif ($data->e_negeri == '06')
                                                                                <td>PAHANG</td>
                                                                            @elseif ($data->e_negeri == '07')
                                                                                <td>PERAK</td>
                                                                            @elseif ($data->e_negeri == '08')
                                                                                <td>PERLIS</td>
                                                                            @elseif ($data->e_negeri == '09')
                                                                                <td>PULAU PINANG</td>
                                                                            @elseif ($data->e_negeri == '10')
                                                                                <td>SELANGOR</td>
                                                                            @elseif ($data->e_negeri == '11')
                                                                                <td>TERENGGANU</td>
                                                                            @elseif ($data->e_negeri == '12')
                                                                                <td>WILAYAH PERSEKUTUAN</td>
                                                                            @elseif ($data->e_negeri == '13')
                                                                                <td>SABAH</td>
                                                                            @elseif ($data->e_negeri == '14')
                                                                                <td>SARAWAK</td>
                                                                            @else
                                                                                <td>-</td>
                                                                            @endif
                                                                        {{-- {{ dd($data_daerah[$key]) }} --}}

                                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                            <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>
                                                                            @php
                                                                                $jumlah_c5 = 0;
                                                                                $total_all_bulan_c5 = 0;
                                                                            @endphp
                                                                            <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c5_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                @php
                                                                                    $jumlah_c5 += $ebio_c5_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    $total_col_bulan_c5[$i] += $ebio_c5_bhg3[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                @endphp
                                                                            @endfor

                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                <b>{{ number_format($jumlah_c5 ?? 0,2)}}</b>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    @endif

                                                                </tr>

                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_col_bulan_c5[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_all_bulan_c5 += $total_col_bulan_c5[$i] ?? 0 ;
                                                                @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_bulan_c5 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_bulan_c5 = 0;
                                                            @endphp
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c5_bhg3[$data->e_nl] as $kodProduk => $ebio_c5_bhg3_data)
                                                                    <tr>
                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                            {{ number_format($ebio_c5_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0,2) }}
                                                                        </td>
                                                                        @php
                                                                            $total_bulan_c5 += $ebio_c5_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_bulan_c5 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else

                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_bulan6[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c5_bhg3[$data->e_nl] as $kodProduk => $ebio_c5_bhg3_data)
                                                                    <tr>

                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                        @php
                                                                            $jumlah6 = 0;
                                                                            $total_between_bulan_c5 = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_c5 != 0) --}}

                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c5_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah6 += $ebio_c5_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan6[$i] += $ebio_c5_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah6 ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                    <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                        <b>{{ number_format($jumlah_bulan6[$i] ?? 0,2) }}</b>
                                                                    </td>
                                                                    @php
                                                                        $total_between_bulan_c5 += $jumlah_bulan6[$i] ?? 0 ;
                                                                    @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_bulan_c5 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>

                                        </div>

                                    @elseif ($laporan == 'ebio_c6' )
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>

                                        <div class="table-responsive"  id="printableArea">
                                            <div class="noScreen text-center">
                                                <h4 style="color: black; text-align:center; font-weight:500">Pengeluaran</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>

                                            <table id="example4" class="table table-hover table-bordered" style="font-size:13px; margin-top:10%">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">

                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:30%"
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                            rowspan="2">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:40%"
                                                            rowspan="2">Nama Produk</th>
                                                            @if ($bulan == 'equal')

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="1">Kuantiti (Tan Metrik) </th>

                                                            @elseif ($bulan == 'between')
                                                                @php
                                                                    $i = $end_month - $start_month + 2;
                                                                @endphp
                                                                {{-- @for ($i = ) --}}
                                                                    <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                        colspan={{ $i }}>Kuantiti (Tan Metrik) </th>
                                                                {{-- @endfor --}}

                                                            @else

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="13">Kuantiti (Tan Metrik) </th>

                                                            @endif
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Dis
                                                            </th>

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                            >Jumlah</th>

                                                        @elseif ($bulan == 'equal')
                                                            {{-- @for ($i = $equal_month;) --}}
                                                                @if ($equal_month == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($equal_month == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($equal_month == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($equal_month == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($equal_month == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($equal_month == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($equal_month == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($equal_month == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($equal_month == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($equal_month == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($equal_month == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($equal_month == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $total_bulan7[$i] = 0;

                                                                @endphp
                                                                @if ($i == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($i == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($i == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($i == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($i == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($i == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($i == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($i == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($i == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($i == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($i == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($i == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            @endfor

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                                >Jumlah</th>


                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($result)

                                                        @if ($bulan == null)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_c6[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                                <tr>
                                                                    @if($data->ebio_nobatch)
                                                                    @foreach ($ebio_c6_bhg3[$data->e_nl] as $kodProduk => $test)
                                                                        <tr>
                                                                            <td class="text-centter">{{ $data->e_nl }}</td>
                                                                            <td class="text-left">{{ $data->e_np }}</td>

                                                                            @if ($data->e_negeri == '01')
                                                                                <td>JOHOR</td>
                                                                            @elseif ($data->e_negeri == '02')
                                                                                <td>KEDAH</td>
                                                                            @elseif ($data->e_negeri == '03')
                                                                                <td>KELANTAN</td>
                                                                            @elseif ($data->e_negeri == '04')
                                                                                <td>MELAKA</td>
                                                                            @elseif ($data->e_negeri == '05')
                                                                                <td>NEGERI SEMBILAN</td>
                                                                            @elseif ($data->e_negeri == '06')
                                                                                <td>PAHANG</td>
                                                                            @elseif ($data->e_negeri == '07')
                                                                                <td>PERAK</td>
                                                                            @elseif ($data->e_negeri == '08')
                                                                                <td>PERLIS</td>
                                                                            @elseif ($data->e_negeri == '09')
                                                                                <td>PULAU PINANG</td>
                                                                            @elseif ($data->e_negeri == '10')
                                                                                <td>SELANGOR</td>
                                                                            @elseif ($data->e_negeri == '11')
                                                                                <td>TERENGGANU</td>
                                                                            @elseif ($data->e_negeri == '12')
                                                                                <td>WILAYAH PERSEKUTUAN</td>
                                                                            @elseif ($data->e_negeri == '13')
                                                                                <td>SABAH</td>
                                                                            @elseif ($data->e_negeri == '14')
                                                                                <td>SARAWAK</td>
                                                                            @else
                                                                                <td>-</td>
                                                                            @endif
                                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                            <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>
                                                                            @php
                                                                                $jumlah_c6 = 0;
                                                                                    $total_all_bulan_c6 = 0;
                                                                            @endphp
                                                                            <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c6_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                @php
                                                                                    $jumlah_c6 += $ebio_c6_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    $total_col_bulan_c6[$i] += $ebio_c6_bhg3[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                @endphp
                                                                            @endfor

                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                <b>{{ number_format($jumlah_c6 ?? 0,2)}}</b>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    @endif

                                                                </tr>

                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_col_bulan_c6[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_all_bulan_c6 += $total_col_bulan_c6[$i] ?? 0 ;
                                                                @endphp
                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_bulan_c6 ?? 0,2) }}</b>
                                                                </td>
                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_bulan_c6 = 0;
                                                            @endphp
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c6_bhg3[$data->e_nl] as $kodProduk => $ebio_c6_bhg3_data)
                                                                    <tr>
                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                            {{ number_format($ebio_c6_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0,2) }}
                                                                        </td>
                                                                        @php
                                                                            $total_bulan_c6 += $ebio_c6_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_bulan_c6 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else

                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_bulan7[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c6_bhg3[$data->e_nl] as $kodProduk => $ebio_c6_bhg3_data)
                                                                    <tr>

                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                        @php
                                                                            $jumlah7 = 0;
                                                                            $total_between_bulan_c6 = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_c6 != 0) --}}

                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c6_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah7 += $ebio_c6_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan7[$i] += $ebio_c6_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah7 ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6">Jumlah</th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                    <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                        <b>{{ number_format($jumlah_bulan7[$i] ?? 0,2) }}</b>
                                                                    </td>
                                                                    @php
                                                                        $total_between_bulan_c6 += $jumlah_bulan7[$i] ?? 0 ;
                                                                    @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_bulan_c6 ?? 0,2) }}</b>
                                                                </td>



                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>

                                        </div>

                                        <!-- ebio_c8 =  DigunakanUntukProsesSelanjutnya -->
                                    @elseif ($laporan == 'ebio_c7' )
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>
                                        <div class="table-responsive"  id="printableArea">
                                            <div class="noScreen text-center">
                                                <h4 style="color: black; text-align:center; font-weight:500">Digunakan Untuk Proses Selanjutnya</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>


                                            <table id="example4" class="table table-hover table-bordered" style="font-size:13px; margin-top:10%">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">

                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:30%"
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                            rowspan="2">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:40%"
                                                            rowspan="2">Nama Produk</th>
                                                            @if ($bulan == 'equal')

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="1">Kuantiti (Tan Metrik) </th>

                                                            @elseif ($bulan == 'between')
                                                                @php
                                                                    $i = $end_month - $start_month + 2;
                                                                @endphp
                                                                {{-- @for ($i = ) --}}
                                                                    <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                        colspan={{ $i }}>Kuantiti (Tan Metrik) </th>
                                                                {{-- @endfor --}}

                                                            @else

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="13">Kuantiti (Tan Metrik) </th>

                                                            @endif
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Dis
                                                            </th>

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                            >Jumlah</th>

                                                        @elseif ($bulan == 'equal')
                                                            {{-- @for ($i = $equal_month;) --}}
                                                                @if ($equal_month == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($equal_month == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($equal_month == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($equal_month == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($equal_month == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($equal_month == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($equal_month == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($equal_month == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($equal_month == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($equal_month == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($equal_month == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($equal_month == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $total_bulan8[$i] = 0;

                                                                @endphp
                                                                @if ($i == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($i == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($i == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($i == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($i == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($i == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($i == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($i == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($i == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($i == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($i == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($i == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            @endfor

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                                >Jumlah</th>


                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($result)

                                                        @if ($bulan == null)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_c7[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                                <tr>
                                                                    @if($data->ebio_nobatch)
                                                                    @foreach ($ebio_c7_bhg3[$data->e_nl] as $kodProduk => $test)
                                                                        <tr>
                                                                            <td class="text-centter">{{ $data->e_nl }}</td>
                                                                            <td class="text-left">{{ $data->e_np }}</td>

                                                                            @if ($data->e_negeri == '01')
                                                                                <td>JOHOR</td>
                                                                            @elseif ($data->e_negeri == '02')
                                                                                <td>KEDAH</td>
                                                                            @elseif ($data->e_negeri == '03')
                                                                                <td>KELANTAN</td>
                                                                            @elseif ($data->e_negeri == '04')
                                                                                <td>MELAKA</td>
                                                                            @elseif ($data->e_negeri == '05')
                                                                                <td>NEGERI SEMBILAN</td>
                                                                            @elseif ($data->e_negeri == '06')
                                                                                <td>PAHANG</td>
                                                                            @elseif ($data->e_negeri == '07')
                                                                                <td>PERAK</td>
                                                                            @elseif ($data->e_negeri == '08')
                                                                                <td>PERLIS</td>
                                                                            @elseif ($data->e_negeri == '09')
                                                                                <td>PULAU PINANG</td>
                                                                            @elseif ($data->e_negeri == '10')
                                                                                <td>SELANGOR</td>
                                                                            @elseif ($data->e_negeri == '11')
                                                                                <td>TERENGGANU</td>
                                                                            @elseif ($data->e_negeri == '12')
                                                                                <td>WILAYAH PERSEKUTUAN</td>
                                                                            @elseif ($data->e_negeri == '13')
                                                                                <td>SABAH</td>
                                                                            @elseif ($data->e_negeri == '14')
                                                                                <td>SARAWAK</td>
                                                                            @else
                                                                                <td>-</td>
                                                                            @endif
                                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                            <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>
                                                                            @php
                                                                                $jumlah_c7 = 0;
                                                                                $total_all_bulan_c7 = 0;
                                                                            @endphp
                                                                            <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c7_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                @php
                                                                                    $jumlah_c7 += $ebio_c7_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    $total_col_bulan_c7[$i] += $ebio_c7_bhg3[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                @endphp
                                                                            @endfor

                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                <b>{{ number_format($jumlah_c7 ?? 0,2)}}</b>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    @endif

                                                                </tr>

                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_col_bulan_c7[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_all_bulan_c7 += $total_col_bulan_c7[$i] ?? 0 ;
                                                                @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_bulan_c7 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_bulan_c7 = 0;
                                                            @endphp
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c7_bhg3[$data->e_nl] as $kodProduk => $ebio_c7_bhg3_data)
                                                                    <tr>
                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                            {{ number_format($ebio_c7_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0,2) }}
                                                                        </td>
                                                                        @php
                                                                            $total_bulan_c7 += $ebio_c7_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_bulan_c7 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else

                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_bulan8[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c7_bhg3[$data->e_nl] as $kodProduk => $ebio_c7_bhg3_data)
                                                                    <tr>

                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                        @php
                                                                            $jumlah8 = 0;
                                                                            $total_between_bulan_c7 = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_c7 != 0) --}}

                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c7_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah8 += $ebio_c7_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan8[$i] += $ebio_c7_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah8 ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($jumlah_bulan8[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_between_bulan_c7 += $jumlah_bulan8[$i] ?? 0 ;
                                                                @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_bulan_c7 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>

                                        </div>

                                    @elseif ($laporan == 'ebio_c8' )
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>
                                        <div class="table-responsive"  id="printableArea">
                                            <div class="noScreen text-center">
                                                <h4 style="color: black; text-align:center; font-weight:500">Jualan / Edaran Tempatan</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>


                                            <table id="example4" class="table table-hover table-bordered" style="font-size:13px; margin-top:10%">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">

                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:30%"
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                            rowspan="2">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:40%"
                                                            rowspan="2">Nama Produk</th>
                                                            @if ($bulan == 'equal')

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="1">Kuantiti (Tan Metrik) </th>

                                                            @elseif ($bulan == 'between')
                                                                @php
                                                                    $i = $end_month - $start_month + 2;
                                                                @endphp
                                                                {{-- @for ($i = ) --}}
                                                                    <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                        colspan={{ $i }}>Kuantiti (Tan Metrik) </th>
                                                                {{-- @endfor --}}

                                                            @else

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="13">Kuantiti (Tan Metrik) </th>

                                                            @endif
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Dis
                                                            </th>

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                            >Jumlah</th>

                                                        @elseif ($bulan == 'equal')
                                                            {{-- @for ($i = $equal_month;) --}}
                                                                @if ($equal_month == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($equal_month == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($equal_month == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($equal_month == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($equal_month == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($equal_month == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($equal_month == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($equal_month == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($equal_month == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($equal_month == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($equal_month == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($equal_month == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $total_bulan8[$i] = 0;

                                                                @endphp
                                                                @if ($i == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($i == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($i == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($i == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($i == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($i == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($i == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($i == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($i == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($i == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($i == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($i == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            @endfor

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                                >Jumlah</th>


                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($result)

                                                        @if ($bulan == null)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_c8[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                                <tr>
                                                                    @if($data->ebio_nobatch)
                                                                    @foreach ($ebio_c8_bhg3[$data->e_nl] as $kodProduk => $test)
                                                                        <tr>
                                                                            <td class="text-centter">{{ $data->e_nl }}</td>
                                                                            <td class="text-left">{{ $data->e_np }}</td>

                                                                            @if ($data->e_negeri == '01')
                                                                                <td>JOHOR</td>
                                                                            @elseif ($data->e_negeri == '02')
                                                                                <td>KEDAH</td>
                                                                            @elseif ($data->e_negeri == '03')
                                                                                <td>KELANTAN</td>
                                                                            @elseif ($data->e_negeri == '04')
                                                                                <td>MELAKA</td>
                                                                            @elseif ($data->e_negeri == '05')
                                                                                <td>NEGERI SEMBILAN</td>
                                                                            @elseif ($data->e_negeri == '06')
                                                                                <td>PAHANG</td>
                                                                            @elseif ($data->e_negeri == '07')
                                                                                <td>PERAK</td>
                                                                            @elseif ($data->e_negeri == '08')
                                                                                <td>PERLIS</td>
                                                                            @elseif ($data->e_negeri == '09')
                                                                                <td>PULAU PINANG</td>
                                                                            @elseif ($data->e_negeri == '10')
                                                                                <td>SELANGOR</td>
                                                                            @elseif ($data->e_negeri == '11')
                                                                                <td>TERENGGANU</td>
                                                                            @elseif ($data->e_negeri == '12')
                                                                                <td>WILAYAH PERSEKUTUAN</td>
                                                                            @elseif ($data->e_negeri == '13')
                                                                                <td>SABAH</td>
                                                                            @elseif ($data->e_negeri == '14')
                                                                                <td>SARAWAK</td>
                                                                            @else
                                                                                <td>-</td>
                                                                            @endif
                                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                            <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>
                                                                            @php
                                                                                $jumlah_c8 = 0;
                                                                                $total_all_bulan_c8 = 0;
                                                                            @endphp
                                                                            <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c8_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                @php
                                                                                    $jumlah_c8 += $ebio_c8_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    $total_col_bulan_c8[$i] += $ebio_c8_bhg3[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                @endphp
                                                                            @endfor

                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                <b>{{ number_format($jumlah_c8 ?? 0,2)}}</b>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    @endif

                                                                </tr>

                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                    <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                        <b>{{ number_format($total_col_bulan_c8[$i] ?? 0,2) }}</b>
                                                                    </td>
                                                                    @php
                                                                        $total_all_bulan_c8 += $total_col_bulan_c8[$i] ?? 0 ;
                                                                    @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_bulan_c8 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_bulan_c8 = 0;
                                                            @endphp
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c8_bhg3[$data->e_nl] as $kodProduk => $ebio_c8_bhg3_data)
                                                                    <tr>
                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                            {{ number_format($ebio_c8_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0,2) }}
                                                                        </td>
                                                                        @php
                                                                            $total_bulan_c8 += $ebio_c8_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_bulan_c8 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else

                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_bulan9[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c8_bhg3[$data->e_nl] as $kodProduk => $ebio_c8_bhg3_data)
                                                                    <tr>

                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                        @php
                                                                            $jumlah9 = 0;
                                                                            $total_between_bulan_c8 = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_c8 != 0) --}}

                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c8_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah9 += $ebio_c8_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan9[$i] += $ebio_c8_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah9 ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($jumlah_bulan9[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_between_bulan_c8 += $jumlah_bulan9[$i] ?? 0 ;
                                                                @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_bulan_c8 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>

                                        </div>

                                    @elseif ($laporan == 'ebio_c9' )
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>
                                        <div class="table-responsive"  id="printableArea">
                                            <div class="noScreen text-center">
                                                <h4 style="color: black; text-align:center; font-weight:500">Eksport</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>


                                            <table id="example4" class="table table-hover table-bordered" style="font-size:13px; margin-top:10%">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">

                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:30%"
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                            rowspan="2">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:40%"
                                                            rowspan="2">Nama Produk</th>
                                                            @if ($bulan == 'equal')

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="1">Kuantiti (Tan Metrik) </th>

                                                            @elseif ($bulan == 'between')
                                                                @php
                                                                    $i = $end_month - $start_month + 2;
                                                                @endphp
                                                                {{-- @for ($i = ) --}}
                                                                    <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                        colspan={{ $i }}>Kuantiti (Tan Metrik) </th>
                                                                {{-- @endfor --}}

                                                            @else

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="13">Kuantiti (Tan Metrik) </th>

                                                            @endif
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Dis
                                                            </th>

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                            >Jumlah</th>

                                                        @elseif ($bulan == 'equal')
                                                            {{-- @for ($i = $equal_month;) --}}
                                                                @if ($equal_month == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($equal_month == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($equal_month == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($equal_month == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($equal_month == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($equal_month == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($equal_month == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($equal_month == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($equal_month == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($equal_month == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($equal_month == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($equal_month == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $total_bulan8[$i] = 0;

                                                                @endphp
                                                                @if ($i == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($i == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($i == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($i == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($i == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($i == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($i == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($i == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($i == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($i == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($i == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($i == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            @endfor

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                                >Jumlah</th>


                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($result)

                                                        @if ($bulan == null)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_c9[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                                <tr>
                                                                    @if($data->ebio_nobatch)
                                                                    @foreach ($ebio_c9_bhg3[$data->e_nl] as $kodProduk => $test)
                                                                        <tr>
                                                                            <td class="text-centter">{{ $data->e_nl }}</td>
                                                                            <td class="text-left">{{ $data->e_np }}</td>

                                                                            @if ($data->e_negeri == '01')
                                                                                <td>JOHOR</td>
                                                                            @elseif ($data->e_negeri == '02')
                                                                                <td>KEDAH</td>
                                                                            @elseif ($data->e_negeri == '03')
                                                                                <td>KELANTAN</td>
                                                                            @elseif ($data->e_negeri == '04')
                                                                                <td>MELAKA</td>
                                                                            @elseif ($data->e_negeri == '05')
                                                                                <td>NEGERI SEMBILAN</td>
                                                                            @elseif ($data->e_negeri == '06')
                                                                                <td>PAHANG</td>
                                                                            @elseif ($data->e_negeri == '07')
                                                                                <td>PERAK</td>
                                                                            @elseif ($data->e_negeri == '08')
                                                                                <td>PERLIS</td>
                                                                            @elseif ($data->e_negeri == '09')
                                                                                <td>PULAU PINANG</td>
                                                                            @elseif ($data->e_negeri == '10')
                                                                                <td>SELANGOR</td>
                                                                            @elseif ($data->e_negeri == '11')
                                                                                <td>TERENGGANU</td>
                                                                            @elseif ($data->e_negeri == '12')
                                                                                <td>WILAYAH PERSEKUTUAN</td>
                                                                            @elseif ($data->e_negeri == '13')
                                                                                <td>SABAH</td>
                                                                            @elseif ($data->e_negeri == '14')
                                                                                <td>SARAWAK</td>
                                                                            @else
                                                                                <td>-</td>
                                                                            @endif
                                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                            <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>
                                                                            @php
                                                                                $jumlah_c9 = 0;
                                                                                $total_all_bulan_c9 = 0;
                                                                            @endphp
                                                                            <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c9_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                @php
                                                                                    $jumlah_c9 += $ebio_c9_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    $total_col_bulan_c9[$i] += $ebio_c9_bhg3[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                @endphp
                                                                            @endfor

                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                <b>{{ number_format($jumlah_c9 ?? 0,2)}}</b>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    @endif

                                                                </tr>

                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                    <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                        <b>{{ number_format($total_col_bulan_c9[$i] ?? 0,2) }}</b>
                                                                    </td>
                                                                    @php
                                                                        $total_all_bulan_c9 += $total_col_bulan_c9[$i] ?? 0 ;
                                                                    @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_bulan_c9 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_bulan_c9 = 0;
                                                            @endphp
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c9_bhg3[$data->e_nl] as $kodProduk => $ebio_c9_bhg3_data)
                                                                    <tr>
                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'" width = "100"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>
                                                                        <td style="text-align: center"> {{ number_format($ebio_c9_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0,2) }}</td>
                                                                        @php
                                                                            $total_bulan_c9 += $ebio_c9_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_bulan_c9 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else

                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_bulan10[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c9_bhg3[$data->e_nl] as $kodProduk => $ebio_c9_bhg3_data)
                                                                    <tr>

                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                        @php
                                                                            $jumlah10 = 0;
                                                                            $total_between_bulan_c9 = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_c9 != 0) --}}

                                                                                <td sstyle="text-align: center; mso-number-format:'#,##0.00'"  width = "100">
                                                                                    {{ number_format($ebio_c9_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah10 += $ebio_c9_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan10[$i] += $ebio_c9_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah10 ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($jumlah_bulan10[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                    @php
                                                                        $total_between_bulan_c9 += $jumlah_bulan10[$i] ?? 0 ;
                                                                    @endphp

                                                                    @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_bulan_c9 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>

                                        </div>

                                    @elseif ($laporan == 'ebio_c10' )
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>
                                        <div class="table-responsive"  id="printableArea">
                                            <div class="noScreen text-center">
                                                <h4 style="color: black; text-align:center; font-weight:500">Stok Akhir Di Premis</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>


                                            <table id="example4" class="table table-hover table-bordered" style="font-size:13px; margin-top:10%">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">

                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:30%"
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                            rowspan="2">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:40%"
                                                            rowspan="2">Nama Produk</th>
                                                            @if ($bulan == 'equal')

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="1">Kuantiti (Tan Metrik) </th>

                                                            @elseif ($bulan == 'between')
                                                                @php
                                                                    $i = $end_month - $start_month + 2;
                                                                @endphp
                                                                {{-- @for ($i = ) --}}
                                                                    <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                        colspan={{ $i }}>Kuantiti (Tan Metrik) </th>
                                                                {{-- @endfor --}}

                                                            @else

                                                                <th scope="col" style="vertical-align: middle; text-align:center; "
                                                                    colspan="13">Kuantiti (Tan Metrik) </th>

                                                            @endif
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:30px">Dis
                                                            </th>

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                            >Jumlah</th>

                                                        @elseif ($bulan == 'equal')
                                                            {{-- @for ($i = $equal_month;) --}}
                                                                @if ($equal_month == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($equal_month == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($equal_month == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($equal_month == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($equal_month == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($equal_month == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($equal_month == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($equal_month == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($equal_month == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($equal_month == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($equal_month == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($equal_month == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $total_bulan8[$i] = 0;

                                                                @endphp
                                                                @if ($i == '01')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jan
                                                                    </th>
                                                                @elseif($i == '02')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Feb
                                                                    </th>
                                                                @elseif($i == '03')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mac
                                                                    </th>
                                                                @elseif($i == '04')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Apr
                                                                    </th>
                                                                @elseif($i == '05')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Mei
                                                                    </th>
                                                                @elseif($i == '06')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jun
                                                                    </th>
                                                                @elseif($i == '07')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Jul
                                                                    </th>
                                                                @elseif($i == '08')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Ogos
                                                                    </th>
                                                                @elseif($i == '09')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Sept
                                                                    </th>
                                                                @elseif($i == '10')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Okt
                                                                    </th>
                                                                @elseif($i == '11')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Nov
                                                                    </th>
                                                                @elseif($i == '12')
                                                                    <th scope="col"
                                                                        style="vertical-align: middle; text-align:center">Dis
                                                                    </th>
                                                                @endif
                                                            @endfor

                                                            <th scope="col" rowspan="1" style="vertical-align: middle; text-align:center; "
                                                                >Jumlah</th>


                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($result)

                                                        @if ($bulan == null)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_c10[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                                <tr>
                                                                    @if($data->ebio_nobatch)
                                                                    @foreach ($ebio_c10_bhg3[$data->e_nl] as $kodProduk => $test)
                                                                        <tr>
                                                                            <td class="text-centter">{{ $data->e_nl }}</td>
                                                                            <td class="text-left">{{ $data->e_np }}</td>

                                                                            @if ($data->e_negeri == '01')
                                                                                <td>JOHOR</td>
                                                                            @elseif ($data->e_negeri == '02')
                                                                                <td>KEDAH</td>
                                                                            @elseif ($data->e_negeri == '03')
                                                                                <td>KELANTAN</td>
                                                                            @elseif ($data->e_negeri == '04')
                                                                                <td>MELAKA</td>
                                                                            @elseif ($data->e_negeri == '05')
                                                                                <td>NEGERI SEMBILAN</td>
                                                                            @elseif ($data->e_negeri == '06')
                                                                                <td>PAHANG</td>
                                                                            @elseif ($data->e_negeri == '07')
                                                                                <td>PERAK</td>
                                                                            @elseif ($data->e_negeri == '08')
                                                                                <td>PERLIS</td>
                                                                            @elseif ($data->e_negeri == '09')
                                                                                <td>PULAU PINANG</td>
                                                                            @elseif ($data->e_negeri == '10')
                                                                                <td>SELANGOR</td>
                                                                            @elseif ($data->e_negeri == '11')
                                                                                <td>TERENGGANU</td>
                                                                            @elseif ($data->e_negeri == '12')
                                                                                <td>WILAYAH PERSEKUTUAN</td>
                                                                            @elseif ($data->e_negeri == '13')
                                                                                <td>SABAH</td>
                                                                            @elseif ($data->e_negeri == '14')
                                                                                <td>SARAWAK</td>
                                                                            @else
                                                                                <td>-</td>
                                                                            @endif
                                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                            <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>
                                                                            @php
                                                                                $jumlah_c10 = 0;
                                                                                $total_all_bulan_c10 = 0;
                                                                            @endphp
                                                                            <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                                    {{ number_format($ebio_c10_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                @php
                                                                                    $jumlah_c10 += $ebio_c10_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    $total_col_bulan_c10[$i] += $ebio_c10_bhg3[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                @endphp
                                                                            @endfor

                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                <b>{{ number_format($jumlah_c10 ?? 0,2)}}</b>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    @endif

                                                                </tr>

                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_col_bulan_c10[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_all_bulan_c10 += $total_col_bulan_c10[$i] ?? 0 ;
                                                                @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_bulan_c10 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_bulan_c10 = 0;
                                                            @endphp
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c10_bhg3[$data->e_nl] as $kodProduk => $ebio_c10_bhg3_data)
                                                                    <tr>
                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'" width = "100">
                                                                            {{ number_format($ebio_c10_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0,2) }}
                                                                        </td>
                                                                        @php
                                                                            $total_bulan_c10 += $ebio_c10_bhg3[$data->e_nl][$kodProduk][$equal_month] ?? 0;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_bulan_c10 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else

                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_bulan11[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                @if($data->ebio_nobatch)
                                                                @foreach ($ebio_c10_bhg3[$data->e_nl] as $kodProduk => $ebio_c10_bhg3_data)
                                                                    <tr>

                                                                        <td class="text-left">{{ $data->e_nl }}</td>
                                                                        <td class="text-left">{{ $data->e_np }}</td>

                                                                        @if ($data->e_negeri == '01')
                                                                            <td>JOHOR</td>
                                                                        @elseif ($data->e_negeri == '02')
                                                                            <td>KEDAH</td>
                                                                        @elseif ($data->e_negeri == '03')
                                                                            <td>KELANTAN</td>
                                                                        @elseif ($data->e_negeri == '04')
                                                                            <td>MELAKA</td>
                                                                        @elseif ($data->e_negeri == '05')
                                                                            <td>NEGERI SEMBILAN</td>
                                                                        @elseif ($data->e_negeri == '06')
                                                                            <td>PAHANG</td>
                                                                        @elseif ($data->e_negeri == '07')
                                                                            <td>PERAK</td>
                                                                        @elseif ($data->e_negeri == '08')
                                                                            <td>PERLIS</td>
                                                                        @elseif ($data->e_negeri == '09')
                                                                            <td>PULAU PINANG</td>
                                                                        @elseif ($data->e_negeri == '10')
                                                                            <td>SELANGOR</td>
                                                                        @elseif ($data->e_negeri == '11')
                                                                            <td>TERENGGANU</td>
                                                                        @elseif ($data->e_negeri == '12')
                                                                            <td>WILAYAH PERSEKUTUAN</td>
                                                                        @elseif ($data->e_negeri == '13')
                                                                            <td>SABAH</td>
                                                                        @elseif ($data->e_negeri == '14')
                                                                            <td>SARAWAK</td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                        <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>
                                                                        <td style="text-align: center; mso-number-format:'\@'"> {{ $kodProduk }}</td>

                                                                        <td> {{ $proddesc[$data->e_nl][$kodProduk] }}</td>

                                                                        @php
                                                                            $jumlah11 = 0;
                                                                            $total_between_bulan_c10 = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_c10 != 0) --}}

                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                    {{ number_format($ebio_c10_bhg3[$data->e_nl][$kodProduk][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah11 += $ebio_c10_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan11[$i] += $ebio_c10_bhg3[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah11 ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                                @endif
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="6"><b>Jumlah</b></th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                    <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                        <b>{{ number_format($jumlah_bulan11[$i] ?? 0,2) }}</b>
                                                                    </td>
                                                                    @php
                                                                        $total_between_bulan_c10 += $jumlah_bulan11[$i] ?? 0 ;
                                                                    @endphp

                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_bulan_c10 ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>

                                        </div>
                                    @endif
                                    <br>
                                    <br>
                                </div>

                            </section>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>




    </div>
@endsection

@section('scripts')
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

<script>
    function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>



<script>
    function ajax_daerah(select) {
        negeri = select.value;
        console.log(negeri);
        //clear jenis_data selection
        $("#daerah_id").empty();
        //initialize selection
        $("#daerah_id").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

        $.ajax({
            type: "get",
            url: "/ajax/fetch-daerah/" + negeri, //penting

            success: function(respond) {
                //fetch data (id) from DB Senarai Harga
                // console.log(respond);
                //loop for data
                var x = 0;
                respond.forEach(function() { //penting

                    // console.log(respond[x]);
                    $("#daerah_id").append('<option value="' + respond[x].kod_daerah + '">' +
                        respond[x]
                        .nama_daerah + '</option>');
                    x++;
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("Status: " + textStatus);
                console.log("Error: " + errorThrown);
            }
        });
    }
</script>

    <script>
        function ajax_produk(select) {
            kumpulan = select.value;
            console.log(kumpulan);
            //clear jenis_data selection
            $("#kod_produk").empty();
            //initialize selection
            $("#kod_produk").append('<option value="" selected disabled hidden>Sila Pilih Kumpulan Produk</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-produk/" + kumpulan, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        console.log(respond[x]);
                        $("#kod_produk").append('<option value="' + respond[x].prodid + '">'
                        + respond[x].prodid + " - " + respond[x].proddesc+ '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>

    <script>
        function ajax_produk_b2(select) {
            kumpulan = select.value;
            console.log(kumpulan);
            //clear jenis_data selection
            $("#kod_produk2").empty();
            //initialize selection
            $("#kod_produk2").append('<option value="" selected disabled hidden>Sila Pilih Kumpulan Produk</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-produk/" + kumpulan, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        console.log(respond[x]);
                        $("#kod_produk2").append('<option value="' + respond[x].prodid + '">'
                        + respond[x].prodid + " - " + respond[x].proddesc+ '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>


    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("#message").remove(); //tambah untuk remove flash message
            }, 5000); // 5 secs  (1 sec = 1000)
        });
    </script>

    <script type="text/javascript">
        function showTable() {
            var bulan = $('#bulan').val();
            // console.log(oer);

            if (bulan == "equal") {
                document.getElementById('equal_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";
            } else {
                document.getElementById('equal_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }

            if (bulan == "between") {
                document.getElementById('between_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";

            } else {
                document.getElementById('between_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }
        }

    </script>
     <script type="text/javascript">
        function showTable2() {
            var bulan = $('#bulan2').val();
            // console.log(oer);

            if (bulan == "equal") {
                document.getElementById('equal_container2').style.display = "block";
                document.getElementById('lain_container2').style.display = "block";
            } else {
                document.getElementById('equal_container2').style.display = "none";
                document.getElementById('lain_container2').style.display = "block";

            }

            if (bulan == "between") {
                document.getElementById('between_container2').style.display = "block";
                document.getElementById('lain_container2').style.display = "block";

            } else {
                document.getElementById('between_container2').style.display = "none";
                document.getElementById('lain_container2').style.display = "block";

            }
        }

    </script>
    <link href="{{ asset('nice-admin/assets/css/cdn.css') }}  " rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
                $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script type="text/javascript">
        window.onload = function() {
            //Reference the DropDownList.
            var ddlYears = document.getElementById("date-dropdown");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = 2011; i <= currentYear; i++) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }
        };
    </script>
    <script>
    function ExportToExcel()
        {
            var filename = "Ringkasan Bahagian 3"
            var tab_text = "<table border='2px'><tr bgcolor=''>";
            var textRange;
            var j = 0;
            tab = document.getElementById('example4');

            for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            }

            tab_text = tab_text + "</table>";
            var a = document.createElement('a');
            var data_type = 'data:application/vnd.ms-excel';
            a.href = data_type + ', ' + encodeURIComponent(tab_text);
            a.download = filename + '.xls';
            a.click();
                }
    </script>
    <script>
        $(document).ready(function() {
            $('html, body').animate({
                scrollTop: $("#scroll-section").offset().top
                }, 1000);
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#example4').DataTable( {
                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ]
            } );
        } );
    </script>
              {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <link  href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"rel="stylesheet" >


@endsection
