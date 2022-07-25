@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Kemasukan Penyata Bulanan
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
                        @endif {{ $tahun }}
                    </h4>
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
            <div class="card-body">
                <div class="pl-3">

                    <div class=" text-center">
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 1</h3>
                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Maklumat Belian, Proses,
                            Pengeluaran,
                            Jualan/Edaran, Stok Akhir <br>(Berdasarkan dalam premis kilang sahaja)</h5>
                    </div>
                    <hr>




                    <div class="col-12 mt-3">
                        <div class="row col-12">
                            <div class="mb-2 col-8" style="text-align: left">
                                <p><i>Nota: Sila isikan butiran bawah dan tekan butang ‘Simpan & Seterusnya’</i></p>
                            </div>
                            <div class="mb-2 col-4" style="text-align: right">
                                <a href="{{ asset('manual/kilangbuah/1.pdf') }}" target="_blank"
                                    style="text-align:right"><i><u>Panduan
                                            Mengisi Maklumat Bahagian I</u></i></a>
                            </div>

                        </div>
                        <form action="{{ route('buah.update.bahagian.i', $kilang->e91_reg) }}" method="post"
                            class="sub-form">
                            @csrf
                            <div class="card">

                                <div class="card-content">


                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead style="text-align: center">
                                                <tr>
                                                    <th>Butiran</th>
                                                    <th>Buah Tandan Segar (FFB) <br>
                                                        Kod 52</th>
                                                    <th>Minyak Sawit Mentah (CPO)
                                                        <br> Kod 01
                                                    </th>
                                                    <th>Isirung (PK) <br> Kod 51
                                                    </th>
                                                    <th>Minyak Keladak (Sludge Oil)
                                                        <br> Kod 49
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500 ">A.
                                                        Stok Awal Di Premis</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_aa1' id='e91_aa1'
                                                            style="text-align: center" onchange="aa1();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc()"
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_aa1 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_aa2'
                                                            id='e91_aa2'required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc2()"
                                                            onchange="aa2();FormatCurrency(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ number_format($kilang->e91_aa2 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_aa3'
                                                            id='e91_aa3'required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc3()"
                                                            onchange="aa3();FormatCurrency(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ number_format($kilang->e91_aa3 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_aa4'
                                                            id='e91_aa4'required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc4()"
                                                            onchange="aa4();FormatCurrency(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ number_format($kilang->e91_aa4 ?? 0, 2) }}">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">B.
                                                        Belian/Terimaan</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_ab1'
                                                            id='e91_ab1'id="number" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc5()"
                                                            onchange="ab1();FormatCurrency(this)"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ number_format($kilang->e91_ab1 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ab2();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc6()"
                                                            name='e91_ab2' id='e91_ab2'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ab2 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ab3();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc7()"
                                                            name='e91_ab3'
                                                            id='e91_ab3'onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ab3 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ab4();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc8()"
                                                            name='e91_ab4'
                                                            id='e91_ab4'onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ab4 ?? 0, 2) }}">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">C.
                                                        Diproses</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ac1();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc9()"
                                                            name='e91_ac1' id='e91_ac1'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ac1 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                    </td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                    </td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">D.
                                                        Pengeluaran</td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ad1();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc10()"
                                                            name='e91_ad1' id='e91_ad1' onkeyup="FormatCurrency(this)"
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ad1 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ad2();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc11()"
                                                            name='e91_ad2' id='e91_ad2' onkeyup="FormatCurrency(this)"
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ad2 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ad3();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc12()"
                                                            name='e91_ad3' id='e91_ad3'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ad3 ?? 0, 2) }}">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">E.
                                                        Jualan/Edaran Tempatan</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ae1();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc13()"
                                                            name='e91_ae1' id='e91_ae1'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ae1 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ae2();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc14()"
                                                            name='e91_ae2' id='e91_ae2'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ae2 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ae3();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc15()"
                                                            name='e91_ae3'
                                                            id='e91_ae3'onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ae3 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ae4();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc16()"
                                                            name='e91_ae4' id='e91_ae4'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ae4 ?? 0, 2) }}">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">F.
                                                        Eksport</td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                    </td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                    </td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                    </td>
                                                    <td style="text-align:center; background-color:#808080b8">
                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">G.
                                                        Stok Akhir Di Premis</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ag1();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc17()"
                                                            name='e91_ag1'
                                                            id='e91_ag1'onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ag1 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ag2();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc18()"
                                                            name='e91_ag2' id='e91_ag2'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            value="{{ number_format($kilang->e91_ag2 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ag3();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity(''); invokeFunc19()"
                                                            name='e91_ag3' id='e91_ag3'
                                                            onkeypress="return isNumberKey(event)" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="setTwoNumberDecimal()"
                                                            value="{{ number_format($kilang->e91_ag3 ?? 0, 2) }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onchange="ag4();FormatCurrency(this)"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')"
                                                            name='e91_ag4' id='e91_ag4'
                                                            onchange="setTwoNumberDecimal()" required
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ number_format($kilang->e91_ag4 ?? 0, 2) }}">
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>


                            <div class="row" style=" float:right">

                                <div class="col-md-12">
                                    <div class="row form-group" style="padding-top: 10px; ">
                                        <div class="text-right col-md-12">
                                            <button type="submit" class="btn btn-primary ">Simpan &
                                                Seterusnya</button>
                                        </div>
                                    </div>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">
                                                        Simpan & Seterusnya
                                                    </button> --}}
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
                                                    <button type="submit" class="btn btn-primary ml-1"
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


                        </form>

                    </div>
                </div>
            </div>
        @endsection

        <!-- ======= Footer ======= -->

        @section('scripts')
            <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_aa2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc2() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_aa3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc3() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_aa4').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc4() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ab1').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc5() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ab2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc6() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ab3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc7() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ab4').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc8() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ac1').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc9() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ad1').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc10() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ad2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc11() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ad3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc12() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ae1').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>

            <script>
                function invokeFunc13() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ae2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc14() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ae3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc15() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ae4').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc16() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ag1').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc17() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ag2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc18() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ag3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc19() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e91_ag4').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function aa1() {
                    console.log('input', document.getElementById("e91_aa1").value);
                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_aa1").value);

                    console.log('x', x);

                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_aa1").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function aa2() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_aa2").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_aa2").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function aa3() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_aa3").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_aa3").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function aa4() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_aa4").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_aa4").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ab1() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ab1").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ab1").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ab2() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ab2").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ab2").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ab3() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ab3").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ab3").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ab4() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ab4").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ab4").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ac1() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ac1").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ac1").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ad1() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ad1").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ad1").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ad2() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ad2").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ad2").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ad3() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ad3").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ad3").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ae1() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ae1").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ae1").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ae2() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ae2").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ae2").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ae3() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ae3").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ae3").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ae4() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ae4").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ae4").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ag1() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ag1").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ag1").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ag2() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ag2").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ag2").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ag3() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ag3").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ag3").value = y;
                    console.log(y);
                }
            </script>
            <script>
                function ag4() {

                    // let decimal = ".00"
                    var x = parseFloat(document.getElementById("e91_ag4").value);
                    if (isNaN(x)) {
                        x = 0.00;
                    }
                    var y = parseFloat(x).toFixed(2);
                    document.querySelector("#e91_ag4").value = y;
                    console.log(y);
                }
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".floatNumberField").change(function() {
                        $(this).val(parseFloat($(this).val()).toFixed(2));
                    });
                });
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
                function isNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : evt.keyCode
                    if (charCode > 31 && (charCode != 46 && (charCode < 48 || charCode > 57)))
                        return false;
                    return true;
                }
            </script>


            <script language="javascript" type="text/javascript">
                function FormatCurrency(ctrl) {
                    //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
                    if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                        return;
                    }

                    var val = ctrl.value;

                    val = val.replace(/,/g, "")
                    ctrl.value = "";
                    val += '';
                    x = val.split('.');
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';

                    var rgx = /(\d+)(\d{3})/;

                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                    }

                    ctrl.value = x1 + x2;
                }
            </script>
            <script>
                $('.sub-form').submit(function() {

                    var x = $('#e91_aa1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_aa1').val(x);

                    var x = $('#e91_aa2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_aa2').val(x);

                    var x = $('#e91_aa3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_aa3').val(x);

                    var x = $('#e91_aa4').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_aa4').val(x);

                    var x = $('#e91_ab1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ab1').val(x);

                    var x = $('#e91_ab2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ab2').val(x);

                    var x = $('#e91_ab3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ab3').val(x);

                    var x = $('#e91_ab4').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ab4').val(x);

                    var x = $('#e91_ac1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ac1').val(x);

                    var x = $('#e91_ad1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ad1').val(x);

                    var x = $('#e91_ad2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ad2').val(x);

                    var x = $('#e91_ad3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ad3').val(x);

                    var x = $('#e91_ae1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ae1').val(x);

                    var x = $('#e91_ae2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ae2').val(x);

                    var x = $('#e91_ae3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ae3').val(x);

                    var x = $('#e91_ae4').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ae4').val(x);

                    var x = $('#e91_ag1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ag1').val(x);

                    var x = $('#e91_ag2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ag2').val(x);

                    var x = $('#e91_ag3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ag3').val(x);

                    var x = $('#e91_ag4').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e91_ag4').val(x);


                    return true;

                });
            </script>
            <script>
                document.addEventListener('keypress', function(e) {
                    if (e.keyCode === 13 || e.which === 13) {
                        e.preventDefault();
                        return false;
                    }

                });
            </script>
        @endsection
