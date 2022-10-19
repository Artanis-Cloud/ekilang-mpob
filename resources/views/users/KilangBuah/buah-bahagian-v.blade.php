@extends('layouts.main')

@section('content')

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
            <p style="text-align: center; vertical-align:middle; font-size: 20px"><b>

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
                <div class="card" style="margin-right:2%; margin-left:2%;">
                    <div class="card-body">
                            <div class="pl-3">

                                <div class="text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 5</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px"> Jualan/Edaran Isirung Sawit
                                        (PK) Dalam Negeri
                                        (51)
                                    </h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                <form action="{{ route('buah.update.bahagian.v', [$penyata->e91_reg]) }}" class="sub-form"
                                    method="post"  onsubmit="return validation_jum();" onload="validation_jumlah()">
                                    @csrf
                                    {{-- <div class="row" id="table-bordered"> --}}
                                        <div class="col-12 mt-2" style="margin-bottom: -2%">
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
                                                                    <th>Pembeli / Penerima</th>
                                                                    <th>Kuantiti (Tan Metrik)</th>



                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-bold-500">1. Kilang Isirung</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="15" id='e91_ak1'
                                                                            class="calc" name='e91_ak1' style="text-align:center"
                                                                            onkeypress="return isNumberKey(event)" oninput="validate_two_decimal(this);setCustomValidity(''); invoke_ak1()"
                                                                            value="{{ old('e91_ak1') ?? number_format($penyata->e91_ak1 ?? 0,2) }}" required onClick="this.select();"
                                                                            onchange="validation_jumlah(); autodecimal(this); FormatCurrency(this)" oninvalid="setCustomValidity('Sila isi butiran ini')">
                                                                            @error('e91_ak1')
                                                                            <div class="alert alert-danger">
                                                                                <strong>Sila isi butiran ini</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">2. Peniaga</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="15" id='e91_ak2'
                                                                            class="calc" name='e91_ak2' style="text-align:center"
                                                                            onkeypress="return isNumberKey(event)" oninput="validate_two_decimal(this);setCustomValidity(''); invoke_ak2()"
                                                                            value="{{ old('e91_ak2') ?? number_format($penyata->e91_ak2 ?? 0,2) }}" required onClick="this.select();"
                                                                            onchange="validation_jumlah(); autodecimal(this); FormatCurrency(this)" oninvalid="setCustomValidity('Sila isi butiran ini')">
                                                                            @error('e91_ak2')
                                                                            <div class="alert alert-danger">
                                                                                <strong>Sila isi butiran ini</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">3. Lain-Lain</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="15" id='e91_ak3'
                                                                            class="calc" name='e91_ak3' style="text-align:center"
                                                                            onkeypress="return isNumberKey(event)" oninput="validate_two_decimal(this);setCustomValidity(''); invoke_ak3()"
                                                                            value="{{ old('e91_ak3') ?? number_format($penyata->e91_ak3 ?? 0,2) }}" required onClick="this.select();"
                                                                            onchange="validation_jumlah(); autodecimal(this); FormatCurrency(this)" oninvalid="setCustomValidity('Sila isi butiran ini')">
                                                                            @error('e91_ak3')
                                                                            <div class="alert alert-danger">
                                                                                <strong>Sila isi butiran ini</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </td>


                                                                </tr>


                                                                <tr>
                                                                    <td class="text-bold-500"
                                                                        style="text-align:center;">
                                                                        <b>Jumlah</b>
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <b><span id="total" name="total" onchange="FormatCurrency(this)">
                                                                                {{ old('total_hidden') ?? number_format($jumlah, 2) }}
                                                                            </span>
                                                                            <input type="hidden" id="total_hidden" name="total_hidden"
                                                                                value="{{ number_format($jumlah ?? 0,2) }}">
                                                                        </b>
                                                                    </td>

                                                                </tr>
                                                                <tr style="background-color: #1526224a">
                                                                    <td class="text-bold-500"
                                                                        style="text-align:center;">
                                                                        <b>Jumlah Bahagian I (PK)</b>
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <b><span>{{ number_format($penyata->e91_ae3 ?? 0,2)  }}</span></b>
                                                                        <input type="hidden" id="jumlah" name="jumlah"
                                                                        onchange="return validation_jum()"
                                                                        value="{{ $penyata->e91_ae3 }}">

                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                    <br>





                                    <div class="form-group" style="padding: 10px ; margin-bottom:5%">
                                        <a href="{{ route('buah.bahagianiv') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>

                                        {{-- <div class="text-right col-md-7 mb-2 ">
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                style="float: right"
                                                data-bs-target="#exampleModalCenter">Hantar</button>
                                        </div> --}}

                                        <button type="submit" class="btn btn-primary " style="float: right;">Simpan & Seterusnya</button>
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
                                                        Anda pasti mahu mmenyimpan maklumat ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block"
                                                            style="color:#275047">Tidak</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Hantar</span>
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

                    var x=$('#e91_ak1').val();
                    x=x.replace(/,/g,'');
                    x=parseFloat(x,10);
                    $('#e91_ak1').val(x);

                    var x=$('#e91_ak2').val();
                    x=x.replace(/,/g,'');
                    x=parseFloat(x,10);
                    $('#e91_ak2').val(x);

                    var x=$('#e91_ak3').val();
                    x=x.replace(/,/g,'');
                    x=parseFloat(x,10);
                    $('#e91_ak3').val(x);



                    return true;

            });

                </script>

                <script>
                    function invoke_ak1() {
                        addEventListener('keydown', function(evt) {
                            var whichKey = checkKey(evt);
                            if (whichKey == 13) {
                                console.log('successful');
                                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                                document.getElementById('e91_ak2').focus();
                                document.getElementById('e91_ak2').select();

                            }

                        });
                    }

                    function checkKey(evt) {
                        console.log(evt.which);
                        return evt.which;
                    }
                </script>
                <script>
                    function invoke_ak2() {
                        addEventListener('keydown', function(evt) {
                            var whichKey = checkKey(evt);
                            if (whichKey == 13) {
                                console.log('successful');
                                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                                document.getElementById('e91_ak3').focus();
                                document.getElementById('e91_ak3').select();

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


                            var e91_ak1 = document.getElementById('e91_ak1');
                            var ak1 = e91_ak1.value.replace(/,/g, '');

                            var e91_ak2 = document.getElementById('e91_ak2');
                            var ak2 = e91_ak2.value.replace(/,/g, '');


                            var e91_ak3 = document.getElementById('e91_ak3');
                            var ak3 = e91_ak3.value.replace(/,/g, '');


                            var jumlah = $("#jumlah").val();
                            var jumlah_input = 0;

                            jumlah_input = parseFloat(Number(ak1)) + parseFloat(Number(ak2)) + parseFloat(Number(ak3));
                            console.log(jumlah_input.toFixed(2));
                            document.getElementById('total').innerHTML = jumlah_input.toFixed(2);
                        document.getElementById('total_hidden').value = jumlah_input.toFixed(2);

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

