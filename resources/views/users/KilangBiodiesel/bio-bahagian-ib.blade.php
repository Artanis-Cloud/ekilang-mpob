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
            {{-- <div class="card-header border-bottom">
                <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
            </div> --}}

            <div class="card-body">
                <div class="">
                    <form action="{{ route('bio.add.bahagian.ib') }}" method="post" style="margin: auto">
                        @csrf
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 1 (b)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Produk Minyak Isirung Sawit
                            </h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>

                        <div class="container center mt-4" >

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk dan Kod</span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <select class="form-control select2" id="ebio_b4" name="ebio_b4"
                                        required oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        oninput="this.setCustomValidity('')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b5'
                                        style="width:100%" id="ebio_b5" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" required
                                        title="Sila isikan butiran ini.">

                                    @error('ebio_b5')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                               <div class="col-md-3 mt-3">
                                    <span class="">Belian / Terimaan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b6'
                                        style="width:100%" id="ebio_b6" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" required
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
                                        style="width:100%" id="ebio_b7" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" required
                                        title="Sila isikan butiran ini.">

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
                                        style="width:100%" id="ebio_b8" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" required>

                                        @error('ebio_b8')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan / Edaran Tempatan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='ebio_b9'
                                        style="width:100%" id="ebio_b9" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" required
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
                                        style="width:100%" id="ebio_b10" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="this.setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" required
                                        title="Sila isikan butiran ini.">

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
                                        style="width:100%" id="ebio_b11" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="validate_two_decimal(this);setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" required
                                        title="Sila isikan butiran ini.">

                                    @error('ebio_b11')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row justify-content-center form-group" style="padding-top: 10px; ">
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>

                    </form>
                    <section class="section">
                    <hr>
                    <br>
                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Isirung
                        Sawit</h5>
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
                                            <th>Belian / Terimaan</th>
                                            <th>Pengeluaran</th>
                                            <th>Digunakan Untuk Proses Selanjutnya</th>
                                            <th>Jualan / Edaran Tempatan</th>
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
                                                    {{ $data->produk->proddesc }}</td>
                                                <td style="text-align: center">
                                                    {{ $data->produk->prodid }}</td>
                                                <td>{{ number_format($data->ebio_b5 ??  0,2) }}</td>
                                                <td>{{ number_format($data->ebio_b6 ?? 0 , 2) }}</td>
                                                <td>{{ number_format($data->ebio_b7 ??  0,2) }}</td>
                                                <td>{{ number_format($data->ebio_b8 ??  0,2) }}</td>
                                                <td>{{ number_format($data->ebio_b9 ??  0,2) }}</td>
                                                <td>{{ number_format($data->ebio_b10 ??  0,2) }}</td>
                                                <td>{{ number_format($data->ebio_b11 ??  0,2) }}</td>
                                                {{-- <td>{{ $data->ebio_b13 }}</td> --}}
                                                {{-- <td>{{ $data->e104_b14 }}</td> --}}
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#" type="button" data-toggle="modal"
                                                            data-target="#modal{{ $data->ebio_b1 }}">
                                                            <i class="fas fa-edit fa-lg"
                                                                style="color: #ffc107">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#" type="button"
                                                            data-toggle="modal"  data-target="#next2{{ $data->ebio_b1 }}">
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
                                                    id="modal{{ $data->ebio_b1 }}" tabindex="-1"
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
                                                                    action="{{ route('bio.edit.bahagian.ib', [$data->ebio_b1]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <label>Nama Produk </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name='ebio_b4'
                                                                                class="form-control"
                                                                                value="{{ $data->produk->prodname }}"
                                                                                readonly>
                                                                        </div>
                                                                        <label>Stok Awal Di Premis </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name='ebio_b5'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_b5 }}" oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Belian / Terimaan
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name='ebio_b6'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_b6 }}" oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Pengeluaran </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name='ebio_b7'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_b7 }}" oninput="validate_two_decimal(this)"
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
                                                                            <input type="text"
                                                                                name='ebio_b8'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_b8 }}" oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Jualan / Edaran
                                                                            Tempatan</label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name='ebio_b9'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_b9 }}" oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Eksport
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name='ebio_b10'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_b10 }}" oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </div>
                                                                        <label>Stok Akhir Dilapor </label>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name='ebio_b11'
                                                                                class="form-control"
                                                                                value="{{ $data->ebio_b11 }}" oninput="validate_two_decimal(this)"
                                                                                onkeypress="return isNumberKey(event)">
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
                                            <div class="modal fade" id="next2{{ $data->ebio_b1 }}" tabindex="-1" role="dialog"
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
                                                                Anda pasti mahu menghapus produk ini?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary ml-1"
                                                                data-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Tidak</span>
                                                            </button>
                                                            <a href="{{ route('bio.delete.bahagian.ib',[$data->ebio_b1]) }}"
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
                                            <td style="text-align: right"><b>{{ number_format($totalibb5 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($totalibb6 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($totalibb7 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($totalibb8 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($totalibb9 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($totalibb10 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($totalibb11 ??  0,2) }}</b></td>
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

                        <a href="{{ route('bio.bahagiania') }}" class="btn btn-primary"
                            style="float: left">Sebelumnya</a>

                        <button type="button" class="btn btn-primary " data-toggle="modal"
                            style="float: right" data-target="#next">Simpan &
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
                                <a href="{{ route('bio.bahagianic') }}" type="button"
                                    class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                </form>

            </div>





    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="assets/js/main.js"></script>

    <script src="{{ asset('theme/libs/DataTables2/datatables.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script>

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
        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>

    @endsection
        </div>
    </div>

</body>

</html>
