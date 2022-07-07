@extends('layouts.main')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Penyata Bulanan</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                    @if (!$loop->last)
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['link'] }}" style="color: rgb(64, 69, 68) !important;"
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

        {{-- <form method="get" action="" id="myfrm"> --}}
        <div class="card" style="margin-right:2%; margin-left:2%">

            <br>
            <br>
            <div class="card-body">
                <div class="row">
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
                                                <p align="left"><b>MPOB(EL) PM 4-CM</b></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- <div align="right">
                                            <table border="0" width="25%" id="table1">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p align="left"><b>MPOB(EL) MF 4</b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>MPOB(EL) PX 4-MF </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> --}}

                            <p style="text-align: center; vertical-align:middle">
                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                            </p>

                            <title>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4</title>
                            <p style="text-align: center; vertical-align:middle"><b>
                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                    </font>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4<br>

                                    BULAN :&nbsp;&nbsp;
                                    @if ($bulan == 1)
                                        JANUARI
                                    @elseif($bulan == 2)
                                        FEBRUARI
                                    @elseif($bulan == 3)
                                        MAC
                                    @elseif($bulan == 4)
                                        APRIL
                                    @elseif($bulan == 5)
                                        MEI
                                    @elseif($bulan == 6)
                                        JUN
                                    @elseif($bulan == 7)
                                        JULAI
                                    @elseif($bulan == 8)
                                        OGOS
                                    @elseif($bulan == 9)
                                        SEPTEMBER
                                    @elseif($bulan == 10)
                                        OKTOBER
                                    @elseif($bulan == 11)
                                        NOVEMBER
                                    @elseif($bulan == 12)
                                        DISEMBER
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                                </b><br>

                            </p>
                            <hr>

                            <table border="0" width="100%" cellspacing="0">

                                <tbody>
                                    <tr>

                                        <td width="25%" height="19">
                                            Nombor Lesen
                                        </td>

                                        <td width="88%" height="19"><b>

                                                {{ auth()->user()->username }}
                                            </b></td>

                                    </tr>

                                    <tr>

                                        <td width="25%" height="19">
                                            Nama Premis
                                        </td>

                                        <td width="88%" height="19"><b>
                                                {{ auth()->user()->name }}
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

                                        <td width="35%">No. Telefon</td>

                                        <td width="65%"><b>{{ $pelesen->e_notel }}</b>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="35%">No. Faks</td>

                                        <td width="65%"><b>{{ $pelesen->e_nofax }}</b>

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
                                    <font color="#0000FF">BAHAGIAN 1(a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
                                        SAWIT</font>
                                </b> </p>
                            <table border="1" class="table table-bordered" width="100%" bordercolor="#000000"
                                cellspacing="0" cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                <tbody>
                                    <tr>
                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jenis Minyak</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Belian/Terimaan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Import</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jumlah Yang Diproses</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Eksport</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir Di Premis</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyataia as $data)
                                        <tr>
                                            <td align="left">
                                                <font size="2">{{ $data->produk->prodname }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->e104_b4 }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b5 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b6 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b7 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">0.00</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b9 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b10 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b11 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2"> {{ number_format($data->e104_b12 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b13 ?? 0, 2) }}</font>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>JUMLAH</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>-</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total2 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total3 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total4 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total5 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total6 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total7 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total8 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($total9 ?? 0, 2) }}</b></font>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <p><b>
                                    <font color="#0000FF">BAHAGIAN 1(b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                        MINYAK ISIRUNG SAWIT</font>
                                </b> </p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jenis Minyak</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Belian/Terimaan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Import</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jumlah Yang Diproses</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Eksport</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir Di Premis</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyataib as $data)
                                        <tr>
                                            <td align="left">
                                                <font size="2">{{ $data->produk->prodname }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->e104_b4 }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b5 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b6 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b7 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">0.00</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b9 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b10 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b11 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b12 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b13 ?? 0, 2) }}</font>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>JUMLAH</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>-</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib2 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib3 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib4 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib5 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib6 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib7 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib8 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalib9 ?? 0, 2) }}</b></font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <p><b>
                                    <font color="#0000FF">BAHAGIAN 1(c) :&nbsp;&nbsp;&nbsp;&nbsp; MINYAK-MINYAK LAIN</font>
                                </b></p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jenis Minyak</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Belian/Terimaan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Import</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jumlah Yang Diproses</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Eksport</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir Di Premis</font><b></b>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyataic as $data)
                                        <tr>
                                            <td align="left">
                                                <font size="2">{{ $data->produk->prodname }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->e104_b4 }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b5 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b6 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b7 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">0.00</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b9 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b10 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b11 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b12 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_b13 ?? 0, 2) }}</font>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>JUMLAH</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>-</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic2 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic3 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic4 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic5 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic6 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic7 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic8 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totalic9 ?? 0, 2) }}</b></font>
                                        </td>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>

                            <p><b>
                                    <font color="#0000FF">BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HARI BEROPERASI DAN
                                        PENGGUNAAN KADAR KAPASITI
                                    </font>
                                </b> </p>
                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                        <td width="40%"><b>{{ $penyataii->e104_a5 }} Hari</b></td>
                                    </tr>
                                    <tr>
                                        <td width="60%">Kadar Penggunaan Kapasiti Sebulan</td>
                                        <td width="40%"><b>{{ $penyataii->e104_a6 }} %</b></td>
                                    </tr>

                                </tbody>
                            </table>
                            <br>


                            <p><b>
                                    <font color="#0000FF">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN PRODUK OLEOKIMIA
                                    </font>
                                </b></p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered"
                                style="padding: 0.2rem 0.3rem">
                                <tbody>
                                    <tr style="padding: 0.2rem 0.3rem">
                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jenis Minyak Sawit</font>
                                            </b></td>
                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Belian/Terimaan</font>
                                            </b></td>
                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Pengeluaran</font>
                                            </b></td>
                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran Tempatan</font>
                                            </b></td>
                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Eksport</font>
                                            </b></td>
                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir</font>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyataiii as $data)
                                        <tr>
                                            <td align="left">
                                                <font size="2">{{ $data->produk->prodname }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->e104_c3 }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_c4 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_c5 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_c6 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_c7 ?? 0, 2) }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e104_c8 ?? 0, 2) }}</font>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>JUMLAH</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>-</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totaliii ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totaliii2 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totaliii3 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totaliii4 ?? 0, 2) }}</b></font>
                                        </td>
                                        <td align="right">
                                            <font size="2"><b>{{ number_format($totaliii5 ?? 0, 2) }}</b></font>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>

                            <p><b>
                                    <font color="#0000FF">BAHAGIAN 4 :&nbsp;&nbsp;&nbsp;&nbsp;EKSPORT PRODUK OLEOKIMIA DAN
                                        LAIN-LAIN PRODUK SAWIT

                                    </font>
                                </b></p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nama Produk Sawit</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nombor Borang Kastam 2</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Tarikh Eksport</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti
                                                    (Tan Metrik)</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nilai (RM)</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Negara</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Destinasi Negara</font>
                                            </b></td>
                                    </tr>

                                </tbody>
                            </table>
                            <p><b>
                                    <font color="#0000FF">BAHAGIAN 5 :&nbsp;&nbsp;&nbsp;&nbsp;IMPORT PRODUK SAWIT

                                    </font>
                                </b></p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nama Produk Sawit</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nombor Borang Kastam 1</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Tarikh Import</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti
                                                    (Tan Metrik)</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nilai (RM)</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Negara</font>
                                            </b></td>
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Negara Sumber Import</font>
                                            </b></td>
                                    </tr>

                                </tbody>
                            </table><br>

                            <p style="font-size: 16px"><b>
                                Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                     benar, lengkap dan selaras dengan rekod harian.
                            </b></p>

                            {{-- <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                            <input type="date" id="e104_sdate" class="form-control" size="50"
                                                name='e104_sdate' value="{{ $pelesen2->e104_sdate ?? '-' }}" readonly>
                                        </p> --}}

                            <form action="{{ route('oleo.update.papar.penyata', [$pelesen2->e104_reg]) }}" method="post">
                                @csrf
                                <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                    <input type="text" id="e_npg" class="form-control" size="50" name='e104_npg'  maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen2->e104_npg }}">
                                </p>
                                <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                    <input type="text" id="e_jpg" class="form-control" size="50" name='e104_jpg'  maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen2->e104_jpg }}">
                                </p>
                                <p>No Telefon Kilang: &nbsp;&nbsp;

                                    <input type="text" id="e_notel" class="form-control" size="50" name="e104_notel"  maxlength="50" required oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen2->e104_notel }}">
                                </p>
                        </body>
                    </div>
                </div>

            </div>

            <span>Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat yang diperlukan dan tekan butang ‘Hantar’.</span>

                <div class="form-group" style="padding: 20px; ">
                        <a href="{{ route('oleo.bahagianiii') }}" class="btn btn-primary"
                            style="float: left;">Sebelumnya</a>

                        <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right; "
                            data-target="#next">Hantar</button>
                </div>

                <!-- Vertically Centered modal Modal -->
                <div class="modal fade" id="next" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                    PENGESAHAN</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Anda pasti mahu menghantar penyata ini?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}




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
