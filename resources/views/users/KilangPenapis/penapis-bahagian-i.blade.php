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
            <form action="{{ route('penapis.add.bahagian.i') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="pl-3">

                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 1</h3>
                            <h5 style="color: rgb(39, 80, 71)">Produk Minyak Sawit
                            </h5>
                        </div>
                        <hr>

                        <div class="container center mt-4" style="margin-left:4%">

                            <div class="row">
                                <div class="col-md-3">
                                    <span class="required">Nama Produk dan Kod </span>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="produk" name="e101_b4" style="width: 50%" required>
                                        <option selected hidden disabled>Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->prodid }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('e101_b4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>


                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="required">Stok Awal Di Premis</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b5' style="width: 50%" id="e101_b5"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_b5')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <span class="required">Digunakan Untuk Proses Selanjutnya</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b10' style="width: 50%"
                                        id="e101_b10" required onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this)" title="Sila isikan butiran ini.">
                                    @error('e101_b10')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="required">Stok Awal Di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b6' style="width: 50%" id="e101_b6"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_b6')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <span class="required">Jualan / Edaran Tempatan</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b11' style="width: 50%"
                                        id="e101_b11" required onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this)" title="Sila isikan butiran ini.">
                                    @error('e101_b11')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="required"> Belian / Terimaan</span>
                                    <i class="fa fa-exclamation-circle" style="color: red"
                                        title="Sekiranya ada maklumat import, sila campurkan (+) dengan maklumat Belian/Terimaan.">
                                    </i>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b7' style="width: 50%" id="e101_b7"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_b7')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <span class="required">Eksport</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b12' style="width: 50%"
                                        id="e101_b12" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini." oninput="validate_two_decimal(this)">
                                    @error('e101_b12')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span>Import</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b8' style="width: 50%" id="e101_b8"
                                        title="Sila isikan butiran ini." readonly>
                                    @error('e101_b8')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <span class="required">Stok Akhir Di Premis</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b13' style="width: 50%"
                                        id="e101_b13" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini." oninput="validate_two_decimal(this)">
                                    @error('e101_b13')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="required">Pengeluaran</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b9' style="width: 50%" id="e101_b9"
                                        required onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this)">
                                    @error('e101_b9')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <span class="required">Stok Akhir Di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e101_b14' style="width: 50%"
                                        id="e101_b14" required onkeypress="return isNumberKey(event)"
                                        oninput="validate_two_decimal(this)" title="Sila isikan butiran ini.">
                                    @error('e101_b14')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>



                        </div>



                    </div>


                    <div class="row form-group" style="margin-top: 5%; ">



                        <div class="text-right col-md-6 mb-4 ">
                            <button type="submit" class="btn btn-primary" style="margin-left:90%">Tambah</button>
                        </div>

                    </div>
                    <input type="hidden" name="hidDelete" id="hidDelete" value="" />

            </form>

            <hr>
            <br>
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:-3%; margin-bottom:3%">Senarai Produk Minyak
                Sawit</h5>

            <section class="section">
                <div class="card">


                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="cuba" style="font-size: 13px">
                            <thead style="text-align: center">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Kod Produk</th>
                                    <th>Stok Awal Di Premis</th>
                                    <th>Stok Awal Di Pusat Simpanan</th>
                                    <th>Belian / Terimaan</th>
                                    <th>Import</th>
                                    <th>Pengeluaran</th>
                                    <th>Digunakan Untuk Proses Selanjutnya</th>
                                    <th>Jualan / Edaran Tempatan</th>
                                    <th>Eksport</th>
                                    <th>Stok Akhir Di Premis</th>
                                    <th>Stok Akhir Di Pusat Simpanan</th>
                                    <th>Kemaskini</th>
                                    <th>Hapus?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyata as $data)
                                    <tr style="text-align: right">

                                        <td style="text-align: left">
                                            {{ $data->produk->prodname }}
                                        </td>
                                        <td>
                                            {{ $data->produk->prodid }}
                                        </td>
                                        <td>{{ number_format($data->e101_b5 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b6 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b7 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b8 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b9 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b10 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b11 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b12 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b13 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e101_b14 ?? 0, 2) }}</td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e101_b1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e101_b1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e101_b1 }}" tabindex="-1"
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
                                                            action="{{ route('penapis.edit.bahagian.i', [$data->e101_b1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label>Nama Produk</label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b4' class="form-control"
                                                                        value="{{ $data->produk->prodname }}" readonly>
                                                                </div>
                                                                <label class="required">Stok Awal Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b5'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b5') ?? $data->e101_b5 }}">
                                                                </div>
                                                                <label class="required">Stok Awal Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b6'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ $data->e101_b6 }}">
                                                                </div>
                                                                <label class="required">Belian / Terimaan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b7'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b7') ?? $data->e101_b7 }}">
                                                                </div>
                                                                <label class="required">Import </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b8'
                                                                        class="form-control"
                                                                        value="{{ old('e101_b8') ?? $data->e101_b8 }}"
                                                                        readonly>
                                                                </div>
                                                                <label class="required">Pengeluaran </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b9'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b9') ?? $data->e101_b9 }}">
                                                                </div>
                                                                <label class="required">Digunakan Untuk Proses
                                                                    Selanjutnya</label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b10'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b10') ?? $data->e101_b10 }}">
                                                                </div>
                                                                <label class="required">Jualan / Edaran Dalam Negeri
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b11'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b11') ?? $data->e101_b11 }}">
                                                                </div>
                                                                <label class="required">Eksport </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b12'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b12') ?? $data->e101_b12 }}">
                                                                </div>
                                                                <label class="required">Stok Akhir Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b13'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b13') ?? $data->e101_b13 }}">
                                                                </div>
                                                                <label class="required">Stok Akhir Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e101_b14'
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        oninput="validate_two_decimal(this)"
                                                                        value="{{ old('e101_b14') ?? $data->e101_b14 }}">
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

                                    <div class="modal fade" id="next2{{ $data->e101_b1 }}" tabindex="-1"
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
                                                    <a href="{{ route('penapis.delete.bahagiani', [$data->e101_b1]) }}"
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
                                    <td style="text-align: right"><b>{{ number_format($total ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total2 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total3 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total4 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total5 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total6 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total7 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total8 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total9 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total10 ?? 0, 2) }}</b></td>

                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>
                            </tbody>
                        </table>
                    </div>





                </div>
                {{-- </div> --}}
                <div class=" row form-group" style="padding-top: 10px; ">


                    <div class="text-left col-md-5">
                        {{-- <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary" style="float: left">Sebelumnya</a> --}}
                    </div>
                    <div class="text-right col-md-7">
                        <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                            data-target="#next">Simpan &
                            Seterusnya</button>
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
                                <a href="{{ route('penapis.bahagianii') }}" type="button" class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        {{-- </form> --}}

        {{-- </div> --}}



        <script>
            function onlyNumberKey(evt) {

                // Only ASCII charactar in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".floatNumberField").change(function() {
                    $(this).val(parseFloat($(this).val()).toFixed(2));
                });
            });
        </script>

        </body>

        </html>
    @endsection
