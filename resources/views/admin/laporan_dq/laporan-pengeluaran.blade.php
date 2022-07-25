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
                    <div class="card">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">L E M B A G A &nbsp; M I N Y
                                A K &nbsp; S A W I T &nbsp; M A L A Y S I A (MPOB)
                            </h3>
                            <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Penyata Bulanan</h4>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Pengeluaran Produk Biodiesel</h6>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">{{ $tahun2 }}</h6>
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
                        {{-- <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>JOHOR</b></div> --}}
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr style="background-color: #d3d3d34d">
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Bil.</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Nama Pemegang Lesen</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Lokasi</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                colspan="12">{{ $tahun2 }}</th>
                                        </tr>
                                        <tr style="background-color: #d3d3d34d">
                                            @if ($bulan == null)
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis
                                                </th>
                                            @else
                                                @for ($i = $start_month; $i <= $end_month; $i++)
                                                    @php
                                                        $total_bulan[$i] = 0;
                                                        $total_kapasiti[$i] = 0;
                                                        $total_kapasiti_bio = 0;
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
                                                            style="vertical-align: middle; text-align:center">
                                                            Ogos</th>
                                                    @elseif($i == '9')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">
                                                            Sept</th>
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
                                        @if ($pengeluaran)

                                            @if ($bulan == null)
                                                @php
                                                    $total_kapasiti = 0;
                                                    $bulan_1 = 0;
                                                    $bulan_2 = 0;
                                                    $bulan_3 = 0;
                                                    $bulan_4 = 0;
                                                    $bulan_5 = 0;
                                                    $bulan_6 = 0;
                                                    $bulan_7 = 0;
                                                    $bulan_8 = 0;
                                                    $bulan_9 = 0;
                                                    $bulan_10 = 0;
                                                    $bulan_11 = 0;
                                                    $bulan_12 = 0;
                                                    $total_bulan = 0;
                                                    // $total_kapasiti_.$i = 0;
                                                    $total_kapasiti_1 = 0;
                                                    $total_kapasiti_2 = 0;
                                                    $total_kapasiti_3 = 0;
                                                    $total_kapasiti_4 = 0;
                                                    $total_kapasiti_5 = 0;
                                                    $total_kapasiti_6 = 0;
                                                    $total_kapasiti_7 = 0;
                                                    $total_kapasiti_8 = 0;
                                                    $total_kapasiti_9 = 0;
                                                    $total_kapasiti_10 = 0;
                                                    $total_kapasiti_11 = 0;
                                                    $total_kapasiti_12 = 0;
                                                @endphp
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                {{-- @for ($i = $request->start_month; $i < $request->end_month; $i++)
                                                @foreach ($operasi as $data)
                                                @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                    <td style="text-align: center">/</td>
                                                @endif
                                                @endforeach
                                            @endfor --}}
                                                @foreach ($pengeluaran as $data)
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
                                                        @endif
                                                        {{-- @for ($i = $request->start_month; $i < $request->end_month; $i++)
                                                        @foreach ($operasi as $data)
                                                            @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                                <td style="text-align: center">/</td>
                                                            @endif
                                                        @endforeach
                                                    @endfor --}}
                                                        @if ($data->ebio_bln == '01' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_1++;
                                                                $total_bulan++;
                                                                $total_kapasiti_1 += $data->jan;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->jan ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '02' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_2++;
                                                                $total_bulan++;
                                                                $total_kapasiti_2 += $data->feb;
                                                            @endphp
                                                            <td
                                                                style="text-align: right"{{ number_format($data->feb ?? 0, 2) }}</td>
                                                            @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '03' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_3++;
                                                                $total_bulan++;
                                                                $total_kapasiti_3 += $data->mac;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->mac ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '04' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_4++;
                                                                $total_bulan++;
                                                                $total_kapasiti_4 += $data->apr;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->apr ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '05' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_5++;
                                                                $total_bulan++;
                                                                $total_kapasiti_5 += $data->mei;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->mei ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '06' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_6++;
                                                                $total_bulan++;
                                                                $total_kapasiti_6 += $data->jun;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->jun ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '07' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_7++;
                                                                $total_bulan++;
                                                                $total_kapasiti_7 += $data->jul;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->jul ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '08' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_8++;
                                                                $total_bulan++;
                                                                $total_kapasiti_8 += $data->ogs;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ogs ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '09' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_9++;
                                                                $total_bulan++;
                                                                $total_kapasiti_9 += $data->sept;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->sept ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '10' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_10++;
                                                                $total_bulan++;
                                                                $total_kapasiti_10 += $data->okt;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->okt ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '11' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_11++;
                                                                $total_bulan++;
                                                                $total_kapasiti_11 += $data->nov;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->nov ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '12' && $data->ebio_c6 != 0)
                                                            @php
                                                                $bulan_12++;
                                                                $total_bulan++;
                                                                $total_kapasiti_12 += $data->dec;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->dec ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif

                                                    </tr>
                                                    @php
                                                        $total_kapasiti += $data->kap_proses;
                                                        // $total_feb += $data->feb;
                                                        // $total_mac += $data->mac;
                                                        // $total_apr += $data->apr;
                                                        // $total_mei += $data->mei;
                                                        // $total_jun += $data->jun;
                                                        // $total_jul += $data->jul;
                                                        // $total_ogs += $data->ogs;
                                                        // $total_sept += $data->sept;
                                                        // $total_okt += $data->okt;
                                                        // $total_nov += $data->nov;
                                                        // $total_dec += $data->dec;
                                                    @endphp
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2"><b>JUMLAH</b></th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapasiti_1 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_2 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_3 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_4 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_5 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_6 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_7 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_8 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_9 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_10 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_11 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_kapasiti_12 ?? 0, 2) }}</td>
                                                    {{-- <td></td> --}}
                                                    {{-- <td></td> --}}
                                                </tr>
                                            @else
                                                @foreach ($pengeluaran as $key => $data)
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
                                                        @endif
                                                        @for ($i = $start_month; $i <= $end_month; $i++)
                                                            @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                                @php
                                                                    $total_bulan[$i]++;
                                                                    if ($i == '1'){
                                                                        $total_kapasiti[$i] += $data->jan;
                                                                    }
                                                                    elseif ($i == '2') {
                                                                        $total_kapasiti[$i] += $data->feb;
                                                                    }
                                                                    elseif ($i == '3') {
                                                                        $total_kapasiti[$i] += $data->mac;
                                                                    }
                                                                    elseif ($i == '4') {
                                                                        $total_kapasiti[$i] += $data->apr;
                                                                    }
                                                                    elseif ($i == '5') {
                                                                        $total_kapasiti[$i] += $data->mei;
                                                                    }
                                                                    elseif ($i == '6') {
                                                                        $total_kapasiti[$i] += $data->jun;
                                                                    }
                                                                    elseif ($i == '7') {
                                                                        $total_kapasiti[$i] += $data->jul;
                                                                    }
                                                                    elseif ($i == '8') {
                                                                        $total_kapasiti[$i] += $data->ogs;
                                                                    }
                                                                    elseif ($i == '9') {
                                                                        $total_kapasiti[$i] += $data->sept;
                                                                    }
                                                                    elseif ($i == '10') {
                                                                        $total_kapasiti[$i] += $data->okt;
                                                                    }
                                                                    elseif ($i == '11') {
                                                                        $total_kapasiti[$i] += $data->nov;
                                                                    }
                                                                    elseif ($i == '12') {
                                                                        $total_kapasiti[$i] += $data->dec;
                                                                    }

                                                                @endphp
                                                                @if ($i == '1')
                                                                    <td scope="col">
                                                                        {{ number_format($data->jan ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '2')
                                                                    <td scope="col" class="text-right">{{ number_format($data->feb ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '3')
                                                                    <td scope="col" class="text-right">{{ number_format($data->mac ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '4')
                                                                    <td scope="col" class="text-right">{{ number_format($data->apr ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '5')
                                                                    <td scope="col" class="text-right">{{ number_format($data->mei ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '6')
                                                                    <td scope="col" class="text-right">{{ number_format($data->jun ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '7')
                                                                    <td scope="col" class="text-right">{{ number_format($data->jul ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '8')
                                                                    <td scope="col" class="text-right">
                                                                        {{ number_format($data->ogs ?? 0, 2) }}</td>
                                                                @elseif($i == '9')
                                                                    <td scope="col" class="text-right">
                                                                        {{ number_format($data->sept ?? 0, 2) }}</td>
                                                                @elseif($i == '10')
                                                                    <td scope="col" class="text-right">
                                                                        {{ number_format($data->okt ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '11')
                                                                    <td scope="col" class="text-right">{{ number_format($data->nov ?? 0, 2) }}
                                                                    </td>
                                                                @elseif($i == '12')
                                                                    <td scope="col" class="text-right" >{{ number_format($data->dec ?? 0, 2) }}
                                                                    </td>
                                                                @endif
                                                                {{-- <td style="text-align: center">/</td> --}}
                                                            @else
                                                                <td class="text-right">0.00</td>
                                                            @endif
                                                        @endfor
                                                    </tr>

                                                @endforeach
                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"><b>JUMLAH</b></th>
                                                    @for ($i = $start_month; $i <= $end_month; $i++)
                                                        <td>{{ number_format($total_kapasiti[$i] ?? 0, 2) }}</td>
                                                    @endfor
                                                    {{-- <td></td> --}}
                                                    {{-- <td></td> --}}
                                                </tr>
                                            @endif
                                        @endif


                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <br>






                    </div>
                    <div class="col-12 mb-4 mt-4" style="margin-left:47%">
                        <a href="{{ route('admin.laporan.tahunan') }}" type="button"
                            class="btn btn-primary">Kembali</a>
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
        $(document).ready(function() {
            $('#example').DataTable({
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
                "columnDefs": [{
                    'targets': [0, 7, 8],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }]

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
