@extends('layouts.main')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Lain-lain</h4>
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
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>
                    </div>
                    <div class="pl-3">

                        <div class=" text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Audit Trail</h3>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>


                        <section class="section">
                            <div class="card">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Bil.</th>
                                                {{-- <th>Tarikh</th> --}}
                                                <th>Username</th>
                                                <th>Aktiviti</th>
                                                <th>IP Pengguna</th>
                                                <th>Jam / Waktu</th>

                                            </tr>
                                        </thead>
                                        <tbody style="word-break: break-word; font-size:12px">
                                            @foreach ($log as $key => $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- <td>{{ $data->date }}</td> --}}
                                                    <td>{{ $data->username }}</td>
                                                    <td>{{ $data->activity }}</td>
                                                    <td style="text-align: center">{{ $data->ip_address }}</td>
                                                    {{-- @foreach ($formatteddate as $key => $date) --}}
                                                    <td style="text-align: center">{{ $formatteddate[$key] }}</td>

                                                    {{-- @endforeach --}}



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
        $(document).ready(function() {
            $('#example2').DataTable({
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
    <script>
        function printWindow() {
            bV = parseInt(navigator.appVersion)
            if (bV >= 4) window.print()
        }

        function setPrintedPage(altdoc) {
            var prt;
            var prt = document.getElementsByTagName("link")[0];
            prt.setAttribute("href", altdoc);
            printWindow();
        }
    </script>
@endsection
