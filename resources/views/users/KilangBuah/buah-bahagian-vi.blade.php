@extends($layout)

@section('content')

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title> Kilang Buah</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('theme/images/favicon.png') }}" rel="image/x-icon">
        <link href="{{ asset('theme/kilangstyles/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('theme/kilangstyles/vendor/aos/aos.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/bootstrap/css/bootstrap.min.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/boxicons/css/boxicons.min.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/glightbox/css/glightbox.min.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/remixicon/remixicon.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/swiper/swiper-bundle.min.css') }}" rel=" stylesheet">

        {{-- <link href="{{ asset('theme/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" /> --}}







        <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ asset('theme/vendors/chartjs/Chart.min.css') }}">

        <link rel="stylesheet" href="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src='https://kit.fontawesome.com/82f28bb8e5.js' crossorigin='anonymous'></script>

        <link href="{{ asset('theme/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/libs/jquery-steps/steps.css') }}" rel="stylesheet" />



        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
            rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <meta charset=utf-8 />

        <!-- Template Main CSS File -->
        <link href="{{ asset('theme/kilangstyles/css/style.css') }}"" rel=" stylesheet">

        <!-- datepicker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>



        <!-- =======================================================
                                                                                                                      * Template Name: OnePage - v4.7.0
                                                                                                                      * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
                                                                                                                      * Author: BootstrapMade.com
                                                                                                                      * License: https://bootstrapmade.com/license/
                                                                                                                      ======================================================== -->
    </head>


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-5 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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

                                    <div class="mb-5 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian VI</h3>
                                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Eksport Produk Sawit
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <div class="container center mt-5">
                                        <div class="row" style="margin-bottom:2%;">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nama Produk</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect">
                                                        <option selected hidden disabled>Sila Pilih Produk</option>
                                                        <option value="15">BPL - 15
                                                        </option>
                                                        <option value="13">BPO - 13
                                                        </option>
                                                        <option value="14">BPS - 14
                                                        </option>
                                                        <option value="47">CO - 47
                                                        </option>
                                                        <option value="03">CPL - 03
                                                        </option>
                                                        <option value="01">CPO - 01
                                                        </option>
                                                        <option value="02">CPS - 02
                                                        </option>
                                                        <option value="V7">DFPL - V7
                                                        </option>
                                                        <option value="Z9">DFRBDPL - Z9
                                                        </option>
                                                        <option value="CZ">DFRDBPS - CZ
                                                        </option>
                                                        <option value="85">DPL - 85
                                                        </option>
                                                        <option value="84">DPO - 84
                                                        </option>
                                                        <option value="DS">DPST - DS
                                                        </option>
                                                        <option value="JH">DR RBDPL - JH
                                                        </option>
                                                        <option value="F6">DRBDPO - F6
                                                        </option>
                                                        <option value="D7">HCBST - D7
                                                        </option>
                                                        <option value="H0">HDFPL - H0
                                                        </option>
                                                        <option value="B3">HFFAPO - B3
                                                        </option>
                                                        <option value="Y7">HNPL - Y7
                                                        </option>
                                                        <option value="87">HPFAD - 87
                                                        </option>
                                                        <option value="C3">HPL - C3
                                                        </option>
                                                        <option value="Y9">HPMF - Y9
                                                        </option>
                                                        <option value="55">HPO - 55
                                                        </option>
                                                        <option value="H7">HPPS - H7
                                                        </option>
                                                        <option value="B9">HPS - B9
                                                        </option>
                                                        <option value="W1">HRBDDFL - W1
                                                        </option>
                                                        <option value="A3">HRBDPL - A3
                                                        </option>
                                                        <option value="H2">HRBDPO - H2
                                                        </option>
                                                        <option value="B6">HRBDSF - B6
                                                        </option>
                                                        <option value="B8">HRBDST - B8
                                                        </option>
                                                        <option value="Z3">IMPF - Z3
                                                        </option>
                                                        <option value="Z2">IMVO - Z2
                                                        </option>
                                                        <option value="X8">INTER PL - X8
                                                        </option>
                                                        <option value="Z6">INTER PO - Z6
                                                        </option>
                                                        <option value="DK">INTERPST - DK
                                                        </option>
                                                        <option value="Z4">JGQ RBDPO - Z4
                                                        </option>
                                                        <option value="KB">MVORBDPLMB - KB
                                                        </option>
                                                        <option value="GV">MVO_PMF - GV
                                                        </option>
                                                        <option value="Y0">MVO_RBDPL - Y0
                                                        </option>
                                                        <option value="X9">MVO_RBDPO - X9
                                                        </option>
                                                        <option value="BO">MVO_RBDPS - BO
                                                        </option>
                                                        <option value="GA">NBDDFPL - GA
                                                        </option>
                                                        <option value="Y6">NBDHPL - Y6
                                                        </option>
                                                        <option value="W3">NBDHPO - W3
                                                        </option>
                                                        <option value="W5">NBDHPS - W5
                                                        </option>
                                                        <option value="28">NBDPL - 28
                                                        </option>
                                                        <option value="JW">NBDPLRS - JW
                                                        </option>
                                                        <option value="HM">NBDPMF - HM
                                                        </option>
                                                        <option value="24">NBDPO3 - 24
                                                        </option>
                                                        <option value="22">NBDPO6 - 22
                                                        </option>
                                                        <option value="26">NBDPS - 26
                                                        </option>
                                                        <option value="W7">NBHPL - W7
                                                        </option>
                                                        <option value="Y8">NBHPL - Y8
                                                        </option>
                                                        <option value="W6">NBHPO - W6
                                                        </option>
                                                        <option value="W8">NBHPS - W8
                                                        </option>
                                                        <option value="H6">NBIF - H6
                                                        </option>
                                                        <option value="K0">NBIOL - K0
                                                        </option>
                                                        <option value="L0">NBIS - L0
                                                        </option>
                                                        <option value="20">NBPL - 20
                                                        </option>
                                                        <option value="16">NBPO - 16
                                                        </option>
                                                        <option value="18">NBPS - 18
                                                        </option>
                                                        <option value="G9">NO - G9
                                                        </option>
                                                        <option value="11">NPL - 11
                                                        </option>
                                                        <option value="07">NPO - 07
                                                        </option>
                                                        <option value="09">NPS - 09
                                                        </option>
                                                        <option value="34">PAO - 34
                                                        </option>
                                                        <option value="35">PFAD - 35
                                                        </option>
                                                        <option value="DF">PFAME - DF
                                                        </option>
                                                        <option value="33">PKC - 33
                                                        </option>
                                                        <option value="B1">PKE - B1
                                                        </option>
                                                        <option value="B2">PKP - B2
                                                        </option>
                                                        <option value="45">PMF - 45
                                                        </option>
                                                        <option value="DI">PRLFAT - DI
                                                        </option>
                                                        <option value="AD">RBD SL - AD
                                                        </option>
                                                        <option value="D0">RBDBO - D0
                                                        </option>
                                                        <option value="V9">RBDHPL - V9
                                                        </option>
                                                        <option value="W2">RBDHPMF - W2
                                                        </option>
                                                        <option value="B0">RBDHPMF - B0
                                                        </option>
                                                        <option value="V8">RBDHPO - V8
                                                        </option>
                                                        <option value="W0">RBDHPS - W0
                                                        </option>
                                                        <option value="29">RBDPL - 29
                                                        </option>
                                                        <option value="25">RBDPO3 - 25
                                                        </option>
                                                        <option value="23">RBDPO6 - 23
                                                        </option>
                                                        <option value="27">RBDPS - 27
                                                        </option>
                                                        <option value="AL">RBDPSH - AL
                                                        </option>
                                                        <option value="21">RBPL - 21
                                                        </option>
                                                        <option value="17">RBPO - 17
                                                        </option>
                                                        <option value="19">RBPS - 19
                                                        </option>
                                                        <option value="Z5">RED PSL - Z5
                                                        </option>
                                                        <option value="DJ">REDPO - DJ
                                                        </option>
                                                        <option value="T1">RHPS - T1
                                                        </option>
                                                        <option value="12">RPL - 12
                                                        </option>
                                                        <option value="08">RPO - 08
                                                        </option>
                                                        <option value="10">RPS - 10
                                                        </option>
                                                        <option value="G6">SBO - G6
                                                        </option>
                                                        <option value="H1">SL - H1
                                                        </option>
                                                        <option value="EO">TFPS - EO
                                                        </option>
                                                        <option value="61">US - 61
                                                        </option>
                                                        <option value="AK">VCO - AK
                                                        </option>
                                                        <option value="AN">VO - AN
                                                        </option>
                                                        <option value="AM">VPL - AM
                                                        </option>
                                                        <option value="DR">VPO - DR
                                                        </option>
                                                        <option value="51"> Palm Kernel-51 </option>
                                                    </select>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nombor Borang Kastam 2</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='nombor_borang_kastam'
                                                    id="nombor_borang_kastam" required title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Tarikh Eksport (dd-mm-yyyy)</label>
                                            <div class="col-md-6">
                                                <input type="text" id="datepicker" class="form-control"
                                                    name='tarikh_eksport' id="tarikh_ekport" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Kuantiti (Tan Metrik)</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='kuantiti' id="kuantiti"
                                                    onkeypress="return isNumberKey(event)" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nilai (RM)</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='nilai' id="nilai"
                                                    onkeypress="return isNumberKey(event)" required
                                                    title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Destinasi Negara</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='destinasi_negara'
                                                    id="destinasi_negara" required title="Sila isikan butiran ini.">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row form-group" style="padding-top: 10px; ">



                                        <div class="text-right col-md-11 mb-4 ">
                                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                                style="float: right" data-target="#confirmation">
                                                Simpan</button>
                                        </div>

                                    </div>


                                    <br>
                                    <br>
                                    <hr>
                                    <br>
                                    <br>

                                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Eksport Produk Sawit</h5>
                                    <br>
                                    <br>



                                    <section class="section">
                                        <div class="card">
                                            {{-- <div class="card-header">
                                                Simple Datatable
                                            </div> --}}

                                                <table class='table table-striped' id="table1">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th>Nama Produk</th>
                                                            <th>Nombor Borang Kastam 2</th>
                                                            <th>Tarikh Eksport</th>
                                                            <th>Kuantiti <br>(Tan Metrik)</th>
                                                            <th>Nilai (RM)</th>
                                                            <th>Destinasi Negara</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>BPL</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>KKK</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                        </div>
                                    </section>


                                    {{-- <div class="main-content container-fluid">

                <section class="section">
                    <div class="card">

                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Graiden</td>
                                        <td>vehicula.aliquet@semconsequat.co.uk</td>
                                        <td>076 4820 8838</td>
                                        <td>Offenburg</td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div> --}}







                                    {{-- <section class="section">
                                        <div class="card">

                                            <div class="card-body">
                                                <table class='table table-striped' id="example">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <th>Nama Produk</th>
                                                            <th>Nombor Borang Kastam 2</th>
                                                            <th>Tarikh Eksport</th>
                                                            <th>Kuantiti <br>(Tan Metrik)</th>
                                                            <th>Nilai (RM)</th>
                                                            <th>Destinasi Negara</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>BPL</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>

<br>

                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>

                                    </section> --}}

                                </div>











                                <div class="row form-group" style="padding-top: 10px; ">


                                    <div class="text-left col-md-5">
                                        <a href="{{ route('buah.bahagianv') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>
                                    </div>
                                    <div class="text-right col-md-7 mb-4 ">
                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            style="float: right" data-bs-target="#exampleModalCenter">Simpan &
                                            Seterusnya</button>
                                    </div>

                                </div>

                                <!-- Vertically Centered modal Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                    PENGESAHAN</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
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
                                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            </form>

                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>



                <br>
                <br>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="{{ asset('theme/js/main.js') }}"></script>

    {{-- <script src="{{ asset('theme/libs/DataTables2/datatables.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}

    {{-- <script>
        $(document).ready(function() {
            var table = $('#table1').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada rekod yang tersedia",
                    "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                    "search": "Carian",
                    "previous": "Sebelum",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Seterusnya",
                        "previous": "Sebelumnya"
                    },
                },
            });
        });

        $(window).on('changed', (e) => {
            // if($('#example').DataTable().clear().destroy()){
            // $('#example').DataTable();
            // }
        });

        // document.getElementById("form_type").onchange = function() {
        //     myFunction()
        // };

        // function myFunction() {
        //     console.log('asasa');
        //     table.clear().draw();
        // }
    </script> --}}
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    </body>

    </html>

@endsection
