@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mt-3">
            <div class="row">
                <div class="col-4 align-self-center">
                    <h4 class="page-title">Penyata Bulanan</h4>
                </div>
                <div class="col-8 align-self-center">
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
        <div class="card" style="margin-right:2%; margin-left:2%; margin-top:2%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
            <br>
            <br>
            <div class="card-body">
                <form method="get" action="" id="myfrm">

                    <div class="pl-3">

                        <body>
                            <div align="">
                                <table border="0" width="100%">
                                    <tbody style=" width:10rem; margin-right: -10px">
                                        <tr>
                                            <td width="85%" height="19">
                                                <p align=""><b></b></p>
                                            </td>
                                            <td width="15%" height="19">
                                                <p align="left"><b>MPOB(EL) CF 4</b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="85%" height="19">
                                                <p align=""><b></b></p>
                                            </td>
                                            <td width="15%" height="19">
                                                <p align="left" style="margin-top: -15px"><b>MPOB(EL) PM 4-CF </b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="87%" height="19">
                                                <p align=""><b></b></p>
                                            </td>
                                            <td width="12%" height="19">
                                                <p align="left" style="margin-top: -15px"><b>MPOB(EL) PX 4-CF </b></p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div><br>

                            <p style="text-align: center; vertical-align:middle">
                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                            </p>
                            <title>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4</title>
                            <p style="text-align: center; vertical-align:middle"><b>
                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                    </font>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4<br>

                                    BULAN :
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
                                        @elseif($bulan == 12 || $bulan == 0 )
                                        DISEMBER
                                    @endif

                                    @if ($bulan == 12 || $bulan == 0 )
                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun - 1 }}
                                    @else
                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                                    @endif
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

                                        <td width="35%">Alamat Emel Kilang </td>

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
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 : MAKLUMAT IMBANGAN </font>
                                </b> </p>

                            <table border="1" style="width: 65%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor"
                                            width="255"style="text-align: center; vertical-align:middle">
                                            <b>
                                                <font size="2"> Butir-Butir</font>
                                            </b>
                                        </td>
                                        <td class="headerColor"
                                            width="115"style="text-align: center; vertical-align:middle">
                                            <b>
                                                <font size="2"> Isirung <br>(PK) (51) </font>
                                            </b>
                                        </td>
                                        <td class="headerColor"width="135"
                                            style="text-align: center; vertical-align:middle">
                                            <b>
                                                <font size="2"> Minyak Isirung Sawit Mentah <br>(CPKO)
                                                    (04)
                                                </font>
                                            </b>
                                        </td>
                                        <td class="headerColor" width="115"
                                            style="text-align: center; vertical-align:middle">
                                            <b>
                                                <font size="2"> Dedak Isirung <br> (PKC) (33)</font>
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">A. Stok Awal Di Premis</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle ; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aa1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aa2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aa3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">B. Stok Awal Di Pusat Simpanan/Gudang</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ab1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ab2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ab3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">C. Belian/Terimaan</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ac1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ac2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ac3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">D. Import</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ad1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ad2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ad3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">E. Diproses</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ae1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td class="block" width="135" bgcolor="#C0C0C0"
                                            style="text-align: right; vertical-align:middle; margin:0px"
                                            style="
                                                            background-color: #c0c0c0;">
                                            &nbsp;</td>
                                        <td class="block" width="135" bgcolor="#C0C0C0"
                                            style="text-align: right; vertical-align:middle; margin:0px"
                                            style="
                                                            background-color: #c0c0c0;">
                                            &nbsp;</td>
                                        {{-- <td width="115">
                                                            <p  style="text-align: center; vertical-align:middle; margin:0px">
                                                                <font size="2">0.00</font>

                                                            </p>
                                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">F. Pengeluaran</font>
                                        </td>
                                        <td class="block" width="115" bgcolor="#C0C0C0"
                                            style="text-align: right; vertical-align:middle; margin:0px"
                                            style="
                                                            background-color: #c0c0c0;">
                                            &nbsp;</td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_af2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_af3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">G. Jualan/Edaran Tempatan</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ag1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ag2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ag3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">H. Hantar Ke Pusat Simpanan/Gudang</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ah1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ah2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ah3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">I. Eksport</font>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ai1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ai2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115" style="text-align: right">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ai3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">J. Stok Akhir Di Premis</font>
                                        </td>
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aj1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aj2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aj3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">K. Stok Akhir Di Pusat Simpanan</font>
                                        </td>
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ak1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ak2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ak3 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>


                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 2 : KADAR PERAHAN CPKO, KADAR
                                        PEROLEHAN
                                        PKC, JAM PENGILANGAN DAN PENGGUNAAN
                                        KAPASITI PEMPROSESAN</font>
                                </b> </p>

                            <table border="0" width="498" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="378">i.&nbsp;&nbsp; Kadar Perahan Minyak Isirung Sawit
                                            Mentah (CPKO)&nbsp;</td>
                                        <td width="116"><b>:
                                                {{ number_format($penyataii->e102_al1 ?? 0, 2) }} % </b></td>
                                    </tr>
                                    <tr>
                                        <td width="378">ii.&nbsp; Kadar Perolehan Dedak Isirung (PKC)&nbsp;
                                        </td>
                                        <td width="116"><b>:
                                                {{ number_format($penyataii->e102_al2 ?? 0, 2) }} %</b></td>
                                    </tr>
                                    <tr>
                                        <td width="378">iii. Jumlah Jam Pengilangan Isirung (PK)</td>
                                        <td width="116"><b>:
                                                {{ number_format($penyataii->e102_al3 ?? 0, 2) }} </b></td>
                                    </tr>
                                    <tr>
                                        <td width="378">iv. Kadar Penggunaan Kapasiti Sebulan
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td width="116"><b>:
                                                {{ number_format($penyataii->e102_al4 ?? 0, 2) }} % </b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 : BELIAN/TERIMAAN BEKALAN
                                        ISIRUNG
                                        SAWIT (PK) (51)</font>
                                </b></p>
                            <table border="1" style="width: 50%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Belian/Terimaan</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Dari</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti</font>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyataiii as $data)
                                        <tr>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->kodsl->catname ?? '' }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->prodcat2->catname ?? '' }}
                                                </font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">
                                                    {{ number_format($data->e102_b6 ?? 0, 2) }}</font>
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
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>{{ number_format($totaliii ?? 0, 2) }}</b>
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>

                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 : JUALAN/EDARAN MINYAK
                                        ISIRUNG SAWIT
                                        MENTAH (CPKO) (04)</font>
                                </b></p>
                            <table border="1" style="width: 50%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Ke</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti</font>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyataiv as $data)
                                        <tr>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->kodsl->catname ?? '' }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->prodcat2->catname ?? '' }}
                                                </font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">
                                                    {{ number_format($data->e102_b6 ?? 0, 2) }}</font>
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
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>{{ number_format($totaliv ?? 0, 2) }}</b>
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 : JUALAN/EDARAN DEDAK ISIRUNG
                                        SAWIT
                                        (PKC) (33)</font>
                                </b></p>
                            <table border="1" style="width: 50%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Ke</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti</font>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyatav as $data)
                                        <tr>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->kodsl->catname ?? '' }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->prodcat2->catname ?? '' }}
                                                </font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">
                                                    {{ number_format($data->e102_b6 ?? 0, 2) }}</font>
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
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>{{ number_format($totalv ?? 0, 2) }}</b>
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 6 : EKSPORT PRODUK SAWIT</font>
                                </b></p>
                            <table border="1" style="width: 100%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="14%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Produk Sawit</font>
                                            </b></td>
                                        <td class="headerColor" width="7%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td class="headerColor" width="15%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nombor Borang Kastam 2</font>
                                            </b></td>
                                        <td class="headerColor" width="12%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Tarikh Eksport</font>
                                            </b></td>
                                        <td class="headerColor" width="10%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti<br> (Tan Metrik)</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nilai (RM)</font>
                                            </b></td>
                                        <td class="headerColor" width="6%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Negara</font>
                                            </b></td>
                                        <td class="headerColor" width="15%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Destinasi Negara</font>
                                            </b></td>
                                    </tr>
                                    {{-- <tr>
                                    <td width="14%" style="text-align: center; vertical-align:middle" colspan="8">
                                        Tiada Rekod</td>

                                </tr> --}}
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

                            </table><br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 7 : IMPORT PRODUK SAWIT</font>
                                </b></p>
                            <table border="1" style="width: 100%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="14%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Produk Sawit</font>
                                            </b></td>
                                        <td class="headerColor" width="7%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td class="headerColor" width="15%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nombor Borang Kastam 1</font>
                                            </b></td>
                                        <td class="headerColor" width="12%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Tarikh Import</font>
                                            </b></td>
                                        <td class="headerColor" width="10%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti<br> (Tan Metrik)</font>
                                            </b></td>
                                        <td class="headerColor" width="11%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nilai (RM)</font>
                                            </b></td>
                                        <td class="headerColor" width="6%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Negara</font>
                                            </b></td>
                                        <td class="headerColor" width="15%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Negara Sumber</font>
                                            </b></td>
                                    </tr>
                                    {{-- <tr>
                                    <td width="14%" style="text-align: center; vertical-align:middle" colspan="8">
                                        Tiada Rekod</td>

                                </tr> --}}
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

                            <div class="card"
                                style="border: 1px solid #000000; vertical-align:middle; padding: 5px 5px 5px 5px;">
                                <p style="font-size: 16px; margin-bottom:0"><b>
                                        Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                        benar, lengkap dan selaras dengan rekod harian.
                                    </b></p>
                            </div>
                            {{-- <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                                <input type="date" id="e91_sdate" class="form-control" size="50"
                                                    name='e102_sdate' value="{{ $penyatai->e102_sdate }}" readonly>
                                            </p> --}}
                            @if ($penyatai->e102_sdate == null)
                                <p>Tarikh Penghantaran:&nbsp;&nbsp;&nbsp; <b></b>
                                </p>
                            @else
                            <p>Tarikh Penghantaran:&nbsp;&nbsp;&nbsp;<b>
                                {{ date('d-m-Y', strtotime($penyatai->e102_sdate)) }} </b></p>
                            @endif

                            <p>Nama Pegawai Melapor:&nbsp;&nbsp; <b>{{ $penyatai->e102_npg }}</b>
                            </p>
                            <p>Jawatan Pegawai Melapor:&nbsp;&nbsp;<b> {{ $penyatai->e102_jpg }}</b></p>
                            <p>No Telefon Kilang:&nbsp;&nbsp;<b> {{ $penyatai->e102_notel }}</b>
                            </p>




                            {{-- <span>Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat yang diperlukan dan tekan butang ‘Hantar’.</span> --}}
                        </body>
                    </div>

                </form>

                {{-- </div> --}}

                <div class="row justify-content-center" style="margin: 1%">
                    <button type="button" class="btn btn-primary " style="margin:1%" onclick="myPrint('myfrm')"
                        value="print">Cetak</button>
                </div>

            </div>

            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
            </script>


            {{-- <script>
        function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script> --}}
            <script>
                function myPrint(myfrm) {
                    var restorepage = $('body').html();
                    var printcontent = $('#' + myfrm).clone();
                    $('body').empty().html(printcontent);
                    window.print();
                    $('body').html(restorepage);
                }
            </script>


            </body>

            </html>
        @endsection
