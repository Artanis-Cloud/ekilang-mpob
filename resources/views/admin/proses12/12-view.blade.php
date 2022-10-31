@extends('layouts.main')
<style>
    table {
      border-collapse: collapse;
      width: 100%;
      /* border: 1px solid #ddd; */
    }

    /* th, td {
      text-align: left;
      padding: 16px;
    } */
    </style>
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
                    <h4 class="page-title">Validasi</h4>
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
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h4 style="color: rgb(39, 80, 71);">Validasi (Semakan Data)</h4>
                            <h6 style="color: rgb(242, 68, 68); margin-bottom:1%"><i>
                                    Perhatian: Proses ini menyemak data di PLEID</i>
                            </h6>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="container center ">
                                <div class="table-responsive">
                                    <div id="tblData">
                             @if ($sektor == 'PL91')
                                    <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd; text-align:center; vertical-align:middle">

                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Pengeluaran CPO</th>
                                                <th style="text-align: center; vertical-align: middle">Pengeluaran PK</th>
                                                <th style="text-align: center; vertical-align: middle">FFB Proses</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>


                                                {{-- <th>No. Siri</th> --}}
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                <th style="text-align: center">No. Batch<br></th>
                                                <th style="text-align: center">No. Lesen</th>
                                                <th style="text-align: center">Nama</th>
                                                <th style="text-align: center">Negeri</th>
                                                <th style="text-align: center">Pengeluaran CPO</th>
                                                <th style="text-align: center">Pengeluaran PK</th>
                                                <th style="text-align: center">FFB Proses</th>
                                                <th style="text-align: center">Catatan</th>
                                            </tr>
                                        </tfoot>
                                        @if($query1)
                                        <tbody style="word-break: break-word; font-size:12px">
                                             @foreach ($query1 as $data)
                                                <tr>
                                                <td>{{ $data->nobatch ?? ''}}<br></td>
                                                <td>{{ $data->nolesen ?? ''}}</td>
                                                <td>{{ $data->nama ?? ''}}</td>
                                                <td>{{ $data->nama_negeri ?? 'TIADA' }}</td>
                                                <td>{{ $data->cpo_prod ?? ''}}</td>
                                                <td>{{ $data->pk_prod ?? ''}}</td>
                                                <td>{{ $data->ffb_proc ?? '' }}</td>
                                                <td>FFB Proses tiada</td>



                                                </tr>
                                            @endforeach

                                        </tbody>
                                        @else
                                        <td colspan="8" style="text-align: center">Tiada kesalahan FFB Proses</td>

                                        @endif

                                    </table>
                                    {{-- </div> --}}

                                </div>
                                <br>
                                <hr>
                                <br>
                                <div class="table-responsive">
                                    <div id="tblData">
                                    <table id="example2" class="table table-bordered">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd; text-align:center; vertical-align:middle">


                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>


                                                {{-- <th>No. Siri</th> --}}
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                <th style="text-align: center">No. Batch<br></th>
                                                <th style="text-align: center">No. Lesen</th>
                                                <th style="text-align: center">Nama</th>
                                                <th style="text-align: center">Negeri</th>
                                                <th style="text-align: center">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center">Catatan</th>
                                            </tr>
                                        </tfoot>
                                        @if($query2)
                                        <tbody style="word-break: break-word; font-size:12px">
                                             @foreach ($query2 as $data)
                                                <tr>
                                                <td>{{ $data->nobatch ?? ''}}<br></td>
                                                <td>{{ $data->nolesen ?? ''}}</td>
                                                <td>{{ $data->nama ?? ''}}</td>
                                                <td>{{ $data->nama_negeri ?? 'TIADA'}}</td>
                                                <td>{{ $data->cap_lesen ?? ''}}</td>
                                                @if ($data->nama == '' || $data->nama_negeri == '' || $data->cap_lesen =='')
                                                <td style="font: red">
                                                    <ul>
                                                    @if ($data->nama == '')
                                                        <li>Pelesen tidak berdaftar dalam Sistem PLEID.</li>
                                                    @elseif ($data->nama_negeri == '')
                                                        <li>Negeri tidak disetkan dalam Sistem PLEID.</li>
                                                    @elseif ($data->cap_lesen == '')
                                                        <li>Pelesen tiada kapasiti pengilangan dilulus pada bulan ini.</li>
                                                    @else
                                                    @endif
                                                    </ul>
                                                <td>
                                                @else
                                                <td></td>
                                                @endif
                                            @endforeach

                                        </tbody>
                                        @else
                                        <td colspan="8" style="text-align: center">Tiada kesalahan Kapasiti Pengilangan Dilulus</td>

                                        @endif

                                    </table>
                                    @elseif ($sektor == 'PL101')

                                    <table id="example2" class="table table-bordered">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd; text-align:center; vertical-align:middle">

                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Isirung Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Isirung Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>
                                            </tr>
                                        </tfoot>
                                        @if($query1)
                                        <tbody style="word-break: break-word; font-size:12px">
                                             @foreach ($query1 as $data)
                                                <tr>
                                                <td>{{ $data->nobatch ?? ''}}<br></td>
                                                <td>{{ $data->nolesen ?? ''}}</td>
                                                <td>{{ $data->nama ?? ''}}</td>
                                                <td>{{ $data->nama_negeri ?? 'TIADA' }}</td>
                                                <td>{{ $data->cap_lulus ?? ''}}</td>
                                                <td>{{ $data->minyaksawit_proses ?? ''}}</td>
                                                <td>{{ $data->minyakisirong_proses ?? '' }}</td>
                                                @if ($data->nama == '' || $data->nama_negeri == '' || $data->cap_lesen =='' || $data->cap_lulus == 0)
                                                <td style="font: red">
                                                    <ul>
                                                    @if ($data->nama == '')
                                                        <li>Pelesen tidak berdaftar dalam Sistem PLEID.</li>
                                                    @elseif ($data->nama_negeri == '')
                                                        <li>Negeri tidak disetkan dalam Sistem PLEID.</li>
                                                    @elseif ($data->cap_lesen == '')
                                                        <li>Pelesen tiada kapasiti pengilangan dilulus pada bulan ini.</li>
                                                    @elseif ($data->cap_lulus == 0)
                                                        <li>Kapasiti pengilangan dilulus adalah 0</li>
                                                    @else
                                                    @endif
                                                    </ul>
                                                </td>
                                                @else
                                                <td></td>
                                                @endif
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        @else
                                        <td colspan="8" style="text-align: center">Tiada kesalahan Kapasiti Pengilangan Dilulus</td>

                                        @endif

                                    </table>
                                    @elseif ($sektor == 'PL102')
                                    <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd; text-align:center; vertical-align:middle">

                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>


                                                {{-- <th>No. Siri</th> --}}
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>
                                            </tr>
                                        </tfoot>
                                        @if($query1)
                                        <tbody style="word-break: break-word; font-size:12px">
                                             @foreach ($query1 as $data)
                                                <tr>
                                                <td>{{ $data->nobatch ?? ''}}<br></td>
                                                <td>{{ $data->nolesen ?? ''}}</td>
                                                <td>{{ $data->nama ?? ''}}</td>
                                                <td>{{ $data->nama_negeri ?? 'TIADA' }}</td>
                                                <td>{{ $data->cap_lesen ?? ''}}</td>
                                                @if ($data->nama == '' || $data->nama_negeri == '' || $data->cap_lesen == '' )
                                                <td style="font: red">
                                                    <ul>
                                                    @if ($data->nama == '')
                                                        <li>Pelesen tidak berdaftar dalam Sistem PLEID.</li>
                                                    @elseif ($data->nama_negeri == '')
                                                        <li>Negeri tidak disetkan dalam Sistem PLEID.</li>
                                                    @elseif ($data->cap_lesen == '')
                                                        <li>Pelesen tiada kapasiti pengilangan dilulus pada bulan ini.</li>
                                                    @else
                                                    @endif
                                                    </ul>
                                                <td>
                                                @else
                                                <td></td>
                                                @endif
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        @else
                                        <td colspan="8" style="text-align: center">Tiada kesalahan Kapasiti Pengilangan Dilulus</td>

                                        @endif

                                    </table>
                                    @elseif ($sektor == 'PL104')
                                    <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd; text-align:center; vertical-align:middle">

                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Isirung Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Lain-Lain Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>


                                                {{-- <th>No. Siri</th> --}}
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                <th style="text-align: center; vertical-align: middle">No. Batch<br></th>
                                                <th style="text-align: center; vertical-align: middle">No. Lesen</th>
                                                <th style="text-align: center; vertical-align: middle">Nama</th>
                                                <th style="text-align: center; vertical-align: middle">Negeri</th>
                                                <th style="text-align: center; vertical-align: middle">Kapasiti Pengilangan Dilulus</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Minyak Isirung Sawit Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Lain-Lain Diproses</th>
                                                <th style="text-align: center; vertical-align: middle">Catatan</th>
                                            </tr>
                                        </tfoot>
                                        @if($query1)
                                        <tbody style="word-break: break-word; font-size:12px">
                                             @foreach ($query1 as $data)
                                                <tr>
                                                <td>{{ $data->nobatch ?? ''}}<br></td>
                                                <td>{{ $data->nolesen ?? ''}}</td>
                                                <td>{{ $data->nama ?? ''}}</td>
                                                <td>{{ $data->nama_negeri ?? 'TIADA' }}</td>
                                                <td>{{ $data->cap_lulus ?? ''}}</td>
                                                <td>{{ $data->minyaksawit_proses ?? ''}}</td>
                                                <td>{{ $data->minyakisirong_proses ?? ''}}</td>
                                                <td>{{ $data->lainlain_proses ?? ''}}</td>
                                                @if ($data->nama == '' || $data->nama_negeri == '' || $data->cap_lesen == '' || $data->cap_lulus== '' )
                                                <td style="font: red">
                                                    <ul>
                                                    @if ($data->nama == '')
                                                        <li>Pelesen tidak berdaftar dalam Sistem PLEID.</li>
                                                    @elseif ($data->nama_negeri == '')
                                                        <li>Negeri tidak disetkan dalam Sistem PLEID.</li>
                                                    @elseif ($data->cap_lesen == '')
                                                        <li>Pelesen tiada kapasiti pengilangan dilulus pada bulan ini.</li>
                                                    @elseif ($data->cap_lulus == 0)
                                                        <li>Kapasiti pengilangan dilulus adalah 0</li>
                                                    @else
                                                    @endif
                                                    </ul>
                                                <td>
                                                @else
                                                <td></td>
                                                @endif
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        @else
                                        <td colspan="8" style="text-align: center">Tiada kesalahan Kapasiti Pengilangan Dilulus</td>

                                        @endif

                                    </table>
                                    @endif
                                    {{-- </div> --}}

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
        $('#example2 tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });

        // DataTable
            var table = $('#example2').DataTable({

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
    @endsection
