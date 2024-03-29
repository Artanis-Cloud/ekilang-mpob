@extends('layouts.main')
<style>
	.currency-wrap{
		position:relative;
	}

	.currency-code{
		position:absolute;
		left:15px;
		top:9px;
	}

	.text-currency{
		padding:10px 20px;
		border:solid 1px #ccc;
		border-radius:5px;
	}
</style>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

@section('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="page-breadcrumb">

            <div class="row">
                <div class="col-9 align-self-center">
                    {{-- <h4 class="page-title">Kemasukan Penyata Bulanan
                        @if ($bulan == 1)
                            JANUARI
                        @elseif($bulan == 2)
                            FEBRUARI
                        @elseif($bulan == 3)
                            MAC
                        @elseif($bulan == 4)
                            APRIL
                        @elseif($bulan == 5)
                            MEI
                        @elseif($bulan == 6)
                            JUN
                        @elseif($bulan == 7)
                            JULAI
                        @elseif($bulan == 8)
                            OGOS
                        @elseif($bulan == 9)
                            SEPTEMBER
                        @elseif($bulan == 10)
                            OKTOBER
                        @elseif($bulan == 11)
                            NOVEMBER
                        @elseif($bulan == 12)
                            DISEMBER
                        @endif {{ $tahun }}
                    </h4> --}}
                </div>
                <div class="col-3 align-self-center" >
                    <div class="d-flex justify-content-end">
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
                <p style="text-align: center; vertical-align:middle; font-size: 20px">

                    <b>KEMASUKAN PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4<br>

                    BULAN :&nbsp;&nbsp;
                    @if ($bulan == 1)
                        JANUARI
                    @elseif($bulan == 2)
                        FEBRUARI
                    @elseif($bulan == 3)
                        MAC
                    @elseif($bulan == 4)
                        APRIL
                    @elseif($bulan == 5)
                        MEI
                    @elseif($bulan == 6)
                        JUN
                    @elseif($bulan == 7)
                        JULAI
                    @elseif($bulan == 8)
                        OGOS
                    @elseif($bulan == 9)
                        SEPTEMBER
                    @elseif($bulan == 10)
                        OKTOBER
                    @elseif($bulan == 11)
                        NOVEMBER
                    @elseif($bulan == 12)
                        DISEMBER
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                    </b>
                    </p>

        </div>

        <div class="card" style="margin-right:2%; margin-left:2%;">
            <div class="card-body">
                <div class="col-md-12">


                    <div class=" text-center">

                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h3>
                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Maklumat Jam Pengilangan, Kadar Perahan Dan Harga</h5>
                    </div>
                    <hr>


                    <div class="mb-2 col-8" style="text-align: left">
                        <p><i>Nota: Sila isikan butiran dibawah dan tekan butang ‘Simpan & Seterusnya’</i></p>
                    </div>
                    <br>


                    <form action="{{ route('buah.update.bahagian.ii', [$penyata->e91_reg]) }}" method="post" class="sub-form"
                        id="form" novalidate>
                        @csrf
                        <div class="container center ">
                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">i. Jumlah Jam Pengilangan  &nbsp; <i class="fa fa-exclamation-circle"
                                        style="color: red; cursor: pointer;"
                                        title="Jumlah jam pengilangan = Jumlah jam beroperasi sebulan."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e91_ah1'  oninvalid="this.setCustomValidity('Sila pastikan jumlah hari tidak melebihi 31 hari')"
                                        oninput=" validate_two_decimal(this);setCustomValidity(''); invokeFunc(); validateInput(event)" maxlength="7" onchange="ah1();FormatCurrency(this)"
                                        style="  text-align:right; width:96%" onkeypress="return isNumberKey(event)" id="e91_ah1" required  onClick="this.select();"
                                        title="Sila isikan butiran ini." value="{{number_format($penyata->e91_ah1 ?? 0,2) }}">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">ii.
                                        Kadar
                                        Perahan MSM (OER) Yang Diperolehi &nbsp; <i class="fa fa-exclamation-circle "
                                        style="color: red; cursor: pointer;"
                                        title="Jumlah pengeluaran minyak sawit mentah &#010; ____________________________________________    x 100 &#010;      Jumlah buah kelapa sawit di proses"></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e91_ah2'
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc2()"
                                        style=" text-align:right" onkeypress="return isNumberKey(event)" onchange="ah2();FormatCurrency(this)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e91_ah2" required maxlength="6" readonly
                                        title="Sila isikan butiran ini." value="{{ number_format($oer ?? 0, 2) }}">
                                        <p type="hidden" id="err_ah2" style="color: red; display:none"><i>Nilai hendaklah kurang dari 100%. Sila betulkan nilai di bahagian 1</i></p>
                                </div>
                                <div style="margin-top: 25px; margin-left: -5px">%</div>

                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">iii.
                                        Kadar Perolehan Isirung <br> (KER) &nbsp; <i class="fa fa-exclamation-circle "
                                        style="color: red; cursor: pointer;"
                                        title="       Jumlah pengeluaran isirung &#010;____________________________________   x 100 &#010;Jumlah buah kelapa sawit di proses"></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e91_ah3'
                                        oninput="nodecimal(); validate_two_decimal(this);setCustomValidity(''); invokeFunc()"
                                        style="  text-align:right; width:97%; " onkeypress="return isNumberKey(event)" id="e91_ah3" required
                                        title="Sila isikan butiran ini." value="{{ number_format($ker ?? 0,2) }}" readonly>
                                        <p  id="err_ah3" style="color: red; display:none; width:97%; margin-left:-10%"><i>Nilai hendaklah <br> kurang dari 100%. <br>Sila betulkan nilai <br> di bahagian 1</i></p>
                                </div>
                                <div style="margin-top: 25px; margin-left: -5px">%</div>

                                <div class="col-md-3 mt-3">
                                    <span class="">v. Harga Purata Belian Buah Tandan Segar (FFB) &nbsp; <i class="fa fa-exclamation-circle "
                                        style="color: red; cursor: pointer;"
                                        title="Purata harga belian buah satu tan metrik &#010;____________________________________________    x 100 &#010;Purata OER yang ditetapkan semasa belian"></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <span class="currency-code" &nbsp;>RM</span>
                                    <input type="text" class="form-control text-currency" name='e91_ah4' onchange="ah4();FormatCurrency(this)"
                                    oninput="setCustomValidity(''); invokeFunc4()"
                                        style="  text-align:right; margin-left:-3%; width:99%" onkeypress="return isNumberKey(event)" maxlength="5"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e91_ah4"  onClick="this.select();"
                                        required title="Sila isikan butiran ini."
                                        value=" {{number_format($penyata->e91_ah4 ?? 0,2) }}">
                                        <p style="text-align: right"><i>(1% Kadar Perahan)</i></p>
                                </div>

                            </div>

                            <div class="content-center">
                                <div class="row" >
                                    <div class="col-md-3 mt-3">
                                        <label for="fname" class="align-items-center">v.
                                            Prestasi OER  </label>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                            <select name="kadar_oer" class="form-control" id="kadar_oer" required style="width:100%"
                                                onchange="showTable()" >
                                                <option selected hidden disabled value="">Sila Pilih Prestasi OER
                                                </option>
                                                <option {{ $status_prestasi == 'Meningkat' ? 'selected' : '' }}
                                                    value="Meningkat">Meningkat</option>
                                                <option {{ $status_prestasi == 'Menurun' ? 'selected' : '' }} value="Menurun">
                                                    Menurun</option>
                                            </select>

                                        {{-- <input type="text" class="form-control" name='kadar_oer'
                                                    id="kadar_oer" placeholder="Harga Purata Belian Buah Kelapa Sawit (FFB)"
                                                    required title="Sila isikan butiran ini."> --}}
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- kadar oer meningkat --}}
                        <div class="row" id="table-bordered">
                            <div class="col-12">
                                <div id="meningkat_container" style="display:none">
                                    <div class="card">

                                        <div class="card-content"><br>


                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead style="text-align: center">
                                                        <tr>
                                                            <th>Sebab-Sebab OER Meningkat</th>
                                                            <th>Tanda (&#10004;)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-bold-500">a.
                                                                Buah berkualiti</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox1"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah5' class='form-check-input'
                                                                    value="Y" onclick="untick_menurun()"
                                                                    {{ $penyata->e91_ah5 == 'Y' ? 'checked' : '' }}>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">b. Kesan dari cuaca
                                                                yang
                                                                baik</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox2"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah6' class='form-check-input'
                                                                    value="Y" onclick="untick_menurun()"
                                                                    {{ $penyata->e91_ah6 == 'Y' ? 'checked' : '' }}>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">c. Proses kitar
                                                                semula
                                                                minyak</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox3"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah7' class='form-check-input'
                                                                    value="Y" onclick="untick_menurun()"
                                                                    {{ $penyata->e91_ah7 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">d. Kecekapan kilang /
                                                                mesin</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox4"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah8' class='form-check-input'
                                                                    value="Y" onclick="untick_menurun()"
                                                                    {{ $penyata->e91_ah8 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">e. Proses
                                                                pengendalian
                                                                bks yang minima <i>(Less ffb handling)</i>
                                                            </td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox5"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah9' class='form-check-input'
                                                                    value="Y" onclick="untick_menurun()"
                                                                    {{ $penyata->e91_ah9 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">f. Proses lebih buah
                                                                lerai</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox6"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah10' class='form-check-input'
                                                                    value="Y" onclick="untick_menurun()"
                                                                    {{ $penyata->e91_ah10 == 'Y' ? 'checked' : '' }}>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style=""><button
                                                                    class="btn btn-primary" type="reset" id="reset" onclick="reset_meningkat()"
                                                                    style="background-color: transparent; color:#275047; float:right;">Padam</button>
                                                            </td>
                                                            {{-- <button class="btn btn-primary">Padam</button> --}}
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- Kadar OER menurun --}}
                                <div id="menurun_container" style="display:none">

                                    <div class="card">

                                        <div class="card-content"><br>
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead style="text-align: center">
                                                        <tr>
                                                            <th>Sebab-Sebab OER Menurun</th>
                                                            <th>Tanda (&#10004;)</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-bold-500">a.
                                                                Tiada / Kurang buah berkualiti</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox7"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah11' class='form-check-input'
                                                                    value="Y" onclick="untick_meningkat()"
                                                                    {{ $penyata->e91_ah11 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">b. Kesan cuaca kering
                                                            </td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox8"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah12' class='form-check-input'
                                                                    value="Y" onclick="untick_meningkat()"
                                                                    {{ $penyata->e91_ah12 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">c. Jerebu</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox9"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah13' class='form-check-input'
                                                                    value="Y" onclick="untick_meningkat()"
                                                                    {{ $penyata->e91_ah13 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">d. Kesan penerimaan
                                                                hujan
                                                                yang berlebihan</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox10"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah14' class='form-check-input'
                                                                    value="Y" onclick="untick_meningkat()"
                                                                    {{ $penyata->e91_ah14 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">e. Banjir</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox11"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah15' class='form-check-input'
                                                                    value="Y" onclick="untick_meningkat()"
                                                                    {{ $penyata->e91_ah15 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">f. Buah dari ladang
                                                                baru
                                                                berhasil</td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox12"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah16' class='form-check-input'
                                                                    value="Y" onclick="untick_meningkat()"
                                                                    {{ $penyata->e91_ah16 == 'Y' ? 'checked' : '' }}>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">g. Kurang buah lerai
                                                            </td>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" id="checkbox13"
                                                                    style=" width: 20px;height: 20px; margin-top:-1%"
                                                                    name='e91_ah17' class='form-check-input'
                                                                    value="Y" onclick="untick_meningkat()"
                                                                    {{ $penyata->e91_ah17 == 'Y' ? 'checked' : '' }}>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style=""><button
                                                                    class="btn btn-primary" type="reset" onclick="reset_menurun()"
                                                                    style="background-color: transparent; color:#275047; float:right;">Padam</button>
                                                            </td>
                                                            {{-- <button class="btn btn-primary">Padam</button> --}}
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div>

                                    </div>

                                </div>
                                <div id="lain_container" style="display:none">

                                    <div class="row">
                                        <div class="col-10 m-auto">
                                            <div class="form-group">
                                                <label class="control-label col-form-label" for="lain-sebab">Lain-Lain
                                                    Sebab OER, Sila Nyatakan
                                                    <i>(Max.
                                                        100 character)</i></label>
                                                <input type="text" id="lain-sebab" class="form-control"
                                                    name='e91_ah18' maxlength="100" onclick="untick_meningkat()"
                                                    value="{{ $penyata->e91_ah18 ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 70px; width: 100%">
                            <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary">Sebelumnya</a>

                            <button type="button" class="btn btn-primary" style="float: right" id="checkBtn" onclick="check()">Simpan &
                                Seterusnya</button>
                        </div>

                        <!-- Vertically Centered modal Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            PENGESAHAN</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Anda pasti mahu menyimpan maklumat ini?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Ya</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>



    @endsection


    @section('scripts')

    <script>
        // Add event listener to currency input
        const currencyInput = document.getElementById('e91_ah4');
        currencyInput.addEventListener('input', function(e) {
          // Get input value and remove all non-numeric characters
          let value = e.target.value.replace(/[^0-9]/g, '');

          // Add decimal point if necessary
          if (value.length >= 3) {
            value = value.slice(0, -2) + '.' + value.slice(-2);
          }

          // Set formatted value back to input
          e.target.value = value;
        });
      </script>
    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";


            //e91_ah2
            field = document.getElementById("e91_ah2");
            if (field.value >= 100) {
                error += "Name must be 2-4 characters\r\n";
                $('#e91_ah2').css('border-color', 'red');
                document.getElementById('err_ah2').style.display = "block";
                console.log('error');
            } else {
                $('#e91_ah2').css('border-color', '');
                document.getElementById('err_ah2').style.display = "none";

            }


            //e91_ah3
            field = $('#e91_ah3').val();
            val = parseFloat(Number(field.replace(/,/g, "")))
            console.log(val);
            if (val >= 100) {
                error += "Name must be 2-4 characters\r\n";
                $('#e91_ah3').css('border-color', 'red');
                document.getElementById('err_ah3').style.display = "block";
                console.log('error');
            } else {
                $('#e91_ah3').css('border-color', '');
                document.getElementById('err_ah3').style.display = "none";

            }




            // (B4) RESULT
            if (error == "") {
                console.log('modal');

                document.getElementById("checkBtn").setAttribute("type", "submit");
                return true;
            } else {
                document.getElementById("checkBtn").setAttribute("type", "button");

                return false;
            }



        }
    </script>
    <script>
        function valid_ah2() {

            if ($('#e91_ah2').val() >= 100) {
                $('#e91_ah2').css('border-color', 'red');
                document.getElementById('err_ah2').style.display = "block";


            } else {
                $('#e91_ah2').css('border-color', '');
                document.getElementById('err_ah2').style.display = "none";
            }

        }
    </script>
    <script>
        function valid_ah3() {

            if ($('#e91_ah3').val() >= 100) {
                $('#e91_ah3').css('border-color', 'red');
                document.getElementById('err_ah3').style.display = "block";


            } else {
                $('#e91_ah3').css('border-color', '');
                document.getElementById('err_ah3').style.display = "none";
            }

        }
    </script>
    <script language="javascript" type="text/javascript">
        function FormatCurrency(ctrl) {
            //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
            if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                return;
            }

            var val = ctrl.value;

            val = val.replace(/,/g, "")
            ctrl.value = "";
            val += '';
            x = val.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';

            var rgx = /(\d+)(\d{3})/;

            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }

            ctrl.value = x1 + x2;
        }
    </script>
      <script>
        $('.sub-form').submit(function() {

        var x=$('#e91_ah1').val();
        x=x.replace(/,/g,'');
        x=parseFloat(x,10);
        $('#e91_ah1').val(x);

        var x=$('#e91_ah2').val();
        x=x.replace(/,/g,'');
        x=parseFloat(x,10);
        $('#e91_ah2').val(x);

        var x=$('#e91_ah3').val();
        x=x.replace(/,/g,'');
        x=parseFloat(x,10);
        $('#e91_ah3').val(x);

        var x=$('#e91_ah4').val();
        x=x.replace(/,/g,'');
        x=parseFloat(x,10);
        $('#e91_ah4').val(x);

        return true;

});

    </script>
    <script>
        function ah2() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e91_ah2").value);
            if(isNaN(x)){
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e91_ah2").value = y;
            console.log(y);
        }
    </script>
    <script>
        function ah1() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e91_ah1").value);
            if(isNaN(x)){
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e91_ah1").value = y;
            console.log(y);
        }
    </script>
    <script>
        function ah3() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e91_ah3").value);
            if(isNaN(x)){
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e91_ah3").value = y;
            console.log(y);
        }
    </script>
    <script>
        function ah4() {

            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e91_ah4").value);
            if(isNaN(x)){
                x = 0.00;
            }
            var y = parseFloat(x).toFixed(2);
            document.querySelector("#e91_ah4").value =  y;
            // document.getElementById("e91_ah4").value = y;
            console.log(y);
        }
    </script>
    <script>
        function nodecimal() {
            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e91_ah1").value);
            if(isNaN(x)){
                x = 0;
            }
            const removedDecimal = Math.round(x);
            document.querySelector("#e91_ah1").value = removedDecimal;
            console.log(removedDecimal);
        }
    </script>
        <script>
            function invokeFunc() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e91_ah2').focus();
                    }

                });
            }

            function checkKey(evt) {
                console.log(evt.which);
                return evt.which;
            }
        </script>
        <script>
            function invokeFunc2() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e91_ah3').focus();
                    }

                });
            }

            function checkKey(evt) {
                console.log(evt.which);
                return evt.which;
            }
        </script>
        <script>
            function invokeFunc3() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e91_ah4').focus();
                    }

                });
            }

            function checkKey(evt) {
                console.log(evt.which);
                return evt.which;
            }
        </script>
        <script>
            function invokeFunc4() {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('kadar_oer').focus();
                    }

                });
            }

            function checkKey(evt) {
                console.log(evt.which);
                return evt.which;
            }
        </script>
        <script type="text/javascript">
            function showTable() {
                var oer = $('#kadar_oer').val();
                // console.log(oer);

                if (oer == "Meningkat") {
                    document.getElementById('meningkat_container').style.display = "block";
                    document.getElementById('lain_container').style.display = "block";
                } else {
                    document.getElementById('meningkat_container').style.display = "none";
                    document.getElementById('lain_container').style.display = "block";

                }

                if (oer == "Menurun") {
                    document.getElementById('menurun_container').style.display = "block";
                    document.getElementById('lain_container').style.display = "block";

                } else {
                    document.getElementById('menurun_container').style.display = "none";
                    document.getElementById('lain_container').style.display = "block";

                }
            }

            function untick_menurun() {
                document.getElementById("checkbox7").checked = false;
                document.getElementById("checkbox8").checked = false;
                document.getElementById("checkbox9").checked = false;
                document.getElementById("checkbox10").checked = false;
                document.getElementById("checkbox11").checked = false;
                document.getElementById("checkbox12").checked = false;
                document.getElementById("checkbox13").checked = false;

            }

            function untick_meningkat() {
                document.getElementById("checkbox1").checked = false;
                document.getElementById("checkbox2").checked = false;
                document.getElementById("checkbox3").checked = false;
                document.getElementById("checkbox4").checked = false;
                document.getElementById("checkbox5").checked = false;
                document.getElementById("checkbox6").checked = false;
            }
        </script>

        <script>
            function reset_meningkat() {
                document.getElementById("checkbox1").checked = false;
                document.getElementById("checkbox2").checked = false;
                document.getElementById("checkbox3").checked = false;
                document.getElementById("checkbox4").checked = false;
                document.getElementById("checkbox5").checked = false;
                document.getElementById("checkbox6").checked = false;
            }
            </script>
        <script>
            function reset_menurun() {
                document.getElementById("checkbox7").checked = false;
                document.getElementById("checkbox8").checked = false;
                document.getElementById("checkbox9").checked = false;
                document.getElementById("checkbox10").checked = false;
                document.getElementById("checkbox11").checked = false;
                document.getElementById("checkbox12").checked = false;
                document.getElementById("checkbox13").checked = false;
            }
            </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#checkBtn').click(function() {
                    checked = $("input[type=checkbox]:checked").length;
                    lain = $('#lain-sebab').val();
                    // console.log('lain');

                    if (!checked && !lain) {
                        toastr.error(
                            'Sila tanda sekurang-kurangnya satu sebab dibahagian Sebab-Sebab OER Meningkat/Menurun atau di Lain-Lain Sebab',
                            'Ralat!', {
                                "progressBar": true
                            })
                        return false;
                    }

                });
            });
        </script>
        <script>
            document.addEventListener('keypress', function(e) {
                if (e.keyCode === 13 || e.which === 13) {
                    e.preventDefault();
                    return false;
                }

            });
        </script>
        {{-- <script>
            --disable enter key on submit--
            //     document.addEventListener('keypress', function (e) {
            //     if (e.keyCode === 13 || e.which === 13) {
            //         e.preventDefault();
            //         return false;
            //     }

            // });
        {{-- </script> --}}

        <script>
            $(function() {
                @if ($penyata->e91_ah5 ||
                    $penyata->e91_ah6 ||
                    $penyata->e91_ah7 ||
                    $penyata->e91_ah8 ||
                    $penyata->e91_ah9 ||
                    $penyata->e91_ah10)

                    document.getElementById('meningkat_container').style.display = "block";
                    document.getElementById('lain_container').style.display = "block";
                @elseif ($penyata->e91_ah11 ||
                        $penyata->e91_ah12 ||
                        $penyata->e91_ah13 ||
                        $penyata->e91_ah14 ||
                        $penyata->e91_ah15 ||
                        $penyata->e91_ah16 ||
                        $penyata->e91_ah17)
                    document.getElementById('menurun_container').style.display = "block";
                    document.getElementById('lain_container').style.display = "block";
                @elseif ($penyata->e91_ah18)
                    document.getElementById('menurun_container').style.display = "none";
                    document.getElementById('menurun_container').style.display = "none";
                    document.getElementById('lain_container').style.display = "block";
                @else
                document.getElementById('menurun_container').style.display = "none";
                document.getElementById('menurun_container').style.display = "none";
                document.getElementById('lain_container').style.display = "none";
                @endif
            });
        </script>
        <script>
            function validateInput(event) {
            var input = event.target.value;
            event.target.value = input.replace(/-/g, "");
            }
        </script>
    @endsection
