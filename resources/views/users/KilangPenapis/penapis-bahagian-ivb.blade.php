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
                            <div class="col-5 align-self-center" style="margin-left: 2%; margin-bottom:-2%">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class=" align-self-center" style="margin-left: -1%;">
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
                        <form action="{{ route('penapis.add.bahagian.ivb') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">
                                        <div class="mb-4 text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71);">Bahagian IV (b)</h3>
                                            <h5 style="color: rgb(39, 80, 71)">Produk Akhir Berasaskan Minyak Sawit dan
                                                Minyak Isirung Sawit
                                                - Bahan Bukan Makanan</h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>
                                        <div class="container center mt-4">

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span class="required">Nama Produk:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" id="produk"
                                                        name="e101_c4" style="width: 50%">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach ($produk as $data)
                                                            <option value="{{ $data->prodid }}">
                                                                {{ $data->prodname }} -   {{ $data->prodid }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-md-2">
                                                    <span class="required">Stok Awal Diproses:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name='e101_c5'style="width: 50%"
                                                        id="e101_c5" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="required">Jualan / Edaran Dalam Negeri:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name='e101_c8'style="width: 50%"
                                                        id="e101_c8" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>



                                            <div class="row mt-4">
                                                <div class="col-md-2">
                                                    <span class="required">Belian/Penerimaan:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name='e101_c6' style="width: 50%"
                                                        id="e101_c6" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="required">Eksport:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name='e101_c9' style="width: 50%"
                                                        id="e101_c9" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>

                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-md-2">
                                                    <span class="required">Pengeluaran:</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name='e101_c7' style="width: 50%"
                                                        id="e101_c7" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="required">Stok Akhir</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name='e101_c10' style="width: 50%"
                                                        id="e101_c10" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>

                                            </div>



                                        </div>


                                        <div class="row form-group">



                                            <div class="row form-group" style="margin-left: 45%;">
                                                <div class="text-right col-md-12 mb-4 ">
                                                    <button type="submit" class="btn btn-primary ">Tambah</button>
                                                </div>
                                            </div>

                                        </div>

                        </form>

                        <hr>
                        <br>
                        <br>
                        <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Akhir Berasaskan Minyak Sawit dan Minyak Isirung Sawit - Bahan Bukan Makanan</h5>

                        <section class="section">
                            <div class="card">

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0"  style="font-size: 13px">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th>Nama Produk</th>
                                                <th>Kod Produk</th>
                                                <th>Stok Awal</th>
                                                <th>Belian / Penerimaan</th>
                                                <th>Pengeluaran</th>
                                                <th>Jualan / Edaran Dalam Negeri</th>
                                                <th>Eksport</th>
                                                <th>Stok Akhir</th>
                                                <th>Kemaskini</th>
                                                <th>Hapus?</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penyata as $data)
                                            <tr style="text-align: right">
                                                <td  style="text-align: left">{{ $data->produk[0]->prodname  }}</td>
                                                <td>{{ $data->produk[0]->prodid  }}</td>
                                                <td>{{ number_format($data->e101_c5 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c6 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c7 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c8 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c9 ??  0,2) }}</td>
                                                <td>{{ number_format($data->e101_c10 ??  0,2) }}</td>
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#modal{{ $data->e101_c1 }}">
                                                            <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="icon" style="text-align: center">
                                                        <a href="#" type="button">
                                                            <i class="fa fa-trash-o"
                                                                style="color: #dc3545;font-size:18px"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>


                                            <div class="col-md-6 col-12">

                                                <!--scrolling content Modal -->
                                                <div class="modal fade" id="modal{{ $data->e101_c1 }}"
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
                                                                    action="{{ route('penapis.edit.bahagian.ivb', [$data->e101_c1]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <label>Nama Produk </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c4'
                                                                                class="form-control"
                                                                                value="{{ $data->produk[0]->prodname }}" readonly>
                                                                        </div>
                                                                        <label>Stok Awal </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c5'
                                                                                class="form-control" value="{{  $data->e101_c5 }}">
                                                                        </div>
                                                                        <label>Belian / Penerimaan </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c6'
                                                                                class="form-control" value="{{ $data->e101_c6 }}">
                                                                        </div>
                                                                        {{-- <label>Import </label>
                                                                        <div class="form-group">
                                                                            <input type="password" placeholder="Password"
                                                                                class="form-control">
                                                                        </div> --}}
                                                                        <label>Pengeluaran </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c7'
                                                                                class="form-control" value="{{ $data->e101_c7 }}">
                                                                        </div>
                                                                        <label>Jualan / Edaran Dalam Negeri </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c8'
                                                                                class="form-control" value="{{ $data->e101_c8 }}">
                                                                        </div>
                                                                        <label>Eksport </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c9'
                                                                                class="form-control" value="{{ $data->e101_c9 }}">
                                                                        </div>
                                                                        <label>Stok Akhir </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='e101_c10'
                                                                                class="form-control" value="{{ $data->e101_c10 }}">
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
                                        <tr>

                                            <td colspan="2"><b>JUMLAH</b></td>
                                            {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                            <td style="text-align: right"><b>{{ number_format($total ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total2 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total3 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total4 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total5 ??  0,2) }}</b></td>
                                            <td style="text-align: right"><b>{{ number_format($total6 ??  0,2) }}</b></td>

                                            <td colspan="2"></td>
                                            {{-- <td></td> --}}

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
                            <a href="{{ route('penapis.bahagianiva') }}" class="btn btn-primary"
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
                                    <a href="{{ route('penapis.bahagianv') }}" type="button"
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
