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
                    <h4 class="page-title">Penyata Bulanan</h4>
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
                            <p style="text-align: center; vertical-align:middle">
                                <img border="0" src="{{ asset('/mpob.png') }}" width="128" height="100">
                            </p>

                            <title>PENYATA BULANAN PUSAT SIMPANAN - MPOB (EL) KS 4</title>
                            <p style="text-align: center; vertical-align:middle"><b>
                                    <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                    </font>PENYATA BULANAN PUSAT SIMPANAN - MPOB (EL) KS 4<br>

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

                                        <td width="25%" height="19">Nombor Lesen
                                        </td>

                                        <td width="88%" height="19"><b>
                                                {{ auth()->user()->username }}
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
                                    <font color="#0c7c85">MAKLUMAT PELESEN </font>
                                </b></p>

                            <table border="0" width="80%" cellpadding="0" cellspacing="0">

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

                                        <td width="35%">Alamat Emel Kilang </td>

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
                                    <font style="font-size: 15px" color="#0c7c85">BHG A :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN
                                        INSTOLASI KELUARAN MINYAK SAWIT - AKTIVITI BUKAN PERALIHAN (NON
                                        TRANSHIPMENT)</font>
                                </b> </p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nama Produk Sawit</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Terimaan Dalam Negeri</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Import</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Edaran Tempatan</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Eksport</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Pelarasan (+/-)</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir</font>
                                            </b></td>
                                    </tr>
                                    @foreach ($penyata as $data)
                                        <tr>
                                            <td align="left">
                                                <font size="2">{{ $data->produk->proddesc }}</font>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <font size="2">{{ $data->produk->prodid }}</font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e07bt_stokawal ?? 0, 2) }}
                                                </font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e07bt_terima ?? 0, 2) }}
                                                </font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e07bt_import ?? 0, 2) }}
                                                </font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e07bt_edaran ?? 0, 2) }}
                                                </font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e07bt_eksport ?? 0, 2) }}
                                                </font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e07bt_pelarasan ?? 0, 2) }}
                                                </font>
                                            </td>
                                            <td align="right">
                                                <font size="2">{{ number_format($data->e07bt_stokakhir ?? 0, 2) }}
                                                </font>
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
                                    <font style="font-size: 15px" color="#0c7c85">BHG B :&nbsp;&nbsp;&nbsp;&nbsp;
                                        RINGKASAN
                                        INSTOLASI KE
                                        LUARAN MINYAK SAWIT - AKTIVITI PERALIHAN (TRANSHIPMENT)</font>
                                </b> </p>
                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                class="table table-bordered">
                                <tbody>
                                    <tr style="background-color: #d3d3d370">
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Nama Produk Sawit</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Kod Produk</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Awal</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Penerimaan Dari Luar Negara</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Edaran Ke Dalam Negeri/Import</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Eksport </font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Pelarasan (+/-)</font>
                                            </b></td>
                                        <td class="headerColor" width="8%"
                                            style="text-align: center; vertical-align:middle"><b>
                                                <font size="2">Stok Akhir</font>
                                            </b></td>
                                    </tr>
                                    {{-- <tr>
                                                        <td width="8%" style="text-align: center; vertical-align:middle" colspan="8">Tiada Rekod</td>

                                                    </tr> --}}
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
                            </table>
                            <br>
                            <div class="card"
                                style="border: 1px solid #000000; vertical-align:middle; padding: 5px 5px 5px 5px;"">
                                <p style="font-size: 16px; margin-bottom:0; margin-top:0"><b>
                                        Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                        benar, lengkap dan selaras dengan rekod harian.
                                    </b></p>
                            </div>
                            {{-- <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                                <input type="date" id="e91_sdate" class="form-control" size="50"
                                                    name='e102_sdate' value="{{ $user->e07_sdate }}" readonly>
                                            </p> --}}
                            @if ($user->e07_sdate == null)
                                <p>Tarikh Penghantaran:&nbsp;&nbsp;&nbsp; <b></b>
                                </p>
                            @else
                                <p>Tarikh Penghantaran:&nbsp;&nbsp;&nbsp;<b>
                                        {{ date('d-m-Y', strtotime($user->e07_sdate)) }} </b></p>
                            @endif
                            <p>Nama Pegawai Melapor:&nbsp;&nbsp; <b>{{ $user->e07_npg ?? '' }}</b>
                            </p>
                            <p>Jawatan Pegawai Melapor:&nbsp;&nbsp;<b> {{ $user->e07_jpg ?? '' }}</b></p>
                            <p>No Telefon Kilang:&nbsp;&nbsp;<b> {{ $user->e07_notel ?? '' }}</b>
                            </p>

                </form>

                {{-- <span>Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat yang diperlukan dan tekan butang ‘Hantar’.</span> --}}



                {{-- </form> --}}
            </div>
            <div class="row justify-content-center">

                <button type="button" class="btn btn-primary " onclick="myPrint('myfrm')" value="print">Cetak</button>
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

                var headstr = "<html><head><title></title></head><body></body>";
                var restorepage = $('body').html();
                var printcontent = $('#' + myfrm).clone();
                $('body').empty().html(printcontent);
                window.print();
                $('body').html(restorepage);
            }
        </script>
        <script>
            document.addEventListener('keypress', function(e) {
                if (e.keyCode === 13 || e.which === 13) {
                    e.preventDefault();
                    return false;
                }

            });
        </script>



        </body>

        </html>
    @endsection
