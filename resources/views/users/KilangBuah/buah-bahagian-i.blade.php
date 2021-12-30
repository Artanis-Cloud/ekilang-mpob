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

        <div class=" mt-5 mb-4 row">
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
                                                    <a href="{{ $breadcrumb['link'] }}" style="color: white !important;"
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
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:3%">Bahagian I</h3>
                                    <h5 style="color: rgb(39, 80, 71)">Maklumat Belian, Proses, Pengeluaran,
                                        Jualan/Edaran, Stok Akhir <br>(Berdasarkan dalam premis kilang sahaja)</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>




                                <div class="col-12 mt-5">
                                    <div class="mb-2" style="text-align: right">
                                        <a href="{{ asset('manual/kilangbuah/1.pdf') }}" target="_blank"
                                            style="text-align:right"><i><u>Panduan
                                                    Mengisi Maklumat Bahagian I</u></i></a>
                                    </div>
                                    <div class="row" id="table-bordered">

                                        <form wire:submit.prevent='store'>
                                            <div class="card">

                                                <div class="card-content">


                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead style="text-align: center">
                                                                <tr>
                                                                    <th>Butiran</th>
                                                                    <th>Buah Kelapa Sawit (FFB) <br>
                                                                        Kod 52</th>
                                                                    <th>Minyak Sawit Mentah (CPO)
                                                                        <br> Kod 01
                                                                    </th>
                                                                    <th>Isirung (PK) <br> Kod 51
                                                                    </th>
                                                                    <th>Minyak Keledak (Sludge Oil)
                                                                        <br> Kod 49
                                                                    </th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-bold-500">A.
                                                                        Stok Awal Di Premis</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">B.
                                                                        Pembelian / Penerimaan</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">C.
                                                                        Diproses</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">D.
                                                                        Pengeluaran</td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">E.
                                                                        Penjualan / Pengedaran Tempatan</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">F.
                                                                        Eksport Terus Dari Premis</td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10" disabled> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10" disabled> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10" disabled> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10" disabled> --}}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">G.
                                                                        Stok Akhir Di Premis</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            onkeypress="return isNumberKey(event)">
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>









                                            {{-- <div class="row" style="padding-top: 35px; float:right">

                                                        <div class="col-md-12">
                                                            <button type="button" class="btn  btn-primary"
                                                                data-toggle="modal" data-target="#confirmation">Simpan &
                                                                Seterusnya</button>
                                                        </div>

                                                    </div> --}}




                                            <div class="row" style=" float:right">

                                                <div class="col-md-12">

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">
                                                        Simpan & Seterusnya
                                                    </button>
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


                                    <br>
                                    <br>





                                    </form>

                                </div>
                            </div>
                        </div>






                    </div>
                </div>






                <br>
                <br>
                <br>
                <br>




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
