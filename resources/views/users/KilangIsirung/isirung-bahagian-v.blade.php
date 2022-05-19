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
            <form action="{{ route('isirung.add.bahagian.v') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="pl-3">
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71);">Bahagian 5</h3>
                            <h5 style="color: rgb(39, 80, 71)">Jualan / Edaran Dedak Isirung Sawit - (PKC)
                                (33)
                            </h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>
                        <div class="container center mt-3" style="margin-left: 4%">
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="">Jualan / Edaran:</span>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="e102_b4" style=" width:50%" name="e102_b4" required>
                                        <option selected hidden disabled>Sila Pilih</option>
                                        @foreach ($prodcat as $data)
                                            <option value="{{ $data->catid }}">
                                                {{ $data->catname }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('e102_b4')
                                        <div class="alert alert-danger" style="margin-right:20%">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <span class="">Ke:</span>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="e102_b5" style=" margin-left:-30%; width:50%"
                                        name="e102_b5" required>
                                        <option selected hidden disabled>Sila Pilih</option>

                                        <option value="3">KILANG ISIRUNG</option>
                                        <option value="5">PENIAGA</option>
                                        <option value="7">LAIN-LAIN</option>


                                    </select>
                                    @error('e102_b5')
                                        <div class="alert alert-danger" style="margin-right:50%; margin-left:-30%">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="">Kuantiti:</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e102_b6' style="width:50%" id="e102_b6" oninput="validate_two_decimal(this)"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini.">
                                        @error('e102_b6')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row form-group" style="margin-top: 2%; ">



                            <div class="text-right col-md-6 mb-4 ">
                                <button type="submit" class="btn btn-primary" style="margin-left:96%">Tambah</button>
                            </div>

                        </div>
            </form>

            <hr>
            {{-- <br> --}}
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Jualan / Edaran Dedak Isirung Sawit -
                (PKC) (33)</h5>

            <section class="section">
                <div class="card">

                    {{-- <div class="card-body"> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr style="text-align: center">
                                    <th>Jualan / Edaran</th>
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
                                                                            name="e102_b4">
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
                                                                            name="e102_b5">
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
                                                                    <input type="text" name='e102_b6' class="form-control" oninput="validate_two_decimal(this)"
                                                                        id='e102_b6' onkeypress="return isNumberKey(event)"
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
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                    </button>
                                                    <a href="{{ route('isirung.bahagianv.delete', [$data->e102_b1]) }}"
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
                                    <td style="text-align: right"><b><span name='total' id='total'>
                                                {{ number_format($total, 2) }}</span></b>
                                        <input type="hidden" name="total" value="{{ $total }}">
                                    </td>
                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>

                                <tr>
                                    <td><br></td>
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
                                                                            name="e102_b4">
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
                                                                            name="e102_b5">
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
                                                                    <input type="text" name='e102_b6' oninput="validate_two_decimal(this)"
                                                                        class="form-control" id='e102_b6'
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
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                    </button>
                                                    <a href="{{ route('isirung.bahagianv.delete', [$data->e102_b1]) }}"
                                                        type="button" class="btn btn-primary ml-1">

                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ya</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <form action="{{ route('isirung.bahagianv.process') }}" method="post">
                                    @csrf
                                    <tr>

                                        <td colspan="2"><b>JUMLAH</b></td>
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




        <div class="row form-group" style="padding-top: 10px; ">


            <div class="text-left col-md-5">
                <a href="{{ route('isirung.bahagianiv') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
            </div>
            <div class="text-right col-md-7 mb-4 ">
                <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                    data-target="#next">Simpan & Seterusnya</button>
            </div>

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
    </div>
    <br><br>

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
    </body>

    </html>
@endsection
