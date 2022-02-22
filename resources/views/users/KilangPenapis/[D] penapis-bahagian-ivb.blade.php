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

            <div class="mt-5 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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
                        <form action="{{ route('penapis.add.bahagian.ivb') }}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">
                                    <div class="mb-4 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71);">Bahagian IV(b)</h3>
                                        <h5 style="color: rgb(39, 80, 71)">Produk Akhir Berasaskan Minyak Sawit dan Minyak Isirung Sawit
                                            - Bahan Bukan Makanan</h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>
                                    <div class="container center mt-4">
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nama Produk</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="produk"
                                                        style="margin-left:42%; width:40%" name="e101_c4">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach ($produk as $data)
                                                            <option value="{{ $data->prodid }}">
                                                                {{ $data->prodname }}
                                                            </option>
                                                        @endforeach

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
                                                Stok Awal</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='nombor_borang_kastam' style="margin-left:42%; width:40%"
                                                    id="nombor_borang_kastam" required title="Sila isikan butiran ini.">
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
                                               Belian/Penerimaan</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='nombor_borang_kastam' style="margin-left:42%; width:40%"
                                                    id="nombor_borang_kastam" required title="Sila isikan butiran ini.">
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
                                               Pengeluaran</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='destinasi_negara' style="margin-left:42%; width:40%"
                                                    id="destinasi_negara" required title="Sila isikan butiran ini.">
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
                                               Jualan / Edaran Dalam Negeri</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='destinasi_negara' style="margin-left:42%; width:40%"
                                                    id="destinasi_negara" required title="Sila isikan butiran ini.">
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
                                               Eksport</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='destinasi_negara' style="margin-left:42%; width:40%"
                                                    id="destinasi_negara" required title="Sila isikan butiran ini.">
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
                                               Stok Akhir</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='destinasi_negara' style="margin-left:42%; width:40%"
                                                    id="destinasi_negara" required title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row form-group" style="padding-top: 10px; ">



                                        <div class="text-right col-md-11 mb-4 ">
                                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                                style="float: right" data-target="#confirmation">
                                                Simpan</button>
                                        </div>

                                    </div>
                                    <br>
                                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Sawit</h5>
                                    <hr>
                                    <section class="section">
                                        <div class="card">

                                            <div class="card-body">
                                                <table class='table table-striped' id="table1">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th>Nama Produk</th>
                                                            <th>Stok Awal</th>
                                                            <th>Belian / Penerimaan</th>
                                                            <th>Pengeluaran</th>
                                                            <th>Jualan / Edaran Dalam Negeri</th>
                                                            <th>Eksport</th>
                                                            <th>Stok Akhir</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>BPL</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>

                                                        <br>

                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>

                                    </section>

                                </div>











                                <div class="row form-group" style="padding-top: 10px; ">


                                    <div class="text-left col-md-5">
                                        <a href="{{ route('penapis.bahagiani') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>
                                    </div>
                                    <div class="text-right col-md-7 mb-4 ">
                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            style="float: right" data-bs-target="#exampleModalCenter">Simpan &
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
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu menyimpan maklumat ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
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
