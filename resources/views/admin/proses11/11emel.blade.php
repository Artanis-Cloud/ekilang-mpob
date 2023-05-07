@extends('layouts.main')
<style>
    .dataTables_filter, .dataTables_info { display: none; }
</style>
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

            <div class="card" style="margin-right:2%; margin-left:2%">


                <div class="card-body">
                    <div class="row" style="">
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>
                    </div>
                    <div class="pl-3">

                        <div class=" text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 id="title" style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Emel Pertanyaan /
                                Pindaan / Cadangan</h3>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>


                        <section class="section">
                            <div class="card">
                                <form action="{{ route('admin.6papar.buah.form') }}" method="post">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="exampleEmel" class="table table-striped table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Bil.</th>
                                                    <th>Nama Pelesen</th>
                                                    <th>No Lesen</th>
                                                    <th>Kategori</th>
                                                    <th>Tarikh</th>
                                                    <th>Tindakan</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th>Bil.</th>
                                                    <th>Nama Pelesen</th>
                                                    <th>No Lesen</th>
                                                    <th>Kategori</th>
                                                    <th>Tarikh</th>
                                                    <th>Tindakan</th>

                                                </tr>
                                            </tfoot>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($listemel as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->FromName }}</td>
                                                        <td>{{ $data->FromLicense }}</td>
                                                        <td>{{ $data->Category }}</td>
                                                        <td>{{ date("d-m-Y H:i:s", strtotime($data->Date)) }}</td>
                                                        <td>
                                                            <div class="btn">
                                                                <a
                                                                    href="{{ route('admin.11paparemel', [$data->MsgID]) }}">
                                                                    <i class="fa fa-eye"
                                                                        style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                            {{-- <button class="btn" style="margin-left:5%" ><a href="{{ route('admin.11paparemel') }} "><i class="fa fa-eye"  style="font-size:18px"></i></a></button> --}}
                                                            {{-- <button class="btn" onclick=setPrintedPage('11paparemel.blade.php')
                                                                    value="print"><i class="fa fa-download"
                                                                        style="font-size:18px"></i></button> --}}
                                                            <div class="btn">
                                                                <a
                                                                    href="{{ route('admin.11papar_cetak', [$data->MsgID]) }}">
                                                                    <i class="fa fa-download"
                                                                        style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                            @if($data->file_upload)

                                                                <div class="btn">
                                                                    <a
                                                                        target='_blank' href="{{ asset('storage/'.$data->file_upload) }}" >
                                                                        <i class="fa fa-paperclip"
                                                                            style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            @else
                                                            @endif
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

    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#exampleEmel tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
        var table = $('#exampleEmel').DataTable({

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

                    filename: 'Senarai Emel Pertanyaan / Pindaan / Cadangan',



                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                    pageSize: 'TABLOID',
                    className: "prodpdf",

                    exportOptions: {
                        columns: [0,1,2,3,4]
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

                    filename: 'Senarai Emel Pertanyaan / Pindaan / Cadangan',

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
