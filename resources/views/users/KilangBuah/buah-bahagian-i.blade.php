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
                        <form action="{{ route('buah.update.bahagian.i', $kilang->e91_reg) }}" method="post">
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
                                                        <input type="text" size="10" name='e91_aa1'  oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_aa1 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_aa2' required oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ $kilang->e91_aa2 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_aa3' required oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ $kilang->e91_aa3 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_aa4' required oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ $kilang->e91_aa4 ?? 0 }}">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">B.
                                                        Belian/Terimaan</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" name='e91_ab1' id="number" required oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            style="text-align: center" oninput="validate_two_decimal(this);setCustomValidity('')"
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ $kilang->e91_ab1 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ab2'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ab2 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ab3'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ab3 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ab4'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ab4 ?? 0 }}">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">C.
                                                        Diproses</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ac1'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ac1 ?? 0 }}">
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
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ad1'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ad1 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ad2'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ad2 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ad3'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ad3 ?? 0 }}">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold-500 ">E.
                                                        Jualan/Edaran Tempatan</td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ae1'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ae1 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ae2'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ae2 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ae3'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ae3 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ae4'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ae4 ?? 0 }}">
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
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ag1'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ag1 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ag2'
                                                            onkeypress="return isNumberKey(event)" required
                                                            value="{{ $kilang->e91_ag2 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ag3'
                                                            onkeypress="return isNumberKey(event)" required
                                                            onchange="setTwoNumberDecimal"
                                                            value="{{ $kilang->e91_ag3 ?? 0 }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <input type="text" size="10" style="text-align: center" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            oninput="validate_two_decimal(this);setCustomValidity('')" name='e91_ag4'
                                                            onchange="setTwoNumberDecimal()" required
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ $kilang->e91_ag4 ?? 0 }}">
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


        @endsection

