@extends('layouts.main')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb mb-3">
            <div class="row" >
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Maklumat Pelesen</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex  justify-content-end">
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
        <div class="card" style="margin-right:3%; margin-left:3%">
            <div class="card-body">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" style="padding: 2%">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Tukar Kata Laluan</h3>
                        </div>
                        <hr>
                        <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '<b style="color: red"> * </b>'</i>

                        <form method="POST" action="{{ route('isirung.update.password', [$user[0]->id]) }}">
                            {{ csrf_field() }}

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">Kata
                                    Laluan Terdahulu <i>(8 Aksara)</i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name='old_password' id="myInput"
                                     placeholder="Kata Laluan Terdahulu" required
                                     oninvalid="this.setCustomValidity('Sila isi butiran ini')"
                                     oninput="this.setCustomValidity(''); valid_ps()"
                                        title="Sila isikan butiran ini.">
                                        <p type="hidden" id="err_ps" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
                                    @error('old_password')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">Kata
                                    Laluan Baru <i>(8 Aksara)</i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name='new_password' id="myInput2"
                                        placeholder="Kata Laluan Baru" required
                                        oninvalid="this.setCustomValidity('Sila masukkan lebih dari 8 aksara')"
                                        oninput="this.setCustomValidity(''); valid_nps()"
                                        title="Sila isikan butiran ini.">
                                    <p type="hidden" id="err_nps" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    <p type="hidden" id="err_nps2" style="color: red; display:none"><i>Kata laluan kurang dari 8 aksara!</i></p>
                                    <span id = "message" style="color:red"> </span>

                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">Sahkan
                                    Kata Laluan Baru <i>(8 Aksara)</i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name='password_confirmation' id="myInput3"
                                        placeholder="Sahkan Kata Laluan Baru" required
                                        oninput="this.setCustomValidity(''); valid_cps()"
                                        title="Sila isikan butiran ini.">
                                    <p type="hidden" id="err_cps" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    <p type="hidden" id="err_cps2" style="color: red; display:none"><i>Kata laluan kurang dari 8 aksara!</i></p>
                                    <p type="hidden" id="err_cps3" style="color: red; display:none"><i>Kata laluan tidak sama!</i></p>

                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label align-it"></i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" onclick="myFunction()">&nbsp;Tunjuk Kata Laluan
                                </div>
                            </div>


                            <div class="row justify-content-center"  style="margin: 50px 0px">
                                <button type="button" class="btn btn-primary"  id="checkBtn" onclick="check()">Tukar Kata Laluan</button>
                            </div>

                            <div class="modal fade" id="next" tabindex="-1" role="dialog"
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
                                            Anda pasti mahu menukar kata laluan ini?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block" style="color:#275047">Kembali</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tukar</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
    <script>
        function valid_ps() {

            if ($('#myInput').val() == '') {
                $('#myInput').css('border-color', 'red');
                document.getElementById('err_ps').style.display = "block";


            } else {
                $('#myInput').css('border-color', '');
                document.getElementById('err_ps').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_nps() {

            if ($('#myInput2').val() == '' ) {
                $('#myInput2').css('border-color', 'red');
                document.getElementById('err_nps').style.display = "block";
                document.getElementById('err_nps2').style.display = "none";


            } else if ($('#myInput2').val().length < 8 ) {
                $('#myInput2').css('border-color', 'red');
                document.getElementById('err_nps').style.display = "none";
                document.getElementById('err_nps2').style.display = "block";

            }

            else {
                $('#myInput2').css('border-color', '');
                document.getElementById('err_nps').style.display = "none";
                document.getElementById('err_nps2').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_cps() {



            if ($('#myInput3').val() == '') {
                $('#myInput3').css('border-color', 'red');
                document.getElementById('err_cps').style.display = "block";
                document.getElementById('err_cps2').style.display = "none";
                document.getElementById('err_cps3').style.display = "none";

            } else if ($('#myInput3').val().length < 8 ) {
                if ($('#myInput3').val() !=  $('#myInput2').val() ) {
                $('#myInput3').css('border-color', 'red');
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "block";
                document.getElementById('err_cps3').style.display = "block";
                } else {
                    $('#myInput3').css('border-color', 'red');
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "block";
                document.getElementById('err_cps3').style.display = "none";
                }

            } else if ($('#myInput3').val() !=  $('#myInput2').val() ) {
                $('#myInput3').css('border-color', 'red');
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "block";
                document.getElementById('err_cps3').style.display = "block";

            } else {
                $('#myInput3').css('border-color', '');
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "none";
                document.getElementById('err_cps3').style.display = "none";

            }

        }
    </script>
    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // alamat premis 1500403125000
            if ($('#myInput').val() == '') {
                $('#myInput').css('border-color', 'red');
                error += "Name must be 2-4 characters\r\n";

                document.getElementById('err_ps').style.display = "block";


            } else {
                $('#myInput').css('border-color', '');
                document.getElementById('err_ps').style.display = "none";

            }

            // alamat premis 1

            if ($('#myInput2').val() == '' ) {
                $('#myInput2').css('border-color', 'red');
                error += "Name must be 2-4 characters\r\n";
                document.getElementById('err_nps').style.display = "block";
                document.getElementById('err_nps2').style.display = "none";


            } else if ($('#myInput2').val().length < 8 ) {
                $('#myInput2').css('border-color', 'red');
                error += "Name must be 2-4 characters\r\n";
                document.getElementById('err_nps').style.display = "none";
                document.getElementById('err_nps2').style.display = "block";

            }

            else {
                $('#myInput2').css('border-color', '');
                document.getElementById('err_nps').style.display = "none";
                document.getElementById('err_nps2').style.display = "none";

            }

            // alamat premis 1


            if ($('#myInput3').val() == '') {
                $('#myInput3').css('border-color', 'red');
                error += "Name must be 2-4 characters\r\n";
                document.getElementById('err_cps').style.display = "block";
                document.getElementById('err_cps2').style.display = "none";
                document.getElementById('err_cps3').style.display = "none";

            } else if ($('#myInput3').val().length < 8 ) {
                if ($('#myInput3').val() !=  $('#myInput2').val() ) {
                $('#myInput3').css('border-color', 'red');
                error += "Name must be 2-4 characters\r\n";
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "block";
                document.getElementById('err_cps3').style.display = "block";
                } else {
                    $('#myInput3').css('border-color', 'red');
                error += "Name must be 2-4 characters\r\n";
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "block";
                document.getElementById('err_cps3').style.display = "none";
                }

            } else if ($('#myInput3').val() !=  $('#myInput2').val() ) {
                $('#myInput3').css('border-color', 'red');
                error += "Name must be 2-4 characters\r\n";
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "block";
                document.getElementById('err_cps3').style.display = "block";

            } else {
                $('#myInput3').css('border-color', '');
                document.getElementById('err_cps').style.display = "none";
                document.getElementById('err_cps2').style.display = "none";
                document.getElementById('err_cps3').style.display = "none";

            }



            // (B4) RESULT
            if (error == "") {
                $('#next').modal('show');
                return true;
            } else {
                toastr.error(
                    'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                    'Ralat!', {
                        "progressBar": true
                    })
                return false;
            }


        }
    </script>
    <script>
        var password = document.getElementById("myInput2"), confirm_password = document.getElementById("myInput3");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Kata laluan tidak sama");
        } else {
            confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;


        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var x = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var x = document.getElementById("myInput3");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
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
@endsection
