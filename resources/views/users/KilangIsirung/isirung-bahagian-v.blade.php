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
                    {{-- <h4 class="page-title" >Kemasukan Penyata Bulanan
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
                        @endif  {{ $tahun }}</h4> --}}
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

                <b>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4<br>

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
            <form action="{{ route('isirung.add.bahagian.v') }}" method="post" class="sub-form">
                @csrf
                <div class="card-body">
                    <div class="pl-3">
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71);">Bahagian 5</h3>
                            <h5 style="color: rgb(39, 80, 71)">Jualan/Edaran Dedak Isirung Sawit - (PKC)
                                (33)
                            </h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>
                        <div class="mb-2 col-8" style="text-align: left">
                            <p><i>Nota: Sila isikan butiran dibawah dalam tan metrik dan tekan butang ‘Simpan & Seterusnya’</i></p>
                        </div>
                        <div class="container center mt-3" style="margin-left: 4%">
                            <div class="row col-12 ml-auto mr-auto">
                                <div class="col-md-2"  style="margin-top:2%; margin-left:6%">
                                    <span class="">Jualan/Edaran:</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <select class="form-control" id="e102_b4" oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')"
                                    oninput="this.setCustomValidity('');invokeFunc(); valid_sl()" name="e102_b4" required>
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($prodcat as $data)
                                            <option value="{{ $data->catid }}">
                                                {{ $data->catname }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <p type="hidden" id="err_sl" style="color: red; display:none"><i>Sila buat pilihan
                                        di
                                        bahagian ini!</i></p>
                                    @error('e102_b4')
                                        <div class="alert alert-danger" style="margin-right:20%">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-1"  style="margin-left: 3%; margin-top:2%">
                                    <span class="">Ke:</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <select class="form-control" id="e102_b5"oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')"
                                    oninput="this.setCustomValidity('');invokeFunc2(); valid_ke()"
                                        name="e102_b5" required>
                                        <option selected hidden disabled value="">Sila Pilih</option>

                                        <option value="3">KILANG ISIRUNG</option>
                                        <option value="5">PENIAGA</option>
                                        <option value="7">LAIN-LAIN</option>


                                    </select>
                                    <p type="hidden" id="err_ke" style="color: red; display:none"><i>Sila buat pilihan
                                        di
                                        bahagian ini!</i></p>
                                    @error('e102_b5')
                                        <div class="alert alert-danger" style="margin-right:50%; margin-left:-30%">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
{{--
                            </div>

                            <div class="row"> --}}
                                <div class="col-md-1"  style="margin-left: 3%; margin-top:2%">
                                    <span class="">Kuantiti:</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e102_b6' id="e102_b6" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                    oninput="this.setCustomValidity(''); valid_kuantiti()"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)">
                                        <p type="hidden" id="err_kuantiti" style="color: red; display:none"><i>Sila buat pilihan
                                            di
                                            bahagian ini!</i></p>
                                        @error('e102_b6')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

<br>
                        <div class="row justify-content-center form-group" ">

                                <button type="submit" class="btn btn-primary" id="checkBtn" onclick="check()">Tambah</button>
                            </div>

                        </div>
            </form>

            <hr>
            {{-- <br> --}}
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Jualan/Edaran Dedak Isirung Sawit -
                (PKC) (33)</h5>

            <section class="section">
                <div class="card">

                    {{-- <div class="card-body"> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr style="text-align: center; background-color: #d3d3d34d">
                                    <th>Jualan/Edaran</th>
                                    <th>Ke</th>
                                    <th>Kuantiti</th>
                                    <th>Kemaskini</th>
                                    <th>Hapus?</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyata as $data)
                                    <tr>
                                        <td>{{ $data->kodsl->catname ?? '' }}</td>
                                        <td>{{ $data->prodcat2->catname ?? '' }}</td>
                                        {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                        <td style="text-align: right" onchange="validation_jumlah()">
                                            {{ number_format($data->e102_b6 ?? 0, 2) }}
                                            <input type="hidden" id="e102_b6i" name="e102_b6i"
                                                onchange="return validation_jum()" value="{{ $data->e102_b6 }}">
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e102_b1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e102_b1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>
                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e102_b1 }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                                                            action="{{ route('isirung.edit.bahagian.v', [$data->e102_b1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Jualan/Edaran </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e102_b4"
                                                                            name="e102_b4"  oninput="enableKemaskini({{ $data->e102_b1 }})" required>
                                                                            <option hidden value="{{ $data->e102_b4 }}">
                                                                                {{ $data->kodsl->catname ?? '' }}
                                                                            </option>
                                                                            <option value="1"> SENDIRI
                                                                            </option>
                                                                            <option value="2"> LUAR
                                                                            </option>

                                                                        </select>
                                                                    </fieldset>
                                                                    {{-- <input type="text" name='e101_d3'
                                                                                                            class="form-control"
                                                                                                            value="{{ $data->kodsl[0]->catname }}"
                                                                                                            readonly> --}}

                                                                </div>
                                                                <label class="required">Ke </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e102_b5"
                                                                            name="e102_b5" oninput="enableKemaskini({{ $data->e102_b1 }})" required>
                                                                            <option selected hidden
                                                                                value="{{ $data->prodcat2->catid ?? '' }}">
                                                                                {{ $data->prodcat2->catname ?? '' }}
                                                                            </option>
                                                                            <option value="3">KILANG ISIRUNG</option>
                                                                            <option value="5">PENIAGA</option>
                                                                            <option value="7">LAIN-LAIN</option>
                                                                        </select>
                                                                    </fieldset>

                                                                </div>
                                                                <label class="required">Kuantiti </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e102_b6' class="form-control" onchange="autodecimal(this);FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e102_b1}})"
                                                                        id="e102_sb6{{ $data->e102_b1 }}" onkeypress="return isNumberKey(event)"
                                                                        value="{{ old('e102_b6') ?? $data->e102_b6 }}">
                                                                </div>
                                                            </div>


                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1" disabled id="kemaskini{{ $data->e102_b1 }}">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal fade" id="next2{{ $data->e102_b1 }}" tabindex="-1"
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
                                                    <a href="{{ route('isirung.bahagianv.delete', [$data->e102_b1]) }}"
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

                                    <td colspan="2"><b>JUMLAH (SENDIRI)</b></td>
                                    {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                    <td style="text-align: right"><b><span name='total' id='total'>
                                                {{ number_format($total, 2) }}</span></b>
                                        <input type="hidden" name="total" value="{{ $total }}">
                                    </td>
                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>

                                <tr>
                                    {{-- <td><br></td> --}}
                                </tr>
                                @foreach ($penyata2 as $data)
                                    <tr>
                                        <td>{{ $data->kodsl->catname ?? '' }}</td>
                                        <td>{{ $data->prodcat2->catname ?? '' }}</td>
                                        {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                        <td style="text-align: right" onchange="validation_jumlah()">
                                            {{ number_format($data->e102_b6 ?? 0, 2) }}
                                            <input type="hidden" id="e102_b6i" name="e102_b6i"
                                                onchange="return validation_jum()" value="{{ $data->e102_b6 }}">
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e102_b1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e102_b1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>
                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e102_b1 }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                                                            action="{{ route('isirung.edit.bahagian.v', [$data->e102_b1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Jualan/Edaran </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e102_b4"
                                                                            name="e102_b4" oninput="enableKemaskini({{ $data->e102_b1 }})">
                                                                            <option hidden value="{{ $data->e102_b4 }}">
                                                                                {{ $data->kodsl->catname ?? '' }}
                                                                            </option>
                                                                            <option value="1"> SENDIRI
                                                                            </option>
                                                                            <option value="2"> LUAR
                                                                            </option>

                                                                        </select>
                                                                    </fieldset>
                                                                    {{-- <input type="text" name='e101_d3'
                                                                                                            class="form-control"
                                                                                                            value="{{ $data->kodsl[0]->catname }}"
                                                                                                            readonly> --}}

                                                                </div>
                                                                <label class="required">Ke </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e102_b5"
                                                                            name="e102_b5" oninput="enableKemaskini({{ $data->e102_b1 }})">
                                                                            <option selected hidden
                                                                                value="{{ $data->prodcat2->catid ?? '' }}">
                                                                                {{ $data->prodcat2->catname ?? '' }}
                                                                            </option>
                                                                            <option value="1">KILANG BUAH
                                                                            </option>
                                                                            <option value="5">PENIAGA
                                                                            </option>
                                                                            <option value="7">LAIN-LAIN
                                                                            </option>
                                                                        </select>
                                                                    </fieldset>

                                                                </div>
                                                                <label class="required">Kuantiti </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e102_b6'
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e102_b1}})" onkeypress="return isNumberKey(event)"
                                                                        class="form-control" id="e102_eb6{{ $data->e102_b1 }}" onchange="autodecimal(this);FormatCurrency(this)"
                                                                        value="{{ old('e102_b6') ?? $data->e102_b6 }}">
                                                                </div>
                                                            </div>


                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1" disabled id="kemaskini{{ $data->e102_b1 }}">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal fade" id="next2{{ $data->e102_b1 }}" tabindex="-1"
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
                                                    <a href="{{ route('isirung.bahagianv.delete', [$data->e102_b1]) }}"
                                                        type="button" class="btn btn-light-secondary" style="color: #275047; background-color: #a1929238">

                                                        <i class="bx bx-x d-block d-sm-none" ></i>
                                                        <span class="d-none d-sm-block" >Ya</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <form action="{{ route('isirung.bahagianv.process') }}" method="post">
                                    @csrf
                                    <tr>

                                        <td colspan="2"><b>JUMLAH (LUAR)</b></td>
                                        {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                        <td style="text-align: right"><b><span name='total2' id='total2'>
                                                    {{ number_format($total2, 2) }}</span></b>
                                            <input type="hidden" name="total2" value="{{ $total2 }}">
                                        </td>
                                        <td colspan="2"></td>
                                        {{-- <td></td> --}}

                                    </tr>
                                    <tr>

                                        <td colspan="2"><b>JUMLAH KESELURUHAN</b></td>
                                        {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                        <td style="text-align: right"><b><span name='total3' id='total3'>
                                                    {{ number_format($total3, 2) }}</span></b>
                                            <input type="hidden" id='total3' name="total3" value="{{ $total3 }}">
                                        </td>
                                        <td colspan="2"></td>
                                        {{-- <td></td> --}}

                                    </tr>
                                    <tr style="background-color: #1526224a">
                                        <td class="text-bold-500" colspan="2" style="text-align:center;">
                                            <b>Jumlah Bahagian I (PKC)</b>
                                        </td>
                                        <td style="text-align:right;">
                                            <span><b>{{ number_format($penyatai->e102_ag3 ?? 0, 2) }}</b></span>

                                            <input type="hidden" id="jumlah" name="jumlah"
                                                value="{{ $penyatai->e102_ag3 }}">
                                        </td>
                                        <td colspan="2"></td>

                                    </tr>


                                    <br>

                            </tbody>

                        </table>
                    </div>

                    {{-- </div> --}}
                </div>

            </section>

        </div>




        <div class="form-group" style="padding: 20px; ">
            <a href="{{ route('isirung.bahagianiv') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
            <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                data-target="#next">Simpan & Seterusnya</button>
        </div>

        <!-- Vertically Centered modal Modal -->
        <div class="modal fade" id="next" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
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
                        </button>
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <button type="submit" class="btn btn-primary ml-1">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="next2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
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
                            Anda pasti mahu menghapus maklumat ini?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button>
                        @if ($data->e102_b1)
                            <a href="{{ route('isirung.bahagianv.delete', [$data->e102_b1]) }}" type="button"
                                class="btn btn-primary ml-1">

                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ya</span>
                            </a>
                        @else
                            <a href="#" type="button" class="btn btn-primary ml-1">

                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ya</span>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>


    </section><!-- End Hero -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script>
        function valid_sl() {

            if ($('#e102_b4').val() == '') {
                $('#e102_b4').css('border', '1px solid red');
                document.getElementById('err_sl').style.display = "block";


            } else {
                $('#e102_b4').css('border', '');
                document.getElementById('err_sl').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_ke() {

            if ($('#e102_b5').val() == '') {
                $('#e102_b5').css('border', '1px solid red');
                document.getElementById('err_ke').style.display = "block";


            } else {
                $('#e102_b5').css('border', '');
                document.getElementById('err_ke').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_kuantiti() {

            if ($('#e102_b6').val() == '') {
                $('#e102_b6').css('border', '1px solid red');
                document.getElementById('err_kuantiti').style.display = "block";


            } else {
                $('#e102_b6').css('border', '');
                document.getElementById('err_kuantiti').style.display = "none";

            }

        }
    </script>
         <script>
            function check() {
                // (B1) INIT
                var error = "",
                    field = "";



                // kumpulan
                field = document.getElementById("e102_b4");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                    $('#e102_b4').css('border-color', 'red');
                    document.getElementById('err_sl').style.display = "block";
                }
                // kumpulan
                field = document.getElementById("e102_b5");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                    $('#e102_b5').css('border-color', 'red');
                    document.getElementById('err_ke').style.display = "block";
                }
                // kumpulan
                field = document.getElementById("e102_b6");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                    $('#e102_b6').css('border-color', 'red');
                    document.getElementById('err_kuantiti').style.display = "block";
                }




                // (B4) RESULT
                if (error == "") {

    document.getElementById("checkBtn").setAttribute("type", "submit");
    return true;
    } else {
    document.getElementById("checkBtn").setAttribute("type", "button");

    return false;
    }


                // if (error == "") {
                // return true;
                // } else {
                // toastr.error(
                // 'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                // 'Ralat!', {
                // "progressBar": true
                // })
                // return false;
                // }
            }
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
        function validation_jumlah() {
            var total3 = $("#total3").val();
            // var jumlah = $("#total").val();
            var jumlah = $("#jumlah").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(total3));

            // document.getElementById('total').innerHTML = jumlah_input.toFixed(2);
            document.getElementById('jumlah').innerHTML = jumlah_input.toFixed(2);
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

            var x = $('#e102_b6').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e102_b6').val(x);

            return true;

    });
    </script>
    <script>
        function invokeFunc() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e102_b5').focus();
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
                    document.getElementById('e102_b6').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    </body>

    </html>
@endsection
