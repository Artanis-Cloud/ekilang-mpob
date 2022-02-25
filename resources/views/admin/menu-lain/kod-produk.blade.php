@extends($layout)

@section('content')

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

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
                                    style="color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
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
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Kod & Nama Produk</h3>
                                        <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Senarai Kod & Nama Produk</h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>
                                    <section class="section">
                                        <form method="get" action="" id="myfrm">
                                        <div class="card">


                                            <table class='table' id="table1">
                                                <thead>

                                                    <tr>
                                                        <th>Kod Produk</th>
                                                        <th>Nama Produk</th>
                                                        <th>Nama Kumpulan Produk</th>
                                                        <th>Nama Panjang Produk</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($produk as $data)
                                                        <tr>
                                                            <td>
                                                                {{ $data->prodid }}
                                                            </td>
                                                            <td>
                                                                {{ $data->prodname }}
                                                            </td>
                                                            <td>
                                                                {{ $data->prodcat }}
                                                            </td>
                                                            <td>
                                                                {{ $data->proddesc }}
                                                            </td>


                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                            <div class="text-right col-md-12 mb-4 ">
                                                <button type="button" class="btn btn-primary " style="float: right"
                                                        onclick="myPrint('myfrm')" value="print">Cetak</button>
                                            </div>
                                            {{-- <h1 style="page-break-before:always"></h1>

                                            <div class="row form-group" style="padding-top: 10px; ">



                                                <div class="text-right col-md-7 mb-2 ">
                                                    <button type="button" class="btn btn-primary " style="float: right"
                                                        onclick="myPrint('myfrm')" value="print">Cetak</button>
                                                </div>

                                            </div> --}}

                                        </div>
                                        </form>
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
