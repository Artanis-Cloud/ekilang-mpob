@extends('layouts.main')

@section('content')
    <div class="page-wrapper" style="transition: 0s">
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
            <form action="{{ route('oleo.add.bahagian.ib') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="">

                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 1(b)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Produk Minyak Isirung Sawit
                            </h5>
                        </div>
                        <hr>

                        <div class="container center mt-4" >

                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk dan Kod</span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <select class="form-control select2" id="produk" name="e104_b4" required oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')" oninput="this.setCustomValidity('')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('e104_b4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b5' onchange="b5()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc()" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b5" required title="Sila isikan butiran ini.">
                                    @error('e104_b5')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Awal di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b6' onchange="b6()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc2()" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b6" required title="Sila isikan butiran ini.">
                                    @error('e104_b6')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>



                            <div class="row" >
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian/Terimaan &nbsp;<i class="fa fa-exclamation-circle"
                                        style="color: red; cursor: pointer;"
                                        title="Jumlah Belian/Terimaan adalah termasuk jumlah Import."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b7' onchange="b7()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc3()" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b7" required title="Sila isikan butiran ini.">
                                    @error('e104_b7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Jumlah Yang Diproses</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b9' onchange="b9()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc4()" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b9" required title="Sila isikan butiran ini.">
                                    @error('e104_b9')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row" >

                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan/Edaran Tempatan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b10' onchange="b10()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc5()" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b10" required title="Sila isikan butiran ini.">
                                    @error('e104_b10')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <span class="">Eksport</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b11' onchange="b11()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc6()" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b11" required title="Sila isikan butiran ini.">
                                    @error('e104_b11')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" >
                                {{-- - <div class="col-md-3 mt-3">
                                    <span>Import</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e104_b8'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b8" required title="Sila isikan butiran ini." readonly>
                                </div>--}}

                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir di Premis</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b12' onchange="b12()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc7()" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b12" required title="Sila isikan butiran ini.">
                                    @error('e104_b12')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir di Pusat Simpanan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_b13'  onchange="b13()"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" onkeypress="return isNumberKey(event)"
                                        style="width:100%" id="e104_b13" required title="Sila isikan butiran ini.">
                                    @error('e104_b13')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" >



                            </div>

                        </div>
                        <br>

                        <div class="row justify-content-center form-group" >
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>
            </form>

            <hr>
            <br>
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Isirung Sawit</h5>

            <section class="section">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="font-size: 13px">
                            <thead style="text-align: center">
                                <tr>
                                    <th>Produk Minyak Isirung Sawit</th>
                                    <th>Kod Produk</th>
                                    <th>Stok Awal Di Premis</th>
                                    <th>Stok Awal Di Pusat Simpanan</th>
                                    <th>Belian / Terimaan</th>
                                    <th>Import</th>
                                    <th>Jumlah yang Diproses</th>
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
                                            {{ $data->produk->proddesc}}
                                        </td>
                                        <td style="text-align: center">
                                            {{ $data->produk->prodid }}
                                        </td>
                                        <td>{{ number_format($data->e104_b5 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b6 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b7 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b8 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b9 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b10 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b11 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b12 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b13 ?? 0, 2) }}</td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#modal{{ $data->e104_b1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-toggle="modal"
                                                    data-target="#next2{{ $data->e104_b1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>

                                        </td>


                                    </tr>

                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e104_b1 }}" tabindex="-1"
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
                                                            action="{{ route('oleo.edit.bahagian.ib', [$data->e104_b1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Nama Produk </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b4' class="form-control"
                                                                        value="{{ $data->produk->proddesc }}" readonly>
                                                                </div>
                                                                <label class="required">Stok Awal Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b5'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b5 }}">
                                                                </div>
                                                                <label class="required">Stok Awal Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b6'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b6 }}">
                                                                </div>
                                                                <label class="required">Belian / Terimaan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b7'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b7 }}">
                                                                </div>
                                                                <label>Import </label>
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Import"
                                                                        class="form-control" readonly>
                                                                </div>

                                                                <label class="required">Jumlah yang Diproses</label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b9'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b9 }}">
                                                                </div>
                                                                <label class="required">Jualan / Edaran Tempatan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b10'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b10 }}">
                                                                </div>
                                                                <label class="required">Eksport </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b11'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b11 }}">
                                                                </div>
                                                                <label class="required">Stok Akhir Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b12'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b12 }}">
                                                                </div>
                                                                <label class="required">Stok Akhir Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b13'
                                                                        oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b13 }}">
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

                                    <div class="modal fade" id="next2{{ $data->e104_b1 }}" tabindex="-1"
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
                                                    <a href="{{ route('oleo.delete.bahagianib',[$data->e104_b1]) }}"
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
                                    <td style="text-align: right"><b>{{ number_format($total ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total2 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total3 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total4 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total5 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total6 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total7 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total8 ?? 0, 2) }}</b></td>
                                    <td style="text-align: right"><b>{{ number_format($total9 ?? 0, 2) }}</b></td>

                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>


        </div>

        <div class="form-group" style="padding: 10px; ">
                <a href="{{ route('oleo.bahagiania') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
                <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                    data-target="#next">Simpan &
                    Seterusnya</button>
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
                        <a href="{{ route('oleo.bahagianic') }}" type="button" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Ya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </form>


    {{-- <div id="preloader"></div> --}}
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="assets/js/main.js"></script>

    <script src="{{ asset('theme/libs/DataTables2/datatables.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}
@endsection
@section('scripts')
<script>
    function invokeFunc() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e104_b6').focus();
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
                document.getElementById('e104_b7').focus();
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
                document.getElementById('e104_b9').focus();
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
                document.getElementById('e104_b10').focus();
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
                document.getElementById('e104_b11').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
<script>
    function invokeFunc6() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e104_b12').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
<script>
    function invokeFunc7() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e104_b13').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
<script>
    function b5() {

        // let decimal = ".00"
        var x = parseFloat(document.getElementById("e104_b5").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b5").value = y;
        console.log(y);
    }
</script>
<script>
    function b6() {
        // let decimal = ".00"
        var x = parseFloat(document.getElementById("e104_b6").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b6").value = y;
        console.log(y);
    }
</script>
<script>
    function b7() {
         // let decimal = ".00"
         var x = parseFloat(document.getElementById("e104_b7").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b7").value = y;
        console.log(y);
    }
</script>
<script>
    function b9() {
         // let decimal = ".00"
         var x = parseFloat(document.getElementById("e104_b9").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b9").value = y;
        console.log(y);
    }
</script>
<script>
    function b10() {
         // let decimal = ".00"
         var x = parseFloat(document.getElementById("e104_b10").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b10").value = y;
        console.log(y);
    }
</script>
<script>
    function b11() {
        // let decimal = ".00"
        var x = parseFloat(document.getElementById("e104_b11").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b11").value = y;
        console.log(y);
    }
</script>
<script>
    function b12() {
         // let decimal = ".00"
         var x = parseFloat(document.getElementById("e104_b12").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b12").value = y;
        console.log(y);
    }
</script>
<script>
    function b13() {
         // let decimal = ".00"
         var x = parseFloat(document.getElementById("e104_b13").value);
        if(isNaN(x)){
            x = 0.00;
        }
        var y = parseFloat(x).toFixed(2);
        document.querySelector("#e104_b13").value = y;
        console.log(y);
    }
</script>
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

    </body>

    </html>
@endsection
