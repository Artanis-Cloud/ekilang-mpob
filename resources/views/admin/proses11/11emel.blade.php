@extends('layouts.main')
<style>
    .dataTables_filter, .dataTables_info { display: none; }
</style>
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
                    <div class="row" style="">
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>
                    </div>
                    <div class="pl-3">

                        <div class=" text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Emel Pertanyaan /
                                Pindaan / Cadangan</h3>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>


                        <section class="section">
                            <div class="card">
                                <form action="{{ route('admin.6papar.buah.form') }}" method="post">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Bil.</th>
                                                    <th>Nama Pelesen</th>
                                                    <th>No Lesen</th>
                                                    <th>Kategori</th>
                                                    <th>Tarikh</th>
                                                    <th>Tindakan</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th>Bil.</th>
                                                    <th>Nama Pelesen</th>
                                                    <th>No Lesen</th>
                                                    <th>Kategori</th>
                                                    <th>Tarikh</th>
                                                    <th>Tindakan</th>

                                                </tr>
                                            </tfoot>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($listemel as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->FromName }}</td>
                                                        <td>{{ $data->FromLicense }}</td>
                                                        <td>{{ $data->Category }}</td>
                                                        <td>{{ date("d-m-Y H:i:s", strtotime($data->Date)) }}</td>
                                                        <td>
                                                            <div class="btn">
                                                                <a
                                                                    href="{{ route('admin.11paparemel', [$data->MsgID]) }}">
                                                                    <i class="fa fa-eye"
                                                                        style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                            {{-- <button class="btn" style="margin-left:5%" ><a href="{{ route('admin.11paparemel') }} "><i class="fa fa-eye"  style="font-size:18px"></i></a></button> --}}
                                                            {{-- <button class="btn" onclick=setPrintedPage('11paparemel.blade.php')
                                                                    value="print"><i class="fa fa-download"
                                                                        style="font-size:18px"></i></button> --}}
                                                            <div class="btn">
                                                                <a
                                                                    href="{{ route('admin.11papar_cetak', [$data->MsgID]) }}">
                                                                    <i class="fa fa-download"
                                                                        style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                            @if($data->file_upload)

                                                                <div class="btn">
                                                                    <a
                                                                        target='_blank' href="{{ asset('storage/'.$data->file_upload) }}" >
                                                                        <i class="fa fa-paperclip" 
                                                                            style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            @else
                                                            @endif
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
    {{-- <script>
        function func()
        {
            document.getElementById("change").style.color="red";
            document.getElementById("change").style.font="calibri";
        }
    </script>
    <script>
        $('example').dataTable({bFilter: false, bInfo: false});
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
    </script> --}}
@endsection
