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

                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class="mb-4 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); ">Bahagian Ib</h3>
                                        <h5 style="color: rgb(39, 80, 71)">Produk Minyak Isirung Sawit
                                        </h5>
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
                                                    <select class="form-select" id="basicSelect" style="margin-left:42%; width:40%">
                                                        <option selected hidden disabled>Sila Pilih Produk</option>
                                                        <option value="C8">BPKL - C8
                                                        </option><option value="X3">BPKL - X3
                                                        </option><option value="DT">BPKO - DT
                                                        </option><option value="X2">BPKO - X2
                                                        </option><option value="C9">BPKS - C9
                                                        </option><option value="X4">BPKS - X4
                                                        </option><option value="82">CBPKO - 82
                                                        </option><option value="06">CPKL - 06
                                                        </option><option value="04">CPKO - 04
                                                        </option><option value="05">CPKS - 05
                                                        </option><option value="Y3">DFRBDPKL - Y3
                                                        </option><option value="Y4">DFRBDPKS - Y4
                                                        </option><option value="D2">HNBDPKL - D2
                                                        </option><option value="D5">HNBDPKO - D5
                                                        </option><option value="D6">HNBDPKS - D6
                                                        </option><option value="D3">HNBPKL - D3
                                                        </option><option value="D1">HNBPKO - D1
                                                        </option><option value="D4">HNBPKS - D4
                                                        </option><option value="C6">HPKL - C6
                                                        </option><option value="54">HPKO - 54
                                                        </option><option value="65">HPKS - 65
                                                        </option><option value="73">HRBDPKL - 73
                                                        </option><option value="72">HRBDPKO - 72
                                                        </option><option value="74">HRBDPKS - 74
                                                        </option><option value="Z7">INTER  PKO - Z7
                                                        </option><option value="AA">JGQRBDPKOS - AA
                                                        </option><option value="EN">MVO_CPKO - EN
                                                        </option><option value="Y2">MVO_RBDPKL - Y2
                                                        </option><option value="Y1">MVO_RBDPKO - Y1
                                                        </option><option value="A6">NBDPKL - A6
                                                        </option><option value="68">NBDPKO - 68
                                                        </option><option value="66">NBDPKS - 66
                                                        </option><option value="X6">NBHPKL - X6
                                                        </option><option value="X5">NBHPKO - X5
                                                        </option><option value="X7">NBHPKS - X7
                                                        </option><option value="A1">NBPKL - A1
                                                        </option><option value="57">NBPKO - 57
                                                        </option><option value="A8">NBPKS - A8
                                                        </option><option value="A5">NPKL - A5
                                                        </option><option value="58">NPKO - 58
                                                        </option><option value="A7">NPKS - A7
                                                        </option><option value="C1">PKAO - C1
                                                        </option><option value="56">PKFAD - 56
                                                        </option><option value="EV">PKMF - EV
                                                        </option><option value="M1">PKOF - M1
                                                        </option><option value="X0">RBDHPKL - X0
                                                        </option><option value="W9">RBDHPKO - W9
                                                        </option><option value="X1">RBDHPKS - X1
                                                        </option><option value="32">RBDPKL - 32
                                                        </option><option value="GG">RBDPKL IP - GG
                                                        </option><option value="GE">RBDPKL MB - GE
                                                        </option><option value="GF">RBDPKL SG - GF
                                                        </option><option value="30">RBDPKO - 30
                                                        </option><option value="31">RBDPKS - 31
                                                        </option><option value="M7">RPKL - M7
                                                        </option><option value="G3">RPKO - G3
                                                        </option><option value="M8">RPKS - M8
                                                        </option><option value="FZ">SPKLFA - FZ
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
                                        <div class="row" >
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Stok Awal Di Premis</label>
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
                                                Stok Awal Di Pusat Simpanan</label>
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
                                                Belian / Penerimaan</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='kuantiti' id="kuantiti" style="margin-left:42%; width:40%"
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
                                                Import</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='nilai' id="nilai" style="margin-left:42%; width:40%"
                                                    onkeypress="return isNumberKey(event)" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                              Jumlah Yang Diproses</label>
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
                                               Stok Akhir Di Premis</label>
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
                                               Stok Akhir Di Pusat Simpanan</label>
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
                                    <br>

                                    <div class="row form-group" style="padding-top: 10px; ">


                                        <div class="text-right col-md-10 mb-7 ">
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                style="float: right" data-bs-target="#exampleModalCenter">Simpan</button>
                                        </div>

                                    </div>
                                    <br>
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
                                                            <th>Stok Awal Di Premis</th>
                                                            <th>Stok Awal Di Pusat Simpanan</th>
                                                            <th>Belian / Penerimaan</th>
                                                            <th>Import</th>
                                                            <th>Jumlah Yang Diproses</th>
                                                            <th>Jualan / Edaran Dalam Negeri</th>
                                                            <th>Eksport</th>
                                                            <th>Stok Akhir Di Premis</th>
                                                            <th>Stok Akhir Di Pusat Simpanan</th>
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
                                        <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary"
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
                    </div>

                </div>
                <br>
                <br>
                <br>
                <br>



                {{-- </div>
                                                                    </div> --}}

                {{-- </section> --}}















                {{-- </div>

                    </div> --}}



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

    </body>

    </html>

@endsection
