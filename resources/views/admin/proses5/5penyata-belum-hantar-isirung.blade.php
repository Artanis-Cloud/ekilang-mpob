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
                <a href="{{ route('admin.6penyatapaparcetakisirung') }}"
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
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>

                        </div>
                            <div class="pl-3">

                                <div class="row">

                                    <div class=" dropdown">
                                        <button class="btn btn-secondary dropdown-toggle"
                                            style="background-color: rgb(238, 70, 70); margin-right:20px" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Kilang Isirung
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if (auth()->user()->sub_cat)
                                                @foreach (json_decode(auth()->user()->sub_cat) as $cat)

                                                    @if ($cat == 'PL91')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.5penyatabelumhantarbuah') }}">Kilang
                                                            Buah</a>
                                                    @endif
                                                    @if ($cat == 'PL101')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.5penyatabelumhantarpenapis') }}">Kilang
                                                            Penapis</a>
                                                    @endif
                                                    @if ($cat == 'PL102')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.5penyatabelumhantarisirung') }}">Kilang
                                                            Isirung</a>
                                                    @endif
                                                    @if ($cat == 'PL104')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.5penyatabelumhantaroleo') }}">Kilang
                                                            Oleokimia</a>
                                                    @endif
                                                    @if ($cat == 'PL111')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.5penyatabelumhantarsimpanan') }}">Pusat
                                                            Simpanan</a>
                                                    @endif
                                                    @if ($cat == 'PLBIO')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.5penyatabelumhantarbio') }}">Kilang
                                                            Biodiesel</a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.5penyatabelumhantarbuah') }}">Kilang
                                                    Buah</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.5penyatabelumhantarpenapis') }}">Kilang
                                                    Penapis</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.5penyatabelumhantarisirung') }}">Kilang
                                                    Isirung</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.5penyatabelumhantaroleo') }}">Kilang
                                                    Oleokimia</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.5penyatabelumhantarsimpanan') }}">Pusat
                                                    Simpanan</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.5penyatabelumhantarbio') }}">Kilang
                                                    Biodiesel</a>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="col-md-8 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}

                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Penyata Bulanan Kilang Isirung -
                                            MPOB(EL) CF 4</h3>
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
                                    <div class="text-right col-md-2">
                                        <button style="font-size:12px"
                                        onclick="exportTableToCSV('Senarai Penyata Belum Hantar Kilang Isirung.csv')">Excel <i class="fa fa-file-excel" style="color: #319f57"></i></button>

                                    </div>
                                </div>

                                <hr>


                                <section class="section">
                                    <div class="card">
                                        {{-- <form action="{{ route('admin.5papar.belum.isirung.form') }}" method="post">
                                            @csrf --}}
                                            <div class="table-responsive">
                                                <div id="tblData">
                                                <table id="example" class="table table-bordered"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr style="background-color: #e9ecefbd">
                                                            {{-- <th>Bil</th> --}}
                                                            <th>No. Lesen<br></th>
                                                            <th>Nama Premis</th>
                                                            <th>Kod Pegawai</th>
                                                            <th>Email Pegawai</th>
                                                            <th>No. Siri</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr style="background-color: #e9ecefbd">
                                                            {{-- <th>Bil</th> --}}
                                                            <th>No. Lesen<br></th>
                                                            <th>Nama Premis</th>
                                                            <th>Kod Pegawai</th>
                                                            <th>Email Pegawai</th>
                                                            <th>No. Siri</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody style="word-break: break-word; font-size:12px">
                                                        @foreach ($users as $data)
                                                            <tr>
                                                                {{-- <td>{{ $loop->iteration }}</td> --}}
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
    <script>
        //user-defined function to download CSV file
        function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;

            //define the file type to text/csv
            csvFile = new Blob([csv], {type: 'text/csv'});
            downloadLink = document.createElement("a");
            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = "none";

            document.body.appendChild(downloadLink);
            downloadLink.click();
        }

        //user-defined function to export the data to CSV file format
        function exportTableToCSV(filename) {
        //declare a JavaScript variable of array type
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        //merge the whole data in tabular form
        for(var i=0; i<rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");
            for( var j=0; j<cols.length; j++)
            row.push(cols[j].innerText);
            csv.push(row.join(","));
        }
        //call the function to download the CSV file
        downloadCSV(csv.join("\n"), filename);
        }
    </script>
@endsection
