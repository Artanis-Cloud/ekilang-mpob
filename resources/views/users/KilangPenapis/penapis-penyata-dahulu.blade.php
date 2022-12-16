@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3 mt-2">
            <div class="row">
                <div class="col-4 align-self-center">
                    <h4 class="page-title">Penyata Dahulu</h4>
                </div>
                <div class="col-8 align-self-center">
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
                <div style="padding: 2%">
                    <form action="{{ route('penapis.penyata.dahulu.process') }}" method="post" novalidate>
                        @csrf
                        <div class="text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Terdahulu</h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Senarai Penyata Bulanan Terdahulu</h5>
                        </div>
                        <hr>


                        <div class="container center ">
                            <div class="row justify-content-center">
                                <div class="col-sm-2 form-group" >
                                        <label for="fname"
                                    class="control-label col-form-label required ">
                                    Sila Pilih Tahun</label>
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="tahun" name="tahun" required oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')" oninput="this.setCustomValidity(''); valid_tahun()">
                                            <option selected hidden disabled value="" >Sila Pilih Tahun</option>
                                            @for ($i = 2004; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                        </select>
                                        <p type="hidden" id="err_tahun" style="color: red; display:none"><i>Sila buat pilihan
                                            di
                                            bahagian ini!</i></p>
                                    </fieldset>
                                    {{-- @error('alamat_kilang_1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="row justify-content-center" >
                                <div class="col-sm-2 form-group" >
                                    <label for="fname"
                                    class="control-label col-form-label required "> Sila Pilih Bulan
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="bulan" name="bulan" required onclick="valid_bulan()">
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
                                    {{-- @error('alamat_kilang_1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>

                        </div>
                        </div>
                        <div class="row justify-content-center form-group"  >
                                <button type="submit" class="btn btn-primary" id="checkBtn" onclick="check()">Papar Penyata</button>
                        </div>
                    </form><br>
            </div>


@endsection
@section('scripts')
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
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

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



            // (B4) RESULT
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
