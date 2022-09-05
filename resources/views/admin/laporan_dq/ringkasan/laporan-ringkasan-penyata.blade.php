@extends('layouts.main')

<style>
    /* Style the tab */
    @media print { @page {size: auto !important} 
}
/* body {
     height: calc(100vh - 4rem);
 } */

 /* .card-body {
     max-width: 98.57rem;
     margin:  auto;
     min-height: 100%;
 }  */

</style>
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
                    <div class="row">
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>
                    </div>
                    <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary "
                                onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div>
                </div>
                <form method="get" action="" id="myfrm">

                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- @foreach ($pelesens as $data) --}}
                            <div class="card-body">

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
                                            <table border="1" class="table table-bordered" style="font-size: 14px">
                                                <thead style="text-align: center">
                                                    <tr>
                                                        <th style="background-color: #d3d3d34d ">Nama Syarikat</th>
                                                        <td>{{ $data->e_np }}</td>
                                                        <th style="background-color: #d3d3d34d">No. Lesen</th>
                                                        <td>{{ $data->e_nl }}</td>
                                                        <th style="background-color: #d3d3d34d">Negeri</th>
                                                        <td>{{ $negeri->nama_negeri }}</td>
                                                        <th style="background-color: #d3d3d34d">Daerah</th>
                                                        <td>{{ $data_daerah->nama_daerah }}</td>

                                                    </tr>
                                                </thead>

                                            </table>
                                        </div><br>
                                        <p align="center">
                                        <font size="2"><b>TARIKH TERIMA PENYATA BULANAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" >
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" > {{$ebio_sdate[$i] ?? 0 }}</td>
                                                        @endfor

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>
                                        <p align="center">
                                        <font size="2"><b>STOK AWAL BULAN DI PREMIS</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 10%">Nama Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i <= 13; $i++)
                                                        @php
                                                            $total_col_bulan_b5[$i] = 0;
                                                        @endphp
                                                    @endfor
                                                    @foreach ($data_bulanan_ebio_b5 as $keyProduk => $data_ebio_b5)


                                                    <tr>
                                                        <td style="text-align: left"> {{ $keyProduk }}</td>
                                                        <td style="text-align: left"> {{ $data3->proddesc ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto">
                                                                {{ number_format($data_bulanan_ebio_b5[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b5[$i] += $data_bulanan_ebio_b5[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor


                                                    </tr>
                                                    {{-- @php
                                                        $total_b5+= $data_ebio_b5;
                                                    @endphp --}}
                                                    @endforeach


                                                <tr style="background-color: #d3d3d34d" >
                                                    <th colspan="2">Jumlah</th>
                                                    @for ($i = 1; $i <= 12; $i++)

                                                    <td class="font-weight-bold text-center">{{ number_format( $total_col_bulan_b5[$i]?? 0,2) }}</td>

                                                    @endfor
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p align="center">
                                        <font size="2"><b>BELIAN / TERIMAAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 10%">Nama Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @for ($i = 1; $i <= 13; $i++)
                                                        @php
                                                            $total_col_bulan_b6[$i] = 0;
                                                            $total_all_bulan_b6 = 0;
                                                        @endphp
                                                    @endfor
                                                        
                                                    @foreach ($data_bulanan_ebio_b6 as $keyProduk => $data_ebio_b6)
                                                        <tr>
                                                            <td style="text-align: left"> {{ $keyProduk }}</td>
                                                            <td style="text-align: left"> {{ $data3->proddesc ?? 0 }}</td>
                                                            @for ($i=1; $i<=12;$i++)
                                                                <td class="text-center" style="width:auto"> 
                                                                    {{ number_format($data_bulanan_ebio_b6[$keyProduk][$i] ?? 0,2) }}</td>

                                                                @php
                                                                    $total_col_bulan_b6[$i] += $data_bulanan_ebio_b6[$keyProduk][$i] ?? 0 ;
                                                                @endphp

                                                            @endfor
                                                            <td class="font-weight-bold text-center">{{ number_format($total6[$keyProduk] ?? 0,2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="2">Jumlah</th>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                        
                                                            <td class="text-center">{{ number_format( $total_col_bulan_b6[$i] ?? 0,2) }}</td>
                                                            @php
                                                                $total_all_bulan_b6 += $total_col_bulan_b6[$i] ?? 0 ;
                                                            @endphp

                                                        @endfor
                                                        <td class="text-center">{{ number_format( $total_all_bulan_b6 ?? 0,2) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p align="center">
                                        <font size="2"><b>DIGUNAKAN UNTUK PROSES SELANJUTNYA</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 10%">Nama Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @for ($i = 1; $i <= 13; $i++)
                                                        @php
                                                            $total_col_bulan_b7[$i] = 0;
                                                            $total_all_bulan_b7 = 0;
                                                        @endphp
                                                    @endfor

                                                    @foreach ($data_bulanan_ebio_b7 as $keyProduk => $data_ebio_b7)
                                                        <tr>
                                                            <td style="text-align: left"> {{ $keyProduk }}</td>
                                                            <td style="text-align: left"> {{ $data3->proddesc ?? 0 }}</td>
                                                            @for ($i=1; $i<=12;$i++)

                                                                <td class="text-center" style="width:auto">
                                                                    {{ number_format($data_bulanan_ebio_b7[$keyProduk][$i] ?? 0,2) }}</td>

                                                                @php
                                                                    $total_col_bulan_b7[$i] += $data_bulanan_ebio_b7[$keyProduk][$i] ?? 0 ;
                                                                @endphp

                                                            @endfor
                                                            <td class="font-weight-bold text-center">{{number_format( $total7[$keyProduk] ?? 0,2) }}</td>
                                                        </tr>
                                                    @endforeach

                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="2">Jumlah</th>
                                                        @for ($i = 1; $i <= 12; $i++)

                                                            <td class="text-center">{{number_format( $total_col_bulan_b7[$i] ?? 0,2) }}</td>
                                                            @php
                                                                $total_all_bulan_b7 += $total_col_bulan_b7[$i] ?? 0 ;
                                                            @endphp
                                                            
                                                        @endfor
                                                        <td class="text-center">{{number_format( $total_all_bulan_b7 ?? 0,2) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p align="center">
                                        <font size="2"><b>PENGELUARAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 10%">Nama Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i <= 13; $i++)
                                                        @php
                                                            $total_col_bulan_b8[$i] = 0;
                                                            $total_all_bulan_b8 = 0;
                                                        @endphp
                                                    @endfor

                                                    @foreach ($data_bulanan_ebio_b8 as $keyProduk => $data_ebio_b8)


                                                    <tr>
                                                        <td style="text-align: left"> {{ $keyProduk }}</td>
                                                        <td style="text-align: left"> {{ $data3->proddesc ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto"> 
                                                                {{ number_format($data_bulanan_ebio_b8[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b8[$i] += $data_bulanan_ebio_b8[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor
                                                        <td class="font-weight-bold text-center">{{number_format( $total8[$keyProduk] ?? 0,2) }}</td>
                                                    </tr>
                                                    @endforeach


                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="2">Jumlah</th>
                                                        @for ($i = 1; $i <= 12; $i++)

                                                            <td class="text-center">{{number_format( $total_col_bulan_b8[$i] ?? 0,2) }}</td>
                                                            @php
                                                                $total_all_bulan_b8 += $total_col_bulan_b8[$i] ?? 0 ;
                                                            @endphp
                                                            
                                                        @endfor
                                                        <td class="text-center">{{number_format( $total_all_bulan_b8 ?? 0,2) }}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p align="center">
                                        <font size="2"><b>JUALAN / EDARAN TEMPATAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 10%">Nama Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i <= 13; $i++)
                                                        @php
                                                            $total_col_bulan_b9[$i] = 0;
                                                            $total_all_bulan_b9 = 0;
                                                        @endphp
                                                    @endfor

                                                    @foreach ($data_bulanan_ebio_b9 as $keyProduk => $data_ebio_b9)


                                                    <tr>
                                                        <td style="text-align: left"> {{ $keyProduk }}</td>
                                                        <td style="text-align: left"> {{ $data3->proddesc ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto"> 
                                                                {{ number_format($data_bulanan_ebio_b9[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b9[$i] += $data_bulanan_ebio_b9[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor
                                                        <td class="font-weight-bold text-center">{{ number_format( $total9[$keyProduk] ?? 0,2) }}</td>
                                                    </tr>
                                                    @endforeach


                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="2">Jumlah</th>
                                                        @for ($i = 1; $i <= 12; $i++)

                                                        <td class="text-center">{{ number_format( $total_col_bulan_b9[$i] ?? 0,2) }}</td>
                                                            @php
                                                                $total_all_bulan_b9 += $total_col_bulan_b9[$i] ?? 0 ;
                                                            @endphp
                                                            
                                                        @endfor
                                                        <td class="text-center">{{ number_format( $total_all_bulan_b9 ?? 0,2) }}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p align="center">
                                        <font size="2"><b>EKSPORT</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 10%">Nama Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i <= 13; $i++)
                                                        @php
                                                            $total_col_bulan_b10[$i] = 0;
                                                            $total_all_bulan_b10 = 0;
                                                        @endphp
                                                    @endfor

                                                    @foreach ($data_bulanan_ebio_b10 as $keyProduk => $data_ebio_b10)


                                                    <tr>
                                                        <td style="text-align: left"> {{ $keyProduk }}</td>
                                                        <td style="text-align: left"> {{ $data3->proddesc ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto"> 
                                                                {{ number_format($data_bulanan_ebio_b10[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b10[$i] += $data_bulanan_ebio_b10[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor
                                                        <td class="font-weight-bold text-center">{{ number_format( $total10[$keyProduk] ?? 0,2) }}</td>
                                                    </tr>
                                                    @endforeach


                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="2">Jumlah</th>
                                                        @for ($i = 1; $i <= 12; $i++)

                                                            <td class="text-center">{{ number_format($total_col_bulan_b10[$i] ?? 0,2) }}</td>
                                                            @php
                                                                $total_all_bulan_b10 += $total_col_bulan_b10[$i] ?? 0 ;
                                                            @endphp
                                                            
                                                        @endfor
                                                        <td class="text-center">{{ number_format($total_all_bulan_b10 ?? 0,2) }}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p align="center">
                                        <font size="2"><b>STOK AKHIR BULAN DILAPOR</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center">
                                                <thead>
                                                    <tr style="background-color: #d3d3d34d">
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 10%">Nama Produk</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jan</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Feb</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mac</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Apr</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Mei</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jun</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Jul</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Ogos</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Sept</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Okt</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Nov</th>
                                                        <th scope="col" style="vertical-align: middle; width: 5%">Dis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i <= 13; $i++)
                                                        @php
                                                            $total_col_bulan_b11[$i] = 0;
                                                        @endphp
                                                    @endfor

                                                    @foreach ($data_bulanan_ebio_b11 as $keyProduk => $data_ebio_b11)


                                                    <tr>
                                                        <td style="text-align: left"> {{ $keyProduk }}</td>
                                                        <td style="text-align: left"> {{ $data3->proddesc ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto"> 
                                                                {{ number_format($data_bulanan_ebio_b11[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b11[$i] += $data_bulanan_ebio_b11[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor
                                                    </tr>
                                                    @endforeach

                                                    <tr  class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="2">Jumlah</th>
                                                        @for ($i = 1; $i <= 12; $i++)

                                                            <td class="text-center">{{  number_format($total_col_bulan_b11[$i] ?? 0,2) }}</td>

                                                        @endfor
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

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" >
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

{{-- <script>
    function
        document.getElementById("myfrm").style.fontFamily = "Rubik,sans-serif";
        var printdata = document.getElementById(myfrm);
        newwin = window.open("");
        newwin.document.write(printdata.outerHTML );
        newwin.print();
        newwin.close();
    }

</script> --}}
<link rel="stylesheet" href="print.css" type="text/css" media="print" />

    <script>
        function myPrint(myfrm) {
        var restorepage = $('body').html();
        var printcontent = $('#' + myfrm).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
    </script>
      {{-- <script>
        function myPrint(myfrm) {
            document.getElementById("myfrm").style.fontFamily = "Rubik,sans-serif";
            var printdata = document.getElementById(myfrm);
            newwin = window.open("",'_blank', 'width=3000, height=3000');
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script> --}}
    
@endsection
