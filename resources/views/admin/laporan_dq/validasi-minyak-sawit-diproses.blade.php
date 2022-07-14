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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Validasi Minyak Sawit
                                Diproses
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Validasi Stok Akhir</h5> --}}
                        </div>
                        <hr>

                        <div class="card-body">

                                <div class="container center">
                                    <form action="{{ route('admin.validasi.minyak.sawit.diproses') }}" method="get">
                                    @csrf
                                        <div class="row ml-auto" style="margin-top:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="tahun">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                    <option value="2011" {{ old('tahun') == '2011' ? 'selected' : '' }}>2011
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
                                                    </option>
                                                    {{-- @endif --}}



                                                </select>

                                            </div>
                                        </div>
                                        <div class="row mt-2 ml-auto">
                                            <label
                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="bulan">
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


                                                    <option selected hidden disabled>Sila Pilih Bulan</option>
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
                                    <br>
                                    <div class="col-12 mt-1 mb-2"><b><u>CPO</u></b></div>
                                    <div class="row">
                                        <div class="col-12 table-responsive m-t-20">
                                            <table class="table table-bordered table-responsive-lg">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Kilang</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Minyak Sawit Diproses
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @if ($querycpo1)
                                                        @if (is_array($querycpo1) || is_object($querycpo1)) --}}
                                                            @foreach ($querycpo1 as $data )
                                                                <tr>
                                                                    <th>{{ $data->lesen }}</th>
                                                                    <td>{{ $data->kilang }}</td>
                                                                    <td>{{ $data->negeri }}</td>
                                                                    <td class=text-right>{{ number_format($data->cpo_msia_1 ?? 0,2) }}</td>
                                                                </tr>
                                                            @endforeach
                                                            {{-- @php
                                                            $total_besar += $total;
                                                            @endphp --}}
                                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                                <th colspan="3">Jumlah</th>
                                                                <td>{{ number_format($total_cpo ?? 0,2) }}</td>
                                                            </tr>
                                                        {{-- @endif
                                                    @endif --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="col-12 mt-1 mb-2"><b><u>PPO</u></b></div>
                                    <div class="row">
                                        <div class="col-12 table-responsive m-t-20">
                                            <table class="table table-bordered table-responsive-lg">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Kilang</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Minyak Sawit Diproses
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @if ($querycpo1)
                                                        @if (is_array($querycpo1) || is_object($querycpo1)) --}}
                                                            @foreach ($queryppo1 as $data )
                                                                <tr>
                                                                    <th>{{ $data->lesen }}</th>
                                                                    <td>{{ $data->kilang }}</td>
                                                                    <td>{{ $data->negeri }}</td>
                                                                    <td class=text-right>{{ number_format($data->ppo_msia_1 ?? 0,2) }}</td>
                                                                </tr>
                                                            @endforeach
                                                            {{-- @php
                                                            $total_besar += $total;
                                                            @endphp --}}
                                                            <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                                <th colspan="3">Jumlah</th>
                                                                <td>{{ number_format($total_ppo ?? 0,2) }}</td>
                                                            </tr>
                                                        {{-- @endif
                                                    @endif --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                        <div class="col-12 mt-1 mb-2"><b><u>CPKO</u></b></div>
                                        <div class="row">
                                            <div class="col-12 table-responsive m-t-20">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                            <th scope="col" style="vertical-align: middle">Kilang</th>
                                                            <th scope="col" style="vertical-align: middle">Negeri</th>
                                                            <th scope="col" style="vertical-align: middle">Minyak Sawit Diproses
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($querycpko1)
                                                            @if (is_array($querycpo1) || is_object($querycpko1))
                                                                @foreach ($querycpko1 as $data )
                                                                    <tr>
                                                                        <th>{{ $data->lesen }}</th>
                                                                        <td>{{ $data->kilang }}</td>
                                                                        <td>{{ $data->negeri }}</td>
                                                                        <td class=text-right>{{ number_format($data->cpko_msia_1 ?? 0,2) }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                {{-- @php
                                                                $total_besar += $total;
                                                                @endphp --}}
                                                                <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                                    <th colspan="3">Jumlah</th>
                                                                    <td>{{ number_format($total_cpko ?? 0,2) }}</td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="col-12 mt-1"><b><u>PPKO</u></b></div>
                                        <div class="row">
                                            <div class="col-12 table-responsive m-t-20">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                            <th scope="col" style="vertical-align: middle">Kilang</th>
                                                            <th scope="col" style="vertical-align: middle">Negeri</th>
                                                            <th scope="col" style="vertical-align: middle">Minyak Sawit Diproses
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @if ($querycpo1)
                                                            @if (is_array($querycpo1) || is_object($querycpo1)) --}}
                                                                @foreach ($queryppko1 as $data )
                                                                    <tr>
                                                                        <th>{{ $data->lesen }}</th>
                                                                        <td>{{ $data->kilang }}</td>
                                                                        <td>{{ $data->negeri }}</td>
                                                                        <td class=text-right>{{ number_format($data->ppko_msia_1 ?? 0,2) }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                {{-- @php
                                                                $total_besar += $total;
                                                                @endphp --}}
                                                                <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                                    <th colspan="3">Jumlah</th>
                                                                    <td>{{ number_format($total_ppko ?? 0,2) }}</td>
                                                                </tr>
                                                            {{-- @endif
                                                        @endif --}}
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </form>
                            <div class="col-12 mb-4 mt-1" style="margin-left:47%">
                                <a href="{{ route('admin.stok.akhir') }}" type="button"
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
@endsection
