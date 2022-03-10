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

                                        <div class="col-12" style="margin-right: 20%; margin-top:-4%">
                                            <b style="margin-left: 83%">MPOB(EL) MF 4</b>

                                            <b style="margin-left: 83%">MPOB(EL) PX 4-MF </b>

                                        </div>
<br>
                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                            height="100">
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
                                                            <font face="Times New Roman">{{ auth()->user()->username }}
                                                            </font>
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        <font face="Times New Roman">Nama Premis </font>
                                                    </td>

                                                    <td width="88%" height="19"><b>
                                                            <font face="Times New Roman">{{ auth()->user()->name }}</font>
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
                                                <font size="3" color="#0000FF">BAHAGIAN I : MAKLUMAT BELIAN, PROSES,
                                                    PENGELUARAN, JUALAN/EDARAN, STOK AKHIR
                                                    (Berdasarkan Dalam Premis Kilang Sahaja.)</font>
                                            </b> </p>

                                        <table border="1" width="650" bordercolor="#000000" cellspacing="0" cellpadding="0"
                                            bordercolorlight="#FFFFFF" bordercolordark="#000000"
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
                                                                <font size="3">Buah Kelapa Sawit <br>(FFB) Kod 52</font>
                                                            </b></p>
                                                    </td>
                                                    <td width="135">
                                                        <p align="center"><b>
                                                                <font size="3">Minyak Sawit Mentah <br> (CPO) Kod 01</font>
                                                            </b></p>
                                                    </td>
                                                    <td width="110">
                                                        <p align="center"><b>
                                                                <font size="3">Isirung <br>(PK) Kod 51</font>
                                                            </b></p>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center"><b>
                                                                <font size="3">Minyak Keladak <br>(Sludge Oil) Kod 49</font>
                                                            </b></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="220">
                                                        <font size="3">A. Stok Awal Di Premis</font>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_aa1 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p style="text-align: center">
                                                            <font size="3">{{ $penyata->e91_aa2 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="110">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_aa3 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_aa4 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="220">
                                                        <font size="3">B. Pembelian/Penerimaan</font>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ab1 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ab2 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="110">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ab3 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ab4 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="220">
                                                        <font size="3">C. Diproses</font>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ac1 ?? 0 }}</font>
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
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ad1 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="110">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ad2 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ad3 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="220">
                                                        <font size="3">E. Penjualan/Pengedaran Tempatan</font>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ae1 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ae2 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="110">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ae3 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ae4 ?? 0 }}</font>
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
                                                    <td width="135" bgcolor="#C0C0C0">
                                                        <p align="center">
                                                            <font size="3"></font>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </p>
                                                    </td>
                                                    <td width="110" bgcolor="#C0C0C0">
                                                        <p align="center">
                                                            <font size="3" </font>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </p>
                                                    </td>
                                                    <td width="120" bgcolor="#C0C0C0">
                                                        <p align="center">
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
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ag1 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="135">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ag2 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="110">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ag3 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                    <td width="120">
                                                        <p align="center">
                                                            <font size="3">{{ $penyata->e91_ag4 ?? 0 }}</font>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>

                                        <p><b>
                                                <font size="3" color="0000FF">BAHAGIAN II : MAKLUMAT JAM PENGILANGAN, KADAR
                                                    PERAHAN DAN HARGA </font>
                                            </b> </p>

                                        <table border="0" width="460" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="380">
                                                        <font size="3">i.&nbsp;&nbsp; Jumlah Jam Pengilangan&nbsp;</font>
                                                    </td>
                                                    <td width="70">
                                                        <font size="3">: {{ $penyata->e91_ah1 ?? 0 }}</font>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="380">
                                                        <font size="3">ii.&nbsp; Kadar Perahan MKSM (OER) yang
                                                            diperolehi&nbsp;</font>
                                                    </td>
                                                    <td width="100">
                                                        <font size="3">: {{ $penyata->e91_ah2 ?? 0 }}%</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="380">
                                                        <font size="3">iii. Kadar Perolehan Isirung (KER)</font>
                                                    </td>
                                                    <td width="100">
                                                        <font size="3">: {{ $penyata->e91_ah3 ?? 0 }}%</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1000">
                                                        <font size="3">iv. Harga Purata Belian Buah Kelapa Sawit
                                                            (FFB)
                                                        </font>
                                                    </td>
                                                    <td width="150">
                                                        <font size="3">:&nbsp;RM {{ $penyata->e91_ah4 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="380">
                                                        <font size="3">&nbsp;&nbsp;&nbsp;&nbsp; (1% Kadar Perahan)</font>
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

                                                    @if ($penyata->e91_ah5 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah5 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif

                                                    <td width="201" align="left">
                                                        <font size="3">
                                                            a. Tiada/ kurang buah berkualiti</font>
                                                    </td>
                                                    @if ($penyata->e91_ah11 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah11 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td width="209">
                                                        <font size="3">b. Kesan dari cuaca yang baik</font>
                                                    </td>
                                                    @if ($penyata->e91_ah6 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah6 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                    <td width="201" align="left">
                                                        <font size="3">
                                                            b. Kesan cuaca kering</font>
                                                    </td>
                                                    @if ($penyata->e91_ah12 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah12 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td width="209">
                                                        <font size="3">c. Proses kitar semula minyak</font>
                                                    </td>
                                                    @if ($penyata->e91_ah7 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah7 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                    <td width="201" align="left">
                                                        <font size="3">
                                                            c. Jerebu</font>
                                                    </td>
                                                    @if ($penyata->e91_ah13 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah13 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td width="209">
                                                        <font size="3">d. Kecekapan kilang/mesin</font>
                                                    </td>
                                                    @if ($penyata->e91_ah8 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah8 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                    <td width="201" align="left">
                                                        <font size="3">
                                                            d. Kesan Penerimaan hujan yang berlebihan</font>
                                                    </td>
                                                    @if ($penyata->e91_ah14 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah14 == null)
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
                                                    @if ($penyata->e91_ah9 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah9 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                    <td width="201" align="left">
                                                        <font size="3">
                                                            e. Banjir</font>
                                                    </td>
                                                    @if ($penyata->e91_ah15 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah15 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td width="209" rowspan="2">
                                                        <font size="3">f. Proses lebih buah lerai</font>
                                                    </td>
                                                    @if ($penyata->e91_ah10 == 'Y')
                                                        <td width="92" align="center" rowspan="2">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah10 == null)
                                                        <td width="92" align="center" rowspan="2">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                    <td width="201" align="left">
                                                        <font size="3">
                                                            f. Buah Dari Ladang Baru Berhasil</font>
                                                    </td>
                                                    @if ($penyata->e91_ah16 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah16 == null)
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
                                                    @if ($penyata->e91_ah17 == 'Y')
                                                        <td width="92" align="center">
                                                            <font size="3">&#10004; &nbsp;</font>
                                                        </td>
                                                    @elseif ($penyata->e91_ah17 == null)
                                                        <td width="92" align="center">
                                                            <font size="3"> &nbsp;</font>
                                                        </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>
                                            <font size="3">Lain-lain jawapan, sila nyatakan (max. 100 character):
                                                {{ $penyata->e91_ah18 ?? '-' }}</font>
                                        </p>




                                        <p align="left">
                                            <font size="3" color="#0000FF"><b>BAHAGIAN III : BELIAN/PENERIMAAN BEKALAN BUAH
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
                                                        <font size="3">{{ $penyata->e91_ai1 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">2. Estet Luar</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_ai2 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">3. Peniaga Buah</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_ai3 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">4. Pekebun Kecil</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_ai4 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">5. Kilang Buah Lain</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_ai5 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">6. Lain-lain</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_ai6 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">&nbsp;&nbsp;&nbsp;&nbsp;<b>JUMLAH</b></font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">
                                                            <b>{{ ($penyata->e91_ai1 ?? 0) +($penyata->e91_ai2 ?? 0) +($penyata->e91_ai3 ?? 0) +($penyata->e91_ai4 ?? 0) +($penyata->e91_ai4 ?? 0) +($penyata->e91_ai5 ?? 0) +($penyata->e91_ai6 ?? 0) }}</b>
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
                                                        <font size="3">{{ $penyata->e91_aj1 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">2. Kilang Penapis</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_aj2 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">3. Kilang Oleokimia</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_aj3 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">4. Peniaga</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_aj4 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">5. Pusat Simpanan</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_aj5 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">6. Eksport</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_aj6 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">7. Transit</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_aj7 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">8. Lain-lain</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_aj8 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3"><b>&nbsp;&nbsp;&nbsp;&nbsp; JUMLAH</b></font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">
                                                            <b>{{ ($penyata->e91_aj1 ?? 0) +($penyata->e91_aj2 ?? 0) +($penyata->e91_aj3 ?? 0) +($penyata->e91_aj4 ?? 0) +($penyata->e91_aj4 ?? 0) +($penyata->e91_aj5 ?? 0) +($penyata->e91_aj6 ?? 0) +($penyata->e91_aj7 ?? 0) +($penyata->e91_aj8 ?? 0) }}</b>
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
                                                        <font size="3">{{ $penyata->e91_ak1 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">2. Peniaga</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_ak2 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">
                                                        <font size="3">3. Lain-lain</font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">{{ $penyata->e91_ak3 ?? 0 }}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="168">&nbsp;&nbsp;&nbsp;&nbsp;<font size="3"><b>JUMLAH</b>
                                                        </font>
                                                    </td>
                                                    <td width="158" align="center">
                                                        <font size="3">
                                                            <b>{{ ($penyata->e91_ak1 ?? 0) + ($penyata->e91_ak2 ?? 0) + ($penyata->e91_ak3 ?? 0) }}</b>
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
                                        <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                            <input type="text" id="e91_sdate" class="form-control" size="50"
                                                name='e91_sdate' value="{{ $penyata->e91_sdate ?? '' }}" readonly>
                                        </p>
                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            <input type="text" id="e_npg" class="form-control" size="50" name='e_npg'
                                                value="{{ $pelesen->e_npg }}">
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            <input type="text" id="e_jpg" class="form-control" size="50" name='e_jpg'
                                                value="{{ $pelesen->e_jpg }}">
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            <input type="text" id="e_notel" class="form-control" size="50" name="e_notel"
                                                value="{{ $pelesen->e_notel }}">
                                        </p>

                                        <h1 style="page-break-before:always"></h1>

                                        <div class="row form-group" style="padding-top: 10px; ">


                                            <div class="text-left col-md-5">
                                                <a href="{{ route('buah.bahagianiv') }}" class="btn btn-primary"
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
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
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

    </body>

    </html>
@endsection
