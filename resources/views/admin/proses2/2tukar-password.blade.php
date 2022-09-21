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
                    <h4 class="page-title">Profil Pelesen</h4>
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
                        <div class="row" style="padding: 20px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%">Tukar Kata Laluan</h3>
                        </div>
                        <hr>
                        @if ($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif
                        <form action="{{ route('admin.2tukarpassword.process') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="container center ">

                                    <div class="row" style="margin-top:-2%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            No. Lesen</label>
                                        <div class="col-md-6">
                                            <input type="text" id="username" class="form-control" onblur="getVal()"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity(''); valid_user()" required placeholder=" No. Lesen"
                                                name="username">
                                                <p type="hidden" id="err_username" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i>
                                                </p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            Alamat Emel Kilang</label>
                                            <div class="col-md-6">
                                            <select class="form-control" name="email" id="email" disabled>
                                                <option></option>
                                            </select>

                                            {{-- <input type="text" id="e_email" class="form-control" required
                                                placeholder="Alamat Emel Kilang" name="e_email" readonly> --}}
                                        </div>
                                    </div>
                                    <div class="text-right col-md-6 mb-4 mt-4">
                                        <button type="button" class="btn btn-primary" style="margin-left:90%" onclick="check()"
                                            >Tukar Kata Laluan</button>
                                    </div>
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Anda pasti mahu menukar kata laluan pelesen ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1"
                                                        ata-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ya</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>




    </div>
@endsection

@section('scripts')
    <script>
        // e_nl = select.value;
        function getVal() {
            const val = document.getElementById("username").value;
            console.log(val);

            //clear jenis_data selection
            $("#email").empty();
            //initialize selection
            $("#email").append('<input value="" selected disabled hidden>Sila Pilih Nama Pelesen</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-email/" + val, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        console.log(respond[x]);
                        $("#email").append('<option value="' + respond[x].username + '">' +
                            respond[x]
                            .email + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>

    <script>
        function valid_user() {

            if ($('#username').val() == '') {
                $('#username').css('border-color', 'red');
                document.getElementById('err_username').style.display = "block";


            } else {
                $('#username').css('border-color', '');
                document.getElementById('err_username').style.display = "none";

            }

        }
    </script>


<script>
    function check() {
        // (B1) INIT
        var error = "",
            field = "";

        // kap proses
        field = document.getElementById("username");
        if (!field.checkValidity()) {
            error += "Name must be 2-4 characters\r\n";
            $('#username').css('border-color', 'red');
            document.getElementById('err_username').style.display = "block";
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
                return false;
            }


        }

</script>
@endsection
