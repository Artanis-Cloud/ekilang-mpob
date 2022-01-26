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

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}" style="color: rgb(102, 100, 100) !important;"
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
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" style="background-color: rgb(238, 70, 70)"
                                 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Kilang Isirung
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ route('admin.6penyatapaparcetakbuah') }}">Kilang Buah</a>
                                  <a class="dropdown-item" href="{{ route('admin.6penyatapaparcetakpenapis') }}">Kilang Penapis</a>
                                  <a class="dropdown-item" href="{{ route('admin.6penyatapaparcetakoleo') }}">Kilang Oleokimia</a>
                                  <a class="dropdown-item" href="{{ route('admin.6penyatapaparcetaksimpanan') }}">Pusat Simpanan</a>
                                  <a class="dropdown-item" href="{{ route('admin.6penyatapaparcetakbio') }}">E-Biodiesel</a>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Penyata Bulanan Kilang Isirung - MPOB(EL) CF 4</h3>
                                    <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Senarai Penyata untuk Paparan dan Cetakan</h5>
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
                                                                    <th>Papar?</th>
                                                                    <th>Sudah Cetak?<br>
                                                                    </th>
                                                                    <th>No. Lesen<br>
                                                                        </th>
                                                                    <th>Nama Premis
                                                                    </th>
                                                                    <th>Kod Pegawai
                                                                    </th>
                                                                    <th>No. Siri
                                                                    </th>
                                                                    <th>Tarikh Submit
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox">&nbspYa
                                                                    </td>
                                                                    <td >
                                                                        x
                                                                    </td>
                                                                    <td >
                                                                        x
                                                                    </td>
                                                                    <td>
                                                                        x
                                                                    </td>
                                                                    <td >
                                                                        x
                                                                    </td>
                                                                    <td >
                                                                        x
                                                                    </td>
                                                                    <td >
                                                                        x
                                                                    </td>

                                                                </tr>


                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </section>


                                            {{-- <div class="row" style="padding-top: 35px; float:right">

                                                        <div class="col-md-12">
                                                            <button type="button" class="btn  btn-primary"
                                                                data-toggle="modal" data-target="#confirmation">Simpan &
                                                                Seterusnya</button>
                                                        </div>

                                                    </div> --}}


                                                    <div class="text-left col-md-8">
                                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                         data-bs-target="#exampleModalCenter">Papar</button>

                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">Cetak</button>

                                                    </div>

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
                                                                        Anda pasti mahu cetak maklumat ini?
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

@endsection
