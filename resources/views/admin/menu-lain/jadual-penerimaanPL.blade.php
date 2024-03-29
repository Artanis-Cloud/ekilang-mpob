@extends($layout)

@section('content')

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative"  data-aos-delay="100">

        {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
        {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

        <div class=" mt-5  row">
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
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Jadual Penerimaan PL</h3>
                                    <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Jadual Penerimaan PL Bagi Semua Sektor Bulan 11 Tahun 2021</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>




                                                <section class="section">
                                                    <div class="card" >
                                                        {{-- <div class="card-header">
                                                            Simple Datatable
                                                        </div> --}}

                                                        <table class='table table-striped' id="table1" >
                                                            <thead>

                                                                <tr>
                                                                    <th>Tarikh</th>
                                                                    <th>1<br>
                                                                    </th>
                                                                    <th>2<br>
                                                                        </th>
                                                                    <th>3
                                                                    </th>
                                                                    <th>4
                                                                    </th>
                                                                    <th>5
                                                                    </th>
                                                                    <th>6
                                                                    </th>
                                                                    <th>7
                                                                    </th>
                                                                    <th>8
                                                                    </th>
                                                                    <th>9
                                                                    </th>
                                                                    <th>10
                                                                    </th>
                                                                    <th>Jumlah
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>
                                                                    <td >

                                                                    </td>


                                                                </tr>

                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </section>


{{--
                                                    <div class="text-left col-md-8">
                                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                         data-bs-target="#exampleModalCenter">Tambah</button>

                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">Cetak</button>

                                                    </div> --}}

                                            <div class="row" style=" float:right">

                                                <div class="col-md-12">


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
                                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
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
                                            </div>
                                    </div>








                                    </form>

                                </div>
                            </div>
                        </div>






                    </div>
                </div>





    </section><!-- End Hero -->





    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}



    {{-- </body>

    </html> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


@endsection
