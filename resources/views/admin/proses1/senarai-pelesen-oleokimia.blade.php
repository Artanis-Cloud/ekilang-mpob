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
                    <h4 class="page-title">Profil Pelesen</h4>
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
                    <div class="row">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle"
                                style="background-color: rgb(238, 70, 70)" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kilang Oleokimia
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenbuah') }}">Kilang
                                    Buah</a>
                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenpenapis') }}">Kilang
                                    Penapis</a>
                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenisirung') }}">Kilang
                                    Isirung</a>
                                <a class="dropdown-item" href="{{ route('admin.senaraipelesensimpanan') }}">Pusat
                                    Simpanan</a>
                                <a class="dropdown-item"
                                    href="{{ route('admin.senaraipelesenbio') }}">Kilang Biodiesel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-4 col-12"> --}}
                        <div class="pl-3">

                            <div class=" text-center">
                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Pelesen Berdaftar
                                </h3>
                                <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Kilang Oleokimia</b></h4>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <hr>


                            <section class="section">
                                <div class="card">
                                    {{-- <div class="card-header">
                                                            Simple Datatable
                                                        </div> --}}
                                    <div class="text-left col-md-7">
                                        <a href="{{ route('admin.senarai.pelesen.batal.oleokimia') }}" class="btn btn-primary"
                                            style="float: left; margin-right:2%">Senarai
                                            Pelesen Batal</a>

                                        <a href="{{ route('admin.1daftarpelesen') }}" class="btn btn-primary"
                                            style="float: left"> Tambah Pelesen Baru</a>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr style="background-color: #e9ecefbd">
                                                    {{-- <th>Bil.</th> --}}
                                                    <th>No. Lesen</th>
                                                    <th>Nama Premis</th>
                                                    <th>Emel</th>
                                                    <th>No. Telefon</th>
                                                    <th>Kod Pegawai</th>
                                                    <th>No. Siri</th>
                                                    <th>Status e-Kilang</th>
                                                    <th>Status e-Stok</th>
                                                    <th>Direktori</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr style="background-color: #e9ecefbd">
                                                    {{-- <th>Bil.</th> --}}
                                                    <th>No. Lesen</th>
                                                    <th>Nama Premis</th>
                                                    <th>Emel</th>
                                                    <th>No. Telefon</th>
                                                    <th>Kod Pegawai</th>
                                                    <th>No. Siri</th>
                                                    <th>Status e-Kilang</th>
                                                    <th>Status e-Stok</th>
                                                    <th>Direktori</th>
                                                </tr>
                                            </tfoot>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($users as $data)
                                                @if ($data->pelesen)

                                                    <tr class="text-left">
                                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                                        <td>
                                                            <a href="{{ route('admin.papar.maklumat', $data->e_id) }}"><u>
                                                                    {{ $data->e_nl }}</u></a>
                                                        </td>
                                                        <td>{{ $data->pelesen->e_np ?? '-' }}</td>
                                                        <td>{{ $data->pelesen->e_email ?? '-' }}</td>
                                                        <td>{{ $data->pelesen->e_notel ?? '-' }}</td>
                                                        <td>{{ $data->kodpgw }}</td>
                                                        <td>{{ $data->nosiri }}</td>
                                                        @if ($data->e_status == 1)
                                                            <td>Aktif</td>
                                                        @elseif ($data->e_status == 2)
                                                            <td>Tidak Aktif</td>
                                                        @else
                                                            <td>-</td>
                                                        @endif
                                                        @if ($data->e_stock == 1)
                                                            <td>Aktif</td>
                                                        @elseif ($data->e_stock == 2)
                                                            <td>Tidak Aktif</td>
                                                        @else
                                                            <td>-</td>
                                                        @endif
                                                        @if ($data->directory == 'Y')
                                                            <td>Ya</td>
                                                        @elseif ($data->directory == 'N')
                                                            <td>Tidak</td>
                                                        @else
                                                            <td>-</td>
                                                        @endif

                                                        {{-- <td>-</td> --}}
                                                    </tr>
                                                    @endif
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
