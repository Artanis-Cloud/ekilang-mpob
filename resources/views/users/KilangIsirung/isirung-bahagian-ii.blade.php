@extends('layouts.main')

<style>
    input.input-error {
    color: #ff0000;
    border: 1px solid #ff0000;
    box-shadow: 0 0 5px #ff0000;
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
                    {{-- <h4 class="page-title" style="font-size: 20px">Kemasukan Penyata Bulanan
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

                <b>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4<br>

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
        <div class="card" style="margin: 2%">
            <form action="{{ route('isirung.update.bahagian.ii', [$penyata->e102_reg]) }}" method="post" class="sub-form" onsubmit="return check()" novalidate>
                @csrf
                <div class="card-body">

                    <div class="mb-4 text-center">
                        <h3 style="color: rgb(39, 80, 71); ">Bahagian 2</h3>
                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Kadar Perahan CPKO, Kadar Perolehan PKC, Jam
                            Pengilangan dan Kadar Penggunaan Kapasiti Pemprosesan</h5>


                    </div>
                    <hr>
                    <div class="mb-2 col-8" style="text-align: left">
                        <p><i>Nota: Sila isikan butiran dibawah dan tekan butang ‘Simpan & Seterusnya’</i></p>
                    </div>
                    <div class="container mt-4" style="">

                        <div class="row justify-content-center" >
                            <div class="col-sm-4 form-group" >
                                <label for="fname" class="control-label col-form-label">
                                    i.
                                    Kadar Perahan Minyak Isirung Sawit Mentah (CPKO) </label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" style="text-align:right" name='e102_al1'
                                    id="e102_al1" required onkeypress="return isNumberKey(event)" max="99" required onchange="FormatCurrency(this)"
                                     oninput="this.setCustomValidity(''); invokeFunc(); valid_percent()"
                                    value="{{ number_format($cpko ?? 0, 2) }}" readonly>
                                    <p type="hidden" id="err_al1" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    <p type="hidden" id="err_al1_2" style="color: red; display:none"><i>Nilai hendaklah kurang dari 100%. Sila ubah nilai di bahagian 1</i></p>
                                {{-- @error('e102_al1')
                                    <div class="alert alert-danger">
                                        <strong>Sila isi butiran ini</strong>
                                    </div>
                                @enderror --}}
                            </div>
                            <div class="mt-2">%</div>

                        </div>
                        <div class="row justify-content-center" >
                            <div class="col-sm-4 form-group" >
                                <label for="fname" class="control-label col-form-label">
                                    ii.
                                    Kadar Perolehan Dedak Isirung (PKC)</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" style="text-align:right" name='e102_al2'
                                    id="e102_al2" required onchange="FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                    oninput="this.setCustomValidity(''); invokeFunc2()"
                                    value="{{ number_format($pkc ?? 0, 2) }}" readonly>
                                    <p type="hidden" id="err_al2" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    <p type="hidden" id="err_al2_2" style="color: red; display:none"><i>Nilai hendaklah kurang dari 100%. Sila ubah nilai di bahagian 1</i></p>
                                @error('e102_al2')
                                    <div class="alert alert-danger">
                                        <strong>Sila isi butiran ini</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-2">%</div>

                        </div>
                        <div class="row justify-content-center" >
                            <div class="col-sm-4 form-group" >
                                <label for="fname" class="control-label col-form-label">
                                    iii.
                                    Jumlah Jam Pengilangan Isirung (PK)</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" style="text-align:right" name='e102_al3' onClick="this.select();"
                                    id="e102_al3" onkeypress="return isNumberKey(event)" required onchange="FormatCurrency(this)"
                                    title="Sila isikan butiran ini."  oninput="this.setCustomValidity(''); invokeFunc()"
                                    value="{{ number_format($penyata->e102_al3 ?? 0, 2) }}">
                                @error('e102_al3')
                                    <div class="alert alert-danger">
                                        <strong>Sila isi butiran ini</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-2">&nbsp;&nbsp;&nbsp;</div>

                        </div>
                        <div class="row justify-content-center" >
                            <div class="col-sm-4 form-group" >
                                <label for="fname" class="control-label col-form-label">
                                    iv.
                                    Kadar Penggunaan Kapasiti Sebulan </label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" style="text-align:right" name='e102_al4' onClick="this.select();"
                                    id="e102_al4" onkeypress="return isNumberKey(event)" required onchange="autodecimal(this); FormatCurrency(this)"
                                    title="Sila isikan butiran ini."  oninput="this.setCustomValidity(''); valid_percent()"
                                    value="{{ number_format($penyata->e102_al4 ?? 0, 2) }}">
                                    <p type="hidden" id="err_al4" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    <p type="hidden" id="err_al4_2" style="color: red; display:none"><i>Nilai hendaklah kurang dari 100%!</i></p>
                                @error('e102_al4')
                                    <div class="alert alert-danger">
                                        <strong>Sila isi butiran ini</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-2">%</div>

                        </div>

                        <div class="form-group" style="padding: 3%; ">
                            <a href="{{ route('isirung.bahagiani') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>

                            <button type="button" class="btn btn-primary " style="float: right" onclick="check()" id="checkBtn">Simpan &
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
            </form>
        @endsection
        @section('scripts')
            {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
            </script> --}}


            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".floatNumberField").change(function() {
                        $(this).val(parseFloat($(this).val()).toFixed(2));
                    });
                });
            </script>
             <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_al4').focus();
                            document.getElementById('e102_al4').select();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
                <script>
                    function valid_percent() {

                        if ($('#e102_al4').val() == '') {
                            $('#e102_al4').css('border-color', 'red');
                            document.getElementById('err_al4').style.display = "block";
                            document.getElementById('err_al4_2').style.display = "none";
                            console.log('sini');

                        } else if ($('#e102_al4').val() >= 100) {
                            $('#e102_al4').css('border-color', 'red');
                            document.getElementById('err_al4_2').style.display = "block";
                            document.getElementById('err_al4').style.display = "none";


                        } else {
                            $('#e102_al4').css('border-color', '');
                            document.getElementById('err_al4_2').style.display = "none";
                            document.getElementById('err_al4').style.display = "none";
                        }

                    }
                </script>


<script>
    function check() {
        // (B1) INIT
        var error = "",
            field = "";



        //e102_al1
        field = document.getElementById("e102_al1");
        if (field.value == '') {
            error += "Name must be 2-4 characters\r\n";
            $('#e102_al1').css('border-color', 'red');
            document.getElementById('err_al1').style.display = "block";
            // document.getElementById('err_email2').style.display = "none";
        }
        else if (field.value >= 100) {
            error += "Name must be 2-4 characters\r\n";
            // alert("You have entered an invalid email address!");
            $('#e102_al1').css('border-color', 'red');
            document.getElementById('err_al1_2').style.display = "block";
            console.log('error');
        } else {
            document.getElementById('err_al1_2').style.display = "none";
            document.getElementById('err_al1').style.display = "none";

        }

        //e102_al2
        field = document.getElementById("e102_al2");
        if (field.value == '') {
            error += "Name must be 2-4 characters\r\n";
            $('#e102_al2').css('border-color', 'red');
            document.getElementById('err_al2').style.display = "block";
            // document.getElementById('err_email2').style.display = "none";
        }
        // else if (field.value >= 100) {
        //     error += "Name must be 2-4 characters\r\n";
        //     // alert("You have entered an invalid email address!");
        //     $('#e102_al2').css('border-color', 'red');
        //     document.getElementById('err_al2_2').style.display = "block";
        //     console.log('error');
         else {
            document.getElementById('err_al2_2').style.display = "none";
            document.getElementById('err_al2').style.display = "none";

        }
        //e102_al4
        field = document.getElementById("e102_al4");
        if (field.value == '') {
            error += "Name must be 2-4 characters\r\n";
            $('#e102_al4').css('border-color', 'red');
            document.getElementById('err_al4').style.display = "block";
            // document.getElementById('err_email2').style.display = "none";
        }
        else if (field.value >= 100) {
            error += "Name must be 2-4 characters\r\n";
            // alert("You have entered an invalid email address!");
            $('#e102_al4').css('border-color', 'red');
            document.getElementById('err_al4_2').style.display = "block";
            console.log('error');
        } else {
            document.getElementById('err_al4_2').style.display = "none";
            document.getElementById('err_al4').style.display = "none";

        }



        // (B4) RESULT
        if (error == "") {
            console.log('modal');
            $('#next').modal('show');
            return true;
        } else {
            $('#next').modal('hide');

            console.log('xmodal');

            return false;
        }


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

        var x = $('#e102_al1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e102_al1').val(x);

        var x = $('#e102_al2').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e102_al2').val(x);

        var x = $('#e102_al3').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e102_al3').val(x);

        var x = $('#e102_al4').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#e102_al4').val(x);
        return true;

                });
            </script>
{{--
            <script>
                window.onload = function() {
                    var textbox = document.getElementById("e102_al1");
                    var maxVal = 100;

                    addEvent(textbox, "keyup", function() {
                        var thisVal = +this.value;

                        this.className = this.className.replace(" input-error ", "");
                        if (isNaN(thisVal) || thisVal > maxVal) {
                            this.className += " input-error ";
                            // Invalid input
                        }
                    });
                };

                function addEvent(element, event, callback) {
                    if (element.addEventListener) {
                        // element.addEventListener(event, callback, false);
                        toastr.error('Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan', 'Ralat!', {
                        "progressBar": true
                    })

                    } else if (element.attachEvent) {
                        element.attachEvent("on" + event, callback);

                    } else {
                        element["on" + event] = callback;
                    }
                }
                </script> --}}
            @endsection
