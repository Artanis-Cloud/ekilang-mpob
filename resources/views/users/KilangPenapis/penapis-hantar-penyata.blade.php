@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
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
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}

            <div class="card-body">
        <form method="get" action="" id="myfrm">

                <div class="row">
                    <div class="" style="padding: 2%">
                        <div align="right">
                            <table border="0" width="25%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p align="left"><b>MPOB(EL) RF 4</b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p align="left"><b>MPOB(EL) PX 4-RF </b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p align="left"><b>MPOB(EL) PM 4-RF </b></p>
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

                        <title>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4</title>
                        <p style="text-align: center; vertical-align:middle"><b>
                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                </font>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4<br>

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

                        <table border="0" width="111%" cellspacing="0">

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
                                <font color="#0c7c85">MAKLUMAT PELESEN </font>
                            </b></p>

                        <table border="0" width="80%" cellpadding="0" cellspacing="0">

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
                        <br><hr>
                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 1 :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
                                    SAWIT</font>
                            </b> </p>
                        <table border="1" class="table table-bordered" width="100%" bordercolor="#000000" cellspacing="0"
                            cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000">
                            {{-- <tbody> --}}
                                <tr  style="background-color: #d3d3d370">
                                    <th width="13%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Produk Sawit</font><b></b>
                                        </b></th>
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
                                            <font size="2">Belian/Terima</font><b></b>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Import</font><b></b>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Pengeluaran</font><b></b>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                            <b></b>
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
                                <tbody>
                                @foreach ($penyatai as $data)
                                    <tr>
                                        <td align="left">
                                            <font size="2">{{ $data->produk->proddesc }}</font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2">{{ $data->e101_b4 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b5 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b6 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b7 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">0.00</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b9 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b10 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b11 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2"> {{ number_format($data->e101_b12 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b13 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b14 ?? 0, 2) }}</font>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>-</b></font>
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
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalib10 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalib11 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalib12 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalib13 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalib14 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><hr>
                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                    MINYAK ISIRUNG SAWIT</font>
                            </b> </p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                            <tbody>
                                <tr style="background-color: #d3d3d370">
                                    <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Produk Sawit</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kod Produk</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Stok Awal Di Premis</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Stok Awal Di Pusat Simpanan</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Belian/Terimaan</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Import</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Pengeluaran</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Jualan/Edaran Tempatan</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Eksport</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Stok Akhir Di Premis</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Stok Akhir Di Pusat Simpanan</font>
                                        </b></td>
                                </tr>
                                @foreach ($penyataii as $data)
                                    <tr>
                                        <td align="left">
                                            <font size="2">{{ $data->produk->proddesc }}</font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2">{{ $data->e101_b4 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b5 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b6 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b7 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">0.00</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b9 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b10 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b11 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b12 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b13 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_b14 ?? 0, 2) }}</font>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>-</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib5 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib6 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib7 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib8 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib9 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib10 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib11 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib12 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib13 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totaliib14 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><hr>

                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI
                                </font>
                            </b> </p>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                    <td width="40%"><b>{{ $penyataiii->e101_a1 }} Hari</b></td>
                                </tr>
                                <tr>
                                    <td width="60%">Kadar Penggunaan Kapasiti (Refining) Sebulan</td>
                                    <td width="40%"><b>{{ number_format($penyataiii->e101_a2 ?? 0, 2) }} %</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="60%">Kadar Penggunaan Kapasiti (Fractionation) Sebulan
                                    </td>
                                    <td width="40%"><b>{{ number_format($penyataiii->e101_a3 ?? 0, 2) }} %</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br><hr>
                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 4 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                    AKHIR
                                    BERASASKAN MINYAK SAWIT DAN MINYAK ISIRUNG SAWIT -
                                    BAHAN MAKANAN</font>
                            </b></p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                            <tbody>
                                <tr style="background-color: #d3d3d370">
                                    <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Produk Sawit</font>
                                        </b></td>
                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kod Produk</font>
                                        </b></td>
                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Stok Awal</font>
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
                                @foreach ($penyataiva as $data)
                                    <tr>
                                        <td align="left">
                                            <font size="2">{{ $data->produk->proddesc }}</font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2">{{ $data->e101_c4 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c5 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c6 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c7 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c8 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c9 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c10 ?? 0, 2) }}</font>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>-</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivac5 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivac6 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivac7 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivac8 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivac9 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivac10 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><hr>

                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 4 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                    AKHIR
                                    BERASASKAN MINYAK SAWIT DAN MINYAK ISIRUNG SAWIT -
                                    BAHAN BUKAN MAKANAN</font>
                            </b></p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered"
                            style="padding: 0.2rem 0.3rem">
                            <tbody>
                                <tr style="padding: 0.2rem 0.3rem;background-color: #d3d3d370" >
                                    <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Produk Sawit</font>
                                        </b></td>
                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kod Produk</font>
                                        </b></td>
                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Stok Awal</font>
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
                                @foreach ($penyataivb as $data)
                                    <tr>
                                        <td align="left">
                                            <font size="2">{{ $data->produk->proddesc }}</font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2">{{ $data->e101_c4 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c5 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c6 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c7 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c8 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c9 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_c10 ?? 0, 2) }}</font>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>-</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivbc5 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivbc6 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivbc7 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivbc8 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivbc9 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalivbc10 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><hr>

                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 5 (a) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN/TERIMAAN BEKALAN PRODUK SAWIT -
                                    SENDIRI</font>
                            </b></p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                            <tbody>
                                <tr  style="background-color: #d3d3d370">
                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Belian/Terimaan Dari</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">CPO</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">PPO</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">CPKO</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">PPKO</font>
                                        </b></td>
                                </tr>
                                @foreach ($penyatava as $data)
                                    <tr>
                                        <td align="left">
                                            <font size="2">{{ $data->prodcat->catname }}</font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2">{{ number_format($data->e101_d5 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_d6 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_d7 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_d8 ?? 0, 2) }}</font>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>{{ number_format($totalvad5 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalvad6 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalvad7 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalvad8 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><hr>
                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 5 (b) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN/TERIMAAN BEKALAN PRODUK SAWIT -
                                    LUAR</font>
                            </b></p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                            <tbody>
                                <tr  style="background-color: #d3d3d370">
                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Belian/Terimaan Dari</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">CPO</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">PPO</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">CPKO</font>
                                        </b></td>
                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">PPKO</font>
                                        </b></td>
                                </tr>
                                @foreach ($penyatavb as $data)
                                    <tr>
                                        <td align="left">
                                            <font size="2">{{ $data->prodcat->catname }}</font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2">{{ number_format($data->e101_d5 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_d6 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_d7 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_d8 ?? 0, 2) }}</font>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>{{ number_format($totalvbd5 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalvbd6 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalvbd7 ?? 0, 2) }}</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>{{ number_format($totalvbd8 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><hr>
                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 6 :&nbsp;&nbsp;&nbsp;&nbsp;
                                    EKSPORT PRODUK SAWIT</font>
                            </b></p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                            <tbody>
                                <tr  style="background-color: #d3d3d370">
                                    <td width="14%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Produk Sawit</font>
                                        </b></td>
                                    <td width="7%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kod Produk</font>
                                        </b></td>
                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Nombor Borang Kastam 2</font>
                                        </b></td>
                                    <td width="12%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Tarikh Eksport</font>
                                        </b></td>
                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kuantiti<br> (Tan Metrik)</font><b></b>
                                        </b></td>
                                    <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Nilai (RM)</font>
                                        </b></td>
                                    <td width="6%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kod Negara</font>
                                        </b></td>
                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Destinasi Negara</font>
                                        </b></td>
                                </tr>
                                @foreach ($penyatavii as $data)
                                    <tr>
                                        <td align="left">
                                            <font size="2">{{ $data->produk->proddesc }}</font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2">{{ $data->e101_e4 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ $data->e101_e5 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ $data->e101_e6 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_e7 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ number_format($data->e101_e8 ?? 0, 2) }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ $data->e101_e9 }}</font>
                                        </td>
                                        <td align="right">
                                            <font size="2">{{ $data->negara[0]->namanegara }}</font>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <td width="15%" style="text-align: center; vertical-align:middle" colspan="8">
                                <font size="2">Tiada Rekod</font></td>
                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>-</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                </tr>
                        </table><hr>
                        <p><b>
                                <font color="#0c7c85">BAHAGIAN 7 :&nbsp;&nbsp;&nbsp;&nbsp;
                                    IMPORT PRODUK SAWIT</font>
                            </b></p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                            <tbody>
                                <tr  style="background-color: #d3d3d370">
                                    <td width="14%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Produk Sawit</font>
                                        </b></td>
                                    <td width="7%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kod Produk</font>
                                        </b></td>
                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Nombor Borang Kastam 1</font>
                                        </b></td>
                                    <td width="12%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Tarikh Import</font>
                                        </b></td>
                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kuantiti<br> (Tan Metrik)</font><b></b>
                                        </b></td>
                                    <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Nilai (RM)</font>
                                        </b></td>
                                    <td width="6%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Kod Negara</font>
                                        </b></td>
                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                            <font size="2">Negara Sumber</font>
                                        </b></td>
                                </tr>
                            </tbody>
                            <td width="15%" style="text-align: center; vertical-align:middle" colspan="8">
                                <font size="2">Tiada Rekod</font></td>
                                <tr  style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>JUMLAH</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle">
                                        <font size="2"><b>-</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                    <td align="right">
                                        <font size="2"><b>0.00</b></font>
                                    </td>
                                </tr>
                        </table><hr>

                        <div class="card" style="border: 1px solid #000000; vertical-align:middle; padding: 5px 5px 5px 5px;"">
                            <p style="font-size: 16px; margin-bottom:0"><b>
                                    Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                    benar, lengkap dan selaras dengan rekod harian.
                                </b></p>
                            </div>
                        <form action="{{ route('penapis.update.papar.penyata', [$penyataiii->e101_reg]) }}"
                            method="post"  novalidate>
                            @csrf
                            <p >Tarikh Penghantaran:&nbsp;&nbsp;&nbsp; <b>{{$date }} </b></p>
                            <p>Nama Pegawai Melapor:&nbsp;&nbsp; <b>{{ $penyataiii->e101_npg  }}</b>
                            </p>
                            <p>Jawatan Pegawai Melapor:&nbsp;&nbsp; <b>{{ $penyataiii->e101_jpg }}</b></p>
                            <p>No Telefon Kilang:&nbsp;&nbsp; <b>{{ $penyataiii->e101_notel }}</b>
                            </p>
                            </body>

                            {{-- <span>Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat yang diperlukan dan tekan butang ‘Hantar’.</span> --}}



                        </form>
                    </div>

                </div>
                <div class="row justify-content-center" style="margin: 30px">

                    <button type="button" class="btn btn-primary "
                        onclick="myPrint('myfrm')" value="print">Cetak</button>
                </div>

            </div>
            <script>
                function myPrint(myfrm) {
                var restorepage = $('body').html();
                var printcontent = $('#' + myfrm).clone();
                $('body').empty().html(printcontent);
                window.print();
                $('body').html(restorepage);
                }
            </script>
    @endsection
