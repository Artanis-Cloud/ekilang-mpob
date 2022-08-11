@extends($layout)

@section('content')

    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px; margin-left: 2%">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Kod & Nama Negara</h4>
                        </div>

                        <div class="col-7 align-self-center" style="margin-left:-1%;">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}"
                                                        style="color: black !important;"
                                                        onMouseOver="this.style.color='#25877b'"
                                                        onMouseOut="this.style.color='black'">
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
                        <div class="row" style="padding: 10px; background-color: white; margin-right:2%; margin-left:1%">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>

                        <section class="section">

                            <div class="card">
                                <div class="card-body">

                                    <body>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                                        </p>
                                        <p align="center"><b>
                                            <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)</font><br>

                                            <font size="4">Senarai Kod dan Nama Negara</font></b>
                                        </p>

                                    </body>

                                    <div class="row " style=" float:left">
                                        <div class="text-left col-md-1">
                                            <a href="{{ asset('manual/admin/Kod dan Nama Negara.pdf') }}" class="btn btn-primary ">
                                                PDF
                                            </a>
                                        </div>
                                        <div class="text-left col-md-4" style="margin-left: 25%">
                                            <a href="{{ asset('manual/admin/Kod dan Nama Negara.xlsx') }}" class="btn btn-primary ">
                                                EXCEL
                                            </a>
                                        </div>
                                    </div><br><br>


                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Kod Negara</th>
                                                    <th>Nama Negara</th>
                                                    <th>Benua</th>
                                                </tr>
                                            </thead>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($negara as $data)
                                                    <tr>
                                                        <td>
                                                            {{ $data->kodnegara }}
                                                        </td>
                                                        <td>
                                                            {{ $data->namanegara }}
                                                        </td>
                                                        <td>
                                                            {{ $data->benua }}
                                                        </td>
                                                    </tr>

                                                @endforeach
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





@endsection

@section('scripts')
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

        function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script> --}}

@endsection
