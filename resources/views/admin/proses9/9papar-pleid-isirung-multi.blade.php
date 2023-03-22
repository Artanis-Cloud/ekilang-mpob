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
                            @foreach ($query as $nobatch_key => $data)
                            {{-- {{ dd($data) }} --}}
`
                                <div class="pl-3">

                                    <body>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        <div align="">
                                            <table border="0" width="100%">
                                                <tbody style=" width:10rem; margin-right: -10px">
                                                    <tr>
                                                        <td width="85%" height="19">
                                                            <p align=""><b>{{ $data[0]->kodpgw ?? ''}}{{ $data[0]->nosiri  ?? ''}}</b></p>
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
                                                @if($bulan == "01") JANUARI
                                                    @elseif($bulan == "02") FEBRUARI
                                                    @elseif($bulan == "03") MAC
                                                    @elseif($bulan == "04") APRIL
                                                    @elseif($bulan == "05") MEI
                                                    @elseif($bulan == "06") JUN
                                                    @elseif($bulan == "07") JULAI
                                                    @elseif($bulan == "08") OGOS
                                                    @elseif($bulan == "09") SEPTEMBER
                                                    @elseif($bulan == "10") OKTOBER
                                                    @elseif($bulan == "11") NOVEMBER
                                                    @elseif($bulan == "12") DISEMBER
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
                                                        {{ $data[0]->e_nl  }}
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19" style="text-transform:uppercase"><b>
                                                        {{ $data[0]->e_np }}
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

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap1  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap2  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap3  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as1  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as2  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as3  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data[0]->e_notel  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $data[0]->e_nofax  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $data[0]->e_email ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npg  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpg  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npgtg  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpgtg ?? '' }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>

                                        @foreach ($bhg1[$nobatch_key] as $penyata1_key => $datai)

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 : MAKLUMAT IMBANGAN </font>
                                        </b> </p>
                                        <div class="table-responsive">

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
                                                                <font size="2">{{  number_format($datai->F1021G1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021G2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021G3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">B. Stok Awal Di Pusat Simpanan/Gudang</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021H1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021H2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021H3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">C. Belian/Terimaan</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021I1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021I2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021I3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">D. Import</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021J1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021J2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021J3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">E. Diproses</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021K ?? 0,2) }}</font>
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
                                                                <font size="2">{{  number_format($datai->F1021L1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021L2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">G. Jualan/Edaran Tempatan</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021M1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021M2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021M3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">H. Hantar Ke Pusat Simpanan/Gudang</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->eF1021N1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021N2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021N3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">I. Eksport</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021O1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021O2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021O3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">J. Stok Akhir Di Premis</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021Q1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021Q2 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021Q3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="255">
                                                            <font size="2">K. Stok Akhir Di Pusat Simpanan</font>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021R1 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">{{  number_format($datai->F1021R2 ?? 0,2) }}
                                                                </font>
                                                            </p>
                                                        </td>
                                                        <td width="115">
                                                            <p style="text-align: right; vertical-align:middle; margin:0px">
                                                                <font size="2">{{  number_format($datai->F1021R3 ?? 0,2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
                                                    <td width="40%"><b>: {{ number_format($datai->F1021S1 ?? 0,2) }} % </b></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">ii.&nbsp; Kadar Perolehan Dedak Isirung (PKC)&nbsp;
                                                    </td>
                                                    <td width="40%"><b>: {{ number_format($datai->F1021S2 ?? 0,2) }} %</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">iii. Jumlah Jam Pengilangan Isirung (PK)</td>
                                                    <td  width="40%"><b>: {{ number_format($datai->F1021S3 ?? 0,2) }} </b></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">iv. Kadar Penggunaan Kapasiti Sebulan
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td width="116"><b>: {{ number_format($datai->F1021S4 ?? 0,2) }} % </b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @endforeach


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
                                                {{-- {{ dd($bhg3[$nobatch_key]->isNotEmpty()) }} --}}

                                                @if ($bhg3[$nobatch_key])
                                                @foreach ($bhg3[$nobatch_key] as $penyata3_key => $dataiii)
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiii->cat1 ?? '-' }}</td>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiii->cat2 ?? '-'}}</td>
                                                    <td style="text-align: center">{{  number_format($dataiii->F1022F ??  0,2) }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                @foreach ($total3[$nobatch_key] as $tot3_key => $tot3)

                                                    <td style="text-align: center; vertical-align:middle">

                                                        <font size="2"><b>{{  number_format($tot3->total3 ??  0,2) }}</b></font>
                                                    </td>
                                                @endforeach
                                                </tr>
                                                @else
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">

                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                </tr>
                                                @endif
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
                                                @if ($bhg4[$nobatch_key])
                                                @foreach ($bhg4[$nobatch_key] as $penyata4_key => $dataiv)

                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiv->cat1 ?? '-'}}</td>
                                                    <td style="text-align: center; vertical-align:middle">{{ $dataiv->cat2 ?? '-'}}</td>
                                                    <td style="text-align: center">{{  number_format($dataiv->F1022F ??  0,2) }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    @foreach ($total4[$nobatch_key] as $tot4_key => $tot4)

                                                    <td style="text-align: center; vertical-align:middle">

                                                        <font size="2"><b>{{  number_format($tot4->total4 ??  0,2) }}</b></font>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @else
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">

                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                </tr>
                                                @endif
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
                                                @if ($bhg5[$nobatch_key])

                                                @foreach ($bhg5[$nobatch_key] as $penyata5_key => $datav)

                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">{{ $datav->cat1 ?? '-' }}</td>
                                                    <td style="text-align: center; vertical-align:middle">{{ $datav->cat2 ?? '-' }}</td>
                                                    <td style="text-align: center">{{  number_format($datav->F1022F ??  0,2) }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    @foreach ($total5[$nobatch_key] as $tot5_key => $tot5)

                                                    <td style="text-align: center; vertical-align:middle">

                                                        <font size="2"><b>{{  number_format($tot5->total5 ??  0,2) }}</b></font>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @else
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">

                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 6 : EKSPORT PRODUK SAWIT</font>
                                        </b></p>
                                        <div class="table-responsive">

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
                                            </table>
                                        </div><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 7: IMPORT PRODUK SAWIT</font>
                                        </b></p>
                                        <div class="table-responsive">

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
                                            </table>
                                        </div><br>

                                        <p style="font-size: 16px"><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{-- {{ dd($users) }} --}}
                                            @foreach ($users[$nobatch_key] as $users_key => $data)
                                                {{ $data->tkhsubmit ?? ''}}
                                            @endforeach
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            {{-- <span  style="text-transform:uppercase"> {{ $data->h_pelesen->e_npg }}</span> --}}
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            {{-- <span  style="text-transform:uppercase"> {{ $data->h_pelesen->e_jpg }}</span> --}}
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            {{-- {{ $data->h_pelesen->e_notel }} --}}
                                        </p>



                                    </body>
                                </div><br><hr><h1 style="page-break-after:always"></h1>
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
