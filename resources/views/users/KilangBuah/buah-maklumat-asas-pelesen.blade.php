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
                <div class="pl-3">

                    <div class=" text-center">
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan
                            </i>
                        </h5>
                    </div>
                    <hr>
                    <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '</i><b
                        style="color: red"> *</b><i>'</i>
                    <form action="{{ route('buah.update.maklumat.asas.pelesen') }}" method="post" id="myform"  onsubmit="return check()" novalidate>
                        @csrf
                        <div class="container center mt-5">
                            <div class="row" style="margin-bottom:2.5%; margin-top:-2%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label required col-form-label align-items-center">
                                    Alamat Premis Berlesen</label>
                                <div class="col-md-6">
                                    <input type="text"  id="e_ap1" class="form-control"  oninput="setCustomValidity('')"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Premis Berlesen 1" name="e_ap1"
                                        value="{{ $pelesen->e_ap1 ?? '' }}" required>
                                    @error('e_ap1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%; ">
                                    <input type="text" id="e_ap2" class="form-control" oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                        value="{{ $pelesen->e_ap2 ?? '' }}">
                                    @error('e_ap2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%;">
                                    <input type="text" id="e_ap3" class="form-control" oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Premis Berlesen 3" name="e_ap3"
                                        value="{{ $pelesen->e_ap3 ?? '' }}">
                                    @error('e_ap3')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:2.5%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Alamat Surat Menyurat</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_as1" class="form-control" oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        placeholder="Alamat Surat Menyurat 1" name="e_as1"
                                        value="{{ $pelesen->e_as1 ?? '' }}">
                                    @error('e_as1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%">
                                    <input type="text" id="e_as2" class="form-control" oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                        value="{{ $pelesen->e_as2 ?? '' }}">
                                    @error('e_as2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%">
                                    <input type="text" id="e_as3" class="form-control" oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                        value="{{ $pelesen->e_as3 ?? '' }}">
                                    @error('e_as3')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    No. Telefon (Pejabat / Kilang)</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_notel" class="form-control" oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                        value="{{ $pelesen->e_notel ?? '' }}" required
                                        onkeypress="return isNumberKey(event)">
                                    @error('e_notel')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    No. Faks</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_nofax" class="form-control" placeholder="No. Faks"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_nofax"
                                        value="{{ $pelesen->e_nofax ?? '' }}" oninput="setCustomValidity('')">
                                    @error('e_nofax')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Alamat Emel Kilang</label>
                                <div class="col-md-6">
                                    <input type="email" id="e_email" class="form-control" placeholder="Alamat Emel"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_email" required
                                        value="{{ $pelesen->e_email ?? '' }}" oninput="setCustomValidity('')">
                                    @error('e_email')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Nama Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_npg" class="form-control" placeholder="Nama Pegawai Melapor"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_npg" required
                                        value="{{ $pelesen->e_npg ?? '' }}" oninput="setCustomValidity('')">
                                    @error('e_npg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Jawatan Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_jpg" class="form-control" oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                        placeholder="Jawatan Pegawai Melapor" name="e_jpg"
                                        value="{{ $pelesen->e_jpg ?? '' }}">
                                    @error('e_jpg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    No. Telefon Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" id="e_notel_pg"
                                        oninput="setCustomValidity('')" placeholder="No. Telefon Pegawai Melapor"
                                        name="e_notel_pg" value="{{ $pelesen->e_notel_pg ?? '' }}" required>
                                    <div id="phone_error" class="error hidden">Please enter a valid phone number</div>
                                </div>
                                @error('e_notel_pg')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                Alamat Emel Pegawai Melapor</label>
                            <div class="col-md-6">
                                <input type="text" id="e_email_pg" class="form-control"
                                    placeholder="Alamat Emel Pegawai Melapor" name="e_email_pg"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" oninput="setCustomValidity('')"
                                    value="{{ $pelesen->e_email_pg ?? '' }}" required>
                                @error('e_email_pg')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                Nama Pegawai Bertanggungjawab</label>
                            <div class="col-md-6">
                                <input type="text" id="e_npgtg" class="form-control" oninput="setCustomValidity('')"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                    value="{{ $pelesen->e_npgtg ?? '' }}" required>
                                @error('e_npgtg')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                Jawatan Pegawai
                                Bertanggungjawab</label>
                            <div class="col-md-6">
                                <input type="text" id="e_jpgtg" class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" oninput="setCustomValidity('')"
                                    placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                    value="{{ $pelesen->e_jpgtg ?? '' }}" required>
                                @error('e_jpgtg')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                Alamat Emel Pengurus</label>
                            <div class="col-md-6">
                                <input type="text" id="e_email_pengurus" class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" oninput="setCustomValidity('')"
                                    placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                    value="{{ $pelesen->e_email_pengurus ?? '' }}" required>


                                @error('e_email_pengurus')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                Syarikat Induk</label>
                            <div class="col-md-6">
                                <input type="text" id="e_syktinduk" class="form-control"
                                    oninput="setCustomValidity('')" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Syarikat Induk" name="e_syktinduk"
                                    value="{{ $pelesen->e_syktinduk ?? '' }}" required>
                                @error('e_syktinduk')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                Kumpulan </label>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <select class="form-control" id="e_group" name="e_group" required
                                        oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        @if ($pelesen)
                                            <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                Kerajaan</option>
                                            <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                Swasta</option>
                                        @else
                                            <option selected hidden disabled>Sila Pilih</option>
                                            <option value="GOV">Kerajaan</option>
                                            <option value="IND"> Swasta
                                        @endif
                                    </select>
                                </fieldset>
                                @error('e_group')
                                    <div class="alert alert-danger">
                                        <strong>Sila buat pilihan di bahagian ini</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                POMA </label>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <select class="form-control" id="e_poma" name="e_poma" required
                                        oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                        @if ($pelesen)
                                            <option {{ $pelesen->e_poma == 'Ya' ? 'selected' : '' }} value="Ya">
                                                Ya</option>
                                            <option {{ $pelesen->e_poma == 'Tidak' ? 'selected' : '' }} value="Tidak">
                                                Tidak</option>
                                        @else
                                            <option selected hidden disabled>Sila Pilih</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak"> Tidak
                                        @endif
                                    </select>
                                </fieldset>
                                @error('e_poma')
                                    <div class="alert alert-danger">
                                        <strong>Sila buat pilihan di bahagian ini</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                Kapasiti Pemprosesan / Tahun</label>
                            <div class="col-md-6">
                                <input type="text" id="kap_proses" class="form-control"
                                    placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    onkeypress="return isNumberKey(event)"
                                    oninput="validate_two_decimal(this);setCustomValidity('')""
                                                            value=" {{ $pelesen->kap_proses ?? '' }}" required>

                                @error('kap_proses')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3 " style="text-align: center; font-size: 12px">
                            <div class="col-md-5">
                                <span></span>
                            </div>


                            <div class="col-md-1">
                                <span>CPO</span>
                            </div>

                        </div>
                        <div class="row mt-3 text-right">
                            <div class="col-md-5">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Bilangan Tangki</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" name='bil_tangki_cpo' style="width:100%"
                                    oninput="setCustomValidity('')" id="bil_tangki_cpo" required
                                    title="Sila isikan butiran ini." oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    onkeypress="return isNumberKey(event)" value="{{ $pelesen->bil_tangki_cpo ?? '' }}"
                                    required>
                                @error('bil_tangki_cpo')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>


                        </div>
                        <div class="row mt-3 text-right">
                            <div class="col-md-5">
                                <label for="fname"
                                    class="text-right control-label col-form-label required align-items-center">
                                    Kapasiti Tangki Simpanan (Tan)</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" name='kap_tangki_cpo' style="width:100%"
                                    oninput="setCustomValidity('')" id="kap_tangki_cpo" required
                                    title="Sila isikan butiran ini." oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_tangki_cpo ?? '' }}"
                                    required>
                                @error('kap_tangki_cpo')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div><br><br>


                        </div>
                        <div class="row mx-3" style="margin-left:14%">
                            <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                khusus untuk sesuatu produk. Sila campurkan kesemua
                                bilangan dan kapasiti tangki dan lapor dalam kategori Others
                            </i>
                        </div>
                </div>


                <div class="row form-group" style="margin-top: 2%">
                    <div class="text-right col-md-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#next">Simpan</button>
                    </div>

                </div>

                <!-- Vertically Centered modal Modal -->
                <div class="modal fade" id="next" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
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
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
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
                field = document.getElementById("e_as1");
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

                // POMA
                field = document.getElementById("e_poma");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                }




                // (B4) RESULT
                if (error == "") {
                    return true;
                } else {
                    toastr.error('Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan', 'Ralat!', {
                        "progressBar": true
                    })
                    return false;
                }
            }
        </script>
    @endsection
