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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Validasi Stok Akhir Ikut Produk
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Validasi Stok Akhir</h5> --}}
                        </div>
                        <hr>
                        <form action="{{ route('admin.validasi.stok.akhir.ikut.produk') }}" method="get">
                            @csrf
                        <div class="card-body">

                            <div class="container center">

                                <div class="row ml-auto" style="margin-top:-1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="tahun">
                                            <option  value="2011">2011</option>
                                            <option  value="2012">2012</option>
                                            <option  value="2013">2013</option>
                                            <option  value="2014">2014</option>
                                            <option  value="2015">2015</option>
                                            <option  value="2016">2016</option>
                                            <option  value="2017">2017</option>
                                            <option  value="2018">2018</option>
                                            <option  value="2019">2019</option>
                                            <option  value="2020">2020</option>
                                            <option  value="2021">2021</option>
                                            <option  value="2022">2022</option>
                                            <option  value="2023">2023</option>
                                            <option  value="2024">2024</option>


                                            <option selected hidden disabled>Sila Pilih Tahun</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row mt-2 ml-auto">
                                    <label
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="bulan">
                                            <option  value="01">JANUARI</option>
                                            <option  value="02">FEBRUARI</option>
                                            <option  value="03">MAC</option>
                                            <option  value="04">APRIL</option>
                                            <option  value="05">MEI</option>
                                            <option  value="06">JUN</option>
                                            <option  value="07">JULAI</option>
                                            <option  value="08">OGOS</option>
                                            <option  value="09">SEPTEMBER</option>
                                            <option  value="10">OKTOBER</option>
                                            <option  value="11">NOVEMBER</option>
                                            <option  value="12">DISEMBER</option>


                                            <option selected hidden disabled>Sila Pilih Bulan</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row mt-2 ml-auto">
                                    <label
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Produk
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="produk">
                                            <option selected hidden disabled >Sila Pilih Produk</option>
                                            <option value="RBDPO">RBDPO</option>
                                            <option value="RBDPL">RBDPL</option>
                                            <option value="RBDPS">RBDPS</option>
                                            <option value="PFAD">PFAD</option>
                                            <option value="RBDPKO">RBDPKO</option>
                                            <option value="RBDPKL">RBDPKL</option>
                                            <option value="RBDPKS">RBDPKS</option>
                                            <option value="PKFAD">PKFAD</option>
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
                                                <tr>
                                                    <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                    <th scope="col" style="vertical-align: middle">Kilang</th>
                                                    <th scope="col" style="vertical-align: middle">Negeri</th>
                                                    <th scope="col" style="vertical-align: middle">PPO Dihasil (2E)</th>
                                                    <th scope="col" style="vertical-align: middle">Stok Awal (3A)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Belian (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Penerimaan (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Import (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">3A + 3B</th>
                                                    <th scope="col" style="vertical-align: middle">PPO Proses (3C)</th>
                                                    <th scope="col" style="vertical-align: middle">Jualan (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">Edaran (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">Eksport (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">3C + 3D</th>
                                                    <th scope="col" style="vertical-align: middle">Stok akhir (2E+(3A+3B) -(3C+3D))</th>
                                                    <th scope="col" style="vertical-align: middle">Stok akhir Di Lapor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total_besar = 0;
                                                    $total_stok_akhir = 0;
                                                @endphp
                                                @if ($ppo_sem)
                                                    @if (is_array($ppo_sem) || is_object($ppo_sem))
                                                        @foreach ($ppo_sem as $data)
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
                                                    <th colspan="14">Jumlah</th>
                                                    <td>{{ number_format($total_besar ?? 0, 2) }}</td>
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
                                                <tr>
                                                    <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                    <th scope="col" style="vertical-align: middle">Kilang</th>
                                                    <th scope="col" style="vertical-align: middle">Negeri</th>
                                                    <th scope="col" style="vertical-align: middle">PPO Dihasil (2E)</th>
                                                    <th scope="col" style="vertical-align: middle">Stok Awal (3A)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Belian (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Penerimaan (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Import (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">3A + 3B</th>
                                                    <th scope="col" style="vertical-align: middle">PPO Proses (3C)</th>
                                                    <th scope="col" style="vertical-align: middle">Jualan (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">Edaran (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">Eksport (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">3C + 3D</th>
                                                    <th scope="col" style="vertical-align: middle">Stok akhir (2E+(3A+3B) -(3C+3D))</th>
                                                    <th scope="col" style="vertical-align: middle">Stok akhir Di Lapor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                    <th colspan="14">Jumlah</th>
                                                    <td>{{ number_format($total_besar ?? 0, 2) }}</td>
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
                                                <tr>
                                                    <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                    <th scope="col" style="vertical-align: middle">Kilang</th>
                                                    <th scope="col" style="vertical-align: middle">Negeri</th>
                                                    <th scope="col" style="vertical-align: middle">PPO Dihasil (2E)</th>
                                                    <th scope="col" style="vertical-align: middle">Stok Awal (3A)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Belian (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Penerimaan (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">Bekalan Import (3B)</th>
                                                    <th scope="col" style="vertical-align: middle">3A + 3B</th>
                                                    <th scope="col" style="vertical-align: middle">PPO Proses (3C)</th>
                                                    <th scope="col" style="vertical-align: middle">Jualan (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">Edaran (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">Eksport (3D)</th>
                                                    <th scope="col" style="vertical-align: middle">3C + 3D</th>
                                                    <th scope="col" style="vertical-align: middle">Stok akhir (2E+(3A+3B) -(3C+3D))</th>
                                                    <th scope="col" style="vertical-align: middle">Stok akhir Di Lapor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                    <th colspan="14">Jumlah</th>
                                                    <td>{{ number_format($total_besar ?? 0, 2) }}</td>
                                                    <td>{{ number_format($total_stok_akhir ?? 0, 2) }}</td>
                                                </tr>
                                            </tbody>
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
