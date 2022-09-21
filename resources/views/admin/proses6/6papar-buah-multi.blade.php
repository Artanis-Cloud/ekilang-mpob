@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">
                <div class="page-breadcrumb"  style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Terkini Kilang Buah</h4>
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
                        <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                    {{-- <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary "
                                onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div> --}}
                </div>

                <div class="card" style="margin-right:2%; margin-left:2%">
                    <div class="card-body">
                        <form method="get" action="" id="myfrm">

                            @foreach ($penyata as $data)
                                {{-- @foreach (array_merge($pelesens, $data) as $data) --}}


                                    {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">
                                    <body><h1 style="page-break-before:always"></h1>
                                        {{-- <p align="left">
                                                            PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        <div align="right">
                                            <table border="0" width="25%">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p align="left"><b>MPOB(EL) MF 4</b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p align="left"><b>MPOB(EL) PX 4-M </b></p>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                                        </p>
                                        <title>PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4</title>
                                        <p align="center"><b>
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

                                        <table border="0" width="100%" cellspacing="0">

                                            <tbody>
                                                <tr>

                                                    <td width="25%" height="19">Nombor Lesen
                                                    </td>

                                                    <td width="88%" height="19"><b>{{ $data->pelesen->e_nl }}
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19"><b>
                                                            {{ $data->pelesen->e_np }}
                                                        </b></td>

                                                </tr>

                                            </tbody>
                                        </table>

                                        <hr>

                                        <p></p>


                                        <p align="left"><b>
                                                <font color="#0c7c85">MAKLUMAT PELESEN </font>
                                            </b></p>

                                        <table border="0" width="72%" cellpadding="0" cellspacing="0">

                                            <tbody>


                                                <tr>

                                                    <td width="35%">Alamat Premis Berlesen</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_ap1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_ap2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_ap3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_as1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_as2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_as3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_notel }}</b>


                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_nofax }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Emel </td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_email }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_npg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_jpg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_npgtg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_jpgtg }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table><br><hr>



                                                <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 : MAKLUMAT BELIAN, PROSES,
                                                        PENGELUARAN, JUALAN/EDARAN, STOK AKHIR
                                                        (Berdasarkan Dalam Premis Kilang Sahaja.)</font>
                                                </b> </p>

                                            <table border="1" width="650" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="220" style="background-color: #d3d3d370">
                                                            <p align="center"><b>
                                                                    <font size="2.7">Butiran</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center"><b>
                                                                    <font size="2.7">Buah Kelapa Sawit <br>(FFB) Kod 52</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center"><b>
                                                                    <font size="2.7">Minyak Sawit Mentah <br> (CPO) Kod 01
                                                                    </font>
                                                                </b></p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="center"><b>
                                                                    <font size="2.7">Isirung <br>(PK) Kod 51</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center"><b>
                                                                    <font size="2.7">Minyak Keladak <br>(Sludge Oil) Kod 49
                                                                    </font>
                                                                </b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="2.7">A. Stok Awal Di Premis</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_aa1 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p style="text-align: center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_aa2 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_aa3 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_aa4 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="2.7">B. Pembelian/Terimaan</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ab1 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ab2 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ab3 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ab4 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="2.7">C. Diproses</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ac1 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135" bgcolor="#C0C0C0" align="center">&nbsp;</td>
                                                        <td width="110" bgcolor="#C0C0C0" align="center">&nbsp;</td>
                                                        <td width="120" bgcolor="#C0C0C0" align="center">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="2.7">D. Pengeluaran</font>
                                                        </td>
                                                        <td width="120" bgcolor="#C0C0C0" align="center">
                                                            <p align="left">&nbsp;</p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ad1 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ad2 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ad3 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="2.7">E. Penjualan/Pengedaran Tempatan</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ae1 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ae2 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ae3 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ae4 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="2.7">F. Eksport&nbsp;Terus Dari Premis</font>
                                                        </td>
                                                        <td width="120" bgcolor="#C0C0C0" align="center">
                                                            <p align="left">&nbsp;</p>
                                                        </td>
                                                        <td width="135" bgcolor="#C0C0C0">
                                                            <p align="center">
                                                                <font size="2.7"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="110" bgcolor="#C0C0C0">
                                                            <p align="center">
                                                                <font size="2.7" </font>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="120" bgcolor="#C0C0C0">
                                                            <p align="center">
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
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ag1 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ag2 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ag3 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center">
                                                                <font size="2.7">
                                                                    {{ number_format($data->e91_ag4 ?? 0, 2) }}</font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br><hr>

                                            <p><b>
                                                    <font style="font-size: 15px" color="0c7c85">BAHAGIAN 2 : MAKLUMAT JAM PENGILANGAN,
                                                        KADAR
                                                        PERAHAN DAN HARGA </font>
                                                </b> </p>

                                            <table border="0" width="460" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="380">
                                                            <font size="2.7">i.&nbsp;&nbsp; Jumlah Jam Pengilangan&nbsp;
                                                            </font>
                                                        </td>
                                                        <td width="70">
                                                            <font size="2.7"><b>:
                                                                {{ number_format($data->e91_ah1 ?? 0, 2) }}</b></font>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="380">
                                                            <font size="2.7">ii.&nbsp; Kadar Perahan MSM (OER) yang
                                                                diperolehi&nbsp;</font>
                                                        </td>
                                                        <td width="100">
                                                            <font size="2.7"><b>:
                                                                {{ number_format($data->e91_ah2 ?? 0, 2) }}%</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="380">
                                                            <font size="2.7">iii. Kadar Perolehan Isirung (KER)</font>
                                                        </td>
                                                        <td width="100">
                                                            <font size="2.7"><b>:
                                                                {{ number_format($data->e91_ah3 ?? 0, 2) }}%</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="1000">
                                                            <font size="2.7">iv. Harga Purata Belian Buah Kelapa Sawit
                                                                (FFB)
                                                            </font>
                                                        </td>
                                                        <td width="150">
                                                            <font size="2.7"><b>:&nbsp;RM
                                                                {{ number_format($data->e91_ah4 ?? 0, 2) }}</b></font>
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



                                            <table border="1" width="604" cellspacing="0" cellpadding="0"
                                                class="table table-bordered ">

                                                <tbody style="border: 1px solid black;">
                                                    <tr style="border: 1px solid black; background-color: #d3d3d370">
                                                        <td align="center" width="209"><b>
                                                                <font size="2.7">Sebab-Sebab OER Meningkat</font>
                                                            </b></td>
                                                        <td align="center" width="92">
                                                            <font size="2.7"><b>Tanda (<font face="Times New Roman">&#10004;)
                                                                    </font></b>
                                                            </font>
                                                        </td>
                                                        <td align="center" width="201"><b>
                                                                <font size="2.7">Sebab-Sebab OER Menurun</font>
                                                            </b></td>
                                                        <td align="center" width="93">
                                                            <font size="2.7"><b>Tanda (<font face="Times New Roman">&#10004;)
                                                                    </font></b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="2.7">a. Buah berkualiti</font>
                                                        </td>

                                                        @if ($data->e91_ah5 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah5 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;&nbsp;&nbsp;</font>
                                                            </td>
                                                        @endif

                                                        <td width="201" align="left">
                                                            <font size="2.7">
                                                                a. Tiada/ kurang buah berkualiti</font>
                                                        </td>
                                                        @if ($data->e91_ah11 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah11 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="2.7">b. Kesan dari cuaca yang baik</font>
                                                        </td>
                                                        @if ($data->e91_ah6 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah6 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="2.7">
                                                                b. Kesan cuaca kering</font>
                                                        </td>
                                                        @if ($data->e91_ah12 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah12 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="2.7">c. Proses kitar semula minyak</font>
                                                        </td>
                                                        @if ($data->e91_ah7 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah7 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="2.7">
                                                                c. Jerebu</font>
                                                        </td>
                                                        @if ($data->e91_ah13 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah13 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="2.7">d. Kecekapan kilang/mesin</font>
                                                        </td>
                                                        @if ($data->e91_ah8 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah8 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="2.7">
                                                                d. Kesan Penerimaan hujan yang berlebihan</font>
                                                        </td>
                                                        @if ($data->e91_ah14 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah14 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="2.7">e. Proses pengendalian bks yang minima (less ffb
                                                                handling)</font>
                                                        </td>
                                                        @if ($data->e91_ah9 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah9 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="2.7">
                                                                e. Banjir</font>
                                                        </td>
                                                        @if ($data->e91_ah15 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah15 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209" rowspan="2">
                                                            <font size="2.7">f. Proses lebih buah lerai</font>
                                                        </td>
                                                        @if ($data->e91_ah10 == 'Y')
                                                            <td width="92" align="center" rowspan="2">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah10 == null)
                                                            <td width="92" align="center" rowspan="2">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="2.7">
                                                                f. Buah Dari Ladang Baru Berhasil</font>
                                                        </td>
                                                        @if ($data->e91_ah16 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah16 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="201" align="left">
                                                            <font size="2.7">
                                                                g.Kurang Buah Lerai</font>
                                                        </td>
                                                        @if ($data->e91_ah17 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="2.7">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($data->e91_ah17 == null)
                                                            <td width="92" align="center">
                                                                <font size="2.7"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>
                                                <font size="2.7">Lain-lain jawapan, sila nyatakan (max. 100 character):
                                                    {{ $data->e91_ah18 ?? '-' }}</font>
                                            </p><hr>




                                            <p align="left">
                                                <font style="font-size: 15px" color="#0c7c85"><b>BAHAGIAN 3 : BELIAN/TERIMAAN BEKALAN
                                                        BUAH
                                                        KELAPA SAWIT (FFB) (52)</b>
                                                </font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered ">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td align="center" width="168">
                                                            <font size="2.7"><b>Sumber Bekalan</b></font>
                                                        </td>
                                                        <td align="center" width="158">
                                                            <font size="2.7"><b>Kuantiti (Tan Metrik)</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">1. Estet Sendiri</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ai1 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">2. Estet Luar</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ai2 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">3. Peniaga Buah</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ai3 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">4. Pekebun Kecil</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ai4 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">5. Kilang Buah Lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ai5 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">6. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ai6 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">&nbsp;&nbsp;&nbsp;&nbsp;<b>JUMLAH</b></font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">
                                                                <b>{{ number_format(
                                                                    ($data->e91_ai1 ?? 0) +
                                                                        ($data->e91_ai2 ?? 0) +
                                                                        ($data->e91_ai3 ?? 0) +
                                                                        ($data->e91_ai4 ?? 0) +
                                                                        ($data->e91_ai5 ?? 0) +
                                                                        ($data->e91_ai6 ?? 0) ??
                                                                        0,
                                                                    2,
                                                                ) }}</b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><hr>


                                            <p align="left">
                                                <font style="font-size: 15px" color="#0c7c85"><b>BAHAGIAN 4 : JUALAN/EDARAN MINYAK SAWIT
                                                        MENTAH (CPO) (01) </b></font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td align="center" width="168">
                                                            <font size="2.7"><b>Pembeli/Terimaan</b></font>
                                                        </td>
                                                        <td align="center" width="158">
                                                            <font size="2.7"><b>Kuantiti (Tan Metrik)</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">1. Kilang Buah</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj1 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">2. Kilang Penapis</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj2 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">3. Kilang Oleokimia</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj3 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">4. Peniaga</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj4 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">5. Pusat Simpanan</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj5 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">6. Eksport</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj6 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">7. Transit</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj7 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">8. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_aj8 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7"><b>&nbsp;&nbsp;&nbsp;&nbsp; JUMLAH</b></font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">
                                                                <b>{{ number_format(
                                                                    ($data->e91_aj1 ?? 0) +
                                                                        ($data->e91_aj2 ?? 0) +
                                                                        ($data->e91_aj3 ?? 0) +
                                                                        ($data->e91_aj4 ?? 0) +
                                                                        ($data->e91_aj5 ?? 0) +
                                                                        ($data->e91_aj6 ?? 0) +
                                                                        ($data->e91_aj7 ?? 0) +
                                                                        ($data->e91_aj8 ?? 0) ??
                                                                        0,
                                                                    2,
                                                                ) }}</b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><hr>


                                            <p align="left">
                                                <font style="font-size: 15px" color="#0c7c85"><b>BAHAGIAN 5 : JUALAN/EDARAN ISIRUNG SAWIT
                                                        (PK) DALAM NEGERI
                                                        (51)</b></font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td align="center" width="168">
                                                            <font size="2.7"><b>Pembeli/Penerima</b></font>
                                                        </td>
                                                        <td align="center" width="158">
                                                            <font size="2.7"><b>Kuantiti (Tan Metrik)</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">1. Kilang Isirung</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ak1 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">2. Peniaga</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ak2 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="2.7">3. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">{{ number_format($data->e91_ak3 ?? 0, 2) }}
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">&nbsp;&nbsp;&nbsp;&nbsp;<font size="2.7"><b>JUMLAH</b>
                                                            </font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="2.7">
                                                                <b><b>{{  number_format(($data->e91_ak1 ?? 0) + ($data->e91_ak2 ?? 0) + ($data->e91_ak3 ?? 0) ?? 0, 2) }}</b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><hr>

                                            <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 6 : EKSPORT PRODUK SAWIT</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="14%" align="center">
                                                            <font size="2.7"><b>Produk</b></font>
                                                        </td>
                                                        <td width="7%" align="center">
                                                            <font size="2.7"><b>Kod Produk</b></font>
                                                        </td>
                                                        <td width="15%" align="center">
                                                            <font size="2.7"><b>Nombor Borang Kastam 2</b></font>
                                                        </td>
                                                        <td width="12%" align="center">
                                                            <font size="2.7"><b>Tarikh Eksport</b></font>
                                                        </td>
                                                        <td width="10%" align="center">
                                                            <font size="2.7"><b>Kuantiti<br> (Tan Metrik)</b></font>
                                                        </td>
                                                        <td width="11%" align="center">
                                                            <font size="2.7"><b>Nilai (RM)</b></font>
                                                        </td>
                                                        <td width="6%" align="center">
                                                            <font size="2.7"><b>Kod Negara</b></font>
                                                        </td>
                                                        <td width="15%" align="center">
                                                            <font size="2.7"><b>Destinasi Negara</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" colspan="8">Tiada Rekod</td>
                                                    </tr>
                                                </tbody>
                                            </table><hr>


                                            <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                            <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                                {{ $formatteddate }}
                                            </p>
                                            <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                                {{ $data->pelesen->e_npg }}
                                            </p>
                                            <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                                {{ $data->pelesen->e_jpg }}
                                            </p>
                                            <p>No Telefon Kilang: &nbsp;&nbsp;

                                                {{ $data->pelesen->e_notel }}
                                            </p>


                                    </body>
                                </div>



                                <br><hr>

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

    </div>



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
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(myfrm).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>


    </body>

    </html>

@endsection
