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
                <a href="{{ route('admin.6penyatapaparcetakbio') }}"
                    style="color:black; border-radius:unset; font-size:12px;" class="btn btn-work tablinks"
                    onclick="openInit(event, 'All')">Penyata Bulanan
                    Telah Dihantar</a>
                <a style="color:black;; border-radius:unset; font-size:12px; margin-left:-1%; background-color:rgb(255, 255, 255)"
                    class="btn btn-work tablinks" onclick="openInit(event, 'One')" id="defaultOpen">Penyata Bulanan
                    Belum Hantar</a>
                <a href="{{ route('admin.5penyatakemaskinibio') }}"
                style="color:black; border-radius:unset; font-size:12px; margin-left:-0.315rem;"
                class="btn btn-work tablinks" onclick="openInit(event, 'BioTab')">Kemaskini Penyata Biodiesel</a>

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
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Biodiesel - MPOB(EL)  <br> </h3>
                                    <h5 style="color: rgb(39, 80, 71); ">Senarai Penyata Bulanan Kilang Biodiesel Belum Dihantar Sehingga Tarikh</h5>

                                    <div id="title">
                                        <div class="noScreenPelesen">Senarai Penyata Bulanan Kilang Biodiesel Belum Dihantar Sehingga Tarikh</div>
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
                                        {{-- <form action="{{ route('admin.6papar.buah.form') }}" method="post">
                                            @csrf --}}
                                            <div class=" dropdown">
                                                <button class="btn btn-secondary dropdown-toggle"
                                                    style="background-color: rgb(238, 70, 70); margin-right:20px" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Kilang Biodiesel
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
                                                    {{--
                                                        {{--
                                                <button style="font-size:14px; background-color:#265960;color: white; border: 0px; float: right; border-radius: 2px; padding:7px 35px;"
                                                onclick="exportTableToCSV('Senarai Penyata Belum Hantar Kilang Biodiesel.csv')">Excel <i class="fa fa-file-excel" style="color: #fff"></i></button> --}}

                                            </div><br>
                                            <form action="{{ route('admin.5papar.bio.form') }}" id="tickform" method="post">
                                                @csrf
                                            <div class="table-responsive" id="example2">
                                                <div id="tblData">
                                                <table id="example10" class="table table-bordered"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr style="background-color: #e9ecefbd">
                                                            {{-- <th>Bil</th> --}}
                                                            <th style="width:7%; vertical-align: middle">Papar?
                                                                <input name="select-all" id="select-all" type="checkbox"
                                                                value=""></th>
                                                            <th>No. Lesen<br></th>
                                                            <th>Nama Premis</th>
                                                            {{-- <th>Kod Pegawai</th> --}}
                                                            <th>Emel Pegawai</th>
                                                            <th>No. Telefon Kilang</th>

                                                            {{-- <th>No. Siri</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr style="background-color: #e9ecefbd">
                                                            <th style="width: 7%">Papar?</th>
                                                            <th>No. Lesen<br></th>
                                                            <th>Nama Premis</th>
                                                            {{-- <th>Kod Pegawai</th> --}}
                                                            <th>Emel Pegawai</th>
                                                            <th>No. Telefon Kilang</th>
                                                            {{-- <th>No. Siri</th> --}}
                                                        </tr>
                                                    </tfoot>
                                                    <tbody style="word-break: break-word; font-size:12px">
                                                         @foreach ($users as $data)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <input name="papar_ya[]" type="checkbox" id="checkbox-1"
                                                                        value="{{ $data->ebio_reg }}">&nbspYa
                                                                </td>


                                                                <td>{{ $data->e_nl ?? '-' }}</td>
                                                                <td style="text-transform:uppercase">{{ $data->e_np ?? '-' }}</td>
                                                                {{-- <td>{{ $data->kodpgw }}</td> --}}

                                                                <td>{{ $data->e_email ?? '-' }}</td>
                                                                <td>{{ $data->e_notel ?? '-' }}</td>
                                                                {{-- <td>{{ $data->nosiri }}</td> --}}



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
    <script>
        $(function(){

        var requiredCheckboxes = $(':checkbox[required]');

        requiredCheckboxes.change(function(){

            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            }

            else {
                requiredCheckboxes.attr('required', 'required');
            }
        });

        });
    </script>

<script>
    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example2 tfoot th').each(function () {
        var title = $(this).text();
        console.log(title);
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
    var table = $('#example10').DataTable({

        initComplete: function () {

        // Apply the search
        this.api()
            .columns()
            .every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        },
        dom: 'Bfrtip',


            buttons:
            [

                'pageLength',
                {


                    extend: 'excel',
                    text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
                    className: "fred",

                    title: function(doc) {
                        return $('#title').text()
                    },

                    customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var style = xlsx.xl['styles.xml'];
                    $( 'row c', sheet ).attr( 's', '25' );
                    $('xf', style).find("alignment[horizontal='center']").attr("wrapText", "1");
                    $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
                    },

                    filename: 'Penyata Belum Hantar Kilang Biodiesel',

                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',

                    className: "prodpdf",

                    exportOptions: {
                        columns: [1,2,3,4]
                    },

                    title: function(doc) {
                            return $('#title').text()
                            },
                    customize: function (doc) {
                        let table = doc.content[1].table.body;
                        for (i = 1; i < table.length; i++) // skip table header row (i = 0)
                        {
                            var test = table[i][0];
                        }

                    },
                    customize: function(doc) {
                    doc.content[1].table.body[0].forEach(function(h) {
                        h.fillColor = '#0a7569';
                    });
                    },

                    filename: 'Penyata Belum Hantar Kilang Biodiesel',
                },
            ],
            "language":
            {
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
