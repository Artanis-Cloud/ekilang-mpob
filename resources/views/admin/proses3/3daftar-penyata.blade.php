@extends('layouts.main')

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid rgba(204, 204, 204, 0);
        background-color: #f7f9fd00;
    }

    /* Style the buttons that are used to open the tab content */
    .tab a {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab a:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab a.active {
        background-color: #dee2e6;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }

</style>


@section('content')
    </style>
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
                    <h4 class="page-title">Konfigurasi</h4>
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

            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a style="color:black; border-radius:unset; font-size:14.4px;" class="btn btn-work tablinks"
                    onclick="openInit(event, 'All')" id="defaultOpen">Initialize Semua Pelesen</a>
                {{-- <button class="tablinks" onclick="openInit(event, 'One')"> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'One')">Initialize Satu Pelesen</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                class="btn btn-work tablinks" onclick="openInit(event, 'month')">Initialize Setahun</a>

            </div>
            <div class="card" style="margin-right:2%; margin-left:2%">
                <div class="row" style="padding: 10px">
                    <div class="col-1 align-self-center">
                        <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                </div>

                {{-- tab for all pelesen --}}
                <div id="All" class="tabcontent">
                    <form action="{{ route('admin.initialize') }}">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%; margin-top:2%">Initialize Semua Pelesen
                            </h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px ">Daftar Penyata Bulanan Baru
                                Semua
                                Kilang
                            </h5>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="container center ">
                                <div class="row" style="margin-top:-2%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label align-items-center">Tahun
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" readonly name="e_tahun"
                                            value="{{ now()->year }}">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label align-items-center">Bulan
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" readonly name="e_bulan"
                                            value="{{ $month }}">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">Tarikh
                                        Akhir Penghantaran
                                    </label>

                                    <div class="col-md-6">
                                        <input type="date" id="datefield" class="form-control" placeholder="Bulan" name="e_ddate">
                                    </div>
                                </div>


                                <br>
                                <div class="row center">
                                    <div class="col-md-12 center">
                                        <button type="button" class="btn btn-primary center" style="margin-left:45%"
                                            data-toggle="modal" data-target="#myModal">Initialize</button>
                                        {{-- <button type="submit">YA</button> --}}
                                    </div>
                                </div>

                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu initialize semua pelesen?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                {{-- tab for one pelesen --}}
                <div id="One" class="tabcontent">
                    <form action="{{ route('admin.initialize.satu') }}">

                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%; margin-top:2%">Initialize Pelesen</h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px ">Daftar Penyata Bulanan Baru
                                Pelesen
                            </h5>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="container center ">


                                <div class="row" style="margin-top:-2%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label align-items-center">Tahun
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" readonly name="e_tahun"
                                            value="{{ now()->year }}">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label align-items-center">Bulan
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" readonly name="e_bulan"
                                            value="{{ $month }}">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">Tarikh
                                        Akhir Penghantaran
                                    </label>

                                    <div class="col-md-6">
                                        <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                            name="e_ddate">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">No
                                        Lesen Pelesen
                                    </label>

                                    <div class="col-md-6">
                                        <input type="text" id="company-column" class="form-control" placeholder="No Lesen"
                                            name="e_initlesen" maxlength="12">
                                    </div>
                                </div>



                                <br>
                                <div class="row center">
                                    <div class="col-md-12 center">
                                        <button type="button" class="btn btn-primary center" style="margin-left:45%"
                                            data-toggle="modal" data-target="#myModal2">Initialize</button>
                                        {{-- <button type="submit">YA</button> --}}
                                    </div>
                                </div>

                                <div id="myModal2" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu initialize pelesen ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div id="month" class="tabcontent">
                    <form action="{{ route('admin.initialize.satu') }}">

                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%; margin-top:2%">Initialize Pelesen</h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px ">Daftar Penyata Bulanan Baru
                                Pelesen
                            </h5>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="container center ">


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" style="font-size: 13px">
                                        <thead style="text-align: center">
                                            <tr style="vertical-align: middle; background-color:lightgrey">
                                                <th style="vertical-align: middle">Bulan</th>
                                                <th style="vertical-align: middle">Tarikh Mula Penghantaran</th>
                                                <th style="vertical-align: middle">Tarikh Akhir Penghantaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="text-center" scope="row">1</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">2</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">3</th>
                                                <td >
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">4</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">5</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">6</th>
                                                <td >
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">7</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">8</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">9</th>
                                                <td >
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">10</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">11</th>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center"  scope="row">12</th>
                                                <td >
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                                <td>
                                                    <input type="date" id="datefield2" class="form-control" placeholder="Bulan"
                                                    name="e_ddate" value="{{ old('date', date('Y-m-d')) }}">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>



                                <br>
                                <div class="row center">
                                    <div class="col-md-12 center">
                                        <button type="button" class="btn btn-primary center" style="margin-left:45%"
                                            data-toggle="modal" data-target="#myModal2">Initialize</button>
                                        {{-- <button type="submit">YA</button> --}}
                                    </div>
                                </div>

                                <div id="myModal2" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu initialize pelesen ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>
                        </div>
                    </form>
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
            });
        });
    </script>
    <script>
        function openInit(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <script>
        // Use Javascript
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today);
    </script>

    <script>
        // Use Javascript
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield2").setAttribute("min", today);
    </script>
@endsection
