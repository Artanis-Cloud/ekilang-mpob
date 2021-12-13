@extends('layouts.main')

@section('content')
    {{-- <div style="background-color: rgba(89, 194, 154, 0.801)">
    <div class="mt-2">
    <tr>
        <td>
            <span> hi</span>
            <br>

        </td>
    </tr>
    </div>
</div> --}}
    {{-- <br> --}}
    {{-- <div style="background-color:rgba(89, 194, 154, 0.801); border:1px solid rgb(187, 173, 173); ">
        <br>
        <img src="../../theme/images/icon_alert.gif" style="margin-left:5%; float:left; margin-top:10px ">
        <div class="my-2" style="margin-left:10%; margin-right:10%">

            <span style="color: red"><b> PERINGATAN :</b></span><span> Pihak tuan/puan dikehendaki melapor maklumat mingguan
                <span style="color: red"><b>(PENYATA
                        MINGGUAN)</b></span><span> melalui sistem ekilang sebelum pukul 12.00 malam pada hari pertama setiap
                    minggu <span style="color: red"><b>(ISNIN). </b></span><span></span>
        </div>
        <br>
    </div> --}}


    <div class="main-content container-fluid">
        <div class="page-title">
            <h4 style="color: rgba(47, 112, 88, 0.823); font-family:verdana; font-size:20px">Menu Penyelenggaraan Penyata
                Bulanan</h4>
            {{-- <p class="text-subtitle text-muted">Senarai Borang Kemasukan Maklumat</p> --}}
        </div>
        <br>
        <section class="section">
            <div class="mb-2 row" style="display: flex;
                                                            justify-content: center;
                                                            flex-direction: row;">
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">

                        {{-- <div class="p-0 card-body" style="background-color: rgba(89, 194, 154, 0.801)"> --}}
                        <div class="p-0 card-body"
                            style="background-image: url({{ asset('theme/images/background/buah-sawit.jpg') }}); background-size:cover">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kilang Buah</h3>
                                    {{-- <br>
                                    <p style="color: white"> PENYATA BULANAN KILANG BUAH - MPOB (EL) MF 4</p> --}}
                                    <div class="card-right d-flex align-items-center">
                                        {{-- <p>$50 </p> --}}
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas1" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">
                        <div class="p-0 card-body"
                            style="background-image: url({{ asset('theme/images/background/penapissawit.png') }}); background-size:cover">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kilang Penapis</h3>
                                    <div class="card-right d-flex align-items-center">
                                        {{-- <p>$532,2 </p> --}}
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas2" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">
                        <div class="p-0 card-body"
                            style="background-image: url({{ asset('theme/images/background/isirung-sawit.jpg') }}); background-size:cover">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kilang Isirung</h3>
                                    <div class="card-right d-flex align-items-center">
                                        {{-- <p>1,544 </p> --}}
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas3" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">
                        <div class="p-0 card-body"
                            style="background-image: url({{ asset('theme/images/background/oleokimia.jpg') }}); background-size:cover">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Kilang Oleokimia</h3>
                                    <div class="card-right d-flex align-items-center">
                                        {{-- <p>423 </p> --}}
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card card-statistic">
                        <div class="p-0 card-body"
                            style="background-image: url({{ asset('theme/images/background/pusat-simpanan.png') }}); background-size:cover">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Pusat Simpanan</h3>
                                    <div class="card-right d-flex align-items-center">
                                        {{-- <p>423 </p> --}}
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4" style="align-items: center">
                    <div class="card card-statistic">
                        <div class="p-0 card-body"
                            style="background-image: url({{ asset('theme/images/background/biodiesel.jpg') }}); background-size:cover">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>E-Biodiesel</h3>
                                    <div class="card-right d-flex align-items-center">
                                        {{-- <p>423 </p> --}}
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="p-0 card-body"
                            style="background-image: url({{ asset('theme/images/background/mutu-minyak.jpg') }}); background-size:cover">
                            <div class="d-flex flex-column">
                                <div class='px-1 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>MPOB (EL) MF 4A - QC/MF/1</h3>
                                    <div class="card-right d-flex align-items-center">
                                        {{-- <p>423 </p> --}}
                {{-- </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
    </div>
    <div style=" margin-left:10%; margin-right:10%;
          ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom" style="background-color: rgba(47, 112, 88, 0.823)">
                    <h4 class='p-1 pl-3 card-heading' style="color: white; text-align:center"><b>Disclaimer</b></h4>
                </div>
                <br>
                <br>
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-md-4 col-12"> --}}
                        <div class="pl-3">


                                <p style="text-align: justify; margin-left:3%; margin-right:3%; font-size:13px"> Kerajaan Malaysia dan Lembaga Minyak Sawit Malaysia (MPOB)
                                    adalah tidak bertanggungjawab bagi apa-apa kehilangan atau kerugian yang disebabkan oleh
                                    penggunaan mana-mana maklumat yang diperolehi dari laman web ini. Syarikat-syarikat yang
                                    dirujuk di dalam laman web ini tidak boleh ditafsirkan sebagai ejen kepada, ataupun
                                    syarikat yang disyorkan oleh Lembaga Minyak Sawit Malaysia (MPOB). </p>







                                    {{-- <h1 class='mt-5'>$21,102</h1>
                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart" width="15"></i>
                                        +19%</span> than last month</p>
                                <div class="legends">
                                    <div class="flex-row legend d-flex align-items-center">
                                        <div class='w-3 h-3 rounded-full bg-info me-2'></div><span class='text-xs'>Last
                                            Month</span>
                                    </div>
                                    <div class="flex-row legend d-flex align-items-center">
                                        <div class='w-3 h-3 rounded-full bg-blue me-2'></div><span class='text-xs'>Current
                                            Month</span>
                                    </div>
                                </div> --}}
                                <br>
                        </div>
                        {{-- </div> --}}
                        {{-- <div class="col-md-8 col-12">
                            <canvas id="bar"></canvas>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Sebarang Pertanyaan Sila Hubungi:</h4>
                    <div class="d-flex ">
                        {{-- <i data-feather="download"></i> --}}
            {{-- </div>
                </div> --}}
            {{-- <div class="px-0 pb-0 card-body">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Bahagian</th>
                                    <th>Nama</th>
                                    <th>No. Telefon</th>
                                    <th>Emel</th>
                                    {{-- <th>Status</th> --}}
            {{-- </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Penyata Bulanan Kilang Buah - MPOB (EL) MF4</td>
                                    <td>Pn. Nor Syaida</td>
                                    <td>03-7802 2917</td>
                                    <td>nor.syaida@mpob.gov.my</td> --}}
            {{-- <td>
                                        <span class="badge bg-success">Active</span>
                                    </td> --}}
            {{-- </tr>
                                <tr>
                                    <td>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</td>
                                    <td>En. Rominizam</td>
                                    <td>03-7802 2918</td>
                                    <td>rominizam@mpob.gov.my</td> --}}
            {{-- <td>
                                        <span class="badge bg-success">Active</span>
                                    </td> --}}
            {{-- </tr>
                                <tr>
                                    <td>Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</td>
                                    <td>Pn. Aziana</td>
                                    <td>03-7802 2955</td>
                                    <td>aziana.misnan@mpob.gov.my</td> --}}
            {{-- <td>
                                        <span class="badge bg-danger">Inactive</span>
                                    </td> --}}
            {{-- </tr>
                                <tr>
                                    <td>Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</td>
                                    <td>Pn. Aziana</td>
                                    <td>03-7802 2955</td>
                                    <td>aziana.misnan@mpob.gov.my</td> --}}
            {{-- <td>
                                        <span class="badge bg-success">Active</span>
                                    </td> --}}
            {{-- </tr>
                                <tr>
                                    <td>Penyata Bulanan Kilang Isirong - MPOB (EL) CF4 </td>
                                    <td>Pn. Nor Baayah</td>
                                    <td>03-7802 2865</td>
                                    <td>abby@mpob.gov.my</td> --}}
            {{-- <td>
                                        <span class="badge bg-success">Active</span>
                                    </td> --}}
            {{-- </tr>
                                <tr>
                                    <td>Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</td>
                                    <td>Pn. Nor Baayah</td>
                                    <td>03-7802 2865</td>
                                    <td>abby@mpob.gov.my</td> --}}
            {{-- <td>
                                        <span class="badge bg-success">Active</span>
                                    </td> --}}
            {{-- </tr>
                                <tr>
                                    <td>No Faks bagi Penyata Bulanan </td>
                                    <td>-</td>
                                    <td>03-7803 2323 / <br> 03-7803 1399</td>
                                    <td>-</td> --}}
            {{-- <td>
                                        <span class="badge bg-success">Active</span>
                                    </td> --}}
            {{-- </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            {{-- </div> --}}



            {{-- <div class="col-md-4">
                <div class="card ">
                    <div class="card-header border-bottom " style="background-color: rgba(47, 112, 88, 0.823)">
                        <h4 style="color: white"><b>Peringatan</b></h4>
                    </div>
                    <br>
                    <br>
                    <div class="card-body">
                        <div id="radialBars"></div>
                        <div class="mb-5 text-center">
                            <h6 style="color:rgba(47, 112, 88, 0.823); text-align:left; text-align: justify; font-size:16px;
                                                    text-justify: inter-word;">Adalah menjadi kesalahan dibawah
                                syarat-syarat
                                dan
                                sekatan
                                lesen
                                yang terkandung di bawah
                                Peraturan 21(1), Peraturan-peraturan Lembaga Minyak Sawit Malaysia(Pelesenan) 2005, jika
                                gagal/lewat menyerahkan Penyata Bulanan tidak lewat dari 7hb. bagi bulan berikutnya dan
                                apabila
                                disabitkan boleh dikenakan denda.</h6>
                            {{-- <h1 class='text-green'>+$2,134</h1> --}}
            {{-- </div>
                    </div>
                </div>
                <div class="card widget-todo">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center"
                        style="background-color: rgba(47, 112, 88, 0.823)">
                        <h4 class="card-title d-flex">
                            <i class='bx bx-check font-medium-5 pl-25 pr-75'></i><b style="color: white">Penafian
                            </b>
                        </h4>

                    </div> --}}
            {{-- <br>
                    <br>
                    <div class="card-body">
                        <div id="radialBars"></div>
                        <div class="mb-5 text-center">
                            <h6 style="color:rgba(47, 112, 88, 0.823); text-align:left; text-align: justify; font-size:16px;
                                                    text-justify: inter-word;">Kerajaan Malaysia dan Lembaga Minyak Sawit
                                Malaysia
                                (MPOB)
                                adalah
                                tidak bertanggungjawab bagi apa-apa kehilangan atau kerugian yang disebabkan oleh penggunaan
                                mana-mana maklumat yang diperolehi dari laman web ini .Syarikat-syarikat yang dirujuk di
                                dalam
                                laman web ini tidak boleh ditafsirkan sebagai ejen kepada, ataupun syarikat yang disyorkan
                                oleh
                                Lembaga Minyak Sawit Malaysia (MPOB).</h6>
                            {{-- <h1 class='text-green'>+$2,134</h1> --}}
            {{-- </div>
                    </div> --}}






            {{-- <div class="px-0 py-1 card-body">
                    <table class='table table-borderless'>
                        <tr>
                            <td class='col-3'>UI Design</td>
                            <td class='col-6'>
                                <div class="progress progress-info">
                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class='text-center col-3'>60%</td>
                        </tr>
                        <tr>
                            <td class='col-3'>VueJS</td>
                            <td class='col-6'>
                                <div class="progress progress-success">
                                    <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class='text-center col-3'>30%</td>
                        </tr>
                        <tr>
                            <td class='col-3'>Laravel</td>
                            <td class='col-6'>
                                <div class="progress progress-danger">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class='text-center col-3'>50%</td>
                        </tr>
                        <tr>
                            <td class='col-3'>ReactJS</td>
                            <td class='col-6'>
                                <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class='text-center col-3'>80%</td>
                        </tr>
                        <tr>
                            <td class='col-3'>Go</td>
                            <td class='col-6'>
                                <div class="progress progress-secondary">
                                    <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td class='text-center col-3'>65%</td>
                        </tr>
                    </table>
                </div> --}}
        </div>
    </div>
    </div>
    </section>
    </div>





@endsection
