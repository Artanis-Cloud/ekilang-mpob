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
                    <h4 class="page-title">Laporan Biodiesel
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
                    <div class="card" id="printableArea">
                        <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                            <div class="col-1 align-self-center noPrint">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                        class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-1%; margin-bottom:1%">L E M B A G A &nbsp; M I N
                                Y
                                A K &nbsp; S A W I T &nbsp; M A L A Y S I A (MPOB)
                            </h3>
                            <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Penyata Bulanan</h4>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Kadar Penggunaan Kapasiti Kilang
                                Biodiesel</h6>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">{{ $tahun2 }}</h6>
                        </div>
                        {{-- <hr> --}}
                        {{-- <form action="{{ route('admin.validasi.stok.akhir.proses') }}" method="get">
                            @csrf
                            <div class="card-body">

                                <div class="container center">




                        </form> --}}
                        <hr>
                        <div class="noPrint" style="margin-left:4%">
                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                style="background-color:white; color: #f90a0a; ">
                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                            </button>
                            <button class="dt-button buttons-excel buttons-html5" onclick="ExportToExcel('example4')"
                                style="background-color: white; color: #0a7569; ">
                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                            </button>
                        </div>
                        <br>
                        {{-- <div class="col-12 mt-1 mb-2"><b><u>CPO</u></b></div> --}}

                        <!--JOHOR -->
                        {{-- <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>JOHOR</b></div> --}}
                        <div class="row">
                            {{-- <div class="container"> --}}

                            {{-- </div> --}}
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered" id="proses">
                                    <thead>
                                        @if ($bulan == null)
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama
                                                    Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Lokasi
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">
                                                    Kapasiti Pemprosesan <br> (Tan/Tahun)</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Minyak
                                                    Sawit Diproses pada bulan <br> Jan - Dis {{ $tahun2 }}<br> (Tan
                                                    Metrik)</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Kadar
                                                    Penggunaan Kapasiti<br> (%)</th>
                                            </tr>
                                        @elseif ($bulan == 'between')
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama
                                                    Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Lokasi
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">
                                                    Kapasiti Pemprosesan <br> (Tan/Tahun)</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Minyak
                                                    Sawit Diproses pada bulan <br> {{ $start }} - {{ $end }}
                                                    {{ $tahun2 }}<br> (Tan Metrik)</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Kadar
                                                    Penggunaan Kapasiti<br> (%)</th>
                                            </tr>
                                        @else
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle; text-align:center">Bil.
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nama
                                                    Pemegang Lesen</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Lokasi
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">
                                                    Kapasiti Pemprosesan <br> (Tan/Tahun)</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Minyak
                                                    Sawit Diproses pada bulan <br> {{ $bulan3 }}
                                                    {{ $tahun2 }}<br> (Tan Metrik)</th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Kadar
                                                    Penggunaan Kapasiti<br> (%)</th>
                                            </tr>
                                        @endif

                                        {{-- </tr> --}}

                                    </thead>
                                    <tbody>
                                        @if ($proses_sm)

                                            @if ($bulan == null)
                                                @php
                                                    $total_kapsm = 0;
                                                    $total_sm = 0;
                                                    $total_sbh = 0;
                                                    $total_srwk = 0;
                                                    $total_kapsbhsrwk = 0;
                                                    $total_sbhsrwk = 0;
                                                    $total_all = 0;
                                                    $total_kapall = 0;
                                                    $total_alluratesm = 0;
                                                    $total_alluratesbh = 0;
                                                    $total_alluratesrwk = 0;
                                                @endphp
                                                @foreach ($proses_sm as $data)
                                                {{-- {{ dd($data) }} --}}

                                                    @php
                                                        $by_pelesen = 0;
                                                    @endphp
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>
                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsm += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>

                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_sm += $data->ebio_c6;
                                                                $by_pelesen = ($data->ebio_c6 / $data->kap_proses) * 100;
                                                                $total_alluratesm += $by_pelesen;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
{{-- {{ dd($by_pelesen) }} --}}
                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>

                                                    </tr>
                                                @endforeach
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2" class=" text-center"><b>SEMENANJUNG MALAYSIA</b>
                                                    </th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapsm ?? 0) }}</td>
                                                    <td>{{ number_format($total_sm ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_alluratesm ?? 0, 2) }}</td>
                                                </tr>
                                                @php
                                                    $total_kapsbh = 0;

                                                @endphp
                                                @foreach ($proses_sbh as $data)
                                                    {{-- {{ dd($data) }} --}}

                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>
                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsbh += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>
                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_sbh += $data->ebio_c6;
                                                                $by_pelesen = ($data->ebio_c6 / $data->kap_proses) * 100;
                                                                $total_alluratesbh += $by_pelesen;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif

                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>

                                                    </tr>
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2" class=" text-center"><b>SABAH</b></th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapsbh ?? 0) }}</td>
                                                    <td>{{ number_format($total_sbh ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_alluratesbh ?? 0, 2) }}</td>

                                                    {{-- <td></td> --}}
                                                    {{-- <td></td> --}}
                                                </tr>
                                                @php
                                                    $total_kapsrwk = 0;

                                                @endphp
                                                @foreach ($proses_srwk as $data)
                                                    {{-- {{ dd($data) }} --}}

                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>
                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsrwk += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>

                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_srwk += $data->ebio_c6;
                                                                $by_pelesen = ($data->ebio_c6 / $data->kap_proses) * 100;
                                                                $total_alluratesrwk += $by_pelesen;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif

                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>

                                                    </tr>
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2" class=" text-center"><b>SARAWAK</b></th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapsrwk ?? 0) }}</td>
                                                    <td>{{ number_format($total_srwk ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_alluratesrwk ?? 0, 2) }}</td>

                                                </tr>
                                                @php
                                                    $total_kapsbhsrwk = $total_kapsrwk + $total_kapsbh;
                                                    $total_sbhsrwk = $total_srwk + $total_sbh;
                                                    $total_uratesbhsrwk = $total_alluratesrwk + $total_alluratesbh;
                                                @endphp
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2" class=" text-center"><b>SABAH & SARAWAK</b></th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapsbhsrwk ?? 0) }}</td>
                                                    <td>{{ number_format($total_sbhsrwk ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_uratesbhsrwk ?? 0, 2) }}</td>
                                                </tr>
                                                @php
                                                    $total_kapall = $total_kapsrwk + $total_kapsbh + $total_kapsm;
                                                    $total_all = $total_srwk + $total_sbh + $total_sm;
                                                    $total_urateall = ($total_all / $total_kapall) * 100 ;
                                                    // $total_urateall = $by_pelesen2 * 100;
                                                    // $total_urateall = $total_alluratesrwk + $total_alluratesbh + $total_alluratesm;

                                                @endphp
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2" class=" text-center"><b>JUMLAH KESELURUHAN</b></th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapall ?? 0) }}</td>
                                                    <td>{{ number_format($total_all ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_urateall ?? 0, 2) }}</td>
                                                </tr>
                                            @elseif ($bulan == 'between')
                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                            @php
                                                $count = ($end_month - $start_month) + 1;
                                            @endphp
                                                @endfor
                                                {{-- {{  }} --}}
                                                @php
                                                    $total_kapproses = 0;
                                                    $total_allproses = 0;
                                                    $total_kapsm = 0;
                                                    $total_sm = 0;
                                                    $total_kapsbh = 0;
                                                    $total_sbh = 0;
                                                    $total_kapsrwk = 0;
                                                    $total_srwk = 0;
                                                    $total_alluratesm = 0;
                                                    $total_alluratesbh = 0;
                                                    $total_alluratesrwk = 0;
                                                    // $count = sizeof($proses_sm);


                                                @endphp

                                                {{-- {{ dd($count1) }} --}}

                                                @foreach ($proses_sm as $key => $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->e_np }}</td>

                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsm += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>

                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_sm += $data->ebio_c6;
                                                                $by_pelesen2 = $data->ebio_c6 / (($data->kap_proses / 12) * $count) ;
                                                                $by_pelesen = $by_pelesen2 * 100;
                                                                $total_alluratesm += $by_pelesen;
                                                            @endphp
                                                            <td class="text-right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td class="text-right">0.00</td>
                                                        @endif
                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>

                                                    </tr>
                                                @endforeach

                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"class=" text-center"><b>SEMENANJUNG MALAYSIA</b>
                                                    </th>
                                                    <td>{{ number_format($total_kapsm ?? 0) }}</td>

                                                    <td>{{ number_format($total_sm ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_alluratesm ?? 0, 2) }}</td>

                                                </tr>
                                                @foreach ($proses_sbh as $key => $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->e_np }}</td>

                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsbh += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>

                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_sbh += $data->ebio_c6;
                                                                $by_pelesen2 = $data->ebio_c6 / (($data->kap_proses / 12) * $count) ;
                                                                $by_pelesen = $by_pelesen2 * 100;
                                                                // $by_pelesen = ($data->ebio_c6 / ($data->kap_proses / (12 * $count))) * 100;
                                                                $total_alluratesbh += $by_pelesen;

                                                            @endphp
                                                            <td class="text-right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td class="text-right">0.00</td>
                                                        @endif
                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>

                                                    </tr>
                                                @endforeach

                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"class=" text-center"><b>SABAH</b></th>
                                                    <td>{{ number_format($total_kapsbh ?? 0) }}</td>

                                                    <td>{{ number_format($total_sbh ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_alluratesbh ?? 0, 2) }}</td>

                                                </tr>
                                                @foreach ($proses_srwk as $key => $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->e_np }}</td>

                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsrwk += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>

                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_srwk += $data->ebio_c6;
                                                                $by_pelesen2 = $data->ebio_c6 / (($data->kap_proses / 12) * $count) ;
                                                                $by_pelesen = $by_pelesen2 * 100;
                                                                // $by_pelesen = ($data->ebio_c6 / ($data->kap_proses / (12 * $count))) * 100;
                                                                $total_alluratesrwk += $by_pelesen;

                                                            @endphp
                                                            <td class="text-right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td class="text-right">0.00</td>
                                                        @endif
                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>

                                                    </tr>
                                                @endforeach

                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"class=" text-center"><b>SARAWAK</b></th>
                                                    <td>{{ number_format($total_kapsrwk ?? 0) }}</td>

                                                    <td>{{ number_format($total_srwk ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_alluratesrwk ?? 0, 2) }}</td>

                                                </tr>
                                                @php
                                                    $total_kapsbhsrwk = $total_kapsrwk + $total_kapsbh;
                                                    $total_sbhsrwk = $total_srwk + $total_sbh;
                                                    $total_uratesbhsrwk = $total_alluratesrwk + $total_alluratesbh;
                                                @endphp
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"class=" text-center"><b>SABAH & SARAWAK</b></th>
                                                    <td>{{ number_format($total_kapsbhsrwk ?? 0) }}</td>

                                                    <td>{{ number_format($total_sbhsrwk ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_uratesbhsrwk ?? 0, 2) }}</td>

                                                </tr>
                                                @php
                                                    $total_kapall = $total_kapsrwk + $total_kapsbh + $total_kapsm;
                                                    $total_all = $total_srwk + $total_sbh + $total_sm;
                                                    $by_pelesen2 = $total_all / (($total_kapall / 12) * $count) ;
                                                    $total_urateall = $by_pelesen2 * 100;
                                                    // $total_urateall = $total_alluratesrwk + $total_alluratesbh + $total_alluratesm;
                                                @endphp
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"class=" text-center"><b>JUMLAH KESELURUHAN</b></th>
                                                    <td>{{ number_format($total_kapall ?? 0) }}</td>

                                                    <td>{{ number_format($total_all ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_urateall ?? 0, 2) }}</td>

                                                </tr>



                                                {{-- @endif --}}
                                            @else
                                                @php
                                                    $total_kapproses = 0;
                                                    $total_allproses = 0;
                                                    $total_kapsm = 0;
                                                    $total_sm = 0;
                                                    $total_kapsbh = 0;
                                                    $total_sbh = 0;
                                                    $total_kapsrwk = 0;
                                                    $total_srwk = 0;
                                                    $total_alluratesm = 0;
                                                    $total_alluratesbh = 0;
                                                    $total_alluratesrwk = 0;

                                                @endphp

                                                @foreach ($proses_sm as $key => $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>
                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsm += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>


                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_sm += $data->ebio_c6;
                                                                $by_pelesen = ($data->ebio_c6 / ($data->kap_proses / 12)) * 100;
                                                                $total_alluratesm += $by_pelesen;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>
                                                    </tr>
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3" class=" text-center"><b>SEMENANJUNG MALAYSIA</b></th>
                                                    <td>{{ number_format($total_kapsm ?? 0) }}</td>

                                                    <td>{{ number_format($total_sm ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_alluratesm ?? 0, 2) }}</td>

                                                </tr>
                                                @foreach ($proses_sbh as $key => $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>
                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsbh += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>


                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_sbh += $data->ebio_c6;
                                                                $by_pelesen = ($data->ebio_c6 / ($data->kap_proses / 12)) * 100;
                                                                $total_alluratesbh += $by_pelesen;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>
                                                    </tr>
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3" class=" text-center"><b>SABAH</b></th>
                                                    <td>{{ number_format($total_kapsbh ?? 0) }}</td>

                                                    <td>{{ number_format($total_sbh ?? 0, 2) }}</td>
                                                    <td>
                                                        {{ number_format($total_alluratesbh ?? 0, 2) }}</td>

                                                </tr>
                                                @foreach ($proses_srwk as $key => $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>
                                                        @if ($data->e_negeri == '01')
                                                            <td class="text-left">JOHOR</td>
                                                        @elseif ($data->e_negeri == '02')
                                                            <td class="text-left">KEDAH</td>
                                                        @elseif ($data->e_negeri == '03')
                                                            <td class="text-left">KELANTAN</td>
                                                        @elseif ($data->e_negeri == '04')
                                                            <td class="text-left">MELAKA</td>
                                                        @elseif ($data->e_negeri == '05')
                                                            <td class="text-left">NEGERI SEMBILAN</td>
                                                        @elseif ($data->e_negeri == '06')
                                                            <td class="text-left">PAHANG</td>
                                                        @elseif ($data->e_negeri == '07')
                                                            <td class="text-left">PERAK</td>
                                                        @elseif ($data->e_negeri == '08')
                                                            <td class="text-left">PERLIS</td>
                                                        @elseif ($data->e_negeri == '09')
                                                            <td class="text-left">PULAU PINANG</td>
                                                        @elseif ($data->e_negeri == '10')
                                                            <td class="text-left">SELANGOR</td>
                                                        @elseif ($data->e_negeri == '11')
                                                            <td class="text-left">TERENGGANU</td>
                                                        @elseif ($data->e_negeri == '12')
                                                            <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                        @elseif ($data->e_negeri == '13')
                                                            <td class="text-left">SABAH</td>
                                                        @elseif ($data->e_negeri == '14')
                                                            <td class="text-left">SARAWAK</td>
                                                        @else
                                                            <td class="text-left">-</td>
                                                        @endif
                                                        @php
                                                            $total_kapsrwk += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>


                                                        @if ($data->ebio_c6 != 0)
                                                            @php
                                                                $total_srwk += $data->ebio_c6;
                                                                $by_pelesen = ($data->ebio_c6 / ($data->kap_proses / 12)) * 100;
                                                                $total_alluratesrwk += $by_pelesen;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        <td style="text-align: right">
                                                            {{ number_format($by_pelesen ?? 0, 2) }}</td>
                                                    </tr>
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3" class=" text-center"><b>SARAWAK</b></th>
                                                    <td>{{ number_format($total_kapsrwk ?? 0) }}</td>

                                                    <td>{{ number_format($total_srwk ?? 0, 2) }}</td>
                                                    <td>
                                                        {{ number_format($total_alluratesrwk ?? 0, 2) }}</td>

                                                </tr>
                                                @php
                                                    $total_kapsbhsrwk = $total_kapsrwk + $total_kapsbh;
                                                    $total_sbhsrwk = $total_srwk + $total_sbh;
                                                    $total_uratesbhsrwk = $total_alluratesrwk + $total_alluratesbh;
                                                @endphp
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"class=" text-center"><b>SABAH & SARAWAK</b></th>
                                                    <td>{{ number_format($total_kapsbhsrwk ?? 0) }}</td>

                                                    <td>{{ number_format($total_sbhsrwk ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_uratesbhsrwk ?? 0, 2) }}</td>


                                                </tr>
                                                @php
                                                    $total_kapall = $total_kapsrwk + $total_kapsbh + $total_kapsm;
                                                    $total_all = $total_srwk + $total_sbh + $total_sm;
                                                    $total_urateall = $total_alluratesrwk + $total_alluratesbh + $total_alluratesm;
                                                @endphp
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"class=" text-center"><b>JUMLAH KESELURUHAN</b></th>
                                                    <td>{{ number_format($total_kapall ?? 0) }}</td>

                                                    <td>{{ number_format($total_all ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_urateall ?? 0, 2) }}</td>


                                                </tr>
                                            @endif
                                        @endif


                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <br>






                        <div class="col-12 mb-4 mt-4 noPrint" style="margin-left:47%">
                            <a href="{{ route('admin.laporan.tahunan') }}" type="button"
                                class="btn btn-primary">Kembali</a>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
    {{-- </div>

    </div>




    </div> --}}
@endsection

@section('scripts')
    <script>
        function ExportToExcel() {
            var filename = "Maklumat Proses Selanjutnya Produk Biodiesel"
            var tab_text = "<table border='2px'><tr bgcolor=' '>";
            var textRange;
            var j = 0;
            tab = document.getElementById('proses');

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
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    {{-- <script> --}}
    {{--
//     $(document).ready(function () {
//     // Setup - add a text input to each footer cell
//     $('#proses tfoot th').each(function () {
//         var title = $(this).text();
//         $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
//     });

//     // DataTable
//         var table = $('#proses').DataTable({

//             initComplete: function () {

//                 // Apply the search
//                 this.api()
//                     .columns()
//                     .every(function () {
//                         var that = this;
//                         $('input', this.footer()).on('keyup change clear', function () {
//                             if (that.search() !== this.value) {
//                                 that.search(this.value).draw();
//                             }
//                         });
//                     });
//             },
//             dom: 'Bfrtip',

//             buttons: [

//                 'pageLength',

//                 {

//                     extend: 'excel',
//                     text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
//                     className: "fred",

//                     title: function(doc) {
//                         return $('#title').text()
//                     },

//                     customize: function(xlsx) {
//                     var sheet = xlsx.xl.worksheets['sheet1.xml'];
//                     var style = xlsx.xl['styles.xml'];
//                     $( 'row c', sheet ).attr( 's', '25' );
//                     $('xf', style).find("alignment[horizontal='center']").attr("wrapText", "1");
//                     $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
//                     },

//                     filename: 'Laporan proses Produk Biodiesel',



//                 },

//             ],
//             "language": {
//                 "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
//                 "zeroRecords": "Maaf, tiada rekod.",
//                 "info": "",
//                 "infoEmpty": "Tidak ada rekod yang tersedia",
//                 "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
//                 "search": "Carian",
//                 "previous": "Sebelum",
//                 "paginate": {
//                     "first": "Pertama",
//                     "last": "Terakhir",
//                     "next": "Seterusnya",
//                     "previous": "Sebelumnya"
//                 },
//             },

//         });

//     });

// </script> --}}
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
