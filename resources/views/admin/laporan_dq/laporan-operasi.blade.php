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
                    <h4 class="page-title">Hebahan 10hb
                    </h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">e
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
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">L E M B A G A &nbsp; M I N Y
                                A K &nbsp; S A W I T &nbsp; M A L A Y S I A (MPOB)
                            </h3>
                            <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Penyata Bulanan</h4>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Kilang Beroperasi</h6>
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
                        {{-- <div class="col-12 mt-1 mb-2"><b><u>CPO</u></b></div> --}}

                        <!--JOHOR -->
                        {{-- <div class="col-11 mt-2 mb-2 ml-auto mr-auto" style="background-color:lightgrey"><b>JOHOR</b></div> --}}
                        <div class="row">
                            <div class="col-11 table-responsive m-t-20 ml-auto mr-auto">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr style="background-color: #d3d3d34d">
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Bil.</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Nama Pemegang Lesen</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Kapasiti Biodiesel</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                rowspan="2">Lokasi</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center"
                                                colspan="12">{{ $tahun2 }}</th>
                                        </tr>
                                        <tr style="background-color: #d3d3d34d">
                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                            @php
                                                $total_bulan[$i] = 0;
                                                $total_kapasiti[$i] = 0;
                                                $total_kapasiti_bio = 0;
                                            @endphp
                                                @if ($i == '1')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Jan
                                                    </th>
                                                @elseif($i == '2')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Feb
                                                    </th>
                                                @elseif($i == '3')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Mac
                                                    </th>
                                                @elseif($i == '4')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Apr
                                                    </th>
                                                @elseif($i == '5')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Mei
                                                    </th>
                                                @elseif($i == '6')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Jun
                                                    </th>
                                                @elseif($i == '7')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Jul
                                                    </th>
                                                @elseif($i == '8')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Ogos</th>
                                                @elseif($i == '9')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">
                                                        Sept</th>
                                                @elseif($i == '10')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Okt
                                                    </th>
                                                @elseif($i == '11')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Nov
                                                    </th>
                                                @elseif($i == '12')
                                                    <th scope="col" style="vertical-align: middle; text-align:center">Dis
                                                    </th>
                                                @endif
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($operasi as $key => $data)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $data->e_np }}</td>
                                                <td class="text-right">{{ number_format($data->kap_proses ?? 0,2) }}</td>

                                                @if ($data->e_negeri == '01')
                                                    <td class="text-left">JOHOR</td>
                                                @elseif ($data->e_negeri == '02')
                                                    <td class="text-left">KEDAH</td>
                                                @elseif ($data->e_negeri == '03')
                                                    <td class="text-left">KELANTAN</td>
                                                @elseif ($data->e_negeri == '04')
                                                    <td class="text-left">MELAKA</td>
                                                @elseif ($data->e_negeri == '05')
                                                    <td class="text-left">NEGERI SEMBILAN</td>
                                                @elseif ($data->e_negeri == '06')
                                                    <td class="text-left">PAHANG</td>
                                                @elseif ($data->e_negeri == '07')
                                                    <td class="text-left">PERAK</td>
                                                @elseif ($data->e_negeri == '08')
                                                    <td class="text-left">PERLIS</td>
                                                @elseif ($data->e_negeri == '09')
                                                    <td class="text-left">PULAU PINANG</td>
                                                @elseif ($data->e_negeri == '10')
                                                    <td class="text-left">SELANGOR</td>
                                                @elseif ($data->e_negeri == '11')
                                                    <td class="text-left">TERENGGANU</td>
                                                @elseif ($data->e_negeri == '12')
                                                    <td class="text-left">WILAYAH PERSEKUTUAN</td>
                                                @elseif ($data->e_negeri == '13')
                                                    <td class="text-left">SABAH</td>
                                                @elseif ($data->e_negeri == '14')
                                                    <td class="text-left">SARAWAK</td>
                                                @endif
                                                @for ($i = $start_month; $i <= $end_month; $i++)
                                                    @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                        @php
                                                            $total_bulan[$i] ++;
                                                            $total_kapasiti[$i] += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                @endfor
                                            </tr>
                                            @php
                                                $total_kapasiti_bio += $data->kap_proses;
                                            @endphp
                                        @endforeach

                                        <tr style="background-color: #d3d3d34d" class="font-weight-bold text-center">
                                            <th colspan="2"></th>
                                            <td style="text-align: right">
                                                {{ number_format($total_kapasiti_bio ?? 0,2) }}
                                            </td>
                                            <td></td>
                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                <td>{{ $total_bulan[$i] }}</td>
                                            @endfor
                                        </tr>
                                        <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                            <th colspan="2">Kapasiti Biodiesel</th>
                                            <td></td>
                                            <td></td>
                                            @for ($i = $start_month; $i <= $end_month; $i++)
                                                <td>{{ number_format($total_kapasiti[$i] ?? 0,2) }}</td>
                                            @endfor
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <br>






                    </div>
                    <div class="col-12 mb-4 mt-4" style="margin-left:47%">
                        <a href="{{ route('admin.laporan.tahunan') }}" type="button" class="btn btn-primary">Kembali</a>
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
                "columnDefs": [{
                    'targets': [0, 7, 8],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }]

            });
        });
    </script>
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
