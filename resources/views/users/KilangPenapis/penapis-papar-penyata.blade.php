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
        {{-- <form method="get" action="" id="myfrm"> --}}
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}

            <div class="card-body">
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
                                <font style="font-size: 15px" color="#0c7c85">MAKLUMAT PELESEN </font>
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
                        <br>
                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
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
                                            <font size="2">Belian/Terimaan</font><b></b>
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
                        </table>
                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
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
                        </table>

                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI
                                </font>
                            </b> </p>
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="30%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                    <td width="40%"><b>:{{ $penyataiii->e101_a1 }} Hari</b></td>
                                </tr>
                                <tr>
                                    <td width="30%">Kadar Penggunaan Kapasiti (Refining) Sebulan</td>
                                    <td width="40%"><b>:{{ number_format($penyataiii->e101_a2 ?? 0, 2) }} %</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">Kadar Penggunaan Kapasiti (Fractionation) Sebulan
                                    </td>
                                    <td width="40%"><b>:{{ number_format($penyataiii->e101_a3 ?? 0, 2) }} %</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
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
                        </table>

                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
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
                        </table>

                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 (a) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN/TERIMAAN BEKALAN PRODUK SAWIT -
                                    SENDIRI</font>
                            </b></p>
                        <table border="1" style="width: 60%" cellspacing="0" cellpadding="0" class="table table-bordered">
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
                                        <td style="text-align: right; vertical-align:middle">
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
                                    <td style="text-align: right; vertical-align:middle">
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
                        </table>
                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 (b) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN/TERIMAAN BEKALAN PRODUK SAWIT -
                                    LUAR</font>
                            </b></p>
                        <table border="1" style="width: 60%" cellspacing="0" cellpadding="0" class="table table-bordered">
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
                                        <td style="text-align: right; vertical-align:middle">
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
                                    <td style="text-align: right; vertical-align:middle">
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
                        </table>
                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 6 :&nbsp;&nbsp;&nbsp;&nbsp;
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
                        </table>
                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 7 :&nbsp;&nbsp;&nbsp;&nbsp;
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
                        </table>

                        <div class="card" style="border: 1px solid #000000; vertical-align:middle; padding: 5px 5px 5px 5px;">
                            <p style="font-size: 18px; margin-bottom:0; padding-left: 20px; color:red"><b>
                                    Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                    benar, lengkap dan selaras dengan rekod harian.
                                </b></p>
                            </div>
                        <form action="{{ route('penapis.update.papar.penyata', [$penyataiii->e101_reg]) }}"
                            method="post"  novalidate>
                            @csrf
                            <p>
                                <div class="required">Nama Pegawai Melapor:</div>
                                <input type="text" id="e101_npg" class="form-control" size="50" maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_npg()" name='e101_npg'
                                    value="{{ $penyataiii->e101_npg }}">
                                    <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                    @error('e101_npg')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </p>
                            <p>
                                <div class="required">Jawatan Pegawai Melapor:</div>
                                <input type="text" id="e101_jpg" class="form-control" size="50" maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_jpg()" name='e101_jpg'
                                    value="{{ $penyataiii->e101_jpg }}">
                                    <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                    @error('e101_jpg')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </p>
                            <p>
                                <div class="required">No Telefon Kilang:</div>

                                <input type="text" id="e101_notel" class="form-control" size="50" maxlength="50" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_notel()"
                                    name="e101_notel" value="{{ $penyataiii->e101_notel }}">
                                    <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                        <p type="hidden" id="err_notel2" style="color: red; display:none"><i>Sila masukkan nombor telefon yang betul!</i></p>
                            </p>
                                    @error('e101_notel')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </p>
                            </body>

                            {{-- <span>Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat yang diperlukan dan tekan butang ‘Hantar’.</span> --}}

                            <div class="form-group" style="padding-top: 10px; ">
                                    <a href="{{ route('penapis.bahagianv') }}" class="btn btn-primary"
                                        style="float: left">Sebelumnya</a>
                                    <button type="button" class="btn btn-primary " style="float: right" onclick="check()">Hantar</button>
                                    {{-- <button type="button" class="btn btn-primary " style="float: right; margin-right:1%"
                                                        onclick="myPrint('myfrm')" value="print">Cetak</button> --}}
                            </div>

                            <!-- Vertically Centered modal Modal -->
                            <div class="modal fade" id="next" tabindex="-1" role="dialog"
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
                                            {{-- <img style="margin:0 auto;" src="{{ asset('theme/images/warning.png') }} alt=""> --}}
                                            {{-- <div style="display: inline-block"> --}}
                                            {{-- <i class="fa fa-exclamation-circle " id="facebook-icon"
                                        style="color: red;"></i> &nbsp; --}}
                                        <span style="font-size: 16px; margin-bottom:0; text-align: justify; text-justify: inter-word"><b>
                                                Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                                benar, lengkap dan selaras dengan rekod harian.
                                            </b></span>
                                        {{-- </div> --}}
                                            <br><br>
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
                        </form>
                    </div>
            </div>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />

            function myPrint(myfrm) {
                var printdata = document.getElementById(myfrm);
                newwin = window.open("");
                newwin.document.write(printdata.outerHTML);
                newwin.print();
                newwin.close();
            }
        </script>
                    <script>
                        function check() {
                            // (B1) INIT
                            var error = "",
                                field = "";

                            // alamat premis 1500403125000
                            field = document.getElementById("e101_npg");
                            if (!field.checkValidity()) {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_npg').css('border-color', 'red');
                                document.getElementById('err_npg').style.display = "block";
                            }

                            // alamat premis 1
                            field = document.getElementById("e101_jpg");
                            if (!field.checkValidity()) {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_jpg').css('border-color', 'red');
                                document.getElementById('err_jpg').style.display = "block";
                            }

                            // alamat surat-menyurat 1
                            field = document.getElementById("e101_notel");
                            if (!field.checkValidity()) {
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_notel').css('border-color', 'red');
                                document.getElementById('err_notel').style.display = "block";
                            } else if (field.value.length > 13 || field.value.length < 10) {
                                console.log(field.value.length);
                                error += "Name must be 2-4 characters\r\n";
                                $('#e101_notel').css('border-color', 'red');
                                document.getElementById('err_notel2').style.display = "block";
                                document.getElementById('err_notel').style.display = "none";
                             }
                            else {
                                $('#e101_notel').css('border-color', '');
                                document.getElementById('err_notel').style.display = "none";
                                document.getElementById('err_notel2').style.display = "none";
                        }

                            // (B4) RESULT
                            if (error == "") {
                                $('#next').modal('show');
                                return true;
                            } else {
                                // $('#next').modal('hide');
                                toastr.error(
                                    'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                                    'Ralat!', {
                                        "progressBar": true
                                    })
                                return false;
                            }

                            // if (error == "") {
                            //     return true;
                            // } else {
                            //     toastr.error(
                            //         'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                            //         'Ralat!', {
                            //             "progressBar": true
                            //         })
                            //     return false;
                            // }
                        }
                    </script>
         <script>
            function valid_npg() {

                if ($('#e101_npg').val() == '') {
                    $('#e101_npg').css('border-color', 'red');
                    document.getElementById('err_npg').style.display = "block";


                } else {
                    $('#e101_npg').css('border-color', '');
                    document.getElementById('err_npg').style.display = "none";

                }

            }
        </script>
        <script>
            function valid_jpg() {

                if ($('#e101_jpg').val() == '') {
                    $('#e101_jpg').css('border-color', 'red');
                    document.getElementById('err_jpg').style.display = "block";


                } else {
                    $('#e101_jpg').css('border-color', '');
                    document.getElementById('err_jpg').style.display = "none";

                }

            }
        </script>
        <script>
            function valid_notel() {

                var str = document.getElementById('e101_notel');
                    // console.log(str.value.length);

                    if ($('#e101_notel').val() == '') {
                        $('#e101_notel').css('border-color', 'red');
                        document.getElementById('err_notel').style.display = "block";
                        document.getElementById('err_notel2').style.display = "none";


                    } else if (str.value.length > 13 || str.value.length < 10) {
                        $('#e101_notel').css('border-color', 'red');
                        document.getElementById('err_notel2').style.display = "block";
                        document.getElementById('err_notel').style.display = "none";
                    }
                    else {
                        $('#e101_notel').css('border-color', '');
                        document.getElementById('err_notel').style.display = "none";
                        document.getElementById('err_notel2').style.display = "none";

                    }

            }
        </script>
        <script>
            document.addEventListener('keypress', function (e) {
                if (e.keyCode === 13 || e.which === 13) {
                    e.preventDefault();
                    return false;
                }

            });
        </script>

<script>
    $(document).ready(function() {
        swal("Perhatian!",
            "Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat pegawai melapor dan no. telefon kilang dan tekan butang Hantar."
            );
    });
</script>
    @endsection
