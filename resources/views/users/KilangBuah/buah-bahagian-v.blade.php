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

        <!-- Vendor CSS Files -->
        <link href="{{ asset('theme/kilangstyles/vendor/aos/aos.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/bootstrap/css/bootstrap.min.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/boxicons/css/boxicons.min.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/glightbox/css/glightbox.min.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/remixicon/remixicon.css') }}" rel=" stylesheet">
        <link href="{{ asset('theme/kilangstyles/vendor/swiper/swiper-bundle.min.css') }}" rel=" stylesheet">

        <link href="{{ asset('theme/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />




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
        <!-- =======================================================
                                                                                                  * Template Name: OnePage - v4.7.0
                                                                                                  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
                                                                                                  * Author: BootstrapMade.com
                                                                                                  * License: https://bootstrapmade.com/license/
                                                                                                  ======================================================== -->
    </head>


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mb-4 row">
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
                        <br>
                        <br>
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class="mb-5 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:3%">Bahagian V</h3>
                                        <h5 style="color: rgb(39, 80, 71)">Edaran / Jualan Isirung Sawit (PK) Dalam Negeri
                                            (51)
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>









                                    {{-- kadar oer meningkat --}}
                                    <div class="row" id="table-bordered">
                                        <div class="col-12 mt-5">
                                            <form wire:submit.prevent='store'>
                                                <div class="card">

                                                    <div class="card-content">


                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead style="text-align: center">
                                                                    <tr>
                                                                        <th>Pembeli / Penerima</th>
                                                                        <th>Kuantiti (Tan Metrik)</th>



                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-bold-500">1. Kilang Isirung</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15"
                                                                                onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">2. Kilang Peniaga</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">3. Lain-Lain</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" onkeypress="return isNumberKey(event)">
                                                                        </td>


                                                                    </tr>


                                                                    <tr style="background-color: #1526224a">
                                                                        <td class="text-bold-500"
                                                                            style="text-align:center;"><b>Jumlah</b></td>
                                                                        <td style="text-align:center;">

                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>











                                        </div>
                                    </div>





                                    <div class="row form-group" style="padding-top: 10px; ">


                                        <div class="text-left col-md-5">
                                            <a href="{{ route('buah.bahagianiv') }}" class="btn btn-primary"
                                                style="float: left">Sebelumnya</a>
                                        </div>
                                            <div class="text-right col-md-7 mb-4 ">
                                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                                    style="float: right" data-target="#confirmation">Simpan & Hantar</button>
                                            </div>

                                    </div>

                                        {{-- Hidden Gap - Just Ignore --}}
                                        {{-- <div class="alert alert-white" style="text-align: center;"></div> --}}
                                        {{-- <div style="padding: 25px;"></div> --}}
                                    </div>

                                    <!-- Modal Confirmation -->
                                    <div class="modal fade" id="confirmation" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#f3ce8f  !important">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><i
                                                            class="fa fa-exclamation-triangle" aria-hidden="true"
                                                            style="color:rgb(255, 255, 0)"></i>&nbspPENGESAHAN
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Anda pasti mahu menyimpan maklumat ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-success">Ya</button>
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



                        {{-- </div>
                                                                    </div> --}}

                        {{-- </section> --}}















                        {{-- </div>

                    </div> --}}



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

    <script src="assets/js/main.js"></script>

    <script src="{{ asset('theme/libs/DataTables2/datatables.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
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
    </script>
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

    </body>

    </html>

@endsection
