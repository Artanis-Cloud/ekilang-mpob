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
                    <h4 class="page-title">Papar Penyata</h4>
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
            <div class="tab" style="margin-left:2%">
                {{-- <button class="tablinks" onclick="openInit(event, 'All')" id="defaultOpen">Penyata Bulanan
                Terkini</button> --}}
                <a style="color:black; border-radius:unset; font-size:14px; background-color:rgb(255, 255, 255)"
                    class="btn btn-work tablinks" onclick="openInit(event, 'All')" id="defaultOpen">Penyata Bulanan
                    Terkini</a>
                {{-- <button class="tablinks" onclick="openInit(event, 'One')"> --}}
                <a href="{{ route('admin.5penyatabelumhantarpenapis') }}"
                    style="color:black; border-radius:unset; font-size:14px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'One')">Penyata Bulanan Belum Hantar</a>
                {{-- </button> --}}

            </div>
            <div class="card" style="margin-right:2%; margin-left:2%">

                <div id="All" class="tabcontent">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                            <div class=" dropdown">
                                <button class="btn btn-secondary dropdown-toggle"
                                    style="background-color: rgb(238, 70, 70); margin-right:20px" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Kilang Penapis
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if (auth()->user()->sub_cat)
                                        @foreach (json_decode(auth()->user()->sub_cat) as $cat)

                                            @if ($cat == 'PL91')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakbuah') }}">Kilang
                                                    Buah</a>
                                            @endif
                                            @if ($cat == 'PL101')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakpenapis') }}">Kilang
                                                    Penapis</a>
                                            @endif
                                            @if ($cat == 'PL102')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakisirung') }}">Kilang
                                                    Isirung</a>
                                            @endif
                                            @if ($cat == 'PL104')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakoleo') }}">Kilang
                                                    Oleokimia</a>
                                            @endif
                                            @if ($cat == 'PL111')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetaksimpanan') }}">Pusat
                                                    Simpanan</a>
                                            @endif
                                            @if ($cat == 'PLBIO')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakbio') }}">Kilang
                                                    Biodiesel</a>
                                            @endif
                                        @endforeach
                                    @else
                                        <a class="dropdown-item"
                                            href="{{ route('admin.6penyatapaparcetakbuah') }}">Kilang
                                            Buah</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.6penyatapaparcetakpenapis') }}">Kilang
                                            Penapis</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.6penyatapaparcetakisirung') }}">Kilang
                                            Isirung</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.6penyatapaparcetakoleo') }}">Kilang
                                            Oleokimia</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.6penyatapaparcetaksimpanan') }}">Pusat
                                            Simpanan</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.6penyatapaparcetakbio') }}">Kilang
                                            Biodiesel</a>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="pl-3">

                            <div class=" text-center">
                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Penyata Bulanan Kilang Penapis - MPOB(EL) RF 4</h3>

                                <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Senarai Penyata untuk
                                    Paparan dan Cetakan</h5>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <hr>


                            <section class="section">
                                <div class="card">
                                    <form action="{{ route('admin.6papar.penapis.form') }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="example" class="table table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar?</th>
                                                        {{-- <th>Sudah Cetak?<br></th> --}}
                                                        <th>No. Lesen<br></th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>Email Pegawai</th>
                                                        <th>No. Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar?</th>
                                                        {{-- <th>Sudah Cetak?<br></th> --}}
                                                        <th>No. Lesen<br></th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>Email Pegawai</th>
                                                        <th>No. Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"
                                                                    value="{{ $data->e101_reg }}">&nbspYa
                                                            </td>
                                                            {{-- <td>
                                                                x
                                                            </td> --}}
                                                            <td>
                                                                {{-- <a href="#"> --}}
                                                                {{ $data->e_nl }}
                                                            </td>
                                                            <td>{{ $data->e_np ?? '-' }}</td>
                                                            <td>{{ $data->kodpgw }}</td>

                                                            <td>{{ $data->e_email ?? '-' }}</td>
                                                            <td>{{ $data->nosiri }}</td>

                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                <button type="submit" class="btn btn-primary ">Papar</button>



                                            </div>
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
    <script>
        function openInit(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
@endsection
