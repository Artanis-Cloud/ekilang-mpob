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
            <div class="row mb-2">
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

               <b> PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4<br>

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

            <div class="card-body">
                <div class="">
                    @if (!$penyata)
                        <form action="{{ route('bio.add.bahagian.ii') }}" method="post" novalidate>
                            @csrf
                    @else
                        <form action="{{ route('bio.edit.bahagian.ii', [$penyata->lesen]) }}"
                                method="post" novalidate>
                            @csrf
                    @endif



                    <div class="text-center">
                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h3>
                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Hari Beroperasi dan Kadar
                            Penggunaan Kapasiti</h5>
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
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="hari" style="text-align: right"
                                name='hari_operasi' min="0" max="31" oninvalid="this.setCustomValidity('Sila pastikan bilangan hari tidak melebihi 31 hari')"
                                oninput="this.setCustomValidity(''); invokeFunc(); valid_a5(); nodecimal()"
                                required
                                    title="Sila isikan butiran ini." value="{{ $penyata->hari_operasi ?? 0 }}">
                                    <p type="hidden" id="err_a5" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    <p type="hidden" id="err_a52" style="color: red; display:none"><i>Nilai hendaklah kurang dari 31 hari.</i></p>
                                    @error('hari_operasi')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-1 form-group" style="margin: 0px">
                                <label for="fname"
                                class="control-label col-form-label">	</label>
                            </div>

                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-4 form-group" style="margin: 0px">
                                <label for="fname"
                                class="control-label col-form-label">ii.
                                Kadar Penggunaan Kapasiti Sebulan </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='kapasiti' oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                oninput="this.setCustomValidity(''); valid_a6()" style="text-align: right"
                                    onkeypress="return isNumberKey(event)" id="kapasiti" oninput="validate_two_decimal(this)"
                                    required
                                    title="Sila isikan butiran ini." value="{{ $penyata->kapasiti ?? 0 }}">
                                    <p type="hidden" id="err_a6" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    <p type="hidden" id="err_a62" style="color: red; display:none"><i>Nilai hendaklah kurang dari 100%</i></p>
                                    @error('kapasiti')
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

                    <div class="form-group col-10 ml-auto mr-auto" style="margin-top:4%; margin-bottom: 15%">
                            <a href="{{ route('bio.bahagianic') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>

                            <button type="button" class="btn btn-primary " id="checkBtn" onclick="check()"
                                style="float: right" >Simpan &
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
                                    <button type="button" class="btn btn-light-secondary"
                                        data-dismiss="modal">
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
                    </form>
                </div>
            </div>
            <script>
                function nodecimal() {
                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("hari").value);
                    if(isNaN(x)){
                        x = 0;
                    }
                    const removedDecimal = Math.round(x);
                    document.querySelector("#hari").value = removedDecimal;
                    console.log(removedDecimal);
                }
            </script>
            <script>

                function check() {
                    // (B1) INIT
                    var error = "",
                        field = "";



                    //e102_al1
                    field = document.getElementById("hari");
                    if (field.value == '') {
                        error += "Name must be 2-4 characters\r\n";
                        $('#hari').css('border-color', 'red');
                        document.getElementById('err_a5').style.display = "block";
                        // document.getElementById('err_email2').style.display = "none";
                    }
                    else if (field.value > 31) {
                        error += "Name must be 2-4 characters\r\n";
                        // alert("You have entered an invalid email address!");
                        $('#hari').css('border-color', 'red');
                        document.getElementById('err_a52').style.display = "block";
                        console.log('error');
                    } else {
                        document.getElementById('err_a52').style.display = "none";
                        document.getElementById('err_a5').style.display = "none";

                    }

                    //e102_al2
                    field = document.getElementById("kapasiti");
                    if (field.value == '') {
                        error += "Name must be 2-4 characters\r\n";
                        $('#kapasiti').css('border-color', 'red');
                        document.getElementById('err_a6').style.display = "block";
                        // document.getElementById('err_email2').style.display = "none";
                    }
                    else if (field.value >= 100) {
                        error += "Name must be 2-4 characters\r\n";
                        // alert("You have entered an invalid email address!");
                        $('#kapasiti').css('border-color', 'red');
                        document.getElementById('err_a62').style.display = "block";
                        console.log('error');
                    } else {
                        document.getElementById('err_a62').style.display = "none";
                        document.getElementById('err_a6').style.display = "none";

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
                function valid_a5() {

                    if ($('#hari').val() == '') {
                        $('#hari').css('border-color', 'red');
                        document.getElementById('err_a5').style.display = "block";
                        document.getElementById('err_a52').style.display = "none";
                        console.log('sini');

                    } else if ($('#hari').val() > 31) {
                        $('#hari').css('border-color', 'red');
                        document.getElementById('err_a52').style.display = "block";
                        document.getElementById('err_a5').style.display = "none";


                    } else {
                        $('#hari').css('border-color', '');
                        document.getElementById('err_a5').style.display = "none";
                        document.getElementById('err_a52').style.display = "none";
                    }

                }
            </script>
            <script>
                function valid_a6() {

                    if ($('#kapasiti').val() == '') {
                        $('#kapasiti').css('border-color', 'red');
                        document.getElementById('err_a6').style.display = "block";
                        document.getElementById('err_a62').style.display = "none";
                        console.log('sini');

                    } else if ($('#kapasiti').val() >= 100) {
                        $('#kapasiti').css('border-color', 'red');
                        document.getElementById('err_a62').style.display = "block";
                        document.getElementById('err_a6').style.display = "none";


                    } else {
                        $('#kapasiti').css('border-color', '');
                        document.getElementById('err_a6').style.display = "none";
                        document.getElementById('err_a62').style.display = "none";
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
            <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('kapasiti').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
<br>
@endsection
