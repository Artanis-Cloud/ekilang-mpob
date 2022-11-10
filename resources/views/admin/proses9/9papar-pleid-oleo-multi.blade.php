@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Terdahulu Kilang Oleokimia</h4>
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

                                <div class="pl-3">

                                    <body>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        <div align="">
                                            <table border="0" width="100%">
                                                <tbody style=" width:10rem; margin-right: -10px">
                                                    <tr>
                                                        <td width="85%" height="19">
                                                            <p align=""><b>{{ $data[0]->kodpgw ?? '' }}{{ $data[0]->nosiri ?? ''}}</b></p>
                                                        </td>
                                                        <td width="15%" height="19">
                                                            <p align="left"><b>MPOB(EL) CM 4</b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="85%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="15%" height="19">
                                                            <p align="left" style="margin-top: -15px"><b>MPOB(EL) PX 4-CM </b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="87%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="12%" height="19">
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
                                        <title>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4<br>

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
                                                        {{ $data[0]->e_nl  ?? '' }}
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19" style="text-transform:uppercase"><b>
                                                        {{ $data[0]->e_np  ?? '' }}
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

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap1  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap2  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap3  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as1 ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as2  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as3  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data[0]->e_notel  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $data[0]->e_nofax  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $data[0]->e_email  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npg  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpg  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npgtg  ?? '' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpgtg  ?? '' }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
                                                    SAWIT</font>
                                        </b> </p>

                                        <table border="1" class="table table-bordered" width="100%"
                                            bordercolor="#000000" cellspacing="0" cellpadding="0"
                                            bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Produk Minyak Sawit</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kod Produk</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Awal Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Belian/Terimaan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Import</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Jumlah Yang Diproses</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Eksport</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Akhir Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                </tr>
                                                @foreach ($bhg1a[$nobatch_key] as $penyata1a_key => $dataia)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{  $dataia->comm_desc ?? ''}}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2">{{  $dataia->F104B4 ?? ''}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B5 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B6 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B7 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B8 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B9 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B10 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B11 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"> {{ number_format( $dataia->F104B12 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataia->F104B13 ??  0,2)  }}</font>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    @foreach ($total1ab5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab9[$nobatch_key] as $total9_key => $total9)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total9->total9 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab10[$nobatch_key] as $total10_key => $total10)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total10->total10 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab11[$nobatch_key] as $total11_key => $total11)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total11->total11 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab12[$nobatch_key] as $total12_key => $total12)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total12->total12 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1ab13[$nobatch_key] as $total13_key => $total13)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total13->total13 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach

                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                    MINYAK ISIRUNG SAWIT</font>
                                        </b> </p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Produk Minyak Isirung Sawit</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kod Produk</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Awal Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Belian/Terimaan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Import</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Jumlah Yang Diproses</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Eksport</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Akhir Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                </tr>
                                                @foreach ($bhg1b[$nobatch_key] as $penyata1b_key => $dataib)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{  $dataib->comm_desc ?? ''}}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2">{{  $dataib->F104B4 ?? ''}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B5 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B6 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B7 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B8 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B9 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B10 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B11 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"> {{ number_format( $dataib->F104B12 ??  0,2)  }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format( $dataib->F104B13 ??  0,2)  }}</font>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{-- @foreach ($ib as $dataib)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $dataib->produk->proddesc }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2">{{ $dataib->e104_b4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b5 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b6 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b7 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">0.00</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b9 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b10 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b11 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b12 ??  0,2)}}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataib->e104_b13 ??  0,2)}}</font>
                                                        </td>
                                                    </tr>
                                                @endforeach --}}

                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    @foreach ($total1bb5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb9[$nobatch_key] as $total9_key => $total9)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total9->total9 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb10[$nobatch_key] as $total10_key => $total10)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total10->total10 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb11[$nobatch_key] as $total11_key => $total11)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total11->total11 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb12[$nobatch_key] as $total12_key => $total12)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total12->total12 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($total1bb13[$nobatch_key] as $total13_key => $total13)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total13->total13 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                    {{-- <td align="right">
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
                                                    </td> --}}
                                                </tr>
                                            </tbody>
                                        </table>

                                        <br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (c) :&nbsp;&nbsp;&nbsp;&nbsp; MINYAK SAWIT LAIN</font>
                                        </b></p>

                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                        <font size="2">Produk Minyak Sawit Lain</font><b></b>
                                                    </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kod Produk</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Awal Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Belian/Terimaan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Import</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Jumlah Yang Diproses</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Jualan/Edaran Tempatan</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Eksport</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Akhir Di Premis</font><b></b>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                        </b></td>
                                                </tr>
                                                {{-- @foreach ($ic as $dataic)
                                                <tr>
                                                    <td align="left">
                                                        <font size="2">{{ $dataic->produk->proddesc }}</font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2">{{ $dataic->e104_b4 }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b5 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b6 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b7 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">0.00</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b9 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b10 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b11 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b12 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataic->e104_b13 ??  0,2)}}</font>
                                                    </td>
                                                </tr>
                                                @endforeach --}}
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    {{-- <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic5 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic6 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic7 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic8 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic9 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic10 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic11 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic12 ??  0,2) }}0</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totalic13 ??  0,2) }}</b></font>
                                                    </td> --}}
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table><br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">
                                                BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp;HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI PEMPROSESAN

                                            </font>
                                        </b> </p>

                                        <table border="0" width="50%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                    {{-- <td width="40%"><b>:{{ $data->e104_a5 }} Hari</b></td> --}}
                                                </tr>
                                                <tr>
                                                    <td width="60%">Kadar Penggunaan Kapasiti Sebulan</td>
                                                    {{-- <td width="40%"><b>:{{ $data->e104_a6 }} %</b></td> --}}
                                                </tr>

                                            </tbody>
                                        </table><br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN PRODUK OLEOKIMIA</font>
                                        </b></p>

                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="padding: 0.2rem 0.3rem; background-color: #d3d3d370">
                                                    <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Produk Oleokimia</font>
                                                        </b></td>
                                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kod Produk</font>
                                                        </b></td>
                                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Belian/Terimaan</font>
                                                        </b></td>
                                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Pengeluaran</font>
                                                        </b></td>
                                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Jualan/Edaran Tempatan</font>
                                                        </b></td>
                                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Eksport</font>
                                                        </b></td>
                                                    <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Stok Akhir</font>
                                                        </b></td>
                                                </tr>
                                                {{-- @foreach ($iii as $dataiii)
                                                <tr>
                                                    <td align="left">
                                                        <font size="2">{{ $dataiii->produk->proddesc }}</font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2">{{ $dataiii->e104_c3 }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataiii->e104_c4 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{  number_format($dataiii->e104_c5 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataiii->e104_c6 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataiii->e104_c7 ??  0,2)}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataiii->e104_c8 ??  0,2)}}</font>
                                                    </td>
                                                </tr>
                                                @endforeach --}}
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    {{-- <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii4 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii5 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii6 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii7 ??  0,2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($totaliii8 ??  0,2) }}</b></font>
                                                    </td> --}}

                                                </tr>
                                            </tbody>
                                        </table><br>
                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 :&nbsp;&nbsp;&nbsp;&nbsp;EKSPORT PRODUK OLEOKIMIA DAN LAIN-LAIN PRODUK SAWIT

                                            </font>
                                        </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Produk Minyak Sawit</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kod Produk</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Nombor Borang Kastam 2</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Tarikh Eksport</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kuantiti <br>
                                                                (Tan Metrik)</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                        <font size="2">Nilai (RM)</font>
                                                    </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                        <font size="2">Kod Negara</font>
                                                    </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
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
                                                {{-- @foreach ($iv as $dataiv)
                                                <tr>
                                                    <td align="left">
                                                        <font size="2">{{  $dataiv->produk->proddesc ?? ''}}</font>
                                                    </td>
                                                    <td align="left">
                                                        <font size="2">{{ $dataiv->produk->prodid ?? ''}}</font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2">{{ $dataiv->e104_d5  ?? ''}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ $formatteddat2 ?? '' }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataiv->e104_d7 ??  0,2) ?? '' }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{number_format ($dataiv->e104_d8 ??  0,2) ?? '' }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ $dataiv->e104_d9  ?? ''}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{$dataiv->negara->namanegara ?? ''}}</font>
                                                    </td>
                                                </tr>
                                                @endforeach --}}
                                            </tbody>
                                        </table><br>
                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 :&nbsp;&nbsp;&nbsp;&nbsp;IMPORT PRODUK OLEOKIMIA DAN LAIN-LAIN PRODUK SAWIT

                                            </font>
                                        </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Produk Minyak Sawit</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kod Produk</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Nombor Borang Kastam 2</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Tarikh Eksport</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                            <font size="2">Kuantiti <br>
                                                                (Tan Metrik)</font>
                                                        </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                        <font size="2">Nilai (RM)</font>
                                                    </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                        <font size="2">Kod Negara</font>
                                                    </b></td>
                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
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
                                                {{-- @foreach ($iv as $dataiv)
                                                <tr>
                                                    <td align="left">
                                                        <font size="2">{{  $dataiv->produk->proddesc ?? ''}}</font>
                                                    </td>
                                                    <td align="left">
                                                        <font size="2">{{ $dataiv->produk->prodid ?? ''}}</font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2">{{ $dataiv->e104_d5  ?? ''}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ $formatteddat2 ?? '' }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ number_format($dataiv->e104_d7 ??  0,2) ?? '' }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{number_format ($dataiv->e104_d8 ??  0,2) ?? '' }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{ $dataiv->e104_d9  ?? ''}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2">{{$dataiv->negara->namanegara ?? ''}}</font>
                                                    </td>
                                                </tr>
                                                @endforeach --}}
                                            </tbody>
                                        </table><br>



                                        <p style="font-size: 16px"><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{-- {{ $formatteddate }} --}}
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            {{-- <span  style="text-transform:uppercase">{{ $data->h_pelesen->e_npg }}</span> --}}
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            {{-- <span  style="text-transform:uppercase">{{ $data->h_pelesen->e_jpg }}</span> --}}
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

                    <br>

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
