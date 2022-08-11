@extends('layouts.main')

@section('content')

<div class="page-wrapper">


    <div class="page-breadcrumb mb-3">
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

            <b>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4
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
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
                        <form action="{{ route('oleo.update.bahagian.ii', [$penyata->e104_reg]) }}" method="post" class="sub-form">
                            @csrf
                            <div class="card-body">
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="">

                                        <div class="text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h3>
                                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Hari Beroperasi dan Kadar Penggunaan Kapasiti Pemprosesan</h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>

                                            <div class="container center mt-3">
                                                <div class="row justify-content-center" style="margin:20px 0px">
                                                    <div class="col-sm-4 form-group" style="margin: 0px">
                                                        <label for="fname"
                                                        class="control-label col-form-label">i.
                                                        Jumlah Hari Kilang Beroperasi Sebulan </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control text-right" name='e104_a5' max="31" oninvalid="this.setCustomValidity('Sila pastikan jumlah hari tidak melebihi 31 hari')"
                                                            onkeypress="return isNumberKey(event)" id="e104_a5" required oninput="this.setCustomValidity(''); nodecimal(); invokeFunc()" max="31" min="0"
                                                            title="Sila isikan butiran ini." value="{{ old('e104_a5') ?? $penyata->e104_a5 }}">
                                                        @error('e104_a5')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    </div>
                                                    <div class="col-sm-1 form-group" style="margin: 0px">
                                                        <label for="fname"
                                                        class="control-label col-form-label">	</label>
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>

                                                <div class="row justify-content-center" style="margin:20px 0px">
                                                    <div class="col-sm-4 form-group" style="margin: 0px">
                                                        <label for="fname"
                                                        class="control-label col-form-label">ii.
                                                        Kadar Penggunaan Kapasiti Sebulan (%)	</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control text-right" name='e104_a6'
                                                            onkeypress="return isNumberKey(event)" id="e104_a6"  onchange="autodecimal(this); FormatCurrency(this)"
                                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                                            required title="Sila isikan butiran ini." value="{{ $penyata->e104_a6 }}">
                                                        @error('e104_a6')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    </div>
                                                    <div class="col-sm-1 form-group" style="margin: 0px">
                                                        <label for="fname"
                                                        class="control-label col-form-label">%	</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-10 ml-auto mr-auto" style="margin-top:50px">
                                                <a href="{{ route('oleo.bahagianic') }}" class="btn btn-primary"
                                                    style="float: left">Sebelumnya</a>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    style="float: right" data-target="#next">Simpan &
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

                                                        <button type="submit" class="btn btn-primary ml-1"
                                                            data-bs="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div></div> --}}





                            </div><br><br>
                        </form>




    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

            <br><br><br><br><br><br><br>

@endsection
@section('scripts')
<script>
    function invokeFunc() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e104_a6').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
    <script>
        function nodecimal() {
            // let decimal = ".00"
            var x = parseFloat(document.getElementById("e104_a5").value);
            if(isNaN(x)){
                x = 0;
            }
            const removedDecimal = Math.round(x);
            document.querySelector("#e104_a5").value = removedDecimal;
            console.log(removedDecimal);
        }
    </script>

    <script type="text/javascript">

        function showTable() {
            var oer = $('#kadar_oer').val();
            // console.log(oer);

            if (oer == "Meningkat") {
                document.getElementById('meningkat_container').style.display = "block";
            } else {
                document.getElementById('meningkat_container').style.display = "none";
                document.getElementById("checkbox1").checked = false;
                document.getElementById("checkbox2").checked = false;
                document.getElementById("checkbox3").checked = false;
                document.getElementById("checkbox4").checked = false;
                document.getElementById("checkbox5").checked = false;
                document.getElementById("checkbox6").checked = false;
            }

            if (oer == "Menurun") {
                document.getElementById('menurun_container').style.display = "block";
            } else {
                document.getElementById('menurun_container').style.display = "none";
                document.getElementById("checkbox7").checked = false;
                document.getElementById("checkbox8").checked = false;
                document.getElementById("checkbox9").checked = false;
                document.getElementById("checkbox10").checked = false;
                document.getElementById("checkbox11").checked = false;
                document.getElementById("checkbox12").checked = false;
                document.getElementById("checkbox13").checked = false;
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

            var x = $('#e104_a6').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#e104_a6').val(x);


            return true;

    });
    </script>

@endsection
