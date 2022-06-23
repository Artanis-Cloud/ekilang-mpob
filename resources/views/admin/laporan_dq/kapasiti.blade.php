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
                    <h4 class="page-title">Dynamic Query Biodiesel
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
                            {{-- <form action="{{ route('admin.edit.kapasiti.proses', $pelesen->e_id) }}" method="post">
                                @csrf --}}
                            <div class="row" style="margin-top:-3%">
                                <div class="col-10 mr-auto ml-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-bordered">
                                                    <thead>
                                                        <tr style="background-color: #e9ecefbd">
                                                            {{-- <th>Bil.</th> --}}
                                                            <th>No. Lesen</th>
                                                            <th>Nama Pelesen</th>
                                                            <th>Bulan</th>
                                                            <th>Tahun</th>
                                                            <th>Kapasiti</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr style="background-color: #e9ecefbd">
                                                            {{-- <th>Bil.</th> --}}
                                                            <th>No. Lesen</th>
                                                            <th>Nama Pelesen</th>
                                                            <th>Bulan</th>
                                                            <th>Tahun</th>
                                                            <th>Kapasiti</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @foreach ($reg_pelesen as $data)
                                                            @if ($data->pelesen)
                                                                <tr>
                                                                    <td>{{ $data->e_nl }}</td>
                                                                    <td>{{ $data->pelesen->e_np }}</td>
                                                                     @if ($data->pelesen->bulan == '01')
                                                                        <td>JANUARI</td>
                                                                    @elseif ($data->pelesen->bulan == '02')
                                                                        <td>FEBRUARI</td>
                                                                    @elseif ($data->pelesen->bulan == '03')
                                                                        <td>MAC</td>
                                                                    @elseif ($data->pelesen->bulan == '04')
                                                                        <td>APRIL</td>
                                                                    @elseif ($data->pelesen->bulan == '05')
                                                                        <td>MEI</td>
                                                                    @elseif ($data->pelesen->bulan == '06')
                                                                        <td>JUN</td>
                                                                    @elseif ($data->pelesen->bulan == '07')
                                                                        <td>JULAI</td>
                                                                    @elseif ($data->pelesen->bulan == '08')
                                                                        <td>OGOS</td>
                                                                    @elseif ($data->pelesen->bulan == '09')
                                                                        <td>SEPTEMBER</td>
                                                                    @elseif ($data->pelesen->bulan == '10')
                                                                        <td>OKTOBER</td>
                                                                    @elseif ($data->pelesen->bulan == '11')
                                                                        <td>NOVEMBER</td>
                                                                    @elseif ($data->pelesen->bulan == '12')
                                                                        <td>DISEMBER</td>
                                                                    @else
                                                                        <td></td>

                                                                    @endif
                                                                    <td>{{ $data->pelesen->tahun ?? '' }}</td>
                                                                    <td><input type="text" size="15" style="text-align: center; width:100%" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                                        oninput="validate_two_decimal(this);setCustomValidity('')" name='kap_proses' class="center mr-auto ml-auto"
                                                                        onkeypress="return isNumberKey(event)" required
                                                                        value="{{ $data->pelesen->kap_proses}}"></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                                <div class="col-12 mb-4 mt-4" >
                                                    {{-- <div class="text-left"> --}}
                                                        <a href="{{ route('admin.kapasiti') }}" type="button" class="btn btn-primary">Kembali</a>
                                                    {{-- </div> --}}
                                                    {{-- <div class="text-right ml-auto"> --}}

                                                        <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                                                            data-target="#next">Simpan</button>
                                                    {{-- </div> --}}
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
                "columnDefs": [{
                    'targets': [0, 7, 8],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }]

            });
        });
    </script> --}}
@endsection
