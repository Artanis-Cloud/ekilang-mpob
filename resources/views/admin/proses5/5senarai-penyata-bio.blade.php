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
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Profil Pelesen</h4>
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
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Penyata
                                </h3>
                                <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Kilang Biodiesel</b></h4>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>

                        </div>
                        <hr>

                        <section class="section">
                            <div class="card">

                                <br>
                                <div class="table-responsive" id="example2">
                                    <table id="example10" class="table table-bordered text-center" style="width: 100%;">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd;  word-wrap:normal">
                                                {{-- <th class="no-sort">Bil.</th> --}}
                                                <th style=" vertical-align: middle; width:100px">No. Lesen</th>
                                                <th style=" vertical-align: middle">Nama Premis</th>
                                                <th style=" vertical-align: middle">Emel</th>
                                                <th style=" vertical-align: middle">No. Telefon</th>
                                                <th style=" vertical-align: middle">Kod Pegawai</th>
                                                <th style=" vertical-align: middle">No. Siri</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd;">
                                                {{-- <th>Bil.</th> --}}
                                                <th>No. Lesen</th>
                                                <th>Nama Premis</th>
                                                <th>Emel</th>
                                                <th>No. Telefon</th>
                                                <th>Kod Pegawai</th>
                                                <th>No. Siri</th>
                                            </tr>
                                        </tfoot>
                                        <tbody style="word-break: break-word; font-size:12px">
                                            @foreach ($users as $data)
                                                    <tr class="text-left">
                                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                                        <td>
                                                        <a href="{{ route('admin.kemaskini.maklumat.bio', $data->ebio_reg) }}"><u>
                                                            {{ $data->e_nl ?? '-' }}</u></a></td>

                                                        <td style="text-transform:uppercase">{{ $data->e_np ?? '-' }}</td>
                                                        <td>{{ $data->e_email ?? '-' }}</td>
                                                        <td>{{ $data->e_notel ?? '-' }}</td>
                                                        <td style="text-align: center">{{ $data->kodpgw }}</td>
                                                        <td style="text-align: center">{{ $data->nosiri }}</td>

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


<script>
    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example2 tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
    var table = $('#example10').DataTable({

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
                    className: "fred"
                }
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
