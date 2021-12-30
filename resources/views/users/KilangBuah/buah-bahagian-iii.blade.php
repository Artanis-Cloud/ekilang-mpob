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
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:3%">Bahagian III</h3>
                                        <h5 style="color: rgb(39, 80, 71)">Belian / Penerimaan Bekalan Buah Kelapa Sawit
                                            (FFB) (52)</h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>









                                    {{-- kadar oer meningkat --}}
                                    <div class="row" id="table-bordered">
                                        <div class="col-12 mt-5">
                                            <form action="#" class="">
                                                @csrf
                                            <div class="card">

                                                <div class="card-content">


                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead style="text-align: center">
                                                                    <tr>
                                                                        <th>Sumber Bekalan</th>
                                                                        <th>Kuantiti (Tan Metrik)</th>



                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-bold-500">1. Estet Sendiri</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">2. Estet Luar</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">3. Peniaga Buah</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">4. Pekebun Kecil</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">5. Kilang Buah Lain</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">6. Lain-Lain</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr style="background-color: #1526224a">
                                                                        <td class="text-bold-500"
                                                                            style="text-align:center;">
                                                                            <b>Jumlah</b>
                                                                        </td>
                                                                        <td style="text-align:center;">

                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        </div>
                                                        </div>




       

                                                        {{-- <div class="card-body">
                                                            <p>
                                                                Toggle a modal via JavaScript by clicking the button above.
                                                                You can use modal to add dialogs to your site for lightboxes, user
                                                                notifications, or completely custom content.
                                                            </p> --}}
                                                            <!-- Button trigger for basic modal -->
                                                            {{-- <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                                                data-bs-target="#default">
                                                                Launch Modal
                                                            </button> --}}
                        
                                                            {{-- <!--Basic Modal -->
                                                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                                                aria-labelledby="myModalLabel1" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
                                                                            <button type="button" class="close rounded-pill"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                                <i data-feather="x"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>
                                                                                Bonbon caramels muffin. Chocolate bar oat cake cookie pastry
                                                                                dragée pastry. Carrot cake
                                                                                chocolate tootsie roll chocolate bar candy canes biscuit.
                        
                                                                                Gummies bonbon apple pie fruitcake icing biscuit apple pie
                                                                                jelly-o sweet roll. Toffee sugar
                                                                                plum sugar plum jelly-o jujubes bonbon dessert carrot cake.
                                                                                Cookie dessert tart muffin topping
                                                                                donut icing fruitcake. Sweet roll cotton candy dragée danish
                                                                                Candy canes chocolate bar cookie.
                                                                                Gingerbread apple pie oat cake. Carrot cake fruitcake bear claw.
                                                                                Pastry gummi bears
                                                                                marshmallow jelly-o.
                                                                            </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn" data-bs-dismiss="modal">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Close</span>
                                                                            </button>
                                                                            <button type="button" class="btn btn-primary ml-1"
                                                                                data-bs-dismiss="modal">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Accept</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        </div>
                                                </div>

                                                <div class="row form-group" style="padding-top: 10px; ">


                                                    <div class="text-left col-md-5">
                                                        <a href="{{ route('buah.bahagianii') }}" class="btn btn-primary"
                                                            style="float: left">Sebelumnya</a>
                                                    </div>
                                                    <div class="text-right col-md-7 mb-4 ">
                                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                            style="float: right" data-bs-target="#exampleModalCenter">Simpan &
                                                            Seterusnya</button>
                                                    </div>

                                                </div>

                                                    <!-- Vertically Centered modal Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                        PENGESAHAN</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Anda pasti mahu menyimpan maklumat ini?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block"
                                                                            style="color:#275047">Tidak</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Ya</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- </div> --}}
                                        </form>












                                        </div>
                                    </div>

                                    <br>

                                </div>
                            </div>
                        </div>













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
