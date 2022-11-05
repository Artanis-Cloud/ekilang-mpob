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
                        <div class="row" >
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                            <div class="pl-3">

                                <div class=" text-center">
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Pembeli</h3>
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}

                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                <section class="section">
                                    <div class="card">

                                        <div class="row" style=" float:left">

                                            <div class="text-left col-md-8 mb-4">
                                                <a href="#" data-toggle="modal" class="btn btn-primary "
                                                data-target="#modaladd">
                                                    Tambah Pembeli
                                                </a>

                                            </div>

                                            <div class="table-responsive">
                                                <table id="example22" class="table table-striped table-bordered"
                                                    style="width: 100%; ">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align:center">Bil</th>
                                                            <th style="text-align:center">Nama Syarikat<br></th>
                                                            <th style="text-align:center">Tindakan</th>


                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th style="text-align:center">Bil</th>
                                                            <th style="text-align:center">Nama Syarikat<br></th>
                                                            <th style="text-align:center">Tindakan</th>


                                                        </tr>
                                                    </tfoot>
                                                    <tbody style="word-break: break-word; font-size:12px">
                                                        @foreach($pembeli as $data)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $data->id }}
                                                            </td>

                                                            <td  style="text-align:center">
                                                                {{$data->pembeli}}
                                                            </td>
                                                            <td>
                                                                <div class="icon" style="text-align: center">
                                                                    <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#modal{{ $data->id }}">
                                                                        <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        {{-- <div class="col-md-6 col-12"> --}}

                                                            <div class="modal fade" id="modal{{ $data->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalScrollableTitle">
                                                                                Kemaskini Maklumat Pentadbir</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <i data-feather="x"></i>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">


                                                                            <form
                                                                                action="{{ route('admin.edit.pembeli', [$data->id]) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <div class="modal-body">
                                                                                    <label>Nama Syarikat </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text" name='pembeli'
                                                                                            class="form-control"
                                                                                            value="{{ $data->pembeli }}">
                                                                                    </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light-secondary"
                                                                                        data-dismiss="modal">
                                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- </div> --}}
                                                        @endforeach

                                                        <div class="col-md-6 col-12">

                                                            <div class="modal fade" id="modaladd" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalScrollableTitle">
                                                                                Kemaskini Maklumat Pentadbir</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <i data-feather="x"></i>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">


                                                                            <form
                                                                                action="{{ route('admin.tambahpembeli.proses') }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <div class="modal-body">
                                                                                    <label>Nama Syarikat </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text" name='pembeli'
                                                                                            class="form-control" placeholder="Sila Isi Nama Syarikat"
                                                                                            value="">
                                                                                    </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light-secondary"
                                                                                        data-dismiss="modal">
                                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                                        <span class="d-none d-sm-block">Tambah</span>
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

    </div>
@endsection

@section('scripts')
<script>

    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example22 tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
        var table = $('#example22').DataTable({

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

                    filename: 'Penyata Bulan',



                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                    pageSize: 'TABLOID',
                    className: "prodpdf",

                    exportOptions: {
                        columns: [1,2,3,4,5,6,7]
                    },
                    title: function(doc) {
                            return $('#title').text() + $ ('#tarikh').text()
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

                    filename: 'Penyata Bulan',

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
