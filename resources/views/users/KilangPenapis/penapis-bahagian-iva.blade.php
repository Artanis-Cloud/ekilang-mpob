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
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
                        <form action="{{ route('penapis.add.bahagian.iva') }}" method="post">
                            @csrf
                            <div class="card-body">
                                    <div class="pl-3">
                                        <div class="mb-4 text-center">
                                            <h3 style="color: rgb(39, 80, 71);">Bahagian IV(a)</h3>
                                            <h5 style="color: rgb(39, 80, 71)">Produk Akhir Berasaskan Minyak Sawit dan
                                                Minyak Isirung Sawit
                                                - Bahan Makanan</h5>
                                        </div>
                                        <hr>
                                        <div class="container center mt-4" style="margin-left:4%">

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <span class="required">Nama Produk</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="produk"
                                                        name="e101_c4" style="width: 50%">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach ($produk as $data)
                                                            <option value="{{ $data->prodid }}">
                                                                {{ $data->prodname }} -   {{ $data->prodid }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <span class="required" >Stok Awal Di Premis </span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='e101_c5'style="width: 50%"
                                                        id="e101_c5" required onkeypress="return isNumberKey(event)"
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="required">Jualan / Edaran Tempatan</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='e101_c8'style="width: 50%"
                                                        id="e101_c8" required onkeypress="return isNumberKey(event)"
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>



                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <span class="required">Belian/Terimaan</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='e101_c6' style="width: 50%"
                                                        id="e101_c6" required onkeypress="return isNumberKey(event)"
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="required">Eksport</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='e101_c9' style="width: 50%"
                                                        id="e101_c9" required onkeypress="return isNumberKey(event)"
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>

                                            </div>


                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <span class="required">Pengeluaran</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='e101_c7' style="width: 50%"
                                                        id="e101_c7" required onkeypress="return isNumberKey(event)"
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="required">Stok Akhir Di Premis</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name='e101_c10' style="width: 50%"
                                                        id="e101_c10" required onkeypress="return isNumberKey(event)"
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>

                                            </div>



                                        </div>


                                        <div class="row form-group" style="margin-top: 5%; ">



                                            <div class="text-right col-md-6 mb-4 ">
                                                <button type="submit" class="btn btn-primary" style="margin-left:96%">Tambah</button>
                                            </div>

                                        </div>
                                    </div>


                        </form>

                        <hr>

                        <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:3%">Senarai Produk Akhir Berasaskan Minyak Sawit dan
                            Minyak Isirung Sawit
                            - Bahan Makanan</h5>

                        <section class="section">
                            <div class="card">

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0"  style="font-size: 13px">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th>Nama Produk</th>
                                                <th>Kod Produk</th>
                                                <th>Stok Awal Di Premis</th>
                                                <th>Belian / Terimaan</th>
                                                <th>Pengeluaran</th>
                                                <th>Jualan / Edaran Tempatan</th>
                                                <th>Eksport</th>
                                                <th>Stok Akhir Di Proses</th>
                                                <th>Kemaskini</th>
                                                <th>Hapus?</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penyata as $data)
                                                <tr style="text-align: right">
                                                <td  style="text-align: left">{{ $data->produk->prodname  }}</td>
                                                <td>{{ $data->produk->prodid  }}</td>
                                                <td>{{ number_format($data->e101_c5 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c6 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c7 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c8 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c9 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c10 ??  0,2) }}</td>
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#"
                                                            type="button" data-toggle="modal"
                                                            data-target="#modal{{ $data->e101_c1 }}">
                                                            <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#" type="button"
                                                            data-toggle="modal"  data-target="#next2{{ $data->e101_c1 }}">
                                                            <i class="fa fa-trash"
                                                                style="color: #dc3545;font-size:18px"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="col-md-6 col-12">

                                                <!--scrolling content Modal -->
                                                <div class="modal fade" id="modal{{ $data->e101_c1 }}"
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
                                                                    action="{{ route('penapis.edit.bahagian.iva', [$data->e101_c1]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <label>Nama Produk </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c4'
                                                                                class="form-control"
                                                                                value="{{ $data->produk->prodname }}" readonly>
                                                                        </div>
                                                                        <label>Stok Awal </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c5' onkeypress="return isNumberKey(event)"
                                                                                class="form-control" value="{{  $data->e101_c5 }}">
                                                                        </div>
                                                                        <label>Belian / Penerimaan </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c6'
                                                                                class="form-control" value="{{ $data->e101_c6 }}">
                                                                        </div>
                                                                        {{-- <label>Import </label>
                                                                        <div class="form-group">
                                                                            <input type="password" placeholder="Password"
                                                                                class="form-control">
                                                                        </div> --}}
                                                                        <label>Pengeluaran </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c7' onkeypress="return isNumberKey(event)"
                                                                                class="form-control" value="{{ $data->e101_c7 }}">
                                                                        </div>
                                                                        <label>Jualan / Edaran Dalam Negeri </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c8' onkeypress="return isNumberKey(event)"
                                                                                class="form-control" value="{{ $data->e101_c8 }}">
                                                                        </div>
                                                                        <label>Eksport </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c9' onkeypress="return isNumberKey(event)"
                                                                                class="form-control" value="{{ $data->e101_c9 }}">
                                                                        </div>
                                                                        <label>Stok Akhir </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c10' onkeypress="return isNumberKey(event)"
                                                                                class="form-control" value="{{ $data->e101_c10 }}">
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


                                            <div class="modal fade" id="next2{{ $data->e101_c1 }}" tabindex="-1" role="dialog"
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
                                                                Anda pasti mahu menghapus maklumat ini?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                            </button>
                                                            <a href="{{ route('penapis.delete.bahagianiva',[$data->e101_c1]) }}" type="button"
                                                                class="btn btn-primary ml-1">

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
                                            <td style="text-align: right"><b>{{ number_format($total ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total2 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total3 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total4 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total5 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total6 ??  0,2) }}</b></td>

                                            <td colspan="2"></td>
                                            {{-- <td></td> --}}

                                        </tr>
                                            <br>

                                        </tbody>

                                    </table>

                                </div>
                            </div>












                    <div class="row form-group" style="padding-top: 10px; ">


                        <div class="text-left col-md-5">
                            <a href="{{ route('penapis.bahagianiii') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>
                        </div>
                        <div class="text-right col-md-7">
                            <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                                data-target="#next">Simpan &
                                Seterusnya</button>
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
                                    <a href="{{ route('penapis.bahagianivb') }}" type="button"
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
