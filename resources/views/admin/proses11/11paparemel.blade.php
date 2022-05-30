@extends('layouts.main')

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
                    <h4 class="page-title">Senarai Emel</h4>
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
                            <a href="{{ route('admin.11emel') }}"  class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>
                    </div>
                        <div class="pl-3">

                            <div class=" text-center">
                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Paparan Emel Pertanyaan /
                                    Pindaan / Cadangan</h3>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <hr>


                                <section class="section">
                                    <div class="card">
                                        <form method="get" action="" id="myfrm">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">

                                                    <tr>
                                                        <th>Tarikh</th>
                                                        <td>{{ $emel->Date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Pelesen</th>
                                                        <td>{{ $emel->FromName }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>No. Lesen</th>
                                                        <td>{{ $emel->FromLicense }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Emel</th>
                                                        <td>{{ $emel->FromEmail }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <td>{{ $emel->Category }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Emel</th>
                                                        <td>{{ $emel->TypeOfEmail }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Subjek</th>
                                                        <td>{{ $emel->Subject }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mesej</th>
                                                        <td>{!! $emel->Message !!}

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Lampiran</th>
                                                        @if($emel->file_upload)
                                                        <td><a target='_blank' href="{{ asset('storage/'.$emel->file_upload) }}">Fail</a></td>
                                                        @else
                                                        <td>-</td>
                                                        @endif
                                                    </tr>

                                                </table>

                                            </div>
                                        </form>
                                    </div>

                                </section>

                        </div>

                        <div class="row form-group" style="padding-top: 10px; ">



                            <div class="text-right col-md-7 mb-2 ">
                                <button type="button" class="btn btn-primary " style="float: right"
                                    onclick="myPrint('myfrm')" value="print">Cetak</button>
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
        function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script>
@endsection
