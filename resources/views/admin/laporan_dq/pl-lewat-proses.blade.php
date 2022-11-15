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
                    <h4 class="page-title">Dynamic Query Biodiesel</h4>
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
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i
                                    class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>

                    </div>
                    <div class="pl-3">
                        <div class="row">

                            <div class="col-md-12 text-center">

                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Penerimaan PL
                                </h3>
                                @if ($kategori == 'tepat')
                                    <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Penerimaan Sebelum 7hb</b></h4>
                                @elseif ($kategori == 'lewat')
                                    <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Penerimaan Selepas 7hb</b></h4>
                                @else
                                <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Penerimaan PL</b></h4>
                                @endif
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>

                        </div>
                        <hr>

                        <section class="section">
                            <div class="card">

                                <br>
                                <div class="table-responsive" id="example1">
                                    <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd;  word-wrap:normal">
                                                {{-- <th class="no-sort">Bil.</th> --}}
                                                <th>Bil.</th>
                                                <th>No. Lesen</th>
                                                <th>Nama Premis</th>
                                                <th>Negeri</th>
                                                <th>Tarikh Terima PL</th>
                                            </tr>
                                        </thead>
                                        {{-- <tfoot>
                                            <tr style="background-color: #e9ecefbd;">
                                                <th>Bil.</th>
                                                <th>No. Lesen</th>
                                                <th>Nama Premis</th>
                                                <th>Tarikh Terima PL</th>
                                        </tfoot> --}}
                                        <tbody style="word-break: break-word; font-size:12px">
                                            @foreach ($list_penyata as $data)
                                                    <tr class="text-left">
                                                        <td>{{ $loop->iteration }}
                                                        </td>
                                                        <td>{{ $data->e_nl ?? '-' }}
                                                        </td>
                                                        <td>{{ $data->e_np ?? '-' }}</td>
                                                        <td>{{ $data->nama_negeri ?? '-' }}</td>
                                                        <td>{{ $data->date ?? '-' }}</td>

                                                        {{-- <td>-</td> --}}
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
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
@endsection
