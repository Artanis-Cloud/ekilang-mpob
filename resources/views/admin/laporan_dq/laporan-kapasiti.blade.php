@extends('layouts.main')

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
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" id="printableArea">
                        <div class="card-body">
                            <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                                <div class="col-1 align-self-center noPrint">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-1%; margin-bottom:1%">L E M B A G A &nbsp; M I N Y
                                    A K &nbsp; S A W I T &nbsp; M A L A Y S I A (MPOB)
                                </h3>
                                <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Penyata Bulanan</h4>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Kapasiti Mengilang</h6>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">{{ $tahun }}</h6>
                            </div>
                            {{-- <hr> --}}
                            {{-- <form action="{{ route('admin.validasi.stok.akhir.proses') }}" method="get">
                                @csrf
                                <div class="card-body">

                                    <div class="container center">




                            </form> --}}
                            <hr>
                            <div class="noPrint" style="margin-left:4%">
                                <button class="dt-button buttons-excel buttons-html5"  onclick="printDiv('printableArea')"
                                    style="background-color:white; color: #f90a0a; " >
                                    <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                </button>
                                <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel(['tbl1','tbl2','tbl3','tbl4','tbl5','tbl6','tbl7','tbl8','tbl9','tbl10','tbl11','tbl12','tbl13','tbl14'],
                                ['JOHOR','KEDAH','KELANTAN','MELAKA','NEGERISEMBILAN','PAHANG',
                                'PERAK','PERLIS','PULAUPINANG','SELANGOR','TERENGGANU','WILAYAHPERSEKUTUAN','SABAH','SARAWAK'],
                                'Laporan Kapasiti.xls', 'Excel')"
                                    style="background-color: white; color: #0a7569; ">
                                    <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                </button>
                            </div>
                            <br>

                            {{-- <div class="col-12 mt-1 mb-2"><b><u>CPO</u></b></div> --}}

                            <!--JOHOR -->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>JOHOR</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl1" style="width: 100%; overflow: auto; table-layout: fixed;">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th  class="font-weight-bold text-center" scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center; font-weight:500">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_johor)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_johor as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                            <!--KEDAH-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>KEDAH</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl2"  style="width: 100%; overflow: auto; table-layout: fixed;">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; word-wrap: break-word; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_kedah)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_kedah as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                            <!--KELANTAN-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>KELANTAN</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl3">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_kelantan)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_kelantan as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                            <!--MELAKA-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>MELAKA</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl4">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_melaka)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_melaka as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                            <!--N9-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>NEGERI SEMBILAN</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl5">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_n9)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_n9 as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                            <!--PAHANG-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>PAHANG</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl6">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_pahang)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_pahang as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                            <!--PERAK-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>PERAK</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl7">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_perak)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_perak as $data)
                                                    <tr class="text-right" style="font-size: 9pt">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d; font-size: 9pt" class="font-weight-bold text-right">
                                                <th >-</th>
                                                <th>-</th>
                                                <th >Jumlah</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                            <!--PERLIS-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>PERLIS</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl8">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_perlis)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_perlis as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>


                            <!--PENANG-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>PULAU PINANG</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl9">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_penang)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_penang as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>


                            <!--SELANGOR-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>SELANGOR</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl10">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_selangor)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_selangor as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>


                            <!--TERENGGANU-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>TERENGGANU</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl11">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_terengganu)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_terengganu as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>


                            <!--wp-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>WILAYAH PERSEKUTUAN</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl12">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_wp)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_wp as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>


                            <!--SABAH-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>SABAH</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl13">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_sabah)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_sabah as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>


                            <!--SARAWAK-->
                            <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>SARAWAK</b></div>
                            <div class="row" style="font-size: 10px">
                                <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                    <table class="table table-bordered" id="tbl14">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_jan = 0;
                                                $total_feb = 0;
                                                $total_mac = 0;
                                                $total_apr = 0;
                                                $total_mei = 0;
                                                $total_jun = 0;
                                                $total_jul = 0;
                                                $total_ogs = 0;
                                                $total_sept = 0;
                                                $total_okt = 0;
                                                $total_nov = 0;
                                                $total_dec = 0;
                                                // $total_stok_akhir = 0;
                                            @endphp
                                            @if ($kapasiti_sarawak)
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                @foreach ($kapasiti_sarawak as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left" style=" word-wrap: break-word;">{{ $data->e_nl }}</td>
                                                        <td class="text-left" style=" word-wrap: break-word;">{{ $data->e_np }}</td>
                                                        <td>{{ number_format($data->jan ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->feb ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mac ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->apr ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->mei ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jun ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->jul ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->sept ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->okt ?? 0, 2) }} </td>
                                                        <td>{{ number_format($data->nov ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->dec ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_jan += $data->jan;
                                                        $total_feb += $data->feb;
                                                        $total_mac += $data->mac;
                                                        $total_apr += $data->apr;
                                                        $total_mei += $data->mei;
                                                        $total_jun += $data->jun;
                                                        $total_jul += $data->jul;
                                                        $total_ogs += $data->ogs;
                                                        $total_sept += $data->sept;
                                                        $total_okt += $data->okt;
                                                        $total_nov += $data->nov;
                                                        $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th >Jumlah</th>
                                                <th>-</th>
                                                <th >-</th>
                                                <td>{{ number_format($total_jan ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_feb ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mac ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_apr ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_mei ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jun ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_jul ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_ogs ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_sept ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_okt ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_nov ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_dec ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>

                        </div>


                    </div>
                    <div class="col-12 mb-4 mt-4" style="margin-left:47%">
                        <a href="{{ route('admin.laporan.tahunan') }}" type="button" class="btn btn-primary">Kembali</a>
                    </div>


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
    function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>


{{-- <link rel="stylesheet" href="print.css" type="text/css" media="print" />

    <script>
        function myPrint(myfrm) {
        var restorepage = $('body').html();
        var printcontent = $('#' + myfrm).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
    </script> --}}

<script>
  var ExportToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
      , tmplWorkbookXML = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
        + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>'
        + '<Styles>'
        + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
        + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
        + '</Styles>'
        + '{worksheets}</Workbook>'
      , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
      , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
      , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
      , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(tables, wsnames, wbname, appname) {
        var ctx = "";
        var workbookXML = "";
        var worksheetsXML = "";
        var rowsXML = "";

        for (var i = 0; i < tables.length; i++) {
          if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
          for (var j = 0; j < tables[i].rows.length; j++) {
            rowsXML += '<Row>'
            for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
              var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
              var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
              var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
              dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
              var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
              dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
              ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                     , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                     , data: (dataFormula)?'':dataValue
                     , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                    };
              rowsXML += format(tmplCellXML, ctx);
            }
            rowsXML += '</Row>'
          }
          ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
          worksheetsXML += format(tmplWorksheetXML, ctx);
          rowsXML = "";
        }

        ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
        workbookXML = format(tmplWorkbookXML, ctx);

  console.log(workbookXML);

        var link = document.createElement("A");
        link.href = uri + base64(workbookXML);
        link.download = wbname || 'Workbook.xls';
        link.target = '_blank';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    })();
</script>

<script>
    $('#downloadPDF').click(function () {
        domtoimage.toPng(document.getElementById('content2'))
    .then(function (blob) {
        var pdf = new jsPDF('l', 'pt', [$('#content2').width(), $('#content2').height()]);

        pdf.addImage(blob, 'PNG', 0, 0, $('#content2').width(), $('#content2').height());
        pdf.save("Purata Bilangan Anak Benih, Anak Pokok Dan Pokok Jaras Kecil Sehektar Bagi Keseluruhan Strata Hutan Paya Laut.pdf");

        that.options.api.optionsChanged();
    });
});
</script>{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js%22%3E</script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js%22%3E</script>


@endsection
