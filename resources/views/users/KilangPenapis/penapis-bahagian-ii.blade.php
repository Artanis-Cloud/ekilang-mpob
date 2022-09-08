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
                    {{-- <h4 class="page-title">Kemasukan Penyata Bulanan
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
                    </h4> --}}
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
            <p style="text-align: center; vertical-align:middle; font-size: 20px">

                <b>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4
                <br>

            BULAN :&nbsp;&nbsp;
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
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                </b>
            </p>
        </div>
        <div class="card" style="margin-right:2%; margin-left:2%">
            <form action="{{ route('penapis.add.bahagian.ii') }}" method="post" class="sub-form" novalidate
            >
                @csrf
                <div class="card-body">
                    <div style="padding: 2%">

                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%">Bahagian 2</h3>
                            <h5 style="color: rgb(39, 80, 71)">Produk Minyak Isirung Sawit
                            </h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>
                        <div class="mb-2 col-8" style="text-align: left">
                            <p><i>Nota: Sila isikan butiran dibawah dalam tan metrik dan tekan butang ‘Simpan & Seterusnya’</i></p>
                        </div>
                        <div class="container center mt-4">


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk dan Kod</span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <select class="form-control select2" id="produk" required name="e101_b4"
                                        oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodid }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <p type="hidden" id="err_produk" style="color: red; display:none"><i>Sila buat pilihan
                                        di
                                        bahagian ini!</i></p>
                                    @error('e101_b4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal Di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b5' style="width:100%"
                                        id="e101_b5" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b5()""
                                        title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)">
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
                                    <input type="text" class="form-control" name='e101_b6' style="width:100%"
                                        id="e101_b6" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b6()""
                                        title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)">
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
                                    <input type="text" class="form-control" name='e101_b7' style="width:100%"
                                        id="e101_b7" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b7()""
                                        title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)">
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
                                    <input type="text" class="form-control" name='e101_b8' style="width:100%"
                                        id="e101_b8" title="Sila isikan butiran ini." readonly>
                                    @error('e101_b8')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Pengeluaran</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b9' style="width:100%"
                                        id="e101_b9" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b9()""
                                        title="Sila isikan butiran ini."
                                        onchange="autodecimal(this); FormatCurrency(this)">
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
                                    <input type="text" class="form-control" name='e101_b10' style="width:100%"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b10()" id="e101_b10" required
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        onchange="autodecimal(this); FormatCurrency(this)">
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
                                    <input type="text" class="form-control" name='e101_b11' style="width:100%"
                                        id="e101_b11" required onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b11()"
                                        onchange="autodecimal(this); FormatCurrency(this)"
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
                                    <input type="text" class="form-control" name='e101_b12' style="width:100%"
                                        id="e101_b12" required onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b12()"
                                        onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
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
                                    <input type="text" class="form-control" name='e101_b13' style="width:100%"
                                        id="e101_b13" required onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b13()"
                                        onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
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
                                    <input type="text" class="form-control" name='e101_b14' style="width:100%"
                                        id="e101_b14" required onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
                                    @error('e101_b14')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                        </div>


                        <div class="row justify-content-center form-group" style="margin-top: 2%; ">
                            <button type="submit" class="btn btn-primary" id="checkBtn" onclick="check()">Tambah</button>
                        </div>

                    </div>
            </form>

            <hr>
            <br>
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:-3%; margin-bottom:3%">Senarai Produk Minyak
                Isirung Sawit</h5>

            <section class="section">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="font-size: 13px">
                            <thead style="text-align: center">
                                <tr style="text-align: center; background-color: #d3d3d34d">
                                    <th style="vertical-align: middle">Nama Produk</th>
                                    <th style="vertical-align: middle">Kod Produk</th>
                                    <th style="vertical-align: middle">Stok Awal Di Premis</th>
                                    <th style="vertical-align: middle">Stok Awal Di Pusat Simpanan</th>
                                    <th style="vertical-align: middle">Belian/<br>Terimaan</th>
                                    <th style="vertical-align: middle">Import</th>
                                    <th style="vertical-align: middle">Pengeluaran</th>
                                    <th style="vertical-align: middle">Digunakan Untuk Proses Selanjutnya</th>
                                    <th style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                    <th style="vertical-align: middle">Eksport</th>
                                    <th style="vertical-align: middle">Stok Akhir Di Premis</th>
                                    <th style="vertical-align: middle">Stok Akhir Di Pusat Simpanan</th>
                                    <th style="vertical-align: middle">Kemaskini</th>
                                    <th style="vertical-align: middle">Hapus?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($b && !$b->isEmpty())
                                @foreach ($b as $data)
                                    <tr style="text-align: right">

                                        <td style="text-align: left">
                                            {{ $data->produk->proddesc }}
                                            {{-- @if ($penyata->e101b->e101_b4 == $produk->prodid)
                                                                <span>{{ $produk->prodname }}</span>
                                                            @endif --}}

                                        </td>
                                        <td>
                                            {{ $data->produk->prodid }}
                                            {{-- @if ($penyata->e101b->e101_b4 == $produk->prodid)
                                                                <span>{{ $produk->prodname }}</span>
                                                            @endif --}}

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
                                                    data-target="#exampleModalCenter2{{ $data->e101_b1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>

                                                </a>


                                            </div>

                                        </td>
                                        {{-- <td>{{ $data->e101_b15 }}</td> --}}


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
                                                            action="{{ route('penapis.edit.bahagian.ii', [$data->e101_b1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Nama Produk </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b4'
                                                                        class="form-control"
                                                                        value="{{ $data->produk->proddesc }}" readonly>
                                                                </div>
                                                                <label class="required">Stok Awal Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b5' id="e101_eb5{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event);"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }});invoke_eb5({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b5 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Stok Awal Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b6' id="e101_eb6{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }});invoke_eb6({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b6 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Belian/Terimaan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b7' id="e101_eb7{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }});invoke_eb7({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b7 ,2) }}" required>
                                                                </div>
                                                                <label>Import </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b8'
                                                                        class="form-control"
                                                                        value="{{ $data->e101_b8 }}" readonly>
                                                                </div>
                                                                <label class="required">Pengeluaran </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b9' id="e101_eb9{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }});invoke_eb9({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b9 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Digunakan Untuk Proses
                                                                    Selanjutnya</label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b10' id="e101_eb10{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }});invoke_eb10({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b10 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Jualan/Edaran Dalam Negeri </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b11' id="e101_eb11{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }});invoke_eb11({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b11 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Eksport </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b12' id="e101_eb12{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }});invoke_eb12({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b12 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Stok Akhir Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b13' id="e101_eb13{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity(''); enableKemaskini({{ $data->e101_b1 }}); invoke_eb13({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b13 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Stok Akhir Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b14' id="e101_eb14{{ $data->e101_b1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity('');enableKemaskini({{ $data->e101_b1 }}); invoke_eb14({{ $data->e101_b1 }})"
                                                                        value="{{ number_format($data->e101_b14 ,2) }}" required>
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
                                                            id="kemaskini{{ $data->e101_b1 }}">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal fade" id="exampleModalCenter2{{ $data->e101_b1 }}" tabindex="-1"
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
                                                    <a href="{{ route('penapis.delete.bahagianii', [$data->e101_b1]) }}"
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
                                @else
                                    <tr>
                                    <td colspan="14" class="text-center" style="height:40px">Tiada Rekod</td>
                                    </tr>
                                @endif


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


                <div class="form-group" style="padding: 10px; ">
                    <a href="{{ route('penapis.bahagiani') }}" class="btn btn-primary"
                        style="float: left">Sebelumnya</a>
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                        data-target="#next">Simpan &
                        Seterusnya</button>
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
                                <a href="{{ route('penapis.bahagianiii') }}" type="button"
                                    class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        {{-- <br> --}}
        </form>



        {{-- </div> --}}
    @endsection
    @section('scripts')
    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // kod produk
            field = document.getElementById("produk");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#produk').css('border-color', 'red');
                document.getElementById('err_produk').style.display = "block";
                console.log('masuk');
            }



            // (B4) RESULT
            if (error == "") {

                document.getElementById("checkBtn").setAttribute("type", "submit");
                return true;
            } else {
                document.getElementById("checkBtn").setAttribute("type", "button");

                return false;
            }

        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkBtn').click(function() {
                b5 = $('#e101_b5').val();
                b6 = $('#e101_b6').val();
                b7 = $('#e101_b7').val();
                b9 = $('#e101_b9').val();
                b10 = $('#e101_b10').val();
                b11 = $('#e101_b11').val();
                b12 = $('#e101_b12').val();
                b13 = $('#e101_b13').val();
                b14 = $('#e101_b14').val();
                // b5 = b5 || 0;

                let x5 = b5;
                if (x5 == '') {
                    x5 = x5 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x6 = b6;
                if (x6 == '') {
                    x6 = x6 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x7 = b7;
                if (x7 == '') {
                    x7 = x7 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x9 = b9;
                if (x9 == '') {
                    x9 = x9 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x10 = b10;
                if (x10 == '') {
                    x10 = x10 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x11 = b11;
                if (x11 == '') {
                    x11 = x11 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x12 = b12;
                if (x12 == '') {
                    x12 = x12 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x13 = b13;
                if (x13 == '') {
                    x13 = x13 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x14 = b14;
                if (x14 == '') {
                    x14 = x14 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }

                document.getElementById("e101_b5").value = x5;
                document.getElementById("e101_b6").value = x6;
                document.getElementById("e101_b7").value = x7;
                document.getElementById("e101_b9").value = x9;
                document.getElementById("e101_b10").value = x10;
                document.getElementById("e101_b11").value = x11;
                document.getElementById("e101_b12").value = x12;
                document.getElementById("e101_b13").value = x13;
                document.getElementById("e101_b14").value = x14;


                if (b5 == 0 && b6 == 0 && b7 == 0 && b9 == 0 && b10 == 0 && b11 == 0 && b12 == 0 && b13 ==
                    0 && b14 == 0) {
                    // console.log('lain');

                    toastr.error(
                        'Sila isi sekurang-kurangnya satu data',
                        'Ralat!', {
                            "progressBar": true
                        })
                    return false;
                }

            });
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

        function invoke_eb5(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb6'+key).focus();
                }

            });
        }

        function invoke_eb6(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb7'+key).focus();
                }

            });
        }

        function invoke_eb7(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb9'+key).focus();
                }

            });
        }

        function invoke_eb9(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb10'+key).focus();
                }

            });
        }

        function invoke_eb10(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb11'+key).focus();
                }

            });
        }

        function invoke_eb11(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb12'+key).focus();
                }

            });
        }

        function invoke_eb12(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb13'+key).focus();
                }

            });
        }

        function invoke_eb13(key) {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e101_eb14'+key).focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>


        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
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


    @endsection
