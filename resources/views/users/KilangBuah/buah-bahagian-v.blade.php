@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-2">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="margin-left:5%; color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center"  style="margin-left:-1%;">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='white'">
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

                                    <div class="text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 5</h3>
                                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Edaran / Jualan Isirung Sawit
                                            (PK) Dalam Negeri
                                            (51)
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>


                                    <form action="{{ route('buah.update.bahagian.v', [$penyata->e91_reg]) }}"
                                        method="post"  onsubmit="return validation_jum();" onload="validation_jumlah()">
                                        @csrf
                                        <div class="row" id="table-bordered">
                                            <div class="col-12 mt-2" style="margin-bottom: -2%">
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
                                                                            <input type="text" size="15" id='e91_ak1'
                                                                                class="calc" name='e91_ak1' style="text-align:center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ old('e91_ak1') ?? $penyata->e91_ak1 ?? 0 }}"
                                                                                onchange="validation_jumlah()">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">2. Kilang Peniaga</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" id='e91_ak2'
                                                                                class="calc" name='e91_ak2' style="text-align:center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ old('e91_ak2') ?? $penyata->e91_ak2 ?? 0 }}"
                                                                                onchange="validation_jumlah()">
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-bold-500">3. Lain-Lain</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="15" id='e91_ak3'
                                                                                class="calc" name='e91_ak3' style="text-align:center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ old('e91_ak3') ?? $penyata->e91_ak3 ?? 0 }}"
                                                                                onchange="validation_jumlah()">
                                                                        </td>


                                                                    </tr>


                                                                    <tr>
                                                                        <td class="text-bold-500"
                                                                            style="text-align:center;">
                                                                            <b>Jumlah</b>
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            {{-- <b><span id="total">{{ ($penyata->e91_ak1 ?? 0) + ($penyata->e91_ak2 ?? 0) + ($penyata->e91_ak3 ?? 0) }}</span></b> --}}
                                                                            <b><span id="total" name="total">
                                                                                {{ number_format(old('total') ?? $jumlah, 2) }}
                                                                            </span>
                                                                        </b>
                                                                        </td>

                                                                    </tr>
                                                                    <tr style="background-color: #1526224a">
                                                                        <td class="text-bold-500"
                                                                            style="text-align:center;">
                                                                            <b>Jumlah Bahagian I (PK)</b>
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <b><span>{{ number_format($penyata->e91_ae3 ?? 0,2)  }}</span></b>
                                                                            <input type="hidden" id="jumlah" name="jumlah"
                                                                            onchange="return validation_jum()"
                                                                            value="{{ $penyata->e91_ae3 }}">

                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <br>





                                        <div class="row form-group" style="padding-top: 10px; ">


                                            <div class="text-left col-md-5">
                                                <a href="{{ route('buah.bahagianiv') }}" class="btn btn-primary"
                                                    style="float: left">Sebelumnya</a>
                                            </div>
                                            {{-- <div class="text-right col-md-7 mb-2 ">
                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                    style="float: right"
                                                    data-bs-target="#exampleModalCenter">Hantar</button>
                                            </div> --}}
                                            <div class="text-right col-md-7 mb-4 ">
                                                <button type="submit" class="btn btn-primary " style="float: right;">Hantar</button>
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
                                                            Anda pasti mahu menghantar penyata ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"
                                                                style="color:#275047">Tidak</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Hantar</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br>


                            </div>
                        </div>
                    </div>




                    {{-- </div>
                                                                    </div> --}}

                    {{-- </section> --}}
                </div>
            </div> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br>
        </div>








    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.calc').change(function() {
                var total = 0;
                $('.calc').each(function() {
                    if ($(this).val() != '') {
                        total += parseFloat($(this).val());
                    }
                });
                $('#total').html(total);
            });
        });
    </script> --}}
    <script>
        function validation_jumlah() {
            var e91_ak1 = $("#e91_ak1").val();
            var e91_ak2 = $("#e91_ak2").val();
            var e91_ak3 = $("#e91_ak3").val();

            var jumlah = $("#jumlah").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(e91_ak1)) + parseFloat(Number(e91_ak2)) +
                parseFloat(Number(e91_ak3));
            console.log(jumlah_input.toFixed(2));
            document.getElementById('total').innerHTML = jumlah_input.toFixed(2);
        }
    </script>

    </body>

    </html>
@endsection
