@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
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
        <div class="card" style="margin-right:2%; margin-left:2%; margin-top:2%">

            <br>
            <div class="card-body">
                    <div class="pl-3">

                        <body>
                            <div align="">
                                <table border="0" width="90%">
                                    <tbody>
                                        <tr>
                                            <td width="" height="19">
                                                <p align=""><b>{{ $pelesen->kodpgw }}{{ $pelesen->nosiri }}</b></p>
                                            </td>
                                            <td width="88%" height="19">
                                                <p align="right"><b>MPOB(EL) CF 4</b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="10%" height="19">
                                                <p align=""><b></b></p>
                                            </td>
                                            <td width="88%" height="19">
                                                <p align="right"><b>MPOB(EL) PM 4-CF </b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="10%" height="19">
                                                <p align=""><b></b></p>
                                            </td>
                                            <td width="88%" height="19">
                                                <p align="right"><b>MPOB(EL) PX 4-CF </b></p>
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
                                    @if($bulan == 1) JANUARI
                                    @elseif($bulan == 2) FEBRUARI
                                    @elseif($bulan == 3) MAC
                                    @elseif($bulan == 4) APRIL
                                    @elseif($bulan == 5) MEI
                                    @elseif($bulan == 6) JUN
                                    @elseif($bulan == 7) JULAI
                                    @elseif($bulan == 8) OGOS
                                    @elseif($bulan == 9) SEPTEMBER
                                    @elseif($bulan == 10) OKTOBER
                                    @elseif($bulan == 11) NOVEMBER
                                    @elseif($bulan == 12) DISEMBER
                                    @endif
                                    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
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

                                        <td width="35%">Alamat Emel Kilang</td>

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
                                        <td width="255"style="text-align: center; vertical-align:middle">
                                            <b>
                                                    <font size="2"> Butir-Butir</font>
                                                </b>
                                        </td>
                                        <td width="115"style="text-align: center; vertical-align:middle">
                                            <b>
                                                    <font size="2"> Isirung <br>(PK) (51) </font>
                                                </b>
                                        </td>
                                        <td width="135" style="text-align: center; vertical-align:middle">
                                            <b>
                                                    <font size="2"> Minyak Isirung Sawit Mentah <br>(CPKO)
                                                        (04)
                                                    </font>
                                                </b>
                                        </td>
                                        <td width="115" style="text-align: center; vertical-align:middle">
                                            <b>
                                                    <font size="2"> Dedak Isirung <br> (PKC) (33)</font>
                                                </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="255">
                                            <font size="2">A. Stok Awal Di Premis</font>
                                        </td>
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle ; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aa1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_aa2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ab1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ab2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ac1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ac2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ad1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ad2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ae1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135" bgcolor="#C0C0C0" style="text-align: right; vertical-align:middle; margin:0px" style="
                                            background-color: #c0c0c0;">&nbsp;</td>
                                        <td width="135" bgcolor="#C0C0C0" style="text-align: right; vertical-align:middle; margin:0px" style="
                                            background-color: #c0c0c0;">&nbsp;</td>
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
                                        <td width="115" bgcolor="#C0C0C0" style="text-align: right; vertical-align:middle; margin:0px" style="
                                            background-color: #c0c0c0;">&nbsp;</td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_af2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ag1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ag2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ah1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ah2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                        <td width="115">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ai1 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="135">
                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                <font size="2">
                                                    {{ number_format($penyatai->e102_ai2 ?? 0, 2) }}
                                                </font>

                                            </p>
                                        </td>
                                        <td width="115">
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
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 2 : KADAR PERAHAN CPKO, KADAR PEROLEHAN
                                        PKC, JAM PENGILANGAN DAN PENGGUNAAN
                                        KAPASITI PEMPROSESAN</font>
                                </b> </p>

                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="30%">i.&nbsp;&nbsp; Kadar Perahan Minyak Isirung Sawit
                                            Mentah (CPKO)&nbsp;</td>
                                        <td width="40%">:<b>
                                            {{ number_format($penyataii->e102_al1 ?? 0, 2) }} %</b> </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">ii.&nbsp; Kadar Perolehan Dedak Isirung (PKC)&nbsp;
                                        </td>
                                        <td width="40%">:<b>
                                            {{ number_format($penyataii->e102_al2 ?? 0, 2) }} %</b></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">iii. Jumlah Jam Pengilangan Isirung (PK)</td>
                                        <td width="40%">:<b>
                                            {{ number_format($penyataii->e102_al3 ?? 0, 2) }}</b> </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">iv. Kadar Penggunaan Kapasiti Sebulan
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td width="40%">:<b>
                                            {{ number_format($penyataii->e102_al4 ?? 0, 2) }} %</b> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 : BELIAN/TERIMAAN BEKALAN ISIRUNG
                                        SAWIT (PK) (51)</font>
                                </b></p>
                            <table border="1" style="width: 50%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr  style="background-color: #d3d3d370">
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Belian/Terimaan</font>
                                            </b></td>
                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Dari</font>
                                            </b></td>
                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kuantiti</font>
                                            </b></td>
                                    </tr>
                                    @if ($penyataiii)
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
                                        @else
                                        <tr>
                                            <td style="text-align: center; vertical-align:middle" colspan="3">
                                                Tiada Rekod
                                            </td>

                                        </tr>
                                    @endif

                                    <tr  style="background-color: #d3d3d370" >
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>-</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>JUMLAH</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>{{ number_format($totaliii ?? 0, 2) }}</b>
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>

                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 : JUALAN/EDARAN MINYAK ISIRUNG SAWIT
                                        MENTAH (CPKO) (04)</font>
                                </b></p>
                            <table border="1" style="width: 50%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran</font>
                                            </b></td>
                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Ke</font>
                                            </b></td>
                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
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
                                    <tr style="background-color: #d3d3d370">
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>-</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>JUMLAH</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>{{ number_format($totaliv ?? 0, 2) }}</b>
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 : JUALAN/EDARAN DEDAK ISIRUNG SAWIT
                                        (PKC) (33)</font>
                                </b></p>
                            <table border="1" style="width: 50%"
                            cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr  style="background-color: #d3d3d370">
                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Jualan/Edaran</font>
                                            </b></td>
                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Ke</font>
                                            </b></td>
                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
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
                                    <tr  style="background-color: #d3d3d370">
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>-</b></font>
                                        </td>
                                        <td style="text-align: center; vertical-align:middle">
                                            <font size="2"><b>JUMLAH</b></font>
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
                                                <font size="2">Kuantiti<br> (Tan Metrik)</font>
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
                                    <tr>
                                        <td width="14%" style="text-align: center; vertical-align:middle" colspan="8">Tiada Rekod</td>

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

                            </table><br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 7 : IMPORT PRODUK SAWIT</font>
                                </b></p>
                            <table border="1" style="width: 100%" cellspacing="0" cellpadding="0" class="table table-bordered">
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
                                                <font size="2">Kuantiti<br> (Tan Metrik)</font>
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
                                    <tr>
                                        <td width="14%" style="text-align: center; vertical-align:middle" colspan="8">Tiada Rekod</td>

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
                            <form action="{{ route('isirung.update.papar.penyata', [$penyatai->e102_reg]) }}"
                                method="post" novalidate>
                                @csrf
                                <p>
                                    <div class="required">Nama Pegawai Melapor:</div>
                                    <input type="text" id="e_npg" class="form-control" size="50"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('');invokeFunc(); valid_npg()"
                                        name='e102_npg' value="{{ $penyatai->e102_npg }}" required>
                                        <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi
                                            butiran di bahagian ini!</i></p>
                                </p>
                                <p>
                                    <div class="required">Jawatan Pegawai Melapor:</div>
                                    <input type="text" id="e_jpg" class="form-control" size="50"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('');invokeFunc2(); valid_jpg()"
                                        name='e102_jpg' value="{{ $penyatai->e102_jpg }}" required>
                                        <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi
                                            butiran di bahagian ini!</i></p>
                                </p>
                                <p>
                                    <div class="required">No Telefon Kilang:</div>

                                    <input type="text" id="e_notel" class="form-control" size="50"
                                        oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('');valid_notel()"
                                        name="e102_notel" value="{{ $penyatai->e102_notel }}" required>
                                    <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i>
                                    </p>
                                    <p type="hidden" id="err_notel2" style="color: red; display:none"><i>Sila masukkan nombor telefon yang betul!</i></p>
                                    </p>

                                </p>

                                <div class="form-group" style="padding-top: 10px; ">
                                        <a href="{{ route('isirung.bahagianv') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>
                                        <button type="button" class="btn btn-primary " id="checkBtn" onclick="check()"
                                        style="float: right">Hantar</button>
                                        {{-- <button type="button" class="btn btn-primary " style="float: right; margin-right:1%"
                                            onclick="myPrint('myfrm')" value="print">Cetak</button> --}}
                                </div>

                                <div class="modal fade" id="next" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    PENGESAHAN</h5>
                                                <button type="button" class="close"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <span style="font-size: 16px; margin-bottom:0; text-align: justify; text-justify: inter-word"><b>
                                                    Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                                    benar, lengkap dan selaras dengan rekod harian.
                                                </b></span>
                                                <p>
                                                    Anda pasti mahu menghantar penyata ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block"
                                                        style="color:#275047">Tidak</span>
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

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
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
function valid_notel() {

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
        function invokeFunc() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e_jpg').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invokeFunc2() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e_notel').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>


    </html>
@endsection
