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
                    <h4 class="page-title">Senarai Penyata Bulanan Terkini</h4>
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
                <a style="color:black; border-radius:unset; font-size:14.4px;"
                class="btn btn-work tablinks" onclick="openInit(event, 'All')" id="defaultOpen">Initialize Semua Pelesen</a>
            {{-- <button class="tablinks" onclick="openInit(event, 'One')"> --}}
            <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                class="btn btn-work tablinks" onclick="openInit(event, 'One')">Initialize Satu Pelesen</a>
            {{-- </button> --}}

            </div>
            <div class="card" style="margin-right:2%; margin-left:2%">

                {{-- tab for all pelesen --}}
                <div id="All" class="tabcontent">

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
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">User
                                    ID
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="company-column" class="form-control" placeholder=" No. Lesen"
                                        name="company-column">
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                            </div>

                            <div class="row" style="margin-top:1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Kata
                                    Laluan
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="company-column" class="form-control"
                                        placeholder="Kata Laluan Baru (8 Aksara)" name="company-column">
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                            </div>
                            <div class="row" style="margin-top:1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect">
                                            <option selected hidden disabled>Sila Pilih Tahun</option>

                                            <option>2003</option>
                                            <option>2004</option>
                                            <option>2005</option>
                                            <option>2006</option>
                                            <option>2007</option>
                                            <option>2008</option>
                                            <option>2009</option>
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>



                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect">
                                            <option selected hidden disabled>Sila Pilih Bulan</option>
                                            <option>Januari</option>
                                            <option>Februari</option>
                                            <option>Mac</option>
                                            <option>April</option>
                                            <option>Mei</option>
                                            <option>Jun</option>
                                            <option>Julai</option>
                                            <option>Ogos</option>
                                            <option>September</option>
                                            <option>Oktober</option>
                                            <option>November</option>
                                            <option>Disember</option>



                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row" style="margin-top: -1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Tarikh
                                    Akhir Penghantaran
                                </label>

                                <div class="col-md-6">
                                    <input type="date" id="company-column" class="form-control" placeholder="Bulan"
                                        name="company-column">
                                </div>
                            </div>



                            <br>
                            <div class="row center">
                                <div class="col-md-12 center">
                                    <button type="submit" class="btn btn-primary center" style="margin-left:45%"
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
                </div>

                {{-- tab for one pelesen --}}
                <div id="One" class="tabcontent">

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
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">User
                                    ID
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="company-column" class="form-control" placeholder=" No. Lesen"
                                        name="company-column">
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                            </div>

                            <div class="row" style="margin-top:1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Kata
                                    Laluan
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="company-column" class="form-control"
                                        placeholder="Kata Laluan Baru (8 Aksara)" name="company-column">
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                            </div>
                            <div class="row" style="margin-top:1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect">
                                            <option selected hidden disabled>Sila Pilih Tahun</option>

                                            <option>2003</option>
                                            <option>2004</option>
                                            <option>2005</option>
                                            <option>2006</option>
                                            <option>2007</option>
                                            <option>2008</option>
                                            <option>2009</option>
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>



                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect">
                                            <option selected hidden disabled>Sila Pilih Bulan</option>
                                            <option>Januari</option>
                                            <option>Februari</option>
                                            <option>Mac</option>
                                            <option>April</option>
                                            <option>Mei</option>
                                            <option>Jun</option>
                                            <option>Julai</option>
                                            <option>Ogos</option>
                                            <option>September</option>
                                            <option>Oktober</option>
                                            <option>November</option>
                                            <option>Disember</option>



                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row" style="margin-top: -1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Tarikh
                                    Akhir Penghantaran
                                </label>

                                <div class="col-md-6">
                                    <input type="date" id="company-column" class="form-control" placeholder="Bulan"
                                        name="company-column">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 1%">
                                <label for="fname"
                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">No Lesen Pelesen
                                </label>

                                <div class="col-md-6">
                                    <input type="text" id="company-column" class="form-control" placeholder="No Lesen"
                                        name="company-column">
                                </div>
                            </div>



                            <br>
                            <div class="row center">
                                <div class="col-md-12 center">
                                    <button type="submit" class="btn btn-primary center" style="margin-left:45%"
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
                    "lengthMenu": "Memaparkan _MENU_ rekod per  ",
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
@endsection
