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
                    <h4 class="page-title">Konfigurasi</h4><br>
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
        <form action="{{ route('admin.tambahpengumuman.proses') }}" method="post" onsubmit="add_message()">
            @csrf
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="row" style="padding: 20px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                                <div class="col-11 text-right">
                                    <a href="{{ route('admin.tambahfail') }}" class="btn btn-primary ">
                                        Tambah Fail Berkaitan
                                    </a>

                                </div><br>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%">Tambah Pengumuman</h3>
                            </div>
                            <hr>

                            <div class="card-body">
                                <div class="container center ">

                                    <div class="container center mt-2">

                                        <div class="row" style="margin-top: -2%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Tarikh Mula</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='Start_date' id="Start_date"
                                                    required title="Sila isikan butiran ini." oninput="valid_start()"
                                                    value="{{ old('Start_date') }}">
                                                    <p type="hidden" id="err_start" style="color: red; display:none"><i>Sila buat pilihan
                                                        di
                                                        bahagian ini!</i></p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Tarikh Akhir</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='End_date' id="End_date"
                                                    required title="Sila isikan butiran ini." oninput="valid_end()"
                                                    value="{{ old('End_date') }}">
                                                    <p type="hidden" id="err_end" style="color: red; display:none"><i>Sila buat pilihan
                                                        di
                                                        bahagian ini!</i></p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Icon New</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" name='Icon_new'  id="basicSelect"
                                                        required oninput="valid_icon()" >
                                                        <option selected hidden disabled value="">Sila Pilih</option>
                                                        <option value="Y">Ya</option>
                                                        <option value="N">Tidak</option>
                                                    </select>
                                                    <p type="hidden" id="err_icon" style="color: red; display:none"><i>Sila buat pilihan
                                                        di
                                                        bahagian ini!</i></p>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom: 5%; margin-top: 1%" >
                                                <label for=" fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            Mesej</label>

                                            <div class="col-md-6">

                                                <div id="editor" oninput="add_message()">
                                                    {{ old('Message') }}
                                                </div>

                                            </div>

                                            <input type="hidden" id="quill_html" name="Message"
                                                value="{{ old('Message') }}">


                                        </div>
                                    </div>


                                    <br>
                                    <div class="row center mt-3">
                                        <div class="col-md-12 center mb-3" style="margin-left: 44%">
                                            <button type="button" class="btn btn-primary"  id="checkBtn"
                                            onclick="check();">Tambah Pengumuman</button>
                                            {{-- <button type="submit">YA</button> --}}
                                        </div>
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
                                                        Anda pasti mahu menambah penngumuman ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Kembali</span>
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
                    </div>
                </div>

            </div>
        </form>




    </div>
@endsection

    @section('scripts')
        <script src="{{ asset('nice-admin/assets/libs/quill/dist/quill.min.js') }}"></script>

        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            function add_message() {
                // var content = document.querySelector("#snow").innerHTML;
                // alert(quill.getContents());
                quill.on('text-change', function(delta, oldDelta, source) {
                    document.getElementById("quill_html").value = quill.root.innerHTML;
                });
            }
        </script>

    <script>
        function valid_start() {

            if ($('#Start_date').val() == '') {
                $('#Start_date').css('border', '1px solid red');
                document.getElementById('err_start').style.display = "block";


            } else {
                $('#Start_date').css('border', '');
                document.getElementById('err_start').style.display = "none";

            }

        }
    </script>

    <script>
        function valid_end() {

            if ($('#End_date').val() == '') {
                $('#End_date').css('border', '1px solid red');
                document.getElementById('err_end').style.display = "block";


            } else {
                $('#End_date').css('border', '');
                document.getElementById('err_end').style.display = "none";

            }

        }
    </script>

    <script>
        function valid_icon() {

            if ($('#basicSelect').val() == '') {
                $('#basicSelect').css('border', '1px solid red');
                document.getElementById('err_icon').style.display = "block";


            } else {
                $('#basicSelect').css('border', '');
                document.getElementById('err_icon').style.display = "none";

            }

        }
    </script>


    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // kod produk
            field = document.getElementById("Start_date");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#Start_date').css('border', '1px solid red');
                document.getElementById('err_start').style.display = "block";
                console.log('masuk');
            }

            field = document.getElementById("End_date");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#End_date').css('border', '1px solid red');
                document.getElementById('err_end').style.display = "block";
                console.log('masuk');
            }

            field = document.getElementById("basicSelect");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#basicSelect').css('border', '1px solid red');
                document.getElementById('err_icon').style.display = "block";
                console.log('masuk');
            }

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
{{--


    <script src="{{ asset('nice-admin/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/jquery.repeater/dff.js') }}"></script> --}}

@endsection
