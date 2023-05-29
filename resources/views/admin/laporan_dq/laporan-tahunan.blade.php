@extends('layouts.main')

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
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Laporan Biodiesel</h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5> --}}
                        </div>
                        <hr>
                        <form action="{{ route('admin.laporan.tahunan.proses') }}" method="get">
                            @csrf
                            <div class="card-body">

                                <div class="container center">
                                    <div class="row" style="margin-top:-2%">
                                        <div class="col-md-4 ml-auto">

                                            <div class="form-group">
                                                <label>Jenis Laporan</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan" id="laporan"
                                                        onclick="laporan_check()"
                                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                        oninput="setCustomValidity('')" required>
                                                        <option selected hidden disabled value="">Sila Pilih Jenis
                                                            Laporan</option>
                                                        <option value="kapasiti" onclick="laporan_check()">Laporan
                                                            Tahunan Kapasiti
                                                        </option>
                                                        <option value="beroperasi" onclick="laporan_check()">Kilang
                                                            Biodiesel
                                                            Beroperasi</option>
                                                        <option value="pengeluaran" onclick="laporan_check()">
                                                            Pengeluaran Produk Biodiesel</option>
                                                        <option value="eksport" onclick="laporan_check()">Eksport Produk
                                                            Biodiesel</option>
                                                        <option value="proses" onclick="laporan_check()">Proses
                                                            Biodiesel</option>
                                                        <option value="utilrate" onclick="laporan_check()">Utilization Rate</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mr-auto">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select class="form-control" name="tahun" required id="date-dropdown" oninput="valid_tahun()">
                                                    <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                    @for ($i = 2011; $i <= date('Y'); $i++)
                                                        <option>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <p type="hidden" id="err_tahun" style="color: red; display:none"><i>Sila buat
                                                    pilihan di
                                                    bahagian ini!</i></p>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-3 mr-auto">
                                            <div class="form-group">
                                                <label>Bulan</label>
                                                <select class="form-control" name="bulan" id="bulan">
                                                    <option selected hidden disabled>Sila Pilih Bulan</option>
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
                                                </select>
                                            </div>
                                        </div> --}}
                                        {{-- <div  > --}}

                                        <div class="col-md-4 mr-auto" id="bulan3">
                                            <label>Bulan</label>
                                            <select class="form-control" name="bulan" id="bulan2"
                                                onchange="showTable2()">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                <option value=""></option>
                                                <option value="equal">Equal</option>
                                                <option value="between">Between</option>
                                            </select>

                                        </div>
                                        {{-- </div> --}}
                                        <div id="equal_container2" style="display:none" class="container-fluid">
                                            {{-- <div class="row"> --}}
                                            <div class="col-md-4 " style="margin-left: 67%">
                                                <div class="form-group">
                                                    {{-- <label>&nbsp;</label> --}}
                                                    <select class="form-control" name="start">
                                                        <option selected hidden disabled value="">Sila Pilih Bulan
                                                        </option>
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
                                                    </select>

                                                </div>
                                            </div>
                                            {{-- </div> --}}
                                        </div>
                                        <div id="between_container2" style="display:none"
                                            class="container-fluid align-content-end">
                                            {{-- <div class="> --}}
                                            <div class="row col-md-12 " style="margin-left:67%">
                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>Dari</label>
                                                        <select class="form-control" name="start_month">
                                                            <option selected hidden disabled value="">Sila Pilih Bulan
                                                            </option>
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
                                                        </select>

                                                    </div>
                                                </div>
                                                {{-- </div>
                                                <div class="row"> --}}
                                                <div class="col-md-2 ">
                                                    <div class="form-group">
                                                        <label>Ke</label>
                                                        <select class="form-control" name="end_month">
                                                            <option selected hidden disabled value="">Sila Pilih
                                                                Bulan</option>
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
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="lain_container2" style="display:none">
                                    </div>
                                    {{-- <div class="col-md-3 mr-auto">
                                            <div class="form-group">
                                                <label>Bulan</label>
                                                <select class="form-control" name="bulan" id="bulan">
                                                    <option selected hidden disabled>Sila Pilih Bulan</option>
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
                                                </select>
                                            </div>
                                        </div> --}}
                                </div>
                                <div class=" col-md-12 mb-4 mt-4">
                                    <button type="submit" class="btn btn-primary" style="margin-left:47%"
                                        data-toggle="modal" data-target="#next">Cari</button>
                                </div>
                            </div>
                            <form>


                    </div>
                </div>
            </div>
        </div>

    </div>




    </div>
@endsection

@section('scripts')
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

    {{-- <script>
    let dateDropdown = document.getElementById('date-dropdown');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2011;
    while (currentYear >= earliestYear) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      dateDropdown.add(dateOption);
      currentYear -= 1;
    }
  </script> --}}
    <script type="text/javascript">
        function laporan_check() {
            var laporan = $('#laporan').val();
            // console.log(oer);

            if (laporan == "kapasiti") {
                document.getElementById('bulan3').style.display = "none";
                document.getElementById('equal_container2').style.display = "none";
                document.getElementById('between_container2').style.display = "none";
                // document.getElementById('lain_container2').style.display = "none";
            } else {
                document.getElementById('bulan3').style.display = "block";
                // document.getElementById('lain_container2').style.display = "block";

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
@endsection
