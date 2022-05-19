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
            <div class="row mb-2">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Kemasukan Penyata Bulanan</h4>
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
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}


            <div class="card-body">
                <div class="pl-3">

                <form action="{{ route('bio.add.bahagian.iii') }}" method="post">
                    @csrf
                    <div class="mb-4 text-center">
                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                        <h3 style="color: rgb(39, 80, 71); ">Bahagian III</h3>
                        <h5 style="color: rgb(39, 80, 71)">Ringkasan Produk Biodiesel dan Glycerine
                        </h5>
                        {{-- <p>Maklumat Kilang</p> --}}
                    </div>
                    <hr>

                    <div class="container center mt-4" style="margin-left:4%">

                        <div class="row">
                            <div class="col-md-3">
                                <span class="required">Nama Produk dan Kod</span>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="ebio_c3" name="ebio_c3" style="width: 50%">
                                    <option selected hidden disabled>Sila Pilih</option>
                                    @foreach ($produk as $data)
                                        <option value="{{ $data->prodid }}">
                                            {{ $data->prodname }} - {{ $data->prodid }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('ebio_c3')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror

                            </div>
                            <div class="col-md-3">
                                <span class="required">Digunakan Untuk Proses Selanjutnya</span>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='ebio_c7' style="width:50%" id="ebio_c7" oninput="validate_two_decimal(this)"
                                onkeypress="return isNumberKey(event)" required>
                                @error('ebio_c7')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <span class="required">Stok Awal di Premis</span>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='ebio_c4' style="width:50%" oninput="validate_two_decimal(this)"
                                onkeypress="return isNumberKey(event)" id="ebio_c4"
                                    required title="Sila isikan butiran ini.">

                                @error('ebio_c4')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <span class="required">Jualan / Edaran Tempatan </span>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='ebio_c8' style="width:50%" id="ebio_c8"
                                    required oninput="validate_two_decimal(this)"
                                    onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini.">
                                <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                    style="font-size:11px; color:red" type="button" data-toggle="modal" data-target="#modal"
                                    &nbsp;> (Sila klik untuk
                                    mengisi<br> maklumat
                                    jualan)</i>

                                @error('ebio_c8')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <span class="required">Belian / Terimaan</span>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='ebio_c5' style="width:50%" id="ebio_c5" oninput="validate_two_decimal(this)"
                                onkeypress="return isNumberKey(event)"
                                    required title="Sila isikan butiran ini.">
                                    @error('ebio_c5')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <span class="required">Eksport </span>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='ebio_c9' style="width:50%" id="ebio_c9"
                                oninput="validate_two_decimal(this)"
                                onkeypress="return isNumberKey(event)"
                                required title="Sila isikan butiran ini.">

                                @error('ebio_c9')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <span class="required">Pengeluaran</span>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='ebio_c6' style="width:50%" id="ebio_c6"
                                oninput="validate_two_decimal(this)"
                                onkeypress="return isNumberKey(event)"
                                 required title="Sila isikan butiran ini.">
                                 @error('ebio_c6')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                            <div class="col-md-3">
                                <span class="required">Stok Akhir Dilapor</span>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='ebio_c10' style="width:50%" id="ebio_c10"
                                oninput="validate_two_decimal(this)"
                                onkeypress="return isNumberKey(event)"
                                required title="Sila isikan butiran ini.">
                                @error('ebio_c10')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                {{-- <input type="text" class="form-control" name='ebio_cc3' style="width:50%"> --}}
                                {{-- <input type="text" class="form-control" name='ebio_cc4' style="width:50%"> --}}
                                <table id="cc3_4"></table>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row form-group" style="padding-top: 10px; ">


                        <div class="row form-group" style="margin-left: 45%;">
                            <div class="text-right col-md-12 mb-4 ">
                                <button type="submit" class="btn btn-primary ">Tambah</button>
                            </div>
                        </div>

                </form>
                <section class="section">

                    <hr>
                    <br>

                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Minyak-Minyak Lain</h5>
                    <br>
                    {{-- <section class="section"> --}}
                    <div class="card">

                        {{-- <div class="card-body"> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size: 13px">
                                <thead style="text-align: center">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Kod Produk</th>
                                        <th>Stok Awal Di Premis</th>
                                        <th>Belian / Terimaan</th>
                                        <th>Pengeluaran</th>
                                        <th>Digunakan Untuk Proses Selanjutnya</th>
                                        <th>Jualan / Edaran Tempatan </th>
                                        <th>Eksport</th>
                                        <th>Stok Akhir Dilapor</th>
                                        <th>Kemaskini</th>
                                        <th>Hapus?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penyata as $key => $data)
                                        <tr style="text-align: right">
                                            {{-- <td class="text-center">{{ $key+1 }}</td> --}}
                                            <td style="text-align: left">{{ $data->produk->prodname }}
                                            </td>
                                            <td>{{ $data->produk->prodid }}</td>
                                            <td>{{ number_format($data->ebio_c4 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->ebio_c5 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->ebio_c7 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->ebio_c8 ?? 0, 2) }} &nbsp; <i
                                                    class="far fa-file-alt" style="color: blue; cursor: pointer;"
                                                    data-toggle="modal" data-target="#modal{{ $key }}"></i>
                                            </td>
                                            <td>{{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->ebio_c10 ?? 0, 2) }}</td>
                                            {{-- <td>{{ $data->e104_b13 }}</td> --}}
                                            {{-- <td>{{ $data->e104_b14 }}</td> --}}
                                            <td>
                                                <div class="icon" style="text-align: center">
                                                    <a href="#" type="button" data-toggle="modal"
                                                        data-target="#kemaskini{{ $data->ebio_c1 }}">
                                                        <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                        </i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="icon" style="text-align: center">
                                                    <a href="#" type="button" data-toggle="modal"
                                                        data-target="#next2{{ $data->ebio_c1 }}">
                                                        <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $data->e101_b15 }}</td> --}}


                                        </tr>

                                        <div class="col-md-6 col-12">

                                            <!--Kemaskini Maklumat Modal -->
                                            <div class="modal fade" id="kemaskini{{ $data->ebio_c1 }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                Kemaskini Maklumat Produk</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('bio.edit.bahagian.iii', [$data->ebio_c1]) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <label>Nama Produk </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c3'
                                                                            class="form-control"
                                                                            value="{{ $data->produk->prodname }}"
                                                                            readonly>
                                                                    </div>
                                                                    <label>Stok Awal Di Premis </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c4'
                                                                            class="form-control"
                                                                            value="{{ $data->ebio_c4 }}" oninput="validate_two_decimal(this)"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </div>
                                                                    <label>Belian / Terimaan
                                                                    </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c5'
                                                                            class="form-control"
                                                                            value="{{ $data->ebio_c5 }}" oninput="validate_two_decimal(this)"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </div>
                                                                    <label>Pengeluaran </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c6'
                                                                            class="form-control"
                                                                            value="{{ $data->ebio_c6 }}" oninput="validate_two_decimal(this)"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </div>
                                                                    {{-- <label>Import </label>
                                                                                                <div class="form-group">
                                                                                                    <input type="password" placeholder="Password"
                                                                                                        class="form-control">
                                                                                                </div> --}}
                                                                    <label>Digunakan Untuk Proses
                                                                        Selanjutnya </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c7'
                                                                            class="form-control"
                                                                            value="{{ $data->ebio_c7 }}" oninput="validate_two_decimal(this)"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </div>
                                                                    <label>Jualan / Edaran
                                                                        Tempatan</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c8'
                                                                            class="form-control"
                                                                            value="{{ $data->ebio_c8 }}" oninput="validate_two_decimal(this)"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </div>
                                                                    <label>Eksport
                                                                    </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c9'
                                                                            class="form-control"
                                                                            value="{{ $data->ebio_c9 }}" oninput="validate_two_decimal(this)"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </div>
                                                                    <label>Stok Akhir Dilapor </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='ebio_c10'
                                                                            class="form-control"
                                                                            value="{{ $data->ebio_c10 }}" oninput="validate_two_decimal(this)"
                                                                            onkeypress="return isNumberKey(event)">
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

                                        </div>




                                        <!-- Pengesahan Modal -->
                                        <div class="modal fade" id="next2{{ $data->ebio_c1 }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            PENGESAHAN</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Anda pasti mahu menghapus produk ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"
                                                                style="color:#275047">Tidak</span>
                                                        </button>
                                                        <a href="{{ route('bio.delete.bahagian.iii', [$data->ebio_c1]) }}"
                                                            type="button" class="btn btn-primary ml-1">

                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <tr>

                                        <td colspan="2"><b>JUMLAH</b></td>
                                        {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                        <td style="text-align: right">
                                            <b>{{ number_format($totaliiic4 ?? 0, 2) }}</b>
                                        </td>
                                        <td style="text-align: right">
                                            <b>{{ number_format($totaliiic5 ?? 0, 2) }}</b>
                                        </td>
                                        <td style="text-align: right">
                                            <b>{{ number_format($totaliiic6 ?? 0, 2) }}</b>
                                        </td>
                                        <td style="text-align: right">
                                            <b>{{ number_format($totaliiic7 ?? 0, 2) }}</b>
                                        </td>
                                        <td style="text-align: right">
                                            <b>{{ number_format($totaliiic8 ?? 0, 2) }}</b>
                                        </td>
                                        <td style="text-align: right">
                                            <b>{{ number_format($totaliiic9 ?? 0, 2) }}</b>
                                        </td>
                                        <td style="text-align: right">
                                            <b>{{ number_format($totaliiic10 ?? 0, 2) }}</b>
                                        </td>
                                        {{-- <td style="text-align: right"><b>{{ number_format($totaliab5 ??  0,2) }}</b></td>
                                                            <td style="text-align: right"><b>{{ number_format($totaliab5 ??  0,2) }}</b></td> --}}

                                        <td colspan="2"></td>
                                        {{-- <td></td> --}}

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- </div> --}}
                    </div>

                </section>

            </div>

            @foreach ($penyata as $key => $data)
            <!-- Senarai Syarikat Modals -->
                <div class="modal fade" id="modal{{ $key }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                    Senarai Syarikat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('bio.edit.bahagian.iii.sykt', $data->ebio_c1) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="font-size: 13px">
                                        <thead style="text-align: center">
                                            <tr>
                                                <th>Nama Syarikat</th>
                                                <th>Jumlah Jualan Edaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->ebiocc as $ebiocc_data)
                                                <tr style="text-align: right">
                                                    {{-- <td class="text-center">{{ $key+1 }}</td> --}}
                                                    <td><input type="text" id="ebio_cc3" class="form-control"
                                                            placeholder="Nama Syarikat" name="ebio_cc3[]"
                                                            value="{{ $ebiocc_data->ebio_cc3 ?? 0 }}">
                                                    </td>
                                                    <td><input type="text" id="ebio_cc4" class="form-control"
                                                            placeholder="Jumlah Jualan / Edaran" name="ebio_cc4[]"
                                                            value="{{ $ebiocc_data->ebio_cc4 ?? 0 }}"></td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block" style="color:#275047">Kembali</span>
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




            <div class="row form-group">


                <div class="text-left col-md-5">
                    <a href="{{ route('bio.bahagianii') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
                </div>
                <div class="text-right col-md-7">
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                        data-target="#next">Hantar Penyata</button>
                </div>

            </div>

            <!-- Pengesahan Modal -->
            <div class="modal fade" id="next" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                PENGESAHAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Anda pasti mahu menyimpan maklumat ini?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                            </button>
                            <a href="{{ route('bio.paparpenyata') }}" type="button" class="btn btn-primary ml-1">

                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ya</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Syarikat Input Modal -->
            <div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Maklumat Jualan / Edaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
                                <tr>
                                    <th>Nama Syarikat</th>
                                    <th>Jumlah Jualan / Edaran</th>
                                </tr>
                                <tr>
                                    <td><input type="text" id="new_syarikat[]" name='new_syarikat[]'></td>
                                    <td><input type="text" id="new_jumlah[]" name='new_jumlah[]'></td>
                                    <td><input type="button" class="add" onclick="add_row();"
                                            value="Tambah Maklumat">
                                    </td>
                                </tr>

                            </table>
                            </form>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                                <i class=" bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block" id="btnShow">Tambah</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- INPUT HIDDEN --}}
        <input type="hidden" name="jumlah_row[]">
        <input type="hidden" name="nama_syarikat[]">
        </form>

    </div>


    </div>

    </div>
    </div>
@endsection
@section('scripts')
    <script>
        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

    <script type="text/javascript" src="{{ asset('js/table_scripts.js') }}""></script>

    <script>
        function add_row() {
            var new_syarikat = document.getElementById("new_syarikat[]").value;
            var new_jumlah = document.getElementById("new_jumlah[]").value;

            var table = document.getElementById("data_table");
            var table_len = (table.rows.length) - 1;
            var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td id='syarikat_row" +
                table_len + "'>" + new_syarikat + "</td><td id='jumlah_row" + table_len + "'>" + new_jumlah +
                "</td><td><input type='hidden' id='jumlah_row" + table_len +
                "' name='jumlah_row_hidden[]' value=" + new_jumlah +
                "> <input type='button' value='Hapus' class='delete' onclick='delete_row(" + table_len + ")'></td></tr>";

            var table_input = document.getElementById("cc3_4");
            var table_input_len = (table_input.rows.length);
            var row_input = table_input.insertRow(table_input_len).outerHTML =
                "<tr id='row_input" + table_input_len + "'><td><input type='hidden' id='jumlah_row_hidden" +
                table_input_len +
                "' name='jumlah_row_hidden[]' value=" + new_jumlah +
                "><input type='hidden' id='new_syarikat_hidden" + table_input_len +
                "' name='new_syarikat_hidden[]' value=" + new_syarikat +
                "></td></tr>";

            document.getElementById("new_syarikat[]").value = "";
            document.getElementById("new_jumlah[]").value = "";
        }

        function delete_row(no) {
            document.getElementById("row" + no + "").outerHTML = "";
            // document.getElementById("row_input" + no + "").outerHTML = "";

            document.getElementById("jumlah_row_hidden" + (no - 1)).value = "";
            document.getElementById("new_syarikat_hidden" + (no - 1)).value = "";
        }
    </script>
@endsection
