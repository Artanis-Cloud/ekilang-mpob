@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="margin-left:5%; color:white; background-color:#25877bd1">Kembali</a>
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

                <form method="get" action="" id="myfrm">

                    <div class="card" style="margin-right:2%; margin-left:2%">
                        @foreach ($pelesens as $data)

                            <br><br><hr>
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

                                            <p align="center">
                                                <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                                    height="100">
                                            </p>

                                            <title>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4</title>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4<br>

                                                    BULAN :
                                                    @if($penyata->e101_bln == "01") JANUARI
                                                        @elseif($penyata->e101_bln == "02") FEBRUARI
                                                        @elseif($penyata->e101_bln == "03") MAC
                                                        @elseif($penyata->e101_bln == "04") APRIL
                                                        @elseif($penyata->e101_bln == "05") MEI
                                                        @elseif($penyata->e101_bln == "06") JUN
                                                        @elseif($penyata->e101_bln == "07") JULAI
                                                        @elseif($penyata->e101_bln == "08") OGOS
                                                        @elseif($penyata->e101_bln == "09") SEPTEMBER
                                                        @elseif($penyata->e101_bln == "10") OKTOBER
                                                        @elseif($penyata->e101_bln == "11") NOVEMBER
                                                        @elseif($penyata->e101_bln == "12") DISEMBER
                                                        @endif
                                                        &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $penyata->e101_thn }}
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
                                                               {{ $data->e_nl }}
                                                            </b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="25%" height="19">
                                                            Nama Premis
                                                        </td>

                                                        <td width="88%" height="19"><b>
                                                               {{ $data->e_np }}
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

                                                        <td width="65%"><b>{{ $data->e_ap1 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $data->e_ap2 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $data->e_ap3 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Surat Menyurat</td>

                                                        <td width="65%"><b>{{ $data->e_as1 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $data->e_as2 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $data->e_as3 }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">No Telefon</td>

                                                        <td width="65%"><b>{{ $data->e_notel }}</b>

                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Faks&nbsp;&nbsp;&nbsp;
                                                            <b>{{ $data->e_nofax }}</b>
                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat emel </td>

                                                        <td width="65%"><b>{{ $data->e_email }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Melapor</td>

                                                        <td width="65%"><b>{{ $data->e_npg }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Melapor</td>

                                                        <td width="65%"><b>{{ $data->e_jpg }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b>{{ $data->e_npgtg }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b>{{ $data->e_jpgtg }}</b></td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                            <br>


                                            <p><b>
                                                    <font size="3" color="#0000FF">BAHAGIAN I : PRODUK MINYAK
                                                        SAWIT</font>
                                                </b> </p>

                                                <table border="1" class="table table-bordered" width="100%"
                                                bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Belian / Terima</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Import</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Pengeluaran</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                                <b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jualan / Edaran Tempatan</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Eksport</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Premis</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($pelesens as $data)
                                                        <tr>
                                                            {{-- <td align="left">
                                                                <font size="2">{{ $data->produk->prodname }}</font>
                                                            </td> --}}
                                                            <td align="center">
                                                                <font size="2">{{ $data->e101_b4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b5 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b6 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b7 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">0.00</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b10 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b11 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2"> {{ number_format($data->e101_b12 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b13 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b14 ??  0,2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib10 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib11 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib12 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib13 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalib14 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>

                                            <p><b>
                                                    <font size="3" color="0000FF">BAHAGIAN II : PRODUK
                                                        ISIRUNG MINYAK SAWIT </font>
                                                </b> </p>

                                                <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Pusat Simpanan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Belian / Terimaan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jualan / Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Pusat Simpanan</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($pelesens as $data)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{ $data->produk->prodname }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $data->e101_b4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b5 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b6 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b7 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">0.00</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b9 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b10 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b11 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b12 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b13 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e101_b14 ??  0,2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib10 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib11 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib12 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib13 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliib14 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <br>



                                            <table border="1" width="604" cellspacing="0" cellpadding="0"
                                                class="table table-bordered ">

                                                <tbody style="border: 1px solid black;">
                                                    <tr style="border: 1px solid black;">
                                                        <td align="center" width="209" ><b>
                                                                <font size="3">Sebab-Sebab OER Meningkat</font>
                                                            </b></td>
                                                        <td align="center" width="92">
                                                            <font size="3"><b>Tanda (<font face="Times New Roman">&#10004;)
                                                                    </font></b>
                                                            </font>
                                                        </td>
                                                        <td align="center" width="201"><b>
                                                                <font size="3">Sebab-Sebab OER Menurun</font>
                                                            </b></td>
                                                        <td align="center" width="93">
                                                            <font size="3"><b>Tanda (<font face="Times New Roman">&#10004;)
                                                                    </font></b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">a. Buah berkualiti</font>
                                                        </td>

                                                        @if ($penyata->e101_ah5 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah5 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;&nbsp;&nbsp;</font>
                                                            </td>
                                                        @endif

                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                a. Tiada/ kurang buah berkualiti</font>
                                                        </td>
                                                        @if ($penyata->e101_ah11 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah11 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">b. Kesan dari cuaca yang baik</font>
                                                        </td>
                                                        @if ($penyata->e101_ah6 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah6 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                b. Kesan cuaca kering</font>
                                                        </td>
                                                        @if ($penyata->e101_ah12 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah12 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">c. Proses kitar semula minyak</font>
                                                        </td>
                                                        @if ($penyata->e101_ah7 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah7 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                c. Jerebu</font>
                                                        </td>
                                                        @if ($penyata->e101_ah13 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah13 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">d. Kecekapan kilang/mesin</font>
                                                        </td>
                                                        @if ($penyata->e101_ah8 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah8 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                d. Kesan Penerimaan hujan yang berlebihan</font>
                                                        </td>
                                                        @if ($penyata->e101_ah14 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah14 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">e. Proses pengendalian bks yang minima (less ffb
                                                                handling)</font>
                                                        </td>
                                                        @if ($penyata->e101_ah9 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah9 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                e. Banjir</font>
                                                        </td>
                                                        @if ($penyata->e101_ah15 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah15 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="209" rowspan="2">
                                                            <font size="3">f. Proses lebih buah lerai</font>
                                                        </td>
                                                        @if ($penyata->e101_ah10 == 'Y')
                                                            <td width="92" align="center" rowspan="2">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah10 == null)
                                                            <td width="92" align="center" rowspan="2">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                f. Buah Dari Ladang Baru Berhasil</font>
                                                        </td>
                                                        @if ($penyata->e101_ah16 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah16 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                g.Kurang Buah Lerai</font>
                                                        </td>
                                                        @if ($penyata->e101_ah17 == 'Y')
                                                            <td width="92" align="center">
                                                                <font size="3">&#10004; &nbsp;</font>
                                                            </td>
                                                        @elseif ($penyata->e101_ah17 == null)
                                                            <td width="92" align="center">
                                                                <font size="3"> &nbsp;</font>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>
                                                <font size="3">Lain-lain jawapan, sila nyatakan (max. 100 character):
                                                    {{ $penyata->e101_ah18 ?? '-' }}</font>
                                            </p>




                                            <p align="left">
                                                <font size="3" color="#0000FF"><b>BAHAGIAN III : BELIAN/TERIMAAN BEKALAN BUAH
                                                        KELAPA SAWIT (FFB) (52)</b>
                                                </font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered ">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" width="168">
                                                            <font size="3"><b>Sumber Bekalan</b></font>
                                                        </td>
                                                        <td align="center" width="158">
                                                            <font size="3"><b>Kuantiti (Tan Metrik)</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">1. Estet Sendiri</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ai1 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">2. Estet Luar</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ai ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">3. Peniaga Buah</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ai3 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">4. Pekebun Kecil</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ai4 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">5. Kilang Buah Lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ai5 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">6. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ai6 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">&nbsp;&nbsp;&nbsp;&nbsp;<b>JUMLAH</b></font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">
                                                                <b>{{  number_format(($penyata->e101_ai1 ?? 0) +($penyata->e101_ai2 ?? 0)
                                                                +($penyata->e101_ai3 ?? 0) +($penyata->e101_ai4 ?? 0)
                                                                +($penyata->e101_ai5 ?? 0) +($penyata->e101_ai6 ?? 0) ?? 0,2) }}</b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <p align="left">
                                                <font size="3" color="#0000FF"><b>BAHAGIAN IV : EDARAN/JUALAN MINYAK SAWIT
                                                        MENTAH (CPO) (01) </b></font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" width="168">
                                                            <font size="3"><b>Pembeli/Penerima</b></font>
                                                        </td>
                                                        <td align="center" width="158">
                                                            <font size="3"><b>Kuantiti (Tan Metrik)</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">1. Kilang Buah</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj1 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">2. Kilang Penapis</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj2 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">3. Kilang Oleokimia</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj3 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">4. Peniaga</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj4 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">5. Pusat Simpanan</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj5 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">6. Eksport</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj6 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">7. Transit</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj7 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">8. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_aj8 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3"><b>&nbsp;&nbsp;&nbsp;&nbsp; JUMLAH</b></font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">
                                                                <b>{{  number_format(($penyata->e101_aj1 ?? 0) +($penyata->e101_aj2 ?? 0)
                                                                +($penyata->e101_aj3 ?? 0) +($penyata->e101_aj4 ?? 0)
                                                                +($penyata->e101_aj5 ?? 0) +($penyata->e101_aj6 ?? 0)
                                                                +($penyata->e101_aj7 ?? 0) +($penyata->e101_aj8 ?? 0) ?? 0,2) }}</b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <p align="left">
                                                <font size="3" color="#0000FF"><b>BAHAGIAN V : EDARAN / JUALAN ISIRUNG SAWIT
                                                        (PK) DALAM NEGERI
                                                        (51)</b></font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" width="168">
                                                            <font size="3"><b>Pembeli/Penerima</b></font>
                                                        </td>
                                                        <td align="center" width="158">
                                                            <font size="3"><b>Kuantiti (Tan Metrik)</b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">1. Kilang Isirung</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ak1 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">2. Peniaga</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ak2 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">3. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">{{ number_format($penyata->e101_ak3 ?? 0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">&nbsp;&nbsp;&nbsp;&nbsp;<font size="3"><b>JUMLAH</b>
                                                            </font>
                                                        </td>
                                                        <td width="158" align="center">
                                                            <font size="3">
                                                                <b>{{  number_format(($penyata->e101_ak1 ?? 0) + ($penyata->e101_ak2 ?? 0)
                                                                + ($penyata->e101_ak3 ?? 0) ?? 0,2) }}</b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                                <p><b>
                                                    <font size="3" color="#0000FF">BAHAGIAN VI : EKSPORT PRODUK SAWIT</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="14%" align="center">
                                                            <font size="3"><b>Produk</b></font>
                                                        </td>
                                                        <td width="7%" align="center">
                                                            <font size="3"><b>Kod Produk</b></font>
                                                        </td>
                                                        <td width="15%" align="center">
                                                            <font size="3"><b>Nombor Borang Kastam 2</b></font>
                                                        </td>
                                                        <td width="12%" align="center">
                                                            <font size="3"><b>Tarikh Eksport</b></font>
                                                        </td>
                                                        <td width="10%" align="center">
                                                            <font size="3"><b>Kuantiti<br> (Tan Metrik)</b></font>
                                                        </td>
                                                        <td width="11%" align="center">
                                                            <font size="3"><b>Nilai (RM)</b></font>
                                                        </td>
                                                        <td width="6%" align="center">
                                                            <font size="3"><b>Kod Negara</b></font>
                                                        </td>
                                                        <td width="15%" align="center">
                                                            <font size="3"><b>Destinasi Negara</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                            <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                                {{ $data->e101_npg }}
                                            </p>
                                            <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                                {{ $data->e101_jpg }}
                                            </p>
                                            <p>No Telefon Kilang: &nbsp;&nbsp;

                                                {{ $data->e101_notel }}
                                            </p>



                                        </body>
                                    </div>
                                </div>
                            </div>

                            <br><hr>

                        @endforeach

                    </div>
                </form>
            </div>
            <h1 style="page-break-before:always"></h1>

            <div class="row form-group" style="padding-top: 10px; margin-left: 2% ">


                <div class="text-left col-md-5">
                    <a href="{{ route('admin.6penyatapaparcetakpenapis') }}" class="btn btn-primary"
                    >Sebelumnya</a>
                </div>
                <div class="text-right col-md-7 mb-2 ">
                    <button type="button" class="btn btn-primary " style="float: right; "
                        onclick="myPrint('myfrm')" value="print">Cetak</button>
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
