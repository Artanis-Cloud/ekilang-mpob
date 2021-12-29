@extends($layout)

@section('content')



    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mb-4 row">
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
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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
                        <br>
                        <br>
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class="mb-5 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:3%">Bahagian V</h3>
                                        <h5 style="color: rgb(39, 80, 71)">Edaran / Jualan Isirung Sawit (PK) Dalam Negeri
                                            (51)
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>









                                    {{-- kadar oer meningkat --}}
                                    <div class="row" id="table-bordered">
                                        <div class="col-12 mt-5">
                                            <form wire:submit.prevent='store'>
                                                <div class="card">

                                                    <div class="card-content">


                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead style="text-align: center">
                                                                    <tr>
                                                                        <th>Pembeli / Penerima</th>
                                                                        <th>Kuantiti (Tan Metrik)</th>



                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-bold-500">1. Kilang Isirung</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">2. Kilang Peniaga</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">3. Lain-Lain</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>


                                                                    <tr style="background-color: #1526224a">
                                                                        <td class="text-bold-500"
                                                                            style="text-align:center;"><b>Jumlah</b></td>
                                                                        <td style="text-align:center;">

                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>











                                        </div>
                                    </div>





                                    <div class="row form-group" style="padding-top: 10px; ">


                                        <div class="text-left col-md-5">
                                            <a href="{{ route('buah.bahagianiv') }}" class="btn btn-primary"
                                                style="float: left">Sebelumnya</a>
                                        </div>
                                            <div class="text-right col-md-7 mb-4 ">
                                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                                    style="float: right" data-target="#confirmation">Simpan & Hantar</button>
                                            </div>

                                    </div>

                                        {{-- Hidden Gap - Just Ignore --}}
                                        {{-- <div class="alert alert-white" style="text-align: center;"></div> --}}
                                        {{-- <div style="padding: 25px;"></div> --}}
                                    </div>

                                    <!-- Modal Confirmation -->
                                    <div class="modal fade" id="confirmation" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#f3ce8f  !important">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><i
                                                            class="fa fa-exclamation-triangle" aria-hidden="true"
                                                            style="color:rgb(255, 255, 0)"></i>&nbspPENGESAHAN
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Anda pasti mahu menyimpan maklumat ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-success">Ya</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <br>



                        {{-- </div>
                                                                    </div> --}}

                        {{-- </section> --}}















                        {{-- </div>

                    </div> --}}



                        <br>
                        <br>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    
    </body>

    </html>

@endsection
