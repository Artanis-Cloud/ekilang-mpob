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

/* .wrapper {
} */
.table {

  /* overflow-x:scroll; */
  width:100%;
  table-layout: fixed;
  width: auto;
  border-collapse: collapse;
  background: white;
  display: block;
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
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dynamic Query Biodiesel
                    </h4>
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

        <div class="container-fluid">
            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a  href="{{ route('admin.ringkasan.penyata') }}"
                    style="color:black; border-radius:unset; font-size:14.4px;"
                    class="btn btn-work tablinks" >Ringkasan Penyata</a>

                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem; background-color: lightgray"
                    class="btn btn-work tablinks" >Bahagian 1</a>

                    <a href="{{ route('admin.ringkasan.bahagian2') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks">Bahagian 2</a>

                <a href="{{ route('admin.ringkasan.bahagian3') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
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
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Bahagian 1</h3>
                                {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 1</h5> --}}
                            </div>
                            <hr>

                            <div class="card-body">
                                <form action="{{ route('admin.ringkasan.bahagian1.process') }}" style="margin-left: 5%" method="get">
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
                                                        <option value="2011" {{ ($tahun == '2011') ? 'selected' : '' }}>2011
                                                        </option>
                                                        <option value="2012" {{ ($tahun == '2012') ? 'selected' : '' }}>2012
                                                        </option>
                                                        <option value="2013" {{ ($tahun == '2013') ? 'selected' : '' }}>2013
                                                        </option>
                                                        <option value="2014" {{ ($tahun == '2014') ? 'selected' : '' }}>2014
                                                        </option>
                                                        <option value="2015" {{ ($tahun == '2015') ? 'selected' : '' }}>2015
                                                        </option>
                                                        <option value="2016" {{ ($tahun == '2016') ? 'selected' : '' }}>2016
                                                        </option>
                                                        <option value="2017" {{ ($tahun == '2017') ? 'selected' : '' }}>2017
                                                        </option>
                                                        <option value="2018" {{ ($tahun == '2018') ? 'selected' : '' }}>2018
                                                        </option>
                                                        <option value="2019" {{ ($tahun == '2019') ? 'selected' : '' }}>2019
                                                        </option>
                                                        <option value="2020" {{ ($tahun == '2020') ? 'selected' : '' }}>2020
                                                        </option>
                                                        <option value="2021" {{ ($tahun == '2021') ? 'selected' : '' }}>2021
                                                        </option>
                                                        <option value="2022" {{ ($tahun == '2022') ? 'selected' : '' }}>2022
                                                        </option>
                                                        <option value="2023" {{ ($tahun == '2023') ? 'selected' : '' }}>2023
                                                        </option>
                                                        <option value="2024" {{ ($tahun == '2024') ? 'selected' : '' }}>2024
                                                        </option>
                                                        {{-- @endif --}}


                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bulan</label>
                                                    <select class="form-control" name="bulan"  id="bulan" onchange="showTable()">
                                                        <option selected value="">Sila Pilih</option>
                                                        <option value="equal">Equal</option>
                                                        <option value="between">Between</option>
                                                    </select>

                                                </div>
                                                <div id="equal_container" style="display:none">
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label>&nbsp;</label>
                                                                <select class="form-control" name="bulan" >
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
                                                    <select class="form-control" id="negeri_id" name="e_negeri">
                                                        <option selected  value="">Sila Pilih Negeri</option>
                                                        @foreach ($negeri as $data)
                                                            <option value="{{ $data->kod_negeri }}">
                                                                {{ $data->nama_negeri }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-5 mr-auto">
                                                <div class="form-group">
                                                    <label>Pemegang Pelesen</label>
                                                    <select class="form-control select2" name="e_nl" style="width: 10%">
                                                        <option  selected value="">Sila Pilih Pemegang Pelesen</option>
                                                        @foreach ($users2 as $data)
                                                            <option value="{{ $data->e_nl }} ">
                                                                {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kumpulan Produk</label>
                                                    <select class="form-control" id="kumpproduk" name="kumpproduk"  onchange="ajax_produk(this);" >
                                                        <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                        @foreach ($kumpproduk as $data)
                                                            <option value="{{ $data->kumpulan }}">
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
                                                    <label class="required">Data</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" name="laporan" required>
                                                            <option selected hidden disabled value="">Sila Pilih Jenis Data</option>
                                                            <option value="ebio_b5">Stok Awal Di Premis</option>
                                                            <option value="ebio_b6">Belian / Terimaan</option>
                                                            <option value="ebio_b7">Pengeluaran</option>
                                                            <option value="ebio_b8">Digunakan Untuk Proses Selanjutnya</option>
                                                            <option value="ebio_b9">Jualan / Edaran Tempatan</option>
                                                            <option value="ebio_b10">Eksport</option>
                                                            <option value="ebio_b11">Stok Akhir Dilapor</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-right col-md-6 mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                            data-target="#next">Carian</button>
                                    </div>
                                </form>
                                <section class="section"><hr>
                                    <div class="card"><br>

                                        <h4 style="color: rgb(30, 28, 28); text-align:center">Senarai Ringkasan Bahagian 1</h4><br>
                                        @if ($laporan == 'ebio_b5' )
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img src="{{ asset('excel_icon.jpg') }}" alt="user" width="30" id="exportExcel" >
                                                </div>
                                                <div class="col-md-10">
                                                    <h6 style="color: black; text-align:center; font-weight:500">Stok Awal Di Premis</h6>
                                                    <h6 style="color: rgb(30, 28, 28); text-align:center">Tahun: {{ $tahun }}</h6>
                                                </div>

                                            </div>

                                            {{-- <div class="wrapper " > --}}

                                                <table id="example" class="table table-bordered text-center" style="font-size:13px; ">
                                                    <thead>
                                                        <tr style="background-color: #d3d3d34d">
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:1% "
                                                                rowspan="2">Bil.</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                                rowspan="2">No. Pemegang Lesen</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:10%"
                                                                rowspan="2">Nama Pemegang Lesen</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                                rowspan="2">Negeri</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                                rowspan="2">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:10%"
                                                                rowspan="2">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center;"
                                                                colspan="12">{{ $tahun }}</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:10%"
                                                                rowspan="2">Jumlah</th>
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
                                                            @else
                                                                @for ($i = $start_month; $i <= $end_month; $i++)
                                                                    @php
                                                                        $total_bulan5[$i] = 0;

                                                                    @endphp
                                                                    @if ($i == '1')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Jan
                                                                        </th>
                                                                    @elseif($i == '2')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Feb
                                                                        </th>
                                                                    @elseif($i == '3')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Mac
                                                                        </th>
                                                                    @elseif($i == '4')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Apr
                                                                        </th>
                                                                    @elseif($i == '5')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Mei
                                                                        </th>
                                                                    @elseif($i == '6')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Jun
                                                                        </th>
                                                                    @elseif($i == '7')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Jul
                                                                        </th>
                                                                    @elseif($i == '8')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Ogos
                                                                        </th>
                                                                    @elseif($i == '9')
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
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($result)

                                                            @if ($bulan == null)
                                                                @for ($i = 1; $i <= 13; $i++)
                                                                    @php
                                                                        $total_col_bulan_b5[$i] = 0;
                                                                    @endphp
                                                                @endfor
                                                                @foreach ($result as $data)
                                                                    <tr>
                                                                        @foreach ($ebio_b5[$data->e_nl] as $kodProduk => $test)
                                                                            <tr>
                                                                                <td d class="text-centter">{{ $loop->iteration }}</td>
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
                                                                                @endif

                                                                                <td style="text-align: center"> {{ $kodProduk }}</td>

                                                                                <td> {{ $data->proddesc }}</td>

                                                                                @for ($i=1; $i<=12;$i++)
                                                                                    <td style="text-align: center"> {{ $ebio_b5[$data->e_nl][$kodProduk][$i] ?? 0 }}</td>

                                                                                    @php
                                                                                        $total_col_bulan_b5[$i] += $ebio_b5[$data->e_nl][$kodProduk][$i] ?? 0  ;
                                                                                    @endphp
                                                                                @endfor

                                                                                <td class="text-center">{{ $sums_b5[$kodProduk]}}</td>

                                                                            </tr>
                                                                        @endforeach

                                                                    </tr>

                                                                @endforeach

                                                                <tr style="background-color: #d3d3d34d" >
                                                                    <th class="text-right" colspan="6">Jumlah</th>
                                                                    @for ($i = 1; $i <= 13; $i++)

                                                                    <td class="text-center">{{ $total_col_bulan_b5[$i] }}</td>

                                                                    @endfor
                                                                </tr>
                                                            @else

                                                                @for ($i = $start_month; $i <= $end_month; $i++)
                                                                    @php
                                                                        $jumlah_bulan[$i] = 0;
                                                                    @endphp
                                                                @endfor

                                                                @foreach ($result as $key => $data)
                                                                <tr>
                                                                    @foreach ($ebio_b5[$data->e_nl] as $kodProduk => $ebio_b5_data)
                                                                        <tr>
                                                                            <td class="text-center">{{ $loop->iteration }}</td>
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
                                                                            @endif
                                                                            <td style="text-align: center"> {{ $kodProduk }}</td>

                                                                            <td> {{ $data->proddesc }}</td>

                                                                            @php
                                                                                $jumlah = 0;
                                                                            @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_b5 != 0) --}}

                                                                                <td style="text-align: center"> {{ $ebio_b5[$data->e_nl][$kodProduk][$i] ?? 0 }}</td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah += $ebio_b5[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                        $jumlah_bulan[$i] += $ebio_b5[$data->e_nl][$kodProduk][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                            <td class="text-center">{{ $jumlah ?? 0 }}</td>

                                                                        </tr>
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach

                                                                <tr style="background-color: #d3d3d34d"
                                                                    class="font-weight-bold text-center">
                                                                    <th class="text-right" colspan="6">Jumlah</th>

                                                                    @for ($i = $start_month; $i <= $end_month; $i++)

                                                                    <td class="text-center">{{ $jumlah_bulan[$i] }}</td>

                                                                    @endfor
                                                                </tr>

                                                            @endif
                                                        @endif

                                                    </tbody><br>

                                                </table>

                                            {{-- </div> --}}
                                        @elseif($laporan == 'ebio_b6')
                                            <h6 style="color: black; text-align:center; margin-bottom:auto">Belian / Terimaan</h6>

                                            {{-- <div class="wrapper " > --}}

                                                <table  class="table table-bordered text-center" style="font-size:13px; ">
                                                    <thead>
                                                        <tr style="background-color: #d3d3d34d">
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:1% "
                                                                rowspan="2">Bil.</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                                rowspan="2">No. Pemegang Lesen</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:10%"
                                                                rowspan="2">Nama Pemegang Lesen</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%"
                                                                rowspan="2">Negeri</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:3%"
                                                                rowspan="2">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:10%"
                                                                rowspan="2">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center;"
                                                                colspan="12">{{ $tahun }}</th>
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
                                                            @else
                                                                @for ($i = $start_month; $i <= $end_month; $i++)
                                                                    @php
                                                                        $total_bulan[$i] = 0;
                                                                        $total_kapasiti[$i] = 0;
                                                                        $total_kapasiti_bio = 0;
                                                                        $total_hari_3 = 0;
                                                                        $total_hari_6 = 0;

                                                                    @endphp
                                                                    @if ($i == '1')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Jan
                                                                        </th>
                                                                    @elseif($i == '2')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Feb
                                                                        </th>
                                                                    @elseif($i == '3')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Mac
                                                                        </th>
                                                                    @elseif($i == '4')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Apr
                                                                        </th>
                                                                    @elseif($i == '5')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Mei
                                                                        </th>
                                                                    @elseif($i == '6')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Jun
                                                                        </th>
                                                                    @elseif($i == '7')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Jul
                                                                        </th>
                                                                    @elseif($i == '8')
                                                                        <th scope="col"
                                                                            style="vertical-align: middle; text-align:center">Ogos
                                                                        </th>
                                                                    @elseif($i == '9')
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
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($result)
                                                            @for ($i = 1; $i <= 13; $i++)
                                                                @php
                                                                    $total_col_bulan_b6[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @if ($bulan == null)
                                                                @php
                                                                    $total_hari_1 = 0;
                                                                    $total_hari_2 = 0;
                                                                    $total_hari_3 = 0;
                                                                    $total_hari_4 = 0;
                                                                    $total_hari_5 = 0;
                                                                    $total_hari_6 = 0;
                                                                    $total_hari_7 = 0;
                                                                    $total_hari_8 = 0;
                                                                    $total_hari_9 = 0;
                                                                    $total_hari_10 = 0;
                                                                    $total_hari_11 = 0;
                                                                    $total_hari_12 = 0;
                                                                    $total_bulan = 0;
                                                                    $total_ebio_b6 = 0;
                                                                @endphp
                                                                @foreach ($result as $data)
                                                                    <tr>
                                                                        @foreach ($ebio_b6[$data->e_nl] as $kodProduk => $test)
                                                                            <tr>
                                                                                <td scope="row">{{ $loop->iteration }}</td>
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
                                                                            @endif
                                                                            {{-- <td>
                                                                                {{ number_format($data->ebio_b6 ?? 0, 2) }}
                                                                            </td> --}}
                                                                            <td> {{ $kodProduk }}</td>
                                                                            <td> {{ $data->proddesc }}</td>

                                                                            @for ($i=1; $i<=12;$i++)
                                                                                <td style="text-align: center"> {{ $ebio_b6[$data->e_nl][$kodProduk][$i] ?? 0 }}</td>
                                                                            @endfor
                                                                        </tr>
                                                                        @endforeach



                                                                    </tr>
                                                                    @php
                                                                        // $total_ebio_b6 += $data->ebio_b6;
                                                                    @endphp
                                                                @endforeach
                                                                <tr style="background-color: #d3d3d34d"
                                                                    class="font-weight-bold text-center">
                                                                    <th class=text-right colspan="6">Jumlah</th>
                                                                    <td>{{number_format( $total_hari_1 ?? 0,2)   }}</td>
                                                                    <td>{{number_format( $total_hari_2 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_3 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_4 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_5 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_6 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_7 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_8 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_9 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_10 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_11 ?? 0,2)  }}</td>
                                                                    <td>{{number_format( $total_hari_12 ?? 0,2)  }}</td>
                                                                </tr>
                                                            @else
                                                                @foreach ($result as $key => $data)
                                                                    <tr>
                                                                        <td class="text-center">{{ $loop->iteration }}</td>
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
                                                                        @endif
                                                                        <td>{{ $data->proddesc }}</td>

                                                                        @for ($i = $start_month; $i <= $end_month; $i++)
                                                                            @if ($data->ebio_bln == $i && $data->ebio_b6 != 0)
                                                                                @php
                                                                                    $total_bulan[$i]+=$data->ebio_b6;
                                                                                @endphp
                                                                                <td style="text-align: center"> {{ number_format($data->ebio_b6 ?? '0') }}</td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                        @endfor
                                                                    </tr>

                                                                @endforeach


                                                                <tr style="background-color: #d3d3d34d"
                                                                    class="font-weight-bold text-center">
                                                                    <th colspan="4"></th>

                                                                    @for ($i = $start_month; $i <= $end_month; $i++)

                                                                    <td>{{ $total_bulan[$i] }}</td>

                                                                    @endfor
                                                                </tr>

                                                            @endif
                                                        @endif
                                                            {{-- @foreach($test as $key => $value)
                                                                <tr>

                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $result[$key]->e_np }} </td>
                                                                        <td>- </td>

                                                                        @foreach($value as $test2)
                                                                            <td>{{ $test2 }} </td>
                                                                        @endforeach


                                                                    <td>-</td>
                                                                </tr>
                                                            @endforeach --}}

                                                    </tbody><br>

                                                </table>

                                            {{-- </div> --}}
                                        @endif
                                        <br>
                                        <br>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.1/xlsx.full.min.js"></script>
    <script>
        $('#exportExcel').on('click', function(){
            var wb = XLSX.utils.table_to_book(document.getElementById('example'),{sheet: "Sheet name"})

            var wbout = XLSX.write(wb, {bookType: 'xlsx', bookSST: true, type: 'binary'});

            function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
            }

            saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'Senarai Ringkasan Stok Awal.xlsx');
        })
    </script>
@endsection
