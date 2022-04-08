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
                    <h4 class="page-title">Pengurusan Pentadbir</h4>
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

            <div class="card" style="margin-right:2%; margin-left:2%">
                <div class="card-body">
                        {{-- <div class="col-md-4 col-12"> --}}
                        <div class="pl-3">

                            <div class=" text-center">
                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Pentadbir
                                </h3>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <hr>


                            <section class="section">
                                <div class="card">
                                    {{-- <div class="card-header">
                                                            Simple Datatable
                                                        </div> --}}
<div class="col-md-12">
                                        <a href="{{ route('admin.pengurusan.pentadbir') }}" class="btn btn-primary"
                                            style="float: left"> Tambah Pentadbir Baru</a></div>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Bil.</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Alamat Emel</th>
                                                    <th>Kategori</th>
                                                </tr>
                                            </thead>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($admin as $data)
                                                    <tr class="text-left">
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>
                                                            <a href="{{ route('admin.papar.maklumat', $data->e_id) }}"><u>
                                                                    {{ $data->e_nl }}</u></a>
                                                        </td> --}}
                                                        <td>{{ $data->name ?? '-' }}</td>
                                                        <td>{{ $data->username ?? '-' }}</td>
                                                        <td>{{ $data->email ?? '-' }}</td>
                                                        <td>{{ $data->role }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </section>
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
                    "lengthMenu": "Memaparkan _MENU_ rekod per  ",
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
    </script>
@endsection
