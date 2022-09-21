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
                    <h4 class="page-title">Papar Penyata</h4>
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

        <div class="container-fluid">
            <!-- row -->
            <div class="card" style="margin-right:2%; margin-left:2%">

                <div class="col-sm-12 col-lg-12">

                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.9penyataterdahulu.process') }}" method="get"  onsubmit="return Validate(this);check()" >
                            @csrf
                            <div class>
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%; margin-top:-2%; text-align:center">
                                    Papar Penyata Bulanan
                                    Terdahulu</h3>
                                <h5 style="color: rgb(39, 80, 71); font-size:14px; margin-bottom:-2%; text-align:center">
                                    Papar Penyata Bulanan
                                    Terdahulu di MYSQL dan PLEID</h5>
                            </div>

                            <div class="card-body">

                                <hr><i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '<b style="color: red"> * </b>'</i>
                                <br><br><br>
                                <div class="container center ">

                                    <div class="row mt-1">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Sektor
                                            Kilang
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="sektor" name="sektor" required
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_sektor()">
                                                    <option selected hidden disabled value="">Sila Pilih Sektor</option>
                                                    @if (auth()->user()->sub_cat)
                                                    @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                                        @if ($cat == 'PL91')
                                                            <option value="PL91">Kilang Buah</option>
                                                        @endif
                                                        @if ($cat == 'PL101')
                                                            <option value="PL101">Kilang Penapis</option>
                                                        @endif
                                                        @if ($cat == 'PL102')
                                                            <option value="PL102">Kilang Isirung</option>
                                                        @endif
                                                        @if ($cat == 'PL104')
                                                            <option value="PL104">Kilang Oleokimia</option>
                                                        @endif
                                                        @if ($cat == 'PL111')
                                                            <option value="PL111">Pusat Simpanan</option>
                                                        @endif
                                                        @if ($cat == 'PLBIO')
                                                            <option value="PLBIO">Kilang Biodiesel</option>
                                                        @endif
                                                        @if ($cat == null)
                                                            <option value="PL91">Kilang Buah</option>
                                                            <option value="PL101">Kilang Penapis</option>
                                                            <option value="PL102">Kilang Isirung</option>
                                                            <option value="PL104">Kilang Oleokimia</option>
                                                            <option value="PL111">Pusat Simpanan</option>
                                                            <option value="PL102">Kilang Biodiesel</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="PL91">Kilang Buah</option>
                                                    <option value="PL101">Kilang Penapis</option>
                                                    <option value="PL102">Kilang Isirung</option>
                                                    <option value="PL104">Kilang Oleokimia</option>
                                                    <option value="PL111">Pusat Simpanan</option>
                                                    <option value="PL102">Kilang Biodiesel</option>
                                                @endif
                                                </select>
                                                <p type="hidden" id="err_sektor" style="color: red; display:none"><i>Sila buat pilihan
                                                    di
                                                    bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="tahun" name="tahun" required
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_tahun()">
                                                    <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                    @for ($i = 2011; $i <= date('Y'); $i++)
                                                        <option>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <p type="hidden" id="err_tahun" style="color: red; display:none"><i>Sila buat pilihan
                                                    di
                                                    bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="bulan" name="bulan" required
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_bulan()">
                                                    <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Mac</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Jun</option>
                                                    <option value="07">Julai</option>
                                                    <option value="08">Ogos</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Disember</option>
                                                </select>
                                                <p type="hidden" id="err_bulan" style="color: red; display:none"><i>Sila buat pilihan
                                                    di
                                                    bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Sumber
                                            Data
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="data" name="data" required
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_data()">
                                                    <option selected hidden disabled value="">Sila Pilih Sumber Data</option>
                                                    <option value="ekilang">e-Kilang</option>
                                                    <option value="pleid">PLEID</option>
                                                </select>
                                                <p type="hidden" id="err_data" style="color: red; display:none"><i>Sila buat pilihan
                                                    di
                                                    bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin: 10px; ">
                                        <button type="submit" id="checkBtn"  class="btn btn-primary"  onclick="check()">Papar</button>
                                        {{-- <button >YA</button> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>




    </div>
@endsection

@section('scripts')

    <script>
        function valid_sektor() {

            if ($('#sektor').val() == '') {
                $('#sektor').css('border', '1px solid red');
                document.getElementById('err_sektor').style.display = "block";


            } else {
                $('#sektor').css('border', '');
                document.getElementById('err_sektor').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_tahun() {

            if ($('#tahun').val() == '') {
                $('#tahun').css('border', '1px solid red');
                document.getElementById('err_tahun').style.display = "block";


            } else {
                $('#tahun').css('border', '');
                document.getElementById('err_tahun').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_bulan() {

            if ($('#bulan').val() == '') {
                $('#bulan').css('border', '1px solid red');
                document.getElementById('err_bulan').style.display = "block";


            } else {
                $('#bulan').css('border', '');
                document.getElementById('err_bulan').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_data() {

            if ($('#data').val() == '') {
                $('#data').css('border', '1px solid red');
                document.getElementById('err_data').style.display = "block";


            } else {
                $('#data').css('border', '');
                document.getElementById('err_data').style.display = "none";

            }

        }
    </script>

    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            field = document.getElementById("sektor");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#sektor').css('border', '1px solid red');
                document.getElementById('err_sektor').style.display = "block";
                console.log('masuk');
            }
            // kod produk
            field = document.getElementById("tahun");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#tahun').css('border', '1px solid red');
                document.getElementById('err_tahun').style.display = "block";
                console.log('masuk');
            }
            // kod produk
            field = document.getElementById("bulan");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#bulan').css('border', '1px solid red');
                document.getElementById('err_bulan').style.display = "block";
                console.log('masuk');
            }
            // kod produk
            field = document.getElementById("data");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#data').css('border', '1px solid red');
                document.getElementById('err_data').style.display = "block";
                console.log('masuk');
            }


            if (error == "") {

                document.getElementById("checkBtn").setAttribute("type", "submit");
                return true;
                } else {
                document.getElementById("checkBtn").setAttribute("type", "button");

                return false;
                }
        }
    </script>
@endsection
