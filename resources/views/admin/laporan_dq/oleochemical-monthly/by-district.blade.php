@extends('layouts.main')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    {{-- <h4 class="page-title" >Kemasukan Penyata Bulanan
                        @if ($bulan == 1)
                            JANUARI
                        @elseif($bulan == 2)
                            FEBRUARI
                        @elseif($bulan == 3)
                            MAC
                        @elseif($bulan == 4)
                            APRIL
                        @elseif($bulan == 5)
                            MEI
                        @elseif($bulan == 6)
                            JUN
                        @elseif($bulan == 7)
                            JULAI
                        @elseif($bulan == 8)
                            OGOS
                        @elseif($bulan == 9)
                            SEPTEMBER
                        @elseif($bulan == 10)
                            OKTOBER
                        @elseif($bulan == 11)
                            NOVEMBER
                        @elseif($bulan == 12)
                            DISEMBER
                        @endif  {{ $tahun }}</h4> --}}
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
            <form action="{{ route('oleo.add.bahagian.ic') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="pl-3">

                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 1(c)</h3>
                            <h5 style="color: rgb(39, 80, 71)">Minyak-minyak Lain
                            </h5>
                        </div>
                        <hr>

                        <div class="container center mt-4" style="margin-left:4%">

                            <div class="row">
                                <div class="col-md-3">
                                    <span class="">Year</span>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="produk" name="e104_b4" style="width: 50%">
                                        <option selected hidden disabled>Sila Pilih</option>
                                        {{-- @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->prodid }}
                                            </option>
                                        @endforeach --}}

                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <span class="">Product Group</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b10' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b10" required
                                        title="Sila isikan butiran ini.">

                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="">Month</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b5' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b5" required
                                        title="Sila isikan butiran ini.">
                                </div>
                                <div class="col-md-3">
                                    <span class="">Product Sub Group</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b10' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b10" required
                                        title="Sila isikan butiran ini.">
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="">Region</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b6' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b6" required
                                        title="Sila isikan butiran ini.">
                                </div>

                                <div class="col-md-3">
                                    <span class="">Product</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b11' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b11" required
                                        title="Sila isikan butiran ini.">
                                    @error('e104_b11')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="">State</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b7' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b7" required
                                        title="Sila isikan butiran ini.">
                                    @error('e104_b7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <span class="">Product Category</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b12' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b12" required
                                        title="Sila isikan butiran ini.">
                                    @error('e104_b12')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span>District</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b8' placeholder="Import"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b8" required
                                        title="Sila isikan butiran ini." readonly>
                                </div>

                                <div class="col-md-3">
                                    <span class="">License No</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b13' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b13"
                                        title="Sila isikan butiran ini.">
                                    @error('e104_b13')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <span class="">License Name</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name='e104_b9' oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)" style="width:50%" id="e104_b9" required
                                        title="Sila isikan butiran ini.">
                                    @error('e104_b9')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>


                            </div>
                        </div>
                        <br>

                        <div class="row form-group" style="margin-left:45%">
                            <div class="row form-group">
                                <div class="text-right col-md-12 mb-4 ">
                                    <button type="submit" class="btn btn-primary ">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <hr>
            <br>
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak-minyak Lain</h5>

            <section class="section">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-bordered " style="font-size: 13px">
                            <thead style="text-align: center">
                                <tr>
                                    <th>Licensee No</th>
                                    <th colspan="12">2020</th>
                                    <th>Total</th>


                                </tr>

                                <tr>
                                    <td>s</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>Jumlah</td>

                                </tr>

                            </thead>
                            <tbody>
                                {{-- @foreach ($penyata as $data)
                                    <tr style="text-align: right">

                                        <td style="text-align: left">
                                            {{ $data->produk->prodname }}

                                        </td>
                                        <td style="text-align: center">
                                            {{ $data->produk->prodid }}
                                        </td>
                                        <td>{{ number_format($data->e104_b5 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b6 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b7 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b8 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b9 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b10 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b11 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b12 ?? 0, 2) }}</td>
                                        <td>{{ number_format($data->e104_b13 ?? 0, 2) }}</td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal{{ $data->e104_b1 }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="icon" style="text-align: center">
                                                <a href="#" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#next2{{ $data->e104_b1 }}">
                                                    <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <div class="col-md-6 col-12">

                                        <!--scrolling content Modal -->
                                        <div class="modal fade" id="modal{{ $data->e104_b1 }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                            Kemaskini Maklumat Produk</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('oleo.edit.bahagian.ic', [$data->e104_b1]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label class="required">Nama Produk </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b4' class="form-control"
                                                                        value="{{ $data->produk->prodname }}" readonly>
                                                                </div>
                                                                <label class="required">Stok Awal Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b5' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b5 }}">
                                                                </div>
                                                                <label class="required">Stok Awal Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b6' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b6 }}">
                                                                </div>
                                                                <label class="required">Belian / Terimaan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b7' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b7 }}">
                                                                </div>
                                                                <label>Import </label>
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Import"
                                                                        class="form-control" readonly>
                                                                </div>

                                                                <label class="required">Jumlah yang Diproses</label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b9' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b9 }}">
                                                                </div>
                                                                <label>Jualan / Edaran Tempatan </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b10' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b10 }}">
                                                                </div>
                                                                <label class="required">Eksport </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b11' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b11 }}">
                                                                </div>
                                                                <label class="required">Stok Akhir Di Premis </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b12' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b12 }}">
                                                                </div>
                                                                <label class="required">Stok Akhir Di Pusat Simpanan
                                                                </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='e104_b13' oninput="validate_two_decimal(this)"
                                                                        onkeypress="return isNumberKey(event)"
                                                                        class="form-control"
                                                                        value="{{ $data->e104_b13 }}">
                                                                </div>
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

                                    <div class="modal fade" id="next2{{ $data->e104_b1 }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        Anda pasti mahu menghapus maklumat ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tidak</span>
                                                    </button>
                                                    <a href="{{ route('oleo.delete.bahagianic',[$data->e104_b1]) }}"
                                                        type="button" class="btn btn-light-secondary" style="color: #275047; background-color: #a1929238">
                                                        <i class="bx bx-x d-block d-sm-none" ></i>
                                                        <span class="d-none d-sm-block" >Ya</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>

            </section>


        </div>
        <div class="row form-group" style="margin-top:-2%">


            <div class="text-left col-md-5" style="margin-left:2%">
                <a href="{{ route('oleo.bahagianib') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
            </div>
            <div class="text-right col-md-6 mb-4 " style="margin-left:4%">
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" style="float: right"
                    data-bs-target="#next">Simpan &
                    Seterusnya</button>
            </div>

        </div>

        <!-- Vertically Centered modal Modal -->
        <div class="modal fade" id="next" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
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
                        <a href="{{ route('oleo.bahagianii') }}" type="button" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Ya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>




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
