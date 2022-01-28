@extends($layout)

@section('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-5 mb-2 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian II</h3>
                                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Kadar Perahan CPKO, Kadar Perolehan PKC, Jam Pengilangan dan Penggunaan Kapasiti</h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>



                                    <div class=" mt-2" style="text-align: right">
                                        <a href="{{ asset('manual/kilangisirung/2.pdf') }}" target="_blank"
                                            style="text-align:right"><i><u>Panduan
                                                    Mengisi Maklumat Bahagian II</u></i></a>
                                    </div>
                                    <form>
                                        @csrf
                                        <div class="container center mt-3">
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">i.
                                                    Kadar Perahan Minyak Isirung Sawit Mentah (CPKO) </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='jam_pengilangan' style="margin-left:42%; width:40%"
                                                        onkeypress="return isNumberKey(event)" id="jam_pengilangan" required
                                                        title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div>
                                                %
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">ii.
                                                    Kadar
                                                    Perahan MKSM (OER) Yang Diperolehi</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='kadar_perahan_mksm' style="margin-left:42%; width:40%"
                                                        onkeypress="return isNumberKey(event)" id="kadar_perahan_mksm"
                                                        required title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">iii.
                                                    Kadar Perolehan Isirung (KER)</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='kadar_perolehan_isirung' style="margin-left:42%; width:40%"
                                                        onkeypress="return isNumberKey(event)" id="kadar_perolehan_isirung"
                                                        required title="Sila isikan butiran ini.">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">iv.
                                                    Harga Purata Belian Buah Kelapa Sawit (FFB)</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name='harga_purata_buah_sawit' style="margin-left:42%; width:40%"
                                                        onkeypress="return isNumberKey(event)" id="harga_purata_buah_sawit"
                                                        placeholder="RM" required title="Sila isikan butiran ini.">
                                                    <p style="margin-left:42%;"><i>(1% Kadar Perahan)</i></p>
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">v.
                                                    Kadar OER</label>
                                                <div class="col-md-3" style="margin-left:20%; width:22%">
                                                    <fieldset class="form-group">
                                                        <select name="kadar_oer" class="form-select" id="kadar_oer"
                                                            onchange="showTable()">
                                                            <option selected hidden disabled>Sila Pilih Kadar OER</option>
                                                            <option value="Meningkat">Meningkat</option>
                                                            <option value="Menurun">Menurun</option>
                                                        </select>
                                                    </fieldset>
                                                    {{-- <input type="text" class="form-control" name='kadar_oer'
                                                    id="kadar_oer" placeholder="Harga Purata Belian Buah Kelapa Sawit (FFB)"
                                                    required title="Sila isikan butiran ini."> --}}
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                        </div>



                                        {{-- kadar oer meningkat --}}
                                        <div class="row" id="table-bordered">
                                            <div class="col-12">
                                                <div id="meningkat_container" style="display:none">
                                                    <div class="card">

                                                        <div class="card-content">


                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">
                                                                    <thead style="text-align: center">
                                                                        <tr>
                                                                            <th>Sebab-Sebab OER Meningkat</th>
                                                                            <th>Tanda (&#10004;)</th>



                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-bold-500">a.
                                                                                Buah berkualiti</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox1"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">b. Kesan dari cuaca
                                                                                yang
                                                                                baik</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox2"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">c. Proses kitar
                                                                                semula
                                                                                minyak</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox3"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">d. Kecekapan kilang /
                                                                                mesin</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox4"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">e. Proses
                                                                                pengendalian
                                                                                bks yang minima <i>(Less ffb handling)</i>
                                                                            </td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox5"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">f. Proses lebih buah
                                                                                lerai</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox6"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" style=""><button
                                                                                    class="btn btn-primary" type="reset"
                                                                                    style="background-color: transparent; color:#275047; float:right">Padam</button>
                                                                            </td>
                                                                            {{-- <button class="btn btn-primary">Padam</button> --}}
                                                                        </tr>
                                                                        {{-- <tr>
                                                                        <td class="text-bold-500">G.
                                                                            Stok Akhir Di Premis</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10">
                                                                        </td>

                                                                    </tr> --}}
                                                                    </tbody>
                                                                </table>






                                                            </div>



                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-12" style="margin-bottom:-5%">
                                                            <div class="form-group">
                                                                <label class="control-label col-form-label"
                                                                    for="lain-sebab">Lain-Lain Sebab OER, Sila Nyatakan
                                                                    <i>(Max.
                                                                        100 character)</i></label>
                                                                <input type="text" id="lain-sebab" class="form-control"
                                                                    maxlength="100" name="lain-sebab">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>








                                                {{-- Kadar OER menurun --}}
                                                <div id="menurun_container" style="display:none">

                                                    <div class="card">

                                                        <div class="card-content">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">
                                                                    <thead style="text-align: center">
                                                                        <tr>
                                                                            <th>Sebab-Sebab OER Menurun</th>
                                                                            <th>Tanda (&#10004;)</th>



                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-bold-500">a.
                                                                                Tiada / Kurang buah berkualiti</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox7"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">b. Kesan cuaca kering
                                                                            </td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox8"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">c. Jerebu</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox9"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">d. Kesan penerimaan
                                                                                hujan
                                                                                yang berlebihan</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox10"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">e. Banjir</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox11"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">f. Buah dari ladang
                                                                                baru
                                                                                berhasil</td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox12"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">g. Kurang buah lerai
                                                                            </td>
                                                                            <td style="text-align:center;">
                                                                                <input type="checkbox" id="checkbox13"
                                                                                    style=" width: 25px;
                                                                                                                                    height: 25px;"
                                                                                    class='form-check-input'>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" style=""><button
                                                                                    class="btn btn-primary" type="reset"
                                                                                    style="background-color: transparent; color:#275047; float:right">Padam</button>
                                                                            </td>
                                                                            {{-- <button class="btn btn-primary">Padam</button> --}}
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12" style="margin-bottom:-5%">
                                                            <div class="form-group">
                                                                <label class="control-label col-form-label"
                                                                    for="lain-sebab">Lain-Lain Sebab OER, Sila Nyatakan
                                                                    <i>(Max.
                                                                        100 character)</i></label>
                                                                <input type="text" id="lain-sebab" class="form-control"
                                                                    name="lain-sebab" maxlength="100">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>


                                                    </div>


                                                </div>
                                                <br>
                                                <br>



                                                {{-- <div class="row form-group" style="padding-top: 5%; ">


                                                    <div class="text-left col-md-5">
                                                        <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                                            style="float: left">Sebelumnya</a>
                                                    </div>
                                                    <div class="text-right col-md-7 mb-4 ">
                                                        <button type="button" class="btn btn-primary " data-toggle="modal"
                                                            style="float: right" data-target="#confirmation">Simpan &
                                                            Seterusnya</button>
                                                    </div>

                                                </div> --}}
                                                {{-- Hidden Gap - Just Ignore --}}
                                                {{-- <div class="alert alert-white" style="text-align: center;"></div> --}}
                                                {{-- <div style="padding: 25px;"></div> --}}
                                            </div>

                                            {{-- <div class="row" > --}}

                                            <div class="row form-group" style="padding-top: 10px; ">


                                                <div class="text-left col-md-5">
                                                    <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                                        style="float: left">Sebelumnya</a>
                                                </div>
                                                <div class="text-right col-md-7 mb-4 ">
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        style="float: right" data-bs-target="#exampleModalCenter">Simpan &
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
                                                            <button type="button" class="close"
                                                                data-bs-dismiss="modal" aria-label="Close">
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
                                                                <span class="d-none d-sm-block"
                                                                    style="color:#275047">Tidak</span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary ml-1"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Ya</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </div> --}}

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>




        </div>


    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    </body>

    </html>

    <script type="text/javascript">
        function showTable() {
            var oer = $('#kadar_oer').val();
            // console.log(oer);

            if (oer == "Meningkat") {
                document.getElementById('meningkat_container').style.display = "block";
            } else {
                document.getElementById('meningkat_container').style.display = "none";
                document.getElementById("checkbox1").checked = false;
                document.getElementById("checkbox2").checked = false;
                document.getElementById("checkbox3").checked = false;
                document.getElementById("checkbox4").checked = false;
                document.getElementById("checkbox5").checked = false;
                document.getElementById("checkbox6").checked = false;
            }

            if (oer == "Menurun") {
                document.getElementById('menurun_container').style.display = "block";
            } else {
                document.getElementById('menurun_container').style.display = "none";
                document.getElementById("checkbox7").checked = false;
                document.getElementById("checkbox8").checked = false;
                document.getElementById("checkbox9").checked = false;
                document.getElementById("checkbox10").checked = false;
                document.getElementById("checkbox11").checked = false;
                document.getElementById("checkbox12").checked = false;
                document.getElementById("checkbox13").checked = false;
            }
        }
    </script>

@endsection
