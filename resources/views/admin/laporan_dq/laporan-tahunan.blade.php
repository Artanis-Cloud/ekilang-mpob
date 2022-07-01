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
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Laporan Tahunan</h3>
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
                                                    <select class="form-control" name="laporan" onclick="laporan_check(this)">
                                                        <option selected hidden disabled>Sila Pilih Jenis Laporan</option>
                                                        <option value="kapasiti"  onclick="laporan_check(this)">Laporan Tahunan Kapasiti
                                                        </option>
                                                        <option value="beroperasi" onclick="laporan_check(this)">Kilang Biodiesel
                                                            Beroperasi</option>
                                                        <option value="pengeluaran" onclick="laporan_check(this)">Pengeluaran Produk Biodiesel</option>
                                                        <option value="eksport" onclick="laporan_check(this)">Eksport Produk Biodiesel</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select class="form-control" name="tahun" id="date-dropdown">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-3 mr-auto">
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
                                        </div>
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
    <script>
        function laporan_check(rad) {
            if (rad.value == "kapasiti") {
                document.getElementById("bulan").disabled = true;
            } else {

                document.getElementById("bulan").disabled = false;
            }
        }
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
@endsection
