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
                        <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>

                    <div class="col-11 align-self-center" style="text-align: right">
                        <button type="button" class="btn btn-primary " style="margin: 1%" onclick="myPrint('myfrm')"
                            value="print">Cetak</button>
                    </div>
                </div>

                <div class="card" style="margin-right:2%; margin-left:2%">
                    <div class="card-body">

                        <form method="get" action="" id="myfrm">

                            @foreach ($penyata as $key => $data)
                                {{-- @foreach (array_merge($pelesens, $penyata) as $data) --}}

                                <div class="pl-3">



                                    <body>
                                        {{-- <p align="left">
                                                    PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        {{-- <div align="">
                                                    <table border="0" width="100%">
                                                        <tbody style=" width:10rem; margin-right: -10px">
                                                            <tr>
                                                                <td width="85%" height="19">
                                                                    <p align=""><b>{{ $data->pelesen->kodpgw }}{{ $data->pelesen->nosiri }}</b></p>
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
                                                </div><br> --}}

                                        <div class="row">
                                            <div class="col-10">
                                                <p align="">
                                                    <b>{{ $data->regpelesen->kodpgw }}{{ $data->regpelesen->nosiri }}</b></p>

                                            </div>
                                            <div class="col-2" style="padding-left:2%">
                                                <p align="left"><b>MPOB(EL) CM 4</b></p>
                                                <p align="left" style="margin-top:-8%"><b>MPOB(EL) PX 4-CM </b></p>
                                                <p align="left" style="margin-top:-8%"><b>MPOB(EL) PM 4-CM </b></p>

                                            </div>
                                        </div><br>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                                height="100">
                                        </p>
                                        <title>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN KILANG OLEOKIMIA - MPOB (EL) CM 4<br>

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
                                                @elseif($bulan == 12 || $bulan == 0)
                                                    DISEMBER
                                                @endif

                                                @if ($bulan == 12 || $bulan == 0)
                                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun - 1 }}
                                                @else
                                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                                                @endif
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
                                                            {{ $data->pelesen->e_nl }}

                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19" style="text-transform:uppercase"><b>
                                                            {{ $data->pelesen->e_np }}
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

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_ap1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_ap2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_ap3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_as1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_as2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_as3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_notel }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_nofax }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $data->pelesen->e_email }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_npg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_jpg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_npgtg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase">
                                                        <b>{{ $data->pelesen->e_jpgtg }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>


                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (a)
                                                    :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK MINYAK
                                                    SAWIT</font>
                                            </b> </p>
                                        <div class="table-responsive">


                                            <table border="1" class="table table-bordered" width="100%"
                                                bordercolor="#000000" cellspacing="0" cellpadding="0"
                                                bordercolorlight="#FFFFFF" bordercolordark="#000000">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Belian/Terimaan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Import</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Jumlah Yang Diproses</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Jualan/Edaran Dalam Negeri</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Eksport</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    @if ($penyataia[$key] && !$penyataia[$key]->isEmpty())
                                                        @foreach ($penyataia[$key] as $dataia)
                                                            <tr>
                                                                <td align="left">
                                                                    <font size="2">{{ $dataia->produk->proddesc }}
                                                                    </font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $dataia->e104_b4 }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b5 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b6 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b7 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($dataia->e104_b8 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b9 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b10 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b11 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b12 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataia->e104_b13 ?? 0, 2) }}</font>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        {{-- <tr>
                                                                    <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                                </tr> --}}
                                                    @endif

                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total2[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total3[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total4[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total5[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total6[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total7[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total8[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($total9[$key] ?? 0, 2) }}</b></font>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>
                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1(b)
                                                    :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                    MINYAK ISIRUNG SAWIT</font>
                                            </b> </p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" align="center"><b>
                                                                <font size="2">Produk Minyak Isirung Sawit</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Belian/Terimaan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Import</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Jumlah Yang Diproses</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Jualan/Edaran Dalam Negeri</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Eksport</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    @if ($penyataib[$key] && !$penyataib[$key]->isEmpty())
                                                        @foreach ($penyataib[$key] as $dataib)
                                                            <tr>
                                                                <td align="left">
                                                                    <font size="2">{{ $dataib->produk->proddesc }}
                                                                    </font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $dataib->e104_b4 }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b5 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b6 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b7 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2"> {{ number_format($dataib->e104_b8 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b9 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b10 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b11 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b12 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataib->e104_b13 ?? 0, 2) }}</font>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        {{-- <tr>
                                                                    <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                                </tr> --}}
                                                    @endif

                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib2[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib3[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib4[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib5[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib6[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib7[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib8[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalib9[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                            <br>

                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1(c)
                                                    :&nbsp;&nbsp;&nbsp;&nbsp;PRODUK MINYAK SAWIT LAIN</font>
                                            </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" align="center"><b>
                                                                <font size="2">Produk Minyak Sawit Lain</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Awal Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Belian/Terimaan</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Import</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Jumlah Yang Diproses</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Jualan/Edaran Dalam Negeri</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Eksport</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Premis</font><b></b>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir Di Pusat Simpanan</font><b></b>
                                                            </b></td>
                                                    </tr>
                                                    @if ($penyataic[$key] && !$penyataic[$key]->isEmpty())
                                                        @foreach ($penyataic[$key] as $dataic)
                                                            <tr>
                                                                <td align="left">
                                                                    <font size="2">{{ $dataic->produk->proddesc }}
                                                                    </font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $dataic->e104_b4 }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b5 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b6 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b7 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($dataic->e104_b8 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b9 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b10 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b11 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b12 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataic->e104_b13 ?? 0, 2) }}</font>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        {{-- <tr>
                                                                    <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                                </tr> --}}
                                                    @endif
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic2[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic3[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic4[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic5[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic6[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic7[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic8[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totalic9[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 2
                                                    :&nbsp;&nbsp;&nbsp;&nbsp;
                                                    HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI PEMPROSESAN
                                                </font>
                                            </b> </p>
                                        <table border="0" width="50%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="380">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                    <td width="100"><b>:{{ $penyataii[$key]->e104_a5 }} Hari</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="380">Kadar Penggunaan Kapasiti Sebulan</td>
                                                    <td width="100"><b>:{{ $penyataii[$key]->e104_a6 }} %</b></td>
                                                </tr>

                                            </tbody>
                                        </table><br>

                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3
                                                    :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN PRODUK OLEOKIMIA</font>
                                            </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                <tbody>
                                                    <tr style="padding: 0.2rem 0.3rem; background-color: #d3d3d370">
                                                        <td class="headerColor" width="13%" align="center"><b>
                                                                <font size="2">Produk Oleokimia</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" align="center"><b>
                                                                <font size="2">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" align="center"><b>
                                                                <font size="2">Pengeluaran</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" align="center"><b>
                                                                <font size="2">Jualan/Edaran Dalam Negeri</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" align="center"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td class="headerColor" width="10%" align="center"><b>
                                                                <font size="2">Stok Akhir</font>
                                                            </b></td>
                                                    </tr>
                                                    @if ($penyataiii[$key] && !$penyataiii[$key]->isEmpty())
                                                        @foreach ($penyataiii[$key] as $dataiii)
                                                            <tr>
                                                                <td align="left">
                                                                    <font size="2">{{ $dataiii->produk->proddesc }}
                                                                    </font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $dataiii->e104_c3 }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataiii->e104_c4 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataiii->e104_c5 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataiii->e104_c6 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataiii->e104_c7 ?? 0, 2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">
                                                                        {{ number_format($dataiii->e104_c8 ?? 0, 2) }}</font>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        {{-- <tr>
                                                                    <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                                </tr> --}}
                                                    @endif
                                                    <tr>
                                                        <td align="center">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totaliii[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totaliii2[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totaliii3[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totaliii4[$key] ?? 0, 2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">
                                                                <b>{{ number_format($totaliii5[$key] ?? 0, 2) }}</b></font>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">
                                                    BAHAGIAN 4 :&nbsp;&nbsp;&nbsp;&nbsp;EKSPORT PRODUK OLEOKIMIA DAN
                                                    LAIN-LAIN PRODUK SAWIT

                                                </font>
                                            </b></p>
                                        <div class="table-responsive">

                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td class="headerColor" width="15%" align="center"><b>
                                                                <font size="2"> Nama Produk Sawit</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Nombor Borang Kastam 2</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Tarikh Eksport</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kuantiti<br>
                                                                    (Tan Metrik)
                                                                </font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Nilai (RM)</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Kod Negara</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Destinasi Negara</font>
                                                            </b></td>
                                                    </tr>
                                                    @if ($penyataiv[$key] && !$penyataiv[$key]->isEmpty())
                                                        @foreach ($penyataiv[$key] as $dataiv)
                                                            <tr>
                                                                <td align="left">
                                                                    <font size="2">{{  $dataiv->produk->proddesc ?? ''}}</font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $dataiv->produk->prodid ?? ''}}</font>
                                                                </td>
                                                                <td style="text-align: left; vertical-align:middle">
                                                                    <font size="2">{{ $dataiv->e104_d5  ?? ''}}</font>
                                                                </td>
                                                                <td align="left">
                                                                    <font size="2">{{  $dataiv->e104_d6 ?? '' }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($dataiv->e104_d7 ??  0,2) ?? '' }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{number_format ($dataiv->e104_d8 ??  0,2) ?? '' }}</font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $dataiv->e104_d9  ?? ''}}</font>
                                                                </td>
                                                                <td align="left">
                                                                    <font size="2">{{$dataiv->negara->namanegara ?? ''}}</font>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        {{-- <tr>
                                                                    <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                                </tr> --}}
                                                    @endif
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
                                                            <font size="2"><b>{{number_format ($totaliv[$key]  ??  0,2) ?? '' }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{number_format ($totaliv2[$key] ??  0,2) ?? '' }}</b></font>
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
                                                <font style="font-size: 15px" color="#0c7c85">
                                                    BAHAGIAN 5 :&nbsp;&nbsp;&nbsp;&nbsp;IMPORT PRODUK OLEOKIMIA DAN
                                                    LAIN-LAIN PRODUK SAWIT

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
                                                                <font size="2">Nombor Borang Kastam 2</font>
                                                            </b></td>
                                                        <td class="headerColor" width="8%" align="center"><b>
                                                                <font size="2">Tarikh Eksport</font>
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
                                                                <font size="2">Destinasi Negara</font>
                                                            </b></td>
                                                    </tr>
                                                    @if ($penyatav[$key] && !$penyatav[$key]->isEmpty())
                                                        @foreach ($penyatav[$key] as $datav)
                                                            <tr>
                                                                <td align="left">
                                                                    <font size="2">{{  $datav->produk->proddesc ?? ''}}</font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $datav->produk->prodid ?? ''}}</font>
                                                                </td>
                                                                <td style="text-align: left; vertical-align:middle">
                                                                    <font size="2">{{ $datav->e104_d5  ?? ''}}</font>
                                                                </td>
                                                                <td align="left">
                                                                    <font size="2">{{  $datav->e104_d6 ?? '' }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($datav->e104_d7 ??  0,2) ?? '' }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{number_format ($datav->e104_d8 ??  0,2) ?? '' }}</font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $datav->e104_d9  ?? ''}}</font>
                                                                </td>
                                                                <td align="left">
                                                                    <font size="2">{{$datav->negara->namanegara ?? ''}}</font>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        {{-- <tr>
                                                                    <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                                </tr> --}}
                                                    @endif
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
                                                            <font size="2"><b>{{number_format ($totalv[$key]  ??  0,2) ?? '' }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{number_format ($totalv2[$key] ??  0,2) ?? '' }}</b></font>
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


                                        <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                                adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{ $formatteddate[$key] }}
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            <span style="text-transform:uppercase">{{ $data->pelesen->e_npg }}</span>
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            <span style="text-transform:uppercase">{{ $data->pelesen->e_jpg }}</span>
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            {{ $data->pelesen->e_notel }}
                                        </p>


                                    </body>
                                </div>

                                <br>
                                <hr class="noPrint">
                                <h1 style="page-break-after:always"></h1>
                            @endforeach
                        </form>
                    </div>
                    <div class="row justify-content-center ">
                        <button type="button" class="btn btn-primary " style="margin: 1%" onclick="myPrint('myfrm')"
                            value="print">Cetak</button>
                    </div>

                </div>
            </div>


        </div>

    </div>



    {{-- <div id="preloader"></div> --}}
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}

    {{-- <style>
        @media print{
            * {font-family: Arial;}
        }
    </style> --}}
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

            var headstr = "<html><head><title></title></head><body></body>";
            var restorepage = $('body').html();
            var printcontent = $('#' + myfrm).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
    {{-- <script>
    function myPrint(myfrm) {
        document.getElementById("myfrm").style.fontFamily = "Rubik,sans-serif";
        var printdata = document.getElementById(myfrm);
        newwin = window.open("");
        newwin.document.write(printdata.outerHTML);
        newwin.print();
        newwin.close();
    }
</script> --}}

    </body>

    </html>
@endsection
