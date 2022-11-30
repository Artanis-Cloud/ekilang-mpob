@extends($layout)


@section('content')

<style>
    button.prodex {
        /* border-color: #25877b !important; */
        color: #0a7569 !important;
        }
    button.prodpdf {
    /* border-color: #25877b !important; */
    color: #f90a0a !important;
    }
</style>
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

                                            <font id="title" size="4">Senarai Kod dan Nama Produk Sawit</font></b>

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


                                        <table id="example4" class="table table-striped table-bordered" style="width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>Kod Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Kumpulan Produk</th>
                                                    <th>Nama Panjang Produk</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Kod Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Kumpulan Produk</th>
                                                    <th>Nama Panjang Produk</th>

                                                </tr>
                                            </tfoot>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($produk as $data)
                                                    <tr>
                                                        <td class="text-left">
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

    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example4 tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
        var table = $('#example4').DataTable({

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

            buttons: [

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

                    filename: 'Senarai Kod dan Nama Produk Sawit',



                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                    pageSize: 'TABLOID',
                    className: "prodpdf",

                    exportOptions: {
                        columns: [0,1,2,3]
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

                        doc.content[1].margin = [ 170, 0, 100, 0 ] //left, top, right, bottom
                    doc.content[1].table.body[0].forEach(function(h) {
                        h.fillColor = '#0a7569';

                    });
                    },

                    filename: 'Senarai Kod dan Nama Produk Sawit',

                },
            ],
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
    {{-- <script>
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
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            $('#example4').DataTable( {
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
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
                        title: "Senarai Kod dan Nama Produk Sawit",
                        className: "prodex",
                        customize: function( xlsx ) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];

                            $('row c[r^="A"]', sheet).attr( 's', '50' );
                            $('row c[r^="B"]', sheet).attr( 's', '50' );
                            $('row c[r^="C"]', sheet).attr( 's', '50' );
                            $('row c[r^="D"]', sheet).attr( 's', '50' );
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                        title: "Senarai Kod dan Nama Produk Sawit",
                        className: "prodpdf",
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
                        }
                    },
                ]

            } );
        } );
    </script> --}}

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
