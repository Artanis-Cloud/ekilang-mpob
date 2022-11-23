@extends('layouts.main')

@section('content')

    <style>
        @media print {
    print-area *{ /* can be whatever CSS selector you need */
        transform: scale(100%)
    }
}
    </style>
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
                        <form method="get" action="" id="myfrm">
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%"><a class="noScreen">Hebahan 10hb -</a> Stok Akhir
                                </h3>
                                <h5 class="noScreen" style="color: rgb(39, 80, 71); margin-bottom:1%">@if ($bulan == '01')
                                    <a value="01">JANUARI</a>
                                @elseif ($bulan == '02')
                                    <a value="02">FEBRUARI</a>
                                @elseif ($bulan == '03')
                                    <a value="03">MAC</a>
                                @elseif ($bulan == '04')
                                    <a value="04">APRIL</a>
                                @elseif ($bulan == '05')
                                    <a value="05">MEI</a>
                                @elseif ($bulan == '06')
                                    <a value="06">JUN</a>
                                @elseif ($bulan == '07')
                                    <a value="07">JULAI</a>
                                @elseif ($bulan == '08')
                                    <a value="08">OGOS</a>
                                @elseif ($bulan == '09')
                                    <a value="09">SEPTEMBER</a>
                                @elseif ($bulan == '10')
                                    <a value="10">OKTOBER</a>
                                @elseif ($bulan == '11')
                                    <a value="11">NOVEMBER</a>
                                @elseif ($bulan == '12')
                                    <a value="12">DISEMBER</a>
                                @endif
                                {{ $tahun }}</h5>
                            </div>
                            <hr>
                            <form action="{{ route('admin.validasi.stok.akhir.proses') }}" method="get">
                                @csrf
                                <div class="card-body">

                                    <div class="container center col-12">

                                        <div class="row ml-auto noPrint" style="margin-top:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="tahun" required width="100"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')">
                                                    @if (!$tahun)
                                                        <option selected hidden disabled value="">Sila Pilih Tahun
                                                        </option>
                                                    @else
                                                        <option selected disabled value="{{ $tahun }}">
                                                            {{ $tahun }}</option>
                                                    @endif
                                                    @for ($i = 2011; $i <= date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                    {{-- <option value="2011" {{ old('tahun') == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2012" {{ old('tahun') == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2013" {{ old('tahun') == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2014" {{ old('tahun') == '2014' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2015" {{ old('tahun') == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2016" {{ old('tahun') == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2017" {{ old('tahun') == '2017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2018" {{ old('tahun') == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2019" {{ old('tahun') == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2020" {{ old('tahun') == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2021" {{ old('tahun') == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2022" {{ old('tahun') == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2023" {{ old('tahun') == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2024" {{ old('tahun') == '2024' ? 'selected' : '' }}>2024
                                                    </option> --}}
                                                    {{-- @endif --}}



                                                </select>

                                            </div>
                                        </div>
                                        <div class="row mt-2 ml-auto noPrint">
                                            <label
                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="bulan" required width="100"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')">
                                                    @if (!$bulan)
                                                        <option selected hidden disabled value="">Sila Pilih Bulan
                                                        </option>
                                                    @else
                                                        @if ($bulan == '01')
                                                            <option value="01">JANUARI</option>
                                                        @elseif ($bulan == '02')
                                                            <option value="02">FEBRUARI</option>
                                                        @elseif ($bulan == '03')
                                                            <option value="03">MAC</option>
                                                        @elseif ($bulan == '04')
                                                            <option value="04">APRIL</option>
                                                        @elseif ($bulan == '05')
                                                            <option value="05">MEI</option>
                                                        @elseif ($bulan == '06')
                                                            <option value="06">JUN</option>
                                                        @elseif ($bulan == '07')
                                                            <option value="07">JULAI</option>
                                                        @elseif ($bulan == '08')
                                                            <option value="08">OGOS</option>
                                                        @elseif ($bulan == '09')
                                                            <option value="09">SEPTEMBER</option>
                                                        @elseif ($bulan == '10')
                                                            <option value="10">OKTOBER</option>
                                                        @elseif ($bulan == '11')
                                                            <option value="11">NOVEMBER</option>
                                                        @elseif ($bulan == '12')
                                                            <option value="12">DISEMBER</option>
                                                        @endif
                                                    @endif
                                                    <option value="01">JANUARI</option>
                                                    <option value="02">FEBRUARI</option>
                                                    <option value="03">MAC</option>
                                                    <option value="04">APRIL</option>
                                                    <option value="05">MEI</option>
                                                    <option value="06">JUN</option>
                                                    <option value="07">JULAI</option>
                                                    <option value="08">OGOS</option>
                                                    <option value="09">SEPTEMBER</option>
                                                    <option value="10">OKTOBER</option>
                                                    <option value="11">NOVEMBER</option>
                                                    <option value="12">DISEMBER</option>



                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 mt-4 noPrint" style="margin-left:47%">

                                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                                data-target="#next">Query</button>
                                            {{-- </div> --}}
                                        </div>
                            </form>
                            <hr class="noPrint">
                            <br>
                            <div class="col-12 mt-1 mb-2"><b><u>CPO</u></b></div>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Semenanjung Malaysia</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_cposem = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($cpo_sem)
                                                @if (is_array($cpo_sem) || is_object($cpo_sem))
                                                    @foreach ($cpo_sem as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_cposem = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_cposem;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sabah</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_cposbh = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($cpo_sabah)
                                                @if (is_array($cpo_sabah) || is_object($cpo_sabah))
                                                    @foreach ($cpo_sabah as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_cposbh = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_cposbh;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sarawak</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_cposrwk = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($cpo_srwk)
                                                @if (is_array($cpo_srwk) || is_object($cpo_srwk))
                                                    @foreach ($cpo_srwk as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_cposrwk = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_cposrwk;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <hr>
                            <br>
                            <div class="col-12 mt-1 mb-2"><b><u>PPO</u></b></div>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Semenanjung Malaysia</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_pposem = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($ppo_sem)
                                                @if (is_array($ppo_sem) || is_object($ppo_sem))
                                                    @foreach ($ppo_sem as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_pposem = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_pposem;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sabah</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_pposbh = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($ppo_sabah)
                                                @if (is_array($ppo_sabah) || is_object($ppo_sabah))
                                                    @foreach ($ppo_sabah as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_pposbh = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_pposbh;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sarawak</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_pposrwk = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($ppo_srwk)
                                                @if (is_array($ppo_srwk) || is_object($ppo_srwk))
                                                    @foreach ($ppo_srwk as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_pposrwk = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_pposrwk;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <hr>
                            <br>
                            <div class="col-12 mt-1 mb-2"><b><u>CPKO</u></b></div>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Semenanjung Malaysia</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_cpkosem = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($cpko_sem)
                                                @if (is_array($cpko_sem) || is_object($cpko_sem))
                                                    @foreach ($cpko_sem as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_cpkosem = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_cpkosem;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sabah</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_cpkosbh = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($cpko_sabah)
                                                @if (is_array($cpko_sabah) || is_object($cpko_sabah))
                                                    @foreach ($cpko_sabah as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_cpkosbh = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_cpkosbh;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sarawak</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_cpkosrwk = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($cpko_srwk)
                                                @if (is_array($cpko_srwk) || is_object($cpko_srwk))
                                                    @foreach ($cpko_srwk as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_cpkosrwk = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_cpkosrwk;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <hr>
                            <br>
                            <div class="col-12 mt-1 mb-2"><b><u>PPKO</u></b></div>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Semenanjung Malaysia</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_ppkosem = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($ppko_sem)
                                                @if (is_array($ppko_sem) || is_object($ppko_sem))
                                                    @foreach ($ppko_sem as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_ppkosem = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_ppkosem;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sabah</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_ppkosbh = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($ppko_sabah)
                                                @if (is_array($ppko_sabah) || is_object($ppko_sabah))
                                                    @foreach ($ppko_sabah as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_ppkosbh = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_ppkosbh;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <br>
                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sarawak</b></div>
                            <div class="row">
                                <div class="col-12 table-responsive m-t-20">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr style="background-color: #d3d3d34d">
                                                <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                <th scope="col" style="vertical-align: middle">Kilang</th>
                                                <th scope="col" style="vertical-align: middle">Negeri</th>
                                                <th scope="col" style="vertical-align: middle">Stok Awal Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Belian/Terimaan</th>
                                                <th scope="col" style="vertical-align: middle">Pengeluaran</th>
                                                <th scope="col" style="vertical-align: middle">Digunakan Untuk Proses
                                                    Selanjutnya</th>
                                                <th scope="col" style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                                <th scope="col" style="vertical-align: middle">Eksport</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dipremis</th>
                                                <th scope="col" style="vertical-align: middle">Stok akhir Dilapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $dipremis_ppkosrwk = 0;
                                                $total_dipremis = 0;
                                                $total_stok_akhir = 0;
                                            @endphp
                                            @if ($ppko_srwk)
                                                @if (is_array($ppko_srwk) || is_object($ppko_srwk))
                                                    @foreach ($ppko_srwk as $data)
                                                        <tr class="text-right">
                                                            <td scope="row" class="text-left">{{ $data->e_nl }}</td>
                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td class="text-left">{{ $data->negeri }}</td>
                                                            <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                            <td>{{ number_format($dipremis_ppkosrwk = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                            </td>
                                                            <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                        </tr>
                                                        @php
                                                            $total_dipremis += $dipremis_ppkosrwk;
                                                            $total_stok_akhir += $data->ebio_b11;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                <th colspan="9">Jumlah</th>
                                                <td>{{ number_format($total_dipremis ?? 0, 2) }}</td>
                                                <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </form>

                    </div>

                    <div class="col-12 mb-4 mt-4 noPrint" style="margin-left:40%">


                        <button type="button" class="btn btn-primary noPrint" style="margin: 1%"
                        onclick="myPrint('myfrm')" value="print">Cetak</button>
                        <a href="{{ route('admin.stok.akhir') }}" type="button" class="btn btn-primary">Kembali</a>
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
    <script>
        function myPrint(myfrm) {

            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body></html>";
            var newstr = document.all.item(myfrm).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
@endsection
