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
                <div class="col-12 align-self-center">
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
                <div class="col-7 align-self-center" id="breadcrumb">
                    <div class="d-flex align-items-center justify-content-end">

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
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%">Tambah Fail</h3>
                        </div>
                        <hr>
                        <div class="card-body">
                            {{-- <form action="{{ route('admin.6papar.buah.form') }}" method="post">
                                @csrf --}}
                            <div class="card" style="border:dashed">
                                <div class="card-body">

                                <form action="{{ route('admin.tambahfail2.process') }}" method="post"  enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row" style=" margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-1 control-label col-form-label align-items-center">
                                        </label>
                                        <div class="col-md-12">
                                            <div class="form-file text-center">
                                                <input style="text-center" type="file" class="form-file-input" id="file" name="file_upload" required title="Pilih Fail"><br><br>
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
                                    <div class="row center mt-3">
                                        <div class="col-md-12 text-center mb-3" style="">
                                            <button type="submit" class="btn btn-primary"  id="checkBtn"
                                        >Tambah Fail</button>
                                            {{-- <button type="submit">YA</button> --}}
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>

                            <br><hr>
                            <h4 class="text-center">Senarai Fail</h4><br>
                            <div class="table-responsive" style="width:70%; margin-left:18%">
                                <table id="examplePengumuman" class="table table-striped table-bordered"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">Bil</th>
                                            <th style="text-align:center">Fail<br></th>
                                            <th style="text-align:center">Pautan<br></th>


                                        </tr>
                                    </thead>
                                    <tbody style="word-break: break-word; font-size:12px">
                                        @foreach($files as $data)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="width: 60%">
                                                {{-- {{ $data->file_upload }} --}}
                                                <a href="{{ asset('storage/'.$data->file_upload) }}">
                                                    {{ asset('storage/'.$data->file_upload) }}

                                                </a>
                                            </td>
                                            <td  style="text-align:center">
                                                <button style="border: none; background:none"   class="copy_text"  data-toggle="tooltip" title="Copy to Clipboard" href="{{ asset('storage/'.$data->file_upload) }}" >
                                                    <i class="fa fa-copy"
                                                        style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                    </i>
                                            </button>
                                            </td>
                                            {{-- <td  style="text-align:center">
                                                <div class="btn">
                                                    <a
                                                        target='_blank' href="{{ asset('storage/'.$data->file_upload) }}" >
                                                        <i class="fa fa-paperclip"
                                                            style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                        </i>
                                                    </a>
                                                </div>
                                            </td> --}}

                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>




    </div>
@endsection

    @section('scripts')
        <script src="{{ asset('nice-admin/assets/libs/quill/dist/quill.min.js') }}"></script>



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
        <script>

            $('.copy_text').click(function (e) {
            e.preventDefault();
            // var copyText = $(this).attr('href');
            var copyText = $(this).attr('href');
            copyText = copyText.replace(/ /g, '%20');

            document.addEventListener('copy', function(e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);

            document.execCommand('copy');
            console.log('copied text : ', copyText);
            alert('copied text: ' + copyText);
            });
        </script>

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





    <script src="{{ asset('nice-admin/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/jquery.repeater/dff.js') }}"></script>

@endsection
