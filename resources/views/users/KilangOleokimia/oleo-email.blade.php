@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Penghantaran Emel</h4>
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
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}

            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-4 col-12"> --}}
                <div class="pl-3">
                    <form action="{{ route('oleo.send.email.proses') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Emel Pertanyaan / Pindaan /
                                Cadangan </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71)">Eksport Produk Sawit
                                        </h5> --}}
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>


                        <hr><i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '<b style="color: red"> * </b>'</i>
                        <br><br><br>



                        <div class="container center mt-2">
                            <div class="row">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Jenis Emel</label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="TypeOfEmail" required
                                            oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')"
                                            oninput="this.setCustomValidity(''); valid_type()">
                                            <option selected hidden disabled value="">Sila Pilih Jenis Emel</option>
                                            <option value="pertanyaan">Pertanyaan
                                            </option>
                                            <option value="pindaan">Pindaan
                                            </option>
                                            <option value="cadangan">Cadangan
                                            </option>

                                        </select>
                                        <p type="hidden" id="err_type" style="color: red; display:none"><i>Sila buat pilihan
                                            di
                                            bahagian ini!</i></p>
                                    </fieldset>
                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                </div>
                            </div>


                            <div class="row" style="margin-bottom:1%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Tajuk</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name='Subject'
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); valid_subject()" id="subject" required
                                        title="Sila isikan butiran ini.">

                                        <p type="hidden" id="err_subject" style="color: red; display:none"><i>Sila isi butiran disini!</i></p>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 3%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Kandungan</label>
                                <div class="col-md-6">

                                    <div id="editor" oninput="add_message()" required>
                                        {{ old('Message') }}
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label align-items-center">
                                </label>
                                <div class="col-md-6">

                                    <input type="hidden" id="quill_html" name="Message" required
                                        value="{{ old('Message') }}">
                                    @error('Message')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi bahagian kandungan</strong>
                                        </div>
                                    @enderror
                                    {{-- <div id="cname" class="emsg"></div> --}}
                                    {{-- <div class="col-md-6" >
                                                                    <div id="snow" oninput="add_message()">

                                                                    </div>
                                                                </div>
                                                                <input type="hidden" id="quill_html" name="Message"> --}}
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin-bottom: 1%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label align-items-center">
                                </label>
                                <div class="col-md-6">
                                    <div class="form-file">
                                        <input type="file" class="form-file-input" id="file" name="file_upload"
                                            accept=".doc,.docx,.pdf,.jpeg">
                                        <label class="form-file-label" for="file">
                                            <label class="form-file-label" for="file">
                                                <i>Nota: Sila pastikan saiz fail yang dimuatnaik tidak melebihi 3MB dan
                                                    dalam bentuk .pdf, .doc, .docx, .xls, .xlsx, .jpg dan .png
                                                    sahaja</i>
                                            </label>

                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                {{-- </div> --}}

                    <div class="row form-group" style="margin-top: 3%; ">

                        <div class="row justify-content-center" style="margin-left: 44%">
                            <button type="button" class="btn btn-primary"  id="checkBtn"
                                onclick="check();">Hantar</button>
                        </div>

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
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Anda pasti mahu menghantar emel ini?
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
                </form>
                </div>

            </section><!-- End Hero -->
        @endsection
        @section('scripts')
            <script src="{{ asset('nice-admin/assets/libs/quill/dist/quill.min.js') }}"></script>

            <script>
                var quill = new Quill('#editor', {

                    placeholder: 'Enter text here...',
                    theme: 'snow',
                });
                var maxLength = 100;

                quill.on('text-change', function(delta, oldDelta, source) {
                    var text = quill.getText();
                    if (text.length > maxLength) {
                        quill.deleteText(maxLength, text.length);
                    }
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
                var uploadField = document.getElementById('file');
                uploadField.onchange = function() {


                    var filePath = uploadField.value;
                    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.doc|\.docx|\.xls|\.xlsx|\.pdf)$/i;
                    if (!allowedExtensions.exec(filePath)) {
                        toastr.error(
                            'Sila masukkan fail dalam bentuk .pdf, .doc, .docx, .xls, .xlsx, .jpg, .jpeg dan .png sahaja',
                            'Ralat!', {
                                "progressBar": true
                            });
                            this.value = '';
                        return false;
                    }

                    if (this.files[0].size > 3145728) {
                        toastr.error('Saiz fail melebihi 3MB!', 'Ralat!', {
                            "progressBar": true
                        });

                        this.value = "";
                    };


                };

            </script>
            {{-- <script>
                var uploadField = document.getElementById('file');
                uploadField.onchange = function() {


                    var filePath = uploadField.value;
                    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.doc|\.docx|\.xls|\.xlsx|\.pdf)$/i;
                    if (!allowedExtensions.exec(filePath)) {
                        toastr.error(
                            'Sila masukkan fail dalam bentuk .pdf, .doc, .docx, .xls, .xlsx, .jpg, .jpeg dan .png sahaja',
                            'Ralat!', {
                                "progressBar": true
                            });
                        this.value = '';
                        return false;
                    }

                    if (this.files[0].size > 3145728) {
                        toastr.error('Saiz fail melebihi 3MB!', 'Ralat!', {
                            "progressBar": true
                        });

                        this.value = "";
                    };
                 }


            </script> --}}
            <script>
                document.addEventListener('keypress', function (e) {
                    if (e.keyCode === 13 || e.which === 13) {
                        e.preventDefault();
                        return false;
                    }

                });
            </script>

        <script>
            function valid_type() {

                if ($('#basicSelect').val() == '') {
                    $('#basicSelect').css('border', '1px solid red');
                    document.getElementById('err_type').style.display = "block";


                } else {
                    $('#basicSelect').css('border', '');
                    document.getElementById('err_type').style.display = "none";

                }

            }
        </script>

        <script>
            function valid_subject() {

                if ($('#subject').val() == '') {
                    $('#subject').css('border', '1px solid red');
                    document.getElementById('err_subject').style.display = "block";


                } else {
                    $('#subject').css('border', '');
                    document.getElementById('err_subject').style.display = "none";

                }

            }
        </script>


        <script>
            function check() {
                // (B1) INIT
                var error = "",
                    field = "";

                // kod produk
                field = document.getElementById("basicSelect");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                    $('#basicSelect').css('border', '1px solid red');
                    document.getElementById('err_type').style.display = "block";
                    console.log('masuk');
                }

                field = document.getElementById("subject");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                    $('#subject').css('border', '1px solid red');
                    document.getElementById('err_subject').style.display = "block";
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

        @endsection
