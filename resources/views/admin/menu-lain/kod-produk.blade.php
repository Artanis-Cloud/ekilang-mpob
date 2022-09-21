@extends($layout)


@section('content')

    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px; margin-left: 2%">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Kod & Nama Produk</h4>
                        </div>
                        <div class="col-7 align-self-center" style="margin-left:-1%;">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}"
                                                        style="color: black !important;"
                                                        onMouseOver="this.style.color='#25877b'"
                                                        onMouseOut="this.style.color='black'">
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
                        <div class="row" style="padding: 10px; background-color: white; margin-right:2%; margin-left:1%">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>

                        <section class="section">

                            <div class="card">
                                <div class="card-body">

                                    <body>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                                        </p>
                                        {{-- <title>PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4</title> --}}
                                        <p align="center"><b>
                                            <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB) </font><br>

                                            <font size="4">Senarai Kod dan Nama Produk Sawit</font></b>

                                        </p>

                                    </body>

                                    {{-- <div class="row " style=" float:left">
                                        <div class="text-left col-md-1">
                                            <a href="{{ asset('manual/admin/Kod dan Nama Produk.pdf') }}" class="btn btn-primary ">
                                                PDF
                                            </a>
                                        </div>
                                        <div class="text-left col-md-4" style="margin-left: 25%">
                                            <a href="{{ asset('manual/admin/Kod dan Nama Produk.xlsx') }}" class="btn btn-primary ">
                                                EXCEL
                                            </a>
                                        </div>
                                    </div><br><br> --}}

                                    <div class="table-responsive" id="printableArea">

                                        <div class="noPrint">
                                            <button class="dt-button buttons-excel buttons-html5" onclick="Export()"
                                                style="background-color:white; color: #f90a0a; " >
                                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                            </button>
                                            <button class="dt-button buttons-excel buttons-html5"  onclick="ExportToExcel('example22')"
                                                style="background-color: white; color: #0a7569; ">
                                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                                            </button>
                                        </div>
                                        <table id="example22" class="table table-striped table-bordered" style="width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>Kod Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Kumpulan Produk</th>
                                                    <th>Nama Panjang Produk</th>

                                                </tr>
                                            </thead>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($produk as $data)
                                                    <tr>
                                                        <td>
                                                            {{ $data->prodid }}
                                                        </td>
                                                        <td>
                                                            {{ $data->prodname }}
                                                        </td>
                                                        <td>
                                                            {{ $data->prodcat }}
                                                        </td>
                                                        <td>
                                                            {{ $data->proddesc }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                    </div>
                                </div>
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
    <script>
        $(document).ready(function() {
            $('#example22').DataTable({
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
    function Export() {
        var sTable = document.getElementById('printableArea').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>

    <script>
        function ExportToExcel()
        {
            var filename = "Laporan Ringkasan Bahagian 1"
            var tab_text = "<table border='2px'><tr bgcolor=''>";
            var textRange;
            var j = 0;
            tab = document.getElementById('example22');

            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                console.log(tab.rows[j].innerHTML);
            }

            tab_text = tab_text + "</table>";
            var a = document.createElement('a');
            var data_type = 'data:application/vnd.ms-excel';
            a.href = data_type + ', ' + encodeURIComponent(tab_text);
            a.download = filename + '.xls';
            a.click();
        }
    </script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <link  href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"rel="stylesheet" >

@endsection
