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
                <div class="col-12 align-self-center">
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
                <div class="col-7 align-self-center" id="breadcrumb">
                    <div class="d-flex align-items-center justify-content-end">

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
                                    <h3 id="title" style="color: rgb(39, 80, 71); margin-bottom:1%">Pengumuman</h3>
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}

                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                <section class="section">
                                    <div class="card">
                                        {{-- <form action="{{ route('admin.6papar.buah.form') }}" method="post">
                                            @csrf --}}
                                            <div class="row" style=" float:left">

                                                <div class="text-left col-md-8">
                                                    <a href="{{ route('admin.tambahpengumuman') }}" class="btn btn-primary ">
                                                        Tambah Pengumuman
                                                    </a>

                                                </div>
                                            </div>
                                        <br>
                                            <div class="table-responsive">
                                                <table id="examplePengumuman" class="table table-striped table-bordered"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align:center">Bil</th>
                                                            <th style="text-align:center">Mesej<br></th>
                                                            <th style="text-align:center">Tarikh Mula<br></th>
                                                            <th style="text-align:center">Tarikh Akhir</th>
                                                            <th style="text-align:center">Icon New</th>
                                                            <th style="text-align:center">Tindakan</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody style="word-break: break-word; font-size:12px">
                                                        @foreach($pengumuman as $data)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td style="width: 60%">
                                                                {{-- {{$data->Message}} --}}
                                                                {!! $data->Message !!}
                                                            </td>
                                                            <td  style="text-align:center">
                                                                {{$data->Start_date}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$data->End_date}}
                                                            </td>
                                                            <td class="text-center">
                                                                {{$data->Icon_new}}
                                                            </td>
                                                            <td >
                                                                <div class="icon" style="text-align: center" >
                                                                <a href="{{ route('admin.editpengumuman',[$data->Id]) }}">
                                                                    <i class="fas fa-edit fa-lg" style="color: #228c1c" >
                                                                    </i>
                                                                </a>
                                                                </div>
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
    $('#examplePengumuman tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
        var table = $('#examplePengumuman').DataTable({

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

                    filename: 'Senarai Pengumuman',



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

                    filename: 'Senarai Pengumuman',

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
