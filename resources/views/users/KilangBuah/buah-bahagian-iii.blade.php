@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    {{-- <h4 class="page-title" >Kemasukan Penyata Bulanan
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
                        @endif  {{ $tahun }}</h4> --}}
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
            <p style="text-align: center; vertical-align:middle; font-size: 20px">
                <b>
                KEMASUKAN PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4<br>

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
        <div class="card" style="margin-right:2%; margin-left:2%">
            <div class="card-body">
                <div class="pl-3">

                    <div class="text-center">
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 3</h3>
                        <h5 style="color: rgb(39, 80, 71) ; font-size:14px">Belian/Terimaan Bekalan Buah
                            Kelapa Sawit
                            (FFB) (52)</h5>
                    </div>
                    <hr>

                    <div class="col-12 mt-2" style="margin-bottom: -2%">
                        <form action="{{ route('buah.update.bahagian.iii', [$penyata->e91_reg]) }}" method="post" class="sub-form"
                            onsubmit="return validation_jum();" onload="validation_jumlah()">
                            @csrf
                            <div class="card">

                                <div class="card-content">

                                    <div class="row col-12 mt-1">
                                        <div class=" col-8" style="text-align: left">
                                            <p><i>Nota: Sila isikan butiran dibawah dalam tan metrik dan tekan butang ‘Simpan & Seterusnya’</i></p>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead style="text-align: center; background-color: #d3d3d34d">
                                                <tr>
                                                    <th>Sumber Bekalan</th>
                                                    <th>Kuantiti (Tan Metrik)</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">1. Estet Sendiri</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id="e91_ai1"
                                                            name='e91_ai1' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc()"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onkeypress="return isNumberKey(event);" onClick="this.select();"
                                                            onchange=" autodecimal(this); validation_jumlah();FormatCurrency(this)" required
                                                            value="{{ old('e91_ai1') ?? (number_format($penyata->e91_ai1 ?? 0,2)) }}">
                                                        @error('e91_ai1')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2. Estet Luar</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id="e91_ai2"
                                                            name='e91_ai2' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc2()"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onkeypress="return isNumberKey(event)" onClick="this.select();"
                                                            onchange="validation_jumlah();  autodecimal(this);FormatCurrency(this)" required
                                                            value="{{ old('e91_ai2') ?? (number_format($penyata->e91_ai2 ?? 0,2)) }}">
                                                        @error('e91_ai2')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">3. Peniaga Buah</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id='e91_ai3'
                                                            name='e91_ai3' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc3()"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onkeypress="return isNumberKey(event)" required onClick="this.select();"
                                                            value="{{ old('e91_ai3') ?? (number_format($penyata->e91_ai3 ?? 0,2)) }}"
                                                            onchange="validation_jumlah();  autodecimal(this);FormatCurrency(this)">
                                                        @error('e91_ai3')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">4. Pekebun Kecil</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id='e91_ai4'
                                                            name='e91_ai4' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc4()"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onkeypress="return isNumberKey(event)" required onClick="this.select();"
                                                            value="{{ old('e91_ai4') ?? (number_format($penyata->e91_ai4 ?? 0,2)) }}"
                                                            onchange="validation_jumlah();  autodecimal(this); FormatCurrency(this)">
                                                        @error('e91_ai4')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">5. Kilang Buah Lain</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" name='e91_ai5'
                                                            id='e91_ai5' size="15" id="text1" style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc5()"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onkeypress="return isNumberKey(event)" required onClick="this.select();"
                                                            value="{{ old('e91_ai5') ?? (number_format($penyata->e91_ai5 ?? 0,2)) }}"
                                                            onchange="validation_jumlah();  autodecimal(this); FormatCurrency(this)">
                                                        @error('e91_ai5')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">6. Lain-Lain</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" name='e91_ai6'
                                                            id='e91_ai6' size="15" id="text2" style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onkeypress="return isNumberKey(event)" required onClick="this.select();"
                                                            value="{{ old('e91_ai6') ?? (number_format($penyata->e91_ai6 ?? 0,2)) }}"
                                                            onchange="validation_jumlah();  autodecimal(this); FormatCurrency(this)">
                                                        @error('e91_ai6')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500" style="text-align:center;">
                                                        <b>Jumlah</b>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <b><span id="total" name="total" onchange="FormatCurrency(this)">
                                                                {{ old('total_hidden') ?? number_format($jumlah ?? 0,2) }}
                                                            </span>
                                                            <input type="hidden" id="total_hidden" name="total_hidden"
                                                                value="{{ number_format($jumlah ?? 0,2) }}">
                                                        </b>
                                                    </td>

                                                </tr>
                                                <tr style="background-color: #1526224a">
                                                    <td class="text-bold-500" style="text-align:center;">
                                                        <b>Jumlah Bahagian I (FFB)</b>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <span><b>{{ number_format($penyata->e91_ab1 ?? 0, 2) }}</b></span>

                                                        <input type="hidden" id="jumlah" name="jumlah"
                                                            onchange="return validation_jum()"
                                                            value="{{ $penyata->e91_ab1 }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <br>


                <div class="form-group" style="padding: 10px">
                        <a href="{{ route('buah.bahagianii') }}" class="btn btn-primary"
                            style="float: left">Sebelumnya</a>
                        <button type="SUBMIT" class="btn btn-primary" style="float: right" id="go">Simpan &
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
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>




            {{-- <div id="preloader"></div> --}}
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>


            @endsection
            @section('scripts')
            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
            {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> --}}
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

                var x=$('#e91_ai1').val();
                x=x.replace(/,/g,'');
                x=parseFloat(x,10);
                $('#e91_ai1').val(x);

                var x=$('#e91_ai2').val();
                x=x.replace(/,/g,'');
                x=parseFloat(x,10);
                $('#e91_ai2').val(x);

                var x=$('#e91_ai3').val();
                x=x.replace(/,/g,'');
                x=parseFloat(x,10);
                $('#e91_ai3').val(x);

                var x=$('#e91_ai4').val();
                x=x.replace(/,/g,'');
                x=parseFloat(x,10);
                $('#e91_ai4').val(x);

                var x=$('#e91_ai5').val();
                x=x.replace(/,/g,'');
                x=parseFloat(x,10);
                $('#e91_ai5').val(x);

                var x=$('#e91_ai6').val();
                x=x.replace(/,/g,'');
                x=parseFloat(x,10);
                $('#e91_ai6').val(x);

                var x=$('#total').val();
                x=x.replace(/,/g,'');
                x=parseFloat(x,10);
                $('#total').val(x);

                return true;

        });

            </script>

           <script>
                function ai1() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ai1").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ai1").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ai2() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ai2").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ai2").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ai3() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ai3").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ai3").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ai4() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ai4").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ai4").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ai6() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ai6").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ai6").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ai5() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ai5").value);
                    if(isNaN(x)){
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ai5").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ai2').focus();
                            document.getElementById('e91_ai2').select();

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
                            document.getElementById('e91_ai3').focus();
                            document.getElementById('e91_ai3').select();

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
                            document.getElementById('e91_ai4').focus();
                            document.getElementById('e91_ai4').select();

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
                            document.getElementById('e91_ai5').focus();
                            document.getElementById('e91_ai5').select();

                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc5() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ai6').focus();
                            document.getElementById('e91_ai6').select();

                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>

            <script>
                function validation_jumlah() {

                    // var e91_ai1 = document.getElementById('e91_ai1');
                    // console.log(e91_ai1);



                    // var e91_ai1 = $("#e91_ai1").val();
                    var e91_ai1 = document.getElementById('e91_ai1');
                    var ai1 = e91_ai1.value.replace(/,/g, '');
                    // console.log(ai1);

                    var e91_ai2 = document.getElementById('e91_ai2');
                    var ai2 = e91_ai2.value.replace(/,/g, '');

                    var e91_ai3 = document.getElementById('e91_ai3');
                    var ai3 = e91_ai3.value.replace(/,/g, '');

                    var e91_ai4 = document.getElementById('e91_ai4');
                    var ai4 = e91_ai4.value.replace(/,/g, '');

                    var e91_ai5 = document.getElementById('e91_ai5');
                    var ai5 = e91_ai5.value.replace(/,/g, '');

                    var e91_ai6 = document.getElementById('e91_ai6');
                    var ai6 = e91_ai6.value.replace(/,/g, '');


                    var jumlah = $("#jumlah").val();
                    var jumlah_input = 0;

                    jumlah_input = parseFloat(Number(ai1)) + parseFloat(Number(ai2)) +
                        parseFloat(Number(ai3)) + parseFloat(Number(ai4)) + parseFloat(Number(ai5)) + parseFloat(Number(ai6));
                    jumlah_input = parseFloat(Number(jumlah_input));

                    document.getElementById('total').innerHTML = jumlah_input.toFixed(2);
                    document.getElementById('total_hidden').value = jumlah_input.toFixed(2);

                    console.log(document.getElementById('total_hidden').value);
                }
            </script>
            <script>
                document.addEventListener('keypress', function (e) {
                    if (e.keyCode === 13 || e.which === 13) {
                        e.preventDefault();
                        return false;
                    }

                });
            </script>
        @endsection
