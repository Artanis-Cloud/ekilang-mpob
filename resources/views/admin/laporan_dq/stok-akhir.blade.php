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
                    <h4 class="page-title">Laporan Dynamic Query
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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Kapasiti Kilang Biodiesel
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5> --}}
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row ml-auto" style="margin-top:-1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">No.
                                        Lesen
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="No. Lesen">

                                    </div>
                                </div>
                                <div class="row mt-2 ml-auto">
                                    <label
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="No. Lesen">

                                    </div>
                                </div>
                                <div class="row mt-2 ml-auto">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="No. Lesen">

                                    </div>
                                </div>

                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-8 mr-auto ml-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="zero_config" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil.</th>
                                                            <th>No. Lesen</th>
                                                            <th>Bulan</th>
                                                            <th>Tahun</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pelesen as $data)

                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="{{ route('admin.edit.kapasiti') }}"><u>{{ $data->e_nl }}</u></a></td>
                                                            <td>{{ $data->bulan }}</td>
                                                            <td>{{ $data->tahun }}</td>
                                                        </tr>
                                                        @endforeach
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
