@extends('layouts.main')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title" >Kemasukan Penyata Bulanan
                        @if ($bulan == 1)
                            JANUARI
                        @elseif($bulan == 2)
                            FEBRUARI
                        @elseif($bulan == 3)
                            MAC
                        @elseif($bulan == 4)
                            APRIL
                        @elseif($bulan == 5)
                            MEI
                        @elseif($bulan == 6)
                            JUN
                        @elseif($bulan == 7)
                            JULAI
                        @elseif($bulan == 8)
                            OGOS
                        @elseif($bulan == 9)
                            SEPTEMBER
                        @elseif($bulan == 10)
                            OKTOBER
                        @elseif($bulan == 11)
                            NOVEMBER
                        @elseif($bulan == 12)
                            DISEMBER
                        @endif  {{ $tahun }}</h4>
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
                <div class="card" style="margin-right:2%; margin-left:2%;">
                    <div class="card-body">
                            <div class="pl-3">

                                <div class="text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 5</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px"> Jualan / Edaran Isirung Sawit
                                        (PK) Dalam Negeri
                                        (51)
                                    </h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>


                                <form action="{{ route('buah.update.bahagian.v', [$penyata->e91_reg]) }}"
                                    method="post"  onsubmit="return validation_jum();" onload="validation_jumlah()">
                                    @csrf
                                    {{-- <div class="row" id="table-bordered"> --}}
                                        <div class="col-12 mt-2" style="margin-bottom: -2%">
                                            <div class="card">

                                                <div class="card-content">

                                                    <div class="row col-12 mt-1">
                                                        <div class=" col-8" style="text-align: left">
                                                            <p><i>Nota: Sila isikan butiran bawah dan tekan butang ‘Simpan & Seterusnya’</i></p>
                                                        </div>
                                                    </div>
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
                                                                            onkeypress="return isNumberKey(event)" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                                            value="{{ old('e91_ak1') ?? $penyata->e91_ak1 ?? 0 }}" required
                                                                            onchange="validation_jumlah()" oninvalid="setCustomValidity('Sila isi butiran ini')">
                                                                            @error('e91_ak1')
                                                                            <div class="alert alert-danger">
                                                                                <strong>Sila isi butiran ini</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">2. Peniaga</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="15" id='e91_ak2'
                                                                            class="calc" name='e91_ak2' style="text-align:center"
                                                                            onkeypress="return isNumberKey(event)" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                                            value="{{ old('e91_ak2') ?? $penyata->e91_ak2 ?? 0 }}" required
                                                                            onchange="validation_jumlah()" oninvalid="setCustomValidity('Sila isi butiran ini')">
                                                                            @error('e91_ak2')
                                                                            <div class="alert alert-danger">
                                                                                <strong>Sila isi butiran ini</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">3. Lain-Lain</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="15" id='e91_ak3'
                                                                            class="calc" name='e91_ak3' style="text-align:center"
                                                                            onkeypress="return isNumberKey(event)" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                                            value="{{ old('e91_ak3') ?? $penyata->e91_ak3 ?? 0 }}" required
                                                                            onchange="validation_jumlah()" oninvalid="setCustomValidity('Sila isi butiran ini')">
                                                                            @error('e91_ak3')
                                                                            <div class="alert alert-danger">
                                                                                <strong>Sila isi butiran ini</strong>
                                                                            </div>
                                                                        @enderror
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
                                    {{-- </div> --}}
                                    <br>





                                    <div class="row form-group">
                                        <div class="text-left col-md-5">
                                            <a href="{{ route('buah.bahagianiv') }}" class="btn btn-primary"
                                                style="float: left">Sebelumnya</a>
                                        </div>
                                        {{-- <div class="text-right col-md-7 mb-2 ">
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                style="float: right"
                                                data-bs-target="#exampleModalCenter">Hantar</button>
                                        </div> --}}
                                        <div class="text-right col-md-7">
                                            <button type="submit" class="btn btn-primary " style="float: right;">Simpan & Seterusnya</button>
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
                    </div>

                    {{-- <div id="preloader"></div> --}}
                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                </div>
    </div>
