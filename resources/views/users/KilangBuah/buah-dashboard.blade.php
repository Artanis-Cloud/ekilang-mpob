@extends('layouts.main')

@section('content')

    <div class="page-wrapper">


        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Halaman Utama
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="mb-4 row">
                <div class="col-md-8">
                    <div class="card" style="margin-right:5%; margin-left:6%">
                        <div class="card-header" style="margin-bottom: -1%">
                            <h2 class='pl-3 card-heading'
                                style="font-size: 18px; margin-bottom:-1%; margin-left:6%; color:rgba(47, 112, 88, 0.726)">
                                Pengumuman
                            </h2>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <ul>
                                        <li style="text-align: justify">Berkuatkuasa 1 Mac 2021, <b> ses
                                                minyak
                                                sawit mentah yang
                                                perlu dibayar di bawah
                                                Perintah Lembaga Minyak Sawit Malaysia (Ses) pindaan 2021
                                                adalah
                                                sebanyak <span style="color:blue">RM16.00</span>
                                                (Ringgit Malaysia : Enam Belas Sahaja) atas tiap-tiap tan
                                                metrik
                                                atau sebahagian
                                                daripada suatu tan metrik minyak sawit mentah yang
                                                dikeluarkan.</b> Ses perlu
                                            dibayar
                                            kepada Lembaga tidak lewat dari hari terakhir setiap bulan dalam
                                            satu tahun kalendar
                                            atas minyak sawit mentah yang dikeluarkan olehnya dalam bulan
                                            yang
                                            sebelumnya.
                                            <span style="color:blue"><b>Pembayaran ses
                                                    perlu melalui akaun bank CIMB Islamik Malaysia dengan
                                                    nombor
                                                    virtual akaun
                                                    seperti
                                                    berikut :</b></span><br>
                                            <br>

                                            <div class="container" style="
                                                    border: 1px solid black;">

                                                <p class="card-text" style="text-align: justify;">
                                                    <br>
                                                    <b> Nama akaun : Lembaga Minyak Sawit Malaysia
                                                        <br>
                                                        <br>

                                                        Nombor Virtual Akaun : 98-997-333-000-XXX *
                                                        <br>(3 digit terakhir adalah sama seperti
                                                        nombor Virtual Akaun yang digunapakai bagi bayaran
                                                        Ses
                                                        sebelum ini)</b>
                                                    <br>
                                                    <br>

                                            </div>

                                            <br> Jika terdapat sebarang pertanyaan atau kemusykilan
                                            berkenaan
                                            bayaran ses, sila
                                            hubungi
                                            pegawai MPOB iaitu <b>Puan Nurul Asyikin (03-87694811)
                                                (nurul.asyikin@mpob.gov.my) atau
                                                Puan
                                                Nurul Fara Ain (03-87694697)
                                                (nurulfarain.rusdi@mpob.gov.my).</b>
                                            <br>
                                            <br>
                                            Untuk muat turun borang pembayaran ses <a href="#"><b>Klik
                                                    sini</b></a> dan Surat
                                            Makluman Cara Pembayaran Ses <a href="#"><b>Klik
                                                    sini</b></a><br>
                                        </li>
                                        <br>
                                        <li style="text-align: justify"> Penguatkuasaan Perintah Lembaga
                                            Minyak
                                            Sawit Malaysia (Ses) (Pindaan) 2021 Ke Atas
                                            Pemegang Lesen Kategori Kilang Oleokimia Kelapa Sawit (MF) dan
                                            Kilang
                                            Pelumat Oleokimia Sawit
                                            (CF). <a href="#"><b>Klik Disini</b></a>

                                        </li>
                                        <ul>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-header " style="margin-bottom:-2%">
                                <h2 class='pl-3 card-heading'
                                    style="font-size: 18px; margin-bottom:-1%; color:rgba(47, 112, 88, 0.726) ">
                                    Peringatan
                                </h2>
                            </div>
                            <hr>

                            <div class="card-body">
                                <div class=" text-center">
                                    <p style=" text-align: justify; color:black">
                                        Adalah menjadi kesalahan
                                        dibawah syarat-syarat dan sekatan
                                        lesen yang terkandung di bawah
                                        Peraturan 21(1), Peraturan-peraturan Lembaga Minyak Sawit
                                        Malaysia(Pelesenan) 2005, jika gagal/lewat
                                        menyerahkan Penyata Bulanan tidak lewat dari 7hb. bagi bulan
                                        berikutnya dan apabila
                                        disabitkan boleh dikenakan denda.</p>
                                    {{-- <h1 class='text-green'>+$2,134</h1> --}}
                                </div>

                            </div>

                        </div>

                        <div class="card" style="margin-top:20px">
                            <div class="card-header" style="margin-bottom:-2%">
                                <h2 class='pl-3 card-heading'
                                    style="font-size: 18px; margin-bottom:-1%; color:rgba(47, 112, 88, 0.726)">
                                    Penafian
                                </h2>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-center">
                                    <p style=" text-align: justify; color:black">
                                        Kerajaan Malaysia dan
                                        Lembaga Minyak Sawit
                                        Malaysia
                                        (MPOB)
                                        adalah
                                        tidak bertanggungjawab bagi apa-apa kehilangan atau kerugian yang
                                        disebabkan oleh penggunaan
                                        mana-mana maklumat yang diperolehi dari laman web ini
                                        .Syarikat-syarikat
                                        yang dirujuk di dalam
                                        laman web ini tidak boleh ditafsirkan sebagai ejen kepada, ataupun
                                        syarikat yang disyorkan oleh
                                        Lembaga Minyak Sawit Malaysia (MPOB).</p>
                                    {{-- <h1 class='text-green'>+$2,134</h1> --}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                </div>

            </div>



        </div>


    </div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
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
