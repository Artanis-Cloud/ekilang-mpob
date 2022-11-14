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

                    <div class="col-11 align-self-center" style="text-align: right">
                        <button class="dt-button buttons-excel buttons-html5"   style="background-color: white; color: #0a7569; "
                         onclick="tablesToExcel(['tbl1','tbl2','tbl3','tbl4','tbl5','tbl6','tbl7','tbl8','tbl9'],
                        ['Maklumat Syarikat','TARIKH TERIMA PENYATA BULANAN','STOK AWAL BULAN DI PREMIS','BELIAN DAN TERIMAAN','PENGELUARAN','DIGUNAKAN UNTUK PROSES SELANJUTNYA',
                        'JUALAN DAN EDARAN TEMPATAN','EKSPORT','STOK AKHIR BULAN DILAPOR'],
                         'Ringkasan Penyata.xls', 'Excel')"><i class="fa fa-file-excel" style="color: #0a7569"></i> Excel</button>
                        <button type="button" class="dt-button buttons-excel buttons-html5"
                            onclick="myPrint('myfrm')" value="print"><i class="fa fa-print"></i>Cetak</button>
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
                                            <table border="1" class="table table-bordered" style="font-size: 14px" id="tbl1">
                                                <thead style="text-align: center">
                                                    <tr>
                                                        <th style="background-color: #d3d3d34d ">Nama Syarikat</th>
                                                        <td>{{ $data->e_np }}</td>
                                                        <th style="background-color: #d3d3d34d">No. Lesen</th>
                                                        <td>{{ $data->e_nl }}</td>
                                                        <th style="background-color: #d3d3d34d">Negeri</th>
                                                        <td>{{ $negeri->nama_negeri ?? '-' }}</td>
                                                        <th style="background-color: #d3d3d34d">Daerah</th>
                                                        <td>{{ $data_daerah->nama_daerah ?? '-' }}</td>

                                                    </tr>
                                                </thead>

                                            </table>
                                        </div><br>
                                        <p align="center">
                                        <font size="2.5"><b>TARIKH TERIMA PENYATA BULANAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl2" >
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
                                        <font size="2.5"><b>STOK AWAL BULAN DI PREMIS</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl3">
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
                                                        <td style="text-align: left"> {{ $proddesc[$keyProduk] ?? 0 }}</td>
                                                        {{-- {{ dd($proddesc) }} --}}
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto">{{ number_format($data_bulanan_ebio_b5[$keyProduk][$i] ?? 0,2) }}</td>

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
                                                    <th colspan="1"></th>
                                                    <th colspan="1">Jumlah</th>
                                                    @for ($i = 1; $i <= 12; $i++)

                                                    <td class="font-weight-bold text-center">{{ number_format( $total_col_bulan_b5[$i]?? 0,2) }}</td>

                                                    @endfor
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <p align="center">
                                        <font size="2.5"><b>BELIAN / TERIMAAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl4">
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
                                                            <td style="text-align: left"> {{ $proddesc[$keyProduk] ?? 0 }}</td>
                                                            @for ($i=1; $i<=12;$i++)
                                                                <td class="text-center" style="width:auto">{{ number_format($data_bulanan_ebio_b6[$keyProduk][$i] ?? 0,2) }}</td>

                                                                @php
                                                                    $total_col_bulan_b6[$i] += $data_bulanan_ebio_b6[$keyProduk][$i] ?? 0 ;
                                                                @endphp

                                                            @endfor
                                                            <td class="font-weight-bold text-center">{{ number_format($total6[$keyProduk] ?? 0,2) }}</td>
                                                        </tr>
                                                    @endforeach

                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="1"></th>
                                                        <th colspan="1">Jumlah</th>
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
                                        <font size="2.5"><b>PENGELUARAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl5">
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
                                                            <td style="text-align: left"> {{ $proddesc[$keyProduk] ?? 0 }}</td>
                                                            @for ($i=1; $i<=12;$i++)

                                                                <td class="text-center" style="width:auto">{{ number_format($data_bulanan_ebio_b7[$keyProduk][$i] ?? 0,2) }}</td>

                                                                @php
                                                                    $total_col_bulan_b7[$i] += $data_bulanan_ebio_b7[$keyProduk][$i] ?? 0 ;
                                                                @endphp

                                                            @endfor
                                                            <td class="font-weight-bold text-center">{{number_format( $total7[$keyProduk] ?? 0,2) }}</td>
                                                        </tr>
                                                    @endforeach

                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="1"></th>
                                                        <th colspan="1">Jumlah</th>
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
                                        <font size="2.5"><b>DIGUNAKAN UNTUK PROSES SELANJUTNYA</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl6">
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
                                                        <td style="text-align: left"> {{ $proddesc[$keyProduk] ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto">{{ number_format($data_bulanan_ebio_b8[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b8[$i] += $data_bulanan_ebio_b8[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor
                                                        <td class="font-weight-bold text-center">{{number_format( $total8[$keyProduk] ?? 0,2) }}</td>
                                                    </tr>
                                                    @endforeach


                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="1"></th>
                                                        <th colspan="1">Jumlah</th>
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
                                        <font size="2.5"><b>JUALAN / EDARAN TEMPATAN</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl7">
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
                                                        <td style="text-align: left"> {{ $proddesc[$keyProduk] ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto">{{ number_format($data_bulanan_ebio_b9[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b9[$i] += $data_bulanan_ebio_b9[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor
                                                        <td class="font-weight-bold text-center">{{ number_format( $total9[$keyProduk] ?? 0,2) }}</td>
                                                    </tr>
                                                    @endforeach


                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="1"></th>
                                                        <th colspan="1">Jumlah</th>
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
                                        <font size="2.5"><b>EKSPORT</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl8">
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
                                                        <td style="text-align: left"> {{ $proddesc[$keyProduk] ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto">{{ number_format($data_bulanan_ebio_b10[$keyProduk][$i] ?? 0,2) }}</td>

                                                            @php
                                                                $total_col_bulan_b10[$i] += $data_bulanan_ebio_b10[$keyProduk][$i] ?? 0 ;
                                                            @endphp
                                                        @endfor
                                                        <td class="font-weight-bold text-center">{{ number_format( $total10[$keyProduk] ?? 0,2) }}</td>
                                                    </tr>
                                                    @endforeach


                                                    <tr class="font-weight-bold text-center" style="background-color: #d3d3d34d" >
                                                        <th colspan="1"></th>
                                                        <th colspan="1">Jumlah</th>
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
                                        <font size="2.5"><b>STOK AKHIR BULAN DILAPOR</b><br></font>
                                        </p>
                                        <div class="col-12 table-responsive ">
                                            <table class="table table-bordered table-responsive-lg text-center" style="font-size: 13px" id="tbl9">
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
                                                        <td style="text-align: left"> {{ $proddesc[$keyProduk] ?? 0 }}</td>
                                                        @for ($i=1; $i<=12;$i++)
                                                            <td class="text-center" style="width:auto">{{ number_format($data_bulanan_ebio_b11[$keyProduk][$i] ?? 0,2) }}</td>

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

<script>
  var tablesToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , tmplWorkbookXML = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
      + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>'
      + '<Styles>'
      + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
      + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
      + '</Styles>'
      + '{worksheets}</Workbook>'
    , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
    , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    return function(tables, wsnames, wbname, appname) {
      var ctx = "";
      var workbookXML = "";
      var worksheetsXML = "";
      var rowsXML = "";

      for (var i = 0; i < tables.length; i++) {
        if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
        for (var j = 0; j < tables[i].rows.length; j++) {
          rowsXML += '<Row>'
          for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
            var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
            var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
            var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
            dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
            var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
            dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
            ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                   , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                   , data: (dataFormula)?'':dataValue
                   , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                  };
            rowsXML += format(tmplCellXML, ctx);
          }
          rowsXML += '</Row>'
        }
        ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
        worksheetsXML += format(tmplWorksheetXML, ctx);
        rowsXML = "";
      }

      ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
      workbookXML = format(tmplWorkbookXML, ctx);

console.log(workbookXML);

      var link = document.createElement("A");
      link.href = uri + base64(workbookXML);
      link.download = wbname || 'Workbook.xls';
      link.target = '_blank';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  })();
</script>



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
