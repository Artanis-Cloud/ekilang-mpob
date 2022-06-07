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
                    <h4 class="page-title">Oleokimia
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
                <div class="col-sm-2">
                    <div class="card card-hover" onclick="window.location='{{ URL::route('admin.laporan.bulanan') }}'">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%;">OYT 1</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Awal Di Premis
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 2</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Awal Di Pusat Simpanan
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 3</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Belian/Terimaan
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 4</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Import
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 5</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Pengeluaran
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 6</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="card card-hover" onclick="window.location='{{ URL::route('admin.laporan.bulanan') }}'">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 7</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Jualan / Edaran Tempatan
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 8</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Eksport
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 9</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir di Premis
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OYT 10</h3>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir di Pusat Simpanan
                            </h5>
                        </div>
                        <br>
                    </div>
                </div>

  






        </div>

    </div>

    </div>




    </div>
@endsection

@section('scripts')
    <script>
        function ajax_daerah(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_id").empty();
            //initialize selection
            $("#daerah_id").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-daerah/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#daerah_id").append('<option value="' + respond[x].kod_daerah + '">' +
                            respond[x]
                            .nama_daerah + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>

    <script>
        function ajax_kawasan(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#kawasan_id").empty();
            //initialize selection
            $("#kawasan_id").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-kawasan/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#kawasan_id").append('<option value="' + respond[x].kod_region + '">' +
                            respond[x]
                            .nama_region + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>



    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
@endsection
