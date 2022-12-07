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
                    <h4 class="page-title">Konfigurasi</h4>
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
            {{-- @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif --}}
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i
                                            class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); ">Pengurusan Pentadbir</h3>
                                <h4 style="color: rgb(39, 80, 71); margin-top:1%">Daftar Akaun Pentadbir</h4>
                            </div>
                            <hr>
                            <form action="{{ route('admin.pengurusan.pentadbir.process') }}" method="post" novalidate>
                                @csrf
                                <div class="card-body">
                                    <div class="container center">

                                        <div class="row" style="margin-top: -1% ">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Nama</label>
                                            <div class="col-md-6">
                                                <input type="text" id="name" class="form-control" placeholder="Nama"
                                                    required name="name" value="{{ old('name') }}"
                                                    oninput="valid_name(); ValidateEmail()">
                                                <p type="hidden" id="err_name" style="color: red; display:none"><i>Sila
                                                        isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                                @error('name')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top: 1% ">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Emel</label>
                                            <div class="col-md-6">
                                                <input type="text" id="email" class="form-control" placeholder="Emel"
                                                    required name="email" value="{{ old('email') }}"
                                                    oninput="valid_email()">
                                                <p type="hidden" id="err_email" style="color: red; display:none"><i>Sila
                                                        isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                                <p type="hidden" id="err_email2" style="color: red; display:none"><i>Sila
                                                        masukkan
                                                        alamat emel yang betul!</i></p>
                                                @error('email')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="row" style="margin-top: 1% ">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Username</label>
                                            <div class="col-md-6">
                                                <input type="text" id="username" class="form-control"
                                                    placeholder="Username" maxlength="8" name="username"
                                                    value="{{ old('username') }}" oninput="valid_username()" required>
                                                <p type="hidden" id="err_user" style="color: red; display:none"><i>Sila
                                                        isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                                @error('username')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top: 1% ">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Kategori</label>
                                            <div class="col-md-6">
                                                @if (auth()->user()->role == 'Superadmin')
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="role" name="role"
                                                            oninput="valid_role()" required value={{ old('role') }}>
                                                            <option selected hidden disabled>Sila Pilih Kategori</option>
                                                            <option value="Superadmin">Superadmin</option>
                                                            <option value="Manager">Manager</option>
                                                            <option value="Supervisor">Supervisor</option>
                                                            <option value="Admin">Admin</option>
                                                        </select>
                                                        <p type="hidden" id="err_role"
                                                            style="color: red; display:none"><i>Sila buat pilihan di
                                                                bahagian ini!</i></p>
                                                    </fieldset>
                                                    @error('category')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                @elseif (auth()->user()->role == 'Manager')
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="role2" name="role"
                                                            oninput="valid_role2()" value={{ old('role') }} required>
                                                            <option selected hidden disabled>Sila Pilih Kategori</option>
                                                            <option value="Manager">Manager</option>
                                                            <option value="Supervisor">Supervisor</option>
                                                            <option value="Admin">Admin</option>
                                                        </select>
                                                        <p type="hidden" id="err_role2"
                                                            style="color: red; display:none"><i>Sila buat pilihan di
                                                                bahagian ini!</i></p>
                                                    </fieldset>
                                                    @error('category')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                @elseif (auth()->user()->role == 'Supervisor')
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="role3" name="role"
                                                            oninput="valid_role3()" value={{ old('role') }} required>
                                                            <option selected hidden disabled>Sila Pilih Kategori</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Supervisor">Supervisor</option>
                                                        </select>
                                                        <p type="hidden" id="err_role3"
                                                            style="color: red; display:none"><i>Sila buat pilihan di
                                                                bahagian ini!</i></p>
                                                    </fieldset>
                                                    @error('category')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                @elseif (auth()->user()->role == 'Admin' || auth()->user()->role == '')
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="role" name="role"
                                                            oninput="valid_role()" value={{ old('role') }} required>
                                                            <option selected hidden disabled>Sila Pilih Kategori</option>
                                                            <option value="Admin">Admin</option>
                                                        </select>
                                                        <p type="hidden" id="err_role"
                                                            style="color: red; display:none"><i>Sila buat pilihan di
                                                                bahagian ini!</i></p>
                                                    </fieldset>
                                                    @error('category')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                @endif

                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Sub
                                                Kategori</label>
                                            <div class="col-md-6">

                                                <select multiple="multiple" size="10" class="duallistbox-no-filter"
                                                    name="sub_cat[]" id="subkat">
                                                    @if (auth()->user()->sub_cat)
                                                    @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                                    @if ($cat == 'PL91')
                                                    <option value="PL91">Kilang Buah</option>
                                                    @endif
                                                    @if ($cat == 'PL101')
                                                    <option value="PL101">Kilang Penapis</option>
                                                    @endif
                                                    @if ($cat == 'PL102')
                                                    <option value="PL102">Kilang Isirung</option>
                                                    @endif
                                                    @if ($cat == 'PL104')
                                                    <option value="PL104">Kilang Oleokimia</option>
                                                    @endif
                                                    @if ($cat == 'PL111')
                                                    <option value="PL111">Pusat Simpanan</option>
                                                    @endif
                                                    @if ($cat == 'PLBIO')
                                                    <option value="PLBIO">Kilang Biodiesel</option>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    {{-- <option value="PL91">Kilang Buah</option>
                                                    <option value="PL101">Kilang Penapis</option>
                                                    <option value="PL102">Kilang Isirung</option>
                                                    <option value="PL104">Kilang Oleokimia</option>
                                                    <option value="PL111">Pusat Simpanan</option>
                                                    <option value="PLBIO">Kilang Biodiesel</option> --}}
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Status</label>
                                            <div class="col-md-6">

                                                <select class="form-control" name="status" id="status"
                                                    oninput="valid_status()" required>
                                                    <option selected hidden disabled value="">Sila Pilih Status
                                                    </option>
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak Aktif</option>
                                                </select>
                                                <p type="hidden" id="err_status" style="color: red; display:none">
                                                    <i>Sila buat pilihan di
                                                        bahagian ini!</i></p>
                                            </div>
                                        </div>



                                        <div class="row center mt-3">
                                            <div class="col-md-12 center mb-3">
                                                <button type="button" class="btn btn-primary center"
                                                    style="margin-left:45%" data-toggle="modal"
                                                    data-target="#myModal">Daftar</button>
                                                {{-- <button type="submit">YA</button> --}}
                                            </div>
                                        </div>

                                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Anda pasti mahu mendaftarkan pentadbir ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"
                                                                style="color:#275047">Tidak</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    @endsection

    @section('scripts')
        <script>
            function valid_name() {

                if ($('#name').val() == '') {
                    $('#name').css('border-color', 'red');
                    document.getElementById('err_name').style.display = "block";


                } else {
                    $('#name').css('border-color', '');
                    document.getElementById('err_name').style.display = "none";

                }

            }
        </script>
        {{-- <script>
    function check() {

        var kat = document.getElementById('subkat');
        console.log(kat.value);

    }
    </script> --}}
        <script>
            function valid_username() {

                if ($('#username').val() == '') {
                    $('#username').css('border-color', 'red');
                    document.getElementById('err_user').style.display = "block";


                } else {
                    $('#username').css('border-color', '');
                    document.getElementById('err_user').style.display = "none";

                }

            }
        </script>
        <script>
            function valid_email() {

                if ($('#email').val() == '') {
                    $('#email').css('border-color', 'red');
                    document.getElementById('err_email').style.display = "block";


                } else {
                    $('#email').css('border-color', '');
                    document.getElementById('err_email').style.display = "none";

                }

            }
        </script>
        <script>
            function valid_role() {

                if ($('#role').val() == '') {
                    $('#role').css('border-color', 'red');
                    document.getElementById('err_role').style.display = "block";


                } else {
                    $('#role').css('border-color', '');
                    document.getElementById('err_role').style.display = "none";

                }

            }
        </script>
        <script>
            function valid_subkat() {

                if ($('#subkat').val() == '') {
                    $('#subkat').css('border-color', 'red');
                    document.getElementById('err_subkat').style.display = "block";


                } else {
                    $('#subkat').css('border-color', '');
                    document.getElementById('err_subkat').style.display = "none";

                }

            }
        </script>
        <script>
            function valid_status() {

                if ($('#status').val() == '') {
                    $('#status').css('border-color', 'red');
                    document.getElementById('err_status').style.display = "block";


                } else {
                    $('#status').css('border-color', '');
                    document.getElementById('err_status').style.display = "none";

                }

            }
        </script>
        <script>
            function ValidateEmail() {
                var inputText = document.getElementById('email');
                console.log(inputText.value);
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (inputText.value.match(mailformat)) {
                    // alert("Valid email address!");
                    // document.myform.e_email.focus();
                    document.getElementById('err_email2').style.display = "none";

                    return true;
                } else {
                    if (inputText.value != '') {
                        // alert("You have entered an invalid email address!");
                        $('#email').css('border-color', 'red');
                        document.getElementById('err_email2').style.display = "block";
                        return false;
                    }
                }
            }
        </script>
        <script>
            function check() {
                // (B1) INIT
                var error = "",
                    field = "";

                // kategori
                field = document.getElementById("name");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters e_kat\r\n";
                    $('#name').css('border-color', 'red');
                    document.getElementById('err_name').style.display = "block";



                }
                // status e-kilang
                field = document.getElementById("email");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters e_status\r\n";
                    $('#email').css('border-color', 'red');
                    document.getElementById('err_email').style.display = "block";



                }
                // status e-mingguan
                field = document.getElementById("username");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters e_stock\r\n";
                    $('#username').css('border-color', 'red');
                    document.getElementById('err_user').style.display = "block";


                }
                // directory
                // field = document.getElementById("role");
                // if (!field.checkValidity()) {
                //     error += "Name must be 2-4 characters directory\r\n";
                //     $('#role').css('border-color', 'red');
                //     document.getElementById('err_role').style.display = "block";


                // }
                // field = document.getElementById("role2");
                // if (!field.checkValidity()) {
                //     error += "Name must be 2-4 characters directory\r\n";
                //     $('#role2').css('border-color', 'red');
                //     document.getElementById('err_role2').style.display = "block";


                // }
                field = document.getElementById("role3");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters directory\r\n";
                    $('#role3').css('border-color', 'red');
                    document.getElementById('err_role3').style.display = "block";


                }
                // alamat premis 1
                // field = document.getElementById("subkat");
                // if (!field.checkValidity()) {
                //     error += "Name must be 2-4 characters e_ap1\r\n";
                //     // $('#subkat').css('border-color', 'red');
                //     document.getElementById('err_subkat').style.display = "block";


                // }
                // kod pegawai
                field = document.getElementById("status");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters kodpgw\r\n";
                    $('#status').css('border-color', 'red');
                    document.getElementById('err_status').style.display = "block";


                }

                // (B4) RESULT
                if (error == "") {
                    $('#myModal').modal('show');
                    return true;
                } else {
                    toastr.error(
                        'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                        'Ralat!', {
                            "progressBar": true

                        })
                    console.log(error);
                    return false;
                }


            }
        </script>
    @endsection
