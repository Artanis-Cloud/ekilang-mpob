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
        <div class="page-breadcrumb mt-2">

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

        <div class="container-fluid">
            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a  href="{{ route('admin.ringkasan.penyata') }}"
                    style="color:black; border-radius:unset; font-size:14.4px;"
                    class="btn btn-work tablinks" >Ringkasan Penyata</a>

                    <a href="{{ route('admin.ringkasan.bahagian1') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks">Bahagian 1</a>

                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem; background-color: lightgray"
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
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Maklumat Operasi</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:-1%">Bahagian 2</h5>
                        </div>


                        <div class="card-body">
                            <hr>
                            <div class="mb-5 col-8" style="text-align: left">
                                <i>Arahan: Sila pastikan anda melengkapkan semua maklumat di kawasan yang bertanda '</i><b style="color: red">
                                    *</b><i>'</i>
                            </div>
                            <form action="{{ route('admin.ringkasan.bahagian2.process') }}" method="get">
                            @csrf
                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto ">

                                            <div class="form-group">
                                                <label class="required">Tahun</label>
                                                <select class="form-control" name="tahun"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')" required>
                                                    <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                    @for ($i = 2023; $i <= date('Y'); $i++)
                                                        <option>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Bulan</label>
                                                <select class="form-control" name="bulan"  id="bulan2" onchange="showTable2()">
                                                    <option selected value="">Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                    <option value="between">Between</option>
                                                </select>

                                            </div>
                                            <div id="equal_container2" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label>Pada</label>
                                                            <select class="form-control" name="start" >
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="between_container2" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label>Dari</label>
                                                            <select class="form-control" name="start_month">
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
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

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label>Ke</label>
                                                            <select class="form-control" name="end_month">
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="lain_container2" style="display:none">
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
                                                <label>Pemegang Pelesen</label>
                                                <select class="form-control select2" name="e_nl" style="width: 10%">
                                                    <option selected hidden  value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                    {{-- @if ($data->pelesen) --}}
                                                        {{-- @foreach ($data->pelesen as $pelesen) --}}
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $data->pelesen[0]->e_np }}
                                                        </option>
                                                        {{-- @endforeach --}}

                                                    {{-- @endif --}}

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="required">Data</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan" required>
                                                        <option selected hidden disabled value="">Semua Jenis Data</option>
                                                        <option value="hari_operasi" {{ ($laporan == 'hari_operasi') ? 'selected' : '' }}>Jumlah Hari Kilang Beroperasi Sebulan</option>
                                                        <option value="kapasiti" {{ ($laporan == 'kapasiti') ? 'selected' : '' }}>Kadar Penggunaan Kapasiti Sebulan</option>
                                                    </select>
                                                </fieldset>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="text-center"  id="scroll-section" >
                                    <button type="submit" class="btn btn-primary"  data-toggle="modal"
                                        data-target="#next">Carian</button>
                                </div>
                            </form>
                            <section class="section"><hr>
                                <div class="card"><br>
                                    <h3 style="color: rgb(30, 28, 28); text-align:center">Senarai Ringkasan Bahagian 2</h3>
                                    <div class="text-center">
                                        <h4 style="color: black; text-align:center; font-weight:500">
                                            @if ($laporan == 'hari_operasi')
                                            Jumlah Hari Kilang Beroperasi Sebulan
                                            @elseif($laporan == 'kapasiti')
                                            Kadar Penggunaan Kapasiti Sebulan
                                            @endif
                                        </h4>
                                        <h4 style="color: rgb(30, 28, 28); text-align:center">Tahun:  {{ $tahun }} </h4>
                                    </div>

                                    @if($laporan=='hari_operasi')
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
                                                <h4 style="color: black; text-align:center; font-weight:500">Jumlah Hari Kilang Beroperasi Sebulan</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>

                                            <table id="example4" class="table table-hover table-bordered" style="width: 100%; font-size:13px">

                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:15% "
                                                            rowspan="2">No. Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:15% "
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5% "
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5% "
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center;"
                                                            colspan="13">Hari</th>
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Dis
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jumlah
                                                            </th>
                                                        @elseif ($bulan == 'equal')
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
                                                                    $total_col_hari[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                {{-- @foreach ($data_hari_operasi[$data->e_nl] as $test) --}}
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

                                                                        @php
                                                                            $jumlah_hari = 0;
                                                                            $total_all_hari = 0;
                                                                        @endphp

                                                                        @for ($i=1; $i<=12;$i++)
                                                                            <td style="text-align: center"> {{ $data_hari_operasi[$data->e_nl][$i] ?? 0 }}</td>

                                                                            @php
                                                                                $jumlah_hari += $data_hari_operasi[$data->e_nl][$i] ?? 0;
                                                                                $total_col_hari[$i] += $data_hari_operasi[$data->e_nl][$i] ?? 0  ;
                                                                            @endphp
                                                                        @endfor

                                                                        <td class="text-center"><b>{{ $jumlah_hari ?? 0}}</b></td>

                                                                    </tr>
                                                                {{-- @endforeach --}}

                                                            </tr>
                                                                @php
                                                                    // $total_hari_operasi += $data->hari_operasi;
                                                                @endphp
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="font-weight-bold text-right" colspan="4">Jumlah</th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                    <td class="font-weight-bold text-center">{{ $total_col_hari[$i] ?? 0 }}</td>
                                                                    @php
                                                                        $total_all_hari += $total_col_hari[$i] ?? 0 ;
                                                                    @endphp
                                                                @endfor
                                                                <td class="font-weight-bold text-center">{{  $total_all_hari ?? 0 }}</td>

                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_hari_row_eq = 0;
                                                            @endphp
                                                            <tr>
                                                                @foreach ($result as $key => $data)
                                                                    <tr>
                                                                        {{-- @foreach ($data_hari_operasi[$data->e_nl] as $kodProduk => $data_hari_operasi_data) --}}
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
                                                                                <td style="text-align: center"> {{ $data_hari_operasi[$data->e_nl][$equal_month] }}</td>

                                                                                @php
                                                                                    $total_hari_row_eq += $data_hari_operasi[$data->e_nl][$equal_month] ?? 0;
                                                                                @endphp
                                                                            </tr>
                                                                        {{-- @endforeach --}}
                                                                    </tr>
                                                                @endforeach
                                                            </tr>

                                                            <tr style="background-color: #d3d3d34d"
                                                                class="font-weight-bold text-center">
                                                                <th class="font-weight-bold text-right" colspan="4">Jumlah</th>
                                                                <td class="text-center">{{ $total_hari_row_eq ?? 0 }}</td>

                                                            </tr>
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_hari_row[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                {{-- @foreach ($data_hari_operasi[$data->e_nl] as $kodProduk => $data_hari_operasi_data) --}}
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

                                                                        @php
                                                                            $jumlah_hari_col = 0;
                                                                            $total_between_hari = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_b5 != 0) --}}

                                                                                <td style="text-align: center"> {{ $data_hari_operasi[$data->e_nl][$i] ?? 0 }}</td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah_hari_col += $data_hari_operasi[$data->e_nl][$i] ?? 0;
                                                                                        $jumlah_hari_row[$i] += $data_hari_operasi[$data->e_nl][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td class="text-center"><b>{{ $jumlah_hari_col ?? 0 }}</b></td>

                                                                    </tr>
                                                                {{-- @endforeach --}}
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d"
                                                                class="font-weight-bold text-center">
                                                                <th class="font-weight-bold text-right" colspan="4">Jumlah</th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                    <td class="text-center">{{ $jumlah_hari_row[$i] ?? 0 }}</td>
                                                                    @php
                                                                        $total_between_hari += $jumlah_hari_row[$i] ?? 0 ;
                                                                    @endphp
                                                                @endfor
                                                                <td class="font-weight-bold text-center">{{ $total_between_hari ?? 0 }}</td>



                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>
                                        </div>
                                        <br>
                                        <br>
                                    @elseif($laporan == 'kapasiti')
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
                                                <h4 style="color: black; text-align:center; font-weight:500">Kadar Penggunaan Kapasiti Sebulan</h4>
                                                <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                            </div>

                                            <table id="example4" class="table table-hover table-bordered" style="width: 100%; font-size:13px">

                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:15% "
                                                            rowspan="2">No. Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:15% "
                                                            rowspan="2">Nama Pemegang Lesen</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5% "
                                                            rowspan="2">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center; width:5% "
                                                            rowspan="2">Daerah</th>
                                                        <th scope="col" style="vertical-align: middle; text-align:center;"
                                                            colspan="13">Kapasiti (%)</th>
                                                    </tr>
                                                    <tr style="background-color: #d3d3d34d">
                                                        @if ($bulan == null)
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jan
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Feb
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Mac
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Apr
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Mei
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jun
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jul
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Ogos
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Sept
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Okt
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Nov
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Dis
                                                            </th>
                                                            <th scope="col" style="vertical-align: middle; text-align:center; width:5%">Jumlah
                                                            </th>
                                                        @elseif ($bulan == 'equal')
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
                                                                    $total_col_kap[$i] = 0;
                                                                @endphp
                                                            @endfor
                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                {{-- @foreach ($data_hari_operasi[$data->e_nl] as $test) --}}
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

                                                                        @php
                                                                            $jumlah_kap = 0;
                                                                            $total_all_kap = 0;
                                                                        @endphp

                                                                        @for ($i=1; $i<=12;$i++)
                                                                            <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                {{ number_format($data_kapasiti[$data->e_nl][$i] ?? 0,2) }}
                                                                            </td>

                                                                            @php
                                                                                $jumlah_kap += $data_kapasiti[$data->e_nl][$i] ?? 0;
                                                                                $total_col_kap[$i] += $data_kapasiti[$data->e_nl][$i] ?? 0  ;
                                                                            @endphp
                                                                        @endfor

                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah_kap ?? 0,2)}}</b>
                                                                        </td>

                                                                    </tr>
                                                                {{-- @endforeach --}}

                                                            </tr>
                                                                @php
                                                                    // $total_hari_operasi += $data->hari_operasi;
                                                                @endphp
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d" >
                                                                <th class="text-right" colspan="4"><b>Jumlah</b></th>
                                                                @for ($i = 1; $i <= 12; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_col_kap[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_all_kap += $total_col_kap[$i] ?? 0 ;
                                                                @endphp
                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_all_kap ?? 0,2) }}</b>
                                                                </td>
                                                            </tr>
                                                        @elseif ($bulan == 'equal')
                                                            @php
                                                                $total_kap_row_eq = 0;
                                                            @endphp
                                                            <tr>
                                                                @foreach ($result as $key => $data)
                                                                    <tr>
                                                                        {{-- @foreach ($data_hari_operasi[$data->e_nl] as $kodProduk => $data_hari_operasi_data) --}}
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
                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                    {{ number_format($data_kapasiti[$data->e_nl][$equal_month] ?? 0,2) }}
                                                                                </td>
                                                                                @php
                                                                                    $total_kap_row_eq += $data_kapasiti[$data->e_nl][$equal_month] ?? 0;
                                                                                @endphp
                                                                            </tr>
                                                                        {{-- @endforeach --}}
                                                                    </tr>
                                                                @endforeach
                                                            </tr>

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="4"><b>Jumlah</b></th>
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($total_kap_row_eq ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>
                                                        @else
                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                @php
                                                                    $jumlah_kap_row[$i] = 0;
                                                                @endphp
                                                            @endfor

                                                            @foreach ($result as $key => $data)
                                                            <tr>
                                                                {{-- @foreach ($data_hari_operasi[$data->e_nl] as $kodProduk => $data_hari_operasi_data) --}}
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


                                                                        @php
                                                                            $jumlah_kap_col = 0;
                                                                            $total_between_kap = 0;
                                                                        @endphp
                                                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                                                {{-- @if ($data->ebio_bln == $i && $data->ebio_b5 != 0) --}}

                                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                                    {{ number_format($data_kapasiti[$data->e_nl][$i] ?? 0,2) }}
                                                                                </td>

                                                                                {{--@endif --}}
                                                                                    @php
                                                                                        $jumlah_kap_col += $data_kapasiti[$data->e_nl][$i] ?? 0;
                                                                                        $jumlah_kap_row[$i] += $data_kapasiti[$data->e_nl][$i] ?? 0;
                                                                                    @endphp


                                                                            @endfor
                                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                            <b>{{ number_format($jumlah_kap_col ?? 0,2) }}</b>
                                                                        </td>

                                                                    </tr>
                                                                {{-- @endforeach --}}
                                                            </tr>
                                                            @endforeach

                                                            <tr style="background-color: #d3d3d34d">
                                                                <th class="text-right" colspan="4"><b>Jumlah</b></th>

                                                                @for ($i = $start_month; $i <= $end_month; $i++)

                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format($jumlah_kap_row[$i] ?? 0,2) }}</b>
                                                                </td>
                                                                @php
                                                                    $total_between_kap += $jumlah_kap_row[$i] ?? 0 ;
                                                                @endphp
                                                                @endfor
                                                                <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                                    <b>{{ number_format( $total_between_kap ?? 0,2) }}</b>
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endif

                                                </tbody><br>

                                            </table>
                                        </div>
                                        <br>
                                        <br>
                                    @endif
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
                        $("#kod_produk").append('<option value="' + respond[x].prodname + '">' +
                            respond[x]
                            .proddesc + '</option>');
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
                        $("#kod_produk2").append('<option value="' + respond[x].prodname + '">' +
                            respond[x]
                            .proddesc + '</option>');
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
        $(document).ready(function() {
            $('html, body').animate({
                scrollTop: $("#scroll-section").offset().top
                }, 1000);
        })
    </script>
<script>
    function ExportToExcel()
      {
          var filename = "Laporan Ringkasan Bahagian 2"
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
          $('#example4').DataTable( {
              // dom: 'Bfrtip',
              // buttons: [
              //     'copy', 'csv', 'excel', 'pdf', 'print'
              // ]
          } );
      } );
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
