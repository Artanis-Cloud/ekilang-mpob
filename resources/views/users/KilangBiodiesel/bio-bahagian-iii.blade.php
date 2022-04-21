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
            <div class="row mb-2">
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
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}


                        <div class="card-body">
                                    <form action="{{ route('bio.add.bahagian.iii') }}" method="post">
                                        @csrf
                                        <div class="mb-4 text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71); ">Bahagian III</h3>
                                            <h5 style="color: rgb(39, 80, 71)">Ringkasan Produk Biodiesel dan Glycerine
                                            </h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>

                                        <div class="container center mt-4" style="margin-left:4%">

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <span class="required">Nama Produk</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="ebio_c3" name="ebio_c3"
                                                        style="width: 50%">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach ($produk as $data)
                                                            <option value="{{ $data->prodid }}">
                                                                {{ $data->prodname }} - {{ $data->prodid }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                                <div class="col-md-3">
                                                    <span class="required">Digunakan Untuk Proses Selanjutnya</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='ebio_c7'
                                                        style="width:50%" id="ebio_c7">
                                                </div>

                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-3">
                                                    <span class="required">Stok Awal di Premis</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='ebio_c4'
                                                        style="width:50%" id="ebio_c4" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="required">Jualan / Edaran Tempatan </span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='ebio_c8'
                                                        style="width:50%" id="ebio_c8" required
                                                        title="Sila isikan butiran ini.">
                                                    <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                                        style="font-size:11px; color:red" type="button"
                                                        data-toggle="modal" data-target="#modal" &nbsp;>  (Sila klik untuk
                                                        mengisi<br> maklumat
                                                        jualan)</i>

                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>

                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-3">
                                                    <span class="required">Belian / Terimaan</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='ebio_c5'
                                                        style="width:50%" id="ebio_c5" required
                                                        title="Sila isikan butiran ini.">
                                                </div>

                                                <div class="col-md-3">
                                                    <span class="required">Eksport </span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='ebio_c9'
                                                        style="width:50%" id="ebio_c9" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-3">
                                                    <span class="required">Pengeluaran</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='ebio_c6'
                                                        style="width:50%" id="ebio_c6" required
                                                        title="Sila isikan butiran ini.">
                                                </div>

                                                <div class="col-md-3">
                                                    <span class="required">Stok Akhir Dilapor</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='ebio_c10'
                                                        style="width:50%" id="ebio_c10" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}

                                                    <input type="hidden" class="form-control" name='ebio_sykt'
                                                        style="width:50%" id="myInputHidden1" required>
                                                    <input type="hidden" class="form-control" name='ebio_jumlah'
                                                        style="width:50%" id="myInputHidden2" required>
                                                </div>
                                            </div>







                                        </div>
                                        <br>

                                        <div class="row form-group" style="padding-top: 10px; ">


                                            <div class="row form-group" style="margin-left: 45%;">
                                                <div class="text-right col-md-12 mb-4 ">
                                                    <button type="submit" class="btn btn-primary ">Tambah</button>
                                                </div>
                                            </div>

                                    </form>
                                    <section class="section">

                                    <hr>
                                    <br>

                                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Minyak-Minyak Lain</h5>
                                    <br>
                                    {{-- <section class="section"> --}}
                                        <div class="card">

                                            {{-- <div class="card-body"> --}}
                                            <div class="table-responsive"  >
                                                <table class="table table-bordered" style="font-size: 13px">
                                                    <thead style="text-align: center">
                                                        <tr>
                                                            <th>Nama Produk</th>
                                                            <th>Kod Produk</th>
                                                            <th>Stok Awal Di Premis</th>
                                                            <th>Belian / Terimaan</th>
                                                            <th>Pengeluaran</th>
                                                            <th>Digunakan Untuk Proses Selanjutnya</th>
                                                            <th>Jualan / Edaran Tempatan <br><i
                                                                    class="fa fa-file-text-o"></i></th>
                                                            <th>Eksport</th>
                                                            <th>Stok Akhir Dilapor</th>
                                                            <th>Kemaskini</th>
                                                            <th>Hapus?</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($penyata as $key => $data)
                                                            <tr style="text-align: right">
                                                                {{-- <td class="text-center">{{ $key+1 }}</td> --}}
                                                                <td style="text-align: left">{{ $data->produk->prodname }}
                                                                </td>
                                                                <td>{{ $data->produk->prodid }}</td>
                                                                <td>{{ number_format($data->ebio_c4 ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->ebio_c5 ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->ebio_c6 ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->ebio_c7 ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->ebio_c8 ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                                <td>{{ number_format($data->ebio_c10 ?? 0, 2) }}</td>
                                                                {{-- <td>{{ $data->e104_b13 }}</td> --}}
                                                                {{-- <td>{{ $data->e104_b14 }}</td> --}}
                                                                <td>
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="#" type="button" data-toggle="modal"
                                                                            data-target="#modal{{ $data->ebio_c1 }}">
                                                                            <i class="fas fa-edit fa-lg"
                                                                                style="color: #ffc107">
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

                                                                <!--scrolling content Modal -->
                                                                <div class="modal fade"
                                                                    id="modal{{ $data->ebio_c1 }}" tabindex="-1"
                                                                    role="dialog"
                                                                    aria-labelledby="exampleModalScrollableTitle"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-scrollable"
                                                                        role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalScrollableTitle">
                                                                                    Kemaskini Maklumat Produk</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
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
                                                                                            <input type="text"
                                                                                                name='ebio_c3'
                                                                                                class="form-control"
                                                                                                value="{{ $data->produk->prodname }}"
                                                                                                readonly>
                                                                                        </div>
                                                                                        <label>Stok Awal Di Premis </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text"
                                                                                                name='ebio_c4'
                                                                                                class="form-control"
                                                                                                value="{{ $data->ebio_c4 }}">
                                                                                        </div>
                                                                                        <label>Belian / Terimaan
                                                                                        </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text"
                                                                                                name='ebio_c5'
                                                                                                class="form-control"
                                                                                                value="{{ $data->ebio_c5 }}">
                                                                                        </div>
                                                                                        <label>Pengeluaran </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text"
                                                                                                name='ebio_c6'
                                                                                                class="form-control"
                                                                                                value="{{ $data->ebio_c6 }}">
                                                                                        </div>
                                                                                        {{-- <label>Import </label>
                                                                                                <div class="form-group">
                                                                                                    <input type="password" placeholder="Password"
                                                                                                        class="form-control">
                                                                                                </div> --}}
                                                                                        <label>Digunakan Untuk Proses
                                                                                            Selanjutnya </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text"
                                                                                                name='ebio_c7'
                                                                                                class="form-control"
                                                                                                value="{{ $data->ebio_c7 }}">
                                                                                        </div>
                                                                                        <label>Jualan / Edaran
                                                                                            Tempatan</label>
                                                                                        <div class="form-group">
                                                                                            <input type="text"
                                                                                                name='ebio_c8'
                                                                                                class="form-control"
                                                                                                value="{{ $data->ebio_c8 }}">
                                                                                        </div>
                                                                                        <label>Eksport
                                                                                        </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text"
                                                                                                name='ebio_c9'
                                                                                                class="form-control"
                                                                                                value="{{ $data->ebio_c9 }}">
                                                                                        </div>
                                                                                        <label>Stok Akhir Dilapor </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text"
                                                                                                name='ebio_c10'
                                                                                                class="form-control"
                                                                                                value="{{ $data->ebio_c10 }}">
                                                                                        </div>
                                                                                        <label>Stok Akhir Di Pusat Simpanan
                                                                                        </label>

                                                                                    </div>
                                                                            </div>


                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-light-secondary"
                                                                                    data-dismiss="modal">
                                                                                    <i
                                                                                        class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span
                                                                                        class="d-none d-sm-block">Batal</span>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary ml-1">
                                                                                    <i
                                                                                        class="bx bx-check d-block d-sm-none"></i>
                                                                                    <span
                                                                                        class="d-none d-sm-block">Kemaskini</span>
                                                                                </button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal fade" id="next2{{ $data->ebio_c1 }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalCenterTitle"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalCenterTitle">
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
                                                                            <button type="button"
                                                                                class="btn btn-light-secondary"
                                                                                data-dismiss="modal">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block"
                                                                                    style="color:#275047">Tidak</span>
                                                                            </button>
                                                                            <a href="{{ route('bio.delete.bahagian.iii', [$data->ebio_c1]) }}"
                                                                                type="button" class="btn btn-primary ml-1">

                                                                                <i
                                                                                    class="bx bx-check d-block d-sm-none"></i>
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





                                <div class="row form-group" >


                                    <div class="text-left col-md-5">
                                        <a href="{{ route('bio.bahagianii') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>
                                    </div>
                                    <div class="text-right col-md-7">
                                        <button type="button" class="btn btn-primary " data-toggle="modal"
                                            style="float: right" data-target="#next">Hantar Penyata</button>
                                    </div>

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
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu menyimpan maklumat ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <a href="{{ route('bio.paparpenyata') }}" type="button"
                                                    class="btn btn-primary ml-1">

                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--scrolling content Modal -->
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                    Maklumat Jualan / Edaran</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- <form action="{{ route('bio.add.bahagian.iii.jualan')}}"
                                                    method="post">
                                                    @csrf --}}
                                                {{-- <form action="/action_page.php"> --}}
                                                <div class="modal-body">
                                                    <label>Nama Syarikat </label>
                                                    <div class="form-group">
                                                        <input type="text" id="ebio_sykt1" name='ebio_sykt1'
                                                            class="form-control" value="">
                                                    </div>
                                                    <label>Jumlah Jualan / Edaran </label>
                                                    <div class="form-group">
                                                        <input type="text" id="ebio_jumlah1" name='ebio_jumlah1'
                                                            class="form-control" value="">
                                                    </div>
                                                </div>
                                                </form>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                                                    <i class=" bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" id="btnShow" >Tambah</span>
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            </form>

                        </div>


                    </div>

                </div>


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
        // function inputHidden() {
        //     var ebio_sykt = $("#ebio_sykt").val();
        //     var ebio_jumlah = $("#ebio_jumlah").val();

        //     document.getElementById("ebio_sykt").value = ebio_sykt;
        //     document.getElementById("ebio_jumlah").value = ebio_jumlah;
        // }
        $(document).ready(function() {
                    $("#btnShow").on('click', function() {
                        console.log('nasuk');

                        var getTxtValue1 = $("#ebio_sykt1").val(); // this gives textbox value
                        var getTxtValue2 = $("#ebio_jumlah1").val(); // this gives textbox value
                        $("#myInputHidden1").val(getTxtValue1); // this will set hidden field value
                        $("#myInputHidden2").val(getTxtValue2); // this will set hidden field value
                        // alert(getTxtValue1);
                        // alert(getTxtValue2);
                        console.log('#btnShow');
                    });
                })

                // function transferid(){
                //     // console.log('nasuk');

                //         var getTxtValue1 = $("#ebio_sykt1").val(); // this gives textbox value
                //         var getTxtValue2 = $("#ebio_jumlah1").val(); // this gives textbox value
                //         $("#myInputHidden1").val(getTxtValue1); // this will set hidden field value
                //         $("#myInputHidden2").val(getTxtValue2); // this will set hidden field value
                //         // alert(getTxtValue1);
                //         // alert(getTxtValue2);
                //         // console.log('#btnShow');
                //         $('#modal').modal('hide');
                // }
    </script>
    </body>

    </html>
@endsection
