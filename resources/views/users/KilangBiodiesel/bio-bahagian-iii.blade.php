@extends('layouts.main')

<style>
    .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>

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
                    <h4 class="page-title">Kemasukan Penyata Bulanan
                        @if ($bulan == 1)
                            JANUARI
                        @elseif($bulan == 2)
                            FEBRUARI
                        @elseif($bulan == 3)
                            MAC
                        @elseif($bulan == 4)
                            APRIL
                        @elseif($bulan == 5)
                            MEI
                        @elseif($bulan == 6)
                            JUN
                        @elseif($bulan == 7)
                            JULAI
                        @elseif($bulan == 8)
                            OGOS
                        @elseif($bulan == 9)
                            SEPTEMBER
                        @elseif($bulan == 10)
                            OKTOBER
                        @elseif($bulan == 11)
                            NOVEMBER
                        @elseif($bulan == 12)
                            DISEMBER
                        @endif {{ $tahun }}
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
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}


            <div class="card-body">
                <div class="">

                    <form action="{{ route('bio.add.bahagian.iii') }}" method="post" class="sub-form">
                        @csrf
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 3</h3>
                            <h5 style="color: rgb(39, 80, 71)">Ringkasan Produk Biodiesel dan Glycerine
                            </h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>

                        <div class="container center mt-4">

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk dan Kod</span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <select class="form-control select2" id="ebio_c3" name="ebio_c3" required
                                        onchange="showDetail()"
                                        oninvalid="this.setCustomValidity('Sila buat pilihan dibahagian ini')"
                                        oninput="this.setCustomValidity('')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('ebio_c3')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c4' style="width:100%"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')"
                                        onkeypress="return isNumberKey(event)" id="ebio_c4" required onkeyup="FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">

                                    @error('ebio_c4')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian / Terimaan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c5' style="width:100%"
                                        id="ebio_c5" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity('');validate_two_decimal('')"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)" title="Sila isikan butiran ini.">
                                    @error('ebio_c5')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Pengeluaran</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c6' style="width:100%"
                                        id="ebio_c6" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity('');validate_two_decimal('')"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)" title="Sila isikan butiran ini.">
                                    @error('ebio_c6')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Digunakan Untuk Proses Selanjutnya</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c7' style="width:100%"
                                        id="ebio_c7" oninput="this.validate_two_decimal('');this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)">
                                    @error('ebio_c7')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan / Edaran Tempatan </span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c8' style="width:100%; display:inline"
                                        id="ebio_c8" required onkeyup="FormatCurrency(this)" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity('');validate_two_decimal('')"
                                        onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini.">&nbsp;

                                    <div id="merah_container" style="display:none" class="blink_me">
                                        <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                            style="font-size:11px; color:red" type="button" data-toggle="modal"
                                            data-target="#modal" &nbsp;> (Sila klik untuk
                                            mengisi<br> maklumat
                                            jualan) </i>
                                    </div>
                                    @error('ebio_c8')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Eksport </span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c9' style="width:100%"
                                        id="ebio_c9" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity('');validate_two_decimal('')"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)" title="Sila isikan butiran ini.">

                                    <div id="merah_container" style="display:none">
                                        <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                            style="font-size:11px; color:red" type="button" data-toggle="modal" data-target="#modal"
                                            &nbsp;> (Sila klik untuk
                                            mengisi<br> maklumat
                                            jualan)</i>
                                    </div>
                                    @error('ebio_c8')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir Dilapor</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c10' style="width:100%"
                                        id="ebio_c10" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity('');validate_two_decimal('')"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)" title="Sila isikan butiran ini.">
                                    @error('ebio_c10')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    {{-- <input type="text" class="form-control" name='ebio_cc3' style="width:70%"> --}}
                                    {{-- <input type="text" class="form-control" name='ebio_cc4' style="width:70%"> --}}
                                    <table id="cc3_4"></table>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row justify-content-center form-group" style="margin: 3%;">
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>

                    </form>
                    <section class="section">

                        <hr>
                        <br>

                        <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Ringkasan Produk Biodiesel dan
                            Glycerine</h5>
                        <br>
                        {{-- <section class="section"> --}}
                        <div class="card">

                            {{-- <div class="card-body"> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size: 13px">
                                    <thead style="text-align: center">
                                        <tr style="vertical-align: middle">
                                            <th style="vertical-align: middle">Nama Produk</th>
                                            <th style="vertical-align: middle">Kod Produk</th>
                                            <th style="vertical-align: middle">Stok Awal Di Premis</th>
                                            <th style="vertical-align: middle">Belian / Terimaan</th>
                                            <th style="vertical-align: middle">Pengeluaran</th>
                                            <th style="vertical-align: middle">Digunakan Untuk Proses Selanjutnya</th>
                                            <th style="vertical-align: middle">Jualan / Edaran Tempatan </th>
                                            <th style="vertical-align: middle">Eksport</th>
                                            <th style="vertical-align: middle">Stok Akhir Dilapor</th>
                                            <th style="vertical-align: middle">Kemaskini</th>
                                            <th style="vertical-align: middle">Hapus?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penyata as $key => $data)
                                            <tr style="text-align: right">
                                                {{-- <td class="text-center">{{ $key+1 }}</td> --}}
                                                <td style="text-align: left">{{ $data->produk->proddesc }}
                                                </td>
                                                <td style="text-align: center">{{ $data->produk->prodid }}</td>
                                                <td>{{ number_format($data->ebio_c4 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->ebio_c5 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->ebio_c7 ?? 0, 2) }}</td>
                                                @if ($data->produk->prodid == 'AW')
                                                    <td> {{ number_format($data->ebio_c8 ?? 0, 2) }} &nbsp;
                                                        {{-- <a href="{{ route('bio.maklumat.jualan', $data->e_id) }}"> --}}
                                                               <i class="far fa-file-alt" style="color: blue; cursor: pointer;" data-toggle="modal" data-target="#modal{{ $key }}"></i></a>
                                                    </td>
                                                @else
                                                    <td>{{ number_format($data->ebio_c8 ?? 0, 2) }}</td>
                                                @endif
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
                                                            <i class="fa fa-trash"
                                                                style="color: #dc3545;font-size:18px"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                {{-- <td>{{ $data->e101_b15 }}</td> --}}


                                            </tr>

                                            <div class="col-md-6 col-12">

                                                <!--Kemaskini Maklumat Modal -->
                                                <div class="modal fade" id="kemaskini{{ $data->ebio_c1 }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                                                                                value="{{ $data->produk->proddesc }}"
                                                                                readonly>
                                                                        </div>
                                                                        <label>Stok Awal Di Premis </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='ebio_c4'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_c4 }}"
                                                                                oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Belian / Terimaan
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='ebio_c5'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_c5 }}"
                                                                                oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Pengeluaran </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='ebio_c6'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_c6 }}"
                                                                                oninput="validate_two_decimal(this)"
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
                                                                                value="{{ $data->ebio_c7 }}"
                                                                                oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Jualan / Edaran
                                                                            Tempatan</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='ebio_c8'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_c8 }}"
                                                                                oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Eksport
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='ebio_c9'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_c9 }}"
                                                                                oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Stok Akhir Dilapor </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='ebio_c10'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_c10 }}"
                                                                                oninput="validate_two_decimal(this)"
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
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
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
                                                            <button type="button" class="btn btn-primary ml-1"
                                                                data-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Tidak</span>
                                                            </button>
                                                            <a href="{{ route('bio.delete.bahagian.iii', [$data->ebio_c1]) }}"
                                                                type="button" class="btn btn-light-secondary"
                                                                style="color: #275047; background-color: #a1929238">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
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

                {{-- @foreach ($penyata as $key => $data) --}}
                {{-- <!-- Senarai Syarikat Modals -->
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
                {{-- <td><input type="text" id="ebio_cc3" class="form-control"
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
            @endforeach --}}


                <!-- Kemaskini Syarikat Input Modal -->
                @foreach ($penyata as $key => $data)
                    <div class="modal fade bs-example-modal-lg" id="modal{{ $key }}" tabindex="-1"
                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Maklumat Jualan / Edaran</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                </div>
                                <form action="{{ route('bio.edit.bahagian.iii.sykt', $data->ebio_c1) }}"
                                    method="post">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered" style="font-size: 13px"
                                                id="data_table{{ $key }}">
                                                <thead style="text-align: center">
                                                    <tr style="vertical-align: middle">
                                                        <th style="vertical-align: middle; ">Nama Syarikat</th>
                                                        <th style="vertical-align: middle;">Jumlah Jualan / Edaran</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data->ebiocc as $ebiocc_data)
                                                        <tr>

                                                            <td><input type="text" id="ebio_cc3" class="form-control"
                                                                    placeholder="Nama Syarikat" name="ebio_cc3[]"
                                                                    value="{{ $ebiocc_data->ebio_cc3 ?? 0 }}" readonly></td>
                                                            {{-- <div class="modal-body">
                                                <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
                                                    <tr>
                                                        <th>Nama Syarikat</th>
                                                        <th>Jumlah Jualan / Edaran</th>
                                                    </tr>
                                                    <td><input type="text" id="new_syarikat[]" name='new_syarikat[]'></td> --}}
                                                    <td><input type="text" id="ebio_cc4" class="form-control"
                                                        placeholder="Jumlah Jualan / Edaran" name="ebio_cc4[]"
                                                        value="{{ $ebiocc_data->ebio_cc4 ?? 0 }}"></td>


                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        {{-- @endforeach --}}
                                                        <td><input type="text" id="new_syarikat{{ $key }}[]"
                                                                name='new_syarikat{{ $key }}[]'></td>
                                                        <td><input type="text" id="new_jumlah{{ $key }}[]"
                                                                name='new_jumlah{{ $key }}[]'></td>
                                                        <td><input type="button" class="add"
                                                                onclick="add_row1({{ $key }});" value="Tambah Maklumat">
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                            


                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Batal</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class=" bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Kemaskini</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="text-right col-md-7">
                <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                    data-target="#123">cuba</button>
            </div> --}}

                <div class="form-group">
                    <a href="{{ route('bio.bahagianii') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                        data-target="#next">Hantar Penyata</button>
                </div>

                <!-- Pengesahan Modal -->
                <div class="modal fade" id="next" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="font-size: 13px" id="data_table">
                                        <thead style="text-align: center">
                                            <tr style="vertical-align: middle">
                                                <th style="vertical-align: middle; width:70%">Nama Syarikat</th>
                                                <th style="vertical-align: middle;">Jumlah Jualan / Edaran</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><select class="form-control select2 " id="new_syarikat[]"
                                                        name="new_syarikat[]" required onchange="showDetail()"
                                                        oninvalid="this.setCustomValidity('Sila buat pilihan dibahagian ini')"
                                                        oninput="this.setCustomValidity(''); validate_two_decimal('')">
                                                        <option selected hidden disabled value="">Sila Pilih</option>
                                                        @foreach ($syarikat as $data)
                                                            <option value="{{ $data->id }}">
                                                                {{ $data->pembeli }}
                                                            </option>
                                                        @endforeach

                                                    </select></td>
                                                {{-- <div class="modal-body">
                                <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
                                    <tr>
                                        <th>Nama Syarikat</th>
                                        <th>Jumlah Jualan / Edaran</th>
                                    </tr>
                                    <td><input type="text" id="new_syarikat[]" name='new_syarikat[]'></td> --}}
                                                <td><input type="text" id="new_jumlah[]" name='new_jumlah[]'></td>
                                                <td style="size: 10ch"><input type="button" class="add"
                                                        onclick="add_row();" value="Tambah Maklumat">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


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
            {{-- INPUT HIDDEN2 --}}
            <input type="hidden" name="jumlah_row1[]">
            <input type="hidden" name="nama_syarikat1[]">
            </form>
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
                    var nama_syarikat = document.getElementById("new_syarikat[]").options[document.getElementById("new_syarikat[]").selectedIndex].text;
                    var table = document.getElementById("data_table");
                    var table_len = (table.rows.length) - 1;
                    var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td id='syarikat_row" +
                        table_len + "'>" + nama_syarikat + "</td><td id='jumlah_row" + table_len + "'>" + new_jumlah +
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

            <script>
                function add_row1(key) {
                    console.log("new_syarikat" + key + "[]");
                    var new_syarikat1 = document.getElementById("new_syarikat" + key + "[]").value;
                    var new_jumlah1 = document.getElementById("new_jumlah" + key + "[]").value;

                    var table1 = document.getElementById("data_table" + key);
                    var table_len1 = (table1.rows.length) - 1;
                    var row1 = table1.insertRow(table_len1).outerHTML = "<tr id='row" + key + table_len1 +
                        "'><td id='syarikat_row" + key +
                        table_len1 + "'>" + new_syarikat1 + "</td><td id='jumlah_row" + key + table_len1 + "'>" + new_jumlah1 +
                        "</td><td><input type='hidden' id='jumlah_row" + key + table_len1 +
                        "' name='jumlah_row_hidden" + key + "[]' value=" + new_jumlah1 +
                        "> <input type='button' value='Hapus' class='delete' onclick='delete_row1(" + table_len1 + ")'></td></tr>";

                    var table_input1 = document.getElementById("cc3_4");
                    var table_input_len1 = (table_input1.rows.length);
                    var row_input1 = table_input1.insertRow(table_input_len1).outerHTML =
                        "<tr id='row_input" + key + table_input_len1 + "'><td><input type='hidden' id='jumlah_row_hidden" + key +
                        table_input_len1 +
                        "' name='jumlah_row_hidden" + key + "[]' value=" + new_jumlah1 +
                        "><input type='hidden' id='new_syarikat_hidden" + key + table_input_len1 +
                        "' name='new_syarikat_hidden" + key + "[]' value=" + new_syarikat1 +
                        "></td></tr>";

                    document.getElementById("new_syarikat" + key + "[]").value = "";
                    document.getElementById("new_jumlah" + key + "[]").value = "";
                }

                function delete_row1(no) {
                    document.getElementById("row" + key + "").outerHTML = "";
                    // document.getElementById("row_input" + no + "").outerHTML = "";

                    document.getElementById("jumlah_row_hidden1" + (no - 1)).value = "";
                    document.getElementById("new_syarikat_hidden1" + (no - 1)).value = "";
                }
            </script>
            <script type="text/javascript">
                function showDetail() {
                    var produk = $('#ebio_c3').val();
                    // console.log(oer);

                    if (produk == "AW") {
                        document.getElementById('merah_container').style.display = "block";
                        document.getElementById('lain_container').style.display = "block";
                    } else {
                        document.getElementById('merah_container').style.display = "none";
                        document.getElementById('lain_container').style.display = "block";

                    }

                }
            </script>
            <script>
                document.addEventListener('keypress', function (e) {
                    if (e.keyCode === 13 || e.which === 13) {
                        e.preventDefault();
                        return false;
                    }

                });

            </script>
            <script language="javascript" type="text/javascript">
                function FormatCurrency(ctrl) {
                    //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
                    if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                        return;
                    }

                    var val = ctrl.value;

                    val = val.replace(/,/g, "")
                    ctrl.value = "";
                    val += '';
                    x = val.split('.');
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';

                    var rgx = /(\d+)(\d{3})/;

                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                    }

                    ctrl.value = x1 + x2;
                }
            </script>
            <script>
                $('.sub-form').submit(function() {

                    var x = $('#ebio_c4').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#ebio_c4').val(x);

                    var x = $('#ebio_c5').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#ebio_c5').val(x);

                    var x = $('#ebio_c6').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#ebio_c6').val(x);

                    var x = $('#ebio_c7').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#ebio_c7').val(x);

                    var x = $('#ebio_c8').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#ebio_c8').val(x);

                    var x = $('#ebio_c9').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#ebio_c9').val(x);

                    var x = $('#ebio_c10').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#ebio_c10').val(x);

                    return true;

                });
            </script>
        @endsection
