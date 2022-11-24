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
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Validasi Stok Akhir Ikut
                                Produk
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Validasi Stok Akhir</h5> --}}
                        </div>
                        <hr>
                        <form action="{{ route('admin.validasi.stok.akhir.ikut.produk') }}" method="get">
                            @csrf
                            <div class="card-body">

                                <div class="container center col-12">

                                    <div class="row ml-auto" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="tahun" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <@if (!$tahun)
                                                    <option selected hidden disabled value="">Sila Pilih Tahun
                                                    </option>
                                                @else
                                                    <option {{ $tahun ==  $tahun ? 'selected' : '' }} value="{{ $tahun }}">{{ $tahun }}</option>

                                                    <option selected hidden disabled value="{{ $tahun }}">
                                                        {{ $tahun }}</option>
                                                    @endif
                                                    @for ($i = 2011; $i <= date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor


                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mt-2 ml-auto">
                                        <label
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                        </label>
                                        {{-- {{ dd($bulan) }} --}}

                                        <div class="col-md-4">
                                            <select class="form-control" name="bulan" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">

                                                @if (!$bulan)
                                                    <option selected hidden disabled value="">Sila Pilih Bulan
                                                    </option>
                                                @else
                                                    @if ($bulan == '01')
                                                        <option {{ $bulan == '01' ? 'selected' : '' }} value="01">
                                                            JANUARI</option>
                                                    @elseif ($bulan == '02')
                                                        <option {{ $bulan == '02' ? 'selected' : '' }} value="02">
                                                            FEBRUARI</option>

                                                        {{-- <option selected hidden disabled value="02">FEBRUARI</option> --}}
                                                    @elseif ($bulan == '03')
                                                        <option {{ $bulan == '03' ? 'selected' : '' }} value="03">MAC
                                                        </option>

                                                        {{-- <option selected hidden disabled value="03">MAC</option> --}}
                                                    @elseif ($bulan == '04')
                                                        <option {{ $bulan == '04' ? 'selected' : '' }} value="01">APRIL
                                                        </option>

                                                        {{-- <option selected hidden disabled value="04">APRIL</option> --}}
                                                    @elseif ($bulan == '05')
                                                        <option {{ $bulan == '05' ? 'selected' : '' }} value="05">MEI
                                                        </option>

                                                        {{-- <option selected hidden disabled value="05">MEI</option> --}}
                                                    @elseif ($bulan == '06')
                                                        <option {{ $bulan == '06' ? 'selected' : '' }} value="06">JUN
                                                        </option>

                                                        {{-- <option selected hidden disabled value="06">JUN</option> --}}
                                                    @elseif ($bulan == '07')
                                                        <option {{ $bulan == '07' ? 'selected' : '' }} value="07">JULAI
                                                        </option>

                                                        {{-- <option selected hidden disabled value="07">JULAI</option> --}}
                                                    @elseif ($bulan == '08')
                                                        <option {{ $bulan == '08' ? 'selected' : '' }} value="08">OGOS
                                                        </option>

                                                        {{-- <option selected hidden disabled value="08">OGOS</option> --}}
                                                    @elseif ($bulan == '09')
                                                        <option {{ $bulan == '09' ? 'selected' : '' }} value="09">
                                                            SEPTEMBER</option>

                                                        {{-- <option selected hidden disabled value="09">SEPTEMBER</option> --}}
                                                    @elseif ($bulan == '10')
                                                        <option {{ $bulan == '10' ? 'selected' : '' }} value="10">
                                                            OKTOBER</option>

                                                        {{-- <option selected hidden disabled value="10">OKTOBER</option> --}}
                                                    @elseif ($bulan == '11')
                                                        <option {{ $bulan == '11' ? 'selected' : '' }} value="11">
                                                            NOVEMBER</option>

                                                        {{-- <option selected hidden disabled value="11">NOVEMBER</option> --}}
                                                    @elseif ($bulan == '12')
                                                        <option {{ $bulan == '12' ? 'selected' : '' }} value="12">
                                                            DISEMBER</option>

                                                        {{-- <option selected hidden disabled value="12">DISEMBER</option> --}}
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
                                    <div class="row mt-2 ml-auto">
                                        <label
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Produk
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control select2" name="produk" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                @if (!$produk)
                                                    <option selected hidden disabled value="">Sila Pilih Produk
                                                    </option>
                                                @else
                                                    @foreach ($lsprod as $ls)
                                                        <option {{ $produk == $ls->prodid ? 'selected' : '' }}
                                                            value="{{ $ls->prodid }}">{{ $ls->prodid }} -
                                                            {{ $ls->proddesc }}</option>
                                                    @endforeach
                                                @endif
                                                @foreach ($lsprod as $ls)
                                                    <option value="{{ $ls->prodid }}">{{ $ls->prodid }} -
                                                        {{ $ls->proddesc }}</option>
                                                @endforeach
                                                {{-- <option value="GK">RBDPO</option>
                                                <option value="29">RBDPL</option>
                                                <option value="27">RBDPS</option>
                                                <option value="35">PFAD</option>
                                                <option value="30">RBDPKO</option>
                                                <option value="32">RBDPKL</option>
                                                <option value="31">RBDPKS</option>
                                                <option value="56">PKFAD</option> --}}
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 mb-4 mt-4" style="margin-left:47%">

                                        <button type="submit" class="btn btn-primary" data-toggle="modal"
                                            data-target="#next">Query</button>
                                        {{-- </div> --}}
                                    </div>
                        </form>
                        <hr>
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
                                            $total_dipremis_pposem = 0;
                                            $total_stok_akhir = 0;
                                        @endphp
                                        @if ($ppo_sem)
                                            @if (is_array($ppo_sem) || is_object($ppo_sem))
                                                @foreach ($ppo_sem as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $data->e_nl }}
                                                        </td>
                                                        <td class="text-left">{{ $data->e_np }}</td>
                                                        <td class="text-left">{{ $data->negeri }}</td>
                                                        <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}
                                                        </td>
                                                        <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($dipremis_pposem = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                        </td>
                                                        <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_dipremis_pposem += $dipremis_pposem;
                                                        $total_stok_akhir += $data->ebio_b11;
                                                    @endphp
                                                @endforeach
                                            @endif
                                        @endif

                                        <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                            <th colspan="9">Jumlah</th>
                                            <td>{{ number_format($total_dipremis_pposem ?? 0, 2) }}</td>
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
                                            $total_dipremis_pposbh = 0;
                                            $total_stok_akhir = 0;
                                        @endphp
                                        @if ($ppo_sabah)
                                            @if (is_array($ppo_sabah) || is_object($ppo_sabah))
                                                @foreach ($ppo_sabah as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $data->e_nl }}
                                                        </td>
                                                        <td class="text-left">{{ $data->e_np }}</td>
                                                        <td class="text-left">{{ $data->negeri }}</td>
                                                        <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}
                                                        </td>
                                                        <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($dipremis_pposbh = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                        </td>
                                                        <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_dipremis_pposbh += $dipremis_pposbh;
                                                        $total_stok_akhir += $data->ebio_b11;
                                                    @endphp
                                                @endforeach
                                            @endif
                                        @endif

                                        <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                            <th colspan="9">Jumlah</th>
                                            <td>{{ number_format($total_dipremis_pposbh ?? 0, 2) }}</td>
                                            <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                        </tr>
                                    </tbody>
                                    {{-- <tbody>
                                                @php
                                                    $total_besar = 0;
                                                    $total_stok_akhir = 0;
                                                @endphp
                                                @if ($ppo_sabah)
                                                    @if (is_array($ppo_sabah) || is_object($ppo_sabah))
                                                        @foreach ($ppo_sabah as $data)
                                                            <tr class="text-right">
                                                                <td scope="row" class="text-left">{{ $data->lesen }}
                                                                </td>
                                                                <td class="text-left">{{ $data->kilang }}</td>
                                                                <td class="text-left">{{ $data->negeri }}</td>
                                                                <td>{{ number_format($data->ppo_hasil ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->stok_awal ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->bekalan_belian ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->bekalan_penerimaan ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($data->bekalan_import ?? 0, 2) }}</td>
                                                                <td>{{ number_format($total_3a_3b = $data->stok_awal + $data->bekalan_belian + $data->bekalan_penerimaan + $data->bekalan_import ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($data->ppo_proses ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->jualan_jualan ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->jualan_edaran ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->jualan_eksport ?? 0, 2) }}</td>
                                                                <td>{{ number_format($total_3c_3d = $data->ppo_proses + $data->jualan_jualan + $data->jualan_edaran + $data->jualan_eksport ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($total = $data->ppo_hasil + ($total_3a_3b - $total_3c_3d) ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($data->stok_akhir ?? 0, 2) }}</td>
                                                            </tr>
                                                            @php
                                                            $total_besar += $total;
                                                            $total_stok_akhir += $data->stok_akhir;
                                                        @endphp
                                                        @endforeach
                                                    @endif
                                                @endif

                                                <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                    <th colspan="9">Jumlah</th>
                                                    <td>{{ number_format($total_besar ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                                </tr>
                                            </tbody> --}}
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
                                            $total_dipremis_pposrwk = 0;
                                            $total_stok_akhir = 0;
                                        @endphp
                                        @if ($ppo_srwk)
                                            @if (is_array($ppo_srwk) || is_object($ppo_srwk))
                                                @foreach ($ppo_srwk as $data)
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $data->e_nl }}
                                                        </td>
                                                        <td class="text-left">{{ $data->e_np }}</td>
                                                        <td class="text-left">{{ $data->negeri }}</td>
                                                        <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}
                                                        </td>
                                                        <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                        <td>{{ number_format($dipremis_pposrwk = $data->ebio_b5 + $data->ebio_b6 + $data->ebio_b7 - ($data->ebio_b8 + $data->ebio_b9 + $data->ebio_b10) ?? 0, 2) }}
                                                        </td>
                                                        <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                    </tr>
                                                    @php
                                                        $total_dipremis_pposrwk += $dipremis_pposrwk;
                                                        $total_stok_akhir += $data->ebio_b11;
                                                    @endphp
                                                @endforeach
                                            @endif
                                        @endif

                                        <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                            <th colspan="9">Jumlah</th>
                                            <td>{{ number_format($total_dipremis_pposrwk ?? 0, 2) }}</td>
                                            <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                        </tr>
                                    </tbody>
                                    {{-- <tbody>
                                                @php
                                                    $total_besar = 0;
                                                    $total_stok_akhir = 0;
                                                @endphp
                                                @if ($ppo_srwk)
                                                    @if (is_array($ppo_srwk) || is_object($ppo_srwk))
                                                        @foreach ($ppo_srwk as $data)
                                                            <tr class="text-right">
                                                                <td scope="row" class="text-left">{{ $data->lesen }}
                                                                </td>
                                                                <td class="text-left">{{ $data->kilang }}</td>
                                                                <td class="text-left">{{ $data->negeri }}</td>
                                                                <td>{{ number_format($data->ppo_hasil ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->stok_awal ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->bekalan_belian ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->bekalan_penerimaan ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($data->bekalan_import ?? 0, 2) }}</td>
                                                                <td>{{ number_format($total_3a_3b = $data->stok_awal + $data->bekalan_belian + $data->bekalan_penerimaan + $data->bekalan_import ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($data->ppo_proses ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->jualan_jualan ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->jualan_edaran ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->jualan_eksport ?? 0, 2) }}</td>
                                                                <td>{{ number_format($total_3c_3d = $data->ppo_proses + $data->jualan_jualan + $data->jualan_edaran + $data->jualan_eksport ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($total = $data->ppo_hasil + ($total_3a_3b - $total_3c_3d) ?? 0, 2) }}
                                                                </td>
                                                                <td>{{ number_format($data->stok_akhir ?? 0, 2) }}</td>
                                                            </tr>
                                                            @php
                                                            $total_besar += $total;
                                                            $total_stok_akhir += $data->stok_akhir;
                                                        @endphp
                                                        @endforeach
                                                    @endif
                                                @endif

                                                <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                    <th colspan="9">Jumlah</th>
                                                    <td>{{ number_format($total_besar ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                                </tr>
                                            </tbody> --}}
                                </table>
                            </div>

                        </div>


                    </div>

                </div>
                <div class="col-12 mb-4 mt-2" style="margin-left:47%">
                    {{-- <div class="text-left"> --}}
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
@endsection
