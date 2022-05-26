@extends('layouts.main')

@section('content')
    </style>
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
                    <h4 class="page-title">Konfigurasi</h4>
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
                            <div class="pl-3">

                                <div class=" text-center">
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Pengumuman</h3>
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                 
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                <section class="section">
                                    <div class="card">
                                        {{-- <form action="{{ route('admin.6papar.buah.form') }}" method="post">
                                            @csrf --}}
                                            <div class="row" style=" float:left">

                                                <div class="text-left col-md-8">
                                                    <a href="{{ route('admin.tambahpengumuman') }}" class="btn btn-primary ">
                                                        Tambah Pengumuman
                                                    </a>

                                                </div>
                                        </div>
                                        <br>
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil</th>
                                                            <th>Mesej<br></th>
                                                            <th>Tarikh Mula<br></th>
                                                            <th>Tarikh Akhir</th>
                                                            <th>Icon New</th>
                                                            <th>Tindakan</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody style="word-break: break-word; font-size:12px">
                                                        @foreach($pengumuman as $data)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td >
                                                                {{-- {{$data->Message}} --}}
                                                                {!! $data->Message !!}
                                                            </td>
                                                            <td >
                                                                {{$data->Start_date}}
                                                            </td>
                                                            <td>
                                                                {{$data->End_date}}
                                                            </td>
                                                            <td class="text-center">
                                                                {{$data->Icon_new}}
                                                            </td>
                                                            <td >
                                                                <div class="icon" style="text-align: center" >
                                                                <a href="{{ route('admin.editpengumuman',[$data->Id]) }}">
                                                                    <i class="fas fa-edit fa-lg" style="color: #228c1c" >
                                                                    </i>
                                                                </a>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>
                                        </form>
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
    </script>

@endsection
