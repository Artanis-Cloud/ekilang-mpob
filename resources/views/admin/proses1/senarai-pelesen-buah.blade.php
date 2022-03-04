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

        <div class=" mt-2  row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="margin-left:5%; color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: rgb(64, 69, 68) !important;"
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





                <div class="card" style="margin-right:2%; margin-left:2%">
                    {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}

                    <div class="card-body">

                        <div class="row">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" style="background-color: rgb(238, 70, 70)"
                                 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Kilang Buah
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ route('admin.senaraipelesenpenapis') }}">Kilang Penapis</a>
                                  <a class="dropdown-item" href="{{ route('admin.senaraipelesenisirung') }}">Kilang Isirung</a>
                                  <a class="dropdown-item" href="{{ route('admin.senaraipelesenoleokimia') }}">Kilang Oleokimia</a>
                                  <a class="dropdown-item" href="{{ route('admin.senaraipelesensimpanan') }}">Pusat Simpanan</a>
                                  <a class="dropdown-item" href="{{ route('admin.senaraipelesenbio') }}">E-Biodiesel</a>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Pelesen Berdaftar</h3>
                                    <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Kilang Buah</b></h4>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                                 <section class="section">
                                                    <div class="card" >
                                                        {{-- <div class="card-header">
                                                            Simple Datatable
                                                        </div> --}}
                                                        <div class="text-left col-md-7">
                                                            <a href="{{ route('admin.senaraipelesenbatalbuah') }}" class="btn btn-primary"
                                                                style="float: left; margin-right:2%">Senarai Pelesen Batal</a>

                                                            <a href="{{ route('admin.1daftarpelesen') }}" class="btn btn-primary"
                                                                style="float: left"> Tambah Pelesen Baru</a>
                                                        </div>
                                                        <br>

                                                        <table class='table ' id="table1" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Bil.</th>
                                                                    <th>No. Lesen<br>
                                                                        </th>
                                                                    <th>Nama Premis
                                                                    </th>
                                                                    <th>E-mail
                                                                    </th>
                                                                    <th>No. Telefon
                                                                    </th>
                                                                    <th>Kod Pegawai
                                                                    </th>
                                                                    <th>No. Siri
                                                                    </th>
                                                                    <th>Status e-Kilang
                                                                    </th>
                                                                    <th>Status E-Stok
                                                                    </th>
                                                                    <th>Direktori
                                                                    </th>
                                                                    <th>Pretasi OER
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody  style= "max-width: 100px;
                                                            word-break: break-word;">
                                                                @foreach ($users as $data)


                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td style="text-align:left">
                                                                        <a href="#" ><u> {{ $data->e_nl }}</u></a>
                                                                       </td>
                                                                    <td>{{ $data->pelesen->e_np ?? '-'}}</td>
                                                                    <td>{{ $data->pelesen->e_email ?? '-'}}</td>
                                                                    <td>{{ $data->pelesen->e_notel ?? '-'}}</td>

                                                                    <td>{{ $data->kodpgw }}</td>
                                                                    <td>{{ $data->nosiri }}</td>

                                                                    @if ($data->e_status == 1)
                                                                        <td>Aktif</td>
                                                                    @elseif ($data->e_status == 2)
                                                                        <td>Tidak Aktif</td>
                                                                    @endif

                                                                    @if ($data->e_stock == 1)
                                                                        <td>Aktif</td>
                                                                    @elseif ($data->e_stock == 2)
                                                                        <td>Tidak Aktif</td>
                                                                    @elseif ($data->e_stock == NULL)
                                                                        <td>-</td>
                                                                    @endif

                                                                    @if ($data->directory == 'Y')
                                                                        <td>Ya</td>
                                                                    @elseif ($data->directory == 'N')
                                                                        <td>Tidak</td>
                                                                    @endif


                                                                    <td></td>


                                                                </tr>

                                                            @endforeach

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
