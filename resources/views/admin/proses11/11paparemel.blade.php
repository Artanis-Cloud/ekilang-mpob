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

            <div class="mt-5 mb-4 row">
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
                                                            onMouseOut="this.style.color='white'">
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

                                    <div class="container center">



                                        <div class="row" id="table-bordered">
                                            <div class="col-12 mt-2" style="margin-bottom: -2%">
                                                {{-- <form wire:submit.prevent='store'> --}}
                                                <div class="card">

                                                    <div class="card-content">


                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                @foreach ($emel as $data)
                                                                    <tr>
                                                                        <th>Tarikh</th>
                                                                        <td>{{ $data->Date }}</td>



                                                                    </tr>

                                                                    <tr>
                                                                        <th>1. Kilang Isirung</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15"
                                                                                class="calc"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">2. Kilang Peniaga</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15"
                                                                                class="calc"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">3. Lain-Lain</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15"
                                                                                class="calc"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>


                                                                    <tr>
                                                                        <td class="text-bold-500"
                                                                            style="text-align:center;">
                                                                            <b>Jumlah</b>
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <b><span id="total"></span></b>

                                                                        </td>

                                                                    </tr>
                                                                    <tr style="background-color: #1526224a">
                                                                        <td class="text-bold-500"
                                                                            style="text-align:center;">
                                                                            <b>Jumlah Bahagian I</b>
                                                                        </td>
                                                                        <td style="text-align:center;">

                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        {{-- </diV> --}}

                                        {{-- <section class="section">
                                        <div class="card">


                                            <table class='table ' id="table1">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Nama Pelegfgbsen</th>
                                                        <th>No Lesen</th>
                                                        <th>Kategori</th>
                                                        <th>Tarikh</th>
                                                        <th>Tindakan</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $data)
                                                    <tr>
                                                        <td>{{ $data->FromName }}</td>
                                                        <td>{{ $data->FromLicense }}</td>
                                                        <td>{{ $data->Category }}</td>
                                                        <td>{{ $data->Date }}</td>
                                                        <td>
                                                            <button class="btn" style="margin-left:5%"><i class="fa fa-eye"  style="font-size:18px"></i></button>
                                                            <button class="btn"><i class="fa fa-download"  style="font-size:18px"></i></button>
                                                        </td>

                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </section> --}}



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




    </body>

    </html>




@endsection
