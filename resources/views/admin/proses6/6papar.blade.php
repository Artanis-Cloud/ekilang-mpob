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

            <div class="mt-2 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: black !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='black'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #f0c95d  !important;">
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
                        <br>
                        <br>
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">





                                    <body>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}
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
                                        <form method="post" action="" id="myfrm">
                                            <br>
                                            <br>
                                            <p align="center">
                                                <img border="0" src="{{ asset('/papar_mpob.png') }}" width="200"
                                                    height="140" style="margin-top:-7%">
                                            </p>

                                            <title>PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4</title>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>
                                                    </font>PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4<br>
                                                    BULAN :&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;
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
                                                                <font face="Times New Roman"></font>
                                                            </b></td>
                                                    </tr>

                                                    <tr>

                                                        <td width="25%" height="19">
                                                            <font face="Times New Roman">Nama Premis </font>
                                                        </td>

                                                        <td width="88%" height="19"><b>
                                                                <font face="Times New Roman"></font>
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

                                                        <td width="35%">Nombor Lesen</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Premis</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Premis Berlesen</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Surat Menyurat</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">No Telefon</td>

                                                        <td width="65%"><b></b>

                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Fax&nbsp;&nbsp;&nbsp;
                                                            <b></b>
                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat e-mail </td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Melapor</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Melapor</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                            <br>


                                            <p><b>
                                                    <font size="3" color="#0000FF">BAHAGIAN I : MAKLUMAT BELIAN, PROSES,
                                                        PENGELUARAN, JUALAN/EDARAN, STOK AKHIR
                                                        (Berdasarkan Dalam Premis Kilang Sahaja.)</font>
                                                </b> </p>

                                            <table border="1" width="650" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="220">
                                                            <p align="center"><b>
                                                                    <font size="3">Butiran</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center"><b>
                                                                    <font size="3">Buah Kelapa Sawit (FFB) Kod 52</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="center"><b>
                                                                    <font size="3">Minyak Sawit Mentah(CPO) Kod 01</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="center"><b>
                                                                    <font size="3">Isirong (PK) Kod 51</font>
                                                                </b></p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="center"><b>
                                                                    <font size="3">Minyak Keladak (Sludge Oil) Kod 49</font>
                                                                </b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="3">A. Stok Awal Di Premis</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="3">B. Pembelian/Penerimaan</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="3">C. Diproses</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="135" bgcolor="#C0C0C0" align="center">&nbsp;</td>
                                                        <td width="110" bgcolor="#C0C0C0" align="center">&nbsp;</td>
                                                        <td width="120" bgcolor="#C0C0C0" align="center">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="3">D. Pengeluaran</font>
                                                        </td>
                                                        <td width="120" bgcolor="#C0C0C0" align="center">
                                                            <p align="left">&nbsp;</p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="3">E. Penjualan/Pengedaran Tempatan</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="3">F. Eksport&nbsp;Terus Dari Premis</font>
                                                        </td>
                                                        <td width="120" bgcolor="#C0C0C0" align="center">
                                                            <p align="left">&nbsp;</p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="right">
                                                                <font size="3" </font>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="220">
                                                            <font size="3">G. Stok Akhir Di Premis</font>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="135">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="110">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                        <td width="120">
                                                            <p align="right">
                                                                <font size="3"></font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>

                                            <p><b>
                                                    <font size="3" color="0000FF">BAHAGIAN II : MAKLUMAT JAM PENGILANGAN,
                                                        KADAR
                                                        PERAHAN DAN HARGA </font>
                                                </b> </p>

                                            <table border="0" width="460" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="380">
                                                            <font size="3">i.&nbsp;&nbsp; Jumlah Jam Pengilangan&nbsp;
                                                            </font>
                                                        </td>
                                                        <td width="70">
                                                            <font size="3">: </font>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="380">
                                                            <font size="3">ii.&nbsp; Kadar Perahan MKSM (OER) yang
                                                                diperolehi&nbsp;</font>
                                                        </td>
                                                        <td width="70">
                                                            <font size="3">: </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="380">
                                                            <font size="3">iii. Kadar Perolehan Isirong (KER)</font>
                                                        </td>
                                                        <td width="70">
                                                            <font size="3">: </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="380">
                                                            <font size="3">iv. Harga Purata Belian Buah Kelapa Sawit
                                                                (FFB)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM
                                                            </font>
                                                        </td>
                                                        <td width="70">
                                                            <font size="3">: </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="380">
                                                            <font size="3">&nbsp;&nbsp;&nbsp;&nbsp; (1% Kadar Perahan)
                                                            </font>
                                                        </td>
                                                        <td width="70">
                                                            <font size="3"></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <br>



                                            <table border="1" width="604" cellspacing="0" cellpadding="0"
                                                class="table table-bordered ">

                                                <tbody style="border: 1px solid black;">
                                                    <tr style="border: 1px solid black;">
                                                        <td align="center" width="209" style="border: 1px solid black;"><b>
                                                                <font size="3">Sebab-Sebab OER Meningkat</font>
                                                            </b></td>
                                                        <td align="center" width="92">
                                                            <font size="3"><b>Tanda (<font face="Times New Roman">√)</font>
                                                                    </b>
                                                            </font>
                                                        </td>
                                                        <td align="center" width="201"><b>
                                                                <font size="3">Sebab-Sebab OER Menurun</font>
                                                            </b></td>
                                                        <td align="center" width="93">
                                                            <font size="3"><b>Tanda (<font face="Times New Roman">√)</font>
                                                                    </b>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">a. Buah berkualiti</font>
                                                        </td>
                                                        <td width="92" align="center">
                                                            <font size="3">

                                                                &nbsp;</font>
                                                        </td>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                a. Tiada/ kurang buah berkualiti</font>
                                                        </td>
                                                        <td width="93" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">b. Kesan dari cuaca yang baik</font>
                                                        </td>
                                                        <td width="92" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                b. Kesan cuaca kering</font>
                                                        </td>
                                                        <td width="93" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">c. Proses kitar semula minyak</font>
                                                        </td>
                                                        <td width="92" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                c. Jerebu</font>
                                                        </td>
                                                        <td width="93" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">d. Kecekapan kilang/mesin</font>
                                                        </td>
                                                        <td width="92" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                d. Kesan Penerimaan hujan yang berlebihan</font>
                                                        </td>
                                                        <td width="93" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209">
                                                            <font size="3">e. Proses pengendalian bks yang minima (less ffb
                                                                handling)</font>
                                                        </td>
                                                        <td width="92" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                e. Banjir</font>
                                                        </td>
                                                        <td width="93" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="209" rowspan="2">
                                                            <font size="3">f. Proses lebih buah lerai</font>
                                                        </td>
                                                        <td width="92" align="center" rowspan="2">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                f. Buah Dari Ladang Baru Berhasil</font>
                                                        </td>
                                                        <td width="93" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="201" align="left">
                                                            <font size="3">
                                                                g.Kurang Buah Lerai</font>
                                                        </td>
                                                        <td width="93" align="center">
                                                            <font size="3">
                                                                &nbsp;</font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>
                                                <font size="3">Lain-lain jawapan, sila nyatakan (max. 100 character):</font>
                                            </p>




                                            <p align="left">
                                                <font size="3" color="#0000FF"><b>BAHAGIAN III : BELIAN/PENERIMAAN BEKALAN
                                                        BUAH
                                                        KELAPA SAWIT (FFB) (52)</b>
                                                </font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
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
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">2. Estet Luar</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">3. Peniaga Buah</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">4. Pekebun Kecil</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">5. Kilang Buah Lain</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">6. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">&nbsp;&nbsp;&nbsp;&nbsp;<b>JUMLAH</b></font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3">
                                                                <b></b>
                                                            </font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <p align="left">
                                                <font size="3" color="#0000FF"><b>BAHAGIAN IV : EDARAN/JUALAN MINYAK SAWIT
                                                        MENTAH (CPO) (01) </b></font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
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
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">2. Kilang Penapis</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">3. Kilang Oleokimia</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">4. Peniaga</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">5. Pusat Simpanan</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">6. Eksport</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">7. Transit</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">8. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3"><b>&nbsp;&nbsp;&nbsp;&nbsp; JUMLAH</b></font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3">
                                                                <b></b>
                                                            </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <p align="left">
                                                <font size="3" color="#0000FF"><b>BAHAGIAN V : EDARAN / JUALAN ISIRONG SAWIT
                                                        (PK) DALAM NEGERI
                                                        (51)</b></font>
                                            </p>

                                            <table border="1" width="342" bordercolor="#000000" cellspacing="0"
                                                cellpadding="0" bordercolorlight="#FFFFFF" bordercolordark="#000000"
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
                                                            <font size="3">1. Kilang Isirong</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">2. Peniaga</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">
                                                            <font size="3">3. Lain-lain</font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="168">&nbsp;&nbsp;&nbsp;&nbsp;<font size="3"><b>JUMLAH</b>
                                                            </font>
                                                        </td>
                                                        <td width="158" align="right">
                                                            <font size="3">
                                                                <b></b>
                                                            </font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                            <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                                <input type="email" id="email-id-column" class="form-control" size="50"
                                                    name="email-id-column">
                                            </p>
                                            <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                                <input type="email" id="email-id-column" class="form-control" size="50"
                                                    name="email-id-column">
                                            </p>
                                            <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                                <input type="email" id="email-id-column" class="form-control" size="50"
                                                    name="email-id-column">
                                            </p>
                                            <p>No Telefon Kilang: &nbsp;&nbsp;

                                                <input type="email" id="email-id-column" class="form-control" size="50"
                                                    name="email-id-column">
                                            </p>
                                        </form>


                                        {{-- <p align="center"><input type="button" onclick="myPrint('myfrm')" value="print"></p> --}}

                                            <h1 style="page-break-before:always"></h1>

                                            <div class="row form-group" style="padding-top: 10px; ">



                                                <div class="text-right col-md-7 mb-4 ">
                                                    <button type="button" class="btn btn-primary "
                                                        style="float: right"
                                                        onclick="myPrint('myfrm')" value="print">Cetak</button>
                                                </div>

                                            </div>


                                            {{-- <p><a href="adsubmenu.php">Keluar Ke Menu Penyelenggaraan</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="proses6.php">Proses 6</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </p> --}}
















                                </div>
                            </div>
                        </div>











                    </div>
                </div>








            </div>
            <br>


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
