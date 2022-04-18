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
                    <h4 class="page-title">Emel Pertanyaan/Pindaan/Cadangan</h4>
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
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">
                                    <form
                                    action="{{ route('penapis.send.email.proses') }}"
                                    method="post">
                                    @csrf
                                    <div class="text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:3%">Emel Pertanyaan / Pindaan /
                                            Cadangan </h3>
                                        {{-- <h5 style="color: rgb(39, 80, 71)">Eksport Produk Sawit
                                        </h5> --}}
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>



                                    <div class="container center mt-2">
                                        <div class="row" style="margin-bottom:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Jenis Emel</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="TypeOfEmail">
                                                        <option selected hidden disabled>Sila Pilih Jenis Emel</option>
                                                        <option value="pertanyaan">Pertanyaan
                                                        </option>
                                                        <option value="pindaan">Pindaan
                                                        </option>
                                                        <option value="cadangan"  >Cadangan
                                                        </option>

                                                    </select>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>


                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center mb-2">
                                                Daripada (Alamat Emel)</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='FromEmail' id="FromEmail" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center mb-2">
                                                Tajuk</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='Subject'
                                                    id="Subject" required title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 5%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Kandungan</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='Message'
                                                        id="Subject" required title="Sila isikan butiran ini.">

                                                </div>
                                                {{-- <div class="col-md-6" >
                                                    <div id="snow" oninput="add_message()">

                                                    </div>
                                                </div>
                                                <input type="hidden" id="quill_html" name="Message"> --}}
                                        </div>
                                        <br>
                                        <div class="row" style=" margin-top:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label align-items-center">
                                                </label>
                                            <div class="col-md-6">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" id="file">
                                                    <label class="form-file-label" for="file">
                                                        <label class="form-file-label" for="file">
                                                            <i>Nota: Sila pastikan saiz fail yang dimuatnaik tidak melebihi 3MB dan dalam bentuk PDF, WORD, EXCEL, JPG dan PNG sahaja</i>
                                                        </label>

                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <div class="row form-group" style="margin-top: 3%; ">



                                <div class="text-right col-md-6 mb-4 ">
                                    <button type="submit" class="btn btn-primary" style="margin-left:90%"  data-toggle="modal"data-target="#emel">Hantar</button>
                                </div>

                            </div>

                                <!-- Vertically Centered modal Modal -->
                                <div class="modal fade" id="emel" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    PENGESAHAN</h5>
                                                <button type="button" class="close"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu menghantar emel ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block"
                                                        style="color:#275047">Kembali</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1"
                                                    >
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Hantar</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>



                    </div><br><br><br><br><br>
                </div>

            </div>










    </section><!-- End Hero -->
    <script>
        var quill = new Quill('#snow', {
            // theme: 'snow'
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
    var uploadField = document.getElementById("file");

    uploadField.onchange = function() {
        if (this.files[0].size > 3145728) {
            alert("Saiz fail melebihi 3MB!");
            this.value = "";
        };
    };
</script>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


@endsection
