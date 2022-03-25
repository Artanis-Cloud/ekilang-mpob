@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-3 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="align-self-center" style="margin-left: 2%; margin-bottom:-2%">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="align-self-center" style="margin-left: -1%">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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
                                <div class="row">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">

                                        <body>
                                            <div align="right">
                                                <table border="0" width="25%">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) CF 4</b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) PM 4-CF </b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) PX 4-CF</b></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>



                                            <p align="center">
                                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                                            </p>
                                            <title>PENYATA BULANAN KILANG ISIRONG - MPOB (EL) CF 4</title>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4<br>

                                                    BULAN :
                                                    @if($bulan == 1) Januari
                                                    @elseif($bulan == 2) Februari
                                                    @elseif($bulan == 3) Mac
                                                    @elseif($bulan == 4) April
                                                    @elseif($bulan == 5) Mei
                                                    @elseif($bulan == 6) Jun
                                                    @elseif($bulan == 7) Julai
                                                    @elseif($bulan == 8) Ogos
                                                    @elseif($bulan == 9) September
                                                    @elseif($bulan == 10) Oktober
                                                    @elseif($bulan == 11) November
                                                    @elseif($bulan == 12) Disember
                                                    @endif&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                                                </b><br>

                                            </p>
                                            <hr>

                                            <table border="0" width="100%" cellspacing="0">

                                                <tbody>
                                                    <tr>

                                                        <td width="25%" height="19">
                                                            <font face="Times New Roman">Nombor Lesen</font>
                                                        </td>

                                                        <td width="88%" height="19"><b>
                                                                <font face="Times New Roman">
                                                                    {{ auth()->user()->username }}</font>
                                                            </b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="25%" height="19">
                                                            <font face="Times New Roman">Nama Premis </font>
                                                        </td>

                                                        <td width="88%" height="19"><b>
                                                                <font face="Times New Roman">{{ auth()->user()->name }}
                                                                </font>
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

                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Fax&nbsp;&nbsp;&nbsp;
                                                            <b>{{ $pelesen->e_nofax }}</b>
                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat e-mail </td>

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
                                                    <font color="#000FF0">BAHAGIAN I : MAKLUMAT IMBANGAN </font>
                                                </b> </p>

                                            <table border="1" width="650" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="255">
                                                            <p align="center"><b>
                                                                    <font size="2"> Butir-Butir</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center"><b>
                                                                    <font size="2"> Isirung <br>(PK) (51) </font>
                                                                </b></p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center"><b>
                                                                    <font size="2"> Minyak Isirung Sawit Mentah <br>(CPKO)
                                                                        (04)
                                                                    </font>
                                                                </b></p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center"><b>
                                                                    <font size="2"> Dedak Isirung <br> (PKC) (33)</font>
                                                                </b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">A. Stok Awal Di Premis</font>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_aa1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_aa2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_aa3 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">B. Stok Awal Di Pusat Simpanan / Gudang</font>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ab1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ab2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ab3 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">C. Belian / Penerimaan</font>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ac1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ac2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
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
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ad1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ad2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
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
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ae1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135" bgcolor="#C0C0C0" align="center" style="
                                                            background-color: #c0c0c0;">&nbsp;</td>
                                                        <td width="135" bgcolor="#C0C0C0" align="center" style="
                                                            background-color: #c0c0c0;">&nbsp;</td>
                                                        {{-- <td width="115">
                                                            <p  align="center">
                                                                <font size="2">0.00</font>

                                                            </p>
                                                        </td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">F. Pengeluaran</font>
                                                        </td>
                                                        <td width="115" bgcolor="#C0C0C0" align="center" style="
                                                            background-color: #c0c0c0;">&nbsp;</td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_af2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_af3 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">G. Jualan / Edaran Tempatan</font>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ag1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ag2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ag3 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">H. Hantar Ke Pusat Simpanan / Gudang</font>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ah1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ah2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
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
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ai1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ai2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
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
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_aj1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_aj2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
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
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ak1 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ak2 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p align="center">
                                                                <font size="2">
                                                                    {{ number_format($penyatai->e102_ak3 ?? 0, 2) }}
                                                                </font>

                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <p><b>
                                                    <font color="#000FF0">BAHAGIAN II : KADAR PERAHAN CPKO, KADAR PEROLEHAN
                                                        PKC, JAM PENGILANGAN DAN PENGGUNAAN
                                                        KAPASITI</font>
                                                </b> </p>

                                            <table border="0" width="498" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="378">i.&nbsp;&nbsp; Kadar Perahan Minyak Isirong Sawit
                                                            Mentah (CPKO)&nbsp;</td>
                                                        <td width="116">:
                                                            {{ number_format($penyataii->e102_al1 ?? 0, 2) }} % </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="378">ii.&nbsp; Kadar Perolehan Dedak Isirong (PKC)&nbsp;
                                                        </td>
                                                        <td width="116">:
                                                            {{ number_format($penyataii->e102_al2 ?? 0, 2) }} %</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="378">iii. Jumlah Jam Pengilangan Isirong (PK)</td>
                                                        <td width="116">:
                                                            {{ number_format($penyataii->e102_al3 ?? 0, 2) }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="378">iv. Kadar Penggunaan Kapasiti Sebulan
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                        <td width="116">:
                                                            {{ number_format($penyataii->e102_al4 ?? 0, 2) }} % </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN III : BELIAN / PENERIMAAN BEKALAN ISIRONG
                                                        SAWIT (PK) (51)</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Belian/Penerimaan</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Dari</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Kuantiti</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyataiii as $data)
                                                        <tr>
                                                            <td align="center">
                                                                <font size="2">{{ $data->kodsl->catname ?? '' }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $data->prodcat2->catname ?? '' }}
                                                                </font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">
                                                                    {{ number_format($data->e102_b6 ?? 0, 2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>{{ number_format($totaliii ?? 0, 2) }}</b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN IV : EDARAN / JUALAN MINYAK ISIRONG SAWIT
                                                        MENTAH (CPKO) (04)</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Edaran/jualan</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Ke</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Kuantiti</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyataiv as $data)
                                                        <tr>
                                                            <td align="center">
                                                                <font size="2">{{ $data->kodsl->catname ?? '' }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $data->prodcat2->catname ?? '' }}
                                                                </font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">
                                                                    {{ number_format($data->e102_b6 ?? 0, 2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>{{ number_format($totaliv ?? 0, 2) }}</b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN V : EDARAN / JUALAN DEDAK ISIRONG SAWIT
                                                        (PKC) (33)</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Edaran/Jualan</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Ke</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Kuantiti</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyatav as $data)
                                                        <tr>
                                                            <td align="center">
                                                                <font size="2">{{ $data->kodsl->catname ?? '' }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $data->prodcat2->catname ?? '' }}
                                                                </font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">
                                                                    {{ number_format($data->e102_b6 ?? 0, 2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>{{ number_format($totalv ?? 0, 2) }}</b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN VI : EKSPORT PRODUK SAWIT</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="14%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="7%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="15%" align="center"><b>
                                                                <font size="2">Nombor Borang Kastam 2</font>
                                                            </b></td>
                                                        <td width="12%" align="center"><b>
                                                                <font size="2">Tarikh Eksport</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Kuantiti<br> (Tan Metrik)</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Nilai (RM)</font>
                                                            </b></td>
                                                        <td width="6%" align="center"><b>
                                                                <font size="2">Kod Negara</font>
                                                            </b></td>
                                                        <td width="15%" align="center"><b>
                                                                <font size="2">Destinasi Negara</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @foreach ($penyatavi as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->produk->prodname ?? '' }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e102_c4 }}</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2">{{ $data->e102_c5 }}</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2">{{ $data->e102_c6 }}</font>
                                                        </td>
                                                        <td  align="center">
                                                            <font size="2">{{ number_format($data->e102_c7 ??  0,2) }}</font>
                                                        </td>
                                                        <td  align="center">
                                                            <font size="2">{{ number_format($data->e102_c8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e102_c9 }}</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2">{{ $data->negara->namanegara ?? '' }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                            {{-- <p><b>
                                                    <font color="#0000FF">BAHAGIAN VII : IMPORT PRODUK SAWIT</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="14%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="7%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="15%" align="center"><b>
                                                                <font size="2">Nombor Borang Kastam 1</font>
                                                            </b></td>
                                                        <td width="12%" align="center"><b>
                                                                <font size="2">Tarikh Import</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Kuantiti<br> (Tan Metrik)</font>
                                                            </b></td>
                                                        <td width="11%" align="center"><b>
                                                                <font size="2">Nilai (RM)</font>
                                                            </b></td>
                                                        <td width="6%" align="center"><b>
                                                                <font size="2">Kod Negara</font>
                                                            </b></td>
                                                        <td width="15%" align="center"><b>
                                                                <font size="2">Negara Sumber</font>
                                                            </b></td>
                                                    </tr>
                                                </tbody>
                                            </table> --}}

                                            <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                    adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>
                                            <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                                <input type="date" id="e91_sdate" class="form-control" size="50"
                                                    name='e102_sdate' value="{{ $penyatai->e102_sdate }}" readonly>
                                            </p>
                                            <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                                <input type="text" id="e_npg" class="form-control" size="50"
                                                    name='e102_npg' value="{{ $penyatai->e102_npg }}">
                                            </p>
                                            <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                                <input type="text" id="e_jpg" class="form-control" size="50"
                                                    name='e102_jpg' value="{{ $penyatai->e102_jpg }}">
                                            </p>
                                            <p>No Telefon Kilang: &nbsp;&nbsp;

                                                <input type="text" id="e_notel" class="form-control" size="50"
                                                    name="e102_notel" value="">
                                            </p>




                                            <h1 style="page-break-before:always"></h1>

                                            <div class="row form-group" style="padding-top: 10px; ">


                                                <div class="text-left col-md-5">
                                                    <a href="{{ route('isirung.bahagianv') }}" class="btn btn-primary"
                                                        style="float: left">Sebelumnya</a>
                                                </div>
                                                <div class="text-right col-md-7 mb-4 ">
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" style="float: right"
                                                        data-bs-target="#exampleModalCenter">Hantar</button>
                                                    <button type="button" class="btn btn-primary " style="float: right; margin-right:1%"
                                                        onclick="myPrint('myfrm')" value="print">Cetak</button>
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
                                                            <button type="button" class="close"
                                                                data-bs-dismiss="modal" aria-label="Close">
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
                        </div>
                </div>
                </form>
            </div>
            <br>
            {{-- </form> --}}

        </div>
        </div>
        </div>




        {{-- </div>
                            </div> --}}

        {{-- </section> --}}


















    </section><!-- End Hero -->




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
