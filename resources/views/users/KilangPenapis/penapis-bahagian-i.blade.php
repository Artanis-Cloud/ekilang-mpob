@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
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
            <form action="{{ route('penapis.add.bahagian.i') }}" method="post" class="sub-form">
                @csrf
                <div class="card-body">
                    <div class="" style="padding: 2%">
                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 1</h3>
                            <h5 style="color: rgb(39, 80, 71)">Produk Minyak Sawit
                            </h5>
                        </div>
                        <hr>

                        <div class="container center mt-4">

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk dan Kod </span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <select class="form-control" id="produk" name="e101_b4" style="width: 100%" required
                                        oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    {{-- @error('e101_b4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror --}}
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal Di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b5' style="width: 100%"
                                        id="e101_b5" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onchange="b5(); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b5()">
                                    @error('e101_b5')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal Di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b6' style="width: 100%"
                                        id="e101_b6" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onchange="b6(); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b6()">
                                    @error('e101_b6')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class=""> Belian/Terimaan</span>
                                    <i class="fa fa-exclamation-circle" style="color: red"
                                        title="Sekiranya ada maklumat import, sila campurkan (+) dengan maklumat Belian/Terimaan.">
                                    </i>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b7' style="width: 100%"
                                        id="e101_b7" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onchange="b7(); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b7()">
                                    @error('e101_b7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span>Import</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b8' style="width: 100%"
                                        id="e101_b8" title="Sila isikan butiran ini." readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Pengeluaran</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b9' style="width: 100%"
                                        id="e101_b9" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onchange="b9(); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b9()">
                                    @error('e101_b9')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Digunakan Untuk Proses Selanjutnya</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b10' style="width: 100%"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e101_b10" required
                                        onkeypress="return isNumberKey(event)" onchange="b10(); FormatCurrency(this)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b10()"
                                        title="Sila isikan butiran ini.">
                                    @error('e101_b10')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan/Edaran Tempatan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b11' style="width: 100%"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e101_b11" required
                                        onkeypress="return isNumberKey(event)" onchange="b11(); FormatCurrency(this)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b11()"
                                        title="Sila isikan butiran ini.">
                                    @error('e101_b11')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Eksport</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b12' style="width: 100%"
                                        onchange="b12(); FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e101_b12" required
                                        onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b12()">
                                    @error('e101_b12')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir Di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b13' style="width: 100%"
                                        onchange="b13(); FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e101_b13" required
                                        onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b13()">
                                    @error('e101_b13')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir Di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b14' style="width: 100%"
                                        onchange="b14(); FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e101_b14" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b14()"
                                        title="Sila isikan butiran ini.">
                                    @error('e101_b14')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center form-group" style="margin: 2%">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                        <input type="hidden" name="hidDelete" id="hidDelete" value="" />

            </form>

            <hr>
            <br>
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:-3%; margin-bottom:3%">Senarai Produk Minyak
                Sawit</h5>

            <section class="section">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="cuba" style="font-size: 13px">
                            <thead style="text-align: center">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Kod Produk</th>
                                    <th>Stok Awal Di Premis</th>
                                    <th>Stok Awal Di Pusat Simpanan</th>
                                    <th>Belian/<br>Terimaan</th>
                                    <th>Import</th>
                                    <th>Pengeluaran</th>
                                    <th>Digunakan Untuk Proses Selanjutnya</th>
                                    <th>Jualan/Edaran Tempatan</th>
                                    <th>Eksport</th>
                                    <th>Stok Akhir Di Premis</th>
                                    <th>Stok Akhir Di Pusat Simpanan</th>
                                    <th>Kemaskini</th>
                                    <th>Hapus?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyata as $data)
                                    <tr style="text-align: right">

                                        <td style="text-align: left">
                                            {{ $data->produk->proddesc }}
                                        </td>
                                        <td>
                                            {{ $data->produk->prodid }}
                                        </td>
                                        <td>{{ number_format($data->e101_b5 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b6 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b7 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b8 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b9 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b10 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b11 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b12 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b13 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b14 ?? 0, 2) }}</td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e101_b1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e101_b1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e101_b1 }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                            Kemaskini Maklumat Produk</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('penapis.edit.bahagian.i', [$data->e101_b1]) }}"
                                                            class="sub-form" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label>Nama Produk</label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b4'
                                                                        class="form-control"
                                                                        value="{{ $data->produk->proddesc }}" readonly>
                                                                </div>
                                                                <label class="required">Stok Awal Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b5' id="e101_eb5"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        onchange="eb5(); FormatCurrency(this)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb5()"
                                                                        value="{{ old('e101_b5') ?? number_format($data->e101_b5, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label class="required">Stok Awal Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b6'
                                                                        onchange="eb6(); FormatCurrency(this)"
                                                                        id="e101_eb6"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb6()"
                                                                        value="{{ number_format($data->e101_b6, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label class="required">Belian/Terimaan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b7'
                                                                        onchange="eb7(); FormatCurrency(this)"
                                                                        id="e101_eb7"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb7()"
                                                                        value="{{ old('e101_b7') ?? number_format($data->e101_b7, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label>Import </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b8'
                                                                        class="form-control"
                                                                        value="{{ old('e101_b8') ?? $data->e101_b8 }}"
                                                                        readonly>
                                                                </div>
                                                                <label class="required">Pengeluaran </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b9'
                                                                        onchange="eb9(); FormatCurrency(this)"
                                                                        id="e101_eb9"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb9()"
                                                                        value="{{ old('e101_b9') ?? number_format($data->e101_b9, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label class="required">Digunakan Untuk Proses
                                                                    Selanjutnya</label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b10'
                                                                        onchange="eb10(); FormatCurrency(this)"
                                                                        id="e101_eb10"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb10()"
                                                                        value="{{ old('e101_b10') ?? number_format($data->e101_b10, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label class="required">Jualan/Edaran Dalam Negeri
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b11'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        onchange="eb11(); FormatCurrency(this)"
                                                                        id="e101_eb11" class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb11()"
                                                                        value="{{ old('e101_b11') ?? number_format($data->e101_b11, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label class="required">Eksport </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b12'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        id="e101_eb12"
                                                                        onchange="eb12(); FormatCurrency(this)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb12()"
                                                                        value="{{ old('e101_b12') ?? number_format($data->e101_b12, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label class="required">Stok Akhir Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b13'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        id="e101_eb13"
                                                                        onchange="eb13(); FormatCurrency(this)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini(); invoke_eb13()"
                                                                        value="{{ old('e101_b13') ?? number_format($data->e101_b13, 2) }}"
                                                                        required>
                                                                </div>
                                                                <label class="required">Stok Akhir Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b14'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        id="e101_eb14"
                                                                        onchange="eb14(); FormatCurrency(this)"
                                                                        class="form-control"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini()"
                                                                        value="{{ old('e101_b14') ?? number_format($data->e101_b14, 2) }}"
                                                                        required>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1" disabled
                                                            id="kemaskini">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal fade" id="next2{{ $data->e101_b1 }}" tabindex="-1"
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
                                                        Anda pasti mahu menghapus maklumat ini?
                                                    </p>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary ml-1"
                                                        data-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tidak</span>
                                                    </button>
                                                    <a href="{{ route('penapis.delete.bahagiani', [$data->e101_b1]) }}"
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
                                    <td style="text-align: right"><b>{{ number_format($total ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total2 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total3 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total4 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total5 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total6 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total7 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total8 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total9 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total10 ?? 0, 2) }}</b></td>

                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>
                            </tbody>
                        </table>
                    </div>





                </div>

                <div class=" row form-group" style="padding-top: 10px; ">


                    <div class="text-left col-md-5">
                        {{-- <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary" style="float: left">Sebelumnya</a> --}}
                    </div>
                    <div class="text-right col-md-7">
                        <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                            data-target="#next">Simpan &
                            Seterusnya</button>
                    </div>

                </div>

                <!-- Vertically Centered modal Modal -->
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
                                <a href="{{ route('penapis.bahagianii') }}" type="button" class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    {{-- </form> --}}

    {{-- </div> --}}
@endsection
@section('scripts')
    <script>
        function invoke_b5() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b6').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_b6() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b7').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_b7() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b9').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_b9() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b10').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_b10() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b11').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_b11() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b12').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_b12() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b13').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_b13() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_b14').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb5() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb6').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb6() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb7').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb7() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb9').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb9() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb10').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb10() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb11').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb11() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb12').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb12() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb13').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invoke_eb13() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb14').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>

    <script>
        function eb5() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb5").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb5").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb6() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb6").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb6").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb7() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb7").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb7").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb9() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb9").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb9").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb10() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb10").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb10").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb11() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb11").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb11").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb12() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb12").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb12").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb13() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb13").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb13").value = y;
            console.log(y);
        }
    </script>
    <script>
        function eb14() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_eb14").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_eb14").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b5() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b5").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b5").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b6() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b6").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b6").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b7() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b7").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b7").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b9() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b9").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b9").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b10() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b10").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b10").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b11() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b11").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b11").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b12() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b12").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b12").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b13() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b13").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b13").value = y;
            console.log(y);
        }
    </script>
    <script>
        function b14() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e101_b14").value);
            if (isNaN(x)) {
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e101_b14").value = y;
            console.log(y);
        }
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

            var x = $('#e101_b5').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b5').val(x);

            var x = $('#e101_b6').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b6').val(x);

            var x = $('#e101_b7').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b7').val(x);


            var x = $('#e101_b9').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b9').val(x);


            var x = $('#e101_b10').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b10').val(x);

            var x = $('#e101_b11').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b11').val(x);

            var x = $('#e101_b12').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b12').val(x);


            var x = $('#e101_b13').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b13').val(x);


            var x = $('#e101_b14').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e101_b14').val(x);



            return true;

        });
    </script>

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(".floatNumberField").change(function() {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            });
        });
    </script>
    <script>
        document.addEventListener('keypress', function(e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>

    <script>
        function enableKemaskini() {
            $('#kemaskini').prop("disabled", false);
        }
    </script>
@endsection
