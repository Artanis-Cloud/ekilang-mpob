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
                                            <th scope="col" style="vertical-align: middle; text-align:center">Jan</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Feb</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Mac</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Apr</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Mei</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Jun</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Jul</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Ogos</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Sept</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Okt</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Nov</th>
                                            <th scope="col" style="vertical-align: middle; text-align:center">Dis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_kapasiti = 0;
                                            $bulan_1 = 0;
                                            $bulan_2 = 0;
                                            $bulan_3 = 0;
                                            $bulan_4 = 0;
                                            $bulan_5 = 0;
                                            $bulan_6 = 0;
                                            $bulan_7 = 0;
                                            $bulan_8 = 0;
                                            $bulan_9 = 0;
                                            $bulan_10 = 0;
                                            $bulan_11 = 0;
                                            $bulan_12 = 0;
                                            $total_bulan = 0;
                                            // $total_kapasiti_.$i = 0;
                                            $total_kapasiti_1 = 0;
                                            $total_kapasiti_2 = 0;
                                            $total_kapasiti_3 = 0;
                                            $total_kapasiti_4 = 0;
                                            $total_kapasiti_5 = 0;
                                            $total_kapasiti_6 = 0;
                                            $total_kapasiti_7 = 0;
                                            $total_kapasiti_8 = 0;
                                            $total_kapasiti_9 = 0;
                                            $total_kapasiti_10 = 0;
                                            $total_kapasiti_11 = 0;
                                            $total_kapasiti_12 = 0;
                                        @endphp
                                        @if ($operasi)
                                            {{-- @if (is_array($cpo_sem) || is_object($cpo_sem)) --}}
                                            {{-- @for ($i = $request->start_month; $i < $request->end_month; $i++)
                                                @foreach ($operasi as $data)
                                                @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                    <td style="text-align: center">/</td>
                                                @endif
                                                @endforeach
                                            @endfor --}}
                                            @foreach ($operasi as $data)
                                                <tr class="text-right">
                                                    <td scope="row" class="text-left">{{ $loop->iteration }}</td>
                                                    <td scope="row" class="text-left">{{ $data->e_np }}</td>
                                                    <td class="text-right">{{ number_format($data->kap_proses ?? 0, 2) }}
                                                    </td>
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
                                                    {{-- @for ($i = $request->start_month; $i < $request->end_month; $i++)
                                                @foreach ($operasi as $data)
                                                @if ($data->ebio_bln == $i && $data->ebio_c6 != 0)
                                                    <td style="text-align: center">/</td>
                                                @endif
                                                @endforeach
                                            @endfor --}}
                                                    @if ($data->ebio_bln == '01' && $data->ebio_c6 != 0)
                                                        @php
                                                            $bulan_1++;
                                                            $total_bulan++;
                                                            $total_kapasiti_1 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '02' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_2++;
                                                            $total_bulan++;
                                                            $total_kapasiti_2 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '03' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_3++;
                                                            $total_bulan++;
                                                            $total_kapasiti_3 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '04' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_4++;
                                                            $total_bulan++;
                                                            $total_kapasiti_4 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '05' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_5++;
                                                            $total_bulan++;
                                                            $total_kapasiti_5 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '06' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_6++;
                                                            $total_bulan++;
                                                            $total_kapasiti_6 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '07' && $data->ebio_c6 != 0)
                                                        @php
                                                            $bulan_7++;
                                                            $total_bulan++;
                                                            $total_kapasiti_7 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '08' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_8++;
                                                            $total_bulan++;
                                                            $total_kapasiti_8 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '09' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_9++;
                                                            $total_bulan++;
                                                            $total_kapasiti_9 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '10' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_10++;
                                                            $total_bulan++;
                                                            $total_kapasiti_10 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '11' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_11++;
                                                            $total_bulan++;
                                                            $total_kapasiti_11 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($data->ebio_bln == '12' && $data->ebio_c6 != 0)
                                                    @php
                                                            $bulan_12++;
                                                            $total_bulan++;
                                                            $total_kapasiti_12 += $data->kap_proses;
                                                        @endphp
                                                        <td style="text-align: center">/</td>
                                                    @else
                                                        <td></td>
                                                    @endif

                                                </tr>
                                                @php
                                                    $total_kapasiti += $data->kap_proses;
                                                    // $total_feb += $data->feb;
                                                    // $total_mac += $data->mac;
                                                    // $total_apr += $data->apr;
                                                    // $total_mei += $data->mei;
                                                    // $total_jun += $data->jun;
                                                    // $total_jul += $data->jul;
                                                    // $total_ogs += $data->ogs;
                                                    // $total_sept += $data->sept;
                                                    // $total_okt += $data->okt;
                                                    // $total_nov += $data->nov;
                                                    // $total_dec += $data->dec;
                                                @endphp
                                            @endforeach
                                        @endif

                                        <tr style="background-color: #d3d3d34d" class="font-weight-bold text-center">
                                            <th colspan="2"></th>
                                            <td style="text-align: right">{{ number_format($total_kapasiti ?? 0, 2) }}</td>
                                            <td></td>
                                            <td>{{ $bulan_1 }}</td>
                                            <td>{{ $bulan_2 }}</td>
                                            <td>{{ $bulan_3 }}</td>
                                            <td>{{ $bulan_4 }}</td>
                                            <td>{{ $bulan_5 }}</td>
                                            <td>{{ $bulan_6 }}</td>
                                            <td>{{ $bulan_7 }}</td>
                                            <td>{{ $bulan_8 }}</td>
                                            <td>{{ $bulan_9 }}</td>
                                            <td>{{ $bulan_10 }}</td>
                                            <td>{{ $bulan_11 }}</td>
                                            <td>{{ $bulan_12 }}</td>
                                            {{-- <td></td> --}}
                                            {{-- <td></td> --}}
                                        </tr>
                                        <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                            <th colspan="2">Kapasiti Biodiesel</th>
                                            <td></td>
                                            <td></td>
                                            <td>{{ number_format($total_kapasiti_1 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_2 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_3 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_4 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_5 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_6 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_7 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_8 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_9 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_10 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_11 ?? 0,2) }}</td>
                                            <td>{{ number_format($total_kapasiti_12 ?? 0,2) }}</td>
                                            {{-- <td></td> --}}
                                            {{-- <td></td> --}}
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
