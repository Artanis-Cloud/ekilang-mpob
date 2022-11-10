@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Terdahulu Pusat Simpanan</h4>
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
                            @foreach ($query as $nolesen_key => $data)


                                <div class="pl-3">
                                    <body>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                            <div align="">
                                                <table border="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td width="" height="19">
                                                                <p align=""><b>{{ $data[0]->kodpgw ?? ''}}{{ $data[0]->nosiri  ?? ''}}</b></p>
                                                            </td>
                                                            <td width="88%" height="19">
                                                                <p align="right"><b>MPOB(EL) KS 4</b></p>
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
                                                        {{ $data[0]->e_nl  ?? ''}}
                                                        </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19" style="text-transform:uppercase"><b>
                                                        {{ $data[0]->e_np ?? '' }}
                                                        </b></td>

                                                </tr>

                                            </tbody>
                                        </table>

                                        <hr>

                                        <p></p>


                                        <p align="left"><b>
                                                <font style="font-size: 15px" color="#0c7c85">MAKLUMAT PELESEN</font>
                                            </b></p>

                                        <table border="0" width="80%" cellpadding="0" cellspacing="0">

                                            <tbody>


                                                <tr>

                                                    <td width="35%">Alamat Premis Berlesen</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap1  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap2  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_ap3  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as1  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as2  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_as3  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $data[0]->e_notel  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $data[0]->e_nofax  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $data[0]->e_email  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npg  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpg  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_npgtg  ?? ''}}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%" style="text-transform:uppercase"><b>{{ $data[0]->e_jpgtg  ?? ''}}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>
                                        <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BHG A :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN INSTOLASI KELUARAN
                                                    MINYAK SAWIT - AKTIVITI BUKAN PERALIHAN (NON TRANSHIPMENT)</font>
                                        </b> </p>

                                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                            <tbody style="background-color: #d3d3d370">
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
                                                @foreach ($bhga[$nolesen_key] as $penyataa_key => $dataa)
                                                {{-- {{ dd($dataa) }} --}}
                                                <tr>
                                                    <td align="left">
                                                        <font size="2.7">{{ $dataa->comm_desc ?? ''}}</font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2.7">{{ $dataa->INS_KD ?? ''}}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2.7">{{ number_format($dataa->INS_KE ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2.7">{{ number_format($dataa->INS_KF ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2.7">{{ number_format($dataa->INS_KG ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2.7">{{ number_format($dataa->INS_KH ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2.7">{{ number_format($dataa->INS_KI ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2.7">{{ number_format($dataa->beza ??  0,2) }}</font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2.7">{{ number_format($dataa->INS_KJ ??  0,2) }}</font>
                                                    </td>

                                                </tr>
                                                @endforeach
                                                {{-- @foreach ($a as $dataa)
                                                    <tr>
                                                        <td align="left">
                                                            <font size="2">{{ $dataa->produk->proddesc }}</font>
                                                        </td>
                                                        <td align="center">
                                                            <font size="2">{{ $dataa->produk->prodid }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataa->e07bt_stokawal ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataa->e07bt_terima ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataa->e07bt_import ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataa->e07bt_edaran ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataa->e07bt_eksport ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataa->e07bt_pelarasan ?? 0, 2) }}</font>
                                                        </td>
                                                        <td align="right">
                                                            <font size="2">{{ number_format($dataa->e07bt_stokakhir ?? 0, 2) }}</font>
                                                        </td>
                                                    </tr>
                                                @endforeach --}}
                                                <tr>
                                                    <td align="center">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    {{-- <td align="right">
                                                        <font size="2"><b>{{ number_format($total ?? 0, 2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($total2 ?? 0, 2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($total3 ?? 0, 2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($total4 ?? 0, 2) }}</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>{{ number_format($total5 ?? 0, 2) }}</b></font>
                                                    </td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BHG B :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN INSTOLASI KELUARAN
                                                MINYAK SAWIT - AKTIVITI PERALIHAN (TRANSHIPMENT)</font>
                                        </b> </p>

                                        <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
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
                                                            <font size="2">Penerimaan Dari Luar Negara</font>
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
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
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
                                        </table><br>


                                        <p style="font-size: 16px"><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{-- {{ $formatteddate }} --}}
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            {{-- <span  style="text-transform:uppercase"> {{ $data->h_pelesen->e_npg }}</span> --}}
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            {{-- <span  style="text-transform:uppercase"> {{ $data->h_pelesen->e_jpg }}</span> --}}
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
