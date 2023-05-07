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
                    <div class="card">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 id="title" style="color: rgb(39, 80, 71); margin-top:1%; margin-bottom:1%">Kapasiti Kilang Biodiesel
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5> --}}
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="row" style="margin-top:-1%">
                                <div class="col-10 mr-auto ml-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="examplekap" class="table table-bordered">
                                                    <thead>
                                                        <tr style="background-color: #e9ecefbd; text-align:center">
                                                            {{-- <th>Bil.</th> --}}
                                                            <th>No. Lesen</th>
                                                            <th>Nama Pelesen</th>
                                                            <th>Bulan</th>
                                                            <th>Tahun</th>
                                                            <th>Kapasiti</th>
                                                            <th>Kemaskini</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr style="background-color: #e9ecefbd">
                                                            {{-- <th>Bil.</th> --}}
                                                            <th>No. Lesen</th>
                                                            <th>Nama Pelesen</th>
                                                            <th>Bulan</th>
                                                            <th>Tahun</th>
                                                            <th>Kapasiti</th>
                                                            <th>Kemaskini</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @foreach ($kapasiti as $key => $data)
                                                            @if ($data->pelesen)
                                                                {{-- <tr> --}}
                                                                    {{-- <td>{{ $data->e_nl }}</td>
                                                                    <td>{{ $data->pelesen->e_np }}</td> --}}
                                                                    {{-- <td> --}}
                                                                        {{-- @foreach ($data->e_nl as $nolesen) --}}
                                                                            {{-- <table> --}}
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>JANUARI</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->jan ?? 0,2) }}</td>
                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#jan{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>FEBRUARI</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->feb ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#feb{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>MAC</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->mac ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#mac{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>APRIL</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->apr ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#apr{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>MEI</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->mei ?? 0,2) }}</td>
                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#mei{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>JUN</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->jun ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#jun{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>JULAI</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->jul ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#jul{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>OGOS</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->ogs ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#ogs{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>SEPTEMBER</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->sept ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#sept{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>OKTOBER</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->okt ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#okt{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>NOVEMBER</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->nov ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#nov{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $data->e_nl }}</td>
                                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                                    <td>DISEMBER</td>
                                                                                    <td>{{ $data->tahun ?? '' }}</td>
                                                                                    <td>{{ number_format($data->dec ?? 0,2) }}</td>

                                                                                    <td>
                                                                                        <div class="icon" style="text-align: center">
                                                                                            <a href="#" type="button"
                                                                                                data-toggle="modal"
                                                                                                data-target="#dec{{ $key }}">
                                                                                                <i class="fas fa-edit fa-lg"
                                                                                                    style="color: #ffc107">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                            {{-- </table> --}}
                                                                        {{-- @endforeach --}}

                                                                    {{-- </td> --}}
                                                                    {{-- @if ($data->bulan == '01')
                                                                        <td>JANUARI</td>
                                                                    @elseif ($data->bulan == '02')
                                                                        <td>FEBRUARI</td>
                                                                    @elseif ($data->bulan == '03')
                                                                        <td>MAC</td>
                                                                    @elseif ($data->bulan == '04')
                                                                        <td>APRIL</td>
                                                                    @elseif ($data->bulan == '05')
                                                                        <td>MEI</td>
                                                                    @elseif ($data->bulan == '06')
                                                                        <td>JUN</td>
                                                                    @elseif ($data->bulan == '07')
                                                                        <td>JULAI</td>
                                                                    @elseif ($data->bulan == '08')
                                                                        <td>OGOS</td>
                                                                    @elseif ($data->bulan == '09')
                                                                        <td>SEPTEMBER</td>
                                                                    @elseif ($data->bulan == '10')
                                                                        <td>OKTOBER</td>
                                                                    @elseif ($data->bulan == '11')
                                                                        <td>NOVEMBER</td>
                                                                    @elseif ($data->bulan == '12')
                                                                        <td>DISEMBER</td>
                                                                    @else
                                                                        <td></td>
                                                                    @endif --}}
                                                                    {{-- <td>{{ $data->tahun ?? '' }}</td> --}}

                                                                {{-- </tr> --}}
                                                            @endif
                                                        @endforeach

                                                    </tbody>

                                                </table>


                                                <!-- JANUARI -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="jan{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.jan', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="JANUARI"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='jan'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->jan ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- FEBRUARI -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="feb{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.feb', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="FEBRUARI"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='feb'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->feb ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- MAC -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="mac{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.mac', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="MAC"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='mac'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->mac ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- APRIL -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="apr{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.apr', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="APRIL"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='apr'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->apr ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- MEI -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="mei{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.mei', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="MEI"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='mei'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->mei ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- JUN -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="jun{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.jun', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="JUN"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='jun'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->jun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                <!-- JULAI -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="jul{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.jul', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="JULAI"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='jul'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->jul ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                <!-- OGOS -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="ogs{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.ogs', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="OGOS"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='ogs'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->ogs ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                <!-- SEPTEMBER -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="sept{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.sept', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="SEPTEMBER"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='sept'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->sept ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                <!-- OKTOBER -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="okt{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.okt', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="OKTOBER"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='okt'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->okt ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                <!-- NOVEMBER -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="nov{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.nov', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="NOVEMBER"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='nov'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->nov ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                <!-- DISEMBER -->
                                                @foreach ($kapasiti as $key => $data)
                                                    <div class="modal fade bs-example-modal-lg"
                                                        id="dec{{ $key }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myLargeModalLabel">
                                                                        Kemaskini Maklumat Kapasiti</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.kapasiti.dec', $data->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row ml-auto" style="margin-top:-1%">
                                                                            <label for="fname"
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                                                                Premis
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Premis"
                                                                                    value="{{ $data->pelesen->e_np ?? '' }}"
                                                                                    readonly>

                                                                            </div>
                                                                        </div>
                                                                        @if ($data->pelesen->e_negeri ?? '' == '01')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="JOHOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '02')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KEDAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '03')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="KELANTAN"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '04')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="MELAKA"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '05')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="NEGERI SEMBILAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '06')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PAHANG"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '07')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '08')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="PERLIS"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '09')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="PULAU PINANG" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '10')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SELANGOR"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '11')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="TERENGGANU" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '12')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri"
                                                                                    value="WILAYAH PERSEKUTUAN" readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '13')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SABAH"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @elseif ($data->pelesen->e_negeri ?? '' == '14')
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="SARAWAK"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mt-2 ml-auto">
                                                                            <label
                                                                                class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                                                            </label>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Negeri" value="-"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <label class="control-label">Bulan</label>
                                                                                <input type="text" id="lastName"
                                                                                name="bulan"
                                                                                class="form-control form-control-danger"
                                                                                placeholder="Bulan" readonly
                                                                                value="DISEMBER"
                                                                                >
                                                                            </div>
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Tahun</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name="tahun"
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="Tahun" readonly
                                                                                        value="{{ $data->tahun ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-md-5 ml-auto">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="control-label">Kategori</label>
                                                                                    <input type="text" id="firstName"
                                                                                        class="form-control"
                                                                                        value='KILANG BIODIESEL' readonly>
                                                                                </div>
                                                                            </div>
                                                                            <!--/span-->
                                                                            <div class="col-md-5 mr-auto">
                                                                                <div class="form-group has-danger">
                                                                                    <label
                                                                                        class="control-label">Kapasiti</label>
                                                                                    <input type="text" id="lastName"
                                                                                        name='dec'
                                                                                        class="form-control form-control-danger"
                                                                                        placeholder="0.00"
                                                                                        value="{{ $data->dec ?? '' }}"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            {{-- <div class="col-12 mb-4 mt-4">
                                                <a href="{{ route('admin.kapasiti') }}" type="button"
                                                    class="btn btn-primary">Kembali</a>

                                                <button type="submit" class="btn btn-primary float-right"
                                                    data-toggle="modal" data-target="#next">Simpan</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    {{-- <script>
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
    </script> --}}

    <script>

        $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#examplekap tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });

        // DataTable
            var table = $('#examplekap').DataTable({

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
                        exportOptions: {
                            columns: [0,1,2,3,4]
                        },

                        filename: 'Kapasiti Kilang Biodiesel',



                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                        pageSize: 'TABLOID',
                        className: "prodpdf",

                           exportOptions: {
                                columns: [0,1,2,3,4]
                            },
                            title: function(doc) {
                                    return $('#title').text()
                                    },
                            customize: function (doc) {
                                let table = doc.content[1].table.body;
                                for (i = 1; i < table.length; i++) // skip table header row (i = 0)
                                {
                                    var test = table[i][0];
                                }

                            },
                            customize: function(doc) {
                            doc.content[1].table.body[0].forEach(function(h) {
                                h.fillColor = '#0a7569';

                            });
                            },

                        filename: 'Kapasiti Kilang Biodiesel',

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
@endsection
