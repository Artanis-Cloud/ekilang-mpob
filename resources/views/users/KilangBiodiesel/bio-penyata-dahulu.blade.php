@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Penyata Dahulu</h4>
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

                <div class="">
                    <form action="{{ route('bio.penyata.dahulu.process') }}" method="post" novalidate>
                        @csrf
                        <div class="text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Terdahulu</h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Senarai Penyata Bulanan Terdahulu</h5>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>
                        <div class="container center mt-2">
                            <div class="row justify-content-center">
                                <div class="col-sm-2">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Sila Pilih Tahun</label>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="tahun" name="tahun" oninput="valid_tahun()" required>
                                            <option selected hidden disabled value="">Sila Pilih Tahun</option>
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
                                <div class="col-sm-2" >
                                    <label for="fname"
                                    class="control-label col-form-label required">Bulan
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="bulan" name="bulan" oninput="valid_bulan()" required>
                                            <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Mac</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Julai</option>
                                            <option value="8">Ogos</option>
                                            <option value="9">September</option>
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

                        <div class="row justify-content-center form-group" style="padding-top: 20px; ">
                            <button type="submit" class="btn btn-primary " id="checkBtn" onclick="check()">Papar
                                    Penyata</button>
                        </div>
                    </form>
                    <br>
                </div> <br><br>
            </div>

            {{-- <div id="preloader"></div> --}}
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
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
          <script type="text/javascript">
            window.onload = function () {
                //Reference the DropDownList.
                var ddlYears = document.getElementById("date-dropdown");

                //Determine the Current Year.
                var currentYear = (new Date()).getFullYear();

                //Loop and add the Year values to DropDownList.
                for (var i = 2004; i <= currentYear; i++) {
                    var option = document.createElement("OPTION");
                    option.innerHTML = i;
                    option.value = i;
                    ddlYears.appendChild(option);
                }
            };
        </script>
        @endsection

