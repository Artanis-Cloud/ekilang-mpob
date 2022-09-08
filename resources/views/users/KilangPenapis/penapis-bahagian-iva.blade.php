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
        <div class="card" style="margin-right:2%; margin-left:2%;">
            <form action="{{ route('penapis.add.bahagian.iva') }}" method="post" class="sub-form" novalidate>
                @csrf
                <div class="card-body">
                    <div class="" style="padding: 2%">
                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%">Bahagian 4 (a)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Produk Akhir Berasaskan Minyak Sawit dan
                                Minyak Isirung Sawit
                                - Bahan Makanan</h5>
                        </div>
                        <hr>
                        <div class="mb-2 col-8" style="text-align: left">
                            <p><i>Nota: Sila isikan butiran dibawah dalam tan metrik dan tekan butang ‘Simpan & Seterusnya’</i></p>
                        </div>
                        <div class="container col-8 ml-auto mr-auto center mt-4" >

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk</span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <div id="border_produk">

                                    <select class="form-control select2" id="produk" name="e101_c4" required
                                        oninput="setCustomValidity('');valid_produk()"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodid }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    </div>
                                    <p type="hidden" id="err_produk" style="color: red; display:none"><i>Sila buat pilihan
                                        di bahagian ini!</i></p>
                                    {{-- @error('e101_c4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal Di Premis &nbsp;<i class="fa fa-exclamation-circle"
                                            style="color: red; cursor: pointer;"
                                            title="Termasuk di Pusat Simpanan dan/atau Gudang"></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_c5' style="width:100%"
                                        id="e101_c5" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_c5()"
                                        title="Sila isikan butiran ini.">
                                    @error('e101_c5')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian/Terimaan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_c6' style="width:100%"
                                        id="e101_c6" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_c6()"
                                        title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)">
                                    @error('e101_c6')
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
                                    <input type="text" class="form-control" name='e101_c7' style="width:100%"
                                        id="e101_c7" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_c7()"
                                        title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)">
                                    @error('e101_c7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan/Edaran Tempatan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_c8' style="width:100%"
                                        id="e101_c8" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_c8()"
                                        title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)">
                                    @error('e101_c8')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Eksport</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_c9' style="width:100%"
                                        id="e101_c9" oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_c9()"
                                        title="Sila isikan butiran ini."
                                        onchange="autodecimal(this); FormatCurrency(this)">
                                    @error('e101_c9')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir Di Premis &nbsp;<i class="fa fa-exclamation-circle"
                                            style="color: red; cursor: pointer;"
                                            title="Termasuk di Pusat Simpanan dan/atau Gudang"></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_c10' style="width:100%"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e101_c10" required
                                        onkeypress="return isNumberKey(event)"
                                        onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        title="Sila isikan butiran ini.">
                                    @error('e101_c10')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                        </div><br>

                    </div>
                    <div class="row justify-content-center form-group" style="margin-top: 2%; ">
                        <button type="submit" class="btn btn-primary" onclick="check()" id="checkBtn">Tambah</button>
                    </div>


            </form>

            <hr>

            <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:3%">Senarai Produk Akhir Berasaskan Minyak
                Sawit dan
                Minyak Isirung Sawit
                - Bahan Makanan</h5>

            <section class="section">
                <div class="card">

                    <div class="table-responsive">
                        <table id="table4" class="table table-bordered mb-0" style="font-size: 13px"  data-detail-view="true">
                            <thead>
                                <tr style="text-align: center; background-color: #d3d3d34d">
                                    <th style="vertical-align: middle">Nama Produk</th>
                                    <th style="vertical-align: middle">Kod Produk</th>
                                    <th style="vertical-align: middle">Stok Awal Di Premis</th>
                                    <th style="vertical-align: middle">Belian/Terimaan</th>
                                    <th style="vertical-align: middle">Pengeluaran</th>
                                    <th style="vertical-align: middle">Jualan/Edaran Tempatan</th>
                                    <th style="vertical-align: middle">Eksport</th>
                                    <th style="vertical-align: middle">Stok Akhir Di Proses</th>
                                    <th style="vertical-align: middle">Kemaskini</th>
                                    <th style="vertical-align: middle">Hapus?</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($penyata && !$penyata->isEmpty())

                                @foreach ($penyata as $data)

                                    <tr style="text-align: right">
                                        <td style="text-align: left"  data-field="proddesc">{{ $data->produk->proddesc }}</td>
                                        <td>{{ $data->produk->prodid }}</td>
                                        <td>{{ number_format($data->e101_c5 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_c6 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_c7 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_c8 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_c9 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_c10 ?? 0, 2) }}</td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e101_c1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e101_c1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>



                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e101_c1 }}" tabindex="-1"
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
                                                            action="{{ route('penapis.edit.bahagian.iva', [$data->e101_c1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Nama Produk </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_c4'
                                                                        class="form-control"
                                                                        value="{{ $data->produk->proddesc }}" readonly>
                                                                </div>
                                                                <label class="required">Stok Awal </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_c5'
                                                                        id="e101_ec5{{ $data->e101_c1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_c1 }}); setCustomValidity(''); invoke_ec5({{ $data->e101_c1 }})"
                                                                        value="{{ number_format($data->e101_c5 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Belian/Terimaan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_c6'
                                                                        id="e101_ec6{{ $data->e101_c1 }}"
                                                                        class="form-control"
                                                                        onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="enableKemaskini({{ $data->e101_c1 }});validate_two_decimal(this); setCustomValidity(''); invoke_ec6({{ $data->e101_c1 }})"
                                                                        value="{{ number_format($data->e101_c6 ,2) }}" required>
                                                                </div>
                                                                <label>Import </label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" readonly>
                                                                </div>
                                                                <label class="required">Pengeluaran </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_c7'
                                                                        id="e101_ec7{{ $data->e101_c1 }}"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_c1 }}); setCustomValidity(''); invoke_ec7({{ $data->e101_c1 }})"
                                                                        value="{{ number_format($data->e101_c7 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Jualan/Edaran Tempatan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_c8'
                                                                        id="e101_ec8{{ $data->e101_c1 }}"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_c1 }}); setCustomValidity(''); invoke_ec8({{ $data->e101_c1 }})"
                                                                        value="{{ number_format($data->e101_c8 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Eksport </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_c9'
                                                                        id="e101_ec9{{ $data->e101_c1 }}"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_c1 }}); setCustomValidity(''); invoke_ec9({{ $data->e101_c1 }})"
                                                                        value="{{ number_format($data->e101_c9 ,2) }}" required>
                                                                </div>
                                                                <label class="required">Stok Akhir </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_c10'
                                                                        id="e101_ec10{{ $data->e101_c1 }}"
                                                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_c1 }});setCustomValidity('')"
                                                                        value="{{ number_format($data->e101_c10 ,2) }}" required>
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
                                                            id="kemaskini{{ $data->e101_c1 }}">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="modal fade" id="next2{{ $data->e101_c1 }}" tabindex="-1"
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
                                                    <a href="{{ route('penapis.delete.bahagianiva', [$data->e101_c1]) }}"
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
                                    <td colspan="10" class="text-center" style="height:40px">Tiada Rekod</td>
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

                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>
                                <br>

                            </tbody>

                        </table>

                    </div>
                </div>

                <div class="form-group" style="padding-top: 10px; ">
                    <a href="{{ route('penapis.bahagianiii') }}" class="btn btn-primary"
                        >Sebelumnya</a>
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
                                <a href="{{ route('penapis.bahagianivb') }}" type="button"
                                    class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        </form>



        {{-- <div id="preloader"></div> --}}
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    @endsection
    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkBtn').click(function() {
                c5 = $('#e101_c5').val();
                c6 = $('#e101_c6').val();
                c7 = $('#e101_c7').val();
                c8 = $('#e101_c8').val();
                c9 = $('#e101_c9').val();
                c10 = $('#e101_c10').val();
                // b5 = b5 || 0;

                let x5 = c5;
                if (x5 == '') {
                    x5 = x5 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x6 = c6;
                if (x6 == '') {
                    x6 = x6 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x7 = c7;
                if (x7 == '') {
                    x7 = x7 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x8 = c8;
                if (x8 == '') {
                    x8 = x8 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x9 = c9;
                if (x9 == '') {
                    x9 = x9 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }
                let x10 = c10;
                if (x10 == '') {
                    x10 = x10 || 0.00;
                    // document.getElementById("ebio_b5").value = x;
                }


                document.getElementById("e101_c5").value = x5;
                document.getElementById("e101_c6").value = x6;
                document.getElementById("e101_c7").value = x7;
                document.getElementById("e101_c8").value = x8;
                document.getElementById("e101_c9").value = x9;
                document.getElementById("e101_c10").value = x10;

                if (c5 == 0 && c6 == 0 && c7 == 0 && c8 == 0 && c9 == 0 && c10 == 0 ) {
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
        <script>
            function invoke_c5() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_c6').focus();
                    }

                });
            }

            function invoke_c6() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_c7').focus();
                    }

                });
            }

            function invoke_c7() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_c8').focus();
                    }

                });
            }

            function invoke_c8() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_c9').focus();
                    }

                });
            }

            function invoke_c9() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_c10').focus();
                    }

                });
            }

            function invoke_ec5(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_ec6' + key).focus();
                    }

                });
            }

            function invoke_ec6(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_ec7' + key).focus();
                    }

                });
            }

            function invoke_ec7(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_ec8' + key).focus();
                    }

                });
            }

            function invoke_ec8(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_ec9' + key).focus();
                    }

                });
            }

            function invoke_ec9(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e101_ec10' + key).focus();
                    }

                });
            }

            function checkKey(evt) {
                console.log(evt.which);
                return evt.which;
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

                //add form
                var x = $('#e101_c5').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e101_c5').val(x);

                var x = $('#e101_c6').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e101_c6').val(x);

                var x = $('#e101_c7').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e101_c7').val(x);


                var x = $('#e101_c8').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e101_c8').val(x);


                var x = $('#e101_c9').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e101_c9').val(x);


                var x = $('#e101_c10').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e101_c10').val(x);


                return true;

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.calc').change(function() {
                    var total = 0;
                    $('.calc').each(function() {
                        if ($(this).val() != '') {
                            total += parseInt($(this).val());
                        }
                    });
                    $('#total').html(total);
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
            $(document).ready(function(){
            $("#table4").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr:not('.no-records')").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                var trSel =  $("#myTable tr:not('.no-records'):visible")
                // Check for number of rows & append no records found row
                if(trSel.length == 0){
                    $("#myTable").html('<tr class="no-records"><td colspan="3">No record found.</td></tr>')
                }
                else{
                    $('.no-records').remove()
                }

            });
            });
        </script>
    @endsection
