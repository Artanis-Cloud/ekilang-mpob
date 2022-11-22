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
                    <h4 class="page-title">Hebahan 10hb
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
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                            <div class="col-1 align-self-center">
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
                        <br>
                        {{-- <div class="col-12 mt-1 mb-2"><b><u>CPO</u></b></div> --}}

                        <!--JOHOR -->
                        <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>JOHOR</b></div>
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg" id="kapasiti">
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
                                        @if ($kapasiti_johor)
                                            {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                            @foreach ($kapasiti_johor as $data)
                                                <tr class="text-right">
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                        @if ($kapasiti_kedah)
                                            {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                            @foreach ($kapasiti_kedah as $data)
                                                <tr class="text-right">
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                <tr class="text-right">
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
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
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                    <td class="text-left">{{ $data->e_np }}</td>
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
                                            <th colspan="3">Jumlah</th>
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

    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#kapasiti tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
        var table = $('#kapasiti').DataTable({

            initComplete: function () {

                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            dom: 'Bfrtip',

            buttons: [

                'pageLength',

                {

                    extend: 'excel',
                    text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
                    className: "fred",

                    title: function(doc) {
                        return $('#title').text()
                    },

                    customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var style = xlsx.xl['styles.xml'];
                    $( 'row c', sheet ).attr( 's', '25' );
                    $('xf', style).find("alignment[horizontal='center']").attr("wrapText", "1");
                    $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
                    },

                    filename: 'Laporan Kapasiti Tahunan,



                },

            ],
            "language": {
                "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
                "zeroRecords": "Maaf, tiada rekod.",
                "info": "",
                "infoEmpty": "Tidak ada rekod yang tersedia",
                "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                "search": "Carian",
                "previous": "Sebelum",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Seterusnya",
                    "previous": "Sebelumnya"
                },
            },

        });

    });

</script>
    {{-- <script>
        $(function() {
              $("select").each(function (index, element) {
                       const val = $(this).data('value');
                       if(val !== '') {
                           $(this).val(val);
                       }
               });
        })
       </script> --}}
@endsection
