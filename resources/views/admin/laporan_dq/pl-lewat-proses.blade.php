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
                                <h3 id="title" style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Penerimaan PL
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
                                <div class="table-responsive" id="examplepl2">
                                    <table id="examplepl" class="table table-bordered text-center" style="width: 100%;">
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

    <script>

        $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#examplepl2 tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });

        // DataTable
            var table = $('#examplepl').DataTable({

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

                        filename: 'Senarai Penerimaan PL',



                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                        pageSize: 'TABLOID',
                        className: "prodpdf",

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

                        filename: 'Senarai Penerimaan PL',

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
@endsection
