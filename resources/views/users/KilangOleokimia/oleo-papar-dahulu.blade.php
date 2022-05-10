@extends('layouts.main')

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="margin-left:5%; color:white; background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center">
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
                <form method="get" action="" id="myfrm">
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- <div class="card-header border-bottom">
                        <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                    </div> --}}
                        <br>
                        <br>
                        <div class="card-body">
                            {{-- <div class="row"> --}}
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">





                                    <body>
                                        {{-- <p align="left">
                                            PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}
                                            <div align="right">
                                                <table border="0" width="25%">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) CM 4</b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) PX 4-CM </b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) PM 4-CM </b></p>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div><br>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                            height="100">
                                        </p>
                                        <title>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4<br>

                                                BULAN :&nbsp;&nbsp; @if($users->e104_bln == 1)
                                                JANUARI
                                                @elseif($users->e104_bln == 2) FEBRUARI
                                                @elseif($users->e104_bln == 3) MAC
                                                @elseif($users->e104_bln == 4) APRIL
                                                @elseif($users->e104_bln == 5) MEI
                                                @elseif($users->e104_bln == 6) JUN
                                                @elseif($users->e104_bln == 7) JULAI
                                                @elseif($users->e104_bln == 8) OGOS
                                                @elseif($users->e104_bln == 9) SEPTEMBER
                                                @elseif($users->e104_bln == 10) OKTOBER
                                                @elseif($users->e104_bln == 11) NOVEMBER
                                                @elseif($users->e104_bln == 12) DISEMBER
                                                @endif
                                                &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $users->e104_thn }}
                                            </b><br>

                                        </p>
                                        <hr>

                                        <table border="0" width="100%" cellspacing="0">

                                            <tbody>
                                                <tr>

                                                    <td width="25%" height="19">Nombor Lesen
                                                    </td>

                                                    <td width="88%" height="19"><b>
                                                                {{ auth()->user()->username }}
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">Nama Premis
                                                    </td>

                                                    <td width="88%" height="19"><b>{{ auth()->user()->name }}
                                                        </b></td>

                                                </tr>

                                            </tbody>
                                        </table>

                                        <hr>

                                        <p></p>


                                        <p align="left"><b>
                                                <font color="#0000FF">MAKLUMAT PELESEN </font>
                                            </b></p>

                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">

                                            <tbody>


                                                <tr>

                                                    <td width="35%">Alamat Premis Berlesen</td>

                                                    <td width="65%"><b>{{ $pelesen->e_ap1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $pelesen->e_ap2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $pelesen->e_ap3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%"><b>{{ $pelesen->e_as1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $pelesen->e_as2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $pelesen->e_as3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $pelesen->e_notel }}</b>

                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Faks&nbsp;&nbsp;&nbsp;
                                                        <b>{{ $pelesen->e_nofax }}</b>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $pelesen->e_email }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $pelesen->e_npg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $pelesen->e_jpg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $pelesen->e_npgtg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $pelesen->e_jpgtg }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>
                                        <p><b>
                                                <font color="#0000FF">BAHAGIAN 1 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
                                                    SAWIT</font>
                                            </b> </p>
                                        <table border="1" class="table table-bordered" width="100%"
                                            bordercolor="#000000" cellspacing="0" cellpadding="0"
                                            bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                            <tbody>
                                                <tr>
                                                    <td width="13%" align="center"><b>
                                                            <font size="2">Jenis Minyak</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kod Produk</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Awal Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Belian / Terimaan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Import</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Jumlah Yang Diproses</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Jualan / Edaran Tempatan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Eksport</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Akhir Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                </tr>
                                                @foreach ($ia as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{  $data->produk->prodname }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{  $data->e104_b4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $data->e104_b5 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $data->e104_b6 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $data->e104_b7 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $data->e104_b9 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $data->e104_b10 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $data->e104_b11 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"> {{ number_format( $data->e104_b12 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $data->e104_b13 ??  0,2)  }}</font>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td align="center">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia5 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia6 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia7 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia8 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia9 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia10 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia11 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia12 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalia13 ??  0,2) }}</b></font>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <p><b>
                                                <font color="#0000FF">BAHAGIAN 1 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                        MINYAK ISIRUNG SAWIT</font>
                                            </b> </p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="13%" align="center"><b>
                                                            <font size="2">Jenis Minyak</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kod Produk</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Awal Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Belian / Terimaan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Import</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Jumlah Yang Diproses</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Jualan / Edaran Tempatan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Eksport</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Akhir Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                </tr>
                                                @foreach ($ib as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->produk->prodname }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e104_b4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b5 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b6 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b7 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b9 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b10 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b11 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b12 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->e104_b13 ??  0,2)}}</font>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td align="center">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib5 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib6 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib7 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib8 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib9 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib10 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib11 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib12 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalib13 ??  0,2) }}</b></font>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <p><b>
                                            <font color="#0000FF">BAHAGIAN 1 (c) :&nbsp;&nbsp;&nbsp;&nbsp; MINYAK-MINYAK LAIN</font>
                                        </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="13%" align="center"><b>
                                                        <font size="2">Jenis Minyak</font><b></b>
                                                    </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kod Produk</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Awal Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Belian / Terimaan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Import</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Jumlah Yang Diproses</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Jualan / Edaran Tempatan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Eksport</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Akhir Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                </tr>
                                                @foreach ($ic as $data)
                                                <tr>
                                                    <td align="left">
                                                        <font size="2">{{ $data->produk->prodname }}</font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2">{{ $data->e104_b4 }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b5 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b6 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b7 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">0.00</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b9 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b10 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b11 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b12 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_b13 ??  0,2)}}</font>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td align="center">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic5 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic6 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic7 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic8 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic9 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic10 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic11 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic12 ??  0,2) }}0</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic13 ??  0,2) }}</b></font>
                                                    </td>
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <p><b>
                                                <font color="#0000FF">BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </font>
                                            </b> </p>
                                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                    <td width="40%"><b>{{ $ii->e104_a5 }} Hari</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="60%">Kadar Penggunaan Kapasiti Sebulan</td>
                                                    <td width="40%"><b>{{ $ii->e104_a6 }} %</b></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>


                                        <p><b>
                                                <font color="#0000FF">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN PRODUK OLEOKIMIA</font>
                                            </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                            <tbody>
                                                <tr style="padding: 0.2rem 0.3rem">
                                                    <td width="13%" align="center"><b>
                                                            <font size="2">Jenis Minyak Sawit</font>
                                                        </b></td>
                                                    <td width="10%" align="center"><b>
                                                            <font size="2">Kod Produk</font>
                                                        </b></td>
                                                    <td width="10%" align="center"><b>
                                                            <font size="2">Belian / Terimaan</font>
                                                        </b></td>
                                                    <td width="10%" align="center"><b>
                                                            <font size="2">Pengeluaran</font>
                                                        </b></td>
                                                    <td width="10%" align="center"><b>
                                                            <font size="2">Jualan / Edaran Tempatan</font>
                                                        </b></td>
                                                    <td width="10%" align="center"><b>
                                                            <font size="2">Eksport</font>
                                                        </b></td>
                                                    <td width="10%" align="center"><b>
                                                            <font size="2">Stok Akhir</font>
                                                        </b></td>
                                                </tr>
                                                @foreach ($iii as $data)
                                                <tr>
                                                    <td align="left">
                                                        <font size="2">{{ $data->produk->prodname }}</font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2">{{ $data->e104_c3 }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_c4 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{  number_format($data->e104_c5 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_c6 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_c7 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_c8 ??  0,2)}}</font>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td align="center">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii4 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii5 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii6 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii7 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii8 ??  0,2) }}</b></font>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <p><b>
                                                <font color="#0000FF">BAHAGIAN 4 :&nbsp;&nbsp;&nbsp;&nbsp;EKSPORT PRODUK OLEOKIMIA DAN LAIN-LAIN PRODUK SAWIT

                                                </font>
                                            </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="15%" align="center"><b>
                                                            <font size="2">Nama Produk Sawit</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kod Produk</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Nombor Borang Kastam 2</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Tarikh Eksport</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kuantiti
                                                                (Tan Metrik)</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Nilai (RM)</font>
                                                    </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Kod Negara</font>
                                                    </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Destinasi Negara</font>
                                                    </b></td>
                                                </tr>
                                                @foreach ($iv as $data)
                                                <tr>
                                                    <td align="left">
                                                        <font size="2">{{  $data->produk->prodname }}</font>
                                                    </td>
                                                    <td align="left">
                                                        <font size="2">{{ $data->produk->prodid }}</font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2">{{ $data->e104_d5 }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ $formatteddat2 }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($data->e104_d7 ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{number_format ($data->e104_d8 ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ $data->e104_d9 }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{$data->negara->namanegara}}</font>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                {{-- <tr>
                                                    <td align="center">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b></b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b></b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b></b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliv7 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliv8 ??  0,2) }}</b></font>
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                        </table>

                                            <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>
                                                <p>Tarikh Penghantaran:&nbsp;&nbsp;&nbsp; <b>{{ $formatteddate }}</b></p>
                                                <p>Nama Pegawai Melapor:&nbsp;&nbsp; <b>{{ $users->e104_npg }}</b>
                                                </p>
                                                <p>Jawatan Pegawai Melapor:&nbsp;&nbsp; <b>{{ $users->e104_jpg }}</b></p>
                                                <p>No Telefon Kilang:&nbsp;&nbsp; <b>{{ $users->e104_notel }}</b>
                                                </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>

                    <h1 style="page-break-before:always"></h1>

                    <div class="row form-group" style="padding-top: 10px; ">

                        <div class="text-right col-md-7 mb-4 ">
                            <button type="button" class="btn btn-primary "
                                style="float: right" onclick="myPrint('myfrm')" value="print">Cetak</button>
                        </div>

                    </div>

                                        <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        PENGESAHAN</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Anda pasti mahu menghantar penyata ini?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block"
                                            style="color:#275047">Tidak</span>
                                    </button>
                                    <button type="button" class="btn btn-primary ml-1"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Hantar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

        </div>

    </div>






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
