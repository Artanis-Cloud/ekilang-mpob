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
        <div class="page-breadcrumb mt-2">

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

        <div class="container-fluid">
            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a  href="{{ route('admin.ringkasan.penyata') }}"
                    style="color:black; border-radius:unset; font-size:14.4px;"
                    class="btn btn-work tablinks" >Ringkasan Penyata</a>

                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem; background-color: lightgray"
                    class="btn btn-work tablinks" >Bahagian 1</a>

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
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:-1%">Ringkasan Bahagian 1</h3>
                                {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 1</h5> --}}
                            </div>

                            <div class="card-body">
                                <hr>
                                <div class="mb-5 col-8" style="text-align: left">
                                    <i>Arahan: Sila pastikan anda melengkapkan semua maklumat di kawasan yang bertanda '</i><b style="color: red">
                                        *</b><i>'</i>
                                </div>
                                <form action="{{ route('admin.ringkasan.bahagian1.process') }}" class="needs-validation"  method="get" novalidate>
                                @csrf
                                    <div class="container center">

                                        <div class="row">
                                            <div class="col-md-4 ml-auto ">

                                                <div class="form-group">
                                                    <label class="required">Tahun</label>
                                                    <select class="form-control" name="tahun" required id="tahun_id" oninput="valid_tahun()">
                                                        <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                        @for ($i = 2023; $i <= date('Y'); $i++)
                                                            <option>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <p type="hidden" id="err_tahun" style="color: red; display:none"><i>Sila buat
                                                        pilihan di
                                                        bahagian ini!</i></p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bulan</label>
                                                    <select class="form-control" name="bulan"  id="bulan" onchange="showTable()">
                                                        <option value="">Sila Pilih</option>
                                                        <option value="equal">Equal</option>
                                                        <option value="between">Between</option>
                                                    </select>

                                                </div>
                                                <div id="equal_container" style="display:none">
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label>Pada</label>
                                                                <select class="form-control" name="start" >
                                                                    <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                    <option value="1">Januari</option>
                                                                    <option value="2">Februari</option>
                                                                    <option value="3">Mac</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">Mei</option>
                                                                    <option value="6">Jun</option>
                                                                    <option value="7">Julai</option>
                                                                    <option value="8">Ogos</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">Oktober</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">Disember</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="between_container" style="display:none">
                                                    <div class="row">
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label>Dari</label>
                                                                <select class="form-control" name="start_month">
                                                                    <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                    <option value="1">Januari</option>
                                                                    <option value="2">Februari</option>
                                                                    <option value="3">Mac</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">Mei</option>
                                                                    <option value="6">Jun</option>
                                                                    <option value="7">Julai</option>
                                                                    <option value="8">Ogos</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">Oktober</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">Disember</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label>Ke</label>
                                                                <select class="form-control" name="end_month">
                                                                    <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                    <option value="1">Januari</option>
                                                                    <option value="2">Februari</option>
                                                                    <option value="3">Mac</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">Mei</option>
                                                                    <option value="6">Jun</option>
                                                                    <option value="7">Julai</option>
                                                                    <option value="8">Ogos</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">Oktober</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">Disember</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="lain_container" style="display:none">
                                                </div>
                                                <div class="form-group">
                                                    <label>Negeri</label>
                                                    <select class="form-control" id="negeri_id" name="e_negeri"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')"
                                                    onchange="ajax_daerah(this)" >
                                                        <option value="">Sila Pilih Negeri</option>
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

                                            <div class="col-md-5 mr-auto">
                                                <div class="form-group">
                                                    <label>Pemegang Pelesen</label>
                                                    <select class="form-control select2" name="e_nl" style="width: 10%">
                                                        <option value="">Sila Pilih Pemegang Pelesen</option>
                                                        @foreach ($users2 as $data)
                                                        @if ($data->pelesen)
                                                        @foreach ($data->pelesen as $pelesen)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $pelesen->e_np }}
                                                        </option>
                                                        @endforeach

                                                        @endif

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kumpulan Produk</label>
                                                    <select class="form-control" id="kumpproduk" name="kumpproduk"  onchange="ajax_produk(this);" >
                                                        <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                        @foreach ($kumpproduk as $data)
                                                        {{-- @if ($data->role == '' || $data->role == 'Supervisor' || $data->role == 'Admin') --}}
                                                            <option value="{{ $data->kumpulan }}">
                                                                {{ $data->kumpulan }} - {{ $data->nama_kumpulan }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kod Produk</label>
                                                    <select class="form-control select2" id="kod_produk" name="kod_produk" oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')" style="width: 10%">
                                                        <option selected value="">Sila Pilih Kumpulan Terlebih Dahulu
                                                        </option>
                                                        {{-- @foreach ($produk as $data)
                                                            <option value="{{ $data->nama_produk }}">
                                                                {{ $data->nama_produk }} - {{ $data->kod_produk }}  - {{ $data->namapanjang_produk }}
                                                            </option>
                                                        @endforeach --}}

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="required">Data</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" name="laporan" required  id="laporan_id" oninput=" valid_laporan()">
                                                            <option selected hidden disabled value="">Sila Pilih Jenis Data</option>
                                                            <option value="ebio_b5">Stok Awal Di Premis</option>
                                                            <option value="ebio_b6">Belian / Terimaan</option>
                                                            <option value="ebio_b7">Pengeluaran</option>
                                                            <option value="ebio_b8">Digunakan Untuk Proses Selanjutnya</option>
                                                            <option value="ebio_b9">Jualan / Edaran Tempatan</option>
                                                            <option value="ebio_b10">Eksport</option>
                                                            <option value="ebio_b11">Stok Akhir Dilapor</option>
                                                        </select>
                                                        <p type="hidden" id="err_laporan" style="color: red; display:none">
                                                            <i>Sila buat pilihan di bahagian ini!</i>
                                                        </p>
                                                    </fieldset>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-right col-md-6 mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary" style="margin-left:90%"  onclick="check()"
                                            >Carian</button>
                                    </div>
                                </form>

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
                        $("#kod_produk").append('<option value="' + respond[x].prodid + '">'
                        + respond[x].prodid + " - " + respond[x].proddesc+ '</option>');
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
                        $("#kod_produk2").append('<option value="' + respond[x].prodid + '">'
                        + respond[x].prodid + " - " + respond[x].proddesc+ '</option>');
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
        function valid_tahun() {

            if ($('#tahun_id').val() == '') {
                $('#tahun_id').css('border-color', 'red');
                document.getElementById('err_tahun').style.display = "block";


            } else {
                $('#tahun_id').css('border-color', '');
                document.getElementById('err_tahun').style.display = "none";

            }

        }
    </script>
     <script>
        function valid_laporan() {

            if ($('#laporan_id').val() == '') {
                $('#laporan_id').css('border-color', 'red');
                document.getElementById('err_laporan').style.display = "block";


            } else {
                $('#laporan_id').css('border-color', '');
                document.getElementById('err_laporan').style.display = "none";

            }

        }
    </script>
    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // kap proses
            field = document.getElementById("tahun_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#tahun_id').css('border-color', 'red');
                document.getElementById('err_tahun').style.display = "block";

            }field = document.getElementById("laporan_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#laporan_id').css('border-color', 'red');
                document.getElementById('err_laporan').style.display = "block";
            }



                if (error == "") {
                    $('#myModal').modal('show');
                    return true;
                } else {
                    toastr.error(
                        'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                        'Ralat!', {
                            "progressBar": true
                        })
                    return false;
                }


            }

    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        // form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        </script>
@endsection
