@extends('layouts.main')
{{-- <style>
    #facebook-icon,
#facebook-icon ~ span {display:inline-block;}
</style> --}}
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

            <div class="card-body">

                <div class="pl-3" style="padding: 2%">

                    <body>
                        <div align="">
                            <table border="0" width="90%">
                                <tbody>
                                    <tr>
                                        <td width="10%" height="19">
                                            <p align=""><b></b></p>
                                        </td>
                                        <td width="88%" height="19">
                                            <p align="right"><b>MPOB(EL) MF 4</b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%" height="19">
                                            <p align=""><b></b></p>
                                        </td>
                                        <td width="88%" height="19">
                                            <p align="right"><b>MPOB(EL) PX 4-M </b></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div><br>
                        <p style="text-align: center; vertical-align:middle">
                            <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                        </p>
                        <title>PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4</title>
                        <p style="text-align: center; vertical-align:middle"><b>
                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                </font>PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4<br>

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
                                <font style="font-size: 15px"  color="#0c7c85">BAHAGIAN 1 : MAKLUMAT STOK AWAL, BELIAN, PROSES,
                                    PENGELUARAN, JUALAN/EDARAN, EKSPORT, STOK AKHIR
                                    (Berdasarkan Dalam Premis Kilang Sahaja.)</font>
                            </b> </p>

                        <table border="1" style="width:70% " bordercolor="#000000" cellspacing="0" cellpadding="0"
                            bordercolorlight="#FFFFFF" bordercolordark="#000000" class="table table-bordered">
                            <tbody>
                                <tr style="background-color: #d3d3d370">
                                    <td width="220" style="text-align: center; vertical-align:middle">
                                        <b>
                                            <font size="2.7">Butiran</font>
                                        </b>
                                    </td>
                                    <td width="120" style="text-align: center; vertical-align:middle">
                                        <b>

                                            <font size="2.7">Buah Tandan Segar  <br>(FFB) Kod 52</font>

                                        </b>
                                    </td>
                                    <td width="135" style="text-align: center; vertical-align:middle">
                                        <b>
                                            <font size="2.7">Minyak Sawit Mentah  (CPO)<br> Kod 01
                                            </font>
                                        </b>
                                    <td width="110" style="text-align: center; vertical-align:middle">
                                        <b>
                                            <font size="2.7">Isirung (PK)<br> Kod 51</font>
                                        </b>
                                    </td>
                                    <td width="120" style="text-align: center; vertical-align:middle">
                                        <b>
                                            <font size="2.7">Minyak Keladak (Sludge Oil)<br> Kod 49
                                            </font>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="220">
                                        <font size="2.7">A. Stok Awal Di Premis</font>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_aa1 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="135">
                                        <p style="text-align: center">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_aa2 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="110">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_aa3 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_aa4 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="220">
                                        <font size="2.7">B. Belian/Terimaan</font>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ab1 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="135">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ab2 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="110">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ab3 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ab4 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="220">
                                        <font size="2.7">C. Diproses</font>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ac1 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="135" bgcolor="#C0C0C0"
                                        style="text-align: center; vertical-align:middle">&nbsp;</td>
                                    <td width="110" bgcolor="#C0C0C0"
                                        style="text-align: center; vertical-align:middle">&nbsp;</td>
                                    <td width="120" bgcolor="#C0C0C0"
                                        style="text-align: center; vertical-align:middle">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="220">
                                        <font size="2.7">D. Pengeluaran</font>
                                    </td>
                                    <td width="120" bgcolor="#C0C0C0"
                                        style="text-align: center; vertical-align:middle">
                                        <p align="left">&nbsp;</p>
                                    </td>
                                    <td width="135">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ad1 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="110">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ad2 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ad3 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="220">
                                        <font size="2.7">E. Jualan/Edaran Tempatan</font>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ae1 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="135">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ae2 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="110">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ae3 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ae4 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="220">
                                        <font size="2.7">F. Eksport</font>
                                    </td>
                                    <td width="120" bgcolor="#C0C0C0"
                                        style="text-align: center; vertical-align:middle">
                                        <p align="left">&nbsp;</p>
                                    </td>
                                    <td width="135" bgcolor="#C0C0C0">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7"></font>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </p>
                                    </td>
                                    <td width="110" bgcolor="#C0C0C0">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7" </font>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </p>
                                    </td>
                                    <td width="120" bgcolor="#C0C0C0">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7"></font>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="220">
                                        <font size="2.7">G. Stok Akhir Di Premis</font>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ag1 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="135">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ag2 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="110">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ag3 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                    <td width="120">
                                        <p style="text-align: center; vertical-align:middle">
                                            <font size="2.7">
                                                {{ number_format($penyata->e91_ag4 ?? 0, 2) }}</font>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <p><b>
                                <font style="font-size: 15px" color="0c7c85">BAHAGIAN 2 : MAKLUMAT JAM PENGILANGAN,
                                    KADAR PERAHAN DAN HARGA </font>
                            </b> </p>

                        <table border="0" style="width:40% " cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="380">
                                        <font size="2.7">i.&nbsp;&nbsp; Jumlah Jam Pengilangan&nbsp;
                                        </font>
                                    </td>
                                    <td width="70">
                                        <font size="2.7"><b>:
                                            {{ number_format($penyata->e91_ah1 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="380">
                                        <font size="2.7">ii.&nbsp; Kadar Perahan MSM (OER) yang
                                            diperolehi&nbsp;</font>
                                    </td>
                                    <td width="100">
                                        <font size="2.7"><b>:
                                            {{ number_format($penyata->e91_ah2 ?? 0, 2) }}%</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="380">
                                        <font size="2.7">iii. Kadar Perolehan Isirung (KER)</font>
                                    </td>
                                    <td width="100">
                                        <font size="2.7"><b>:
                                            {{ number_format($penyata->e91_ah3 ?? 0, 2) }}%</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1000">
                                        <font size="2.7">iv. Harga Purata Belian Buah Tandan Segar
                                            (FFB)
                                        </font>
                                    </td>
                                    <td width="150">
                                        <font size="2.7"><b>:&nbsp;RM
                                            {{ number_format($penyata->e91_ah4 ?? 0, 2) }}</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="380">
                                        <font size="2.7">&nbsp;&nbsp;&nbsp;&nbsp; (1% Kadar Perahan)
                                        </font>
                                    </td>
                                    <td width="70">
                                        <font size="2.7"></font>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <br>



                        <table border="1" style="width:70% " cellspacing="0" cellpadding="0"
                            class="table table-bordered ">

                            <tbody>
                                <tr style="border: 1px solid black; background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle" width="209"><b>
                                            <font size="2.7">Sebab-Sebab OER Meningkat</font>
                                        </b></td>
                                    <td style="text-align: center; vertical-align:middle" width="92">
                                        <font size="2.7"><b>Tanda (<font face="Times New Roman">&#10004;
                                                </font>)</b>
                                        </font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle" width="201"><b>
                                            <font size="2.7">Sebab-Sebab OER Menurun</font>
                                        </b></td>
                                    <td style="text-align: center; vertical-align:middle" width="93">
                                        <font size="2.7"><b>Tanda (<font face="Times New Roman">&#10004;
                                                </font>)</b>
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="209">
                                        <font size="2.7">a. Buah berkualiti</font>
                                    </td>

                                    @if ($penyata->e91_ah5 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah5 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;&nbsp;&nbsp;</font>
                                        </td>
                                    @endif

                                    <td width="201" align="left">
                                        <font size="2.7">
                                            a. Tiada/ kurang buah berkualiti</font>
                                    </td>
                                    @if ($penyata->e91_ah11 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah11 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td width="209">
                                        <font size="2.7">b. Kesan dari cuaca yang baik</font>
                                    </td>
                                    @if ($penyata->e91_ah6 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah6 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                    <td width="201" align="left">
                                        <font size="2.7">
                                            b. Kesan cuaca kering</font>
                                    </td>
                                    @if ($penyata->e91_ah12 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah12 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td width="209">
                                        <font size="2.7">c. Proses kitar semula minyak</font>
                                    </td>
                                    @if ($penyata->e91_ah7 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah7 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                    <td width="201" align="left">
                                        <font size="2.7">
                                            c. Jerebu</font>
                                    </td>
                                    @if ($penyata->e91_ah13 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah13 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td width="209">
                                        <font size="2.7">d. Kecekapan kilang/mesin</font>
                                    </td>
                                    @if ($penyata->e91_ah8 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah8 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                    <td width="201" align="left">
                                        <font size="2.7">
                                            d. Kesan Penerimaan hujan yang berlebihan</font>
                                    </td>
                                    @if ($penyata->e91_ah14 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah14 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td width="209">
                                        <font size="2.7">e. Proses pengendalian bks yang minima (less ffb
                                            handling)</font>
                                    </td>
                                    @if ($penyata->e91_ah9 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah9 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                    <td width="201" align="left">
                                        <font size="2.7">
                                            e. Banjir</font>
                                    </td>
                                    @if ($penyata->e91_ah15 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah15 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td width="209" >
                                        <font size="2.7">f. Proses lebih buah lerai</font>
                                    </td>
                                    @if ($penyata->e91_ah10 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle"
                                            >
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah10 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle"
                                            >
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                    <td width="201" align="left">
                                        <font size="2.7">
                                            f. Buah Dari Ladang Baru Berhasil</font>
                                    </td>
                                    @if ($penyata->e91_ah16 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah16 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                </tr>
                                <tr>

                                    <td width="201" align="left" colspan="2">

                                    </td>

                                    <td width="201" align="left">
                                        <font size="2.7">
                                            g.Kurang Buah Lerai</font>
                                    </td>
                                    @if ($penyata->e91_ah17 == 'Y')
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7">&#10004; &nbsp;</font>
                                        </td>
                                    @elseif ($penyata->e91_ah17 == null)
                                        <td width="92" style="text-align: center; vertical-align:middle">
                                            <font size="2.7"> &nbsp;</font>
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            <font size="2.7">Lain-lain jawapan, sila nyatakan (max. 100 character):
                                {{ $penyata->e91_ah18 ?? '-' }}</font>
                        </p><br>




                        <p align="left">
                            <font style="font-size: 15px" color="#0c7c85"><b>BAHAGIAN 3 : BELIAN/TERIMAAN BEKALAN
                                    BUAH
                                    KELAPA SAWIT (FFB) (52)</b>
                            </font>
                        </p>

                        <table border="1" style="width:50% " bordercolor="#000000" cellspacing="0" cellpadding="0"
                            bordercolorlight="#FFFFFF" bordercolordark="#000000" class="table table-bordered ">
                            <tbody>
                                <tr style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle" width="16">
                                        <font size="2.7"><b>Sumber Bekalan</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle" width="158">
                                        <font size="2.7"><b>Kuantiti (Tan Metrik)</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">1. Estet Sendiri</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ai1 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">2. Estet Luar</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ai2 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">3. Peniaga Buah</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ai3 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">4. Pekebun Kecil</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ai4 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">5. Kilang Buah Lain</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ai5 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">6. Lain-lain</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ai6 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">&nbsp;&nbsp;&nbsp;&nbsp;<b>JUMLAH</b></font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">
                                            <b>{{ number_format(
                                                ($penyata->e91_ai1 ?? 0) +
                                                    ($penyata->e91_ai2 ?? 0) +
                                                    ($penyata->e91_ai3 ?? 0) +
                                                    ($penyata->e91_ai4 ?? 0) +
                                                    ($penyata->e91_ai5 ?? 0) +
                                                    ($penyata->e91_ai6 ?? 0) ??
                                                    0,
                                                2,
                                            ) }}</b>
                                        </font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><br>


                        <p align="left">
                            <font style="font-size: 15px" color="#0c7c85"><b>BAHAGIAN 4 : JUALAN/EDARAN MINYAK SAWIT
                                    MENTAH (CPO) (01) </b></font>
                        </p>

                        <table border="1" style="width:50% " bordercolor="#000000" cellspacing="0" cellpadding="0"
                            bordercolorlight="#FFFFFF" bordercolordark="#000000" class="table table-bordered">
                            <tbody>
                                <tr style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle" width="168">
                                        <font size="2.7"><b>Pembeli/Penerima</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle" width="158">
                                        <font size="2.7"><b>Kuantiti (Tan Metrik)</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">1. Kilang Buah</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj1 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">2. Kilang Penapis</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj2 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">3. Kilang Oleokimia</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj3 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">4. Peniaga</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj4 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">5. Pusat Simpanan</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj5 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">6. Eksport</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj6 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">7. Transit</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj7 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">8. Lain-lain</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_aj8 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7"><b>&nbsp;&nbsp;&nbsp;&nbsp; JUMLAH</b></font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">
                                            <b>{{ number_format(
                                                ($penyata->e91_aj1 ?? 0) +
                                                    ($penyata->e91_aj2 ?? 0) +
                                                    ($penyata->e91_aj3 ?? 0) +
                                                    ($penyata->e91_aj4 ?? 0) +
                                                    ($penyata->e91_aj5 ?? 0) +
                                                    ($penyata->e91_aj6 ?? 0) +
                                                    ($penyata->e91_aj7 ?? 0) +
                                                    ($penyata->e91_aj8 ?? 0) ??
                                                    0,
                                                2,
                                            ) }}</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table><br>


                        <p align="left">
                            <font style="font-size: 15px" color="#0c7c85"><b>BAHAGIAN 5 : JUALAN/EDARAN ISIRUNG SAWIT
                                    (PK) DALAM NEGERI
                                    (51)</b></font>
                        </p>

                        <table border="1" style="width:50% " bordercolor="#000000" cellspacing="0" cellpadding="0"
                            bordercolorlight="#FFFFFF" bordercolordark="#000000" class="table table-bordered">
                            <tbody>
                                <tr style="background-color: #d3d3d370">
                                    <td style="text-align: center; vertical-align:middle" width="168">
                                        <font size="2.7"><b>Pembeli/Penerima</b></font>
                                    </td>
                                    <td style="text-align: center; vertical-align:middle" width="158">
                                        <font size="2.7"><b>Kuantiti (Tan Metrik)</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">1. Kilang Isirung</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ak1 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">2. Peniaga</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ak2 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">
                                        <font size="2.7">3. Lain-lain</font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">{{ number_format($penyata->e91_ak3 ?? 0, 2) }}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="168">&nbsp;&nbsp;&nbsp;&nbsp;<font size="2.7"><b>JUMLAH</b>
                                        </font>
                                    </td>
                                    <td width="158" style="text-align: center; vertical-align:middle">
                                        <font size="2.7">
                                            <b><b>{{ number_format(($penyata->e91_ak1 ?? 0) + ($penyata->e91_ak2 ?? 0) + ($penyata->e91_ak3 ?? 0) ?? 0, 2) }}</b>
                                        </font>
                                    </td>
                                </tr>
                            </tbody>
                        </table><br>

                        <p><b>
                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 6 : EKSPORT PRODUK SAWIT</font>
                            </b></p>
                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                            class="table table-bordered">
                            <tbody>
                                <tr style="background-color: #d3d3d370">
                                    <td width="14%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Produk</b></font>
                                    </td>
                                    <td width="7%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Kod Produk</b></font>
                                    </td>
                                    <td width="15%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Nombor Borang Kastam 2</b></font>
                                    </td>
                                    <td width="12%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Tarikh Eksport</b></font>
                                    </td>
                                    <td width="10%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Kuantiti<br> (Tan Metrik)</b></font>
                                    </td>
                                    <td width="11%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Nilai (RM)</b></font>
                                    </td>
                                    <td width="6%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Kod Negara</b></font>
                                    </td>
                                    <td width="15%" style="text-align: center; vertical-align:middle">
                                        <font size="2.7"><b>Destinasi Negara</b></font>
                                    </td>
                                </tr>
                                <tr >
                                    <td width="14%" style="text-align: center; vertical-align:middle" colspan="8">
                                        <font size="2.7">Tiada Rekod</font>
                                    </td>

                                </tr>
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
                            </tbody>
                        </table><br>
                        <div class="card" style="border: 1px solid #000000; vertical-align:middle; padding: 5px 5px 5px 5px;">

                            <div class="row">
                                {{-- <div class="col-md-1" style="margin: auto; padding-left: 30px;" >
                                    <i class="fas fa-exclamation-triangle" style="font-size:40px; color:red" ></i>
                                </div> --}}
                                <div class="col-md-11">
                                    <p style="font-size: 18px; margin-bottom:0; padding-left: 20px; color:red"><b>
                                        Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                        benar, lengkap dan selaras dengan rekod harian.
                                    </b></p>
                                </div>
                            </div>


                        </div>
                        <form action="{{ route('buah.update.papar.penyata') }}" method="post" id="myform" novalidate
                            required>
                            @csrf


                            <p>
                            <div class="required">Nama Pegawai Melapor:</div> &nbsp;&nbsp;
                            <input type="text" id="e_npg" class="form-control" size="50" maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_npg()"
                                name='e_npg' value="">
                                <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi
                                    butiran di bahagian ini!</i></p>
                            </p>
                            <p>
                            <div class="required">Jawatan Pegawai Melapor:</div> &nbsp;&nbsp;
                            <input type="text" id="e_jpg"class="form-control" size="50" maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_jpg()"
                                name='e_jpg' value="">
                                <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi
                                    butiran di bahagian ini!</i></p>
                            <p>
                            <div class="required">No Telefon Kilang:</div> &nbsp;&nbsp;

                            <input type="text" id="e_notel" class="form-control" size="50" maxlength="50" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_notel_pg()"
                                name="e_notel_pg" value="">
                                <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi
                                    butiran di bahagian ini!</i></p>
                                    <p type="hidden" id="err_notel2" style="color: red; display:none"><i>Sila masukkan nombor telefon yang betul!</i></p>
                            </p>
                            </p>


                            {{-- <span>Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat yang diperlukan dan tekan butang ‘Hantar’.</span> --}}

                            <div class="form-group " style="padding-top: 10px; ">
                                    <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary"
                                        style="float: left">Sebelumnya</a>

                                    <button type="button" class="btn btn-primary "
                                        style="float: right" onclick="check()">Hantar</button>
                                    {{-- <button type="button" class="btn btn-primary "
                                                        style="float: right; margin-right:1%" onclick="myPrint('myfrm')"
                                                        value="print">Cetak</button> --}}

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

                    </body>
                </div>

            </div>

        </div>
    </div>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>


    <script>
        $(document).ready(function() {
            swal("Perhatian!",
                "Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat pegawai melapor dan no. telefon kilang dan tekan butang Hantar."
                );
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
    <script>
        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>
    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // alamat premis 1500403125000
            field = document.getElementById("e_npg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_npg').css('border-color', 'red');
                document.getElementById('err_npg').style.display = "block";
            }

            // alamat premis 1
            field = document.getElementById("e_jpg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_jpg').css('border-color', 'red');
                document.getElementById('err_jpg').style.display = "block";
            }

            // alamat surat-menyurat 1
            field = document.getElementById("e_notel");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_notel').css('border-color', 'red');
                document.getElementById('err_notel').style.display = "block";
            } else if (field.value.length > 13 || field.value.length < 10) {
                console.log(field.value.length);
                error += "Name must be 2-4 characters\r\n";
                $('#e_notel').css('border-color', 'red');
                document.getElementById('err_notel2').style.display = "block";
                document.getElementById('err_notel').style.display = "none";
            }
            else {
                $('#e_notel').css('border-color', '');
                document.getElementById('err_notel').style.display = "none";
                document.getElementById('err_notel2').style.display = "none";
            }

            // (B4) RESULT
            if (error == "") {
                $('#exampleModalCenter').modal('show');
                return true;
            } else {
                $('#next').modal('hide');
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

            if ($('#e_npg').val() == '') {
                $('#e_npg').css('border-color', 'red');
                document.getElementById('err_npg').style.display = "block";


            } else {
                $('#e_npg').css('border-color', '');
                document.getElementById('err_npg').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_jpg() {

            if ($('#e_jpg').val() == '') {
                $('#e_jpg').css('border-color', 'red');
                document.getElementById('err_jpg').style.display = "block";


            } else {
                $('#e_jpg').css('border-color', '');
                document.getElementById('err_jpg').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_notel_pg() {

            var str = document.getElementById('e_notel');
                        // console.log(str.value.length);

            if ($('#e_notel').val() == '') {
                $('#e_notel').css('border-color', 'red');
                document.getElementById('err_notel').style.display = "block";
                document.getElementById('err_notel2').style.display = "none";


            } else if (str.value.length > 13 || str.value.length < 10) {
                $('#e_notel').css('border-color', 'red');
                document.getElementById('err_notel2').style.display = "block";
                document.getElementById('err_notel').style.display = "none";
            }
            else {
                $('#e_notel').css('border-color', '');
                document.getElementById('err_notel').style.display = "none";
                document.getElementById('err_notel2').style.display = "none";

            }


        }
    </script>

@endsection
