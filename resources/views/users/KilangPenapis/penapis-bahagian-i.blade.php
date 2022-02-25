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
                        <form action="{{ route('penapis.add.bahagian.i') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">

                                        <div class="mb-4 text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71); ">Bahagian I</h3>
                                            <h5 style="color: rgb(39, 80, 71)">Produk Minyak Sawit
                                            </h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>

                                        {{-- <div class="container center mt-4"> --}}

                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nama Produk</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="produk"
                                                        style="margin-left:42%; width:40%" name="e101_b4">
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
                                                Stok Awal Di Premis</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b5'
                                                    style="margin-left:42%; width:40%" id="e101_b5" required
                                                    title="Sila isikan butiran ini." value="">
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
                                                Stok Awal Di Pusat Simpanan</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b6'
                                                    style="margin-left:42%; width:40%" id="e101_b6" required
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
                                                Belian / Penerimaan</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b7' id="e101_b7"
                                                    style="margin-left:42%; width:40%"
                                                    onkeypress="return isNumberKey(event)" required
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
                                                Pengeluaran</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b9'
                                                    style="margin-left:42%; width:40%" id="e101_b9" required
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
                                                Digunakan Untuk Proses Selanjutnya</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b10'
                                                    style="margin-left:42%; width:40%" id="e101_b10" required
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
                                                Jualan / Edaran Dalam Negeri</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b11'
                                                    style="margin-left:42%; width:40%" id="e101_b11" required
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
                                                Eksport</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b12'
                                                    style="margin-left:42%; width:40%" id="e101_b12" required
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
                                                Stok Akhir Di Premis</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b13'
                                                    style="margin-left:42%; width:40%" id="e101_b13" required
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
                                                Stok Akhir Di Pusat Simpanan</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e101_b14'
                                                    style="margin-left:42%; width:40%" id="e101_b14" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row form-group" style="padding-top: 10px; ">

                                        <div class="row form-group" style="padding-top: 10px; ">
                                            <div class="text-right col-md-12 mb-4 ">
                                                <button type="submit" class="btn btn-primary ">Tambah</button>
                                            </div>
                                        </div>
                                        {{-- <div class="text-right col-md-10 mb-7 ">
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                style="float: right" data-bs-target="#exampleModalCenter">Simpan</button>
                                        </div> --}}

                                    </div>
                                    <input type="hidden" name="hidDelete" id="hidDelete" value="" />
                        </form>
                        <br>
                        <br>
                        <hr>

                        <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Sawit</h5>
                        <hr>
                        <section class="section">
                            <div class="card">


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" id="cuba">
                                        <thead style="text-align: center">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Stok Awal Di Premis</th>
                                                <th>Stok Awal Di Pusat Simpanan</th>
                                                <th>Belian / Penerimaan</th>
                                                {{-- <th>Import</th> --}}
                                                <th>Pengeluaran</th>
                                                <th>Digunakan Untuk Proses Selanjutnya</th>
                                                <th>Jualan / Edaran Dalam Negeri</th>
                                                <th>Eksport</th>
                                                <th>Stok Akhir Di Premis</th>
                                                <th>Stok Akhir Di Pusat Simpanan</th>
                                                <th>Kemaskini</th>
                                                <th>Buang?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penyata as $data)
                                                <tr>

                                                    <td>
                                                        {{ $data->produk[0]->prodname  }}


                                                        {{-- @if ($penyata->e101b->e101_b4 == $produk->prodid) --}}
                                                        {{-- <span value={{ $data->e101_b4 }}>{{ $data->e101_b4   }}</span> --}}
                                                        {{-- @endif --}}

                                                    </td>
                                                    <td>{{ $data->e101_b5 }}</td>
                                                    <td>{{ $data->e101_b6 }}</td>
                                                    <td>{{ $data->e101_b7 }}</td>
                                                    {{-- <td>{{ $data->e101_b8 }}</td> --}}
                                                    <td>{{ $data->e101_b9 }}</td>
                                                    <td>{{ $data->e101_b10 }}</td>
                                                    <td>{{ $data->e101_b11 }}</td>
                                                    <td>{{ $data->e101_b12 }}</td>
                                                    <td>{{ $data->e101_b13 }}</td>
                                                    <td>{{ $data->e101_b14 }}</td>
                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modal{{ $data->e101_b1 }}">
                                                                <i class="fas fa-edit fa-lg" style="color: #228c1c">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <button type="button" value="Delete" onclick="myDeleteFunction()"
                                                            class="btn btn-danger">Delete</button>
                                                    </td>
                                                    {{-- <td>{{ $data->e101_b15 }}</td> --}}


                                                </tr>
                                                <div class="col-md-6 col-12">

                                                    <!--scrolling content Modal -->
                                                    <div class="modal fade" id="modal{{ $data->e101_b1 }}"
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
                                                                        action="{{ route('penapis.edit.bahagian.i', [$data->e101_b1]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <label>Nama Produk </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b4'
                                                                                    class="form-control"
                                                                                    value="{{ $data->produk[0]->prodname}}" readonly>
                                                                            </div>
                                                                            <label>Stok Awal Di Premis </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b5'
                                                                                    class="form-control" value="{{ old('e101_b5') ?? $data->e101_b5 }}">
                                                                            </div>
                                                                            <label>Stok Awal Di Pusat Simpanan </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b6'
                                                                                    class="form-control" value="{{  $data->e101_b6 }}">
                                                                            </div>
                                                                            <label>Belian / Penerimaan </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b7'
                                                                                    class="form-control" value="{{ old('e101_b7') ?? $data->e101_b7 }}">
                                                                            </div>
                                                                            {{-- <label>Import </label>
                                                                            <div class="form-group">
                                                                                <input type="password" placeholder="Password"
                                                                                    class="form-control">
                                                                            </div> --}}
                                                                            <label>Pengeluaran </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b9'
                                                                                    class="form-control" value="{{ old('e101_b9') ?? $data->e101_b9 }}">
                                                                            </div>
                                                                            <label>Digunakan Untuk Proses
                                                                                Selanjutnya</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b10'
                                                                                    class="form-control" value="{{ old('e101_b10') ?? $data->e101_b10 }}">
                                                                            </div>
                                                                            <label>Jualan / Edaran Dalam Negeri </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b11'
                                                                                    class="form-control" value="{{ old('e101_b11') ?? $data->e101_b11 }}">
                                                                            </div>
                                                                            <label>Eksport </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b12'
                                                                                    class="form-control" value="{{ old('e101_b12') ?? $data->e101_b12 }}">
                                                                            </div>
                                                                            <label>Stok Akhir Di Premis </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b13'
                                                                                    class="form-control" value="{{ old('e101_b13') ?? $data->e101_b13 }}">
                                                                            </div>
                                                                            <label>Stok Akhir Di Pusat Simpanan </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e101_b14'
                                                                                    class="form-control" value="{{ old('e101_b14') ?? $data->e101_b14 }}">
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
                                                                <div class="text-right col-md-7 mb-4 ">
                                                                    <button type="submit" class="btn btn-primary" style="float: right">Simpan &
                                                                        Seterusnya</button>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
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
                                        </tbody>
                                    </table>
                                </div>





                            </div>

                        </section>




                    </div>











                    <div class=" row form-group" style="padding-top: 10px; ">


                        <div class="text-left col-md-5">
                            <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary"
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
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                    </button>
                                    <a href="{{ route('penapis.bahagianii') }}" type="button"
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
        </div>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="assets/js/main.js"></script>

    <script src="{{ asset('theme/libs/DataTables2/datatables.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada rekod yang tersedia",
                    "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                    "search": "Carian",
                    "previous": "Sebelum",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Seterusnya",
                        "previous": "Sebelumnya"
                    },
                },
            });
        });

        $(window).on('changed', (e) => {
            // if($('#example').DataTable().clear().destroy()){
            // $('#example').DataTable();
            // }
        });

        // document.getElementById("form_type").onchange = function() {
        //     myFunction()
        // };

        // function myFunction() {
        //     console.log('asasa');
        //     table.clear().draw();
        // }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

    <script type="text/javascript">
        function deleteThis(id) {
            document.getElementById("hidDelete").value = id;
            document.yourFormName.submit();
        }
    </script>

    <script>
        // function myCreateFunction() {
        //     var table = document.getElementById("myTable");
        //     var row = table.insertRow(0);
        //     var cell1 = row.insertCell(0);
        //     var cell2 = row.insertCell(1);
        //     cell1.innerHTML = "NEW CELL1";
        //     cell2.innerHTML = "NEW CELL2";
        // }

        function myDeleteFunction() {
            document.getElementById("cuba").deleteRow(0);
        }
    </script>

    </body>

    </html>
@endsection
