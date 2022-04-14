@extends($layout)

@section('content')

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative"  data-aos-delay="100">

        {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
        {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

        <div class=" mt-5  row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}"
                                                        style="color: rgb(64, 69, 68) !important;"
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

                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:2%">Panduan Penyelenggaraan</h3>
                                    <h5 style="color: rgb(39, 80, 71); margin-bottom:2%">Panduan Menyelenggara Web e-Kilang</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>

                                                <section class="section">
                                                    <div class="card" >
                                                        {{-- <div class="card-header">
                                                            Simple Datatable
                                                        </div> --}}

                                                        <table class='table table-striped' id="table1" >
                                                            <thead>

                                                                <tr>
                                                                    <th>Proses</th>
                                                                    <th>Maklumat<br>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp1
                                                                    </td>
                                                                    <td >
                                                                        <b>Daftar Maklumat Pelesen - Maklumat Asas Pelesen<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Masukkan Kod Pegawai MPOB yang bertanggungjawab menjaga pelesen baru
                                                                                yang hendak dimasukkan. Kod ini hendaklah 2 character sahaja. Contoh : DD</li>
                                                                                <li>Masukkan No Batch yang unik dan berturutan bagi pelesen baru ini. No
                                                                                Batch ini akan digunakan sebagai key untuk data yang dipindahkan ke sistem
                                                                                di Sybase. No Batch ini hendaklah number yang bersaiz 4 character dengan
                                                                                format seperti berikut 0001 atau 0023 iaitu mempunyai number 0
                                                                                dihadapannya bagi memenuhi saiz 4 character.</li>
                                                                                <li>Masukkan nombor lesen bagi pelesen baru. No lesen ini hendaklah 12
                                                                                character dengan format seperti 009029384823 tanpa character '-' antaranya.</li>
                                                                                <li>Masukkan nama premis.</li>
                                                                                <li>Masukkan alamat premis.</li>
                                                                                <li>Masukkan alamat surat menyurat.</li>
                                                                                <li>Masukkan no telefon.</li>
                                                                                <li>Masukkan no faks.</li>
                                                                                <li>Masukkan alamat e-mail bagi pelesen. Alamat e-mail ini akan digunakan
                                                                                bagi menghantar e-mail kepada pelesen untuk tujuan peringatan atau
                                                                                sebarang pertanyaan.</li>
                                                                                <li>Masukkan nama pegawai melapor. Pegawai ini adalah orang yang
                                                                                bertanggunjawab menghantar penyata bulanan setiap bulan.</li>
                                                                                <li>Masukkan nama jawatan pegawai melapor.</li>
                                                                                <li>Setelah semua maklumat di atas telah dimasukkan, tekan butang &quot;Simpan&quot;
                                                                                untuk menyimpan maklumat.</li>
                                                                                <li>Sekiranya maklumat nombor lesen<br>
                                                                                i.&nbsp;&nbsp;&nbsp; belum ada di dalam database, maklumat pelesen akan
                                                                                disimpan dan mesej &quot;Maklumat Pelesen Telah Ditambah&quot; akan&nbsp;&nbsp;&nbsp;
                                                                                dipaparkan di atas skrin.<br>
                                                                                ii.&nbsp;&nbsp; sudah ada di dalam database, maklumat pelesen akan
                                                                                dipaparkan di skrin dan mesej &quot;Maklumat Pelesen Sudah Sedia Ada&quot; akan
                                                                                dipaparkan di atas skrin. Pergi ke langkah &quot;Kemaskini Maklumat Pelesen &quot;
                                                                                untuk proses kemaskini maklumat pelesen.<br>
                                                                                iii.&nbsp;&nbsp; tidak dapat dimasukkan, maklumat pelesen tidak disimpan
                                                                                kerana ada masalah kemasukan data ke dalam database dan mesej &quot;Maklumat
                                                                                Pelesen Tidak Dapat Ditambah&quot; akan dipaparkan di atas skrin. </li>
                                                                            </ol>
                                                                            <b>Daftar Maklumat Pelesen - Senarai Pelesen<br>
                                                                                &nbsp;</b><br>
                                                                                <ol type="a">
                                                                                    <li>Senarai ini memaparkan semua pelesen yang telah didaftarkan ke dalam
                                                                                        database. Senarai ini juga mempunyai pelesen-pelesen yang telah
                                                                                        didaftarkan tetapi tidak menghantar penyata bulanan. Maklumat yang
                                                                                        dipaparkan adalah nombor lesen, nama pelesen, alamat e-mail dan nombor
                                                                                        telefon.</li>
                                                                                        <li>Nombor lesen mempunyai hyper-link yang mana jika mouse pointer
                                                                                        diarahkan kepadanya akan memaparkan skrin maklumat pelesen di atas
                                                                                        bersama-sama maklumat pelesen. Pergi ke langkah &quot;Kemaskini Maklumat
                                                                                        Pelesen &quot; untuk proses kemaskini maklumat pelesen.</li>
                                                                                </ol>

                                                                            <b>Daftar Maklumat Pelesen - Kemaskini Maklumat <br>
                                                                            &nbsp;</b><br>
                                                                                <ol type="a">
                                                                                    <li>Skrin ini akan dipaparkan apabila maklumat pelesen yang sedia ada cuba
                                                                                        simpan di skrin Maklumat Asas Pelesen atau setelah tekan hyper-link
                                                                                        daripada Senarai Pelesen.</li>
                                                                                        <li>Kemaskini sebarang pindaan yang diperlukan jika ada.</li>
                                                                                        <li>Tekan butang &quot;Simpan&quot; untuk mengemaskini maklumat di dalam database.
                                                                                        Sekiranya<br>
                                                                                        i.&nbsp;&nbsp;&nbsp; maklumat pelesen dapat dikemaskini, mesej &quot;Maklumat
                                                                                        Pelesen Telah Dikemaskini&quot; akan&nbsp;&nbsp;&nbsp; dipaparkan di atas skrin.<br>
                                                                                        ii.&nbsp;&nbsp; maklumat pelesen tidak dikemaskini kerana ada masalah
                                                                                        kemasukan data ke dalam database, mesej &quot;Maklumat Pelesen Tidak Dapat
                                                                                        Dikemaskini&quot; akan dipaparkan di atas skrin. </li>
                                                                                  </ol>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp2
                                                                    </td>
                                                                    <td >
                                                                        <b>Tukar Password Pelesen<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Masukkan nombor pelesen yang hendak ditukarkan passwordnya.</li>
                                                                                <li>Masukkan password baru. Password ini hendaklah 8 character dan boleh
                                                                                dicampurkan huruf dan nombor. Jika password yang dimasukkan tidak
                                                                                mencukupi 8 character, mesej &quot;Password baru mesti 8 characters. Cuba lagi.&quot;
                                                                                akan dipaparkan di skrin.</li>
                                                                                <li>Masukkan password baru sekali lagi bagi memastikan password yang
                                                                                dimasukkan adalah betul. Jika password kedua-dua password tidak sama mesej
                                                                                &quot;Password yang dimasukkan tidak sama&quot; akan dipaparkan di skrin.</li>
                                                                                <li>Tekan simpan untuk menyimpan password baru ini. Jika maklumat tidak
                                                                                dapat disimpan, mesej &quot;Password tidak dapat ditukar&quot; akan dipaparkan di
                                                                                skrin.</li>
                                                                              </ol>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp3
                                                                    </td>
                                                                    <td >
                                                                        <b>Initialization Penyata Bulanan<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Masukkan tahun bagi penyata baru.</li>
                                                                                <li>Masukkan bulan bagi penyata baru.</li>
                                                                                <li>Masukkan tarikh akhir submit bagi semua penyata.</li>
                                                                                <li>Masukkan no lesen bagi mencipta penyata baru untuk satu pelesen sahaja.</li>
                                                                                <li>Tekan &quot;Initialize Semua&quot; untuk mencipta penyata baru bagi semua
                                                                                pelesen.</li>
                                                                                <li>Tekan &quot;Initialize Satu Pelesen&quot; untuk mencipta penyata baru bagi satu
                                                                                pelesen sahaja.</li>
                                                                              </ol>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp4
                                                                    </td>
                                                                    <td >
                                                                        <b>Porting Penyata Bulanan<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Masukkan user id dan password.</li>
                                                                                <li>Tekan butang &quot;Porting&quot; untuk memindahkan data maklumat penyata yang
                                                                                telah disubmit daripada database MySQL ke database Sybase.</li>
                                                                              </ol>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp5
                                                                    </td>
                                                                    <td >
                                                                        <b>Senarai Penyata Belum Dihantar<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Memaparkan maklumat penyata yang belum disubmit iaitu no lesen, nama
                                                                                    premis, no telefon dan e-mail pelesen.</li>
                                                                                    <li>Pilih nombor lesen yang diperlukan bagi menghantar e-mail peringatan.
                                                                                    Tekan butang &quot;E-mail Peringatan&quot; untuk menghantar e-mail.</li>
                                                                            </ol>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp6
                                                                    </td>
                                                                    <td >
                                                                        <b>Senarai Penyata Untuk Paparan dan Cetakan<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Memaparkan maklumat penyata bulanan terkini yang telah disubmit atau
                                                                                diporting seperti nombor lesen, nama premis, kod pegawai, no siri dan
                                                                                tarikh hantar.</li>
                                                                                <li>Pilih penyata yang hendak dipaparkan dan tekan butang &quot;Papar&quot;. Tekan
                                                                                butang &quot;Papar Semua&quot; bagi memaparkan semua penyata yang ada di dalam
                                                                                senarai.</li>
                                                                            </ol>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp7
                                                                    </td>
                                                                    <td >
                                                                        <b>Senarai Penyata Terkini<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Memaparkan maklumat penyata bulanan terkini iaitu nombor lesen, nama
                                                                                premis, kod pegawai, no siri, status borang iaitu samada masih belum
                                                                                submit, submit atau porting dan tarikh hantar.</li>
                                                                              </ol>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp8
                                                                    </td>
                                                                    <td >
                                                                        <b>Porting Maklumat Produk Sawit<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Masukkan user id dan password.</li>
                                                                                <li>Tekan butang &quot;Porting&quot; untuk memindahkan data maklumat produk sawit
                                                                                daripada database Sybase ke database MySQL.</li>
                                                                            </ol>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        Proses&nbsp9
                                                                    </td>
                                                                    <td >
                                                                        <b>Porting Maklumat Negara<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Masukkan user id dan password. </li>
                                                                                <li>Tekan butang &quot;Porting&quot; untuk memindahkan data maklumat negara daripada
                                                                                database Sybase ke database MySQL.</li>
                                                                            </ol>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 20px">
                                                                        E-mail<br>Pelesen
                                                                    </td>
                                                                    <td >
                                                                        <b>Porting Maklumat Negara<br>
                                                                            &nbsp;</b><br>
                                                                            <ol type="a">
                                                                                <li>Masukkan nombor lesen bagi pelesen yang hendak di hantar e-mail.</li>
                                                                                <li>Masukkan alamat user yang menghantar e-mail. Alamat ini akan digunakan
                                                                                oleh pelesen untuk membalas e-mail yang dihantar.</li>
                                                                                <li>Masukkan tajuk bagi e-mail ini. Tajuk ini akan dicantum dengan
                                                                                maklumat pelesen iaitu nombor lesen dan nama premis beserta maklumat
                                                                                penyata terkini iaitu tahun dan bulan.</li>
                                                                                <li>Masukkan kandungan bagi e-mail ini.</li>
                                                                                <li>Tekan butang &quot;Hantar&quot; untuk menghantar e-mail kepada pelesen. Alamat
                                                                                e-mail pelesen akan dicapai daripada data maklumat pelesen. Jika alamat
                                                                                e-mail pelesen tidak di isi, mesej &quot;Maklumat e-mail tidak dimasukkan&quot; akan
                                                                                dipaparkan di skrin. Jika e-mail berjaya dihantar, mesej &quot;E-mail telah
                                                                                dihantar&quot; akan dipaparkan di skrin.</li>
                                                                            </ol>
                                                                    </td>

                                                                </tr>
                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </section>


{{--
                                                    <div class="text-left col-md-8">
                                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                         data-bs-target="#exampleModalCenter">Tambah</button>

                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">Cetak</button>

                                                    </div> --}}

                                            <div class="row" style=" float:right">

                                                <div class="col-md-12">


                                                    <!-- Vertically Centered modal Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                        PENGESAHAN</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Anda pasti mahu menyimpan maklumat ini?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Ya</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>








                                    </form>

                                </div>
                            </div>
                        </div>






                    </div>
                </div>





    </section><!-- End Hero -->





    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}



    {{-- </body>

    </html> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


@endsection
