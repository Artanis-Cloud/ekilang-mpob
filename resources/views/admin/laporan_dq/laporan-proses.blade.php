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
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Proses Selanjutnya Produk
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
                                        <tr style="background-color: #d3d3d34d">
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Bil.</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Nama Pemegang Lesen</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Lokasi</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Kapasiti Pemprosesan <br> (Tan/Tahun)</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                colspan="13">{{ $tahun2 }}</th>
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
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan -
                                                    Dis
                                                    {{ $tahun2 }}
                                                </th>
                                            @elseif ($bulan == 'between')
                                                @for ($i = $start_month; $i <= $end_month; $i++)
                                                    @php
                                                        $total_bulan[$i] = 0;
                                                        $total_proses[$i] = 0;
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
                                                <th scope="col" style="vertical-align: middle; text-align:center">{{ $start }} -
                                                    {{ $end }}
                                                    {{ $tahun2 }}
                                                </th>
                                            @else
                                                @if ($bulan2 == '01')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Jan
                                                    </th>
                                                @elseif($bulan2 == '02')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Feb
                                                    </th>
                                                @elseif($bulan2 == '03')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Mac
                                                    </th>
                                                @elseif($bulan2 == '04')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Apr
                                                    </th>
                                                @elseif($bulan2 == '05')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Mei
                                                    </th>
                                                @elseif($bulan2 == '06')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Jun
                                                    </th>
                                                @elseif($bulan2 == '07')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Jul
                                                    </th>
                                                @elseif($bulan2 == '08')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Ogos</th>
                                                @elseif($bulan2 == '09')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Sept</th>
                                                @elseif($bulan2 == '10')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Okt
                                                    </th>
                                                @elseif($bulan2 == '11')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Nov
                                                    </th>
                                                @elseif($bulan2 == '12')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Dis
                                                    </th>
                                                @endif
                                            @endif

                                        </tr>

                                    </thead>
                                    <tbody>
                                        @if ($proses)

                                            @if ($bulan == null)
                                                @php
                                                    $total_kapasiti = 0;
                                                    $total_allproses = 0;
                                                    // $bulan_1 = 0;
                                                    // $bulan_2 = 0;
                                                    // $bulan_3 = 0;
                                                    // $bulan_4 = 0;
                                                    // $bulan_5 = 0;
                                                    // $bulan_6 = 0;
                                                    // $bulan_7 = 0;
                                                    // $bulan_8 = 0;
                                                    // $bulan_9 = 0;
                                                    // $bulan_10 = 0;
                                                    // $bulan_11 = 0;
                                                    // $bulan_12 = 0;
                                                    // $total_bulan = 0;
                                                    // $total_kapasiti_.$i = 0;
                                                    $total_proses_1 = 0;
                                                    $total_proses_2 = 0;
                                                    $total_proses_3 = 0;
                                                    $total_proses_4 = 0;
                                                    $total_proses_5 = 0;
                                                    $total_proses_6 = 0;
                                                    $total_proses_7 = 0;
                                                    $total_proses_8 = 0;
                                                    $total_proses_9 = 0;
                                                    $total_proses_10 = 0;
                                                    $total_proses_11 = 0;
                                                    $total_proses_12 = 0;
                                                    $total_kapproses = 0;
                                                @endphp
                                                {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                                {{-- @for ($i = $request->start_month; $i < $request->end_month; $i++)
                                                @foreach ($proses as $data)
                                                @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                    <td style="text-align: center">/</td>
                                                @endif
                                                @endforeach
                                            @endfor --}}
                                                @foreach ($proses as $data)
                                                    {{-- {{ dd($data) }} --}}
                                                    @php
                                                        $total_proses = 0;

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
                                                            $total_kapproses += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>

                                                        {{-- @for ($i = $request->start_month; $i < $request->end_month; $i++)
                                                        @foreach ($proses as $data)
                                                            @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                                <td style="text-align: center">/</td>
                                                            @endif
                                                        @endforeach
                                                    @endfor --}}
                                                        @if ($data->ebio_bln == '01' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_1++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_1 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->jan ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '02' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_2 += $data->ebio_c6;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_2 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '03' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_3++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_3 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '04' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_4++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_4 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '05' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_5++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_5 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '06' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_6++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_6 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '07' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_7++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_7 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '08' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_8++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_8 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '09' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_9++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_9 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '10' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_10++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_10 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '11' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_11++;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_11 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '12' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_12 += $data->ebio_c6;
                                                                //$total_bulan += $data->ebio_c6;
                                                                $total_proses_12 += $data->ebio_c6;
                                                                $total_proses += $data->ebio_c6;

                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        <td style="text-align: right">
                                                            {{ number_format($total_proses ?? 0, 2) }}</td>

                                                    </tr>

                                                    @php
                                                        $total_allproses += $total_proses;
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
                                                    {{-- {{ dd($total_proses) }} --}}
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2"><b>JUMLAH</b></th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapproses ?? 0) }}</td>
                                                    <td>{{ number_format($total_proses_1 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_2 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_3 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_4 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_5 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_6 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_7 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_8 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_9 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_10 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_11 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_proses_12 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_allproses ?? 0, 2) }}</td>
                                                    {{-- <td></td> --}}
                                                    {{-- <td></td> --}}
                                                </tr>
                                            @elseif ($bulan == 'between')
                                                @php
                                                    $total_kapproses = 0;
                                                    $total_allproses = 0;

                                                @endphp

                                                @foreach ($proses as $key => $data)
                                                    @php
                                                        $total_proses = 0;
                                                        $total_bulan[$i] = 0;

                                                    @endphp
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
                                                            $total_kapproses += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>

                                                        @for ($i = $start_month; $i <= $end_month; $i++)
                                                            @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                                @php
                                                                    $total_proses += $data->ebio_c6;
                                                                    $total_bulan[$i] += $data->ebio_c6;

                                                                @endphp
                                                                <td class="text-right">
                                                                    {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                            @else
                                                                <td class="text-right">0.00</td>
                                                            @endif
                                                        @endfor
                                                        {{-- {{ dd($total_proses) }} --}}
                                                        {{-- @php
                                                                $jumlah = $total_proses;
                                                                // {{ dd( $jumlah); }}
                                                        @endphp --}}
                                                        <td style="text-align: right">
                                                            {{ number_format($total_proses ?? 0, 2) }}</td>

                                                    </tr>
                                                    @php
                                                        $total_allproses += $total_proses;
                                                @endphp
                                                @endforeach

                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="3"><b>JUMLAH</b></th>
                                                    <td>{{ number_format($total_kapproses ?? 0) }}</td>

                                                    @for ($i = $start_month; $i <= $end_month; $i++)
                                                        <td>{{ number_format($total_bulan[$i] ?? 0, 2) }}</td>
                                                    @endfor
                                                <td>{{ number_format($total_allproses ?? 0, 2) }}</td>

                                                </tr>


                                                {{-- @endif --}}


                                            @else
                                                @php
                                                    $total_kapasiti = 0;
                                                    $total_kapproses = 0;
                                                    $total_bulan = 0;
                                                    // $total_kapasiti_.$i = 0;
                                                    $total_proses_1 = 0;
                                                    $total_proses_2 = 0;
                                                    $total_proses_3 = 0;
                                                    $total_proses_4 = 0;
                                                    $total_proses_5 = 0;
                                                    $total_proses_6 = 0;
                                                    $total_proses_7 = 0;
                                                    $total_proses_8 = 0;
                                                    $total_proses_9 = 0;
                                                    $total_proses_10 = 0;
                                                    $total_proses_11 = 0;
                                                    $total_proses_12 = 0;
                                                @endphp

                                                @foreach ($proses as $key => $data)
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
                                                            $total_kapproses += $data->kap_proses;
                                                        @endphp
                                                        <td scope="row" class="text-right">
                                                            {{ number_format($data->kap_proses ?? 0) }}</td>
                                                        {{-- <td scope="row" class="text-left">{{ $data->kap_proses }}</td> --}}


                                                        @if ($data->ebio_bln == '01' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_1++;
                                                                $total_bulan++;
                                                                $total_proses_1 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '02' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_2++;
                                                                $total_bulan++;
                                                                $total_proses_2 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '03' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_3++;
                                                                $total_bulan++;
                                                                $total_proses_3 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '04' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_4++;
                                                                $total_bulan++;
                                                                $total_proses_4 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '05' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_5++;
                                                                $total_bulan++;
                                                                $total_proses_5 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '06' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_6++;
                                                                $total_bulan++;
                                                                $total_proses_6 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '07' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_7++;
                                                                $total_bulan++;
                                                                $total_proses_7 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '08' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_8++;
                                                                $total_bulan++;
                                                                $total_proses_8 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '09' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_9++;
                                                                $total_bulan++;
                                                                $total_proses_9 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '10' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_10++;
                                                                $total_bulan++;
                                                                $total_proses_10 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '11' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_11++;
                                                                $total_bulan++;
                                                                $total_proses_11 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @elseif ($data->ebio_bln == '12' && $data->ebio_c6 != 0)
                                                            @php
                                                                // $bulan_12++;
                                                                $total_bulan++;
                                                                $total_proses_12 += $data->ebio_c6;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif

                                                    </tr>
                                                    @php
                                                        $total_kapasiti += $data->kap_proses;
                                                    @endphp
                                                @endforeach


                                                <tr style="background-color: #d3d3d34d"
                                                    class="font-weight-bold text-right">
                                                    <th colspan="2"><b>JUMLAH</b></th>
                                                    <td></td>
                                                    <td>{{ number_format($total_kapproses ?? 0) }}</td>

                                                    @if ($bulan2 == '01')
                                                        <td>{{ number_format($total_proses_1 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '02')
                                                        <td>{{ number_format($total_proses_2 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '03')
                                                        <td>{{ number_format($total_proses_3 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '04')
                                                        <td>{{ number_format($total_proses_4 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '05')
                                                        <td>{{ number_format($total_proses_5 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '06')
                                                        <td>{{ number_format($total_proses_6 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '07')
                                                        <td>{{ number_format($total_proses_7 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '08')
                                                        <td>{{ number_format($total_proses_8 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '09')
                                                        <td>{{ number_format($total_proses_9 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '10')
                                                        <td>{{ number_format($total_proses_10 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '11')
                                                        <td>{{ number_format($total_proses_11 ?? 0, 2) }}</td>
                                                    @elseif ($bulan2 == '12')
                                                        <td>{{ number_format($total_proses_12 ?? 0, 2) }}</td>
                                                    @endif
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
