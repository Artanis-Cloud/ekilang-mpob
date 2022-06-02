@extends('layouts.main')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}

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
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>

                    </div>
                    <div class="pl-3">
                        <div class="row">

                            <div class="col-md-12 text-center">

                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Pelesen Berdaftar
                                </h3>
                                <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Kilang Buah</b></h4>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>

                        </div> <hr>

                        <section class="section">
                            <div class="card">
                                {{-- <div class="card-header">
                                                            Simple Datatable
                                                        </div> --}}
                                <div class="row">
                                    <div class=" dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" style="background-color: rgb(238, 70, 70); margin-right:20px"
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Kilang Buah
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('admin.senaraipelesenpenapis') }}">Kilang
                                                Penapis</a>
                                            <a class="dropdown-item" href="{{ route('admin.senaraipelesenisirung') }}">Kilang
                                                Isirung</a>
                                            <a class="dropdown-item" href="{{ route('admin.senaraipelesenoleokimia') }}">Kilang
                                                Oleokimia</a>
                                            <a class="dropdown-item" href="{{ route('admin.senaraipelesensimpanan') }}">Pusat
                                                Simpanan</a>
                                            <a class="dropdown-item" href="{{ route('admin.senaraipelesenbio') }}">Kilang
                                                Biodiesel</a>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-8 text-left "> --}}
                                        <a href="{{ route('admin.senaraipelesenbatalbuah') }}" class="btn btn-primary"
                                            style="float: left; margin-right:2%">Senarai
                                            Pelesen Batal</a>

                                        <a href="{{ route('admin.1daftarpelesen') }}" class="btn btn-primary"
                                            style="float: left"> Tambah Pelesen Baru</a>
                                    {{-- </div> --}}
                                </div>

                                <br>
                                <div class="table-responsive" id="example1">
                                    <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                        <thead >
                                            <tr style="background-color: #e9ecefbd;  word-wrap:normal" >
                                                {{-- <th class="no-sort">Bil.</th> --}}
                                                <th style=" vertical-align: middle">No. Lesen</th>
                                                <th style=" vertical-align: middle">Nama Premis</th>
                                                <th style=" vertical-align: middle">Emel</th>
                                                <th style=" vertical-align: middle">No. Telefon</th>
                                                <th style=" vertical-align: middle">Kod Pegawai</th>
                                                <th style=" vertical-align: middle">No. Siri</th>
                                                <th style=" vertical-align: middle">Status<br> e-Kilang</th>
                                                <th style=" vertical-align: middle">Status<br> e-Stok</th>
                                                <th style=" vertical-align: middle">Direktori</th>
                                                <th style=" vertical-align: middle">Prestasi OER</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd;">
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
                                                <th>Prestasi OER</th>
                                            </tr>
                                        </tfoot>
                                        <tbody style="word-break: break-word; font-size:12px">
                                            @foreach ($users as $data)
                                            @if ($data->pelesen)
                                                <tr class="text-left">
                                                    {{-- <td>{{ $loop->iteration }}</td> --}}

                                                    <td>
                                                        <a href="{{ route('admin.papar.maklumat', $data->e_id) }}"><u>
                                                                {{ $data->e_nl ?? '-' }}</u></a>
                                                    </td>
                                                    <td>{{ $data->pelesen->e_np ?? '-' }}</td>
                                                    <td>{{ $data->pelesen->e_email ?? '-' }}</td>
                                                    <td>{{ $data->pelesen->e_notel ?? '-' }}</td>
                                                    <td style="text-align: center">{{ $data->kodpgw }}</td>
                                                    <td style="text-align: center">{{ $data->nosiri }}</td>
                                                    @if ($data->e_status == 1)
                                                        <td style="text-align: center">Aktif</td>
                                                    @elseif ($data->e_status == 2)
                                                        <td style="text-align: center">Tidak Aktif</td>
                                                    @else
                                                        <td style="text-align: center">-</td>
                                                    @endif
                                                    @if ($data->e_stock == 1)
                                                        <td style="text-align: center">Aktif</td>
                                                    @elseif ($data->e_stock == 2)
                                                        <td style="text-align: center">Tidak Aktif</td>
                                                    @else
                                                        <td style="text-align: center">-</td>
                                                    @endif
                                                    @if ($data->directory == 'Y')
                                                        <td style="text-align: center">Ya</td>
                                                    @elseif ($data->directory == 'N')
                                                        <td style="text-align: center">Tidak</td>
                                                    @else
                                                        <td style="text-align: center">-</td>
                                                    @endif
                                                    <td style="text-align: center">-</td>

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
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}


@endsection
