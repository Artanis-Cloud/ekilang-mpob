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
                                            {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}
                                            <div align="right">
                                                <table border="0" width="25%">
                                                    <tbody  style="margin-top:-2%">
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) CM 4</b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) PX 4-CM</b></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) PM 4-CM</b></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <p align="center">
                                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">

                                            </p>
                                            <title>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4</title>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4<br>

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
                                                                <font face="Times New Roman">500408225000</font>
                                                            </b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="25%" height="19">
                                                            <font face="Times New Roman">Nama Premis </font>
                                                        </td>

                                                        <td width="88%" height="19"><b>
                                                                <font face="Times New Roman">IFFCO (MALAYSIA) SDN. BHD.
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

                                                        <td width="35%">Nombor Lesen</td>

                                                        <td width="65%"><b>500408225000</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Premis</td>

                                                        <td width="65%"><b>IFFCO (MALAYSIA) SDN. BHD.</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Premis Berlesen</td>

                                                        <td width="65%"><b>PLO 406, JALAN EMAS</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>KAW. PERINDUSTRIAN PASIR GUDANG,</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>81700 PASIR GUDANG, JOHOR</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Surat Menyurat</td>

                                                        <td width="65%"><b>PLO 406, JALAN EMAS</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>KAW. PERINDUSTRIAN PASIR GUDANG,</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>81700 PASIR GUDANG, JOHOR</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">No Telefon</td>

                                                        <td width="65%"><b>07-2543188 - ext 130/220</b>

                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No
                                                            Fax&nbsp;&nbsp;&nbsp; <b>07-2543288</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat e-mail </td>

                                                        <td width="65%"><b>zbahmad@iffco.com</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Melapor</td>

                                                        <td width="65%"><b>ZAKI BIN AHMAD</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Melapor</td>

                                                        <td width="65%"><b>PRODUCTION PLANING SUPERVISOR</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b>ABD RASHID BIN YAHYA</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b>SUPPLY CHAIN MANAGER</b></td>

                                                    </tr>

                                                </tbody>
                                            </table>
<br>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN Ia :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                        MINYAK SAWIT</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Jenis Minyak </font>
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
                                                                <font size="2">Belian / Penerimaan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jumlah Yang DiProses</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jualan / Edaran Dalam Negeri</font>
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
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">RBDPS</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">27</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">6,025.31</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">98.41</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
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
                                                        <td align="right">
                                                            <font size="2"><b>6,025.31</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>98.41</b></font>
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
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN Ib :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PRODUK MINYAK ISIRONG SAWIT</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Jenis Minyak </font>
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
                                                                <font size="2">Belian / Penerimaan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jumlah Yang DiProses</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jualan / Edaran Dalam Negeri</font>
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
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">CPKL</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">06</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">766.13</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">98.41</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">CPKO</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">04</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">663.89</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">98.41</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
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
                                                        <td align="right">
                                                            <font size="2"><b>1,430.02</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>196.82</b></font>
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
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN Ic :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        LAIN-LAIN MINYAK SAWIT</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Jenis Minyak </font>
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
                                                                <font size="2">Belian / Penerimaan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jumlah Yang DiProses</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Jualan / Edaran Dalam Negeri</font>
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
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
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
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN II: HARI BEROPERASI DAN KADAR
                                                        PENGGUNAAN KAPASITI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                </b> </p>
                                            <table border="0" width="90%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                        <td width="62%"><b>30 Hari</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="60%">Kadar Penggunaan Kapasiti Sebulan</td>
                                                        <td width="62%"><b>100.00 %</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN III :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        RINGKASAN PRODUK OLEOKIMIA</font>
                                                </b></p>

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Jenis Minyak </font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Belian / Penerimaan</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Jualan / Edaran Dalam Negeri</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Stok Akhir</font>
                                                            </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">PA</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">37</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">433.01</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">121.49</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>1,732.04</b></font>
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
                                                            <font size="2"><b>485.96</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN IV :&nbsp;&nbsp;&nbsp;&nbsp; EKSPORT
                                                        PRODUK OLEOKIMIA DAN LAIN-LAIN PRODUK SAWIT</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="14%" align="center"><b>
                                                                <font size="2">Nama Produk Sawit</font>
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

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">FA</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">83</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2">J33211004932</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2">11-11-2021</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">300.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">5,000.00</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">S11</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2">SRI LANKA</font>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN V :&nbsp;&nbsp;&nbsp;&nbsp; IMPORT
                                                        PRODUK SAWIT</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="14%" align="center"><b>
                                                                <font size="2">Nama Produk Sawit</font>
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
                                                                <font size="2">Negara Sumber Import</font>
                                                            </b></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>
                                        <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                            <input type="email" id="email-id-column" class="form-control" size="50"
                                                name="email-id-column" readonly>
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

                    <h1 style="page-break-before:always"></h1>

                    <div class="row form-group" style="padding-top: 10px; ">


                        <div class="text-left col-md-5">
                            <a href="{{ route('buah.bahagianiv') }}" class="btn btn-primary"
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
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Anda pasti mahu menghantar penyata ini?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                    </button>
                                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Hantar</span>
                                    </button>
                                </div>
                            </div>
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
        </form>

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
