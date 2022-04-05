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
                                            <title>PENYATA BULANAN KILANG OLEOKIMIA- MPOB (EL) CM 4</title>
                                            <p align="center"><b>
                                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                    </font>PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL)  - MPOB (EL) CM 4<br>

                                                    BULAN :&nbsp;&nbsp;
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
                                                     &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}

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
                                                                <font face="Times New Roman">{{ auth()->user()->username }}</font>
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

                                                        <td width="65%"><b>{{ $pelesen2->no_lesen }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Premis</td>

                                                        <td width="65%"><b>{{ $pelesen2->n_premis }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Premis Berlesen</td>

                                                        <td width="65%"><b>{{ $pelesen2->alamat_premis }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $pelesen2->daerah_premis }}, &nbsp; {{ $pelesen2->poskod_premis }}  </b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $pelesen2->negeri_premis }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat Surat Menyurat</td>

                                                        <td width="65%"><b>{{ $pelesen2->alamat_surat }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $pelesen2->daerah }}  {{ $pelesen2->poskod }} </b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">&nbsp;</td>

                                                        <td width="65%"><b>{{ $pelesen2->negeri }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">No Telefon</td>

                                                        <td width="65%"><b>{{ $pelesen2->no_tel }}</b>

                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No
                                                            Fax&nbsp;&nbsp;&nbsp; <b>{{ $pelesen2->no_faks }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Alamat e-mail </td>

                                                        <td width="65%"><b></b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Melapor</td>

                                                        <td width="65%"><b>{{ $pelesen2->n_pgw_m }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Melapor</td>

                                                        <td width="65%"><b>{{ $pelesen2->j_pgw_m }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b>{{ $pelesen2->n_pgw_b }}</b></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                        <td width="65%"><b>{{ $pelesen2->j_pgw_b }}</b></td>

                                                    </tr>

                                                </tbody>
                                            </table>
<br>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN I(a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                        MINYAK SAWIT</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Nama Produk </font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Belian / Terimaan</font>
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
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($ia as $data)

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->produk->prodname }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->produk->prodid }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b10 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b11 ??  0,2) }}</font>
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
                                                            <font size="2"><b>{{ number_format($totaliab5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliab6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliab7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliab8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliab9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliab10 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliab11 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN I(b) :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PRODUK MINYAK ISIRONG SAWIT</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Nama Produk </font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Belian / Terimaan</font>
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
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($ib as $data)

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->produk->prodname }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->produk->prodid }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b10 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b11 ??  0,2) }}</font>
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
                                                            <font size="2"><b>{{ number_format($totalibb5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalibb6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalibb7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalibb8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalibb9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalibb10 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalibb11 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN I(c) :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        LAIN-LAIN MINYAK SAWIT</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="13%" align="center"><b>
                                                                <font size="2">Nama Produk </font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Belian / Terimaan</font>
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
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($ic as $data)

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->produk->prodname }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->produk->prodid }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b10 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_b11 ??  0,2) }}</font>
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
                                                            <font size="2"><b>{{ number_format($totalicb5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalicb6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalicb7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalicb8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalicb9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalicb10 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totalicb11 ??  0,2) }}</b></font>
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
                                                        <td width="62%"><b>{{ $ii->hari_operasi }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="60%">Kadar Penggunaan Kapasiti Sebulan</td>
                                                        <td width="62%"><b>{{ $ii->kapasiti }} %</b></td>
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
                                                                <font size="2">Nama Produk </font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Belian / Terimaan</font>
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
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($iii as $data)

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $data->produk->prodname }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $data->produk->prodid }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_c4 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_c5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_c6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_c7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_c8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_c9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($data->ebio_c10 ??  0,2) }}</font>
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
                                                            <font size="2"><b>{{ number_format($totaliiic4 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliiic5 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliiic6 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliiic7 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliiic8 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliiic9 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($totaliiic10 ??  0,2) }}</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BAHAGIAN IV :&nbsp;&nbsp;&nbsp;&nbsp; EKSPORT
                                                        PRODUK BIODIESEL DAN LAIN-LAIN PRODUK SAWIT</font>
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
                                data-bs-target="#next">Hantar</button>
                            <button type="button" class="btn btn-primary " style="float: right; margin-right:1%"
                                onclick="myPrint('myfrm')" value="print">Cetak</button>
                        </div>

                    </div>

                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="next" tabindex="-1" role="dialog"
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
                                    <a href="{{ route('bio.hantar.penyata') }}" type="button"
                                                            class="btn btn-primary ml-1">

                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Hantar</span>
                                                        </a>
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
