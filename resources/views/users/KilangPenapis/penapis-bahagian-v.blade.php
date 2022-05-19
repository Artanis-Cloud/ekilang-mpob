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
                    <h4 class="page-title">Kemasukan Penyata Bulanan</h4>
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
            <form action="{{ route('penapis.add.bahagian.v') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="pl-3">
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71);">Bahagian 5 (a) & (b)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Belian/Terimaan Bekalan Produk Sawit (Sendiri dan Luar)</h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>
                        <div class="container center mt-4" style="margin-left:4%">

                            <div class="row">
                                <div class="col-md-3">
                                    <span class="required">Sendiri / Luar</span>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="e101_d3" name="e101_d3" style="width: 50%" required>
                                        <option selected hidden disabled>Sila Pilih</option>
                                        <option value="1"> SENDIRI </option>
                                        <option value="2"> LUAR </option>
                                    </select>
                                    @error('e101_d3')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <span class="required">PPO</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_d6' style="width: 50%" id="e101_d6"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_d6')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="required">Belian/Terimaan Dari</span>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="e101_d4" style="width:50%" name="e101_d4" required>
                                        <option selected hidden disabled>Sila Pilih</option>
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

                                <div class="col-md-3">
                                    <span class="required">CPKO</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_d7' style="width: 50%" id="e101_d7"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_d7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="required">CPO</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_d5' style="width: 50%" id="e101_d5"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_d5')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <span class="required">PPKO</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_d8' style="width: 50%" id="e101_d8"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_d8')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row form-group" style="margin-top: 5%; ">



                            <div class="text-right col-md-6 mb-4 ">
                                <button type="submit" class="btn btn-primary" style="margin-left:96%">Tambah</button>
                            </div>

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
                                    <th>Sendiri / Luar</th>
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
                                                                <label class="required">Sendiri / Luar </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e101_d3"
                                                                            name="e101_d3">
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
                                                                            name="e101_d4">
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
                                                                    <input type="text" name='e101_d5'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d5 }}">
                                                                </div>
                                                                <label class="required">PPO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d6'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d6 }}">
                                                                </div>
                                                                <label class="required">CPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d7'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d7 }}">
                                                                </div>
                                                                <label class="required">PPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d8'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d8 }}">
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

                                    <td colspan="2"><b>JUMLAH</b></td>
                                    {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                    <td style="text-align: right"><b>{{ number_format($totala ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totala2 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totala3 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($totala4 ?? 0, 2) }}</b></td>

                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>
                                {{-- <td><br></td> --}}
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
                                                                <label class="required">Sendiri / Luar </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-control" id="e101_d3"
                                                                            name="e101_d3">
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
                                                                            name="e101_d4">
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
                                                                    <input type="text" name='e101_d5'
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d5 }}">
                                                                </div>
                                                                <label class="required">PPO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d6'
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d6 }}">
                                                                </div>
                                                                <label class="required">CPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d7'
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d7 }}">
                                                                </div>
                                                                <label class="required">PPKO </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_d8'
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_d8 }}">
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

                                    <td colspan="2"><b>JUMLAH</b></td>
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
                <div class="row form-group" style="padding-top: 10px; ">


                    <div class="text-left col-md-5">
                        <a href="{{ route('penapis.bahagianivb') }}" class="btn btn-primary"
                            style="float: left">Sebelumnya</a>
                    </div>
                    <div class="text-right col-md-7">
                        <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                            data-target="#next">Papar Penyata</button>
                    </div>

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
        </form>

    </div>



    </section><!-- End Hero -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->

    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
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




    </body>

    </html>
@endsection
