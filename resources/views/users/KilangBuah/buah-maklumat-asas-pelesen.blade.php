@extends('layouts.main')

<style>
    .error {
        color: red;
        size: 80%
    }

    .hidden {
        display: none;
    }
</style>

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Maklumat Pelesen</h4>
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
        <div class="card" style="margin-right:3%; margin-left:3%">

            <div class="card-body">

                <div class=" text-center">
                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                    <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan
                        </i>
                    </h5>
                </div>
                <hr>
                {{-- @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif --}}
                <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '</i><b
                    style="color: red"> *</b><i>'</i>
                <form action="{{ route('buah.update.maklumat.asas.pelesen.cuba') }}" method="post" id="myform"
                        >
                    @csrf
                    <div class="container center" style="padding: 0%">
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label required col-formcenter">
                                    Alamat Premis Berlesen</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_ap1" class="form-control" maxlength=60
                                    oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                    oninput="this.setCustomValidity(''); valid_ap()"
                                    placeholder="Alamat Premis Berlesen 1" name="e_ap1" value="{{ $pelesen->e_ap1 }}"
                                    required>
                                <p type="hidden" id="err_ap" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>

                                <input type="text" id="e_ap2" class="form-control" maxlength=60
                                    placeholder="Alamat Premis Berlesen 2" name="e_ap2" value="{{ $pelesen->e_ap2 }}">

                                <input type="text" id="e_ap3" class="form-control" maxlength=60
                                    placeholder="Alamat Premis Berlesen 3" name="e_ap3" value="{{ $pelesen->e_ap3 }}">
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
                                <input type="text" id="e_as1" class="form-control" maxlength=60 required
                                    oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                    oninput="this.setCustomValidity(''); valid_as()"
                                    placeholder="Alamat Surat Menyurat 1" name="e_as1" value="{{ $pelesen->e_as1 }}">

                                <p type="hidden" id="err_as" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>

                                <input type="text" id="e_as2" class="form-control" maxlength=60
                                    placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                    value="{{ $pelesen->e_as2 ?? '' }}">


                                <input type="text" id="e_as3" class="form-control" maxlength=60
                                    placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                    value="{{ $pelesen->e_as3 ?? '' }}">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    No. Telefon (Pejabat / Kilang)</label>
                            </div>
                            <div class="col-md-7">
                                <input type="tel" id="e_notel" class="form-control" maxlength=40
                                    oninput="setCustomValidity(''); valid_notel()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                    value="{{ $pelesen->e_notel ?? '' }}" required
                                    onkeypress="return isNumberKey(event)">
                                <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi butiran
                                        di bahagian ini!</i></p>

                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label ">
                                    No. Faks</label>
                            </div>
                            <div class="col-md-7">
                                <input type="tel" id="e_nofax" class="form-control" maxlength=40
                                    placeholder="No. Faks" {{-- oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="setCustomValidity('')" --}}
                                    onkeypress="return isNumberKey(event)" name="e_nofax"
                                    value="{{ $pelesen->e_nofax }}">

                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Alamat Emel Kilang</label>
                            </div>
                            <div class="col-md-7">
                                <input type="email" id="e_email" class="form-control" maxlength=40
                                    oninput="setCustomValidity(''); valid_email()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" placeholder="Alamat Emel"
                                    name="e_email" value="{{ $pelesen->e_email }}">
                                <p type="hidden" id="err_email" style="color: red; display:none"><i>Sila isi butiran
                                        di bahagian ini!</i></p>

                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Nama Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npg" class="form-control" maxlength=60
                                    placeholder="Nama Pegawai Melapor"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_npg" required
                                    value="{{ $pelesen->e_npg }}" oninput="setCustomValidity(''); valid_npg()">
                                <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi butiran
                                        di bahagian ini!</i></p>

                                {{-- @error('e_npg')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Jawatan Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_jpg" class="form-control" maxlength=60
                                    oninput="setCustomValidity(''); valid_jpg()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                    placeholder="Jawatan Pegawai Melapor" name="e_jpg"
                                    value="{{ $pelesen->e_jpg }}">
                                <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi butiran
                                        di bahagian ini!</i></p>

                                {{-- @error('e_jpg')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    No. Telefon Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_notel_pg" maxlength=40 class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    onkeypress="return isNumberKey(event)"
                                    oninput="setCustomValidity(''); valid_notelpg()"
                                    placeholder="No. Telefon Pegawai Melapor" name="e_notel_pg"
                                    value="{{ $pelesen->e_notel_pg ?? '' }}" required>
                                <p type="hidden" id="err_notelpg" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>

                                {{-- <div id="phone_error" class="error hidden">Please enter a valid phone number</div> --}}
                            </div>
                            {{-- @error('e_notel_pg')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror --}}
                        </div>
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Alamat Emel Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="email" id="e_email_pg" maxlength=100 class="form-control"
                                    placeholder="Alamat Emel Pegawai Melapor" name="e_email_pg"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    oninput="setCustomValidity(''); valid_emailpg()"
                                    value="{{ $pelesen->e_email_pg }}" required multiple>
                                <p type="hidden" id="err_emailpg" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>

                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Nama Pegawai Bertanggungjawab</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npgtg" class="form-control" maxlength=60
                                    oninput="setCustomValidity(''); valid_npgtg()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                    value="{{ $pelesen->e_npgtg }}" required>
                                <p type="hidden" id="err_npgtg" style="color: red; display:none"><i>Sila isi butiran
                                        di bahagian ini!</i></p>

                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Jawatan Pegawai Bertanggungjawab</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_jpgtg" class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    oninput="setCustomValidity(''); valid_jpgtg()" maxlength=60
                                    placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                    value="{{ $pelesen->e_jpgtg }}" required>
                                <p type="hidden" id="err_jpgtg" style="color: red; display:none"><i>Sila isi butiran
                                        di bahagian ini!</i></p>

                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Alamat Emel Pengurus</label>
                            </div>
                            <div class="col-md-7">
                                <input type="email" id="e_email_pengurus" maxlength=100 class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    oninput="setCustomValidity(''); valid_emailpengurus()"
                                    placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                    value="{{ $pelesen->e_email_pengurus }}" required multiple>

                                <p type="hidden" id="err_emailpengurus" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>

                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Syarikat Induk</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_syktinduk" maxlength=60 class="form-control"
                                    oninput="setCustomValidity(''); valid_syktinduk()"
                                    title="Sila isi butiran di bahagian ini"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" placeholder="Syarikat Induk"
                                    name="e_syktinduk" value="{{ $pelesen->e_syktinduk ?? '' }}" required>
                                <p type="hidden" id="err_syktinduk" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                {{-- @error('e_syktinduk')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>


                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Kumpulan </label>
                            </div>
                            <div class="col-md-7">
                                <fieldset class="form-group">
                                    <select class="form-control" id="e_group" name="e_group" required
                                        oninput="setCustomValidity(''); valid_kumpulan()"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        <option selected value="">Sila Pilih Kumpulan</option>

                                        <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                            Kerajaan</option>
                                        <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                            Swasta</option>



                                        {{-- @else
                                        <option selected hidden disabled>Sila Pilih</option>
                                        <option value="GOV">Kerajaan</option>
                                        <option value="IND"> Swasta
                                    @endif --}}
                                    </select>
                                    <p type="hidden" id="err_group" style="color: red; display:none"><i>Sila buat
                                            pilihan di bahagian ini!</i></p>

                                </fieldset>
                                {{-- @error('e_group')
                                    <div class="alert alert-danger">
                                        <strong>Sila buat pilihan di bahagian ini</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    POMA </label>
                            </div>
                            <div class="col-md-7">
                                <fieldset class="form-group">
                                    <select class="form-control" id="e_poma" name="e_poma" required
                                        oninput="setCustomValidity(''); valid_poma()"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        <option selected value="">Sila Pilih POMA</option>
                                        <option {{ $pelesen->e_poma == 'Ya' ? 'selected' : '' }} value="Ya">
                                            Ya</option>
                                        <option {{ $pelesen->e_poma == 'Tidak' ? 'selected' : '' }} value="Tidak">
                                            Tidak</option>
                                    </select>
                                    <p type="hidden" id="err_poma" style="color: red; display:none"><i>Sila buat
                                            pilihan di bahagian ini!</i></p>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Kapasiti Pemprosesan / Tahun</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="kap_proses" maxlength=40 class="form-control"
                                    placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    onkeypress="return isNumberKey(event)"
                                    oninput="validate_two_decimal(this);setCustomValidity(''); valid_proses()"
                                    value=" {{ $pelesen->kap_proses }}" required>
                                <p type="hidden" id="err_proses" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>

                            </div>
                        </div>


                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <span></span>
                            </div>
                            <div class="col-md-7">
                                <span>CPO</span>
                            </div>

                        </div>



                        <div class="row justify-content-center" style="margin:0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Bilangan Tangki</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name='bil_tangki_cpo' style="width:20%"
                                    oninput="setCustomValidity('')" id="bil_tangki_cpo" required
                                    title="Sila isikan butiran ini." min="1"
                                    oninvalid="setCustomValidity('Nilai bilangan tangki mestilah tidak kurang dari satu (1)')"
                                    onkeypress="return isNumberKey(event)" value="{{ $pelesen->bil_tangki_cpo }}"
                                    required>
                                    <p type="hidden" id="err_bil_tangki" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                {{-- @error('bil_tangki_cpo')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>


                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Kapasiti Tangki Simpanan (Tan)</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name='kap_tangki_cpo' style="width:20%"
                                    oninput="setCustomValidity(''); " id="kap_tangki_cpo" required min="1"
                                    title="Sila isikan butiran ini."
                                    oninvalid="setCustomValidity('Nilai kapasiti tangki simpanan mestilah tidak kurang dari satu (1)')"
                                    onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_tangki_cpo }}"
                                    required>
                                    <p type="hidden" id="err_kap_tangki" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                {{-- @error('kap_tangki_cpo')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div><br><br>


                        </div>
                        <div class="row justify-content-center">
                            <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                khusus untuk sesuatu produk. Sila campurkan kesemua
                                bilangan dan kapasiti tangki dan lapor dalam kategori Others
                            </i>
                        </div>

                    </div>


                    <div class="row form-group justify-content-center" style="margin-top: 2%">
                        <button type="button" class="btn btn-primary" data-toggle="modal" onclick="check()"
                            data-target="#next">Simpan</button>
                    </div>

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
                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal"
                                        id="checkBtn">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Ya</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        @endsection

        @section('scripts')
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".floatNumberField").change(function() {
                        $(this).val(parseFloat($(this).val()).toFixed(2));
                    });
                });
            </script>
            <script>
                var input = document.getElementById("kap_proses");
                var lastValue = "";

                input.addEventListener("keydown", valueCheck);
                input.addEventListener("keyup", valueCheck);

                function valueCheck() {
                    if (input.value.match(/^[0-9]*$/))
                        lastValue = input.value;
                    else
                        input.value = lastValue;
                }
            </script>
            <script>
                function valid_ap() {

                    if ($('#e_ap1').val() == '') {
                        $('#e_ap1').css('border-color', 'red');
                        document.getElementById('err_ap').style.display = "block";


                    } else {
                        $('#e_ap1').css('border-color', '');
                        document.getElementById('err_ap').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_as() {

                    if ($('#e_as1').val() == '') {
                        $('#e_as1').css('border-color', 'red');
                        document.getElementById('err_as').style.display = "block";


                    } else {
                        $('#e_as1').css('border-color', '');
                        document.getElementById('err_as').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_notel() {

                    if ($('#e_notel').val() == '') {
                        $('#e_notel').css('border-color', 'red');
                        document.getElementById('err_notel').style.display = "block";


                    } else {
                        $('#e_notel').css('border-color', '');
                        document.getElementById('err_notel').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_email() {

                    if ($('#e_email').val() == '') {
                        $('#e_email').css('border-color', 'red');
                        document.getElementById('err_email').style.display = "block";


                    } else {
                        $('#e_email').css('border-color', '');
                        document.getElementById('err_email').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_npg() {

                    if ($('#e_npg').val() == '') {
                        $('#e_npg').css('border-color', 'red');
                        document.getElementById('err_npg').style.display = "block";


                    } else {
                        $('#e_npg').css('border-color', '');
                        document.getElementById('err_npg').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_jpg() {

                    if ($('#e_jpg').val() == '') {
                        $('#e_jpg').css('border-color', 'red');
                        document.getElementById('err_jpg').style.display = "block";


                    } else {
                        $('#e_jpg').css('border-color', '');
                        document.getElementById('err_jpg').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_notelpg() {

                    if ($('#e_notel_pg').val() == '') {
                        $('#e_notel_pg').css('border-color', 'red');
                        document.getElementById('err_notelpg').style.display = "block";


                    } else {
                        $('#e_notel_pg').css('border-color', '');
                        document.getElementById('err_notelpg').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_emailpg() {

                    if ($('#e_email_pg').val() == '') {
                        $('#e_email_pg').css('border-color', 'red');
                        document.getElementById('err_emailpg').style.display = "block";


                    } else {
                        $('#e_email_pg').css('border-color', '');
                        document.getElementById('err_emailpg').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_npgtg() {

                    if ($('#e_npgtg').val() == '') {
                        $('#e_npgtg').css('border-color', 'red');
                        document.getElementById('err_npgtg').style.display = "block";


                    } else {
                        $('#e_npgtg').css('border-color', '');
                        document.getElementById('err_npgtg').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_jpgtg() {

                    if ($('#e_jpgtg').val() == '') {
                        $('#e_jpgtg').css('border-color', 'red');
                        document.getElementById('err_jpgtg').style.display = "block";


                    } else {
                        $('#e_jpgtg').css('border-color', '');
                        document.getElementById('err_jpgtg').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_emailpengurus() {

                    if ($('#e_email_pengurus').val() == '') {
                        $('#e_email_pengurus').css('border-color', 'red');
                        document.getElementById('err_emailpengurus').style.display = "block";


                    } else {
                        $('#e_email_pengurus').css('border-color', '');
                        document.getElementById('err_emailpengurus').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_syktinduk() {

                    if ($('#e_syktinduk').val() == '') {
                        $('#e_syktinduk').css('border-color', 'red');
                        document.getElementById('err_syktinduk').style.display = "block";


                    } else {
                        $('#e_syktinduk').css('border-color', '');
                        document.getElementById('err_syktinduk').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_kumpulan() {

                    if ($('#e_group').val() == '') {
                        $('#e_group').css('border-color', 'red');
                        document.getElementById('err_group').style.display = "block";


                    } else {
                        $('#e_group').css('border-color', '');
                        document.getElementById('err_group').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_poma() {

                    if ($('#e_poma').val() == '') {
                        $('#e_poma').css('border-color', 'red');
                        document.getElementById('err_poma').style.display = "block";


                    } else {
                        $('#e_poma').css('border-color', '');
                        document.getElementById('err_poma').style.display = "none";

                    }

                }
            </script>
            <script>
                function valid_proses() {

                    if ($('#kap_proses').val() == '') {
                        $('#kap_proses').css('border-color', 'red');
                        document.getElementById('err_proses').style.display = "block";


                    } else {
                        $('#kap_proses').css('border-color', '');
                        document.getElementById('err_proses').style.display = "none";

                    }

                }
            </script>

            {{-- <script>
            function validatePhoneNumber(input_str) {
                var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

                return re.test(input_str);
            }

            function validateForm(event) {
                var phone = document.getElementById('myform_phone').value;
                if (!validatePhoneNumber(phone)) {
                    toastr.error('Sila masukkan nombor telefon yang betul', 'Ralat!', {
                        "progressBar": true
                    })
                } else {
                    document.getElementById('phone_error').classList.add('hidden');
                    // alert("validation success")
                }
                event.preventDefault();
            }

            document.getElementById('myform').addEventListener('submit', validateForm);
        </script> --}}


            <script>
                function check() {
                    // (B1) INIT
                    var error = "",
                        field = "";

                    // alamat premis 1500403125000
                    field = document.getElementById("kap_proses");
                    if (!field.checkValidity()) {
                        // error += "Name must be 2-4 characters\r\n";
                        $('#kap_proses').css('border-color', 'red');
                        document.getElementById('err_proses').style.display = "block";
                    }

                    // alamat premis 1
                    field = document.getElementById("e_ap1");
                    if (!field.checkValidity()) {
                        $('#e_ap1').css('border-color', 'red');
                        document.getElementById('err_ap').style.display = "block";
                    }

                    // alamat surat-menyurat 1
                    field = document.getElementById("e_as1");
                    if (!field.checkValidity()) {
                        $('#e_as1').css('border-color', 'red');
                        document.getElementById('err_as').style.display = "block";
                    }

                    // no tel kilang
                    field = document.getElementById("e_notel");
                    if (!field.checkValidity()) {
                        $('#e_notel').css('border-color', 'red');
                        document.getElementById('err_notel').style.display = "block";
                    }

                    // email kilang
                    field = document.getElementById("e_email");
                    if (!field.checkValidity()) {
                        $('#e_email').css('border-color', 'red');
                        document.getElementById('err_email').style.display = "block";
                    }

                    // nama pegawai melapor
                    field = document.getElementById("e_npg");
                    if (!field.checkValidity()) {
                        $('#e_npg').css('border-color', 'red');
                        document.getElementById('err_npg').style.display = "block";
                    }

                    // jawatan pegawai melapor
                    field = document.getElementById("e_jpg");
                    if (!field.checkValidity()) {
                        $('#e_jpg').css('border-color', 'red');
                        document.getElementById('err_jpg').style.display = "block";
                    }

                    // no tel pegawai melapor
                    field = document.getElementById("e_notel_pg");
                    if (!field.checkValidity()) {
                        $('#e_notel_pg').css('border-color', 'red');
                        document.getElementById('err_notelpg').style.display = "block";
                    }

                    // email pegawai melapor
                    field = document.getElementById("e_email_pg");
                    if (!field.checkValidity()) {
                        $('#e_email_pg').css('border-color', 'red');
                        document.getElementById('err_emailpg').style.display = "block";
                    }

                    // nama pegawai bertanggungjawab
                    field = document.getElementById("e_npgtg");
                    if (!field.checkValidity()) {
                        $('#e_npgtg').css('border-color', 'red');
                        document.getElementById('err_npgtg').style.display = "block";
                    }

                    // jawatan pegawai bertanggungjawab
                    field = document.getElementById("e_jpgtg");
                    if (!field.checkValidity()) {
                        $('#e_jpgtg').css('border-color', 'red');
                        document.getElementById('err_jpgtg').style.display = "block";
                    }

                    // emel pengurus
                    field = document.getElementById("e_email_pengurus");
                    if (!field.checkValidity()) {
                        $('#e_email_pengurus').css('border-color', 'red');
                        document.getElementById('err_emailpengurus').style.display = "block";
                    }

                    // syarikat induk
                    field = document.getElementById("e_syktinduk");
                    if (!field.checkValidity()) {
                        $('#e_syktinduk').css('border-color', 'red');
                        document.getElementById('err_syktinduk').style.display = "block";
                    }

                    // kumpulan
                    field = document.getElementById("e_group");
                    if (!field.checkValidity()) {
                        $('#e_group').css('border-color', 'red');
                        document.getElementById('err_group').style.display = "block";
                    }

                    // poma
                    field = document.getElementById("e_poma");
                    if (!field.checkValidity()) {
                        $('#e_poma').css('border-color', 'red');
                        document.getElementById('err_poma').style.display = "block";
                    }

                    // POMA
                    // field = document.getElementById("e_poma");
                    // if (!field.checkValidity()) {
                    //     error += "Name must be 2-4 characters\r\n";
                    // }

                    // (B4) RESULT
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
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#checkBtn').click(function() {
                        // checked = $("input[type=checkbox]:checked").length;
                        tangki = $('#bil_tangki_cpo').val();

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
                document.addEventListener('keypress', function(e) {
                    if (e.keyCode === 13 || e.which === 13) {
                        e.preventDefault();
                        return false;
                    }

                });
            </script>
            <script>
                let bilangan = document.querySelector("#bil_tangki_cpo");
                let kapasiti = document.querySelector("#kap_tangki_cpo");
                kapasiti.disabled = true;
                bilangan.addEventListener("change", stateHandle);

                function stateHandle() {
                    if (document.querySelector("#bil_tangki_cpo").value === "" || document.querySelector("#bil_tangki_cpo")
                        .value === "0") {
                        kapasiti.disabled = true;
                        document.querySelector("#kap_tangki_cpo").value = "0";

                    } else {
                        kapasiti.disabled = false;
                    }
                }
            </script>

            </body>

            </html>
        @endsection
