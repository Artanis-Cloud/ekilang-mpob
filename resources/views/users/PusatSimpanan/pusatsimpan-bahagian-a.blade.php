@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper" style="transition: 0s;">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title" >Kemasukan Penyata Bulanan
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
                        @endif  {{ $tahun }}</h4>
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
            <div class="card-body">
                <div class="">
                    <form action="{{ route('pusatsimpan.add.bahagian.a') }}" method="post">
                        @csrf
                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian A</h3>
                            <h5 style="color: rgb(39, 80, 71)">Instolasi Keluaran Minyak Sawit - Aktiviti
                                Bukan Peralihan (Non Transhipment)
                            </h5>
                        </div>
                        <hr>

                        <div class="container center mt-4" style="margin-left:4%">
                            <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <span class="">Nama Produk Sawit dan Kod</span>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                    <select class="form-control" id="produk" name="e07bt_produk" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" style="width: 70%">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produks as $produk)
                                            @if ($produk->prodname != '')
                                                <option value="{{ $produk->prodid }}">
                                                    {{ $produk->prodname }} - {{ $produk->prodid }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('e07bt_produk')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <span class="">Stok Awal</span>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e07bt_stokawal' style="width: 70%" onkeypress="return isNumberKey(event)"
                                        id="e07bt_stokawal" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" title="Sila isikan butiran ini." >
                                    @error('e07bt_stokawal')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class=" align-items-center">
                                        Terimaan Dalam Negeri &nbsp;<i class="fa fa-exclamation-circle" style="color: red"
                                            title="Jumlah Penerimaan Dalam Negeri adalah termasuk jumlah Import."></i></span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e07bt_terima' style="width: 70%" onkeypress="return isNumberKey(event)"
                                        id="e07bt_terima" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" title="Sila isikan butiran ini." >
                                    @error('e07bt_terima')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                    <div class="col-md-3 mt-3">
                                    <span>Import</span>
                                </div>
                                    <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e07bt_import' style="width: 70%"
                                        id="e07bt_import" title="Sila isikan butiran ini." readonly>
                                    @error('e07bt_import')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <span class=" align-items-center">
                                        Edaran Tempatan  &nbsp;<i class="fa fa-exclamation-circle" style="color: red"
                                        title="Jumlah Edaran Tempatan adalah termasuk jumlah Eksport."></i></span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e07bt_edaran' style="width: 70%" onkeypress="return isNumberKey(event)"
                                        id="e07bt_edaran" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" title="Sila isikan butiran ini." >
                                    @error('e07bt_edaran')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3 mt-3">
                                    <span>Eksport</span>
                                </div>
                                    <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e07bt_eksport' style="width: 70%"
                                        id="e07bt_eksport" title="Sila isikan butiran ini." readonly >
                                    @error('e07bt_eksport')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <span class="">Pelarasan(+/-)</span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e07bt_pelarasan' style="width: 70%" onkeypress="return isNumberKey(event)"
                                        id="e07bt_pelarasan" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" title="Sila isikan butiran ini." >
                                    @error('e07bt_pelarasan')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir</span>
                                </div>
                                    <div class="col-md-3 mt-3">
                                    <input type="text" class="form-control" name='e07bt_stokakhir' style="width: 70%" onkeypress="return isNumberKey(event)"
                                        id="e07bt_stokakhir" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')" title="Sila isikan butiran ini." >
                                    @error('e07bt_stokakhir')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <br>
                        <div class="row justify-content-center form-group" style="margin-top: 1%; ">
                            <button type="submit" class="btn btn-primary" >Tambah</button>
                        </div>
                    </form>
                    <hr>
                    <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:3%; margin-bottom:-2%">Senarai Instolasi Keluaran Minyak
                        Sawit</h5>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" style="font-size: 13px">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th>Nama Produk Sawit</th>
                                                <th>Stok Awal</th>
                                                <th>Terimaan Dalam Negeri</th>
                                                <th>Import</th>
                                                <th>Edaran Tempatan</th>
                                                <th>Eksport</th>
                                                <th>Pelarasan (+/-)</th>
                                                <th>Stok Akhir</th>
                                                <th>Kemaskini</th>
                                                <th>Hapus?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penyata as $data)
                                                <tr style="text-align: right">
                                                    <td style="text-align: left">
                                                        {{ $data->produk->prodname }}</td>
                                                    <td>{{ number_format($data->e07bt_stokawal ?? 0, 2) }}
                                                    </td>
                                                    <td>{{ number_format($data->e07bt_terima ?? 0, 2) }}
                                                    </td>
                                                    <td>{{ number_format($data->e07bt_import ?? 0, 2) }}
                                                    </td>
                                                    <td>{{ number_format($data->e07bt_edaran ?? 0, 2) }}
                                                    </td>
                                                    <td>{{ number_format($data->e07bt_eksport ?? 0, 2) }}
                                                    </td>
                                                    <td>{{ number_format($data->e07bt_pelarasan ?? 0, 2) }}
                                                    </td>
                                                    <td>{{ number_format($data->e07bt_stokakhir ?? 0, 2) }}
                                                    </td>
                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button" data-toggle="modal"
                                                                data-target="#modal{{ $data->e07bt_id }}">
                                                                <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button" data-toggle="modal"
                                                                data-target="#next2{{ $data->e07bt_id }}">
                                                                <i class="fa fa-trash"
                                                                    style="color: #dc3545;font-size:18px"></i>
                                                            </a>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <div class="col-md-6 col-12">

                                                    <!--scrolling content Modal -->
                                                    <div class="modal fade" id="modal{{ $data->e07bt_id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Produk</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('pusatsimpan.edit.bahagian.a', [$data->e07bt_id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <label class="required">Nama Produk Sawit</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_produk'
                                                                                    class="form-control"
                                                                                    value="{{ $data->produk->prodname }}"
                                                                                    readonly>
                                                                            </div>
                                                                            <label class="required">Stok Awal </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_stokawal' onkeypress="return isNumberKey(event)"
                                                                                    class="form-control"  oninput="validate_two_decimal(this)"
                                                                                    value="{{ $data->e07bt_stokawal }}">
                                                                            </div>
                                                                            <label class="required">Penerimaan Dalam Negeri
                                                                            </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_terima' onkeypress="return isNumberKey(event)"
                                                                                    class="form-control"  oninput="validate_two_decimal(this)"
                                                                                    value="{{ $data->e07bt_terima }}">
                                                                            </div>
                                                                            <label>Import </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_import'
                                                                                    class="form-control"  oninput="validate_two_decimal(this)"
                                                                                    value="{{ $data->e07bt_import }}"
                                                                                    readonly>
                                                                            </div>
                                                                            <label class="required">Edaran Dalam Negeri
                                                                            </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_edaran' onkeypress="return isNumberKey(event)"
                                                                                    class="form-control"  oninput="validate_two_decimal(this)"
                                                                                    value="{{ $data->e07bt_edaran }}">
                                                                            </div>
                                                                            <label>Eksport </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_eksport'
                                                                                    class="form-control" oninput="validate_two_decimal(this)"
                                                                                    value="{{ $data->e07bt_eksport }}"
                                                                                    readonly>
                                                                            </div>
                                                                            <label class="required">Pelarasan (+/-) </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_pelarasan' onkeypress="return isNumberKey(event)"
                                                                                    class="form-control"  oninput="validate_two_decimal(this)"
                                                                                    value="{{ $data->e07bt_pelarasan }}">
                                                                            </div>
                                                                            <label class="required">Stok Akhir </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='e07bt_stokakhir' onkeypress="return isNumberKey(event)"
                                                                                    class="form-control"  oninput="validate_two_decimal(this)"
                                                                                    value="{{ $data->e07bt_stokakhir }}">
                                                                            </div>
                                                                        </div>


                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
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

                                                <div class="modal fade" id="next2{{ $data->e07bt_id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                    PENGESAHAN</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
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
                                                                    data-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tidak</span>
                                                                </button>
                                                                <a href="{{ route('pusatsimpan.delete.bahagiana', [$data->e07bt_id]) }}"
                                                                    type="button" class="btn btn-light-secondary" style="color: #275047; background-color: #a1929238">

                                                                    <i class="bx bx-x d-block d-sm-none" ></i>
                                                                    <span class="d-none d-sm-block" >Ya</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <tr>

                                                <td colspan="1"><b>JUMLAH</b></td>
                                                {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                                <td style="text-align: right"><b>{{ number_format($total ?? 0, 2) }}</b>
                                                </td>
                                                <td style="text-align: right"><b>{{ number_format($total2 ?? 0, 2) }}</b>
                                                </td>
                                                <td style="text-align: right"><b>0</b></td>
                                                <td style="text-align: right"><b>{{ number_format($total3 ?? 0, 2) }}</b>
                                                </td>
                                                <td style="text-align: right"><b>0</b></td>
                                                <td style="text-align: right"><b>{{ number_format($total4 ?? 0, 2) }}</b>
                                                </td>
                                                <td style="text-align: right"><b>{{ number_format($total5 ?? 0, 2) }}</b>
                                                </td>

                                                {{-- <td style="text-align: right"><b>{{ number_format($totalb2 ??  0,2) }}</b></td>
                                                                <td style="text-align: right"><b>{{ number_format($totalb3 ??  0,2) }}</b></td>
                                                                <td style="text-align: right"><b>{{ number_format($totalb4 ??  0,2) }}</b></td> --}}

                                                <td colspan="2"></td>
                                                {{-- <td></td> --}}

                                            </tr>

                                            <br>

                                        </tbody>

                                    </table>

                                </div>

                <div class="form-group" style="padding-top: 20px; ">
                    {{--<div class="text-left col-md-5">
                         <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary"
                            style="float: left">Sebelumnya</a>
                    </div>
                    <div class="text-right col-md-7">--}}
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                        data-target="#next">Simpan & Seterusnya</button>
                </div>

                <!-- Vertically Centered modal Modal -->
                <div class="modal fade" id="next" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                    PENGESAHAN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Anda pasti mahu menyimpan maklumat ini?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                </button>
                                <a href="{{ route('pusatsimpan.paparpenyata') }}" type="button"
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
    <script>
        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>

    </body>

    </html>
    @endsection

