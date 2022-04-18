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
                <div class="col-5 align-self-center mt-2">
                    <h4 class="page-title">PENYATA BULANAN KILANG BUAH</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                {{-- <div class="col-sm-12 col-lg-12"> --}}

                <div class="container center mt-2">
                    <div class="mb-4 row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class=" text-center">
                                    <h4 style="color: rgb(39, 80, 71); margin-top:3%">Pengumuman</h4>
                                </div>
                                <hr>

                                <div class="card-body">
                                    <div class="container center ">

                                        <div class="pl-3">

                                            <ul>
                                                <li style="text-align: justify">Berkuatkuasa 1 Mac 2021, <b> ses minyak
                                                        sawit mentah yang
                                                        perlu dibayar di bawah
                                                        Perintah Lembaga Minyak Sawit Malaysia (Ses) pindaan 2021 adalah
                                                        sebanyak <span style="color:blue">RM16.00</span>
                                                        (Ringgit Malaysia : Enam Belas Sahaja) atas tiap-tiap tan metrik
                                                        atau sebahagian
                                                        daripada suatu tan metrik minyak sawit mentah yang
                                                        dikeluarkan.</b> Ses perlu
                                                    dibayar
                                                    kepada Lembaga tidak lewat dari hari terakhir setiap bulan dalam
                                                    satu tahun kalendar
                                                    atas minyak sawit mentah yang dikeluarkan olehnya dalam bulan yang
                                                    sebelumnya.
                                                    <span style="color:blue"><b>Pembayaran ses
                                                            perlu melalui akaun bank CIMB Islamik Malaysia dengan nombor
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
                                                                nombor Virtual Akaun yang digunapakai bagi bayaran Ses
                                                                sebelum ini)</b>
                                                            <br>
                                                            <br>

                                                    </div>

                                                    <br> Jika terdapat sebarang pertanyaan atau kemusykilan berkenaan
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
                                                <li style="text-align: justify"> Penguatkuasaan Perintah Lembaga Minyak
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
                                        <div class=" text-center">
                                            <h4 style="color: rgb(39, 80, 71); margin-top:7%">Peringatan</h4>
                                        </div>
                                        <hr>

                                        <div class="card-body">
                                            <div class="container center ">

                                                <div class="pl-3">

                                                    <p style=" text-align: justify">
                                                        Adalah menjadi kesalahan
                                                        dibawah syarat-syarat dan sekatan
                                                        lesen yang terkandung di bawah
                                                        Peraturan 21(1), Peraturan-peraturan Lembaga Minyak Sawit
                                                        Malaysia(Pelesenan) 2005, jika gagal/lewat
                                                        menyerahkan Penyata Bulanan tidak lewat dari 7hb. bagi bulan
                                                        berikutnya dan apabila
                                                        disabitkan boleh dikenakan denda.</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class=" text-center">
                                            <h4 style="color: rgb(39, 80, 71); margin-top:7%">Penafian</h4>
                                        </div>
                                        <hr>

                                        <div class="card-body">
                                            <div class="container center ">

                                                <div class="pl-3">

                                                    <p style=" text-align: justify">
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>

    </div>




    </div>


    @endsection
