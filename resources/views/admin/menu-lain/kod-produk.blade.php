@extends($layout)

@section('content')

    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px; margin-left: 2%">
                    <div class="pb-2 row">
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="margin-left:5%; color:white; background-color:#265960">Kembali</a>
                        </div>
                        <div class="col-2 align-self-center">
                            <button type="button" class="btn btn-primary "
                                    onclick="myPrint('myfrm')" value="print">Cetak</button>
                        </div>
                        <div class="col-9 align-self-center" style="margin-left:-1%;">
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


                    <form method="get" action="" id="myfrm">

                        <div class="card" style="margin-right:2%; margin-left:2%">



                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="col-md-12" align="center" style="font-family:Rubik, sans-serif;">

                                        <body>


                                            <p align="center">
                                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                                            </p>
                                            {{-- <title>PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4</title> --}}
                                            <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>Senarai Kod dan Nama Produk Sawit<br>

                                            </p>


                                            <table border="1" width="604" cellspacing="0" cellpadding="0"
                                                class="table table-bordered ">

                                                <tbody style="border: 1px solid black;">
                                                    <tr>
                                                        <th>Kod Produk</th>
                                                        <th>Nama Produk</th>
                                                        <th>Nama Kumpulan Produk</th>
                                                        <th>Nama Panjang Produk</th>

                                                    </tr>
                                                    @foreach ($produk as $data)
                                                        <tr>
                                                            <td>
                                                                {{ $data->prodid }}
                                                            </td>
                                                            <td>
                                                                {{ $data->prodname }}
                                                            </td>
                                                            <td>
                                                                {{ $data->prodcat }}
                                                            </td>
                                                            <td>
                                                                {{ $data->proddesc }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>



                                        </body>
                                    </div>
                                </div>

                        </div>
                    </form>

            </div>


        </div>

    </div>





@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per  ",
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
    </script>

@endsection
