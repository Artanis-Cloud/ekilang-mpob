@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper" style="transition: 0s;">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Maklumat Pelesen</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex justify-content-end">
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
        <div class="card" style="margin-right:3%; margin-left:3%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-4 col-12"> --}}
                <div class="" style="padding: 2%">

                    <div class=" text-center">
                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan </i>
                        </h5>
                        {{-- <p>Maklumat Kilang</p> --}}
                    </div>
                    <hr>
                    <i>Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda ' </i><b style="color: red"> *
                    </b><i>'</i>
                    <form action="{{ route('isirung.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}" method="post" onsubmit="return check()" novalidate>
                        @csrf
                        <div class="container center mt-5">
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label required col-form-label">
                                        Alamat Premis Berlesen</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_ap1" class="form-control" maxlength="60" autocomplete="off"
                                        placeholder="Alamat Premis Berlesen 1" name="e_ap1" value="{{ $pelesen->e_ap1 }}" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity('')"
                                        required >
                                    @error('e_ap1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap2" class="form-control" maxlength="60"
                                        autocomplete="off" placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                        value="{{ $pelesen->e_ap2 }}">
                                    @error('e_ap2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap3" class="form-control" maxlength="60"
                                        placeholder="Alamat Premis Berlesen 3" name="e_ap3"
                                        value="{{ $pelesen->e_ap3 }}">
                                    @error('e_ap3')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px"></div>
                                <div class="col-md-7">
                                    <input onchange="alamat();" type="checkbox" class="custom-control-input"
                                        id="alamat_sama" name="alamat_sama"
                                        {{ old('alamat_sama') == 'on' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="alamat_sama">Alamat sama seperti di
                                        atas</label>

                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Alamat Surat Menyurat</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_as1" class="form-control" autocomplete="off"
                                        placeholder="Alamat Surat Menyurat 1" name="e_as1"
                                        value="{{ $pelesen->e_as1 }}" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')">
                                    @error('e_as1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_as2" class="form-control" maxlength="60"
                                        autocomplete="off" placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                        value="{{ $pelesen->e_as2 }}">
                                    @error('e_as2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_as3" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                        value="{{ $pelesen->e_as3 }}">
                                    @error('e_as3')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        No. Telefon (Pejabat / Kilang)</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_notel" class="form-control" maxlength="40"
                                        placeholder="No. Telefon Pejabat / Kilang" name="e_notel"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen->e_notel }}" onkeypress="return isNumberKey(event)" required>
                                    @error('e_notel')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label">
                                        No. Faks</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_nofax" class="form-control" placeholder="No. Faks"
                                        maxlength="40" onkeypress="return isNumberKey(event)" name="e_nofax"
                                        value="{{ $pelesen->e_nofax }}">
                                    @error('e_nofax')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Alamat Emel Kilang</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="email" id="e_email" class="form-control" placeholder="Alamat Emel" maxlength="60"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        name="e_email" value="{{ $pelesen->e_email }}" required>
                                    @error('e_email')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Nama Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_npg" class="form-control" maxlength="60"
                                        placeholder="Nama Pegawai Melapor" name="e_npg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen->e_npg }}" required>
                                    @error('e_npg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Jawatan Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_jpg" class="form-control" maxlength="60"
                                        placeholder="Jawatan Pegawai Melapor" name="e_jpg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen->e_jpg }}" required>
                                    @error('e_jpg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        No. Telefon Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_notel_pg" class="form-control" maxlength="40"
                                        placeholder="No. Telefon Pegawai Melapor"
                                        name="e_notel_pg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)"  value="{{ $pelesen->e_notel_pg }}" required>
                                    @error('e_notel_pg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Alamat Emel Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_email_pg" class="form-control" maxlength="100"
                                            placeholder="Alamat Emel Pegawai Melapor"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                            name="e_email_pg" value="{{ $pelesen->e_email_pg }}" required >
                                    @error('e_email_pg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Nama Pegawai Bertanggungjawab</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_npgtg" class="form-control" maxlength="60"
                                        placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen->e_npgtg }}" required>
                                    @error('e_npgtg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Jawatan Pegawai
                                        Bertanggungjawab</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_jpgtg" class="form-control" maxlength="60"
                                        placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen->e_jpgtg }}" required>
                                    @error('e_jpgtg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Alamat Emel Pengurus</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="email" id="e_email_pengurus" class="form-control" maxlength="100"
                                        placeholder="Alamat Emel Pengurus" name="e_email_pengurus" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen->e_email_pengurus  }}" required multiple>


                                    @error('e_email_pengurus')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Syarikat Induk</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_syktinduk" class="form-control" maxlength="60"
                                        placeholder="Syarikat Induk" name="e_syktinduk" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        value="{{ $pelesen->e_syktinduk}}" required>
                                    @error('e_syktinduk')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Kumpulan </label>
                                </div>
                                <div class="col-md-7">
                                    <fieldset class="form-group" >
                                        <select class="form-control" id="e_group" name="e_group" required>

                                            <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                Kerajaan</option>
                                            <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                Swasta</option>
                                        </select>
                                    </fieldset>
                                    @error('e_group')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Kapasiti Pemprosesan / Tahun</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="kap_proses" class="form-control"
                                        placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_proses }}">

                                    @error('kap_proses')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <span></span>
                                </div>
                                <div class="col-md-7">
                                    <span>CPKO</span>
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Bilangan Tangki</label>
                                </div>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name='bil_tangki_cpko' style="width:20%"
                                        id="bil_tangki_cpko" title="Sila isikan butiran ini."
                                        onkeypress="return isNumberKey(event)" value="{{ $pelesen->bil_tangki_cpko }}"
                                        required>
                                    @error('bil_tangki_cpko')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label required">
                                        Kapasiti Tangki Simpanan (Tan)</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name='kap_tangki_cpko'
                                        style="width:20%" id="kap_tangki_cpko"
                                        title="Sila isikan butiran ini." oninput="validate_two_decimal(this)"
                                        onkeypress="return isNumberKey(event)"  value="{{ $pelesen->kap_tangki_cpko}}" required>
                                    @error('kap_tangki_cpko')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <br><br>
                            <div class="row ">
                                <i style="margin-left:7%;margin-right:7%">Nota: Sekiranya kilang/pelesen tiada
                                    tangki simpanan khusus untuk sesuatu produk. Sila campurkan kesemua
                                    bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                </i>
                            </div>
                        </div>
                </div>


                <div class="row justify-content-center form-group" style="margin-top: 2%">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#next">Simpan</button>
                </div>

            </div>

            <div class="modal fade" id="next" tabindex="-1" role="dialog"
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
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" data="modal" id="checkBtn">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ya</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>


            {{-- </div> --}}

            <br>
            </section><!-- End Hero -->

            {{-- <div id="preloader"></div> --}}
            <a href="#" class="back-to-top d-flex justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


            <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
            <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
            <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
            <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('theme/js/app.js') }}"></script>

            <script src="assets/js/main.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".floatNumberField").change(function() {
                        $(this).val(parseFloat($(this).val()).toFixed(2));
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#checkBtn').click(function() {
                        tangki = $('#bil_tangki_cpko').val();

                        if (!tangki || !(tangki > 0)) {
                            console.log('lain');

                            toastr.error(
                                'Bilangan tangki hendaklah lebih dari 0',
                                'Ralat!', {
                                    "progressBar": true
                                })
                            return false;
                        }

                    });
                });
            </script>
            <script>
                let bilangan = document.querySelector("#bil_tangki_cpko");
                let kapasiti = document.querySelector("#kap_tangki_cpko");
                kapasiti.disabled = true;
                bilangan.addEventListener("change", stateHandle);

                function stateHandle() {
                    if (document.querySelector("#bil_tangki_cpko").value === "" || document.querySelector("#bil_tangki_cpko").value === "0") {
                        kapasiti.disabled = true;
                    } else {
                        kapasiti.disabled = false;
                    }
                }

            </script>
            <script>
                function check() {
                    // (B1) INIT
                    var error = "",
                        field = "";

                    // alamat premis 1
                    field = document.getElementById("e_ap1");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // alamat surat-menyurat 1
                    field = document.getElementById("e_as1");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // no tel kilang
                    field = document.getElementById("e_notel");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // email kilang
                    field = document.getElementById("e_email");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // nama pegawai melapor
                    field = document.getElementById("e_npg");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // jawatan pegawai melapor
                    field = document.getElementById("e_jpg");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // no tel pegawai melapor
                    field = document.getElementById("e_notel_pg");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // email pegawai melapor
                    field = document.getElementById("e_email_pg");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // nama pegawai bertanggungjawab
                    field = document.getElementById("e_npgtg");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // emel pengurus
                    field = document.getElementById("e_email_pengurus");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // syarikat induk
                    field = document.getElementById("e_syktinduk");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // kumpulan
                    field = document.getElementById("e_group");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap proses
                    field = document.getElementById("kap_proses");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki cpko
                    field = document.getElementById("bil_tangki_cpko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap_tangki cpko
                    field = document.getElementById("kap_tangki_cpko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }

                    // POMA
                    // field = document.getElementById("e_poma");
                    // if (!field.checkValidity()) {
                    //     error += "Name must be 2-4 characters\r\n";
                    // }

                    // (B4) RESULT
                    if (error == "") {
                        return true;
                    } else {
                        toastr.error(
                            'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                            'Ralat!', {
                                "progressBar": true
                            })
                        return false;
                    }

                    // if (error == "") {
                    //     return true;
                    // } else {
                    //     toastr.error(
                    //         'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
                    //         'Ralat!', {
                    //             "progressBar": true
                    //         })
                    //     return false;
                    // }
                }
            </script>
            {{-- <script>
        function readonlyalamat() {
            // var checkedValue = $('#alamat_sama').val();
            var x = $("#alamat_sama").is(":checked");

            if (x == true) {

                //Get
                var bla = $('#e_ap1').val();
                //Set
                $('#e_as1').val(bla).attr("disabled", "disabled");
                $('#e_as1').val("");
                //get
                var bla = $('#e_ap2').val();
                //Set
                $('#e_as2').val(bla).attr("disabled", "disabled");
                $('#e_as2').val("");

                //get

            } else {
                // document.getElementById("#alamat_surat_menyurat_1").readOnly = false;
                $('#e_as1').attr("disabled", false)
                $('#e_as2').attr("disabled", false)



            }
        }
    </script> --}}

            <script>
                function alamat() {
                    var x = $("#alamat_sama").is(":checked");

                    if (x == true) {
                        //Get
                        var bla = $('#e_ap1').val();
                        //Set
                        $('#e_as1').val(bla).attr("disabled", "disabled");
                        $('#e_as1').val("");
                        //get
                        var bla = $('#e_ap2').val();
                        //Set
                        $('#e_as2').val(bla).attr("disabled", "disabled");
                        $('#e_as2').val("");

                        var bla = $('#e_ap3').val();
                        //Set
                        $('#e_as3').val(bla).attr("disabled", "disabled");
                        $('#e_as3').val("");

                        // $("#alamat_surat_menyurat_daerah").remove();
                        // $("#test1").append(html);

                    } else {
                        // document.getElementById("#alamat_surat_menyurat_1").readOnly = false;

                        $('#e_as1').attr("disabled", false)
                        $('#e_as2').attr("disabled", false)
                        $('#e_as3').attr("disabled", false)

                    }
                    var e_ap1 = document.getElementById("e_ap1"),
                        e_as1 = document.getElementById("e_as1");
                    e_as1.value = e_ap1.value;

                    var e_ap2 = document.getElementById("e_ap2"),
                        e_as2 = document.getElementById("e_as2");
                    e_as2.value = e_ap2.value;

                    var e_ap3 = document.getElementById("e_ap3"),
                        e_as3 = document.getElementById("e_as3");
                    e_as3.value = e_ap3.value;


                }
            </script>
            </body>

            </html>
        @endsection
