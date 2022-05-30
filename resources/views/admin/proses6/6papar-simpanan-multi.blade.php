@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">


        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Terkini Pusat Simpanan</h4>
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
                        <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                    <div class="col-2 align-self-center">
                        <button type="button" class="btn btn-primary "
                                onclick="myPrint('myfrm')" value="print">Cetak</button>
                    </div>
                </div>
                <form method="get" action="" id="myfrm">

                    <div class="card" style="margin-right:2%; margin-left:2%">
                        @foreach ($pelesens as $data)
                            {{-- @foreach (array_merge($pelesens, $penyata) as $data) --}}



                            <div class="card-body">
                                <div class="pl-3">



                                    <body>
                                        {{-- <p align="left">
                                            PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}


                                            <div align="right">
                                                <table border="0" width="25%">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p align="left"><b>MPOB(EL) KS 4</b></p>
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>


                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                                height="100">
                                        </p>

                                        <title>PENYATA BULANAN PUSAT SIMPANAN - MPOB (EL) KS 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN PUSAT SIMPANAN - MPOB (EL) KS 4<br>

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
                                                    <font color="#0000FF">BHG A :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN
                                                        INSTOLASI KELUARAN MINYAK SAWIT - AKTIVITI BUKAN PERALIHAN (NON
                                                        TRANSHIPMENT)</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Nama Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Terimaan Dalam Negeri</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Pelarasan (+/-)</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir</font>
                                                            </b></td>
                                                    </tr>
                                                    @foreach ($penyatai as $data)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{ $data->produk->prodname }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $data->produk->prodid }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e07bt_stokawal }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e07bt_terima }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e07bt_import }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e07bt_edaran }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e07bt_eksport }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e07bt_pelarasan }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ $data->e07bt_stokakhir }}</font>
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
                                                            <font size="2"><b>{{ number_format($total ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($total2 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($total3 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>-</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($total4 ??  0,2) }}</b></font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2"><b>{{ number_format($total5 ??  0,2) }}</b></font>
                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p><b>
                                                    <font color="#0000FF">BHG B :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN
                                                        INSTOLASI KE
                                                        LUARAN MINYAK SAWIT - AKTIVITI PERALIHAN (TRANSHIPMENT)</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Nama Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Awal</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Terimaan Dari Luar Negara</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Edaran Ke Dalam Negeri/Import</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Eksport Semula</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Pelarasan (+/-)</font>
                                                            </b></td>
                                                        <td width="8%" align="center"><b>
                                                                <font size="2">Stok Akhir</font>
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
                                                    </tr>
                                            </tbody>
                                        </table>

                                        <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            {{ $data->e07_npg }}
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            {{ $data->e07_jpg }}
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            {{ $data->e07_notel }}
                                        </p>


                                    </body>
                                </div>

                            </div>

                            <br><hr>

                        @endforeach

                    </div>
                </form>
            </div>


            <h1 style="page-break-before:always"></h1>

          

        </div>

    </div>




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
