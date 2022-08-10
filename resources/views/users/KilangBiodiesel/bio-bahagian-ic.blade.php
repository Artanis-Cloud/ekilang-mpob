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
            <div class="row mb-2">
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

                PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4<br>

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

            </p>
        </div>
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}


            <div class="card-body">
                <div class="">
                    <form action="{{ route('bio.add.bahagian.ic') }}" method="post" class="sub-form">
                        @csrf
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 1 (c)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Lain - Lain Minyak
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
                                    {{-- <select class=" select2"> --}}
                                    <select class="form-control select2" id="ebio_b4" name="ebio_b4" required
                                        oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        oninput="this.setCustomValidity('')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    {{-- </select> --}}
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-md-2 mt-3"></div> --}}
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b5'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')" style="width:100%" id="ebio_b5"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">

                                    @error('ebio_b5')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian/Terimaan &nbsp;<i class="fa fa-exclamation-circle"
                                        style="color: red; cursor: pointer;"
                                        title="Jumlah Belian/Terimaan adalah termasuk jumlah Import."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b6'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')" style="width:100%" id="ebio_b6"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">

                                    @error('ebio_b6')
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
                                    <input type="text" class="form-control" name='ebio_b7'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')" style="width:100%" id="ebio_b7"
                                        onkeypress="return isNumberKey(event)"
                                        required onkeyup="FormatCurrency(this)" title="Sila isikan butiran ini.">

                                    @error('ebio_b7')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Digunakan Untuk Proses Selanjutnya</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b8'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')" style="width:100%" id="ebio_b8"
                                        onkeypress="return isNumberKey(event)"
                                        required onkeyup="FormatCurrency(this)">
                                    @error('ebio_b8')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan/Edaran Tempatan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b9'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')" style="width:100%" id="ebio_b9"
                                        onkeypress="return isNumberKey(event)" required onkeyup="FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">

                                    @error('ebio_b9')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Eksport </span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b10'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')" style="width:100%" id="ebio_b10"
                                        onkeypress="return isNumberKey(event)"
                                        required onkeyup="FormatCurrency(this)" title="Sila isikan butiran ini.">

                                    @error('ebio_b10')
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
                                    <input type="text" class="form-control" name='ebio_b11'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); validate_two_decimal('')" style="width:100%" id="ebio_b11"
                                        onkeypress="return isNumberKey(event)"
                                        required onkeyup="FormatCurrency(this)" title="Sila isikan butiran ini.">
                                    @error('ebio_b11')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="row form-group justify-content-center" style="margin: 3%">
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>

                    </form>
                    <section class="section">

                        <hr>

                        <br>


                        <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Lain - Lain Minyak</h5>
                        <br>
                        <section class="section">
                            <div class="card">

                                {{-- <div class="card-body"> --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" style="font-size: 13px">
                                        <thead style="text-align: center">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Kod Produk</th>
                                                <th>Stok Awal Di Premis</th>
                                                <th>Belian/Terimaan</th>
                                                <th>Pengeluaran</th>
                                                <th>Digunakan Untuk Proses Selanjutnya</th>
                                                <th>Jualan/Edaran Tempatan</th>
                                                <th>Eksport</th>
                                                <th>Stok Akhir Dilapor</th>
                                                <th>Kemaskini</th>
                                                <th>Hapus?</th>
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
                                                    <td style="text-align: center">
                                                        {{ $data->produk->prodid }}
                                                        {{-- @if ($penyata->e101b->e101_b4 == $produk->prodid)
                                                                                    <span>{{ $produk->prodname }}</span>
                                                                                @endif --}}

                                                    </td>
                                                    <td>{{ number_format($data->ebio_b5 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($data->ebio_b6 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($data->ebio_b7 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($data->ebio_b8 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($data->ebio_b9 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($data->ebio_b10 ?? 0, 2) }}</td>
                                                    <td>{{ number_format($data->ebio_b11 ?? 0, 2) }}</td>
                                                    {{-- <td>{{ number_format($data->ebio_b12 ??  0,2) }}</td> --}}
                                                    {{-- <td>{{ $data->e104_b13 }}</td> --}}
                                                    {{-- <td>{{ $data->e104_b14 }}</td> --}}
                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button" data-toggle="modal"
                                                                data-target="#modal{{ $data->ebio_b1 }}">
                                                                <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button" data-toggle="modal"
                                                                data-target="#next2{{ $data->ebio_b1 }}">
                                                                <i class="fa fa-trash"
                                                                    style="color: #dc3545;font-size:18px"></i>
                                                            </a>
                                                        </div>

                                                    </td>
                                                    {{-- <td>{{ $data->e101_b15 }}</td> --}}


                                                </tr>

                                                <div class="col-md-6 col-12">

                                                    <!--scrolling content Modal -->
                                                    <div class="modal fade" id="modal{{ $data->ebio_b1 }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Produk</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('bio.edit.bahagian.ic', [$data->ebio_b1]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <label>Nama Produk </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b4'
                                                                                    class="form-control"
                                                                                    value="{{ $data->produk->proddesc }}"
                                                                                    readonly>
                                                                            </div>
                                                                            <label>Stok Awal Di Premis </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b5'
                                                                                    class="form-control"
                                                                                    oninput="validate_two_decimal(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    required
                                                                                    value="{{ $data->ebio_b5 }}">
                                                                            </div>
                                                                            <label>Belian/Terimaan
                                                                            </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b6'
                                                                                    class="form-control"
                                                                                    oninput="validate_two_decimal(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    required
                                                                                    value="{{ $data->ebio_b6 }}">
                                                                            </div>
                                                                            <label>Pengeluaran </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b7'
                                                                                    class="form-control"
                                                                                    oninput="validate_two_decimal(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    required
                                                                                    value="{{ $data->ebio_b7 }}">
                                                                            </div>
                                                                            {{-- <label>Import </label>
                                                                                                <div class="form-group">
                                                                                                    <input type="password" placeholder="Password"
                                                                                                        class="form-control">
                                                                                                </div> --}}
                                                                            <label>Digunakan Untuk Proses
                                                                                Selanjutnya </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b8'
                                                                                    class="form-control"
                                                                                    oninput="validate_two_decimal(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    required
                                                                                    value="{{ $data->ebio_b8 }}">
                                                                            </div>
                                                                            <label>Jualan/Edaran
                                                                                Tempatan</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b9'
                                                                                    class="form-control"
                                                                                    oninput="validate_two_decimal(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    required
                                                                                    value="{{ $data->ebio_b9 }}">
                                                                            </div>
                                                                            <label>Eksport
                                                                            </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b10'
                                                                                    class="form-control"
                                                                                    oninput="validate_two_decimal(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    required
                                                                                    value="{{ $data->ebio_b10 }}">
                                                                            </div>
                                                                            <label>Stok Akhir Dilapor </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ebio_b11'
                                                                                    class="form-control"
                                                                                    oninput="validate_two_decimal(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    required
                                                                                    value="{{ $data->ebio_b11 }}">
                                                                            </div>


                                                                        </div>
                                                                        {{-- <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-light-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                                                </button>
                                                                                                <button type="button" class="btn btn-primary ml-1"
                                                                                                    data-dismiss="modal">
                                                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                                                    <span class="d-none d-sm-block">Kemaskini</span>
                                                                                                </button>
                                                                                            </div> --}}


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
                                                <div class="modal fade" id="next2{{ $data->ebio_b1 }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                                                    Anda pasti mahu menghapus produk ini?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary ml-1"
                                                                    data-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tidak</span>
                                                                </button>
                                                                <a href="{{ route('bio.delete.bahagian.ic', [$data->ebio_b1]) }}"
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
                                                    <b>{{ number_format($totalicb5 ?? 0, 2) }}</b></td>
                                                <td style="text-align: right">
                                                    <b>{{ number_format($totalicb6 ?? 0, 2) }}</b></td>
                                                <td style="text-align: right">
                                                    <b>{{ number_format($totalicb7 ?? 0, 2) }}</b></td>
                                                <td style="text-align: right">
                                                    <b>{{ number_format($totalicb8 ?? 0, 2) }}</b></td>
                                                <td style="text-align: right">
                                                    <b>{{ number_format($totalicb9 ?? 0, 2) }}</b></td>
                                                <td style="text-align: right">
                                                    <b>{{ number_format($totalicb10 ?? 0, 2) }}</b></td>
                                                <td style="text-align: right">
                                                    <b>{{ number_format($totalicb11 ?? 0, 2) }}</b></td>
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

                <div class="form-group" style="padding-top: 10px; ">
                    <a href="{{ route('bio.bahagianib') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
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
                                <a href="{{ route('bio.bahagianii') }}" type="button" class="btn btn-primary ml-1">

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

        </section><!-- End Hero -->
@endsection

        </div>
    </div>

@section('scripts')
        {{-- <div id="preloader"></div> --}}
        {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>


        <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
        <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('theme/js/app.js') }}"></script>

        <script src="assets/js/main.js"></script>
    <link href="{{ asset('nice-admin/assets/css/cdn.css') }}  " rel="stylesheet">


        <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}


<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("ebio_b4").classList.toggle("show");
    }

    function filterFunction() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      div = document.getElementById("myDropdown");
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
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

                var x = $('#ebio_b5').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b5').val(x);

                var x = $('#ebio_b6').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b6').val(x);

                var x = $('#ebio_b7').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b7').val(x);

                var x = $('#ebio_b8').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b8').val(x);

                var x = $('#ebio_b9').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b9').val(x);

                var x = $('#ebio_b10').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b10').val(x);

                var x = $('#ebio_b11').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b11').val(x);

                var x = $('#ebio_b12').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_b12').val(x);


                return true;

            });
        </script>


    @endsection
