@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Penyata Bulanan Terdahulu</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
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
                <form method="get" action="" id="myfrm">
                    <div class="pl-3">

                        <body>
                            <div align="">
                                <table border="0" width="100%">
                                    <tbody style=" width:10rem; margin-right: -10px">
                                        <tr>
                                            <td width="100%" height="19">
                                                <p align="right"><b>MPOB(EL) KS 4</b></p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div><br>
                            <p align="center">
                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                            </p>

                            <title>PENYATA BULANAN PUSAT SIMPANAN - MPOB (EL) KS 4</title>
                            <p align="center"><b>
                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                    </font>PENYATA BULANAN PUSAT SIMPANAN - MPOB (EL) KS 4<br>

                                    BULAN :&nbsp;&nbsp; @if ($user->e07_bln == 1)
                                        JANUARI
                                    @elseif($user->e07_bln == 2)
                                        FEBRUARI
                                    @elseif($user->e07_bln == 3)
                                        MAC
                                    @elseif($user->e07_bln == 4)
                                        APRIL
                                    @elseif($user->e07_bln == 5)
                                        MEI
                                    @elseif($user->e07_bln == 6)
                                        JUN
                                    @elseif($user->e07_bln == 7)
                                        JULAI
                                    @elseif($user->e07_bln == 8)
                                        OGOS
                                    @elseif($user->e07_bln == 9)
                                        SEPTEMBER
                                    @elseif($user->e07_bln == 10)
                                        OKTOBER
                                    @elseif($user->e07_bln == 11)
                                        NOVEMBER
                                    @elseif($user->e07_bln == 12)
                                        DISEMBER
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp; {{ $user->e07_thn }}
                                </b><br>

                            </p>
                            <hr>

                            <table border="0" width="111%" cellspacing="0">

                                <tbody>
                                    <tr>

                                        <td width="25%" height="19">Nombor Lesen
                                        </td>

                                        <td width="88%" height="19"><b>{{ auth()->user()->username }}
                                            </b></td>

                                    </tr>

                                    <tr>

                                        <td width="25%" height="19">Nama Premis
                                        </td>

                                        <td width="88%" height="19"><b>{{ auth()->user()->name }}
                                            </b></td>

                                    </tr>

                                </tbody>
                            </table>

                            <hr>

                            <p></p>


                            <p align="left"><b>
                                    <font style="font-size: 15px" color="#0c7c85">MAKLUMAT PELESEN </font>
                                </b></p>

                            <table border="0" style="width: 80%" cellpadding="0" cellspacing="0">

                                <tbody>


                                    <tr>

                                        <td width="35%">Alamat Premis Berlesen</td>

                                        <td width="65%"><b>{{ $pelesen->e_ap1 ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">&nbsp;</td>

                                        <td width="65%"><b>{{ $pelesen->e_ap2 ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">&nbsp;</td>

                                        <td width="65%"><b>{{ $pelesen->e_ap3 ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">Alamat Surat Menyurat</td>

                                        <td width="65%"><b>{{ $pelesen->e_as1 ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">&nbsp;</td>

                                        <td width="65%"><b>{{ $pelesen->e_as2 ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">&nbsp;</td>

                                        <td width="65%"><b>{{ $pelesen->e_as3 ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">No. Telefon</td>

                                        <td width="65%"><b>{{ $pelesen->e_notel ?? '' }}</b>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="35%">No. Faks</td>

                                        <td width="65%"><b>{{ $pelesen->e_nofax ?? '' }}</b>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="35%">Alamat emel </td>

                                        <td width="65%"><b>{{ $pelesen->e_email ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">Nama Pegawai Melapor</td>

                                        <td width="65%"><b>{{ $pelesen->e_npg ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">Jawatan Pegawai Melapor</td>

                                        <td width="65%"><b>{{ $pelesen->e_jpg ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                        <td width="65%"><b>{{ $pelesen->e_npgtg ?? '' }}</b></td>

                                    </tr>

                                    <tr>

                                        <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                        <td width="65%"><b>{{ $pelesen->e_jpgtg ?? '' }}</b></td>

                                    </tr>

                                </tbody>
                            </table>
                            <br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BHG A :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN INSTOLASI KELUARAN
                                        MINYAK SAWIT - AKTIVITI BUKAN PERALIHAN (NON TRANSHIPMENT)</font>
                                </b> </p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Nama Produk Sawit</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Stok Awal</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Terimaan Dalam Negeri</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Import</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Edaran Tempatan</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Eksport</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Pelarasan (+/-)</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Stok Akhir</font>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyata as $data)
                                        <tr>
                                            <td align="left">
                                                <font size="2">{{ $data->produk->proddesc }}</font>
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
                                        </td>
                                    </tr>
                                </tbody>
                            </table><br>
                            <p><b>
                                    <font style="font-size: 15px" color="#0c7c85">BHG B :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN INSTOLASI KELUARAN
                                        MINYAK SAWIT - AKTIVITI PERALIHAN (TRANSHIPMENT)</font>
                                </b> </p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Nama Produk Sawit</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Stok Awal</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Penerimaan Dari Luar Negara</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Edaran Ke Dalam Negeri/Import</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Eksport Semula</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
                                                <font size="2">Pelarasan (+/-)</font>
                                            </b></td>
                                        <td class="headerColor" width="8%" align="center"><b>
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

                            <p style="font-size: 16px"><b>
                                Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                        benar, lengkap dan selaras dengan rekod harian.
                            </b></p>
                            <p>Tarikh Penghantaran&nbsp;&nbsp;&nbsp; <b>{{ $formatteddate }}</b></p>
                            <p>Nama Pegawai Melapor&nbsp;&nbsp; <b>{{ $pelesen->e_npg ?? '' }}</b>
                            </p>
                            <p>Jawatan Pegawai Melapor&nbsp;&nbsp; <b>{{ $pelesen->e_jpg ?? '' }}</b></p>
                            <p>No Telefon Kilang&nbsp;&nbsp; <b>{{ $pelesen->e_notel ?? '' }}</b>
                            </p>
                        </body>
                    </div>
                </form>
            </div>

                <div class="row justify-content-center">
                    <button type="button" class="btn btn-primary " style=" margin:1%"
                        onclick="myPrint('myfrm')" value="print">Cetak</button>
                </div>





    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" >
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
