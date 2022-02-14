@extends($layout)

@section('content')


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
            <div class="col-xl-12 col-lg-9">

                {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
            </div>
        </div> --}}

            <div class="mt-2 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: rgb(102, 100, 100) !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='black'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #e8d255  !important;">
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
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- <div class="card-header border-bottom">
                        <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                    </div> --}}
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class=" text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        {{-- <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses 11</h3> --}}
                                        <h3 style="color: rgb(39, 80, 71);">Paparan Emel Pertanyaan /
                                            Pindaan / Cadangan</h3>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>
                                    <form method="get" action="" id="myfrm">
                                        <div class="container center">
                                            <div class="row" id="table-bordered">
                                                <div class="col-12 mt-2" style="margin-bottom: -2%">
                                                    {{-- <form wire:submit.prevent='store'> --}}
                                                    <div class="card">

                                                        <div class="card-content">


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
                                                                        <td>{{ $emel->Message }}</td>
                                                                    </tr>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <h1 style="page-break-before:always"></h1>

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


                <br>





    </section><!-- End Hero -->



    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


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
