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

    tr {
    border-top: 1px solid #ccc;
    }
    td, th {
    vertical-align: top;
    text-align: left;
    width:150px;
    padding: 5px;
    }

    @media screen
    {
        .noPrint{}
        .noScreen{display:none;}
    }

    @media print
    {
        @page {size: auto !important}
        .noPrint{display:none;}
        .noScreen{}
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
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dynamic Query Biodiesel
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
            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a  href="{{ route('admin.ringkasan.penyata') }}"
                    style="color:black; border-radius:unset; font-size:14.4px;"
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

                <a
                    style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem; background-color: lightgray"
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
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Jualan Biodiesel</h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h5> --}}
                        </div>
                        <hr>

                        <div class="card-body">
                            <form action="{{ route('admin.ringkasan.jualan.bio.process') }}" method="get">
                            @csrf
                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto">
                                            <div class="form-group">
                                                <label class="required">Tahun</label>
                                                <select class="form-control" name="tahun"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')" required>
                                                    <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                    <option value="2011" {{ ($tahun == '2011') == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2012" {{ ($tahun == '2012')  == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2013" {{ ($tahun == '2013')  == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2014" {{ ($tahun == '2014')  == '2014' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2015" {{ ($tahun == '2015')  == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2016" {{ ($tahun == '2016')  == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2017" {{ ($tahun == '2017')  == '2017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2018" {{ ($tahun == '2018')  == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2019" {{ ($tahun == '2019')  == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2020" {{ ($tahun == '2020')  == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2021" {{ ($tahun == '2021')  == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2022" {{ ($tahun == '2022')  == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2023" {{ ($tahun == '2023')  == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2024" {{ ($tahun == '2024')  == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    {{-- @endif --}}


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Negeri</label>
                                                <select class="form-control" id="negeri_id" name="e_negeri"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')"
                                                onchange="ajax_daerah(this)" >
                                                    <option selected  value="">Sila Pilih Negeri</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}" {{(old('e_negeri', $negeri_req) == $data->kod_negeri ? 'selected' : '')}}>
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
                                            <div class="form-group">
                                                <label>No. Pelesen</label>
                                                <select class="form-control select2" name="e_nl" style="width: 10%">
                                                    <option selected\ value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}" {{(old('e_nl', $lesen) == $data->e_nl ? 'selected' : '')}}>
                                                            {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pembeli</label>
                                                <select class="form-control select2" name="pembeli" style="width: 10%">
                                                    <option selected\ value="">Sila Pilih</option>
                                                    @foreach ($pembeli as $data)
                                                        <option value="{{ $data->id }}" {{(old('id', $pemb_req) == $data->id ? 'selected' : '')}}>
                                                            {{ $data->pembeli }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>

                                    </div>


                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4" id="scroll-section" >
                                    <button type="submit" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        data-target="#next">Carian</button>
                                </div>
                            </form>
                            <section class="section"><hr>
                                <div class="card">
                                    <div class="text-center">
                                        <h4 style="color: black; text-align:center; font-weight:500">Senarai Ringkasan Jualan Biodiesel
                                        </h4>
                                        <h4 style="color: rgb(30, 28, 28); text-align:center">Tahun:  {{ $tahun }} </h4>
                                    </div>

                                    <div class="table-responsive " id="printableArea" >
                                        <div class="noScreen text-center">
                                            <h4 style="color: black; text-align:center; font-weight:500">Senarai Ringkasan Jualan Biodiesel</h4>
                                            <h4 style="color: black; text-align:center; font-weight:300">Tahun: {{ $tahun }}</h4>
                                        </div>
                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example4')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>


                                        <table  id="example4" class="table table-hover table-bordered"  style="width: 100%; font-size:13px">
                                            <thead>
                                                <tr style="background-color: #d3d3d34d">

                                                    <th style="vertical-align: middle; text-align:center"
                                                        >No Lesen</th>
                                                    <th style="vertical-align: middle; text-align:center"
                                                       >Nama Pemegang Lesen</th>
                                                    <th style="vertical-align: middle; text-align:center"
                                                        >Negeri</th>
                                                    <th style="vertical-align: middle; text-align:center"
                                                        >Daerah</th>
                                                    <th style="vertical-align: middle; text-align:center"
                                                        >Pembeli</th>
                                                    <th style="vertical-align: middle; text-align:center"
                                                        >Kuantiti</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach ($result as $key => $data)
                                                    <tr>
                                                        <td>{{ $data->e_nl }}</td>
                                                        <td class="text-left">{{ $data->e_np }}</td>
                                                        <td>{{ $data->nama_negeri }}</td>
                                                        <td>{{ $data_daerah[$key]->nama_daerah }}</td>

                                                        <td class="text-left">{{ $data->pembeli ?? '-'}}</td>
                                                        <td style="text-align: center; mso-number-format:'#,##0.00'">
                                                            <b>{{ number_format($jualan_bio[$data->e_nl] ?? 0,2) }}</b>
                                                        </td>

                                                    </tr>

                                                @endforeach

                                            </tbody><br>

                                        </table>
                                    </div>
                                    <br>
                                    <br>

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
    function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
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
    <script>
        function ExportToExcel()
            {
                var filename = "Ringkasan"
                var tab_text = "<table border='2px'><tr bgcolor=''>";
                var textRange;
                var j = 0;
                tab = document.getElementById('example4');

                for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                }

                tab_text = tab_text + "</table>";
                var a = document.createElement('a');
                var data_type = 'data:application/vnd.ms-excel';
                a.href = data_type + ', ' + encodeURIComponent(tab_text);
                a.download = filename + '.xls';
                a.click();
                    }
    </script>
    <script>
        $(document).ready(function() {
            $('html, body').animate({
                scrollTop: $("#scroll-section").offset().top
                }, 1000);
        })
    </script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <link  href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"rel="stylesheet" >
@endsection
