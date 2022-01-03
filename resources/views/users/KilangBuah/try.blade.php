<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Menu Penyelenggaraan</title>
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




    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/82f28bb8e5.js' crossorigin='anonymous'></script>



    <!-- Template Main CSS File -->
    <link href="{{ asset('theme/kilangstyles/css/adminstyle.css') }}"" rel=" stylesheet">
    <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>








            <!-- ======= Hero Section ======= -->
            <section id="hero" class="d-flex align-items-center ">
                <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                    {{-- <div class="row justify-content-center" style="margin-bottom: 10%">
                        <div class="col-xl-12 col-lg-9">

                            <h1 style="font-size:40px;">MENU PENYELENGGARAAN</h1>
                            <h2>Menu Penyelenggaraan Penyata Bulanan </h2>
                        </div>
                    </div> --}}
                    {{-- <div class="text-center">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div> --}}








                    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
                   >
                    <div class="row" style="justify-content: left;">
                        {{-- <div class="col-md-1"></div> --}}
                        <div class="col-md-8">
                            <div class="border card-header" style="width:400px; background-color:rgba(89, 194, 154, 0.801);">
                                <h3 class="text-white m-b-0" style="text-align: center"><b>LOG MASUK</b></h3>
                            </div>
                            <div class="container"
                                style="opacity: 0.7;background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%); width:400px; height: 650px;">
                                <div class="card-body">
                                    <div id="loginform">
                                        <div class="logo">

                                            <span class="db"><img src="{{ asset('theme/images/favicon2.png') }}"
                                                    style="height:75px; width:95px; margin-left:25%" alt="logo" /></span>
                                            <span class="db"><img src="{{ asset('theme/images/background/mspo.png') }}"
                                                    style="height:95px; margin-right:10%" alt="logo" /></span>
                                            <br>
                                            <br>
                                            <h3 class="text-center"
                                                style="color:rgba(89, 194, 154, 0.801); font-size:25px; font-family:verdana"><b> Sistem
                                                    E-Kilang </b></h3>
                                            <h4 class="text-center"
                                                style="color:rgba(89, 194, 154, 0.801); font-size:20px; font-family:verdana"> Lembaga
                                                Minyak Sawit Malaysia </h4>
                                            <br>
                                            <h4 class="text-center" style="color: white; font-size:20px; font-family:verdana">Log
                                                Masuk
                                            </h4>
                                        </div>

                                     <div class="card-body">
                                            <form>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="No Kad Pengenalan">

                                                </div>
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control" placeholder="Kata Laluan">
                                                </div>
                                                <div class="row align-items-center remember">
                                                <input type="checkbox">&nbsp; Remember Me
                                            </div>
                                        <div class="form-group">
                                                    <input type="submit" value="Log Masuk" class="float-right btn login_btn" style="color: black;
                                    background-color: rgba(89, 194, 154, 0.801);
                                    width: 100px;">
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                 </div>

                  

                    </div>

                    <br>
                    <br>
                </div>
            </section><!-- End Hero -->


            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Menu Lain-Lain</h2>
                        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                    </div>

                    {{-- <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100"> --}}
                    <div class="swiper-wrapper">
                        <div class="row" style=" display: flex;
                        justify-content: center;
                        flex-direction: row; margin-left:5%; margin-right:5%;">
                            {{-- <div class="col-md-4 col-lg-3"> --}}
                                {{-- <div class="swiper-slide">
                                    <div class="testimonial-item"> --}}
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                            Maecen aliquam, risus at semper.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/email2.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Emel Semua Pelesen Aktif</h3>
                                        <h4>Penghantaran e-mail kepada semua pelesen aktif</h4>
                                    </div>
                                </div><!-- End testimonial item --> --}}
                            {{-- </div> --}}

                            <div class="col-md-4 col-lg-4">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum
                                            quid cillum eram malis quorum velit fore eram velit sunt aliqua noster
                                            fugiat
                                            irure amet legam anim culpa.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/dir4.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Direktori</h3>
                                        <h4>Direktori</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="col-md-4 col-lg-4">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                            quem
                                            veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                            quis
                                            sint minim.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/ann2.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Pengumuman</h3>
                                        <h4>Pengumuman</h4>
                                    </div>
                                </div>

                            </div><!-- End testimonial item -->

                            {{-- <div class="row"> --}}
                            <div class="col-md-4 col-lg-4">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export
                                            minim
                                            fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit
                                            fore
                                            quem dolore labore illum veniam.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/sch.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Jadual Penerimaan PL</h3>
                                        <h4>Jadual Penerimaan PL Bagi Semua Sektor</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="col-md-4 col-lg-4" style="margin-top: -8%" >
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/list.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Senarai Gagal Penerimaan PL</h3>
                                        <h4>Senarai Gagal Penerimaan PL </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4" style="margin-top: -8%">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/manual.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Panduan Penyelenggaraan</h3>
                                        <h4>Panduan bagi menyelenggara penyata bulanan</h4>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-4 col-lg-3" style="margin-top: -8%">
                                <div class="swiper-slide">
                                    <div class="testimonial-item"> --}}
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        {{-- <img src="{{ asset('theme/kilangstyles/img/testimonials/uem.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Emel Pelesen</h3>
                                        <h4>Penghantaran e-mail kepada pelesen</h4>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-4 col-lg-4" style="margin-top: -8%">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        {{-- <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                            noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                            legam
                                            esse veniam culpa fore nisi cillum quid.
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p> --}}
                                        <img src="{{ asset('theme/kilangstyles/img/testimonials/cp.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>Tukar Kata Laluan</h3>
                                        <h4>Tukar kata laluan bagi pengguna</h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>


                </div>

        </div>
        </section><!-- End Testimonials Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer>
            <div class="footer text-muted">
                {{-- <div class="float-start">
            <p>2020 &copy; Voler</p>
        </div> --}}
                <div style="text-align: center">
                    <p style="font-size:10px">Developed by Artanis Cloud</a></p>
                </div>
            </div>
        </footer>



        {{-- <footer id="footer">


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>OnePage</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer --> --}}

        {{-- <div id="preloader"></div> --}}
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        {{-- <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> --}}


        <script href="{{ asset('theme/kilangstyles/vendor/purecounter/purecounter.js') }}"" rel=" stylesheet"></script>
        <script href="{{ asset('theme/kilangstyles/vendor/aos/aos.js') }}"" rel=" stylesheet"></script>
        <script href="{{ asset('theme/kilangstyles/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"" rel=" stylesheet">
        </script>
        <script href="{{ asset('theme/kilangstyles/vendor/glightbox/js/glightbox.min.js') }}"" rel=" stylesheet"></script>
        <script href="{{ asset('theme/kilangstyles/vendor/isotope-layout/isotope.pkgd.min.js') }}"" rel=" stylesheet">
        </script>
        <script href="{{ asset('theme/kilangstyles/vendor/swiper/swiper-bundle.min.js') }}"" rel=" stylesheet"></script>
        <script href="{{ asset('theme/kilangstyles/vendor/php-email-form/validate.js') }}"" rel=" stylesheet"></script>



        <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('theme/js/app.js') }}"></script>

        <script src="{{ asset('theme/vendors/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('theme/vendors/apexcharts/apexcharts.min.js') }}"></script>
        {{-- <script src="{{ asset('theme/js/pages/dashboard.js') }}"></script> --}}

        <script src="{{ asset('theme/js/main.js') }}"></script>

        <!-- Template Main JS File -->

        <script href="{{ asset('theme/kilangstyles/js/main.js') }}"" rel=" stylesheet"></script>


        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


</body>

</html>
