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

              <b>  PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4<br>

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
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}


            <div class="card-body">
                <div class="">

                    <form action="{{ route('bio.add.bahagian.iii') }}" method="post" class="sub-form" novalidate>
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
                                <div id="border_produk">

                                    <select class="form-control select2" id="produk" name="ebio_c3" required
                                        onchange="showDetail()"
                                        oninvalid="this.setCustomValidity('Sila buat pilihan dibahagian ini')"
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
                                </div>
                                    @error('ebio_c3')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror

                                </div>
                            {{-- </div> --}}

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c4' style="width:100%"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                       oninput="this.setCustomValidity(''); invokeFunc(); "
                                        onkeypress="return isNumberKey(event)" id="ebio_c4" required
                                        onchange="autodecimal(this); FormatCurrency(this)" title="Sila isikan butiran ini.">

                                    @error('ebio_c4')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian / Terimaan &nbsp;<i class="fa fa-exclamation-circle"
                                            style="color: red; cursor: pointer;"
                                            title="Jumlah Belian/Terimaan adalah termasuk jumlah Import."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_c5' style="width:100%"
                                        id="ebio_c5" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                       oninput="this.setCustomValidity(''); invokeFunc1();"
                                        onkeypress="return isNumberKey(event)" required onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
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
                                       oninput="this.setCustomValidity(''); invokeFunc2();"
                                        onkeypress="return isNumberKey(event)" required onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
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
                                        id="ebio_c7" oninput="this.setCustomValidity(''); invokeFunc3();"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        onkeypress="return isNumberKey(event)" required onchange="autodecimal(this); FormatCurrency(this)">
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
                                    {{-- <div id="aw"> --}}
                                    <input type="text" class="form-control" name='ebio_c8' style="width:100%;"
                                        id="ebio_c8" required onchange="autodecimal(this); FormatCurrency(this)"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc4();"
                                        onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini.">&nbsp;
                                    {{-- </div> --}}

                                    <div id="merah_container" style="display:none" class="blink_me">
                                        <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                            style="font-size:11px; color:red; font:rubik" type="button"
                                            data-toggle="modal" data-target="#modal" &nbsp;> (Sila klik untuk
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
                                       oninput="this.setCustomValidity(''); invokeFunc5();"
                                        onkeypress="return isNumberKey(event)" required onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">

                                    <div id="merah_container" style="display:none">
                                        <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                            style="font-size:11px; color:red" type="button" data-toggle="modal"
                                            data-target="#modal" &nbsp;> (Sila klik untuk
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
                                       oninput="this.setCustomValidity(''); invokeFunc6();"
                                        onkeypress="return isNumberKey(event)" required onchange="autodecimal(this); FormatCurrency(this)"
                                        title="Sila isikan butiran ini.">
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
                            <button type="submit" class="btn btn-primary " id="checkBtn" onclick="check()">Tambah</button>
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
                                                        <a href="{{ route('bio.maklumat.jualan', $data->e_id) }}">
                                                            <i class="far fa-file-alt"
                                                                style="color: blue; cursor: pointer;"></i></a>
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


                <div class="form-group">
                    <a href="{{ route('bio.bahagianii') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                        data-target="#next">Simpan & Seterusnya</button>
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
                                <a href="{{ route('bio.bahagianiv') }}" type="button" class="btn btn-primary ml-1">

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
                            <div class="table-responsive col-10 ml-auto mr-auto">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="font-size: 13px" id="data_table">
                                            <thead style="text-align: center">
                                                <tr style="vertical-align: middle">
                                                    <th style="vertical-align: middle;">Nama Syarikat</th>
                                                    <th style="vertical-align: middle;">Jumlah Jualan / Edaran</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    {{-- <div class='field'> --}}

                                                    <td class="field"><select class="form-control select2 " style="width: 100px"
                                                            id="new_syarikat[]" name="new_syarikat[]"
                                                            onchange="showDetail()" oninput="removeDisabled()">
                                                            <option selected hidden disabled value="">Sila Pilih
                                                            </option>
                                                            @foreach ($syarikat as $data)
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->pembeli }}
                                                                </option>
                                                            @endforeach

                                                        </select></td>
                                                    {{-- </div> --}}
                                                    <td class="field"><input type="text" id="new_jumlah[]" class="form-control" style="text-align: center"
                                                        onkeypress="return isNumberKey(event)"  name='new_jumlah[]'>
                                                        {{-- <div class='actions'> --}}

                                                    <td style="size: 10ch" class="actions"><input type="button"
                                                            class="btn btn-primary ml-1 actions" id="tambah_maklumat"
                                                            onclick="add_row()" disabled="disabled"
                                                            value="Tambah Maklumat">
                                                    </td>
                                                    {{-- </div> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
                        c4 = $('#ebio_c4').val();
                        c5 = $('#ebio_c5').val();
                        c6 = $('#ebio_c6').val();
                        c7 = $('#ebio_c7').val();
                        c8 = $('#ebio_c8').val();
                        c9 = $('#ebio_c9').val();
                        c10 = $('#ebio_c10').val();
                        // b5 = b5 || 0;

                        let x5 = c4;
                        if (x5 == '') {
                                x5 = x5 || 0.00;
                                // document.getElementById("ebio_b5").value = x;
                        }
                        let x6 = c5;
                        if (x6 == '') {
                                x6 = x6 || 0.00;
                                // document.getElementById("ebio_b5").value = x;
                        }
                        let x7 = c6;
                        if (x7 == '') {
                                x7 = x7 || 0.00;
                                // document.getElementById("ebio_b5").value = x;
                        }
                        let x9 = c7;
                        if (x9 == '') {
                                x9 = x9 || 0.00;
                                // document.getElementById("ebio_b5").value = x;
                        }
                        let x10 = c8;
                        if (x10 == '') {
                                x10 = x10 || 0.00;
                                // document.getElementById("ebio_b5").value = x;
                        }
                        let x11 = c9;
                        if (x11 == '') {
                                x11 = x11 || 0.00;
                                // document.getElementById("ebio_b5").value = x;
                        }
                        let x8 = c10;
                        if (x8 == '') {
                                x8 = x8 || 0.00;
                                // document.getElementById("ebio_b5").value = x;
                        }

                         document.getElementById("ebio_c4").value = x5;
                         document.getElementById("ebio_c5").value = x6;
                         document.getElementById("ebio_c6").value = x7;
                         document.getElementById("ebio_c7").value = x9;
                         document.getElementById("ebio_c8").value = x10;
                         document.getElementById("ebio_c9").value = x11;
                         document.getElementById("ebio_c10").value = x8;


                        if (c4 == 0 && c5 == 0 && c6 == 0 && c7 == 0 && c8 == 0 && c9 == 0 && c10 == 0) {
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

                    var nama_syarikat = document.getElementById("new_syarikat[]").options[document.getElementById("new_syarikat[]")
                        .selectedIndex].text;

                    var table = document.getElementById("data_table");
                    var table_len = (table.rows.length) - 1;

                    var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td id='syarikat_row" +
                        table_len + "'>" + nama_syarikat + "</td><td id='jumlah_row" + table_len + "'>" + new_jumlah +
                        "</td><td><input type='hidden' id='jumlah_row" + table_len +
                        "' name='jumlah_row[]' value=" + new_jumlah +
                        "> <input type='button' value='Hapus' class='btn btn-danger ml-1' onclick='delete_row(" + table_len +
                        ")'></td></tr>";

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

                    let total = 0;
                    for (let index = 0; index <= table_input_len; index++) {
                        let hidden_value = document.getElementById("jumlah_row_hidden" + index).value;
                        total += parseInt(hidden_value);
                    }
                    console.log("total", total);
                    document.getElementById("ebio_c8").value = total;
                }

                function delete_row(no) {
                    document.getElementById("row" + no + "").remove();
                    // document.getElementById("row_input" + no + "").outerHTML = "";
                    document.getElementById("jumlah_row_hidden" + (no - 1)).remove();
                    document.getElementById("new_syarikat_hidden" + (no - 1)).remove();

                    var x = document.getElementsByName('jumlah_row_hidden[]');

                    let total = 0;

                    for (let index = 0; index < x.length; index++) {
                        // let hidden_value = document.getElementById("jumlah_row_hidden" + index).value;
                        let hidden_value = x[index].value;
                        console.log('hidden_value', hidden_value);
                        total += parseInt(hidden_value);
                    }
                    document.getElementById("ebio_c8").value = total;
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
                        "> <input type='button' value='Hapus' class='btn btn-danger ml-1' onclick='delete_row1(" + table_len1 +
                        ")'></td></tr>";

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
                    // document.getElementById("row_input" + no + "").outerHTML = "";lain_container

                    document.getElementById("jumlah_row_hidden1" + (no - 1)).value = "";
                    document.getElementById("new_syarikat_hidden1" + (no - 1)).value = "";
                }
            </script>
            <script type="text/javascript">
                function showDetail() {
                    var produk = $('#ebio_c3').val();
                    // const total = $produk2;

                    if (produk == "AW") {
                        document.getElementById('merah_container').style.display = "block";
                        $('#ebio_c8').attr('readonly', 'readonly');
                        $('#ebio_c8').attr('value', ' 0.00');

                        // document.getElementById('isaw').style.display = "block";
                        // document.getElementById('notaw').style.display = "none";
                        // document.getElementById('lain_container').style.display = "block";
                    } else {
                        document.getElementById('merah_container').style.display = "none";
                        $('#ebio_c8').removeAttr('readonly');
                        $('#ebio_c8').removeAttr('value');
                        // document.getElementById('isaw').style.display = "none";
                        // document.getElementById('notaw').style.display = "block";
                        // document.getElementById('lain_container').style.display = "block";

                    }
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



                function removeDisabled() {

                    var new_syarikat = document.getElementById("new_syarikat[]").value;
                    // var new_jumlah = document.getElementById("new_jumlah[]").value;
                    // console.log(new_syarikat);
                    var table_input = document.getElementById("data_table");
                    var table_input_len = (table_input.rows.length) - 1;

                    if (new_syarikat != "") {
                        $('#tambah_maklumat').attr('disabled', 'disabled');
                    } else {
                        $('#tambah_maklumat').attr('disabled', false);
                    }
                }
            </script>
            <script>
                $(document).ready(function() {
                    $('.field input').keyup(function() {

                        var empty = false;
                        $('.field input').each(function() {
                            if ($(this).val().length == 0) {
                                empty = true;
                            }
                        });

                        if (empty) {
                            $('.actions input').attr('disabled', 'disabled');
                        } else {
                            $('.actions input').attr('disabled', false);
                        }
                    });
                });
            </script>
            <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('ebio_c5').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc1() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('ebio_c6').focus();
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
                            document.getElementById('ebio_c7').focus();
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
                            document.getElementById('ebio_c8').focus();
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
                            document.getElementById('ebio_c9').focus();
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
                            document.getElementById('ebio_c10').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>


        @endsection
