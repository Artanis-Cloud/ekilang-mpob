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
                    {{-- <form method="get" action="" id="myfrm"> --}}
                        <div class="card" style="margin-right:2%; margin-left:2%">
                            <br>
                            <br>
                            <div class="card-body">
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
                                                    <font style="font-size: 15px" color="#0c7c85">MAKLUMAT PELESEN </font>
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

                                                        <td width="35%">Alamat Emel Kilang</td>

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

                                                        <td width="65%"><b>{{ $pelesen->e_npgtg  ?? ''}}</b></td>

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
                                                    <tr  style="background-color: #d3d3d370">
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Nama Produk Sawit</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Terimaan Dalam Negeri</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Import</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pelarasan (+/-)</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
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
                                                                <font size="2">{{ number_format($data->e07bt_stokawal ?? 0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e07bt_terima ?? 0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e07bt_import ?? 0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e07bt_edaran ?? 0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e07bt_eksport ?? 0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e07bt_pelarasan ?? 0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($data->e07bt_stokakhir ?? 0,2) }}</font>
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
                                            </table><br>
                                            <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">BHG B :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN
                                                        INSTOLASI KE
                                                        LUARAN MINYAK SAWIT - AKTIVITI PERALIHAN (TRANSHIPMENT)</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr  style="background-color: #d3d3d370">
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Nama Produk Sawit</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Penerimaan Dari Luar Negara</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Edaran Ke Dalam Negeri/Import</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport </font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pelarasan (+/-)</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
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
                                                    </tr>d>
                                                    </tr>
                                                </tbody>
                                            </table><br>

                                            <div class="card" style="border: 1px solid #000000; vertical-align:middle; padding: 5px 5px 5px 5px;">
                                                <p style="font-size: 17px; margin-bottom:0; padding-left: 20px; color:red"><b>
                                                        Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                                        benar, lengkap dan selaras dengan rekod harian.
                                                    </b></p>
                                            </div>
                                            {{-- <p>Tarikh Penghantaran : &nbsp;&nbsp;&nbsp;
                                                <input type="date" id="e91_sdate" class="form-control" size="50"
                                                    name='e102_sdate' value="{{ $user->e07_sdate }}" readonly>
                                            </p> --}}

                                            <form action="{{ route('pusatsimpan.update.papar.penyata', [$user->e07_reg]) }}"
                                                method="post" novalidate>
                                                @csrf

                                            <p>
                                                <div class="required">Nama Pegawai Melapor:</div>
                                                <input type="text" id="e_npg" class="form-control" size="50" maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_npg(); this.value = this.value.toUpperCase()"
                                                    name='e07_npg' value="{{ $user->e07_npg }}">
                                                    <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi
                                                        butiran di bahagian ini!</i></p>
                                            </p>
                                            <p>
                                                <div class="required">Jawatan Pegawai Melapor:</div>
                                                <input type="text" id="e_jpg" class="form-control" size="50" maxlength="60" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_jpg(); this.value = this.value.toUpperCase()"
                                                    name='e07_jpg' value="{{ $user->e07_jpg }}">
                                                    <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi
                                                        butiran di bahagian ini!</i></p>
                                            </p>
                                            <p>
                                                <div class="required">No Telefon Kilang:</div>

                                                <input type="text" id="e_notel" class="form-control" size="50" maxlength="50" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); valid_notel(); this.value = this.value.toUpperCase()"
                                                    name="e07_notel" value="{{ $user->e07_notel }}" onkeypress="return isNumberKey(event)">
                                                    <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi
                                                        butiran di bahagian ini!</i></p>
                                                        <p type="hidden" id="err_notel2" style="color: red; display:none"><i>Sila masukkan nombor telefon yang betul!</i></p>
                                                        </p>
                                            </p>



                                            {{-- <span>Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat yang diperlukan dan tekan butang ‘Hantar’.</span> --}}

                    <div class="form-group" style="padding-top: 10px; ">
                            <a href="{{ route('pusatsimpan.bahagianb') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>
                            <button type="button" class="btn btn-primary " style="float: right" id="checkBtn" onclick="check()">Hantar</button>
                            {{-- <button type="button" class="btn btn-primary " style="float: right; margin-right:1%"
                                onclick="myPrint('myfrm')" value="print">Cetak</button> --}}
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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span style="font-size: 16px; margin-bottom:0; text-align: justify; text-justify: inter-word"><b>
                                        Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya adalah tepat,
                                        benar, lengkap dan selaras dengan rekod harian.
                                    </b></span>
                                    <br>
                                    <br>
                                    <p>
                                        Anda pasti mahu menghantar penyata ini?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Ya</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // nama pegawai
            field = document.getElementById("e_npg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_npg').css('border-color', 'red');
                document.getElementById('err_npg').style.display = "block";
            }

            // jawatan pegawai
            field = document.getElementById("e_jpg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_jpg').css('border-color', 'red');
                document.getElementById('err_jpg').style.display = "block";
            }

            // no tel
            field = document.getElementById("e_notel");
            if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                $('#e_notel').css('border-color', 'red');
                document.getElementById('err_notel').style.display = "block";
            } else if (field.value.length > 13 || field.value.length < 10) {
                console.log(field.value.length);
                error += "Name must be 2-4 characters\r\n";
                $('#e_notel').css('border-color', 'red');
                document.getElementById('err_notel2').style.display = "block";
                document.getElementById('err_notel').style.display = "none";
            }
            else {
                $('#e_notel').css('border-color', '');
                document.getElementById('err_notel').style.display = "none";
                document.getElementById('err_notel2').style.display = "none";
            }

            // (B4) RESULT
            if (error == "") {
                $('#next').modal('show');
                return true;
            } else {
                // $('#next').modal('hide');
                toastr.error(
                    'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                    'Ralat!', {
                        "progressBar": true
                    })
                return false;
            }

            // if (error == "") {
            //     return true;
            // } else {
            //     toastr.error(
            //         'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
            //         'Ralat!', {
            //             "progressBar": true
            //         })
            //     return false;
            // }
        }
    </script>
<script>
function valid_npg() {

if ($('#e_npg').val() == '') {
    $('#e_npg').css('border-color', 'red');
    document.getElementById('err_npg').style.display = "block";


} else {
    $('#e_npg').css('border-color', '');
    document.getElementById('err_npg').style.display = "none";

}

}
</script>
<script>
function valid_jpg() {

if ($('#e_jpg').val() == '') {
    $('#e_jpg').css('border-color', 'red');
    document.getElementById('err_jpg').style.display = "block";


} else {
    $('#e_jpg').css('border-color', '');
    document.getElementById('err_jpg').style.display = "none";

}

}
</script>
<script>
function valid_notel(){
    var str = document.getElementById('e_notel');
                    // console.log(str.value.length);

        if ($('#e_notel').val() == '') {
            $('#e_notel').css('border-color', 'red');
            document.getElementById('err_notel').style.display = "block";
            document.getElementById('err_notel2').style.display = "none";


        } else if (str.value.length > 13 || str.value.length < 10) {
            $('#e_notel').css('border-color', 'red');
            document.getElementById('err_notel2').style.display = "block";
            document.getElementById('err_notel').style.display = "none";
        }
        else {
            $('#e_notel').css('border-color', '');
            document.getElementById('err_notel').style.display = "none";
            document.getElementById('err_notel2').style.display = "none";

        }

}
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
    <script>
        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>

<script>
    $(document).ready(function() {
        swal("Perhatian!",
            "Sila semak semua butiran di bawah dan pastikan maklumat yang diberikan adalah tepat, benar dan lengkap selaras dengan rekod harian. Lengkapkan maklumat pegawai melapor dan no. telefon kilang dan tekan butang Hantar."
            );
    });
</script>

    </body>

    </html>
@endsection
