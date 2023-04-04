@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper" style="transition: 0s;">

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

                <b>PENYATA BULANAN PUSAT SIMPANAN - MPOB (EL) KS 4
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
                    <form action="{{ route('pusatsimpan.add.bahagian.a') }}" method="post" class="sub-form" novalidate>
                        @csrf
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian A</h3>
                            <h5 style="color: rgb(39, 80, 71)">Instolasi Keluaran Minyak Sawit - Aktiviti
                                Bukan Peralihan (Non Transhipment)
                            </h5>
                        </div>
                        <hr>

                        <div class="container center mt-4 col-10 ml-auto mr-auto">
                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk Sawit dan Kod</span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <div id="bproduk">

                                    <select class="form-control select2" id="produk" name="e07bt_produk" required
                                        oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        oninput="this.setCustomValidity(''); valid_produk()">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produks as $produk)
                                            @if ($produk->prodname != '')
                                                <option value="{{ $produk->prodid }}">
                                                    {{ $produk->prodid }} - {{ $produk->proddesc }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    </div>
                                    <p type="hidden" id="err_produk" style="color: red; display:none"><i>Sila buat pilihan
                                        di
                                        bahagian ini!</i></p>
                                    @error('e07bt_produk')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e07bt_stokawal'
                                        onkeypress="return isNumberKey(event)" id="e07bt_stokawal" required
                                        onchange="autodecimal(this);  pelarasan(); FormatCurrency(this)"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"  onClick="this.select();"
                                        oninput="this.setCustomValidity('');invokeFunc()" title="Sila isikan butiran ini.">
                                    @error('e07bt_stokawal')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class=" align-items-center">
                                        Terimaan Dalam Negeri &nbsp;<i class="fa fa-exclamation-circle" style="color: red"
                                            title="Jumlah Penerimaan Dalam Negeri adalah termasuk jumlah Import."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e07bt_terima' style="width: 100%"
                                        onkeypress="return isNumberKey(event)" id="e07bt_terima" required  onClick="this.select();"
                                        onchange="autodecimal(this);  pelarasan(); FormatCurrency(this)"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc2()"
                                        title="Sila isikan butiran ini.">
                                    @error('e07bt_terima')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span>Import</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e07bt_import' style="width: 100%"
                                        id="e07bt_import" title="Sila isikan butiran ini." readonly>
                                    @error('e07bt_import')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <span class=" align-items-center">
                                        Edaran Tempatan &nbsp;<i class="fa fa-exclamation-circle" style="color: red"
                                            title="Jumlah Edaran Tempatan adalah termasuk jumlah Eksport."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e07bt_edaran' style="width: 100%"
                                        onkeypress="return isNumberKey(event)" id="e07bt_edaran" required  onClick="this.select();"
                                        onchange="autodecimal(this);  pelarasan(); FormatCurrency(this)"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc3()"
                                        title="Sila isikan butiran ini.">
                                    @error('e07bt_edaran')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span>Eksport</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e07bt_eksport' style="width: 100%"
                                        id="e07bt_eksport" title="Sila isikan butiran ini." readonly>
                                    @error('e07bt_eksport')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <span class="">Pelarasan(+/-)</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e07bt_pelarasan' readonly
                                        style="width: 100%" id="e07bt_pelarasan"title="Sila isikan butiran ini.">
                                    @error('e07bt_pelarasan')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e07bt_stokakhir'
                                        style="width: 100%" onkeypress="return isNumberKey(event)" id="e07bt_stokakhir"
                                        required  onchange="autodecimal(this); pelarasan(); FormatCurrency(this)"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"  onClick="this.select();"
                                        oninput="this.setCustomValidity('')" title="Sila isikan butiran ini.">
                                    @error('e07bt_stokakhir')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <br>
                        <div class="row justify-content-center form-group" style="margin-top: 1%; ">
                            <button type="submit" class="btn btn-primary" id="checkBtn" onclick="check()">Tambah</button>
                        </div>
                    </form>
                    <hr>
                    <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:3%; margin-bottom:-2%">Senarai
                        Instolasi Keluaran Minyak - Aktiviti
                        Bukan Peralihan (Non Transhipment)
                        Sawit</h5>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" style="font-size: 13px">
                                <thead>
                                    <tr style="text-align: center; background-color: #d3d3d34d">
                                        <th style="vertical-align: middle">Nama Produk Sawit</th>
                                        <th style="vertical-align: middle">Kod Produk </th>
                                        <th style="vertical-align: middle">Stok Awal</th>
                                        <th style="vertical-align: middle">Terimaan Dalam Negeri</th>
                                        <th style="vertical-align: middle">Import</th>
                                        <th style="vertical-align: middle">Edaran Tempatan</th>
                                        <th style="vertical-align: middle">Eksport</th>
                                        <th style="vertical-align: middle">Pelarasan (+/-)</th>
                                        <th style="vertical-align: middle">Stok Akhir</th>
                                        <th style="vertical-align: middle">Kemaskini</th>
                                        <th style="vertical-align: middle">Hapus?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penyata as $data)
                                        <tr style="text-align: right">
                                            <td style="text-align: left">
                                                {{ $data->produk->proddesc }}</td>
                                            <td style="text-align: center">
                                                {{ $data->produk->prodid }}</td>
                                            <td>{{ number_format($data->e07bt_stokawal ?? 0, 2) }}
                                            </td>
                                            <td>{{ number_format($data->e07bt_terima ?? 0, 2) }}
                                            </td>
                                            <td>{{ number_format($data->e07bt_import ?? 0, 2) }}
                                            </td>
                                            <td>{{ number_format($data->e07bt_edaran ?? 0, 2) }}
                                            </td>
                                            <td>{{ number_format($data->e07bt_eksport ?? 0, 2) }}
                                            </td>
                                            <td>{{ number_format($data->e07bt_pelarasan ?? 0, 2) }}
                                            </td>
                                            <td>{{ number_format($data->e07bt_stokakhir ?? 0, 2) }}
                                            </td>
                                            <td>
                                                <div class="icon" style="text-align: center">
                                                    <a href="#" type="button" data-toggle="modal"
                                                        data-target="#modal{{ $data->e07bt_id }}">
                                                        <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                        </i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="icon" style="text-align: center">
                                                    <a href="#" type="button" data-toggle="modal"
                                                        data-target="#next2{{ $data->e07bt_id }}">
                                                        <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                        <div class="col-md-6 col-12">

                                            <!--scrolling content Modal -->
                                            <div class="modal fade" id="modal{{ $data->e07bt_id }}" tabindex="-1"
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
                                                                action="{{ route('pusatsimpan.edit.bahagian.a', [$data->e07bt_id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <label class="required">Nama Produk Sawit</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e07bt_produk'
                                                                            class="form-control"
                                                                            value="{{ $data->produk->proddesc ?? ''}}"
                                                                            readonly>
                                                                    </div>
                                                                    <label class="required">Stok Awal </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e07bt_stokawal'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            id="e07b2{{ $data->e07bt_id }}"
                                                                            onchange="autodecimal(this); FormatCurrency(this); editpelarasan({{ $data->e07bt_id }})"
                                                                            class="form-control"
                                                                            oninput="validate_two_decimal(this); enableKemaskini({{ $data->e07bt_id }}); invoke_bt2({{ $data->e07bt_id }})"
                                                                            value="{{ number_format($data->e07bt_stokawal, 2) }}">
                                                                    </div>
                                                                    <label class="required">Penerimaan Dalam Negeri
                                                                    </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e07bt_terima'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            id="e07b3{{ $data->e07bt_id }}"
                                                                            onchange="autodecimal(this); FormatCurrency(this); editpelarasan({{ $data->e07bt_id }})"
                                                                            class="form-control"
                                                                            oninput="validate_two_decimal(this); enableKemaskini({{ $data->e07bt_id }}); invoke_bt3({{ $data->e07bt_id }})"
                                                                            value="{{ number_format($data->e07bt_terima, 2) }}">
                                                                    </div>
                                                                    <label>Import </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e07bt_import'
                                                                            class="form-control" "
                                                                                        value="{{ number_format($data->e07bt_import, 2) }}"
                                                                                        readonly>
                                                                                </div>
                                                                                <label class="required">Edaran Dalam Negeri
                                                                                </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e07bt_edaran' onkeypress="return isNumberKey(event)"  id="e07b5{{ $data->e07bt_id }}" onchange="autodecimal(this); FormatCurrency(this); editpelarasan({{ $data->e07bt_id }})"
                                                                                        class="form-control"  oninput="validate_two_decimal(this); enableKemaskini({{ $data->e07bt_id }}); invoke_bt5({{ $data->e07bt_id }})"
                                                                                        value="{{ number_format($data->e07bt_edaran, 2) }}">
                                                                                </div>
                                                                                <label>Eksport </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e07bt_eksport' id="e07b6"
                                                                                        class="form-control"
                                                                                        value="{{ number_format($data->e07bt_eksport, 2) }}"
                                                                                        readonly>
                                                                                </div>
                                                                                <label class="required">Pelarasan (+/-) </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e07bt_pelarasan'
                                                                                        class="form-control" readonly id="e07b7{{ $data->e07bt_id }}"
                                                                                        value="{{ number_format($data->e07bt_pelarasan, 2) }}">
                                                                                </div>
                                                                                <label class="required">Stok Akhir </label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='e07bt_stokakhir' onkeypress="return isNumberKey(event)"  id="e07b8{{ $data->e07bt_id }}" onchange="autodecimal(this); FormatCurrency(this); editpelarasan({{ $data->e07bt_id }})"
                                                                                        class="form-control"  oninput="validate_two_decimal(this); enableKemaskini({{ $data->e07bt_id }})"
                                                                                        value="{{ number_format($data->e07bt_stokakhir, 2) }}">
                                                                                </div>
                                                                            </div>


                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-secondary"
                                                                            data-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary ml-1" disabled id="kemaskini{{ $data->e07bt_id }}">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                                        </button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="modal fade" id="next2{{ $data->e07bt_id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                        PENGESAHAN</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
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
                                                                    <a href="{{ route('pusatsimpan.delete.bahagiana', [$data->e07bt_id]) }}"
                                                                        type="button" class="btn btn-light-secondary" style="color: #275047; background-color: #a1929238">

                                                                        <i class="bx bx-x d-block d-sm-none" ></i>
                                                                        <span class="d-none d-sm-block" >Ya</span>
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
                                                                                <b>{{ number_format($total ?? 0, 2) }}</b>
                                                                            </td>
                                                                            <td style="text-align: right">
                                                                                <b>{{ number_format($total2 ?? 0, 2) }}</b>
                                                                            </td>
                                                                            <td style="text-align: right"><b>0.00</b></td>
                                                                            <td style="text-align: right">
                                                                                <b>{{ number_format($total3 ?? 0, 2) }}</b>
                                                                            </td>
                                                                            <td style="text-align: right"><b>0.00</b></td>
                                                                            <td style="text-align: right">
                                                                                <b>{{ number_format($total4 ?? 0, 2) }}</b>
                                                                            </td>
                                                                            <td style="text-align: right">
                                                                                <b>{{ number_format($total5 ?? 0, 2) }}</b>
                                                                            </td>

                                                                            {{-- <td style="text-align: right"><b>{{ number_format($totalb2 ??  0,2) }}</b></td>
                                                                <td style="text-align: right"><b>{{ number_format($totalb3 ??  0,2) }}</b></td>
                                                                <td style="text-align: right"><b>{{ number_format($totalb4 ??  0,2) }}</b></td> --}}

                                                                            <td colspan="2"></td>
                                                                            {{-- <td></td> --}}

                                                                        </tr>

                                                                        <br>

                                </tbody>

                            </table>

                        </div>

                        <div class="form-group" style="padding-top: 20px; ">
                            {{-- <div class="text-left col-md-5">
                         <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary"
                            style="float: left">Sebelumnya</a>
                    </div>
                    <div class="text-right col-md-7"> --}}
                            <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                                data-target="#next">Simpan & Seterusnya</button>
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
                                        <a href="{{ route('pusatsimpan.bahagianb') }}" type="button"
                                            class="btn btn-primary ml-1">

                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Ya</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <br>
                    </form>

                </div>
            </div>
        @endsection
        @section('scripts')
        <script>
            $(document).ready(function() {
              // Get references to the input elements
              var $a = $('#e07bt_stokakhir');
              var $b = $('#e07bt_stokawal');
              var $c = $('#e07bt_terima');
              var $d = $('#e07bt_edaran');
              var $e = $('#e07bt_pelarasan');

        // Attach an event handler to the input elements
            $('.form-control').on('input', function() {
                // Parse the input values as floating point numbers
                var a = parseFloat($a.val().replace(/,/g, ''), 10) || 0;
                var b = parseFloat($b.val().replace(/,/g, ''), 10) || 0;
                var c = parseFloat($c.val().replace(/,/g, ''), 10) || 0;
                var d = parseFloat($d.val().replace(/,/g, ''), 10) || 0;

                // Calculate the value of e
                var e = a - (b + c - d);

                // Format the value of e with commas and two decimal places
                $e.val(e.toLocaleString('en-US', {maximumFractionDigits: 2}));
                });
            });
        </script>
        {{-- <script>
            function pelarasan() {
                var stokawal = $("#e07bt_stokawal").val();
                var penerimaan = $("#e07bt_terima").val();
                var edaran = $("#e07bt_edaran").val();
                // var jumlah = $("#total").val();


                var pelarasan = $("#e07bt_pelarasan").val();
                var pelarasan_input = 0;
                var  stokakhir =   document.getElementById('e07bt_stokakhir');


                pelarasan_input = (parseFloat(Number(stokawal.replace(/,/g, ""))) + parseFloat(Number(penerimaan.replace(/,/g, "")))) -
                        parseFloat(Number(edaran.replace(/,/g, "")));

                pelarasan_diff =  stokakhir.value - pelarasan_input ;

                console.log(pelarasan_diff);
                // var stokakhir = $("#e07bt_stokakhir").val();
                // console.log(parseFloat(Number(stokawal)));


                // if (pelarasan_input >= stokakhir.value) {
                //     console.log('sama');
                //     document.getElementById('e07bt_pelarasan').value = pelarasan_diff.toFixed(2);
                //     return true;
                // //     console.log(document.getElementById('e07bt_pelarasan').value);

                // } else if (pelarasan_input < stokakhir.value ){
                //     console.log('taksama');
                    document.getElementById('e07bt_pelarasan').value =  pelarasan_diff.toFixed(2);
                //     return false
                // }

                    // document.getElementById('total').innerHTML = jumlah_input.toFixed(2);


                    // console.log(document.getElementById('e07bt_pelarasan').value);

            }
        </script> --}}
        <script>
            function editpelarasan(key) {
                var estokawal = $("#e07b2" + key).val();
                var epenerimaan = $("#e07b3" + key).val();
                var eedaran = $("#e07b5" + key).val();

                var epelarasan = $("#e07b7" + key).val();
                var epelarasan_input = 0;
                var  estokakhir =  document.getElementById('e07b8' + key);
                // console.log(estokakhir.value);


                epelarasan_input = parseFloat(Number(estokawal.replace(/,/g, ""))) + parseFloat(Number(epenerimaan.replace(/,/g, ""))) -
                        parseFloat(Number(eedaran.replace(/,/g, "")));

                epelarasan_diff = parseFloat(Number(estokakhir.value.replace(/,/g, ""))) - epelarasan_input ;
                console.log(epelarasan_diff);

                // if (epelarasan_input >= estokakhir.value) {
                //     console.log('sama');
                // document.getElementById('#e07b7' + key).value = epelarasan_diff.toFixed(2);
                document.querySelector("#e07b7" + key).value = epelarasan_diff.toFixed(2);
                //     return true;
                // //     console.log(document.getElementById('e07bt_pelarasan').value);

                // } else if (epelarasan_input < estokakhir.value ){
                //     console.log('taksama');
                //     document.getElementById('#e07b7' + key).value =  epelarasan_diff.toFixed(2);
                //     return false
                // }

                    // document.getElementById('total').innerHTML = jumlah_input.toFixed(2);


                    // console.log(document.getElementById('e07bt_pelarasan').value);

            }
        </script>
<script>
    function valid_produk() {

        if ($('#e101_b4').val() == '') {
            $('#bproduk').css('border', '1px solid red');
            document.getElementById('err_produk').style.display = "block";


        } else {
            $('#bproduk').css('border', '');
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
            $('#bproduk').css('border', '1px solid red');
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
            b5 = $('#e07bt_stokawal').val();
            b6 = $('#e07bt_terima').val();
            b8 = $('#e07bt_import').val();
            b7 = $('#e07bt_edaran').val();
            b10 = $('#e07bt_eksport').val();
            b9 = $('#e07bt_stokakhir').val();

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
            let x8 = b8;
            if (x8 == '') {
                x8 = x8 || 0.00;
                // document.getElementById("ebio_b5").value = x;
            }
            let x10 = b10;
            if (x10 == '') {
                x10 = x10 || 0.00;
                // document.getElementById("ebio_b5").value = x;
            }


            document.getElementById("e07bt_stokawal").value = x5;
            document.getElementById("e07bt_terima").value = x6;
            document.getElementById("e07bt_import").value = x8;
            document.getElementById("e07bt_edaran").value = x7;
            document.getElementById("e07bt_eksport").value = x10;
            document.getElementById("e07bt_stokakhir").value = x9;


            if (b5 == 0 && b6 == 0 && b7 == 0 && b9 == 0 ) {
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

            function invoke_bt2(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e07b3'+key).focus();
                    }

                });
            }

            function invoke_bt3(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e07b5'+key).focus();
                    }

                });
            }

            function invoke_bt5(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e07b8'+key).focus();
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
                            document.getElementById('e07bt_terima').focus();
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
                            document.getElementById('e07bt_edaran').focus();
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
                            document.getElementById('e07bt_stokakhir').focus();
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
                            document.getElementById('e07bt_stokakhir').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
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

                    var x = $('#e07bt_stokawal').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e07bt_stokawal').val(x);

                    var x = $('#e07bt_terima').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e07bt_terima').val(x);

                    var x = $('#e07bt_import').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e07bt_import').val(x);

                    var x = $('#e07bt_edaran').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e07bt_edaran').val(x);

                    var x = $('#e07bt_eksport').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e07bt_eksport').val(x);

                    var x = $('#e07bt_pelarasan').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e07bt_pelarasan').val(x);

                    var x = $('#e07bt_stokakhir').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e07bt_stokakhir').val(x);


                    return true;

                });
            </script>

            </body>

            </html>
        @endsection
