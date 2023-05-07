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
        <div class="page-breadcrumb mt-2">

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


        <div class="container-fluid">
            <div class="tab" style=" margin-left:2%">
                <a href="{{ route('admin.6penyatapaparcetakoleo') }}"
                    style="color:black; border-radius:unset; font-size:12px;" class="btn btn-work tablinks"
                    onclick="openInit(event, 'All')">Penyata Bulanan
                    Telah Dihantar</a>
                <a style="color:black;; border-radius:unset; font-size:12px; margin-left:-1%; background-color:rgb(255, 255, 255)"
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
                                <div class=" text-center">
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Kilang Oleokimia - MPOB(EL) CM 4 <br> </h3>
                                    <h5 style="color: rgb(39, 80, 71); ">Senarai Penyata Bulanan Kilang Oleokimia Belum Dihantar Sehingga Tarikh</h5>

                                    <div id="title">
                                        <div class="noScreenPelesen">Senarai Penyata Bulanan Kilang Oleokimia Belum Dihantar Sehingga Tarikh</div>
                                        <p id="tarikh"><span id="datetime"></span></p>
                                    </div>

                                    <script>
                                        var dt = new Date();
                                        document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "/" + (("0" + (dt.getMonth() +
                                            1)).slice(-2)) + "/" + (dt.getFullYear());
                                    </script>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>

                                <hr>


                                <section class="section">
                                    <div class="card">
                                        <form action="{{ route('admin.5papar.belum.oleo.form') }}" id="tickform" method="post">
                                            @csrf
                                            <div class=" dropdown">
                                                <button class="btn btn-secondary dropdown-toggle"
                                                    style="background-color: rgb(238, 70, 70); margin-right:20px" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Kilang Oleokimia
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

                                                {{-- <button style="font-size:14px; background-color:#265960;color: white; border: 0px; float: right; border-radius: 2px; padding:7px 35px;"
                                                onclick="exportTableToCSV('Senarai Penyata Belum Hantar Kilang Oleokimia.csv')">Excel <i class="fa fa-file-excel" style="color: #fff"></i></button> --}}

                                            </div><br>
                                            <div class="table-responsive">
                                                <div id="tblData">
                                                    <table id="example5" class="table table-bordered"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr style="background-color: #e9ecefbd">

                                                            <th style="width:7%; vertical-align: middle">Papar?
                                                                <input name="select-all" id="select-all" type="checkbox"
                                                                value=""></th>
                                                            <th style=" vertical-align: middle">No. Lesen<br></th>
                                                            <th style=" vertical-align: middle">Nama Premis</th>
                                                            <th style=" vertical-align: middle">Kod Pegawai</th>
                                                            <th style=" vertical-align: middle">No. Siri</th>
                                                            <th style=" vertical-align: middle">Emel Pegawai</th>
                                                            <th style=" vertical-align: middle">No. Telefon Kilang</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr style="background-color: #e9ecefbd">
                                                            <th style="width: 7%">Papar?</th>
                                                            {{-- <th>Bil.</th> --}}
                                                            <th>No. Lesen<br></th>
                                                            <th>Nama Premis</th>
                                                            <th>Kod Pegawai</th>
                                                            <th>No. Siri</th>
                                                            <th>Emel Pegawai</th>
                                                            <th>No. Telefon Kilang</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody style="word-break: break-word; font-size:12px">
                                                        @foreach ($users as $data)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <input name="papar_ya[]" type="checkbox"  id="checkbox-1"
                                                                        value="{{ $data->e104_reg }}">&nbspYa
                                                                </td>
                                                                <td>{{ $data->e_nl ?? '-' }}</td>
                                                                <td style="text-transform:uppercase">{{ $data->e_np ?? '-' }}</td>
                                                                <td>{{ $data->kodpgw }}</td>
                                                                <td>{{ $data->nosiri }}</td>

                                                                <td>{{ $data->e_email ?? '-' }}</td>
                                                                <td>{{ $data->e_notel ?? '-' }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>

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

    </div>
@endsection

@section('scripts')
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

    <script type="text/javascript">
        $('#tickform').on("submit", function (e) {
            var arr = $(this).serialize().toString();
            if(arr.indexOf("papar_ya") < 0){
                e.preventDefault();
                toastr.error("Sila pilih sekurang-kurangnya satu pilihan untuk meneruskan");
            }
        });
    </script>

    <script>
        // Listen for click on toggle checkbox
        $('#select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection
