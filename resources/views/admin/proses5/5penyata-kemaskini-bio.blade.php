@extends('layouts.main')

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
                    <h4 class="page-title">Papar Penyata</h4>
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
            <div class="tab" style="margin-left:2%">
                {{-- <button class="tablinks" onclick="openInit(event, 'All')" id="defaultOpen">Penyata Bulanan
                Terkini</button> --}}
                <a href="{{ route('admin.6penyatapaparcetakbio') }}"
                style="color:black; border-radius:unset; font-size:14px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'All')">Penyata Bulanan
                    Terkini</a>
                {{-- <button class="tablinks" onclick="openInit(event, 'One')"> --}}
                <a href="{{ route('admin.5penyatabelumhantarbio') }}"
                    style="color:black; border-radius:unset; font-size:14px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'One')">Penyata Bulanan Belum Hantar</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14px; background-color:rgb(255, 255, 255)"
                style="color:black; border-radius:unset; font-size:14px; margin-left:-0.315rem;"
                class="btn btn-work tablinks" onclick="openInit(event, 'BioTab')" id="defaultOpen">Kemaskini Penyata Biodiesel</a>

            </div>
            <div class="card" style="margin-right:2%; margin-left:2%">

                <div id="BioTab" class="tabcontent">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>

                        </div>
                        <form action="{{ route('admin.5penyatakemaskini.process') }}" method="get"  onsubmit="return Validate(this);check()" >
                            @csrf
                            <div class="pl-3">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}

                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Kemaskini Penyata Bulanan Kilang Biodiesel - MPOB(EL) KS 4</h3>
                                        <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Senarai Penyata Belum
                                            Dihantar Sehingga Tarikh
                                            <p><span id="datetime"></span></p>
                                            <script>
                                                var dt = new Date();
                                                document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "/" + (("0" + (dt.getMonth() +
                                                    1)).slice(-2)) + "/" + (dt.getFullYear());
                                            </script>
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>

                                </div>

                                <section class="section">
                                    <div class="card">
                                        <hr><i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '<b style="color: red"> * </b>'</i>
                                        <br><br>
                                        <div class="container center ">

                                            <div class="row" style="margin-top:-1%">
                                                <label for="fname"
                                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                                </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="tahun" name="tahun" required
                                                            oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                            oninput="setCustomValidity(''); valid_tahun()">
                                                            <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                            @for ($i = 2011; $i <= date('Y'); $i++)
                                                                <option>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        <p type="hidden" id="err_tahun" style="color: red; display:none"><i>Sila buat pilihan
                                                            di
                                                            bahagian ini!</i></p>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:-1%">
                                                <label for="fname"
                                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                                </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="bulan" name="bulan" required
                                                            oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                            oninput="setCustomValidity(''); valid_bulan()">
                                                            <option selected hidden disabled value="">Sila Pilih Bulan</option>
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
                                                        <p type="hidden" id="err_bulan" style="color: red; display:none"><i>Sila buat pilihan
                                                            di
                                                            bahagian ini!</i></p>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="row justify-content-center" style="margin: 10px; ">
                                                <button type="submit" id="checkBtn"  class="btn btn-primary"  onclick="check()">Papar</button>
                                                {{-- <button >YA</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')

    <script>
        function valid_tahun() {

            if ($('#tahun').val() == '') {
                $('#tahun').css('border', '1px solid red');
                document.getElementById('err_tahun').style.display = "block";


            } else {
                $('#tahun').css('border', '');
                document.getElementById('err_tahun').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_bulan() {

            if ($('#bulan').val() == '') {
                $('#bulan').css('border', '1px solid red');
                document.getElementById('err_bulan').style.display = "block";


            } else {
                $('#bulan').css('border', '');
                document.getElementById('err_bulan').style.display = "none";

            }

        }
    </script>

    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // kod produk
            field = document.getElementById("tahun");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#tahun').css('border', '1px solid red');
                document.getElementById('err_tahun').style.display = "block";
                console.log('masuk');
            }
            // kod produk
            field = document.getElementById("bulan");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#bulan').css('border', '1px solid red');
                document.getElementById('err_bulan').style.display = "block";
                console.log('masuk');
            }

            if (error == "") {

                document.getElementById("checkBtn").setAttribute("type", "submit");
                return true;
                } else {
                document.getElementById("checkBtn").setAttribute("type", "button");

                return false;
                }
        }
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
            $(function(){

        var requiredCheckboxes = $(':checkbox[required]');

        requiredCheckboxes.change(function(){

            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            }

            else {
                requiredCheckboxes.attr('required', 'required');
            }
        });

        });
    </script>

@endsection
