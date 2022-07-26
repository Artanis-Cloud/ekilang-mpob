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
                    <h4 class="page-title" >Kemasukan Penyata Bulanan
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
                        @endif  {{ $tahun }}</h4>
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
            <form action="{{ route('penapis.add.bahagian.v') }}" method="post" class="sub-form">
                @csrf
                <div class="card-body" style="padding: 2%">
                    <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71);">Bahagian 5 (a) & (b)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Belian/Terimaan Bekalan Produk Sawit (Sendiri dan Luar)</h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>
                        <div class="container center mt-4">

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Sendiri/Luar</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <select class="form-control" id="e101_d3" name="e101_d3" style="width: 70%" required oninput="this.setCustomValidity('')"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        <option value="1"> SENDIRI </option>
                                        <option value="2"> LUAR </option>
                                    </select>
                                    @error('e101_d3')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian/Terimaan Dari</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <select class="form-control" id="e101_d4" style="width:70%" name="e101_d4" required oninput="this.setCustomValidity('')"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        <option value="1">KILANG BUAH</option>
                                        <option value="2">KILANG PENAPIS</option>
                                        <option value="3">KILANG ISIRUNG</option>
                                        <option value="4">KILANG OLEOKIMIA</option>
                                        <option value="5">PUSAT SIMPANAN</option>
                                        <option value="6">PENIAGA</option>
                                        <option value="9">LAIN-LAIN</option>
                                    </select>
                                    @error('e101_d4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">CPO</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e101_d5' style="width: 70%" id="e101_d5"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="this.setCustomValidity(''); invoke_d5()" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')">
                                    @error('e101_d5')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">PPO</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e101_d6' style="width: 70%" id="e101_d6"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="this.setCustomValidity(''); invoke_d6()" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')">
                                    @error('e101_d6')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">CPKO</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e101_d7' style="width: 70%" id="e101_d7"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="this.setCustomValidity(''); invoke_d7()" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')">
                                    @error('e101_d7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">PPKO</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e101_d8' style="width: 70%" id="e101_d8"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="this.setCustomValidity(''); invoke_d8()" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')">
                                    @error('e101_d8')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row justify-content-center form-group" style="margin-top: 2%; ">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>


            </form>
            <hr>
            <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:3%; margin-bottom:3%">Senarai Belian/Terimaan
                Bekalan Produk Sawit (Sendiri dan Luar)
            </h5>

            <section class="section">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="font-size: 13px">
                            <thead>
                                <tr style="text-align: center">
                                    <th>Sendiri/Luar</th>
                                    <th>Belian/Terimaan dari</th>
                                    <th>CPO</th>
                                    <th>PPO</th>
                                    <th>CPKO</th>
                                    <th>PPKO</th>
                                    <th>Kemaskini</th>
                                    <th>Hapus?</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyata as $data)
                                    <tr style="text-align: right">

                                        <td style="text-align: left">{{ $data->kodsl->catname }}</td>
                                        <td style="text-align: left">{{ $data->prodcat->catname }}</td>
                                        <td>{{ number_format($data->e101_d5 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_d6 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_d7 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_d8 ?? 0, 2) }}</td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e101_d1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e101_d1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e101_d1 }}" tabindex="-1"
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
                                                            action="{{ route('penapis.edit.bahagian.v', [$data->e101_d1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Sendiri/Luar </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e101_d3"
                                                                            name="e101_d3" oninput="enableKemaskini({{ $data->e101_d1 }})">
                                                                            <option hidden value="{{ $data->e101_d3 }}">
                                                                                {{ $data->kodsl->catname }}</option>
                                                                            <option value="1"> SENDIRI</option>
                                                                            <option value="2"> LUAR </option>

                                                                        </select>
                                                                    </fieldset>
                                                                    {{-- <input type="text" name='e101_d3'
                                                                                    class="form-control"
                                                                                    value="{{ $data->kodsl[0]->catname }}"
                                                                                    readonly> --}}

                                                                </div>
                                                                <label class="required">Belian/Terimaan dari </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e101_d4"
                                                                            name="e101_d4" oninput="enableKemaskini({{ $data->e101_d1 }})">
                                                                            <option hidden value="{{ $data->e101_d4 }}">
                                                                                {{ $data->prodcat->catname }}</option>
                                                                            <option value="1">KILANG BUAH</option>
                                                                            <option value="2">KILANG PENAPIS</option>
                                                                            <option value="3">KILANG ISIRUNG</option>
                                                                            <option value="4">KILANG OLEOKIMIA</option>
                                                                            <option value="5">PUSAT SIMPANAN</option>
                                                                            <option value="6">PENIAGA</option>
                                                                            <option value="9">LAIN-LAIN</option>
                                                                        </select>
                                                                    </fieldset>

                                                                </div>
                                                                <label class="required">CPO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d5' id="e101_sd5{{ $data->e101_d1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_sd5({{ $data->e101_d1 }}) "
                                                                        value="{{ number_format($data->e101_d5 ,2) }}" required>
                                                                </div>
                                                                <label class="required">PPO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d6' id="e101_sd6{{ $data->e101_d1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_sd6({{ $data->e101_d1 }}) "
                                                                        value="{{ number_format($data->e101_d6 ,2) }}" required>
                                                                </div>
                                                                <label class="required">CPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d7' id="e101_sd7{{ $data->e101_d1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_sd7({{ $data->e101_d1 }}) "
                                                                        value="{{ number_format($data->e101_d7 ,2) }}" required>
                                                                </div>
                                                                <label class="required">PPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d8' id="e101_sd8{{ $data->e101_d1 }}"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_sd8({{ $data->e101_d1 }}) "
                                                                        value="{{ number_format($data->e101_d8 ,2) }}" required>
                                                                </div>
                                                            </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1" disabled id="kemaskini{{ $data->e101_d1 }}">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal fade" id="next2{{ $data->e101_d1 }}" tabindex="-1"
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
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                    </button>
                                                    <a href="{{ route('penapis.delete.bahagianv', [$data->e101_d1]) }}"
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

                                    <td colspan="2"><b>JUMLAH (SENDIRI)</b></td>
                                    {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                    <td style="text-align: right"><b>{{ number_format($totala ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totala2 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totala3 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totala4 ?? 0, 2) }}</b></td>

                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>
                                {{-- <td><br></td> --}}
                                {{-- belian/terimaan luar --}}
                                @foreach ($penyata2 as $data)
                                    <tr style="text-align: right">

                                        <td style="text-align: left">{{ $data->kodsl->catname }}</td>
                                        <td style="text-align: left">{{ $data->prodcat->catname }}</td>
                                        <td>{{ number_format($data->e101_d5 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_d6 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_d7 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_d8 ?? 0, 2) }}</td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e101_d1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e101_d1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e101_d1 }}" tabindex="-1"
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
                                                            action="{{ route('penapis.edit.bahagian.v', [$data->e101_d1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Sendiri/Luar </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e101_d3"
                                                                            name="e101_d3" oninput="enableKemaskini({{ $data->e101_d1 }})">
                                                                            <option hidden value="{{ $data->e101_d3 }}">
                                                                                {{ $data->kodsl->catname }}</option>
                                                                            <option value="1"> SENDIRI</option>
                                                                            <option value="2"> LUAR </option>

                                                                        </select>
                                                                    </fieldset>
                                                                </div>
                                                                <label class="required">Belian/Terimaan dari </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e101_d4"
                                                                            name="e101_d4" oninput="enableKemaskini({{ $data->e101_d1 }})">
                                                                            <option hidden value="{{ $data->e101_d4 }}">
                                                                                {{ $data->prodcat->catname }}</option>
                                                                            <option value="1">KILANG BUAH</option>
                                                                            <option value="2">KILANG PENAPIS</option>
                                                                            <option value="3">KILANG ISIRUNG</option>
                                                                            <option value="4">KILANG OLEOKIMIA</option>
                                                                            <option value="5">PUSAT SIMPANAN</option>
                                                                            <option value="6">PENIAGA</option>
                                                                            <option value="9">LAIN-LAIN</option>
                                                                        </select>
                                                                    </fieldset>

                                                                </div>
                                                                <label class="required">CPO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d5' id="e101_ed5{{ $data->e101_d1 }}"
                                                                        class="form-control" onkeypress="return isNumberKey(event)" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_ed5({{ $data->e101_d1 }})"
                                                                        value="{{ number_format($data->e101_d5 ,2) }}">
                                                                </div>
                                                                <label class="required">PPO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d6' id="e101_ed6{{ $data->e101_d1 }}"
                                                                        class="form-control" onkeypress="return isNumberKey(event)" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_ed6({{ $data->e101_d1 }})"
                                                                        value="{{ number_format($data->e101_d6 ,2) }}">
                                                                </div>
                                                                <label class="required">CPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d7' id="e101_ed7{{ $data->e101_d1 }}"
                                                                        class="form-control" onkeypress="return isNumberKey(event)" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_ed7({{ $data->e101_d1 }})"
                                                                        value="{{ number_format($data->e101_d7 ,2) }}">
                                                                </div>
                                                                <label class="required">PPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d8' id="e101_ed8{{ $data->e101_d1 }}"
                                                                        class="form-control" onkeypress="return isNumberKey(event)" onchange="autodecimal(this); FormatCurrency(this)"
                                                                        oninput="validate_two_decimal(this);enableKemaskini({{ $data->e101_d1 }}); invoke_ed8({{ $data->e101_d1 }})"
                                                                        value="{{ number_format($data->e101_d8 ,2)}}">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1" disabled id="kemaskini{{ $data->e101_d1 }}">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal fade" id="next2{{ $data->e101_d1 }}" tabindex="-1"
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
                                                    <a href="{{ route('penapis.delete.bahagianv', [$data->e101_d1]) }}"
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

                                    <td colspan="2"><b>JUMLAH (LUAR)</b></td>
                                    {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                    <td style="text-align: right"><b>{{ number_format($totalb ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totalb2 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totalb3 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totalb4 ?? 0, 2) }}</b></td>

                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>


                            </tbody>

                        </table>

                    </div>
                </div>

                <div class="form-group" style="padding:10px">
                    <a href="{{ route('penapis.bahagianivb') }}" class="btn btn-primary"
                        style="float: left">Sebelumnya</a>
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                            data-target="#next">Simpan & Seterusnya</button>
                </div>

                <!-- Vertically Centered modal Modal -->
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
                                <a href="{{ route('penapis.paparpenyata') }}" type="button"
                                    class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>



@endsection
@section('scripts')
<script>
    function invoke_d5() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_d6').focus();
            }

        });
    }

    function invoke_d6() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_d7').focus();
            }

        });
    }

    function invoke_d7() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_d8').focus();
            }

        });
    }

    function invoke_ed5(key) {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_ed6' + key).focus();
            }

        });
    }

    function invoke_ed6(key) {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_ed7' + key).focus();
            }

        });
    }

    function invoke_ed7(key) {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_ed8' + key).focus();
            }

        });
    }


    function invoke_sd5(key) {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_sd6' + key).focus();
            }

        });
    }

    function invoke_sd6(key) {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_sd7' + key).focus();
            }

        });
    }

    function invoke_sd7(key) {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e101_sd8' + key).focus();
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
        var x = $('#e101_d5').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e101_d5').val(x);

        var x = $('#e101_d6').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e101_d6').val(x);

        var x = $('#e101_d7').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e101_d7').val(x);


        var x = $('#e101_d8').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e101_d8').val(x);


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
        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>

@endsection
