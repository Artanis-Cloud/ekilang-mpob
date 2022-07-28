@extends('layouts.main')

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Dynamic Query Biodiesel</h4>
                        </div>
                        <div class="col-7 align-self-center" style="margin-left:-1%;">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}" style="color: black !important;"
                                                        onMouseOver="this.style.color='#25877b'"
                                                        onMouseOut="this.style.color='black'">
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
                <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                    <div class="col-1 align-self-center">
                        <a href="javascript:history.back()" class="btn" style=" color:rgb(64, 69, 68)"><i
                                class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                    <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary " onclick="myPrint('myfrm')"
                            value="print">Cetak</button>
                    </div>
                </div>
                <form method="get" action="" id="myfrm">

                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- @foreach ($pelesens as $data) --}}
                            <div class="card-body">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">



                                        <body>


                                            <p align="center">
                                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                                            </p>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>RINGKASAN MAKLUMAT PENYATA BULANAN BIODIESEL<br>


                                                </b><br>

                                            </p>


                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0" style="font-size: 13px">
                                                    <thead style="text-align: center">
                                                        <tr>
                                                            <th>Nama Syarikat</th>
                                                            <td>{{ $data->e_np }}</td>
                                                            <th>No. Lesen</th>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <th>Negeri</th>
                                                            <td>{{ $negeri->nama_negeri }}</td>
                                                            <th>Daerah</th>
                                                            <td>{{ $data->e_daerah }}</td>

                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div><br>
                                            <p align="center">
                                            <font size="2">TARIKH TERIMA PENYATA BULANAN<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            {{-- <td> {{ $value[$key]->prodid }}</td> --}}

                                                            {{-- @foreach ($no_batches as $key =>  $no_batch) --}}
                                                            <tr>


                                                                @foreach ( $data_bulanan_ebio_date as  $data )
                                                                    <td style="width: 15px"> {{$data }}</td>
                                                                @endforeach

                                                            </tr>
                                                            {{-- @endforeach --}}



                                                        </tr>



                                                    </tbody>
                                                </table>
                                            </div><br>
                                            <p align="center">
                                            <font size="2">STOK AWAL BULAN DIPREMIS<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                            <th scope="col" style="vertical-align: middle">Purata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach($no_batches as $key =>  $no_batch) --}}
                                                            {{-- @foreach($hbiob as $key =>  $value) --}}
                                                            <tr>
                                                                {{-- <td> {{ $value[$key]->prodid }}</td> --}}

                                                                {{-- @foreach ($no_batches as $key =>  $no_batch) --}}
                                                                <tr>


                                                                    <td> {{ $hbiob[0]->ebio_b4 ?? 0 }}</td>
                                                                    <td> {{ $hbiob[0]->proddesc ?? 0 }}</td>
                                                                    @foreach ( $data_bulanan_ebio_b5 as  $data )
                                                                        <td> {{$data}}</td>
                                                                    @endforeach

                                                                </tr>
                                                                {{-- @endforeach --}}



                                                            </tr>
                                                            {{-- @endforeach --}}
                                                        {{-- @endforeach --}}


                                                    <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                        <th colspan="2">Jumlah</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <p align="center">
                                            <font size="2">BELIAN / TERIMAAN<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                            <th scope="col" style="vertical-align: middle">Purata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            {{-- <td> {{ $value[$key]->prodid }}</td> --}}
                                                            <tr>


                                                                <td> {{ $hbiob[0]->ebio_b4 ?? 0 }}</td>
                                                                <td> {{ $hbiob[0]->proddesc ?? 0 }}</td>
                                                                @foreach ( $data_bulanan_ebio_b6 as  $data )
                                                                    <td> {{$data}}</td>
                                                                @endforeach

                                                            </tr>

                                                        </tr>


                                                    <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                        <th colspan="2">Jumlah</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <p align="center">
                                            <font size="2">DIGUNAKAN UNTUK PROSES SELANJUTNYA<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                            <th scope="col" style="vertical-align: middle">Purata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            {{-- <td> {{ $value[$key]->prodid }}</td> --}}
                                                            <tr>


                                                                <td> {{ $hbiob[0]->ebio_b4 ?? 0 }}</td>
                                                                <td> {{ $hbiob[0]->proddesc ?? 0 }}</td>
                                                                @foreach ( $data_bulanan_ebio_b7 as  $data )
                                                                    <td> {{$data}}</td>
                                                                @endforeach

                                                            </tr>

                                                        </tr>


                                                    <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                        <th colspan="2">Jumlah</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <p align="center">
                                            <font size="2">PENGELUARAN<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                            <th scope="col" style="vertical-align: middle">Purata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <tr>


                                                                <td> {{ $hbiob[0]->ebio_b4 ?? 0 }}</td>
                                                                <td> {{ $hbiob[0]->proddesc ?? 0 }}</td>
                                                                @foreach ( $data_bulanan_ebio_b8 as  $data )
                                                                    <td> {{$data}}</td>
                                                                @endforeach

                                                            </tr>
                                                        </tr>


                                                    <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                        <th colspan="2">Jumlah</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <p align="center">
                                            <font size="2">JUALAN / EDARAN TEMPATAN<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                            <th scope="col" style="vertical-align: middle">Purata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <tr>
                                                                {{-- <td> {{ $value[$key]->prodid }}</td> --}}
                                                                <tr>


                                                                    <td> {{ $hbiob[0]->ebio_b4 ?? 0 }}</td>
                                                                    <td> {{ $hbiob[0]->proddesc ?? 0 }}</td>
                                                                    @foreach ( $data_bulanan_ebio_b9 as  $data )
                                                                        <td> {{$data}}</td>
                                                                    @endforeach

                                                                </tr>

                                                            </tr>
                                                        </tr>


                                                    <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                        <th colspan="2">Jumlah</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <p align="center">
                                            <font size="2">EKSPORT<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                            <th scope="col" style="vertical-align: middle">Purata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <tr>
                                                                {{-- <td> {{ $value[$key]->prodid }}</td> --}}
                                                                <tr>


                                                                    <td> {{ $hbiob[0]->ebio_b4 ?? 0 }}</td>
                                                                    <td> {{ $hbiob[0]->proddesc ?? 0 }}</td>
                                                                    @foreach ( $data_bulanan_ebio_b10 as  $data )
                                                                        <td> {{$data}}</td>
                                                                    @endforeach

                                                                </tr>

                                                            </tr>
                                                        </tr>


                                                    <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                        <th colspan="2">Jumlah</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <p align="center">
                                            <font size="2">STOK AKHIR BULAN DILAPOR<br></font>
                                            </p>
                                            <div class="col-12 table-responsive ">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Nama Produk</th>
                                                            <th scope="col" style="vertical-align: middle">Jan</th>
                                                            <th scope="col" style="vertical-align: middle">Feb</th>
                                                            <th scope="col" style="vertical-align: middle">Mac</th>
                                                            <th scope="col" style="vertical-align: middle">Apr</th>
                                                            <th scope="col" style="vertical-align: middle">Mei</th>
                                                            <th scope="col" style="vertical-align: middle">Jun</th>
                                                            <th scope="col" style="vertical-align: middle">Julai</th>
                                                            <th scope="col" style="vertical-align: middle">Ogos</th>
                                                            <th scope="col" style="vertical-align: middle">Sep</th>
                                                            <th scope="col" style="vertical-align: middle">Okt</th>
                                                            <th scope="col" style="vertical-align: middle">Nov</th>
                                                            <th scope="col" style="vertical-align: middle">Dis</th>
                                                            <th scope="col" style="vertical-align: middle">Purata</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <tr>
                                                                {{-- <td> {{ $value[$key]->prodid }}</td> --}}
                                                                <tr>


                                                                    <td> {{ $hbiob[0]->ebio_b4 ?? 0 }}</td>
                                                                    <td> {{ $hbiob[0]->proddesc ?? 0 }}</td>
                                                                    @foreach ( $data_bulanan_ebio_b11 as  $data )
                                                                        <td> {{$data}}</td>
                                                                    @endforeach

                                                                </tr>

                                                            </tr>
                                                        </tr>


                                                    <tr style="background-color: #d3d3d34d" class="font-weight-bold text-right">
                                                        <th colspan="2">Jumlah</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </body>
                                    </div>

                            </div>

                            <br>
                            <hr>
                        {{-- @endforeach --}}

                    </div>
                </form>
            </div>
            <h1 style="page-break-before:always"></h1>


        </div>


    </div><!-- End Hero -->




    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calc').change(function() {
                var total = 0;
                $('.calc').each(function() {
                    if ($(this).val() != '') {
                        total += parseInt($(this).val());
                    }
                });
                $('#total').html(total);
            });
        });
    </script>

    <script>
        function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script>

    </body>

    </html>
@endsection
