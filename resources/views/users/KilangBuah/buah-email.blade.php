@extends($layout)

@section('content')


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-3 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="align-self-center" style="margin-left: 2%; margin-bottom:-2%">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="align-self-center" style="margin-left: -1%;">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='white'">
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
                                    action="{{ route('buah.send.email.proses') }}"
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
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Jenis Emel</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="TypeOfEmail">
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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
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
                                        <div class="row" style="margin-bottom: 5%; margin-top:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label align-items-center">
                                                </label>
                                            <div class="col-md-6">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" id="file">
                                                    <label class="form-file-label" for="file">

                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>




                            <div class="row form-group" style="padding-top: 10px; ">


                                {{-- <div class="text-left col-md-5">
                                    <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                        style="float: left">Sebelumnya</a>
                                </div> --}}
                                <div class="text-right col-md-12 ">
                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                        style="float: right" data-bs-target="#emel">Hantar</button>
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
                                                    data-bs-dismiss="modal">
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


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


@endsection
