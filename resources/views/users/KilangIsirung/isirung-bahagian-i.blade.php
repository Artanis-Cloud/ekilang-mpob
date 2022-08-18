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
                <div class="col-5 align-self-center">
                    {{-- <h4 class="page-title" style="font-size: 20px">Kemasukan Penyata Bulanan
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
                    </h4> --}}
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
            <p style="text-align: center; vertical-align:middle; font-size: 20px">

                <b>PENYATA BULANAN KILANG ISIRUNG - MPOB (EL) CF 4<br>

            BULAN :&nbsp;&nbsp;
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
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                </b>
            </p>
        </div>
        <div class="card" style="margin-right:2%; margin-left:2%; margin-top:2%">

            <div class="card-body">

                <div class=" text-center">
                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 1</h3>
                    <h5 style="color: rgb(39, 80, 71); font-size:14px">Maklumat Imbangan</h5>
                </div>
                <hr>
                <div class="mb-2 col-8" style="text-align: left">
                    <p><i>Nota: Sila isikan butiran dibawah dalam tan metrik dan tekan butang ‘Simpan & Seterusnya’</i></p>
                </div>



                <div class="col-12 mt-3">

                    <form action="{{ route('isirung.update.bahagian.i', [$penyata->e102_reg]) }}" method="post"
                        class="sub-form">
                        @csrf
                        <div class="card">

                            <div class="card-content">


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead style="text-align: center">
                                            <tr>
                                                <th>Butiran</th>
                                                <th>Isirung (PK) <br> Kod 51
                                                </th>
                                                <th>Minyak Isirung Sawit Mentah (CPKO)
                                                    <br> Kod 04
                                                </th>
                                                <th>Dedak Isirung (PKC)
                                                    <br> Kod 33
                                                </th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-bold-500 ">A.
                                                    Stok Awal Di Premis</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_aa1' id='e102_aa1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="validate_two_decimal(this); this.setCustomValidity('');invokeFunc()"  onchange="autodecimal(this); FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{number_format($penyata->e102_aa1, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_aa2' style="text-align: center" id='e102_aa2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc2()"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_aa2, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_aa3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc3()" id='e102_aa3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_aa3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">B.
                                                    Stok Awal Di Pusat Simpanan/Gudang</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ab1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc4()" id='e102_ab1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ab1 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ab2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc5()" id='e102_ab2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ab2 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ab3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc6()" id='e102_ab3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ab3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">C.
                                                    Belian/Terimaan &nbsp; <i class="fa fa-exclamation-circle"
                                                        style="color: red; cursor: pointer;"
                                                        title="Jumlah Belian/Terimaan Dalam Negeri adalah termasuk jumlah Import."></i>
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ac1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc7()" id='e102_ac1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format(($penyata->e102_ac1 ?? 0) + ($penyata->e102_ad1 ?? 0) ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ac2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc8()" id='e102_ac2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format(($penyata->e102_ac2 ?? 0) + ($penyata->e102_ad2 ?? 0) ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ac3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc9()" id='e102_ac3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format(($penyata->e102_ac3 ?? 0) + ($penyata->e102_ad3 ?? 0) ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">D.
                                                    Import</td>
                                                <td style="text-align:center; background-color:#808080b8">

                                                </td>
                                                <td style="text-align:center; background-color:#808080b8">

                                                </td>
                                                <td style="text-align:center; background-color:#808080b8">

                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">E.
                                                    Diproses</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ae1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc10()" id='e102_ae1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ae1 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center; background-color:#808080b8">
                                                    {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                </td>
                                                <td style="text-align:center; background-color:#808080b8">
                                                    {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">F.
                                                    Pengeluaran</td>
                                                <td style="text-align:center; background-color:#808080b8">
                                                    {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_af2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc11()" id='e102_af2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_af2 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_af3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc12()" id='e102_af3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_af3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">G.
                                                    Jualan/Edaran Tempatan</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ag1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc13()" id='e102_ag1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ag1 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ag2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc14()" id='e102_ag2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ag2 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ag3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc15()" id='e102_ag3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ag3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">H.
                                                    Hantar ke Pusat Simpanan/Gudang</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ah1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc16()" id='e102_ah1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ah1 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ah2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc17()" id='e102_ah2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ah2 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ah3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc18()" id='e102_ah3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ah3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">I.
                                                    Eksport</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ai1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc19()" id='e102_ai1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ai1 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ai2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc20()" id='e102_ai2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ai2 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ai3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc21()" id='e102_ai3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ai3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">J.
                                                    Stok Akhir di Premis</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_aj1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc22()" id='e102_aj1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_aj1 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_aj2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc23()" id='e102_aj2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_aj2 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_aj3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc24()" id='e102_aj3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_aj3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="text-bold-500 ">K.
                                                    Stok Akhir di Pusat Simpanan</td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ak1' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc25()" id='e102_ak1'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ak1 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ak2' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc26()" id='e102_ak2'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ak2 ?? 0, 2) }}">
                                                </td>
                                                <td style="text-align:center;">
                                                    <input type="text" size="10" name='e102_ak3' style="text-align: center"
                                                        required oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                        oninput="this.setCustomValidity('');invokeFunc27()" id='e102_ak3'  onchange="autodecimal(this);FormatCurrency(this)"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="{{ number_format($penyata->e102_ak3 ?? 0, 2) }}">
                                                </td>


                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <br>
                        <div class="row" style=" float:right">


                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#next">
                                    Simpan & Seterusnya
                                </button>
                                <!-- Vertically Centered modal Modal -->
                                <div class="modal fade" id="next" tabindex="-1" role="dialog"
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
                                                    data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" id="submit-form">
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

            </section><!-- End Hero -->

            <!-- ======= Footer ======= -->
            {{-- <div id="preloader"></div> --}}
            {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}


            {{-- <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                            var whichKey = checkKey(evt);
                            if (whichKey == 13) {
                                console.log('successful');
                                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                                document.getElementById('nextInputID').focus();
                            }
                        }
                    )};


                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script> --}}
            <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_ab1').focus();
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
                            document.getElementById('e102_ab2').focus();
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
                            document.getElementById('e102_ab3').focus();
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
                            document.getElementById('e102_ac1').focus();
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
                            document.getElementById('e102_ac2').focus();
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
                            document.getElementById('e102_ac3').focus();
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
                            document.getElementById('e102_af2').focus();
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
                            document.getElementById('e102_af2').focus();
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
                            document.getElementById('e102_af3').focus();
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
                            document.getElementById('e102_ag1').focus();
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
                            document.getElementById('e102_ag2').focus();
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
                            document.getElementById('e102_ag3').focus();
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
                            document.getElementById('e102_ah1').focus();
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
                            document.getElementById('e102_ah2').focus();
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
                            document.getElementById('e102_ah3').focus();
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
                            document.getElementById('e102_ai1').focus();
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
                            document.getElementById('e102_ai2').focus();
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
                            document.getElementById('e102_ai3').focus();
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
                            document.getElementById('e102_aj1').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc20() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_aj2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc21() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_aj3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc22() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_ak1').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc23() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_ak2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc24() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_ak3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc25() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_aa2').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc26() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e102_aa3').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
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

                    var x = $('#e102_aa1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_aa1').val(x);

                    var x = $('#e102_aa2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_aa2').val(x);

                    var x = $('#e102_aa3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_aa3').val(x);

                    var x = $('#e102_ab1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ab1').val(x);

                    var x = $('#e102_ab2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ab2').val(x);

                    var x = $('#e102_ab3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ab3').val(x);

                    var x = $('#e102_ac1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ac1').val(x);

                    var x = $('#e102_ac2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ac2').val(x);

                    var x = $('#e102_ac3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ac3').val(x);

                    var x = $('#e102_ae1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ae1').val(x);

                    var x = $('#e102_af2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_af2').val(x);

                    var x = $('#e102_af3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_af3').val(x);

                    var x = $('#e102_ag1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ag1').val(x);

                    var x = $('#e102_ag2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ag2').val(x);

                    var x = $('#e102_ag3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ag3').val(x);

                    var x = $('#e102_ah1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ah1').val(x);

                    var x = $('#e102_ah2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ah2').val(x);

                    var x = $('#e102_ah3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ah3').val(x);

                    var x = $('#e102_ai1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ai1').val(x);

                    var x = $('#e102_ai2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ai2').val(x);

                    var x = $('#e102_ai3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ai3').val(x);

                    var x = $('#e102_aj1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_aj1').val(x);

                    var x = $('#e102_aj2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_aj2').val(x);

                    var x = $('#e102_aj3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_aj3').val(x);

                    var x = $('#e102_ak1').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ak1').val(x);

                    var x = $('#e102_ak2').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ak2').val(x);

                    var x = $('#e102_ak3').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#e102_ak3').val(x);

                    return true;

                });
            </script>


    <script>
        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>

    {{-- </body>

    </html> --}}

            {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
        @endsection
