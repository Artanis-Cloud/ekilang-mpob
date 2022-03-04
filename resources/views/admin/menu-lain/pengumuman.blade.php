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

        <div class=" mt-2 mb-4  row">
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
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Pengumuman</h3>
                                    <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Senarai Pengumuman</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>
                                    <section class="section">
                                        <div class="card" >
                                            <div class="row" style=" float:left">

                                                <div class="text-left col-md-8">
                                                    <a href="{{ route('admin.tambahpengumuman') }}" class="btn btn-primary ">
                                                        Tambah
                                                    </a>

                                                </div>
                                        </div>
                                        <br>
                                            <table class='table' id="table1" >
                                                <thead>

                                                    <tr>
                                                        <th>No</th>
                                                        <th>Mesej<br>
                                                        </th>
                                                        <th>Tarikh Mula<br>
                                                            </th>
                                                        <th>Tarikh Akhir
                                                        </th>
                                                        <th>Icon New
                                                        </th>
                                                        <th>Tindakan
                                                        </th>


                                                    </tr>
                                                </thead>
                                                <tbody style= "max-width: 100px;
                                                word-break: break-word;">
                                                    @foreach($pengumuman as $data)
                                                    <tr>
                                                        <td>
                                                            {{$data->Id}}
                                                        </td>
                                                        <td >
                                                            {{$data->Message}}
                                                        </td>
                                                        <td >
                                                            {{$data->Start_date}}
                                                        </td>
                                                        <td>
                                                            {{$data->End_date}}
                                                        </td>
                                                        <td >
                                                            {{$data->Icon_new}}
                                                        </td>
                                                        <td >
                                                            <div class="icon" style="text-align: center" >
                                                            <a href="{{ route('admin.editpengumuman',[$data->Id]) }}">
                                                                <i class="fas fa-edit fa-lg" style="color: #228c1c" >
                                                                </i>
                                                            </a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                        </div>
                                    </section>


                                    {{-- <div class="row" style=" float:left">

                                            <div class="text-left col-md-8">
                                                <a href="{{ route('admin.tambahpengumuman') }}" class="btn btn-primary ">
                                                    Tambah
                                                </a>

                                            </div>
                                    </div> --}}



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

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


@endsection
