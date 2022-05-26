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
            <div class="tab" style=" margin-left:2%">
                <a href="{{ route('admin.6penyatapaparcetakoleo') }}"
                    style="color:black; border-radius:unset; font-size:14px;" class="btn btn-work tablinks"
                    onclick="openInit(event, 'All')">Penyata Bulanan
                    Terkini</a>
                <a style="color:black;; border-radius:unset; font-size:14px; margin-left:-1%; background-color:rgb(255, 255, 255)"
                    class="btn btn-work tablinks" onclick="openInit(event, 'One')" id="defaultOpen">Penyata Bulanan
                    Belum Hantar</a>

            </div>

            <div class="card" style="margin-right:2%; margin-left:2%">

                <div id="One" class="tabcontent">


                    <div class="card-body">
                        <div class="row">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" style="background-color: rgb(238, 70, 70)"
                                 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Kilang Oleokimia
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ route('admin.5penyatabelumhantarbuah') }}">Kilang Buah</a>
                                  <a class="dropdown-item" href="{{ route('admin.5penyatabelumhantarpenapis') }}">Kilang Penapis</a>
                                  <a class="dropdown-item" href="{{ route('admin.5penyatabelumhantarisirung') }}">Kilang Isirung</a>
                                  <a class="dropdown-item" href="{{ route('admin.5penyatabelumhantarsimpanan') }}">Pusat Simpanan</a>
                                  <a class="dropdown-item" href="{{ route('admin.5penyatabelumhantarbio') }}">Kilang Biodiesel</a>
                                </div>
                            </div>
                        </div>
                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}

                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Penyata Bulanan Kilang Oleokimia - MPOB(EL) CM 4</h3>
                                    <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Senarai Penyata Belum
                                        Dihantar Sehingga Tarikh
                                        <p><span id="datetime"></span></p>
                                        <script>
                                            var dt = new Date();
                                            document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "/" + (("0" + (dt.getMonth() +
                                                1)).slice(-2)) + "/" + (dt.getFullYear());
                                        </script>
                                    </h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                <section class="section">
                                    <div class="card">
                                        {{-- <form action="{{ route('admin.5papar.belum.oleo.form') }}" method="post">
                                            @csrf --}}
                                            <div class="table-responsive">
                                                <div id="tblData">
                                                <table id="example" class="table table-striped table-bordered"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil</th>
                                                            <th>No. Lesen<br></th>
                                                            <th>Nama Premis</th>
                                                            <th>Kod Pegawai</th>
                                                            <th>Email Pegawai</th>
                                                            <th>No. Siri</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="word-break: break-word; font-size:12px">
                                                        @foreach ($users as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                {{-- <td>
                                                                x
                                                            </td> --}}

                                                                <td>{{ $data->e_nl ?? '-' }}</td>
                                                                <td>{{ $data->e_np ?? '-' }}</td>
                                                                <td>{{ $data->kodpgw }}</td>

                                                                <td>{{ $data->e_email ?? '-' }}</td>
                                                                <td>{{ $data->nosiri }}</td>



                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>
                                                <div class="text-left col-md-8">
                                                    <button class="btn btn-primary"
                                                    onclick="exportTableToExcel('tblData')">Excel</button>



                                                </div>
                                            </div>
                                        {{-- </form> --}}
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
    <script>
        function exportTableToExcel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'senarai-penyata-belum-hantar.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    </script>
@endsection
