@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Cetak Surat</h4>
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
        <div class="card" style="margin-right:2%; margin-left:2%; margin-top:2%">

            <br>
            <div class="card-body">
                    <div class="pl-3">

                        <p align=left>04/B/437/4/13/</p>
                           <p>{{ $tarikh }}</p>
                           <p>PENGURUS<br>
                              {{ $pelesen->e_np }}<br>
                              {{ $pelesen->e_as1 }}<br>
                              {{ $pelesen->e_as2 }}<br>
                              {{ $pelesen->e_as3 }}</p>
                           <p>Tuan/Puan,</p>
                           <p><b>PENDAFTARAN PEMEGANG LESEN UNTUK AKSES KE SISTEM e-KILANG BAGI PENGHANTARAN PENYATA BULANAN</b></p>
                           <p>Perkara di atas adalah dirujuk.</p>
                           <p align=justify>
                            Sebagaimana yang telah disyaratkan, pemegang lesen MPOB hendaklah mengemukakan penyata bulanan pada tiap-tiap bulan selewat-lewatnya pada 7hb pada bulan yang berikutnya. Ini selaras dengan peruntukan Peraturan 21, Peraturan-peraturan Lembaga Minyak Sawit Malaysia (Pelesenan) 2005, Akta Lembaga Minyak Sawit Malaysia 1998 (Akta 582).</p>
                           <p align=justify>Sehubungan dengan itu, tuan/puan telah didaftarkan ke sistem tersebu dan boleh diakses melaluai pautan <a href="http://www.ekilang.com.my"><u>www.ekilang.com.my</u></a> menggunakan butir-butir seperti berikut:</p>
                           <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
                           collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                             <tr>
                               <td width="26%">No Lesen :</td>
                               <td width="74%">{{ $pelesen->e_nl }}</td>
                             </tr>
                             <tr>
                               <td width="26%">Nama Premis :</td>
                               <td width="74%">{{ $pelesen->e_np }}</td>
                             </tr>
                             <tr>
                               <td width="26%">Password :</td>
                               <td width="74%">Sila semak emel kilang anda.</td>
                             </tr>
                           </table>
                           <br>
                           <p>Sila daftar masuk ke sistem tersebut dan kemaskini maklumat asas pemegang lesen dengan segera.</p>
                           <p>Jika terdapat sebarang pertanyaan berkaitan perkara ini, tuan/puan boleh menghubungi pegawai berikut :</p>
                           <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse"
                           bordercolor="#111111" width="100%" id="AutoNumber2">
                             <tr>
                               <td width="33%">1. Aziana Misnan </td>
                               <td width="33%">03-78022955 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;aziana.misnan@mpob.gov.my</td>
                             </tr>
                             <tr>
                               <td width="33%">2. Nor Baayah Mohammed Yusop</td>
                               <td width="33%">03-78022865 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;abby@mpob.gov.my</td>
                             </tr>
                             <tr>
                               <td width="33%">3. Nor Syaida Abdul Halim</td>
                               <td width="33%">03-78022914 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nor.syaida@mpob.gov.my</td>
                             </tr>
                             <tr>
                               <td width="33%">4. Rominizam Mustapa</td>
                               <td width="33%">03-78022918 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rominizam@mpob.gov.my</td>
                             </tr>
                             <tr>
                               <td width="33%">5. Rohidayati Sukhaila</td>
                               <td width="33%">03-78022991 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rohidayati@mpob.gov.my</td>
                             </tr>
                           </table>
                        </br>
                           <p>Sekian terima kasih.</p>
                           <p>Saya yang menurut perintah,</p>
                           {{-- <p>&nbsp;</p> --}}
                           <p>NIK ABDULLAH NIK IDRIS<br>
                           b/p Ketua Pengarah MPOB</p>
                           <p>Surat ini adalah cetakan komputer. Tandatangan tidak diperlukan.</p>

                    </div>
                </div>
            </div>
        </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
     <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // alamat premis 1500403125000
            field = document.getElementById("e_npg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_npg').css('border-color', 'red');
                document.getElementById('err_npg').style.display = "block";
            }

            // alamat premis 1
            field = document.getElementById("e_jpg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_jpg').css('border-color', 'red');
                document.getElementById('err_jpg').style.display = "block";
            }

            // alamat surat-menyurat 1
            field = document.getElementById("e_notel");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_notel').css('border-color', 'red');
                document.getElementById('err_notel').style.display = "block";
            // } else if (field.value.length > 13 || field.value.length < 10) {
            //     console.log(field.value.length);
            //     error += "Name must be 2-4 characters\r\n";
            //     $('#e_notel').css('border-color', 'red');
            //     document.getElementById('err_notel2').style.display = "block";
            //     document.getElementById('err_notel').style.display = "none";
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
function valid_notel() {

    var str = document.getElementById('e_notel');
                    // console.log(str.value.length);

        if ($('#e_notel').val() == '') {
            $('#e_notel').css('border-color', 'red');
            document.getElementById('err_notel').style.display = "block";
            document.getElementById('err_notel2').style.display = "none";


        // } else if (str.value.length > 13 || str.value.length < 10) {
        //     $('#e_notel').css('border-color', 'red');
        //     document.getElementById('err_notel2').style.display = "block";
        //     document.getElementById('err_notel').style.display = "none";
        }
        else {
            $('#e_notel').css('border-color', '');
            document.getElementById('err_notel').style.display = "none";
            document.getElementById('err_notel2').style.display = "none";

        }

}
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
    <script>
        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>
    <script>
        function invokeFunc() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e_jpg').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>
    <script>
        function invokeFunc2() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e_notel').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>


    </html>
@endsection
