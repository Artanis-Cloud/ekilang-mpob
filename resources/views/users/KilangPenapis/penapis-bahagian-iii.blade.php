@extends('layouts.main')
<style>
    .input-holder {
        border: 1px solid #cccccc;
        display: inline-block;
        padding: 5px;
    }

    .input-holder>input {
        border: 0;
        margin: 0;
        padding: 0;
        outline: none;
    }

    .input-holder:after {
        content: '%';
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
        <div class="page-breadcrumb ">
            <div class="row">
                <div class="col-5 align-self-center">
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

                <b>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4
                    <br>

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
            <form action="{{ route('penapis.update.bahagian.iii', [$penyata->e101_reg]) }}" method="post" class="sub-form"
                novalidate>
                @csrf
                <div class="card-body">
                    <div class="" style="padding: 2%">

                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 3</h3>
                            <h5 style="color: rgb(39, 80, 71)">Hari Beroperasi dan Kadar Penggunaan Kapasiti
                            </h5>

                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>

                        <div class="container center mt-4">

                            <div class="row justify-content-center">
                                <div class="col-sm-5 form-group">
                                    <label for="fname" class="control-label col-form-label">
                                        Jumlah Hari Kilang Beroperasi Sebulan</label>
                                </div>
                                <div class="col-md-2">
                                    @if ($cpo->e101_b10 == null || $cpko->e101_b10 == null || $cpo->e101_b10 == '0.0' || $cpko->e101_b10 == '0.0' || $cpo->e101_b10 == '0' || $cpo->e101_b10 == '0')
                                        <input type="text" class="form-control" style="text-align:right" max="31"
                                        name='e101_a1' onchange=""
                                        oninput="nodecimal(this); setCustomValidity(''); invoke_a1(); valid_a1(); input_a1()"
                                        id="e101_a1" required max="31" onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila pastikan nilai tidak melebihi 31 hari')"
                                        title="Sila isikan butiran ini." value="{{ $penyata->e101_a1 }}">
                                    @else
                                    <input type="text" class="form-control" style="text-align:right" max="31"
                                        name='e101_a1' required
                                        oninput="nodecimal(this); setCustomValidity(''); invoke_a1(); valid_a1(); input_a1()"
                                        id="e101_a1" required max="31" onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila pastikan nilai tidak melebihi 31 hari')"
                                        title="Sila isikan butiran ini." value="{{ $penyata->e101_a1 }}">
                                    @endif

                                    {{-- <input type="text" class="form-control" style="text-align:right"
                                        id='e101a1_hidden' value=""> --}}

                                    <p type="hidden" id="err_a1" style="color: red; display:none"><i>Nilai mestilah
                                            melebihi 0!</i></p>

                                    <p type="hidden" id="err_a12" style="color: red; display:none"><i>Nilai mestilah
                                            tidak
                                            melebihi 31 hari!</i></p>
                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror --}}
                                </div>
                                <div class="mt-2">&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-5 form-group">
                                    <label for="fname" class="control-label col-form-label">
                                        Kadar Penggunaan Kapasiti(Refining) Sebulan</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e101_a2'
                                        id="e101_a2" required onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_a2();valid_a2()"
                                        value="{{ number_format($penyata->e101_a2 ?? 0, 2) }}">


                                    <p type="hidden" id="err_a2" style="color: red; display:none"><i>Nilai mestilah
                                            melebihi 0!</i></p>
                                    <p type="hidden" id="err_a22" style="color: red; display:none"><i>Nilai mestilah
                                            tidak
                                            melebihi 100!</i></p>

                                    @error('e101_a2')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-2">%</div>
                            </div>

                            <div class="row justify-content-center" ">
                                    <div class="col-sm-5 form-group" >
                                        <label for="fname" class="control-label col-form-label">
                                            Kadar Penggunaan Kapasiti(Fractionation) Sebulan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" style="text-align:right" name='e101_a3'
                                            id="e101_a3" onkeypress="return isNumberKey(event)" required
                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." onchange="autodecimal(this); FormatCurrency(this)"
                                            oninput="validate_two_decimal(this);setCustomValidity('');valid_a3()"
                                            value="{{ number_format($penyata->e101_a3 ?? 0, 2) }}">
                                        <p type="hidden" id="err_a3" style="color: red; display:none"><i>Nilai mestilah
                                                melebihi 0!</i></p>
                                                <p type="hidden" id="err_a32" style="color: red; display:none"><i>Nilai mestilah tidak
                                                    melebihi 100!</i></p>

                                        @error('e101_a3')
        <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
    @enderror
                                    </div>
                                    <div class="mt-2">%</div>

                                </div>

                                <div class="form-group" style="padding: 2%; margin-bottom: 10%">
                                    <a href="{{ route('penapis.bahagianii') }}" class="btn btn-primary"
                                        style="float: left">Sebelumnya</a>
                                    <button type="button" class="btn btn-primary "style="float: right" id="checkBtn"
                                        onclick="check()">Simpan &
                                        Seterusnya</button>
                                </div>

                                <!-- Vertically Centered modal Modal -->
                                <div class="modal fade" id="next" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    PENGESAHAN</h5>
                                                <button type="button" class="close" data-dismiss="modal"
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
                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
@endsection
        @section('scripts')
    {{-- <script>
        $(document).ready(function(){
            $("input[id='e101_a2']").on('input', function() {
                $(this).val(function(i, v) {
                 return v.replace('%','') + '%';  });
                });
            });
        </script> --}}
        <script>
            function input_a1() {
               var a1 = document.getElementById('e101_a1');
               var a1_hidden = document.getElementById('e101a1_hidden');
               console.log(a1);
               a1_hidden.value = a1.value;

            }
        </script>

                {{-- <script type="text/javascript">
                    $(document).ready(function() {
                        @if ($cpo == null || $cpko == null || $cpo == '0.0' || $cpko == '0.0' || $cpo == '0' || $cpo == '0')
                            console.log('tiada');
                            document.getElementById("e101_a1").removeAttribute('required');
                            document.getElementById("e101_a2").removeAttribute('required');
                            document.getElementById("e101_a3").removeAttribute('required');

                            // document.getElementById('meningkat_container').style.display = "block";
                            // document.getElementById('lain_container').style.display = "block";
                        @else
                            console.log('ada');
                            document.getElementById("e101_a1").setAttribute('required', '');
                            document.getElementById("e101_a2").setAttribute('required', '');
                            document.getElementById("e101_a3").setAttribute('required', '');
                            // $("#tutup").modal('show');
                        @endif
                    });
                </script> --}}
                <script>
                    function check() {
                        // (B1) INIT
                        var error = "",
                            field = "";
                        // @if ($cpo == null || $cpko == null || $cpo == '0.0' || $cpko == '0.0' || $cpo == '0' || $cpko == '0')
                        //    // kod produk
                        //    field = document.getElementById("e101_a1");
                        //     if (field.value > 31) {
                        //         error += "Name must be 2-4 characters\r\n";
                        //         $('#e101_a1').css('border-color', 'red');
                        //         document.getElementById('err_a1').style.display = "none";
                        //         document.getElementById('err_a12').style.display = "block";
                        //     }
                        // @else
                            // kod produk
                            console.log('lebih dari kosong');
                            field = document.getElementById("e101_a1");
                            if (!field.checkValidity() || field.value == '0') {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_a1').css('border-color', 'red');
                                document.getElementById('err_a1').style.display = "block";
                                document.getElementById('err_a12').style.display = "none";
                                console.log('masuk');

                            } else if (field.value > 31) {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_a1').css('border-color', 'red');
                                document.getElementById('err_a1').style.display = "none";
                                document.getElementById('err_a12').style.display = "block";
                            }


                            field = document.getElementById("e101_a2");
                            if (!field.checkValidity() || field.value == '0.00') {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_a2').css('border-color', 'red');
                                document.getElementById('err_a2').style.display = "block";
                                document.getElementById('err_a22').style.display = "none";
                                console.log('masuk');

                            } else if (field.value >= 100) {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_a2').css('border-color', 'red');
                                document.getElementById('err_a2').style.display = "none";
                                document.getElementById('err_a22').style.display = "block";
                            }

                            field = document.getElementById("e101_a2");
                            field2 = $('#e101_a3').val();
                            val = parseFloat(Number(field2.replace(/,/g, "")))
                            if (!field.checkValidity() || field.value == '0.00') {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_a3').css('border-color', 'red');
                                document.getElementById('err_a3').style.display = "block";
                                console.log('masuk');
                            } else if (val >= 100) {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_a3').css('border-color', 'red');
                                document.getElementById('err_a3').style.display = "none";
                                document.getElementById('err_a32').style.display = "block";
                            }
                        // @endif



                        // (B4) RESULT
                        if (error == "") {

                            $('#next').modal('show');
                            return true;
                        } else {
                            $('#next').modal('hide');

                            return false;
                        }

                    }
                </script>
                {{-- <script>
                    function valid_a1() {
                        @if ($cpo == null || $cpko == null || $cpo == '0.00' || $cpko == '0.00' || $cpo == '0' || $cpo == '0')
                        @else

                            if ($('#e101_a1').val() == '' || $('#e101_a1').val() == '0') {
                                $('#e101_a1').css('border-color', 'red');
                                document.getElementById('err_a1').style.display = "block";
                                document.getElementById('err_a12').style.display = "none";


                            } else if ($('#e101_a1').val() > 31) {
                                $('#e101_a1').css('border-color', 'red');
                                document.getElementById('err_a1').style.display = "none";
                                document.getElementById('err_a12').style.display = "block";

                            } else {
                                $('#e101_a1').css('border-color', '');
                                document.getElementById('err_a1').style.display = "none";
                                document.getElementById('err_a12').style.display = "none";

                            }
                        @endif
                    }
                </script>
                <script>
                    function valid_a2() {
                        @if ($cpo == null || $cpko == null || $cpo == '0.00' || $cpko == '0.00' || $cpo == '0' || $cpo == '0')
                        @else
                            if ($('#e101_a2').val() == '' || $('#e101_a2').val() == 0) {
                                $('#e101_a2').css('border-color', 'red');
                                document.getElementById('err_a2').style.display = "block";
                                document.getElementById('err_a22').style.display = "none";


                            } else if ($('#e101_a2').val() >= 100) {
                                console.log($('#e101_a2').val());
                                $('#e101_a2').css('border-color', 'red');
                                document.getElementById('err_a2').style.display = "none";
                                document.getElementById('err_a22').style.display = "block";

                            } else {
                                $('#e101_a2').css('border-color', '');
                                document.getElementById('err_a2').style.display = "none";
                                document.getElementById('err_a22').style.display = "none";

                            }
                        @endif
                    }
                </script>
                <script>
                    function valid_a3() {
                        @if ($cpo == null || $cpko == null || $cpo == '0.00' || $cpko == '0.00' || $cpo == '0' || $cpo == '0')
                        @else
                            if ($('#e101_a3').val() == '' || $('#e101_a3').val() == 0) {
                                $('#e101_a3').css('border-color', 'red');
                                document.getElementById('err_a3').style.display = "block";
                                document.getElementById('err_a32').style.display = "none";


                            } else if ($('#e101_a3').val() >= 100) {
                                $('#e101_a3').css('border-color', 'red');
                                document.getElementById('err_a3').style.display = "none";
                                document.getElementById('err_a32').style.display = "block";

                            } else {
                                $('#e101_a3').css('border-color', '');
                                document.getElementById('err_a3').style.display = "none";
                                document.getElementById('err_a32').style.display = "none";

                            }
                        @endif
                    }
                </script> --}}
                <script>
                    function invoke_a1() {
                        addEventListener('keydown', function(evt) {
                            var whichKey = checkKey(evt);
                            if (whichKey == 13) {
                                console.log('successful');
                                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                                document.getElementById('e101_a2').focus();
                            }

                        });
                    }

                    function invoke_a2() {
                        addEventListener('keydown', function(evt) {
                            var whichKey = checkKey(evt);
                            if (whichKey == 13) {
                                console.log('successful');
                                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                                document.getElementById('e101_a3').focus();
                            }

                        });
                    }


                    function checkKey(evt) {
                        //console.log(evt.which);
                        return evt.which;
                    }
                </script>
                <script>
                    function nodecimal(data) {
                        // let decimal = ".00"
                        var x = parseFloat(data.value);
                        if (isNaN(x)) {
                            x = 0;
                        }
                        const removedDecimal = Math.round(x);
                        data.value = removedDecimal;
                        //console.log(removedDecimal);
                    }
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $(".floatNumberField").change(function() {
                            $(this).val(parseFloat($(this).val()).toFixed(2));
                        });
                    });
                </script>

                <script>
                    var input = document.getElementById("e101_a1");
                    var lastValue = "";

                    input.addEventListener("keydown", valueCheck);
                    input.addEventListener("keyup", valueCheck);

                    function valueCheck() {
                        if (input.value.match(/^[0-9]*$/))
                            lastValue = input.value;
                        else
                            input.value = lastValue;
                    }
                </script>
                <script>
                    document.addEventListener('keypress', function(e) {
                        if (e.keyCode === 13 || e.which === 13) {
                            e.preventDefault();
                            return false;
                        }

                    });
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

                        //add form
                        var x = $('#e101_a2').val();
                        x = x.replace(/,/g, '');
                        x = parseFloat(x, 10);
                        $('#e101_a2').val(x);

                        var x = $('#e101_a3').val();
                        x = x.replace(/,/g, '');
                        x = parseFloat(x, 10);
                        $('#e101_a3').val(x);



                        return true;

                    });
                </script>
@endsection
