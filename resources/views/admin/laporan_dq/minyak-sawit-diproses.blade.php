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
                    <h4 class="page-title">Hebahan 10hb
                    </h4>
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
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Minyak Sawit Diproses
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir</h5> --}}
                        </div>
                        <hr>

                            <div class="text-left col-md-7 mx-3">


                                <a href="{{ route('admin.tambah.proses') }}" class="btn btn-primary"
                                    style="float: left"> Tambah Proses</a>
                            </div>
                            <div class="row">
                                <div class="col-12 mr-auto ml-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="zero_config" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil.</th>
                                                            <th>Tahun</th>
                                                            <th>Bulan</th>
                                                            <th>CPO MSIA</th>
                                                            <th>PPO MSIA</th>
                                                            <th>CPKO MSIA</th>
                                                            <th>PPKO MSIA</th>
                                                            <th>Kemaskini</th>
                                                            <th>Padam</th>
                                                            <th>Port</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach ($pelesen as $data) --}}

                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <div class="icon" style="text-align: center">
                                                                    <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#modal">
                                                                        <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="icon" style="text-align: center">
                                                                    <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#exampleModalCenter2">
                                                                        <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>

                                                                    </a>


                                                                </div>

                                                            </td>
                                                            <td> <div class="icon" style="text-align: center">
                                                                <a href="#" type="button" data-toggle="modal"
                                                                    data-target="#exampleModalCenter2">
                                                                    <i class="fas fa-arrow-circle-up" style="color: #31bc6d;font-size:18px"></i>

                                                                </a>


                                                            </div></td>
                                                        </tr>
                                                        {{-- @endforeach --}}
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>




    </div>
@endsection

@section('scripts')
    <script>
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
                "columnDefs": [{
                    'targets': [0, 7, 8],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }]

            });
        });
    </script>
@endsection
