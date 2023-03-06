@extends('layouts.main')

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 align-self-center">
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
                        <div class="col-7 align-self-center" id="breadcrumb">
                            <div class="d-flex align-items-center justify-content-end">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                    <div class="col-1 align-self-center">
                        <a href="javascript:history.back()" class="btn" style=" color:rgb(64, 69, 68)"><i
                                class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                    <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary " onclick="myPrint('myfrm')"
                            value="print">Cetak</button>
                    </div>
                </div>
                <form method="get" action="" id="myfrm">

                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- @foreach ($pelesens as $data) --}}
                            <div class="card-body">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">



                                        <body>


                                            <p align="center">
                                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                                            </p>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>RINGKASAN JUALAN BIODIESEL<br>
                                                    {{-- <font size="2">BAHAGIAN 1<br> --}}

                                                    </font>

                                                </b><br>

                                            </p>


                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0" style="font-size: 13px">
                                                    <thead style="text-align: center">


                                                        <tr>
                                                            <th rowspan="2" style="vertical-align: middle">No.</th>
                                                            <th rowspan="2" style="vertical-align: middle; width:20%">Syarikat</th>
                                                            <th rowspan="2" style="vertical-align: middle; width:2%">Kapasiti Biodiesel(Tan/Tahun)</th>
                                                            <th rowspan="2" style="vertical-align: middle">Lokasi</th>
                                                            <th colspan="12">Tahun: &nbsp; (Tumbuhan yang mengeluarkan biodiesel)*</th>

                                                        </tr>

                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                        </tr>

                                                        {{-- <tr>
                                                            <th rowspan="2">No.</th>
                                                            <th rowspan="2">Syarikat</th>
                                                            <th rowspan="2">Kapasiti Biodiesel(Tan/Tahun)</th>
                                                            <th rowspan="2">Lokasi</th>
                                                            <th>Tahun: &nbsp; (Tumbuhan yang mengeluarkan biodiesel)*
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                                <td>JAN</td>
                                                            </th>
                                                        </tr> --}}
                                                    </thead>
                                                    <tbody>

                                                        <tr>

                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                        </tr>



                                                    </tbody>

                                                </table>
                                            </div><br>

                                        </body>
                                    </div>

                            </div>

                            <br>
                            <hr>
                        {{-- @endforeach --}}

                    </div>
                </form>
            </div>
            <h1 style="page-break-before:always"></h1>


        </div>


    </div><!-- End Hero -->




    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calc').change(function() {
                var total = 0;
                $('.calc').each(function() {
                    if ($(this).val() != '') {
                        total += parseInt($(this).val());
                    }
                });
                $('#total').html(total);
            });
        });
    </script>

    <script>
        function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script>

    </body>

    </html>
@endsection
