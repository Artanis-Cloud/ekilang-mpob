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
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='white'">
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

                                            <p align="center">
                                                <img border="0" src="{{ asset('/papar_mpob.png') }}" width="128"
                                                    height="100">
                                            </p>

                                            <title>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4</title>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4<br>

                                                    BULAN :&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;
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

                                                        <td width="35%">Nombor Lesen</td>

                                                        <td width="65%"><b>{{ $pelesen->e_nl }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Premis</td>

                                                        <td width="65%"><b>{{ $pelesen->e_np }}</b></td>

                                                    </tr>

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
                                                    <font color="#0000FF">BAHAGIAN I :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
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
                                                                <font size="2">Jualan / Edaran Dalam Negeri</font><b></b>
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
                                                    @foreach ($penyatai as $data)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{ $data->e101_b4 }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $data->e101_b4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b5 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b6 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b7 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">0.00</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b9 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b10 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b11 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2" {{ $data->e101_b12 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b13 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b14 }}</font>
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
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b></b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN II :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                        ISIRUNG MINYAK SAWIT</font>
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
                                                                <font size="2">Belian / Penerimaan</font>
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
                                                    @foreach ($penyataii as $data)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{ $data->e101_b4 }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $data->e101_b4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b5 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b6 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b7 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">0.00</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b9 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b10 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b11 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b12 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b13 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e101_b14 }}</font>
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
                                                            <font size="2"><b>915.81</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>22,864.86</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>23,196.75</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>583.92</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>0.00</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN III :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </font>
                                                </b> </p>
                                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                        <td width="40%"><b>{{ $penyataiii->e101_a1 }} Hari</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="60%">Kadar Penggunaan Kapasiti (Refining) Sebulan</td>
                                                        <td width="40%"><b>{{ $penyataiii->e101_a2 }} %</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="60%">Kadar Penggunaan Kapasiti (Fractionation) Sebulan
                                                        </td>
                                                        <td width="40%"><b>{{ $penyataiii->e101_a3 }} %</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN IV (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                        AKHIR
                                                        BERASASKAN MINYAK SAWIT DAN MINYAK<br>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ISIRUNG SAWIT -
                                                        BAHAN MAKANAN</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Stok Awal</font>
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
                                                    @foreach ($penyataiva as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->e101_c4 }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e101_c4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c5 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c6 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c7 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c8 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c9 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c10 }}</font>
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
                                                            <font size="2"><b>432.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>342.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>452.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>23.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>565.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>454.00</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN IV (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                        AKHIR
                                                        BERASASKAN MINYAK SAWIT DAN MINYAK<br>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ISIRUNG SAWIT -
                                                        BAHAN BUKAN MAKANAN</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                <tbody>
                                                    <tr style="padding: 0.2rem 0.3rem">
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="10%" align="center"><b>
                                                                <font size="2">Stok Awal</font>
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
                                                    @foreach ($penyataivb as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->e101_c4 }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e101_c4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c5 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c6 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c7 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c8 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c9 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_c10 }}</font>
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
                                                            <font size="2"><b>4.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>34.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>45.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>23.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>5.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>4.00</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN V (a) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN /
                                                        PENERIMAAN BEKALAN PRODUK SAWIT -
                                                        SENDIRI</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="15%" align="center"><b>
                                                                <font size="2">Belian/Penerimaan Dari</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">CPO</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">PPO</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">CPKO</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">PPKO</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyatava as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->e101_d4 }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e101_d5 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_d6 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_d7 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_d8 }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>12.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>2.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>3.00</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>4.00</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN V (b) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN /
                                                        PENERIMAAN BEKALAN PRODUK SAWIT -
                                                        LUAR</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="15%" align="center"><b>
                                                                <font size="2">Belian/Penerimaan Dari</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">CPO</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">PPO</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">CPKO</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">PPKO</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyatavb as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->e101_d4 }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e101_d5 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_d6 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_d7 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_d8 }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>4,720.14</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>67.94</b></font>
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
                                                    <font color="#0000FF">BAHAGIAN VI :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        EKSPORT PRODUK SAWIT</font>
                                                </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
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
                                                                <font size="2">Kuantiti<br> (Tan Metrik)</font><b></b>
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
                                                    @foreach ($penyatavii as $data)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->e101_e4 }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->e101_e4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_e5 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_e6 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_e7 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_e8 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_e9 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ $data->e101_e9 }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>4,720.14</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>67.94</b></font>
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
                                                    {{-- <font color="#0000FF">BAHAGIAN VII :&nbsp;&nbsp;&nbsp;&nbsp; IMPORT
                                                        PRODUK SAWIT</font>
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
                                                                <font size="2">Negara Sumber Import</font>
                                                            </b></td>
                                                    </tr>
                                                </tbody>
                                            </table> --}}


                                            <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                    adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>
                                            <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                                <input type="text" id="e91_sdate" class="form-control" size="50"
                                                    name='e91_sdate' value="{{ $penyataiii->e101_sdate ?? '' }}">
                                            </p>
                                            <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                                <input type="text" id="e_npg" class="form-control" size="50" name='e_npg'
                                                    value="{{ $penyataiii->e101_npg }}">
                                            </p>
                                            <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                                <input type="text" id="e_jpg" class="form-control" size="50" name='e_jpg'
                                                    value="{{ $penyataiii->e101_jpg }}">
                                            </p>
                                            <p>No Telefon Kilang: &nbsp;&nbsp;

                                                <input type="text" id="e_notel" class="form-control" size="50"
                                                    name="e_notel" value="">
                                            </p>

                                            <h1 style="page-break-before:always"></h1>

                                            <div class="row form-group" style="padding-top: 10px; ">


                                                <div class="text-left col-md-5">
                                                    <a href="{{ route('penapis.bahagianvi') }}" class="btn btn-primary"
                                                        style="float: left">Sebelumnya</a>
                                                </div>
                                                <div class="text-right col-md-7 mb-4 ">
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        style="float: right"
                                                        data-bs-target="#exampleModalCenter">Hantar</button>
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
