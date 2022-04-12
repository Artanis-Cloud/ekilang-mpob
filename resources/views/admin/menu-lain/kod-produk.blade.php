@extends($layout)

@section('content')

    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Senarai Kod dan Nama Produk Sawit</h4>
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
                            <div class="pl-3">

                                {{-- <div class=" text-center">

                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Paparan Senarai Penyata Bulan Terdahulu</h3>
                                        <h5 style="color: rgb(39, 80, 71); font-size:14px;">Bulan: &nbsp; Tahun: &nbsp;  </h5>

                                </div>
                                <hr> --}}


                                <section class="section">
                                    <div class="card">
                                        <form method="get" action="" id="myfrm">
                                            @csrf
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered"
                                                    style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Kod Produk</th>
                                                            <th>Nama Produk</th>
                                                            <th>Nama Kumpulan Produk</th>
                                                            <th>Nama Panjang Produk</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="word-break: break-word; font-size:12px">
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
                                                {{-- <div class="text-right col-md-12 mb-4 ">
                                                    <button type="button" class="btn btn-primary " style="float: right"
                                                            onclick="myPrint('myfrm')" value="print">Cetak</button>
                                                </div> --}}
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
