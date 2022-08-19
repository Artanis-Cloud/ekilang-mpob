@extends('layouts.main')

@section('content')
    <div class="page-wrapper" style="transition: 0s">


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

                <b>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4
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
            <div class="card-body">
                <div class="">
                    <form action="{{ route('oleo.add.bahagian.ia') }}" method="post" class="sub-form" novalidate>
                        @csrf
                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 1(a)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Produk Minyak Sawit
                            </h5>
                        </div>
                        <hr>

                        <div class="container justify-content-center col-10 ml-auto mr-auto" style="margin: 2%">

                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk dan Kod</span>
                                </div>
                                <div class="col-md-7 mt-3   ">
                                    <div id="border_produk">

                                    <select class="form-control select2" id="produk" name="e104_b4" required
                                        oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        oninput="this.setCustomValidity(''); valid_produk()">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodid }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    </div>
                                    <p type="hidden" id="err_produk" style="color: red; display:none"><i>Sila buat pilihan
                                        di
                                        bahagian ini!</i></p>
                                    @error('e104_b4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b5'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b5" required
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc()" onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
                                    @error('e104_b5')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b6'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b6" required
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc2()" onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
                                    @error('e104_b6')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian/Terimaan &nbsp;<i class="fa fa-exclamation-circle"
                                            style="color: red; cursor: pointer;"
                                            title="Jumlah Belian/Terimaan adalah termasuk jumlah Import."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b7'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b7" required
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc3()" title="Sila isikan butiran ini.">
                                    @error('e104_b7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Jumlah Yang Diproses</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b9'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b9" required
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc4()" title="Sila isikan butiran ini.">
                                    @error('e104_b9')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan/Edaran Tempatan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b10'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b10" required
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc5()" title="Sila isikan butiran ini.">
                                    @error('e104_b10')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Eksport</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b11'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b11" required
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc6()" title="Sila isikan butiran ini.">
                                    @error('e104_b11')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b12'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b12" required
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc7()" title="Sila isikan butiran ini.">
                                    @error('e104_b12')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                {{-- -<div class="col-md-3 mt-3">
                                                <span>Import</span>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <input type="text" class="form-control" name='e104_b8'
                                                    style="width:100%" id="e104_b8" readonly>
                                            </div>- --}}

                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b13'
                                        onkeypress="return isNumberKey(event)" style="width:100%" id="e104_b13"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc8()" required title="Sila isikan butiran ini.">
                                    @error('e104_b13')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" >



                            </div>




                        </div>
                        <br>

                        <div class="row justify-content-center form-group">

                            <button type="submit" class="btn btn-primary " id="checkBtn" onclick="check()">Tambah</button>

                        </div>

                    </form>

                    <hr>
                    <br>

                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Sawit</h5>

                    <section class="section">
                        <div class="card">

                            {{-- <div class="card-body"> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0" style="font-size: 13px">
                                    <thead style="text-align: center">
                                        <tr style="vertical-align: middle">
                                            <th style="vertical-align: middle">Produk Minyak Sawit</th>
                                            <th style="vertical-align: middle">Kod Produk</th>
                                            <th style="vertical-align: middle">Stok Awal Di Premis</th>
                                            <th style="vertical-align: middle">Stok Awal Di Pusat Simpanan</th>
                                            <th style="vertical-align: middle">Belian / Terimaan</th>
                                            {{-- <th>Import</th> --}}
                                            <th style="vertical-align: middle">Import</th>
                                            <th style="vertical-align: middle">Jumlah yang Diproses</th>
                                            <th style="vertical-align: middle">Jualan / Edaran Tempatan</th>
                                            <th style="vertical-align: middle">Eksport</th>
                                            <th style="vertical-align: middle">Stok Akhir Di Premis</th>
                                            <th style="vertical-align: middle">Stok Akhir Di Pusat Simpanan</th>
                                            <th style="vertical-align: middle">Kemaskini</th>
                                            <th style="vertical-align: middle">Hapus?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penyata as $data)
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
                                                <td>{{ number_format($data->e104_b5 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e104_b6 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e104_b7 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e101_b8 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e104_b9 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e104_b10 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e104_b11 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e104_b12 ?? 0, 2) }}</td>
                                                <td>{{ number_format($data->e104_b13 ?? 0, 2) }}</td>
                                                {{-- <td>{{ $data->e104_b14 }}</td> --}}
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#" type="button" data-toggle="modal"
                                                            data-target="#modal{{ $data->e104_b1 }}">
                                                            <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#" type="button" data-toggle="modal"
                                                            data-target="#next2{{ $data->e104_b1 }}">
                                                            <i class="fa fa-trash"
                                                                style="color: #dc3545;font-size:18px"></i>
                                                        </a>
                                                    </div>

                                                </td>
                                                {{-- <td>{{ $data->e101_b15 }}</td> --}}


                                            </tr>

                                            <div class="col-md-6 col-12">

                                                <!--scrolling content Modal -->
                                                <div class="modal fade" id="modal{{ $data->e104_b1 }}" tabindex="-1"
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
                                                                    action="{{ route('oleo.edit.bahagian.ia', [$data->e104_b1]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <label class="required">Nama Produk </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e104_b4'
                                                                                class="form-control"
                                                                                value="{{ $data->produk->proddesc }}"
                                                                                readonly>
                                                                        </div>
                                                                        <label class="required">Stok Awal Di Premis
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb5({{ $data->e104_b1 }})"
                                                                                name='e104_b5' id="e104_eb5{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b5 ,2) }}">
                                                                        </div>
                                                                        <label class="required">Stok Awal Di Pusat Simpanan
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb6({{ $data->e104_b1 }})"
                                                                                name='e104_b6' id="e104_eb6{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b6 ?? 0,,2) }}">
                                                                        </div>
                                                                        <label class="required">Belian / Terimaan </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb7({{ $data->e104_b1 }})"
                                                                                name='e104_b7' id="e104_eb7{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b7 ,2) }}">
                                                                        </div>
                                                                        {{-- <label>Import </label>
                                                                                            <div class="form-group">
                                                                                                <input type="password" placeholder="Password"
                                                                                                    class="form-control">
                                                                                            </div> --}}
                                                                        <label>Import </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e104_b8'
                                                                                class="form-control" readonly
                                                                                value="{{ number_format($data->e104_b8 ,2) }}">
                                                                        </div>
                                                                        <label class="required">Jumlah yang
                                                                            Diproses</label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb9({{ $data->e104_b1 }})"
                                                                                name='e104_b9'  id="e104_eb9{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b9 ,2) }}">
                                                                        </div>
                                                                        <label class="required">Jualan / Edaran Tempatan
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb10({{ $data->e104_b1 }})"
                                                                                name='e104_b10'  id="e104_eb10{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b10 ,2) }}">
                                                                        </div>
                                                                        <label class="required">Eksport </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb11({{ $data->e104_b1 }})"
                                                                                name='e104_b11'  id="e104_eb11{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b11 ,2) }}">
                                                                        </div>
                                                                        <label class="required">Stok Akhir Di Premis
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb12({{ $data->e104_b1 }})"
                                                                                name='e104_b12'  id="e104_eb12{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b12 ,2) }}">
                                                                        </div>
                                                                        <label class="required">Stok Akhir Di Pusat
                                                                            Simpanan
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_b1 }}); invoke_eb13({{ $data->e104_b1 }})"
                                                                                name='e104_b13'  id="e104_eb13{{ $data->e104_b1 }}"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                value="{{ number_format($data->e104_b13 ,2) }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-light-secondary"
                                                                            data-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="submit" disabled id="kemaskini{{ $data->e104_b1 }}"
                                                                            class="btn btn-primary ml-1">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span
                                                                                class="d-none d-sm-block">Kemaskini</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal fade" id="next2{{ $data->e104_b1 }}" tabindex="-1"
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
                                                                Anda pasti mahu menghapus maklumat ini?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary ml-1"
                                                                data-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Tidak</span>
                                                            </button>
                                                            <a href="{{ route('oleo.delete.bahagiania', [$data->e104_b1]) }}"
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
                                            <td style="text-align: right"><b>{{ number_format($total ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total2 ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total3 ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total4 ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total5 ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total6 ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total7 ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total8 ?? 0, 2) }}</b>
                                            </td>
                                            <td style="text-align: right"><b>{{ number_format($total9 ?? 0, 2) }}</b>
                                            </td>

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





                <div class="form-group" style="padding-top: 10px; ">
                    {{-- <div class="text-left col-md-5">
                                    <a href="{{ route('oleo.dashboard') }}" class="btn btn-primary"
                                        style="float: left">Sebelumnya</a>
                                </div>
                                <div class="text-right col-md-7 mb-4 "> --}}
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                        data-target="#next">Simpan &
                        Seterusnya</button>
                    {{-- </div> - --}}

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
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                </button>
                                <a href="{{ route('oleo.bahagianib') }}" type="button" class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- </div> --}}
                <br>
                </form>

            </div>



            {{-- <div id="preloader"></div> --}}
            {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="assets/js/main.js"></script>

    <script src="{{ asset('theme/libs/DataTables2/datatables.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}
        @endsection
        @section('scripts')
        <script>
            function valid_produk() {

                if ($('#produk').val() == '') {
                    $('#border_produk').css('border', '1px solid red');
                    document.getElementById('err_produk').style.display = "block";


                } else {
                    $('#border_produk').css('border', '');
                    document.getElementById('err_produk').style.display = "none";

                }

            }
        </script>
            <script>
                function check() {
                    // (B1) INIT
                    var error = "",
                        field = "";

                    // kod produk
                    field = document.getElementById("produk");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#border_produk').css('border', '1px solid red');
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
                        b5 = $('#e104_b5').val();
                        b6 = $('#e104_b6').val();
                        b7 = $('#e104_b7').val();
                        b9 = $('#e104_b9').val();
                        b10 = $('#e104_b10').val();
                        b11 = $('#e104_b11').val();
                        b12 = $('#e104_b12').val();
                        b13 = $('#e104_b13').val();
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


                        document.getElementById("e104_b5").value = x5;
                        document.getElementById("e104_b6").value = x6;
                        document.getElementById("e104_b7").value = x7;
                        document.getElementById("e104_b9").value = x9;
                        document.getElementById("e104_b10").value = x10;
                        document.getElementById("e104_b11").value = x11;
                        document.getElementById("e104_b12").value = x12;
                        document.getElementById("e104_b13").value = x13;

                        if (b5 == 0 && b6 == 0 && b7 == 0 && b9 == 0 && b10 == 0 && b11 == 0 && b12 == 0 && b13 ==
                            0 ) {
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
        <script>

            function invoke_eb5(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb6'+key).focus();
                    }

                });
            }

            function invoke_eb6(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb7'+key).focus();
                    }

                });
            }

            function invoke_eb7(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb9'+key).focus();
                    }

                });
            }

            function invoke_eb9(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb10'+key).focus();
                    }

                });
            }

            function invoke_eb10(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb11'+key).focus();
                    }

                });
            }

            function invoke_eb11(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb12'+key).focus();
                    }

                });
            }

            function invoke_eb12(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb13'+key).focus();
                    }

                });
            }

            function invoke_eb13(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_eb14'+key).focus();
                    }

                });
            }

            function checkKey(evt) {
                console.log(evt.which);
                return evt.which;
            }
        </script>


            <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b6').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc2() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b7').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc3() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b9').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc4() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b10').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc5() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b11').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc6() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b12').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc7() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b13').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>

            <script>
                function b5() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e104_b5").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b5").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function b6() {
                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e104_b6").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b6").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function b7() {
                     // let decimal = ".00"
                     var x = parseFloat(document.getElementById("e104_b7").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b7").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function b9() {
                     // let decimal = ".00"
                     var x = parseFloat(document.getElementById("e104_b9").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b9").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function b10() {
                     // let decimal = ".00"
                     var x = parseFloat(document.getElementById("e104_b10").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b10").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function b11() {
                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e104_b11").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b11").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function b12() {
                     // let decimal = ".00"
                     var x = parseFloat(document.getElementById("e104_b12").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b12").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function b13() {
                     // let decimal = ".00"
                     var x = parseFloat(document.getElementById("e104_b13").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e104_b13").value = y;
                    console.log(y);
                }
            </script>
            <script>
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        "language": {
                            "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                            "zeroRecords": "Maaf, tiada rekod.",
                            "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
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

                $(window).on('changed', (e) => {
                    // if($('#example').DataTable().clear().destroy()){
                    // $('#example').DataTable();
                    // }
                });

                // document.getElementById("form_type").onchange = function() {
                //     myFunction()
                // };

                // function myFunction() {
                //     console.log('asasa');
                //     table.clear().draw();
                // }
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
            <script>
                document.addEventListener('keypress', function(e) {
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

                    var x = $('#e104_b5').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b5').val(x);

                    var x = $('#e104_b7').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b7').val(x);

                    var x = $('#e104_b9').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b9').val(x);

                    var x = $('#e104_b10').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b10').val(x);

                    var x = $('#e104_b11').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b11').val(x);

                    var x = $('#e104_b12').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b12').val(x);

                    var x = $('#e104_b6').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b6').val(x);

                    var x = $('#e104_b13').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e104_b13').val(x);

                    return true;

            });
            </script>

            </body>

            </html>
        @endsection
