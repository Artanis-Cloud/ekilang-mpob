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

            <div class="mt-3 mb-4 row">
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
                        <form action="{{ route('penapis.add.bahagian.v') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">
                                        <div class="mb-4 text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71);">Bahagian V</h3>
                                            <h5 style="color: rgb(39, 80, 71)">Belian/Penerimaan Bekalan Produk Sawit</h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>
                                        <div class="container center mt-4">
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Sendiri / Luar</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="e101_d3"
                                                            style="margin-left:42%; width:40%" name="e101_d3">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option value="1"> Sendiri </option>
                                                            <option value="2"> Luar </option>

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
                                                    Belian/Penerimaan dari</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="e101_d4"
                                                            style="margin-left:42%; width:40%" name="e101_d4">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option value="1">KILANG BUAH</option>
                                                            <option value="2">KILANG PENAPIS</option>
                                                            <option value="3">KILANG ISIRUNG</option>
                                                            <option value="4">KILANG OLEOKIMIA</option>
                                                            <option value="5">PUSAT SIMPANAN</option>
                                                            <option value="6">PENIAGA</option>
                                                            <option value="9">LAIN-LAIN</option>
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
                                                    CPO</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='e101_d5'
                                                        style="margin-left:42%; width:40%" id="e101_d5" required
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
                                                    PPO</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='e101_d6'
                                                        style="margin-left:42%; width:40%" id="e101_d6" required
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
                                                    CPKO</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='e101_d7'
                                                        style="margin-left:42%; width:40%" id="e101_d7" required
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
                                                    PPKO</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='e101_d8'
                                                        style="margin-left:42%; width:40%" id="e101_d8" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row form-group" style="padding-top: 10px; ">



                                            <div class="row form-group" style="padding-top: 10px; ">
                                                <div class="text-right col-md-12 mb-4 ">
                                                    <button type="submit" class="btn btn-primary ">Tambah</button>
                                                </div>
                                            </div>

                                        </div>
                        </form>
                        <hr>
                        <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Belian/Penerimaan Bekalan Produk Sawit
                        </h5>
                        <hr>
                        <section class="section">
                            <div class="card">

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th>Sendiri / Luar</th>
                                                <th>Belian/Penerimaan dari</th>
                                                <th>CPO</th>
                                                <th>PPO</th>
                                                <th>CPKO</th>
                                                <th>PPKO</th>
                                                <th>Kemaskini</th>
                                                <th>Buang?</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penyata as $data)
                                                <tr style="text-align: center">

                                                    <td>{{ $data->kodsl[0]->catname }}</td>
                                                    <td>{{ $data->prodcat[0]->catname }}</td>
                                                    <td>{{ $data->e101_d5 }}</td>
                                                    <td>{{ $data->e101_d6 }}</td>
                                                    <td>{{ $data->e101_d7 }}</td>
                                                    <td>{{ $data->e101_d8 }}</td>
                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modal{{ $data->e101_d1 }}">
                                                                <i class="fas fa-edit fa-lg" style="color: #228c1c">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button">
                                                                <i class="fa fa-trash-o"
                                                                    style="color: #228c1c;font-size:18px"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <div class="col-md-6 col-12">

                                                    <!--scrolling content Modal -->
                                                    <div class="modal fade" id="modal{{ $data->e101_d1 }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Produk</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('penapis.edit.bahagian.v', [$data->e101_d1]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <label>Sendiri / Luar </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select" id="e101_d3" name="e101_d3">
                                                                                        <option selected hidden disabled>{{ $data->kodsl[0]->catname }}</option>
                                                                                        <option value="1"> SENDIRI</option>
                                                                                        <option value="2"> LUAR </option>

                                                                                    </select>
                                                                                </fieldset>
                                                                                {{-- <input type="text" name='e101_d3'
                                                                                    class="form-control"
                                                                                    value="{{ $data->kodsl[0]->catname }}"
                                                                                    readonly> --}}

                                                                            </div>
                                                                            <label>Belian/Penerimaan dari </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select" id="e101_d4" name="e101_d4">
                                                                                        <option selected hidden disabled>{{ $data->prodcat[0]->catname }}</option>
                                                                                        <option value="1">KILANG BUAH</option>
                                                                                        <option value="2">KILANG PENAPIS</option>
                                                                                        <option value="3">KILANG ISIRUNG</option>
                                                                                        <option value="4">KILANG OLEOKIMIA</option>
                                                                                        <option value="5">PUSAT SIMPANAN</option>
                                                                                        <option value="6">PENIAGA</option>
                                                                                        <option value="9">LAIN-LAIN</option>
                                                                                    </select>
                                                                                </fieldset>

                                                                            </div>
                                                                            <label>CPO </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_d5'
                                                                                    class="form-control"
                                                                                    value="{{ $data->e101_d5 }}">
                                                                            </div>
                                                                            <label>PPO </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_d6'
                                                                                    class="form-control"
                                                                                    value="{{ $data->e101_d6 }}">
                                                                            </div>
                                                                            {{-- <label>Import </label>
                                                                        <div class="form-group">
                                                                            <input type="password" placeholder="Password"
                                                                                class="form-control">
                                                                        </div> --}}
                                                                            <label>CPKO </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_d7'
                                                                                    class="form-control"
                                                                                    value="{{ $data->e101_d7 }}">
                                                                            </div>
                                                                            <label>PPKO </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_d8'
                                                                                    class="form-control"
                                                                                    value="{{ $data->e101_d8 }}">
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary ml-1"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                                        </button>
                                                                    </div> --}}


                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                            <br>

                                        </tbody>

                                    </table>

                                </div>
                            </div>

                        </section>

                    </div>











                    <div class="row form-group" style="padding-top: 10px; ">


                        <div class="text-left col-md-5">
                            <a href="{{ route('penapis.bahagianivb') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>
                        </div>
                        <div class="text-right col-md-7 mb-4 ">
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" style="float: right"
                                data-bs-target="#exampleModalCenter">Simpan &
                                Seterusnya</button>
                        </div>

                    </div>

                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                        Anda pasti mahu menyimpan maklumat ini?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                    </button>
                                    <a href="{{ route('penapis.bahagianvi') }}" type="button"
                                        class="btn btn-primary ml-1">

                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Ya</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                </form>

            </div>
            <br>

        </div>
        </div>
        </div>













        <br>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calc').change(function() {
                var total = 0;
                $('.calc').each(function() {
                    if ($(this).val() != '') {
                        total += parseInt($(this).val());
                    }
                });
                $('#total').html(total);
            });
        });
    </script>




    </body>

    </html>
@endsection
