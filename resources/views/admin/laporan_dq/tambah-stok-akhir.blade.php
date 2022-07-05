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
                    <h4 class="page-title">Hebahan 10hb
                    </h4>
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

        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Stok Akhir
                            </h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Tambah Stok Akhir</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row ml-auto" style="margin-top:-1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="bulan">
                                            <option value="01">2011</option>
                                            <option value="02">2012</option>
                                            <option value="03">2013</option>
                                            <option value="04">2014</option>
                                            <option value="05">2015</option>
                                            <option value="06">2016</option>
                                            <option value="07">2017</option>
                                            <option value="08">2018</option>
                                            <option value="09">2019</option>
                                            <option value="10">2020</option>
                                            <option value="11">2021</option>
                                            <option value="12">2022</option>
                                            <option value="12">2023</option>
                                            <option value="12">2024</option>


                                            <option selected hidden disabled>Sila Pilih Tahun</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row mt-2 ml-auto">
                                    <label
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="bulan">
                                            <option value="01">JANUARI</option>
                                            <option value="02">FEBRUARI</option>
                                            <option value="03">MAC</option>
                                            <option value="04">APRIL</option>
                                            <option value="05">MEI</option>
                                            <option value="06">JUN</option>
                                            <option value="07">JULAI</option>
                                            <option value="08">OGOS</option>
                                            <option value="09">SEPTEMBER</option>
                                            <option value="10">OKTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DISEMBER</option>


                                            <option selected hidden disabled>Sila Pilih Bulan</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-12 mb-4 mt-4" style="margin-left:44%">

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#stock">Get Stock</button>
                                    {{-- </div> --}}
                                </div>
                                <hr>
                                <br>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Semenanjung Malaysia</b>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-5 ml-auto">
                                        <label class="control-label">CPO</label>
                                        <input type="text" id="lastName" class="form-control form-control-danger"
                                            placeholder="0.00">
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPO</label>
                                            <input type="text" id="lastName" class="form-control form-control-danger"
                                                placeholder="0.00" value="">
                                        </div>
                                    </div>
                                    <!--/span-->

                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ml-auto">
                                        <div class="form-group">
                                            <label class="control-label">CPKO</label>
                                            <input type="text" id="firstName" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPKO</label>
                                            <input type="text" id="lastName" class="form-control form-control-danger"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <br>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sabah</b></div>
                                <div class="row p-t-20">
                                    <div class="col-md-5 ml-auto">
                                        <label class="control-label">CPO</label>
                                        <input type="text" id="lastName" class="form-control form-control-danger"
                                            placeholder="0.00">
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPO</label>
                                            <input type="text" id="lastName" class="form-control form-control-danger"
                                                placeholder="0.00" value="">
                                        </div>
                                    </div>
                                    <!--/span-->

                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ml-auto">
                                        <div class="form-group">
                                            <label class="control-label">CPKO</label>
                                            <input type="text" id="firstName" class="form-control"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPKO</label>
                                            <input type="text" id="lastName" class="form-control form-control-danger"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <br>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sarawak</b></div>
                                <div class="row p-t-20">
                                    <div class="col-md-5 ml-auto">
                                        <label class="control-label">CPO</label>
                                        <input type="text" id="lastName" class="form-control form-control-danger"
                                            placeholder="0.00">
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPO</label>
                                            <input type="text" id="lastName" class="form-control form-control-danger"
                                                placeholder="0.00" value="">
                                        </div>
                                    </div>
                                    <!--/span-->

                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ml-auto">
                                        <div class="form-group">
                                            <label class="control-label">CPKO</label>
                                            <input type="text" id="firstName" class="form-control"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPKO</label>
                                            <input type="text" id="lastName" class="form-control form-control-danger"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                            </div>
                            <!--scrolling content Modal -->
                            <div class="modal fade" id="stock" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                STOK AKHIR</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                            action="{{ route('admin.tambah.stok.akhir.proses') }}"
                                            method="get">
                                            @csrf
                                            <div class="modal-body">
                                                <label class="required">Tahun</label>
                                                <div class="form-group">
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="tahun" name="tahun">
                                                            <option selected hidden disabled value="">Sila Pilih
                                                                Tahun</option>
                                                            @for ($i = 2003; $i <= date('Y'); $i++)
                                                                <option>{{ $i }}</option>
                                                            @endfor

                                                        </select>
                                                    </fieldset>

                                                </div>
                                                <label class="required">Bulan </label>
                                                <div class="form-group">
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="bulan" name="bulan">
                                                            <option selected hidden disabled value="">Sila Pilih
                                                                Bulan</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Mac</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Jun</option>
                                                            <option value="07">Julai</option>
                                                            <option value="08">Ogos</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Disember</option>
                                                        </select>
                                                    </fieldset>

                                                </div>
                                                <div class="float-right ">
                                                    <button type="submit" class="btn btn-primary ml-1">
                                                        <i class="bx bx-check d-block d-sm-none" onclick="$('#stock').modal({'backdrop': 'static'});"></i>
                                                        <span class="d-none d-sm-block">Query</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mb-4"></div>

                                            <hr>
                                            <div class="col-12 mt-2 mb-2" style="background-color:lightgrey">
                                                <b>SEMENANJUNG MALAYSIA</b>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>CPO: </label>
                                                    <div class="form-group">
                                                        <input type="text" name='cpo' class="form-control"
                                                          value="{{ $cpo_sm }}"  readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <label>PPO: </label>
                                                    <div class="form-group">
                                                        <input type="text" name='ppo' class="form-control"
                                                            value="" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>CPKO: </label>
                                                    <div class="form-group">
                                                        <input type="text" name='cpko' class="form-control"
                                                            value="" readonly>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <label>PPKO: </label>
                                                    <div class="form-group">
                                                        <input type="text" name='ppko' class="form-control"
                                                            value="" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </form>

                            <div class="modal fade" id="stock2" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                STOK AKHIR</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row " style="margin-top:-1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-3 control-label col-form-label  align-items-center">Tahun
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Tahun" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="row " style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-3 control-label col-form-label  align-items-center">Bulan
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary ml-1 ">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Query</span>
                                                        </button>
                                                    </div>
                                                    <br>

                                                    <div class="col-12 mt-2 mb-2" style="background-color:lightgrey">
                                                        <b>SEMENANJUNG MALAYSIA</b>
                                                    </div>
                                                    <br>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">CPO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>

                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">PPO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">CPKO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">PPKO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="col-12 mt-2 mb-2" style="background-color:lightgrey">
                                                        <b>SABAH</b>
                                                    </div>

                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">CPO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>

                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">PPO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">CPKO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">PPKO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="col-12 mt-2 mb-2" style="background-color:lightgrey">
                                                        <b>SARAWAK</b>
                                                    </div>

                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">CPO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>

                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">PPO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">CPKO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:1%">
                                                        <label for="fname"
                                                            class="text-left col-sm-2 control-label col-form-label  align-items-center">PPKO
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Bulan" value="" readonly>

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
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
                            <div class="col-12 mb-4 mt-4" style="margin-left:41%">
                                {{-- <div class="text-left"> --}}
                                <a href="{{ route('admin.stok.akhir') }}" type="button"
                                    class="btn btn-primary">Kembali</a>
                                {{-- </div> --}}
                                {{-- <div class="text-right ml-auto"> --}}

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#next">Tambah</button>
                                {{-- </div> --}}
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>




    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "",
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
                "columnDefs": [{
                    'targets': [0, 7, 8],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }]

            });
        });
    </script>
@endsection
