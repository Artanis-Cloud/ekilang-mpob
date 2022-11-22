@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Terdahulu Kilang Isirung</h4>
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
                        <a href="javascript:history.back()"  class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                </div>

                <div class="card" style="margin-right:2%; margin-left:2%">


                    <div class="card-body">
                        <form method="get" action="" id="myfrm">
                            @foreach ($penyata as $data)

                                <div class="pl-3">

                                    <body>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        <div align="">
                                            <table border="0" width="100%">
                                                <tbody style=" width:10rem; margin-right: -10px">
                                                    <tr>
                                                        <td width="85%" height="19">
                                                            <p align=""><b>{{ $data->h_pelesen->kodpgw }}{{ $data->h_pelesen->nosiri }}</b></p>
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

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                            height="100">
                                        </p>
                                        <title>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4<br>

                                                BULAN :
                                                @if($data->e102_bln == "01") JANUARI
                                                    @elseif($data->e102_bln == "02") FEBRUARI
                                                    @elseif($data->e102_bln == "03") MAC
                                                    @elseif($data->e102_bln == "04") APRIL
                                                    @elseif($data->e102_bln == "05") MEI
                                                    @elseif($data->e102_bln == "06") JUN
                                                    @elseif($data->e102_bln == "07") JULAI
                                                    @elseif($data->e102_bln == "08") OGOS
                                                    @elseif($data->e102_bln == "09") SEPTEMBER
                                                    @elseif($data->e102_bln == "10") OKTOBER
                                                    @elseif($data->e102_bln == "11") NOVEMBER
                                                    @elseif($data->e102_bln == "12") DISEMBER
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $data->e102_thn }}
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
                                                        {{ $data->h_pelesen->e_nl }}
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19" style="text-transform:uppercase"><b>
                                                        {{ $data->h_pelesen->e_np }}
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

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_ap1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_ap2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_ap3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_as1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_as2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_as3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data->h_pelesen->e_notel }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $data->h_pelesen->e_nofax }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $data->h_pelesen->e_email }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_npg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_jpg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_npgtg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data->h_pelesen->e_jpgtg }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 : MAKLUMAT IMBANGAN </font>
                                        </b> </p>

                                        <table border="1" style="width: 65%"  cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="255" style="text-align: center; vertical-align:middle; margin:0px">
                                                        <b>
                                                                <font size="2"> Butir-Butir</font>
                                                            </b>
                                                    </td>
                                                    <td width="115" style="text-align: center; vertical-align:middle; margin:0px">
                                                        <b>
                                                                <font size="2"> Isirung <br>(PK) (51) </font>
                                                            </b>
                                                    </td>
                                                    <td width="135" style="text-align: center; vertical-align:middle; margin:0px">
                                                        <b>
                                                                <font size="2"> Minyak Isirung Sawit Mentah <br>(CPKO) (04)
                                                                </font>
                                                            </b>
                                                    </td>
                                                    <td width="115" style="text-align: center; vertical-align:middle; margin:0px">
                                                    <b>
                                                                <font size="2"> Dedak Isirung <br>(PKC) (33)</font>
                                                            </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">A. Stok Awal Di Premis</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_aa1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_aa2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_aa3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">B. Stok Awal Di Pusat Simpanan/Gudang</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ab1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ab2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ab3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">C. Belian/Terimaan</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ac1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ac2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ac3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">D. Import</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ad1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ad2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ad3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">E. Diproses</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ae1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135" bgcolor="#C0C0C0" style="text-align: center; vertical-align:middle" style="
                                                            background-color: #808080b8;
                                                        ">&nbsp;</td>
                                                    <td width="135" bgcolor="#C0C0C0" style="text-align: center; vertical-align:middle" style="
                                                            background-color: #808080b8;
                                                        ">&nbsp;</td>

                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">F. Pengeluaran</font>
                                                    </td>
                                                    <td width="115" bgcolor="#C0C0C0" style="text-align: center; vertical-align:middle" style="
                                                        background-color: #808080b8;
                                                    ">&nbsp;</td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_af2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_af3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">G. Jualan/Edaran Tempatan</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ag1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ag2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ag3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">H. Hantar Ke Pusat Simpanan/Gudang</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ah1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ah2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ah3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">I. Eksport</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ai1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ai2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ai3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">J. Stok Akhir Di Premis</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_aj1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_aj2 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_aj3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="255">
                                                        <font size="2">K. Stok Akhir Di Pusat Simpanan</font>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ak1 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">{{  number_format($data->e102_ak2 ?? 0,2) }}
                                                            </font>
                                                        </p>
                                                    </td>
                                                    <td width="115">
                                                        <p style="text-align: right; vertical-align:middle; margin:0px">
                                                            <font size="2">{{  number_format($data->e102_ak3 ?? 0,2) }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 2 : KADAR PERAHAN CPKO, KADAR PEROLEHAN
                                                PKC, JAM PENGILANGAN
                                                DAN PENGGUNAAN KAPASITI PEMPROSESAN</font>
                                        </b> </p>

                                        <table border="0" width="100%"  cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">i.&nbsp;&nbsp; Kadar Perahan Minyak Isirung Sawit
                                                        Mentah (CPKO)&nbsp;
                                                    </td>
                                                    <td width="40%"><b>: {{ number_format($data->e102_al1 ?? 0,2) }} % </b></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">ii.&nbsp; Kadar Perolehan Dedak Isirung (PKC)&nbsp;
                                                    </td>
                                                    <td width="40%"><b>: {{ number_format($data->e102_al2 ?? 0,2) }} %</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">iii. Jumlah Jam Pengilangan Isirung (PK)</td>
                                                    <td  width="40%"><b>: {{ number_format($data->e102_al3 ?? 0,2) }} </b></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">iv. Kadar Penggunaan Kapasiti Sebulan
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="116"><b>: {{ number_format($data->e102_al4 ?? 0,2) }} % </b></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 : BELIAN/TERIMAAN BEKALAN ISIRUNG
                                                SAWIT (PK) (51)
                                            </font>
                                        </b></p>

                                        <table border="1" style="width: 50%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
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
                                                @foreach ($iii as $dataiii)
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiii->kodsl->catname }}</td>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiii->prodcat2->catname }}</td>
                                                    <td style="text-align: center">{{  number_format($dataiii->e102_b6 ??  0,2) }}</td>
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
                                                        <font size="2"><b>{{  number_format($totaliii ??  0,2) }}</b></font>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table><br>




                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 : JUALAN/EDARAN MINYAK ISIRUNG SAWIT
                                                MENTAH (CPKO) (04)
                                            </font>
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
                                                @foreach ($iv as $dataiv)
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiv->kodsl->catname }}</td>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiv->prodcat2->catname }}</td>
                                                    <td style="text-align: center">{{  number_format($dataiv->e102_b6 ??  0,2) }}</td>
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
                                                        <font size="2"><b>{{  number_format($totaliv ??  0,2) }}</b></font>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 : JUALAN/EDARAN DEDAK ISIRUNG SAWIT
                                                (PKC) (33)</font>
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
                                                @foreach ($v as $datav)
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">{{ $datav->kodsl->catname }}</td>
                                                    <td style="text-align: center; vertical-align:middle">{{ $datav->prodcat2->catname }}</td>
                                                    <td style="text-align: center">{{  number_format($datav->e102_b6 ??  0,2) }}</td>
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
                                                        <font size="2"><b>{{ number_format( $totalv ??  0,2) }}</b></font>
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
                                                {{-- @foreach ($vi as $datavi)
                                                <tr>
                                                    <td>{{ $datavi->produk->proddesc }}</td>
                                                    <td>{{ $datavi->e102_c4 }}</td>
                                                    <td>{{ $datavi->e102_c5 }}</td>
                                                    <td>{{ $datavi->e102_c6 }}</td>
                                                    <td>{{  number_format($datavi->e102_c7 ??  0,2) }}</td>
                                                    <td>{{  number_format($datavi->e102_c8 ??  0,2) }}</td>
                                                    <td>{{ $datavi->e102_c9 }}</td>
                                                    <td>{{ $datavi->negara->namanegara }}</td>
                                                </tr>
                                                @endforeach --}}
                                            </tbody>
                                        </table><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 7: IMPORT PRODUK SAWIT</font>
                                        </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
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
                                                {{-- @foreach ($vi as $datavi)
                                                <tr>
                                                    <td>{{ $datavi->produk->proddesc }}</td>
                                                    <td>{{ $datavi->e102_c4 }}</td>
                                                    <td>{{ $datavi->e102_c5 }}</td>
                                                    <td>{{ $datavi->e102_c6 }}</td>
                                                    <td>{{  number_format($datavi->e102_c7 ??  0,2) }}</td>
                                                    <td>{{  number_format($datavi->e102_c8 ??  0,2) }}</td>
                                                    <td>{{ $datavi->e102_c9 }}</td>
                                                    <td>{{ $datavi->negara->namanegara }}</td>
                                                </tr>
                                                @endforeach --}}
                                            </tbody>
                                        </table><br>

                                        <p style="font-size: 16px"><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{ $formatteddate }}
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            <span  style="text-transform:uppercase"> {{ $data->h_pelesen->e_npg }}</span>
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            <span  style="text-transform:uppercase"> {{ $data->h_pelesen->e_jpg }}</span>
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            {{ $data->h_pelesen->e_notel }}
                                        </p>



                                    </body>
                                </div><br><hr class="noScreenPelesen"><h1 style="page-break-after:always"></h1>
                            @endforeach

                        </form>

                    </div>
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
