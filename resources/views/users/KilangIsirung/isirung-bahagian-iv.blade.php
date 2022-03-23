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

            <div class="mt-3 mb-2 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="align-self-center" style="margin-left: 2%; margin-bottom:-2%">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="align-self-center" style="margin-left: -1%">
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
                        <form action="{{ route('isirung.add.bahagian.iv') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">
                                        <div class="mb-4 text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71);">Bahagian IV</h3>
                                            <h5 style="color: rgb(39, 80, 71)">Edaran/Jualan Minyak Isirung Sawit Mentah -
                                                (CPKO) (04)
                                            </h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>
                                        <div class="container center mt-4">
                                            <div class="row mt-4">
                                                <div class="col-md-2">
                                                    <span class="required">Edaran/Jualan:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" id="e102_b4"
                                                            style=" width:50%" name="e102_b4">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            @foreach ($prodcat as $data)
                                                                <option value="{{ $data->catid }}">
                                                                    {{ $data->catname }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="required">Ke:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" id="e102_b5"
                                                        style=" margin-left:-30%; width:50%" name="e102_b5">
                                                        <option selected hidden disabled>Sila Pilih</option>

                                                            <option value="2">Kilang Penapis</option>
                                                            <option value="3">Kilang Isirung</option>
                                                            <option value="4">Kilang Oleokimia</option>
                                                            <option value="5">Peniaga</option>
                                                            <option value="7">Lain-lain</option>


                                                    </select>
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>

                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-2">
                                                    <span class="required">Kuantiti:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name='e102_b6'
                                                        style="width:50%" id="e102_b6" required
                                                        title="Sila isikan butiran ini.">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row form-group">



                                            <div class="row form-group">
                                                <div class="text-right col-md-12 mb-4 " style="margin-left: 45%;">
                                                    <button type="submit" class="btn btn-primary ">Tambah</button>
                                                </div>
                                            </div>

                                        </div>
                       </form>

                        <hr>
                        <br>
                        <br>
                        <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Edaran/Jualan Minyak Isirung Sawit Mentah -
                            (CPKO) (04)</h5>

                        <section class="section">
                            <div class="card">

                                {{-- <div class="card-body"> --}}
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <th>Edaran/Jualan</th>
                                                    <th>Ke</th>
                                                    <th>Kuantiti</th>
                                                    <th>Kemaskini</th>
                                                    <th>Hapus?</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($penyata as $data)
                                                    <tr>
                                                        <td>{{ $data->kodsl->catname ?? '' }}</td>
                                                        <td>{{ $data->prodcat2->catname ?? ''}}</td>
                                                        <td style="text-align: right">{{ number_format($data->e102_b6 ??  0,2) }}</td>
                                                        <td>
                                                            <div class="icon" style="text-align: center">
                                                                <a href="#" type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#modal{{ $data->e102_b1 }}">
                                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div class="icon" style="text-align: center">
                                                                <a href="{{ route('isirung.bahagianiv.delete',[$data->e102_b1]) }}" type="button">
                                                                    <i class="fa fa-trash-o"
                                                                        style="color: #dc3545;font-size:18px"></i>
                                                                </a>
                                                            </div>

                                                        </td>

                                                    </tr>
                                                    <div class="col-md-6 col-12">

                                                        <!--scrolling content Modal -->
                                                        <div class="modal fade" id="modal{{ $data->e102_b1 }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalScrollableTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable"
                                                                role="document">
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
                                                                            action="{{ route('isirung.edit.bahagian.iv', [$data->e102_b1]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <label>Belian/Penerimaan </label>
                                                                                <div class="form-group">
                                                                                    <fieldset class="form-group">
                                                                                        <select class="form-select"
                                                                                            id="e102_b4" name="e102_b4">
                                                                                            <option hidden
                                                                                                value="{{ $data->kodsl->catid ?? '' }}">
                                                                                                {{ $data->kodsl->catname ?? '' }}
                                                                                            </option>
                                                                                            <option value="1"> SENDIRI
                                                                                            </option>
                                                                                            <option value="2"> LUAR
                                                                                            </option>

                                                                                        </select>
                                                                                    </fieldset>
                                                                                </div>
                                                                                <label>Dari </label>
                                                                                <div class="form-group">
                                                                                    <fieldset class="form-group">
                                                                                        <select class="form-select"
                                                                                            id="e102_b5" name="e102_b5">
                                                                                            <option hidden
                                                                                                value="{{ $data->prodcat2->catid ?? '' }}">
                                                                                                {{ $data->prodcat2->catname ?? '' }}
                                                                                            </option>
                                                                                            <option value="2">KILANG PENAPIS
                                                                                            </option>
                                                                                            <option value="3">KILANG ISIRUNG
                                                                                            </option>
                                                                                            <option value="4">KILANG
                                                                                                OLEOKIMIA</option>
                                                                                            <option value="5">PENIAGA
                                                                                            </option>
                                                                                            <option value="7">LAIN-LAIN
                                                                                            </option>
                                                                                        </select>
                                                                                    </fieldset>
                                                                                </div>

                                                                                <label>Kuantiti </label>

                                                                                <div class="form-group">
                                                                                    <input type="text" name='e102_b6'
                                                                                        class="form-control"
                                                                                        value="{{ $data->e102_b6 }}">
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
                                                                        <button type="button"
                                                                            class="btn btn-light-secondary"
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
                                                <form action="{{ route('isirung.bahagianiii.process') }}" method="post">
                                                    @csrf
                                                <tr>

                                                    <td colspan="2"><b>JUMLAH</b></td>
                                                    {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                                    <td style="text-align: right"><b>{{ number_format($total ??  0,2) }}</b></td>
                                                    <td colspan="2"></td>
                                                    {{-- <td></td> --}}

                                                </tr>
                                                <tr style="background-color: #1526224a">
                                                    <td class="text-bold-500" colspan="2" style="text-align:center;">
                                                        <b>Jumlah Bahagian I (CPKO)</b>
                                                    </td>
                                                    <td style="text-align:right;">
                                                        <span><b>{{ number_format($penyatai->e102_ag2 ?? 0, 2) }}</b></span>

                                                        <input type="hidden" id="jumlah" name="jumlah"
                                                            value="{{ number_format($penyatai->e102_ag2 ?? 0, 2) }}">
                                                    </td>
                                                    <td colspan="2"></td>

                                                </tr>

                                                <br>

                                            </tbody>

                                        </table>
                                    </div>

                                {{-- </div> --}}
                            </div>

                        </section>

                    </div>




                    <div class="row form-group" style="padding-top: 10px; ">


                        <div class="text-left col-md-5">
                            <a href="{{ route('isirung.bahagianii') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>
                        </div>
                        <div class="text-right col-md-7 mb-4 ">
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" style="float: right"
                                data-bs-target="#next">Simpan &
                                Seterusnya</button>
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
                                        Anda pasti mahu menyimpan maklumat ini?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                    </button>
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <button type="submit" class="btn btn-primary ml-1">Ya</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
                <br>
                </form>

            </div>

            <br>

        </div>
        </div>
        </div>




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
    <script>
            function validation_jumlah() {
                var e102_b6 = $("#e102_b6").val();
                var total = $("#total").val();
                var jumlah = $("#jumlah").val();
                var jumlah_input = 0;

                jumlah_input = parseFloat(Number(total));

                document.getElementById('total').innerHTML = jumlah_input.toFixed(2);
            }
    </script>




    </body>

    </html>
@endsection
