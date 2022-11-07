@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Terdahulu Kilang Penapis</h4>
                        </div>
                        <div class="col-7 align-self-center" style="margin-left:-1%;">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}"
                                                        style="color: black !important;"
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
                        <a href="javascript:history.back()" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                    {{-- <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary "
                                onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div> --}}
                </div>

                <div class="card" style="margin-right:2%; margin-left:2%">
                    <form method="get" action="" id="myfrm">
                        {{-- {{ dd($query) }} --}}

                        @foreach ($query[$key] as $data)
                        {{ dd($data) }}


                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">



                                        <body>
                                            {{-- <p align="left">
                                                    PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                            <div align="">
                                                <table border="0" width="100%">
                                                    <tbody style=" width:10rem; margin-right: -10px">
                                                        <tr>
                                                            <td width="85%" height="19">
                                                                <p align=""><b>{{ $data[$key]->kodpgw }}{{ $data[$key]->nosiri }}</b></p>
                                                            </td>
                                                            <td width="15%" height="19">
                                                                <p align="left"><b>MPOB(EL) RF 4</b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="85%" height="19">
                                                                <p align=""><b></b></p>
                                                            </td>
                                                            <td width="15%" height="19">
                                                                <p align="left" style="margin-top: -15px"><b>MPOB(EL) PX 4-RF </b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="87%" height="19">
                                                                <p align=""><b></b></p>
                                                            </td>
                                                            <td width="12%" height="19">
                                                                <p align="left" style="margin-top: -15px"><b>MPOB(EL) PM 4-RF </b></p>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div><br>

                                            <p align="center">
                                                <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                                    height="100">
                                            </p>

                                            <title>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4</title>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4<br>

                                                    BULAN :
                                                    @if($data[$key]->e101_bln == "01") JANUARI
                                                        @elseif($data[$key]->e101_bln == "02") FEBRUARI
                                                        @elseif($data[$key]->e101_bln == "03") MAC
                                                        @elseif($data[$key]->e101_bln == "04") APRIL
                                                        @elseif($data[$key]->e101_bln == "05") MEI
                                                        @elseif($data[$key]->e101_bln == "06") JUN
                                                        @elseif($data[$key]->e101_bln == "07") JULAI
                                                        @elseif($data[$key]->e101_bln == "08") OGOS
                                                        @elseif($data[$key]->e101_bln == "09") SEPTEMBER
                                                        @elseif($data[$key]->e101_bln == "10") OKTOBER
                                                        @elseif($data[$key]->e101_bln == "11") NOVEMBER
                                                        @elseif($data[$key]->e101_bln == "12") DISEMBER
                                                        @endif
                                                        &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $data[$key]->e101_thn }}
                                                </b><br>

                                            </p>
                                            <hr>

                                            <table border="0" width="111%" cellspacing="0">

                                                <tbody>
                                                    <tr>

                                                        <td width="25%" height="19">
                                                            Nombor Lesen
                                                        </td>

                                                        <td width="88%" height="19"><b>
                                                                {{ $data[$key]->e_nl }}
                                                            </b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="25%" height="19">
                                                            Nama Premis
                                                        </td>

                                                        <td width="88%" height="19" style="text-transform:uppercase"><b>
                                                                {{ $data[$key]->e_np }}
                                                            </b></td>

                                                    </tr>

                                                </tbody>
                                            </table>

                                            <hr>

                                            <p></p>


                                            <p align="left"><b>
                                                    <font style="font-size: 15px" color="#0c7c85">MAKLUMAT h_pelesen </font>
                                                </b></p>

                                            <table border="0" width="80%" cellpadding="0" cellspacing="0">

                                                <tbody>


                                                    <tr>

                                                        <td width="35%">Alamat Premis Berlesen</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_ap1 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_ap2 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_ap3 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Surat Menyurat</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_as1 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_as2 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_as3 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">No Telefon</td>

                                                        <td width="65%"><b>{{ $data[$key]->e_notel }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">No Faks</td>

                                                        <td width="65%"><b>{{ $data[$key]->e_nofax }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat emel </td>

                                                        <td width="65%"><b>{{ $data[$key]->e_email }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Melapor</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_npg }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Melapor</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_jpg }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_npgtg }}</b></td>

                                                    </tr>
                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                        <td width="65%" style="text-transform:uppercase"><b>{{ $data[$key]->e_jpgtg }}</b></td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                            <br>


                                            <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 : PRODUK MINYAK
                                                        SAWIT</font>
                                                </b> </p>

                                                <table border="1" class="table table-bordered" width="100%"
                                                bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" align="center"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Belian / Terima</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Import</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Pengeluaran</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Digunakan Untuk Proses Selanjutnya</font>
                                                                <b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Jualan / Edaran Tempatan</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Eksport</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Premis</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @foreach ($penyata1 as $key => $datai)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2.7">{{ $datai[$key]->comm_desc }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2.7">{{ $datai[$key]->F101B4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B5 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B6 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B7 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B8 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B9 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B10 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B11 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7"> {{ number_format($datai[$key]->F101B12 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B13 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai[$key]->F101B14 ??  0,2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach --}}
{{--
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib10 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib11 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib12 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib13 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalib14 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                            <br>

                                            <p><b>
                                                <font style="font-size: 15px" color="0c7c85">BAHAGIAN 2 : PRODUK
                                                    ISIRUNG MINYAK SAWIT </font>
                                            </b> </p>

                                                <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" align="center"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Pusat Simpanan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Belian / Terimaan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Digunakan Untuk Proses Selanjutnya</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Jualan / Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Pusat Simpanan</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @foreach ($ii as $key => $dataii)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2.7">{{ $dataii->produk->proddesc }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2.7">{{ $dataii->e101_b4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b5 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b6 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b7 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">0.00</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b9 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b10 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b11 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b12 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b13 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($dataii->e101_b14 ??  0,2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib10 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib11 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib12 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib13 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totaliib14 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>

                                            <br>


                                            <p><b>
                                                <font style="font-size: 15px"  color="0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI
                                                </font>
                                            </b></p>
                                            <table border="0" width="60%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                        {{-- <td width="40%"><b>{{ $data->e101_a1 }} Hari</b></td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td width="60%">Kadar Penggunaan Kapasiti (Refining) Sebulan</td>
                                                        {{-- <td width="40%"><b>{{ number_format($data->e101_a2 ??  0,2) }} %</b></td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td width="60%">Kadar Penggunaan Kapasiti (Fractionation) Sebulan
                                                        </td>
                                                        {{-- <td width="40%"><b>{{ number_format($data->e101_a3 ??  0,2) }} %</b></td> --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <p>

                                            <p><b>
                                                <font style="font-size: 15px" color="0c7c85">BAHAGIAN 4 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                    AKHIR
                                                    BERASASKAN MINYAK SAWIT DAN MINYAK ISIRUNG SAWIT -
                                                    BAHAN MAKANAN</font>
                                            </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Awal</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Jualan/Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Akhir</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @foreach ($iva as $dataiva)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $dataiva->produk->proddesc }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7">{{ $dataiva->e101_c4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->e101_c5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->e101_c6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->e101_c7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->e101_c8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->e101_c9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->e101_c10 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivac5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivac6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivac7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivac8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivac9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivac10 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                    AKHIR
                                                    BERASASKAN MINYAK SAWIT DAN MINYAK ISIRUNG SAWIT -
                                                    BAHAN BUKAN MAKANAN</font>
                                            </b></p>

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                <tbody>
                                                    <tr style="padding: 0.2rem 0.3rem; background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Awal</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Jualan / Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Akhir</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @foreach ($ivb as $dataivb)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $dataivb->produk->proddesc }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7">{{ $dataivb->e101_c4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->e101_c5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->e101_c6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->e101_c7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->e101_c8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->e101_c9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->e101_c10 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivbc5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivbc6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivbc7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivbc8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivbc9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalivbc10 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table><br>


                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 (a) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN /
                                                    TERIMAAN BEKALAN PRODUK SAWIT -
                                                    SENDIRI</font>
                                            </b></p>

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan Dari</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPKO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPKO</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @foreach ($va as $datava)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datava->prodcat->catname}}</font>
                                                        </td>
                                                        <td style="text-align: right; vertical-align:middle">
                                                            <font size="2.7">{{ number_format($datava->e101_d5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datava->e101_d6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datava->e101_d7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datava->e101_d8 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td style="text-align: right; vertical-align:middle">
                                                            <font size="2.7"><b>{{ number_format($totalvad5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalvad6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalvad7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalvad8 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 (b) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN /
                                                    TERIMAAN BEKALAN PRODUK SAWIT -
                                                    LUAR</font>
                                            </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan Dari</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPKO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPKO</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @foreach ($vb as $datavb)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavb->prodcat->catname }}</font>
                                                        </td>
                                                        <td style="text-align: right; vertical-align:middle">
                                                            <font size="2.7">{{ number_format($datavb->e101_d5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavb->e101_d6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavb->e101_d7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavb->e101_d8 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td style="text-align: right; vertical-align:middle">
                                                            <font size="2.7"><b>{{ number_format($totalvbd5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalvbd6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalvbd7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($totalvbd8 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 6 :&nbsp;&nbsp;&nbsp;&nbsp;
                                                    EKSPORT PRODUK SAWIT</font>
                                            </b></p>

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="14%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="7%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nombor Borang Kastam 2</font>
                                                            </b></td>
                                                        <td width="12%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Tarikh Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kuantiti<br> (Tan Metrik)</font><b></b>
                                                            </b></td>
                                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nilai (RM)</font>
                                                            </b></td>
                                                        <td width="6%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Negara</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Destinasi Negara</font>
                                                            </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 7 :&nbsp;&nbsp;&nbsp;&nbsp;
                                                    IMPORT PRODUK SAWIT</font>
                                            </b></p>

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="14%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="7%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nombor Borang Kastam 1</font>
                                                            </b></td>
                                                        <td width="12%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Tarikh Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kuantiti<br> (Tan Metrik)</font><b></b>
                                                            </b></td>
                                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nilai (RM)</font>
                                                            </b></td>
                                                        <td width="6%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Negara</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Destinasi Negara</font>
                                                            </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><br>

                                            <p style="font-size: 16px"><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>


                                            <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                                {{-- {{ $users[$key]->tkhsubmit }} --}}
                                            </p>
                                            <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                                <span  style="text-transform:uppercase">&nbsp;&nbsp;</span>
                                            </p>
                                            <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                                <span  style="text-transform:uppercase">&nbsp;&nbsp;</span>
                                            </p>
                                            <p>No Telefon Kilang: &nbsp;&nbsp;

                                                &nbsp;&nbsp;
                                            </p>


                                        </body>
                                    </div>
                                </div>
                            </div>

                            <br><hr><h1 style="page-break-after:always"></h1>

                        @endforeach
                    </form>
                    <div class="row justify-content-center ">

                        <button type="button" class="btn btn-primary " style="margin: 1%"
                            onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div>

                </div>
            </div>

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
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(myfrm).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
</script>

    </body>

    </html>
@endsection
