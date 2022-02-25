@extends($layout)

@section('content')

  <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Pengumuman</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        {{-- <!-- Favicons -->
        <link href="{{ asset('theme/images/favicon.png') }}" rel="image/x-icon">
        <link href="{{ asset('theme/kilangstyles/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

        {{-- <link rel="stylesheet" href="{{ asset('theme/vendors/quill/quill.snow.css') }}"> --}}
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



 </head>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative"  data-aos-delay="100">

        {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
        {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

        <div class=" mt-2 mb-4  row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}"
                                                        style="color: rgb(64, 69, 68) !important;"
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

                                <div class="text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:3%">Tambah Pengumuman</h3>
                                    {{-- <h5 style="color: rgb(39, 80, 71)">Eksport Produk Sawit
                                    </h5> --}}
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                <form action="{{ route('admin.tambahpengumuman.proses') }}" method="post" onsubmit="add_message()">
                                    @csrf
                                    <div class="container center mt-2">

                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Tarikh Mula :</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='Start_date' id="Start_date" required
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
                                                Tarikh Akhir :</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='End_date'
                                                    id="End_date" required title="Sila isikan butiran ini.">
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
                                            Icon New :</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="Icon_new">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        <option>Y
                                                        </option>
                                                        <option>N
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

                                        <div class="row" style="margin-bottom: 5%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center" style="width: 20%;">
                                                Mesej :</label>

                                            <div class="col-md-6" style="width: 70%; margin-left: 2%">
                                                <div id="snow" oninput="add_message()">

                                                </div>
                                            </div>
                                            <input type="hidden" id="quill_html" name="Message">
                                        </div>
                                        {{-- <div class="row">
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
                                        </div> --}}

                                        {{-- <div class="col-md-3">
                                                <p>Gambar Dimuatnaik:</p>
                                                <img src="" alt="Sila Muatnaik Gambar Sijil SSM"
                                                    id="category-img-ssm"
                                                    style="width:100%;height:30vh;display: none;">
                                            </div> --}}
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>

                                    </div>




                                            <div class="row form-group" style="padding-top: 50px; ">


                                                {{-- <div class="text-left col-md-5">
                                                    <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                                        style="float: left">Sebelumnya</a>
                                                </div> --}}
                                                <div class="text-right col-md-12 ">
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        style="float: right" data-bs-target="#exampleModalCenter">Tambah</button>
                                                </div>

                                            </div>

                                            <!-- Vertically Centered modal Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1"
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
                                                                Anda pasti mahu menambah pengumuman ini?
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
                                                            data-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Tambah</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>


    </section><!-- End Hero -->
@endsection

@section('javascript')
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
@endsection
