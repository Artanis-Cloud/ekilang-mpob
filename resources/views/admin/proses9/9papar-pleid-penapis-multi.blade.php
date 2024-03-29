@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Terdahulu Kilang Penapis</h4>
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
                        <a href="javascript:history.back()" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                    {{-- <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary "
                                onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div> --}}
                </div>

                <div class="card" style="margin-right:2%; margin-left:2%">
                    <form method="get" action="" id="myfrm">
                        {{-- {{ dd($query) }} --}}

                        @foreach ($query as $nobatch_key => $data)
                        {{-- {{ dd($data) }} --}}


                            <div class="card-body">
                                    {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">



                                    <body>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        <div align="">
                                            <table border="0" width="100%">
                                                <tbody style=" width:10rem; margin-right: -10px">
                                                    <tr>
                                                        <td width="85%" height="19">
                                                            <p align=""><b>{{ $data[0]->kodpgw ?? ''  }}{{ $data[0]->nosiri ?? ''  }}</b></p>
                                                        </td>
                                                        <td width="15%" height="19">
                                                            <p align="left"><b>MPOB(EL) RF 4</b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="85%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="15%" height="19">
                                                            <p align="left" style="margin-top: -15px"><b>MPOB(EL) PX 4-RF </b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="87%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="12%" height="19">
                                                            <p align="left" style="margin-top: -15px"><b>MPOB(EL) PM 4-RF </b></p>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                                height="100">
                                        </p>

                                        <title>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN KILANG PENAPIS - MPOB (EL) RF 4<br>

                                                BULAN :
                                                @if($data[0]->e101_bln == "01") JANUARI
                                                    @elseif($data[0]->e101_bln == "02") FEBRUARI
                                                    @elseif($data[0]->e101_bln == "03") MAC
                                                    @elseif($data[0]->e101_bln == "04") APRIL
                                                    @elseif($data[0]->e101_bln == "05") MEI
                                                    @elseif($data[0]->e101_bln == "06") JUN
                                                    @elseif($data[0]->e101_bln == "07") JULAI
                                                    @elseif($data[0]->e101_bln == "08") OGOS
                                                    @elseif($data[0]->e101_bln == "09") SEPTEMBER
                                                    @elseif($data[0]->e101_bln == "10") OKTOBER
                                                    @elseif($data[0]->e101_bln == "11") NOVEMBER
                                                    @elseif($data[0]->e101_bln == "12") DISEMBER
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $data[0]->e101_thn ?? '' }}
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
                                                            {{ $data[0]->e_nl ?? ''  }}
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19" style="text-transform:uppercase"><b>
                                                            {{ $data[0]->e_np ?? ''  }}
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

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap1 ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap2 ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap3 ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as1 ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as2 ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as3 ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data[0]->e_notel ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks</td>

                                                    <td width="65%"><b>{{ $data[0]->e_nofax ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $data[0]->e_email ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npg ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpg ?? ''  }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npgtg ?? ''  }}</b></td>

                                                </tr>
                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpgtg ?? ''  }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>


                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 : PRODUK MINYAK
                                                    SAWIT</font>
                                            </b> </p>
                                        <div class="table-responsive">
                                            <table border="1" class="table table-bordered" width="100%"
                                                bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" align="center"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Belian / Terima</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Import</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Pengeluaran</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Digunakan Untuk Proses Selanjutnya</font>
                                                                <b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Jualan / Edaran Tempatan</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Eksport</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Premis</font><b></b>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    {{-- {{ dd($penyata1) }} --}}
                                                    @foreach ($penyata1[$nobatch_key] as $penyata1_key => $datai)
                                                    {{-- {{dd($datai)}} --}}
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2.7">{{ $datai->comm_desc }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2.7">{{ $datai->F101B4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B5 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B6 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B7 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B8 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B9 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B10 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B11 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7"> {{ number_format($datai->F101B12 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B13 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2.7">{{ number_format($datai->F101B14 ??  0,2) }}</font>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        @foreach ($totalib5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib9[$nobatch_key] as $total9_key => $total9)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total9->total9 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib10[$nobatch_key] as $total10_key => $total10)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total10->total10 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib11[$nobatch_key] as $total11_key => $total11)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total11->total11 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib12[$nobatch_key] as $total12_key => $total12)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total12->total12 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib13[$nobatch_key] as $total13_key => $total13)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total13->total13 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalib14[$nobatch_key] as $total14_key => $total14)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total14->total14 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>

                                        <p><b>
                                            <font style="font-size: 15px" color="0c7c85">BAHAGIAN 2 : PRODUK
                                                ISIRUNG MINYAK SAWIT </font>
                                        </b> </p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" align="center"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Awal Di Pusat Simpanan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Belian / Terimaan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Digunakan Untuk Proses Selanjutnya</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Jualan / Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2.7">Stok Akhir Di Pusat Simpanan</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyata2[$nobatch_key] as $penyata2_key => $dataii)
                                                    {{-- {{ dd($penyata2) }} --}}
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $dataii->comm_desc }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7">{{ $dataii->F101B4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B10 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B11 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7"> {{ number_format($dataii->F101B12 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B13 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataii->F101B14 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        @foreach ($totaliib5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib9[$nobatch_key] as $total9_key => $total9)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total9->total9 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib10[$nobatch_key] as $total10_key => $total10)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total10->total10 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib11[$nobatch_key] as $total11_key => $total11)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total11->total11 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib12[$nobatch_key] as $total12_key => $total12)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total12->total12 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib13[$nobatch_key] as $total13_key => $total13)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total13->total13 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totaliib14[$nobatch_key] as $total14_key => $total14)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total14->total14 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <br>


                                        <p><b>
                                            <font style="font-size: 15px"  color="0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI
                                            </font>
                                        </b></p>
                                        <table border="0" width="60%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                @foreach ($penyata3[$nobatch_key] as $penyata3_key => $data)

                                                <tr>
                                                    <td width="60%">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                    <td width="40%"><b>{{ $data->F101A7 }} Hari</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="60%">Kadar Penggunaan Kapasiti (Refining) Sebulan</td>
                                                    <td width="40%"><b>{{ number_format($data->F101A8 ??  0,2) }} %</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="60%">Kadar Penggunaan Kapasiti (Fractionation) Sebulan
                                                    </td>
                                                    <td width="40%"><b>{{ number_format($data->F101A9 ??  0,2) }} %</b></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                        <p>

                                        <p><b>
                                            <font style="font-size: 15px" color="0c7c85">BAHAGIAN 4 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                AKHIR
                                                BERASASKAN MINYAK SAWIT DAN MINYAK ISIRUNG SAWIT -
                                                BAHAN MAKANAN</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Awal</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Jualan/Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Akhir</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyata4a[$nobatch_key] as $penyata4a_key => $dataiva)

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $dataiva->comm_desc }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7">{{ $dataiva->F101C4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->F101C5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->F101C6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->F101C7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->F101C8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->F101C9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataiva->F101C10 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        @foreach ($totalivac5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivac6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivac7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivac8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivac9[$nobatch_key] as $total9_key => $total9)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total9->total9 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivac10[$nobatch_key] as $total10_key => $total10)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total10->total10 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 4 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                AKHIR
                                                BERASASKAN MINYAK SAWIT DAN MINYAK ISIRUNG SAWIT -
                                                BAHAN BUKAN MAKANAN</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                <tbody>
                                                    <tr style="padding: 0.2rem 0.3rem; background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Awal</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Jualan / Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Stok Akhir</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyata4b[$nobatch_key] as $penyata4b_key => $dataivb)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $dataivb->comm_desc }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7">{{ $dataivb->F101C4 }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->F101C5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->F101C6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->F101C7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->F101C8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->F101C9 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($dataivb->F101C10 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7"><b>-</b></font>
                                                        </td>
                                                        @foreach ($totalivbc5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivbc6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivbc7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivbc8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivbc9[$nobatch_key] as $total9_key => $total9)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total9->total9 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalivbc10[$nobatch_key] as $total10_key => $total10)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total10->total10 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 (a) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN /
                                                TERIMAAN BEKALAN PRODUK SAWIT -
                                                SENDIRI</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan Dari</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPKO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPKO</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyata5a[$nobatch_key] as $penyata5a_key => $datava)

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datava->catname}}</font>
                                                        </td>
                                                        <td style="text-align: right; vertical-align:middle">
                                                            <font size="2.7">{{ number_format($datava->F101D5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datava->F101D6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datava->F101D7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datava->F101D8 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        @foreach ($totalvad5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalvad6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalvad7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalvad8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 5 (b) :&nbsp;&nbsp;&nbsp;&nbsp;BELIAN /
                                                TERIMAAN BEKALAN PRODUK SAWIT -
                                                LUAR</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Belian/Terimaan Dari</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">CPKO</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">PPKO</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyata5b[$nobatch_key] as $penyata5b_key => $datavb)

                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavb->catname}}</font>
                                                        </td>
                                                        <td style="text-align: right; vertical-align:middle">
                                                            <font size="2.7">{{ number_format($datavb->F101D5 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavb->F101D6 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavb->F101D7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavb->F101D8 ??  0,2) }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2.7"><b>JUMLAH</b></font>
                                                        </td>
                                                        @foreach ($totalvbd5[$nobatch_key] as $total5_key => $total5)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total5->total5 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalvbd6[$nobatch_key] as $total6_key => $total6)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total6->total6 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalvbd7[$nobatch_key] as $total7_key => $total7)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total7->total7 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach
                                                        @foreach ($totalvbd8[$nobatch_key] as $total8_key => $total8)
                                                        <td align="right">
                                                            <font size="2.7"><b>{{ number_format($total8->total8 ??  0,2) }}</b></font>
                                                        </td>
                                                        @endforeach


                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 6 :&nbsp;&nbsp;&nbsp;&nbsp;
                                                EKSPORT PRODUK SAWIT</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="14%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="7%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nombor Borang Kastam 2</font>
                                                            </b></td>
                                                        <td width="12%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Tarikh Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kuantiti<br> (Tan Metrik)</font><b></b>
                                                            </b></td>
                                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nilai (RM)</font>
                                                            </b></td>
                                                        <td width="6%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Negara</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Destinasi Negara</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($vi[$nobatch_key]   as $datavi)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavi->produk->proddesc ?? '-' }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7">{{ $datavi->e101_e4 ?? '-' }}</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavi->e101_e5 ?? '-' }}</font>
                                                        </td>
                                                        @php
                                                            $myDateTimevi= strtotime($datavi->e101_e6);
                                                            if ($myDateTimevi) {
                                                                $myDateTimevi= DateTime::createFromFormat('Y-m-d', $datavi->e101_e6);
                                                                $formatteddatevi= $myDateTimevi->format('d-m-Y');

                                                            }else {
                                                                $formatteddatevi=$datavi->e101_e6;
                                                            }
                                                        @endphp
                                                        <td align="left">
                                                            <font size="2.7">{{ $formatteddatevi ?? '-' }}</font>
                                                        </td>
                                                        {{-- <td align="left">
                                                            <font size="2.7">{{ $datavi->e101_e6 ?? '-' }}</font>
                                                        </td> --}}
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavi->e101_e7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavi->e101_e8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7">{{ $datavi->e101_e9 ??  '-' }}</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavi->negara->namanegara ??  '-' }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>JUMLAH</b></font>
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
                                                            <font size="2"><b>{{number_format ($totalvie7[$nobatch_key]  ??  0,2) ?? '' }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{number_format ($totalvie8[$nobatch_key] ??  0,2) ?? '' }}</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 7 :&nbsp;&nbsp;&nbsp;&nbsp;
                                                IMPORT PRODUK SAWIT</font>
                                        </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="14%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Produk Minyak Sawit</font>
                                                            </b></td>
                                                        <td width="7%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Produk</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nombor Borang Kastam 1</font>
                                                            </b></td>
                                                        <td width="12%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Tarikh Eksport</font>
                                                            </b></td>
                                                        <td width="10%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kuantiti<br> (Tan Metrik)</font><b></b>
                                                            </b></td>
                                                        <td width="11%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Nilai (RM)</font>
                                                            </b></td>
                                                        <td width="6%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Kod Negara</font>
                                                            </b></td>
                                                        <td width="15%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2.7">Destinasi Negara</font>
                                                            </b></td>
                                                    </tr>
                                                    <tr>
                                                    @foreach ($vii[$nobatch_key]   as $datavii)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavii->produk->proddesc ?? '-' }}</font>
                                                        </td>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7">{{ $datavii->e101_e4 ?? '-' }}</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavii->e101_e5 ?? '-' }}</font>
                                                        </td>
                                                        @php
                                                            $myDateTimevii= strtotime($datavii->e101_e6);
                                                            if ($myDateTimevii) {
                                                                $myDateTimevii= DateTime::createFromFormat('Y-m-d', $datavii->e101_e6);
                                                                $formatteddatevii= $myDateTimevii->format('d-m-Y');

                                                            }else {
                                                                $formatteddatevii=$datavii->e101_e6;
                                                            }
                                                        @endphp
                                                        <td align="left">
                                                            <font size="2.7">
                                                                {{ $formatteddatevii ?? '-' }}</font>
                                                        </td>
                                                        {{-- <td align="left">
                                                            <font size="2.7">
                                                                {{ $datavii->e101_e6 ?? '-' }}</font>
                                                        </td> --}}
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavii->e101_e7 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2.7">{{ number_format($datavii->e101_e8 ??  0,2) }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2.7">{{ $datavii->e101_e9 ??  '-' }}</font>
                                                        </td>
                                                        <td align="left">
                                                            <font size="2.7">{{ $datavii->negara->namanegara ??  '-' }}</font>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="text-align: center; vertical-align:middle">
                                                            <font size="2.7"><b>JUMLAH</b></font>
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
                                                            <font size="2"><b>{{number_format ($totalviie7[$nobatch_key]  ??  0,2) ?? '' }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{number_format ($totalviie8[$nobatch_key] ??  0,2) ?? '' }}</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p style="font-size: 16px"><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>


                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            @foreach ($users[$nobatch_key] as $users_key => $data)
                                            {{ $data->tkhsubmit }}
                                            @endforeach
                                        </p>
                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            <span  style="text-transform:uppercase">&nbsp;&nbsp;</span>
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            <span  style="text-transform:uppercase">&nbsp;&nbsp;</span>
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            &nbsp;&nbsp;
                                        </p>


                                    </body>
                                </div>
                            </div>

                            <br><hr><h1 style="page-break-after:always"></h1>

                        @endforeach
                    </form>
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
