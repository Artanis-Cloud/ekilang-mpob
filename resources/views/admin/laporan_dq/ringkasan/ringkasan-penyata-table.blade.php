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

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
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
                <div class="col-7 align-self-center" id="breadcrumb">
                    <div class="d-flex align-items-center justify-content-end">

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a style="color:black; border-radius:unset; font-size:14.4px; background-color: lightgray"
                    class="btn btn-work tablinks" >Ringkasan Penyata</a>

                <a href="{{ route('admin.ringkasan.bahagian1') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks">Bahagian 1</a>

                <a href="{{ route('admin.ringkasan.bahagian2') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks">Bahagian 2</a>

                <a href="{{ route('admin.ringkasan.bahagian3') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" >Bahagian 3</a>

                <a href="{{ route('admin.ringkasan.jualan.bio') }}"
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" >Maklumat Jualan Biodiesel</a>

            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" style="margin-right:2%; margin-left:2%">

                            <div class="row" style="padding: 10px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>

                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:-1%">Ringkasan Urusniaga Maklumat Penyata Bulanan</h3>
                                {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5> --}}
                            </div>


                            <div class="card-body">
                                <hr>
                                <div class="mb-5 col-8" style="text-align: left">
                                    <i>Arahan: Sila pastikan anda melengkapkan semua maklumat di kawasan yang bertanda '</i><b style="color: red">
                                        *</b><i>'</i>
                                </div>
                                <form action="{{ route('admin.ringkasan.penyata.process') }}" method="get">
                                    @csrf
                                    <div class="container center">

                                        <div class="row">
                                            <div class="col-md-4 ml-auto">
                                                <div class="form-group">
                                                    <label class="required">Tahun</label>
                                                    <select class="form-control" name="tahun" id="date-dropdown" required>
                                                        <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                        @for ($i = 2011; $i <= date('Y'); $i++)
                                                            <option>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Negeri</label>
                                                    <select class="form-control" id="negeri_id" name="e_negeri"
                                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                        oninput="setCustomValidity('')"
                                                        onchange="ajax_daerah(this)" >
                                                        <option selected hidden disabled value="">Sila Pilih</option>
                                                        @foreach ($negeri as $data)
                                                            <option value="{{ $data->kod_negeri }}">
                                                                {{ $data->nama_negeri }}
                                                            </option>
                                                        @endforeach
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Daerah</label>
                                                    <select class="form-control" id="daerah_id" name='e_daerah'
                                                        placeholder="Daerah"
                                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                        oninput="setCustomValidity('')">
                                                        <option selected hidden disabled value="">
                                                            Sila Pilih Negeri Terlebih Dahulu
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-5 mr-auto ">
                                                <div class="form-group" >
                                                    <label>No. Pelesen</label>
                                                    <select class="form-control select2" name="e_nl">

                                                        <option selected hidden disabled value="">Sila Pilih</option>
                                                        @foreach ($users2 as $data)
                                                            <option value="{{ $data->e_nl }}">
                                                                {{ $data->e_nl }} - {{ $data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="text-right col-md-6 mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary" style="margin-left:90%">Carian</button>
                                    </div>

                                </form>
                                {{-- <div class="text-right col-md-6 mb-4 mt-4"><a href="{{ route('admin.laporan.ringkasan') }}">
                                    <button type="button"  class="btn btn-primary" data-toggle="modal"
                                        >Carian</button>
                                        </a>
                                </div> --}}
                                <section class="section"><hr>
                                    <div class="card"><br>

                                        <h6 style="color: rgb(30, 28, 28); text-align:center">Senarai Ringkasan Urusniaga Maklumat Penyata Bulanan <br>Tahun: {{ $tahun }}</h6>

                                        <div class="table-responsive " >
                                            <table  class="table table-bordered text-center" style="width: 100%; font-size:13px">
                                                <thead>
                                                    <tr style= "background-color:#d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle">Bil.</th>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Nama Pelesen</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Daerah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($result as $key => $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            {{-- <td>{{ $data->ebio_thn }}</td> --}}
                                                            <td> <a
                                                                href="{{ route('admin.laporan.ringkasan', [$data->e_nl, $data->ebio_thn]) }}"><u>
                                                                    {{ $data->e_nl }}</u></a></td>

                                                            <td class="text-left">{{ $data->e_np }}</td>
                                                            <td>{{ $data->nama_negeri ?? '-'}}</td>
                                                            <td>{{ $data_daerah[$key]->nama_daerah ?? '-' }}</td>


                                                        </tr>
                                                    @endforeach
                                                    {{-- <tr>
                                                        <td>1</td>
                                                        <td><a href="{{ route('admin.laporan.ringkasan') }}">500403125000</a></td>
                                                        <td>CAROTECH BERHAD (CHEMOR PLANT)</td>
                                                        <td>PERAK</td>
                                                        <td>KUALA KANGSAR</td>


                                                    </tr> --}}

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </section>
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
        function ajax_produk(select) {
            kumpulan = select.value;
            console.log(kumpulan);
            //clear jenis_data selection
            $("#kod_produk").empty();
            //initialize selection
            $("#kod_produk").append('<option value="" selected disabled hidden>Sila Pilih Kumpulan Produk</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-produk/" + kumpulan, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        console.log(respond[x]);
                        $("#kod_produk").append('<option value="' + respond[x].prodname + '">' +
                            respond[x]
                            .proddesc + '</option>');
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
        function ajax_produk_b2(select) {
            kumpulan = select.value;
            console.log(kumpulan);
            //clear jenis_data selection
            $("#kod_produk2").empty();
            //initialize selection
            $("#kod_produk2").append('<option value="" selected disabled hidden>Sila Pilih Kumpulan Produk</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-produk/" + kumpulan, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        console.log(respond[x]);
                        $("#kod_produk2").append('<option value="' + respond[x].prodname + '">' +
                            respond[x]
                            .proddesc + '</option>');
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


    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("#message").remove(); //tambah untuk remove flash message
            }, 5000); // 5 secs  (1 sec = 1000)
        });
    </script>

    <script type="text/javascript">
        function showTable() {
            var bulan = $('#bulan').val();
            // console.log(oer);

            if (bulan == "equal") {
                document.getElementById('equal_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";
            } else {
                document.getElementById('equal_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }

            if (bulan == "between") {
                document.getElementById('between_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";

            } else {
                document.getElementById('between_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }
        }

    </script>
     <script type="text/javascript">
        function showTable2() {
            var bulan = $('#bulan2').val();
            // console.log(oer);

            if (bulan == "equal") {
                document.getElementById('equal_container2').style.display = "block";
                document.getElementById('lain_container2').style.display = "block";
            } else {
                document.getElementById('equal_container2').style.display = "none";
                document.getElementById('lain_container2').style.display = "block";

            }

            if (bulan == "between") {
                document.getElementById('between_container2').style.display = "block";
                document.getElementById('lain_container2').style.display = "block";

            } else {
                document.getElementById('between_container2').style.display = "none";
                document.getElementById('lain_container2').style.display = "block";

            }
        }

    </script>
    <link href="{{ asset('nice-admin/assets/css/cdn.css') }}  " rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
                $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script type="text/javascript">
        window.onload = function() {
            //Reference the DropDownList.
            var ddlYears = document.getElementById("date-dropdown");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = 2011; i <= currentYear; i++) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }
        };
    </script>
@endsection
