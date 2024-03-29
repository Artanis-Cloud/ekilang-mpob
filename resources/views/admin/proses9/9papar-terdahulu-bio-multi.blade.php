@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 align-self-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                        @if (!$loop->last)
                                            <li class="breadcrumb-item">
                                                <a href="{{ $breadcrumb['link'] }}" style="color: rgb(64, 69, 68) !important;"
                                                    onMouseOver="this.style.color='#25877b'"
                                                    onMouseOut="this.style.color='grey'">
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
                        <div class="col-7 align-self-center" id="breadcrumb">
                            <div class="d-flex align-items-center justify-content-end">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                    <div class="col-1 align-self-center">
                        <a href="javascript:history.back()" class="btn" style=" color:rgb(64, 69, 68)"><i
                                class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>

                    <div class="col-11 align-self-center" style="text-align: right">
                        <button type="button" class="btn btn-primary " style="margin: 1%"
                            onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div>
                    {{-- <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary "
                                onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div> --}}
                </div>

                <div class="card" style="margin-right:2%; margin-left:2%">

                    <div class="card-body">
                        <form method="get" action="" id="myfrm">
                            @foreach ($penyata as $nobatch => $data)
                                {{-- {{ dd($data[0]) }} --}}

                                <div class="pl-3">

                                    <body>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        <div align="">
                                            <table border="0" width="100%">
                                                <tbody style="float: right; width:10rem; margin-right: -10px">
                                                    <tr>
                                                        <td width="10%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="88%" height="19">
                                                            <p align="left"><b>MPOB(EL) CM 4</b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="88%" height="19">
                                                            <p align="left" style="margin-top: -15px"><b>MPOB(EL) PX 4-CM </b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="88%" height="19">
                                                            <p align="left" style="margin-top: -15px"><b>MPOB(EL) PM 4-CM </b></p>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                            height="100">
                                        </p>
                                        <title>PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4<br>

                                                BULAN :
                                                @if($data[0]->ebio_bln == "01") JANUARI
                                                    @elseif($data[0]->ebio_bln == "02") FEBRUARI
                                                    @elseif($data[0]->ebio_bln == "03") MAC
                                                    @elseif($data[0]->ebio_bln == "04") APRIL
                                                    @elseif($data[0]->ebio_bln == "05") MEI
                                                    @elseif($data[0]->ebio_bln == "06") JUN
                                                    @elseif($data[0]->ebio_bln == "07") JULAI
                                                    @elseif($data[0]->ebio_bln == "08") OGOS
                                                    @elseif($data[0]->ebio_bln == "09") SEPTEMBER
                                                    @elseif($data[0]->ebio_bln == "10") OKTOBER
                                                    @elseif($data[0]->ebio_bln == "11") NOVEMBER
                                                    @elseif($data[0]->ebio_bln == "12") DISEMBER
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $data[0]->ebio_thn }}
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
                                                        {{ $data[0]->e_nl }}
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

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap1 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap2 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap3 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as1 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as2 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as3 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data[0]->e_notel ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $data[0]->e_nofax ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $data[0]->e_email ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npg ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpg ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npgtg ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpgtg ?? '-' }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
                                                    SAWIT</font>
                                        </b> </p>
                                        <div class="table-responsive">

                                            <table border="1" class="table table-bordered" width="100%"
                                                bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Produk Minyak Sawit</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Belian/Terimaan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pengeluaran</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dipremis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dilapor</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    @php
                                                        $total_col_ebio_b5 = 0;
                                                        $total_col_ebio_b6 = 0;
                                                        $total_col_ebio_b7 = 0;
                                                        $total_col_ebio_b8 = 0;
                                                        $total_col_ebio_b9 = 0;
                                                        $total_col_ebio_b10 = 0;
                                                        $total_col_ebio_b11 = 0;
                                                        $total_dipremis = 0;
                                                    @endphp
                                                    @foreach ($ia[$nobatch] as $dataia)
                                                    {{-- {{ dd($dataia) }} --}}

                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{  $dataia->produk->proddesc ?? ''}}</font>
                                                            </td>
                                                            <td style="text-align: center; vertical-align:middle">
                                                                <font size="2">{{  $dataia->ebio_b4 ?? '' }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataia->ebio_b5 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataia->ebio_b6 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataia->ebio_b7 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataia->ebio_b8 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataia->ebio_b9 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataia->ebio_b10 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2"> {{ number_format($dipremis = $dataia->ebio_b5 + $dataia->ebio_b6 + $dataia->ebio_b7 - ($dataia->ebio_b8 + $dataia->ebio_b9 + $dataia->ebio_b10) ?? 0, 2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataia->ebio_b11 ??  0,2)  }}</font>
                                                            </td>
                                                            @php
                                                                $total_col_ebio_b5 += $dataia->ebio_b5 ?? 0  ;
                                                                $total_col_ebio_b6 += $dataia->ebio_b6 ?? 0  ;
                                                                $total_col_ebio_b7 += $dataia->ebio_b7 ?? 0  ;
                                                                $total_col_ebio_b8 += $dataia->ebio_b8 ?? 0  ;
                                                                $total_col_ebio_b9 += $dataia->ebio_b9 ?? 0  ;
                                                                $total_col_ebio_b10 += $dataia->ebio_b10 ?? 0  ;
                                                                $total_col_ebio_b11 += $dataia->ebio_b11 ?? 0  ;
                                                                $total_dipremis += $dataia->ebio_b5 + $dataia->ebio_b6 + $dataia->ebio_b7 - ($dataia->ebio_b8 + $dataia->ebio_b9 + $dataia->ebio_b10) ?? 0;


                                                            @endphp
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center" colspan="2">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b5 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b6 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b7 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b8 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b9 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b10 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_dipremis ?? 0, 2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b11 ?? 0,2) }}</b></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                    MINYAK ISIRUNG SAWIT</font>
                                        </b> </p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Produk Minyak Isirung Sawit</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Belian/Terimaan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pengeluaran</font><b></b>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dipremis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dilapor</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    @php
                                                        $total_col_ebio_b5 = 0;
                                                        $total_col_ebio_b6 = 0;
                                                        $total_col_ebio_b7 = 0;
                                                        $total_col_ebio_b8 = 0;
                                                        $total_col_ebio_b9 = 0;
                                                        $total_col_ebio_b10 = 0;
                                                        $total_col_ebio_b11 = 0;
                                                        $total_dipremis2 = 0;
                                                    @endphp

                                                    @foreach ($ib[$nobatch] as $dataib)
                                                    {{-- {{ dd($dataib[$nobatch]->produk->proddesc) }} --}}

                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{  $dataib->produk->proddesc ?? '' }}</font>
                                                            </td>
                                                            <td style="text-align: center; vertical-align:middle">
                                                                <font size="2">{{  $dataib->ebio_b4 ?? ''}}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataib->ebio_b5 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataib->ebio_b6 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataib->ebio_b7 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataib->ebio_b8 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataib->ebio_b9 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataib->ebio_b10 ??  0,2)  }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2"> {{ number_format($dipremis2 = $dataib->ebio_b5 + $dataib->ebio_b6 + $dataib->ebio_b7 - ($dataib->ebio_b8 + $dataib->ebio_b9 + $dataib->ebio_b10) ?? 0, 2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format( $dataib->ebio_b11 ??  0,2)  }}</font>
                                                            </td>
                                                            @php
                                                                $total_col_ebio_b5 += $dataib->ebio_b5 ?? 0  ;
                                                                $total_col_ebio_b6 += $dataib->ebio_b6 ?? 0  ;
                                                                $total_col_ebio_b7 += $dataib->ebio_b7 ?? 0  ;
                                                                $total_col_ebio_b8 += $dataib->ebio_b8 ?? 0  ;
                                                                $total_col_ebio_b9 += $dataib->ebio_b9 ?? 0  ;
                                                                $total_col_ebio_b10 += $dataib->ebio_b10 ?? 0  ;
                                                                $total_col_ebio_b11 += $dataib->ebio_b11 ?? 0  ;
                                                                $total_dipremis2 += $dipremis2 ?? 0;

                                                            @endphp
                                                        </tr>
                                                    @endforeach

                                                    <tr >
                                                        <td align="center" colspan="2">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b5 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b6 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b7 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b8 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b9 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b10 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_dipremis2 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b11 ?? 0,2) }}</b></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (c) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK-MINYAK LAIN</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Produk Minyak-Minyak Lain</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Belian/Terimaan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pengeluaran</font><b></b>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dipremis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dilapor</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    @php
                                                        $total_col_ebio_b5 = 0;
                                                        $total_col_ebio_b6 = 0;
                                                        $total_col_ebio_b7 = 0;
                                                        $total_col_ebio_b8 = 0;
                                                        $total_col_ebio_b9 = 0;
                                                        $total_col_ebio_b10 = 0;
                                                        $total_col_ebio_b11 = 0;
                                                        $total_dipremis3 = 0;
                                                    @endphp
                                                    @foreach ($ic[$nobatch] as $dataic)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $dataic->produk->proddesc ?? '' }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2">{{ $dataic->ebio_b4 ?? '' }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataic->ebio_b5 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataic->ebio_b6 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataic->ebio_b7 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataic->ebio_b8 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataic->ebio_b9 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataic->ebio_b10 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"> {{ number_format($dipremis3 = $dataic->ebio_b5 + $dataic->ebio_b6 + $dataic->ebio_b7 - ($dataic->ebio_b8 + $dataic->ebio_b9 + $dataic->ebio_b10) ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataic->ebio_b11 ??  0,2)}}</font>
                                                        </td>
                                                        @php
                                                            $total_col_ebio_b5 += $dataic->ebio_b5 ?? 0  ;
                                                            $total_col_ebio_b6 += $dataic->ebio_b6 ?? 0  ;
                                                            $total_col_ebio_b7 += $dataic->ebio_b7 ?? 0  ;
                                                            $total_col_ebio_b8 += $dataic->ebio_b8 ?? 0  ;
                                                            $total_col_ebio_b9 += $dataic->ebio_b9 ?? 0  ;
                                                            $total_col_ebio_b10 += $dataic->ebio_b10 ?? 0  ;
                                                            $total_col_ebio_b11 += $dataic->ebio_b11 ?? 0  ;
                                                            $total_dipremis3 += $dipremis3 ?? 0;
                                                        @endphp
                                                    </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center" colspan="2">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b5 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b6 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b7 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b8 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b9 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b10 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_dipremis3 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b11 ?? 0,2) }}</b></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">
                                                BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp;HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI PEMPROSESAN

                                            </font>
                                        </b> </p>

                                        <table border="0" width="50%" cellspacing="0" cellpadding="0">
                                            <tbody>

                                                <tr>
                                                    <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                    <td width="40%"><b>:{{ $ii[$nobatch]->hari_operasi ?? 00}} Hari</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="60%">Kadar Penggunaan Kapasiti Sebulan</td>
                                                    <td width="40%"><b>:{{ $ii[$nobatch]->kapasiti ?? 00 }} %</b></td>
                                                </tr>
                                            </tbody>
                                        </table><br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN PRODUK BIODIESEL DAN GLYCERINE</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="padding: 0.2rem 0.3rem; background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Produk Biodiesel dan Glycerine</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pengeluaran</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Jualan/Edaran Tempatan</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dipremis</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                    </tr>
                                                    @php
                                                        $total_col_ebio_c4 = 0;
                                                        $total_col_ebio_c5 = 0;
                                                        $total_col_ebio_c6 = 0;
                                                        $total_col_ebio_c7 = 0;
                                                        $total_col_ebio_c8 = 0;
                                                        $total_col_ebio_c9 = 0;
                                                        $total_col_ebio_c10 = 0;
                                                        $total_dipremis4 = 0;
                                                    @endphp

                                                    @foreach ($iii[$nobatch] as $dataiii)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $dataiii->produk->proddesc }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2">{{ $dataiii->ebio_c3 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataiii->ebio_c4 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{  number_format($dataiii->ebio_c5 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataiii->ebio_c6 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataiii->ebio_c7 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataiii->ebio_c8 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataiii->ebio_c9 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"> {{ number_format($dipremis4 = $dataiii->ebio_c4 + $dataiii->ebio_c5 + $dataiii->ebio_c6 - ($dataiii->ebio_c7 + $dataiii->ebio_c8 + $dataiii->ebio_c9) ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataiii->ebio_c10 ??  0,2)}}</font>
                                                        </td>
                                                        @php
                                                            $total_col_ebio_c4 += $dataiii->ebio_c4 ?? 0  ;
                                                            $total_col_ebio_c5 += $dataiii->ebio_c5 ?? 0  ;
                                                            $total_col_ebio_c6 += $dataiii->ebio_c6 ?? 0  ;
                                                            $total_col_ebio_c7 += $dataiii->ebio_c7 ?? 0  ;
                                                            $total_col_ebio_c8 += $dataiii->ebio_c8 ?? 0  ;
                                                            $total_col_ebio_c9 += $dataiii->ebio_c9 ?? 0  ;
                                                            $total_col_ebio_c10 += $dataiii->ebio_c10 ?? 0  ;
                                                            $total_dipremis4 += $dipremis4 ?? 0;

                                                        @endphp
                                                    </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center" colspan="2">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c4 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c5 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c6 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c7 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c8 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c9 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_dipremis4 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c10 ?? 0,2) }}</b></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>
                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 :&nbsp;&nbsp;&nbsp;&nbsp;EKSPORT PRODUK BIODIESEL DAN LAIN-LAIN PRODUK SAWIT

                                            </font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Nama Produk Sawit</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Nombor Borang Kastam 2</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Tarikh Eksport</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kuantiti <br>
                                                                    (Tan Metrik)</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Nilai (RM)</font>
                                                        </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kod Negara</font>
                                                        </b></td>
                                                        <td class="headerColor" width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Destinasi Negara</font>
                                                        </b></td>
                                                    </tr>
                                                    <tr>
                                                        {{-- <td align="center" colspan = "8">
                                                            <font size="2">Tiada Rekod</font>
                                                        </td> --}}
                                                    </tr>

                                                </tbody>
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

                                            </table><br>
                                        </div>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">
                                                BAHAGIAN 5 :&nbsp;&nbsp;&nbsp;&nbsp; IMPORT PRODUK SAWIT

                                            </font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="15%" align="center"><b>
                                                                <font size="2">Nama Produk Sawit</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Nombor Borang Kastam 1</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Tarikh Import</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kuantiti<br>
                                                                    (Tan Metrik)</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                            <font size="2">Nilai (RM)</font>
                                                        </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                            <font size="2">Kod Negara</font>
                                                        </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                            <font size="2">Negara Sumber Import</font>
                                                        </b></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td class="text-center" colspan="8">Tiada Rekod</td>
                                                    </tr> --}}

                                                </tbody>
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
                                            </table><br>
                                        </div>


                                        <p style="font-size: 16px"><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{ $data[0]->sdate }}
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            <span  style="text-transform:uppercase">{{ $data[0]->ebio_npg }}</span>
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            <span  style="text-transform:uppercase">{{ $data[0]->ebio_jpg }}</span>
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            {{ $data[0]->ebio_notel }}
                                        </p>



                                    </body>
                                </div><br><hr class="noPrint"><h1 style="page-break-after:always"></h1>
                            @endforeach

                        </form>

                    </div>
                    <div class="row justify-content-center ">
                        <button type="button" class="btn btn-primary " style="margin: 1%"
                            onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div>

                    <br>

                </div>

            </div>


        </div>


    </div><!-- End Hero -->




    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}

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
