@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Validasi</h4>
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

        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h4 style="color: rgb(39, 80, 71);">Validasi (Semakan Data)</h4>
                            <h6 style="color: rgb(242, 68, 68); margin-bottom:1%"><i>
                                    Perhatian: Proses ini menyemak data di PLEID</i>
                            </h6>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="container center ">
                                <div class="table-responsive">
                                    <div id="tblData">
                                    <table id="example" class="table table-bordered"
                                        style="width: 100%;">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd">


                                                <th>No. Batch<br></th>
                                                <th>No. Lesen</th>
                                                {{-- <th>Kod Pegawai</th> --}}
                                                <th>Nama</th>
                                                <th>Negeri</th>
                                                <th>Pengeluaran CPO</th>
                                                <th>Pengeluaran PK</th>
                                                <th>FFB Proses</th>
                                                <th>Catatan</th>


                                                {{-- <th>No. Siri</th> --}}
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                <th>No. Batch<br></th>
                                                <th>No. Lesen</th>
                                                {{-- <th>Kod Pegawai</th> --}}
                                                <th>Nama</th>
                                                <th>Negeri</th>
                                                <th>Pengeluaran CPO</th>
                                                <th>Pengeluaran PK</th>
                                                <th>FFB Proses</th>
                                                <th>Catatan</th>

                                                {{-- <th>No. Siri</th> --}}
                                            </tr>
                                        </tfoot>
                                        @if($query1 && !$query1->isEmpty())
                                        <tbody style="word-break: break-word; font-size:12px">
                                             @foreach ($query1 as $data)
                                                <tr>
                                                <td>{{ $data->nobatch }}<br></td>
                                                <td>{{ $data->nolesen }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->nama_negeri }}</td>
                                                <td>{{ $data->cpo_prod }}</td>
                                                <td>{{ $data->pk_prod }}</td>
                                                <td>{{ $data->ffb_proc }}</td>
                                                <td>FFB Proses tiada</td>


                                                    {{-- <td>{{ $data->nosiri }}</td> --}}



                                                </tr>
                                            @endforeach

                                        </tbody>
                                        @else
                                        <td colspan="8" style="text-align: center">Tiada kesalahan FFB Proses</td>

                                        @endif

                                    </table>
                                    {{-- </div> --}}

                                </div>















                                    {{-- <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Anda pasti mahu menghantar validasi ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ya</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    @endsection

    @section('scripts')
        {{-- <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
                        "zeroRecords": "Maaf, tiada rekod.",
                        "info": "",
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
        </script> --}}
    @endsection
