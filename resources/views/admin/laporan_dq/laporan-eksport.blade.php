@extends('layouts.main')

@section('content')
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
                    <h4 class="page-title">Laporan Biodiesel
                    </h4>
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
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-1%; margin-bottom:1%">L E M B A G A &nbsp; M I N Y
                                A K &nbsp; S A W I T &nbsp; M A L A Y S I A (MPOB)
                            </h3>
                            <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Penyata Bulanan</h4>
                            <h6 id="title" style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Eksport Produk Biodiesel</h6>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">{{ $tahun2 }}</h6>
                        </div>
                        {{-- <hr> --}}
                        {{-- <form action="{{ route('admin.validasi.stok.akhir.proses') }}" method="get">
                            @csrf
                            <div class="card-body">

                                <div class="container center">




                        </form> --}}
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg" id="eksport">
                                    <thead>
                                        <tr style="background-color: #d3d3d34d">
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Bil.</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Nama Pemegang Lesen</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                colspan="13">{{ $tahun2 }}</th>
                                        </tr>
                                        <tr style="background-color: #d3d3d34d">
                                            @if ($bulan == null)
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jan
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Feb
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mac
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Apr
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Mei
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jun
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Jul
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Ogos
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Sept
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Okt
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Nov
                                                </th>
                                                <th scope="col" style="vertical-align: middle; text-align:center">Dis
                                                </th>
                                            @elseif ($bulan == 'between')
                                                @for ($i = $start_month; $i <= $end_month; $i++)
                                                    @php
                                                        $total_bulan[$i] = 0;
                                                    @endphp
                                                    @if ($i == '1')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Jan
                                                        </th>
                                                    @elseif($i == '2')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Feb
                                                        </th>
                                                    @elseif($i == '3')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Mac
                                                        </th>
                                                    @elseif($i == '4')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Apr
                                                        </th>
                                                    @elseif($i == '5')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Mei
                                                        </th>
                                                    @elseif($i == '6')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Jun
                                                        </th>
                                                    @elseif($i == '7')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Jul
                                                        </th>
                                                    @elseif($i == '8')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">
                                                            Ogos</th>
                                                    @elseif($i == '9')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">
                                                            Sept</th>
                                                    @elseif($i == '10')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Okt
                                                        </th>
                                                    @elseif($i == '11')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Nov
                                                        </th>
                                                    @elseif($i == '12')
                                                        <th scope="col"
                                                            style="vertical-align: middle; text-align:center">Dis
                                                        </th>
                                                    @endif
                                                @endfor
                                            @else
                                            @if ($bulan2 == '01')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Jan
                                                    </th>
                                                @elseif($bulan2 == '02')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Feb
                                                    </th>
                                                @elseif($bulan2 == '03')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Mac
                                                    </th>
                                                @elseif($bulan2 == '04')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Apr
                                                    </th>
                                                @elseif($bulan2 == '05')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Mei
                                                    </th>
                                                @elseif($bulan2 == '06')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Jun
                                                    </th>
                                                @elseif($bulan2 == '07')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Jul
                                                    </th>
                                                @elseif($bulan2 == '08')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Ogos</th>
                                                @elseif($bulan2 == '09')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Sept</th>
                                                @elseif($bulan2 == '10')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Okt
                                                    </th>
                                                @elseif($bulan2 == '11')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Nov
                                                    </th>
                                                @elseif($bulan2 == '12')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Dis
                                                    </th>
                                                @endif
                                            @endif
                                            <th scope="col" style="vertical-align: middle; text-align:center">
                                                <b>Jumlah</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($eksport)
                                        {{-- {{ dd($bulan == null) }} --}}
                                            @if ($bulan == null)
                                                @foreach ($eksport as $data)
                                                    @php
                                                        $total_bulan = 0;
                                                        $jumlah = 0;
                                                    @endphp
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>

                                                        @if ($data->ebio_bln == '01' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '02' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td
                                                                style="text-align: right">{{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                            @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '03' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '04' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '05' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '06' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '07' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '08' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '09' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '10' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '11' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        @if ($data->ebio_bln == '12' && $data->ebio_c9 != 0)
                                                            @php
                                                                $total_bulan += $data->ebio_c9;
                                                            @endphp
                                                            <td style="text-align: right">
                                                                {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                        @else
                                                            <td>0.00</td>
                                                        @endif
                                                        <td><b>{{ number_format($total_bulan ?? 0, 2) }}</b></td>

                                                    </tr>
                                                @endforeach
                                            @elseif ($bulan == 'between')
                                            {{-- {{ dd($eksport) }} --}}
                                                @foreach ($eksport as $key => $data)
                                                @php
                                                $total_bulan[$i] = 0;
                                                @endphp
                                                    <tr class="text-right">
                                                        <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                        <td scope="row" class="text-left">{{ $data->e_np }}</td>

                                                        @for ($i = $start_month; $i <= $end_month; $i++)
                                                            @if ($data->ebio_bln == $i && $data->ebio_c9 != 0)
                                                                @php
                                                                    $total_bulan[$i] += $data->ebio_c9;
                                                                @endphp
                                                                <td>{{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                            @else
                                                                <td>0.00</td>
                                                            @endif


                                                        @endfor
                                                        @php
                                                                $jumlah = $total_bulan[$i];
                                                                // {{ dd( $jumlah); }}
                                                        @endphp

                                                        <td><b>{{ number_format( $jumlah ?? 0, 2) }}</b></td>

                                                    </tr>
                                                @endforeach
                                                @else
                                                @foreach ($eksport as $data)
                                                @php
                                                    $total_bulan = 0;
                                                    $jumlah = 0;
                                                @endphp
                                                <tr class="text-right">
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_np }}</td>

                                                    @if ($data->ebio_bln == '01' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '02' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td
                                                            style="text-align: right">{{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '03' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '04' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '05' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '06' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '07' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '08' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '09' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '10' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '11' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @elseif ($data->ebio_bln == '12' && $data->ebio_c9 != 0)
                                                        @php
                                                            $total_bulan += $data->ebio_c9;
                                                        @endphp
                                                        <td style="text-align: right">
                                                            {{ number_format($data->ebio_c9 ?? 0, 2) }}</td>
                                                    @else
                                                        <td>0.00</td>
                                                    @endif
                                                    <td><b>{{ number_format($total_bulan ?? 0, 2) }}</b></td>

                                                </tr>
                                            @endforeach
                                            @endif
                                        @endif
                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <br>






                    </div>
                    <div class="col-12 mb-4 mt-4" style="margin-left:47%">
                        <a href="{{ route('admin.laporan.tahunan') }}" type="button"
                            class="btn btn-primary">Kembali</a>
                    </div>


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
    $('#eksport tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
        var table = $('#eksport').DataTable({

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
                    $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
                    },

                    filename: 'Laporan Eksport Produk Biodiesel',



                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                    pageSize: 'TABLOID',
                    className: "prodpdf",

                    title: function(doc) {
                            return $('#title').text()
                            },


                    filename: 'Laporan Eksport Produk Biodiesel',

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
            $('#eksport').DataTable({
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
                "columnDefs": [{
                    'targets': [0, 7, 8],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }]

            });
        });
    </script> --}}
    {{-- <script>
        $(function() {
              $("select").each(function (index, element) {
                       const val = $(this).data('value');
                       if(val !== '') {
                           $(this).val(val);
                       }
               });
        })
       </script> --}}
@endsection
