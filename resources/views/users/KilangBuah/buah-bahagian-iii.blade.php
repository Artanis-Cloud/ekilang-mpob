@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Kemasukan Penyata Bulanan</h4>
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
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                        <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                    </div> --}}

            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-4 col-12"> --}}
                <div class="pl-3">

                    <div class="text-center">
                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 3</h3>
                        <h5 style="color: rgb(39, 80, 71) ; font-size:14px">Belian / Terimaan Bekalan Buah
                            Kelapa Sawit
                            (FFB) (52)</h5>
                        {{-- <p>Maklumat Kilang</p> --}}
                    </div>
                    <hr>

                    {{-- <div class="row" id="table-bordered"> --}}
                    <div class="col-12 mt-2" style="margin-bottom: -2%">
                        <form action="{{ route('buah.update.bahagian.iii', [$penyata->e91_reg]) }}" method="post"
                            onsubmit="return validation_jum();" onload="validation_jumlah()">
                            @csrf
                            <div class="card">

                                <div class="card-content">


                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead style="text-align: center">
                                                <tr>
                                                    <th>Sumber Bekalan</th>
                                                    <th>Kuantiti (Tan Metrik)</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">1. Estet Sendiri</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id="e91_ai1"
                                                            name='e91_ai1' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this)"
                                                            onkeypress="return isNumberKey(event);"
                                                            onchange="validation_jumlah()"
                                                            value="{{ old('e91_ai1') ?? ($penyata->e91_ai1 ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                        @error('e91_ai1')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">2. Estet Luar</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id="e91_ai2"
                                                            name='e91_ai2' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            onchange="validation_jumlah()"
                                                            value="{{ old('e91_ai2') ?? ($penyata->e91_ai2 ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                            @error('e91_ai2')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">3. Peniaga Buah</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id='e91_ai3'
                                                            name='e91_ai3' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ old('e91_ai3') ?? ($penyata->e91_ai3 ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                            @error('e91_ai3')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">4. Pekebun Kecil</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" id='e91_ai4'
                                                            name='e91_ai4' size="15" style="text-align: center"
                                                            oninput="validate_two_decimal(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ old('e91_ai4') ?? ($penyata->e91_ai4 ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                            @error('e91_ai4')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">5. Kilang Buah Lain</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" name='e91_ai5'
                                                            id='e91_ai5' size="15" id="text1" style="text-align: center"
                                                            oninput="validate_two_decimal(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ old('e91_ai5') ?? ($penyata->e91_ai5 ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                            @error('e91_ai5')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500">6. Lain-Lain</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" class="calc" name='e91_ai6'
                                                            id='e91_ai6' size="15" id="text2" style="text-align: center"
                                                            oninput="validate_two_decimal(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ old('e91_ai6') ?? ($penyata->e91_ai6 ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                            @error('e91_ai6')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500" style="text-align:center;">
                                                        <b>Jumlah</b>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <b><span id="total" name="total">
                                                                {{ old('total') ?? number_format($jumlah, 2) }}
                                                            </span>
                                                        </b>
                                                    </td>

                                                </tr>
                                                <tr style="background-color: #1526224a">
                                                    <td class="text-bold-500" style="text-align:center;">
                                                        <b>Jumlah Bahagian I (FFB)</b>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <span><b>{{ number_format($penyata->e91_ab1 ?? 0, 2) }}</b></span>

                                                        <input type="hidden" id="jumlah" name="jumlah"
                                                            onchange="return validation_jum()"
                                                            value="{{ $penyata->e91_ab1 }}">

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <br>


                <div class="row form-group">
                    <div class="text-left col-md-5">
                        <a href="{{ route('buah.bahagianii') }}" class="btn btn-primary"
                            style="float: left">Sebelumnya</a>
                    </div>
                    <div class="text-right col-md-7">
                        <button type="SUBMIT" class="btn btn-primary" style="float: right" id="go">Simpan &
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
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Anda pasti mahu menyimpan maklumat ini?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
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
                </form>
            </div>

        </div>



        {{-- <div id="preloader"></div> --}}
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script>
            function validation_jumlah() {
                var e91_ai1 = $("#e91_ai1").val();
                var e91_ai2 = $("#e91_ai2").val();
                var e91_ai3 = $("#e91_ai3").val();
                var e91_ai4 = $("#e91_ai4").val();
                var e91_ai5 = $("#e91_ai5").val();
                var e91_ai6 = $("#e91_ai6").val();

                var jumlah = $("#jumlah").val();
                var jumlah_input = 0;

                jumlah_input = parseFloat(Number(e91_ai1)) + parseFloat(Number(e91_ai2)) +
                    parseFloat(Number(e91_ai3)) + parseFloat(Number(e91_ai4)) + parseFloat(Number(e91_ai5)) + parseFloat(Number(
                        e91_ai6));

                document.getElementById('total').innerHTML = jumlah_input.toFixed(2);
            }
        </script>
    @endsection
