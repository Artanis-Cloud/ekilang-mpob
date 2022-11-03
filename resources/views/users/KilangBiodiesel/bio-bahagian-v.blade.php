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
                    {{-- <h4 class="page-title">Kemasukan Penyata Bulanan
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

                <b>  PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4<br>

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
        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <form action="{{ route('penapis.add.bahagian.i') }}" method="post" class="sub-form">
                @csrf --}}
                <div class="card-body">
                    <div class="" style="padding: 2%">
                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2% ">Bahagian 5</h3>
                            <h5 style="color: rgb(39, 80, 71)">Import Produk Sawit
                            </h5>
                        </div>
                        <hr>

                        <div class="container center mt-4">

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nama Produk dan Kod </span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <select class="form-control select2" id="produk" name="e101_b4" disabled
                                        oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        {{-- @foreach ($produk as $data) --}}
                                            {{-- <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->proddesc }}
                                            </option> --}}
                                        {{-- @endforeach --}}

                                    </select>
                                    <p type="hidden" id="err_produk" style="color: red; display:none"><i>Sila buat pilihan di
                                        bahagian ini!</i></p>
                                    {{-- @error('e101_b4')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror --}}
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Nombor Borang Kastam 1</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b5' style="width: 100%"
                                        id="e101_b5" oninvalid="setCustomValidity('Sila isi butiran ini')" readonly
                                        onchange="autodecimal(this); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b5()">

                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Tarikh Import (dd-mm-yyyy)</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b6' style="width: 100%"
                                        id="e101_b6" oninvalid="setCustomValidity('Sila isi butiran ini')" readonly
                                        onchange="autodecimal(this); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b6()">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class=""> Kuantiti (Tan Metrik)</span>

                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b7' style="width: 100%"
                                        id="e101_b7" oninvalid="setCustomValidity('Sila isi butiran ini')" readonly
                                        onchange="autodecimal(this); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b7()">

                                </div>
                                <div class="col-md-3 mt-3">
                                    <span>Nilai (RM)</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b8' style="width: 100%"
                                        id="e101_b8" title="Sila isikan butiran ini." readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Negara Sumber</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e101_b9' style="width: 100%"
                                        id="e101_b9" oninvalid="setCustomValidity('Sila isi butiran ini')" readonly
                                        onchange="autodecimal(this); FormatCurrency(this)" onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        oninput="validate_two_decimal(this);setCustomValidity(''); invoke_b9()">
                                    @error('e101_b9')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>




                        </div>


                        <div class="row justify-content-center form-group" style="margin: 2%">
                            <button type="submit" class="btn btn-primary" id="checkBtn" disabled>Tambah</button>
                        </div>
                        <input type="hidden" name="hidDelete" id="hidDelete" value="" />

            </form>

            <hr>
            <br>
            <br>
            <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:-3%; margin-bottom:3%">Senarai Eksport Produk
                Sawit</h5>

            <section class="section">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="cuba" style="font-size: 13px">
                            <thead style="text-align: center">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Kod Produk</th>
                                    <th>Nombor Borang Kastam 1</th>
                                    <th>Tarikh Import (dd-mm-yyyy)</th>
                                    <th>Kuantiti (Tan Metrik)</th>
                                    <th>Nilai (RM)</th>
                                    <th>Negara Sumber</th>
                                    <th>Kemaskini</th>
                                    <th>Hapus</th>

                                </tr>
                            </thead>
                            <tbody>
                                <td colspan="9" style="text-align: center">Tiada Rekod</td>




                                <tr>

                                    <td colspan="2"><b>JUMLAH</b></td>
                                    {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                    <td style="text-align: center"><b>-</b></td>
                                    <td style="text-align: center"><b>-</b></td>
                                    <td style="text-align: center"><b>-</b></td>
                                    <td style="text-align: center"><b>-</b></td>
                                    <td style="text-align: center"><b>-</b></td>



                                    <td colspan="2"></td>
                                    {{-- <td></td> --}}

                                </tr>
                            </tbody>
                        </table>
                    </div>





                </div>

                <div class=" row form-group" style="padding-top: 10px; ">


                    <div class="text-left col-md-5">
                        <a href="{{ route('bio.bahagianiv') }}" class="btn btn-primary" style="float: left">Sebelumnya</a>
                    </div>
                    <div class="text-right col-md-7">
                        <a href="{{ route('bio.paparpenyata') }}" type="button" class="btn btn-primary "  style="float: right"
                            >Simpan &
                            Seterusnya</a>
                    </div>

                </div>

                <!-- Vertically Centered modal Modal -->

        </div>
    </div>
    {{-- </form> --}}

    {{-- </div> --}}
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#tutup").modal('show');
        });

</script>
@endsection

