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
                <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '</i><b style="color: red">
                    *</b><i>'</i>
                <form action="{{ route('bio.update.maklumat.asas.pelesen', [$pelesen->e_id])  }}" method="post" id="myform"  class="sub-form"
                    novalidate>
                    @csrf
                    <div class="container center" style="padding: 0%">
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required ">
                                    No. Lesen KPPK</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_nlkppk" class="form-control" maxlength="60"
                                    placeholder="NO. LESEN KPPK" onkeypress="return isNumberKey(event)"
                                    name="e_nlkppk" value="{{ $pelesen->e_nlkppk }}" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc(); valid_nl()">
                                    <p type="hidden" id="err_nl" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                    @error('e_nlkppk')
                                    <div class="alert alert-danger">
                                        <strong>Sila isi butiran ini</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label required col-formcenter">
                                    Alamat Premis Berlesen</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_ap1" class="form-control" maxlength=60
                                    oninvalid="this.setCustomValidity('Sila isi ruangan ini')" style="text-transform:uppercase"
                                    oninput="invokeFunc();this.setCustomValidity(''); valid_ap(); this.value = this.value.toUpperCase()"
                                    placeholder="Alamat Premis Berlesen 1" name="e_ap1" value="{{ $pelesen->e_ap1 }}"
                                    required>
                                <p type="hidden" id="err_ap" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>

                                <input type="text" id="e_ap2" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    placeholder="Alamat Premis Berlesen 2" oninput="invokeFunc2(); this.value = this.value.toUpperCase()" name="e_ap2"
                                    value="{{ $pelesen->e_ap2 }}">

                                <input type="text" id="e_ap3" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    placeholder="Alamat Premis Berlesen 3" oninput="invokeFunc3(); this.value = this.value.toUpperCase()" name="e_ap3"
                                    value="{{ $pelesen->e_ap3 }}">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Surat Menyurat</label>
                            </div>
                            <div class="custom-control custom-checkbox col-md-7 mt-2">
                                <input onchange="alamat();" type="checkbox" class="custom-control-input" id="alamat_sama"
                                    name="alamat_sama" {{ old('alamat_sama') == 'on' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="alamat_sama">Alamat sama seperti di
                                    atas</label>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:0px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label">
                                    </label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_as1" class="form-control" maxlength=60 required
                                    oninvalid="this.setCustomValidity('Sila isi ruangan ini')" style="text-transform:uppercase"
                                    oninput="invokeFunc4();this.setCustomValidity(''); valid_as(); this.value = this.value.toUpperCase()"
                                    placeholder="Alamat Surat Menyurat 1" name="e_as1" value="{{ $pelesen->e_as1 }}">

                                <p type="hidden" id="err_as" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>

                                <input type="text" id="e_as2" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    placeholder="Alamat Surat Menyurat 2" name="e_as2" oninput="invokeFunc5(); this.value = this.value.toUpperCase()"
                                    value="{{ $pelesen->e_as2 ?? '' }}">


                                <input type="text" id="e_as3" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    placeholder="Alamat Surat Menyurat 3" name="e_as3" oninput="invokeFunc6(); this.value = this.value.toUpperCase()"
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
                                    oninput="invokeFunc7();setCustomValidity(''); valid_notel()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="NO. TELEFON PEJABAT/KILANG" name="e_notel"
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
                                    oninput="invokeFunc8();" placeholder="NO. FAKS" {{-- oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="invokeFunc();setCustomValidity('')" --}}
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
                                    oninput="invokeFunc9();setCustomValidity(''); valid_email(); ValidateEmail()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" placeholder="ALAMAT EMEL KILANG"
                                    name="e_email" value="{{ $pelesen->e_email }}">
                                <p type="hidden" id="err_email" style="color: red; display:none"><i>Sila isi butiran
                                        di bahagian ini!</i></p>
                                <p type="hidden" id="err_email2" style="color: red; display:none"><i>Sila masukkan
                                        alamat emel yang betul!</i></p>

                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Nama Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npg" class="form-control" maxlength=60
                                    placeholder="Nama Pegawai Melapor" style="text-transform:uppercase"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_npg" required
                                    value="{{ $pelesen->e_npg }}"
                                    oninput="invokeFunc10();setCustomValidity(''); valid_npg(); this.value = this.value.toUpperCase()">
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
                                <input type="text" id="e_jpg" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    oninput="invokeFunc11();setCustomValidity(''); valid_jpg(); this.value = this.value.toUpperCase()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                    placeholder="Jawatan Pegawai Melapor" name="e_jpg" value="{{ $pelesen->e_jpg }}">
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
                                <input type="text" id="e_notel_pg" class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    onkeypress="return isNumberKey(event)"
                                    oninput="invokeFunc12();setCustomValidity(''); valid_notelpg()"
                                    placeholder="NO. TELEFON PEGAWAI MELAPOR" name="e_notel_pg"
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
                                <input type="email" id="e_email_pg" class="form-control"
                                    placeholder="ALAMAT EMEL PEGAWAI MELAPOR" name="e_email_pg"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    oninput="invokeFunc13();setCustomValidity(''); valid_emailpg(); ValidateEmailpg()"
                                    value="{{ $pelesen->e_email_pg }}" required multiple>
                                <p type="hidden" id="err_emailpg" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                <p type="hidden" id="err_email_pg" style="color: red; display:none"><i>Sila masukkan
                                        alamat emel yang betul!</i></p>

                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Nama Pegawai Bertanggungjawab</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npgtg" class="form-control" maxlength=60
                                    oninput="invokeFunc14();setCustomValidity(''); valid_npgtg(); this.value = this.value.toUpperCase()"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" style="text-transform:uppercase"
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
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" style="text-transform:uppercase"
                                    oninput="invokeFunc15();setCustomValidity(''); valid_jpgtg(); this.value = this.value.toUpperCase()" maxlength=60
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
                                <input type="email" id="e_email_pengurus" maxlength=40 class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    oninput="invokeFunc16();setCustomValidity(''); valid_emailpengurus(); ValidateEmailpen()"
                                    placeholder="ALAMAT EMEL PENGURUS" name="e_email_pengurus"
                                    value="{{ $pelesen->e_email_pengurus }}" required multiple>

                                <p type="hidden" id="err_emailpengurus" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>
                                <p type="hidden" id="err_email_pen" style="color: red; display:none"><i>Sila masukkan
                                        alamat emel yang betul!</i></p>

                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class=" control-label col-form-label required">
                                    Syarikat Induk</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_syktinduk" maxlength=60 class="form-control"
                                    oninput="invokeFunc17(); valid_syktinduk(); this.value = this.value.toUpperCase()" title="Sila isi butiran di bahagian ini"
                                    placeholder="Syarikat Induk" name="e_syktinduk" style="text-transform:uppercase"
                                    value="{{ $pelesen->e_syktinduk ?? '' }}" required>
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
                                        <option selected value="">SILA PILIH KUMPULAN</option>

                                        <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                            KERAJAAN</option>
                                        <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                            SWASTA</option>



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
                                    Kapasiti Pemprosesan / Tahun</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="kap_proses" maxlength=40 class="form-control"
                                    placeholder="KAPASITI PEMPROSESAN/TAHUN" name="kap_proses"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    onkeypress="return isNumberKey(event)" onClick="this.select();"
                                    oninput="invokeFunc18();validate_two_decimal(this);setCustomValidity(''); valid_proses()"
                                    value=" {{ number_format($pelesen->kap_proses ?? 0) }}" required>
                                <p type="hidden" id="err_proses" style="color: red; display:none"><i>Sila isi
                                        butiran di bahagian ini!</i></p>

                            </div>
                        </div>

                        {{--
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <span></span>
                            </div>
                            <div class="col-md-7">
                                <span>CPO</span>
                            </div>

                        </div> --}}



                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <span><br></span><label for="fname" class="control-label col-form-label required">
                                    Bilangan Tangki</label><br>
                                <label for="fname" class="control-label col-form-label required">
                                    Kapasiti tangki Simpanan (Tan)</label>
                            </div>

                            <div class="col-md-7">
                                <table style="width:100%; text-align: center; font-size: 10px">
                                    <tr>
                                        <th>CPO</th>
                                        <th>PPO</th>
                                        <th>CPKO</th>
                                        <th>PPKO</th>
                                        <th>OLEO</th>
                                        <th>OTHERS</th>
                                        <th>JUMLAH</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name='bil_tangki_cpo' onClick="this.select();"
                                                style="width:100%" size="15" id="bil_tangki_cpo" required
                                                title="Sila isikan butiran ini." onkeypress="return point(event)"
                                                value="{{ number_format($pelesen->bil_tangki_cpo ?? 0) }}" onchange="validation_jumlah()" oninput="this.setCustomValidity('');
                                                validate_two_decimal(this); ableInput(); valid_cpo(); FormatCurrency(this)">
                                            @error('bil_tangki_cpo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='bil_tangki_ppo' onClick="this.select();"
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_ppo" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_ppo ?? 0) }}" onchange="validation_jumlah()" oninput="this.setCustomValidity('');validate_two_decimal(this); ableInput(); valid_ppo(); FormatCurrency(this)">
                                            @error('bil_tangki_ppo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='bil_tangki_cpko' onClick="this.select();"
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_cpko" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_cpko ?? 0) }}" onchange="validation_jumlah()" oninput="this.setCustomValidity('');validate_two_decimal(this); ableInput(); valid_cpko(); FormatCurrency(this)">
                                            @error('bil_tangki_cpko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='bil_tangki_ppko' onClick="this.select();"
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_ppko" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_ppko ?? 0) }}" onchange="validation_jumlah()" oninput="this.setCustomValidity('');validate_two_decimal(this); ableInput();valid_ppko(); FormatCurrency(this)">
                                            @error('bil_tangki_ppko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='bil_tangki_oleo' onClick="this.select();"
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_oleo" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_oleo ?? 0) }}" onchange="validation_jumlah()" oninput="this.setCustomValidity('');validate_two_decimal(this); ableInput();  valid_oleo(); FormatCurrency(this)">
                                            @error('bil_tangki_oleo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='bil_tangki_others' onClick="this.select();"
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_others" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_others ?? 0) }}"
                                                onchange="validation_jumlah()" oninput="this.setCustomValidity('');validate_two_decimal(this); ableInput(); valid_others(); FormatCurrency(this)">
                                            @error('bil_tangki_others')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td style="font-size: 10pt"> <b><span id="bil_tangki_jumlah">
                                                    {{ old('bil_tangki_jumlah') ?? number_format($jumlah) }}
                                                </span>
                                            </b></td>
                                    </tr>
                                    <tr style="vertical-align: top">

                                        <td><input type="text" class="form-control" name='kap_tangki_cpo' onClick="this.select();"
                                                onkeypress="return point(event)" style="width:100%"
                                                id="kap_tangki_cpo" onchange="validation_jumlah2()" oninput="this.setCustomValidity('');validate_two_decimal(this);valid_cpo(); FormatCurrency(this)"
                                                title="Sila isikan butiran ini." required
                                                value="{{ number_format($pelesen->kap_tangki_cpo ?? 0) }}">
                                                <p type="hidden" id="err_kcpo" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_cpo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_ppo' onClick="this.select();"
                                                onkeypress="return point(event)" style="width:100%"
                                                id="kap_tangki_ppo" onchange="validation_jumlah2()" oninput="this.setCustomValidity('');validate_two_decimal(this);  valid_ppo(); FormatCurrency(this)"
                                                title="Sila isikan butiran ini." required
                                                value="{{ number_format($pelesen->kap_tangki_ppo ?? 0) }}">
                                                <p type="hidden" id="err_kppo" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_ppo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_cpko' onClick="this.select();"
                                                onkeypress="return point(event)" style="width:100%"
                                                id="kap_tangki_cpko" onchange="validation_jumlah2()" oninput="this.setCustomValidity('');validate_two_decimal(this);  valid_cpko(); FormatCurrency(this)"
                                                title="Sila isikan butiran ini." required
                                                value="{{ number_format($pelesen->kap_tangki_cpko ?? 0) }}">
                                                <p type="hidden" id="err_kcpko" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_cpko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='kap_tangki_ppko' onClick="this.select();"
                                                onkeypress="return point(event)" style="width:100%"
                                                id="kap_tangki_ppko" onchange="validation_jumlah2()" oninput="this.setCustomValidity('');validate_two_decimal(this); valid_ppko(); FormatCurrency(this)"
                                                title="Sila isikan butiran ini." required
                                                value="{{ number_format($pelesen->kap_tangki_ppko ?? 0) }}">
                                                <p type="hidden" id="err_kppko" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_ppko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_oleo' onClick="this.select();"
                                                onkeypress="return point(event)" style="width:100%"
                                                id="kap_tangki_oleo" onchange="validation_jumlah2()" oninput="this.setCustomValidity('');validate_two_decimal(this); valid_oleo(); FormatCurrency(this)"
                                                title="Sila isikan butiran ini." required
                                                value="{{ number_format($pelesen->kap_tangki_oleo ?? 0) }}">
                                                <p type="hidden" id="err_koleo" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_oleo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='kap_tangki_others' onClick="this.select();"
                                                onkeypress="return point(event)" style="width:100%"
                                                id="kap_tangki_others" onchange="validation_jumlah2()" oninput="this.setCustomValidity('');validate_two_decimal(this); valid_others(); FormatCurrency(this)"
                                                title="Sila isikan butiran ini." required
                                                value="{{ number_format($pelesen->kap_tangki_others ?? 0) }}">
                                                <p type="hidden" id="err_others" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_others')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td style="font-size: 10pt"> <b><span id="kap_tangki_jumlah">
                                                    {{ old('kap_tangki_jumlah') ?? number_format($jumlah2) }}
                                                </span>
                                            </b></td>
                                    </tr>
                                </table>
                            </div>
                        </div><br><br>


                        </div>
                        <div class="row justify-content-center">
                            <i style="margin-left:13%;margin-right:8%">Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                khusus untuk sesuatu produk. Sila campurkan kesemua
                                bilangan dan kapasiti tangki dan lapor dalam kategori Others
                            </i>
                        </div>

                    </div>


                    <div class="row form-group justify-content-center" style="margin-top: 2%">
                        <button type="button" class="btn btn-primary" onclick="check();">Simpan</button>
                    </div>

                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade hide" id="next" tabindex="-1" role="dialog"
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
                                    <button type="submit"  name="submit" class="btn btn-primary ml-1"
                                        >
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Ya</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            </body>


            {{-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>JavaScript form validation - checking email</title>
<link rel='stylesheet' href='form-style.css' type='text/css' />
</head>
<body onload='document.form1.text1.focus()'>
<div class="mail">
<h2>Input an email and Submit</h2>
<form name="form1" action="#">
<ul>
<li><input type='text' name='text1'/></li>
<li>&nbsp;</li>
<li class="submit"><input type="button" name="submit" value="Submit" onclick="ValidateEmail(document.form1.text1)"/></li>
<li>&nbsp;</li>
</ul>
</form>
</div>
<script src="email-validation.js"></script>
</body>
</html> --}}
        @endsection

        @section('scripts')

        <script>
            var maxLength = 40;
            document.getElementById("e_email_pg").addEventListener("input", function() {
                if (this.value.length > maxLength) {
                    this.value = this.value.slice(0, maxLength);
                }
            });
            </script>
        <script>
            $(document).ready(function() {
                // console.log('ready');

                let bil_cpo = document.querySelector("#bil_tangki_cpo");
                let kap_cpo = document.querySelector("#kap_tangki_cpo");
                let bil_ppo = document.querySelector("#bil_tangki_ppo");
                let kap_ppo = document.querySelector("#kap_tangki_ppo");
                let bil_cpko = document.querySelector("#bil_tangki_cpko");
                let kap_cpko = document.querySelector("#kap_tangki_cpko");
                let bil_ppko = document.querySelector("#bil_tangki_ppko");
                let kap_ppko = document.querySelector("#kap_tangki_ppko");
                let bil_oleo = document.querySelector("#bil_tangki_oleo");
                let kap_oleo = document.querySelector("#kap_tangki_oleo");
                let bil_others = document.querySelector("#bil_tangki_others");
                let kap_others = document.querySelector("#kap_tangki_others");

                // console.log(bil_cpko.value);
                if (bil_cpo.value != 0) {
                    kap_cpo.disabled = false;
                } else {
                    kap_cpo.disabled = true;
                }

                if (bil_ppo.value != 0) {
                    kap_ppo.disabled = false;
                } else {
                    kap_ppo.disabled = true;
                }

                if (bil_cpko.value != 0) {
                    kap_cpko.disabled = false;
                } else {
                    kap_cpko.disabled = true;
                }

                if (bil_ppko.value != 0) {
                    kap_ppko.disabled = false;
                } else {
                    kap_ppko.disabled = true;

                }

                if (bil_oleo.value != 0) {
                    kap_oleo.disabled = false;
                } else {
                    kap_oleo.disabled = true;

                }
                if (bil_others.value != 0) {
                    kap_others.disabled = false;
                } else {
                    kap_others.disabled = true;
                }


            });
            </script>
             <script>
                $('.sub-form').submit(function() {

                    var x = $('#kap_proses').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#kap_proses').val(x);

                    var x = $('#bil_tangki_cpo').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#bil_tangki_cpo').val(x);

                    var x = $('#bil_tangki_ppo').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#bil_tangki_ppo').val(x);

                    var x = $('#bil_tangki_cpko').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#bil_tangki_cpko').val(x);

                    var x = $('#bil_tangki_ppko').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#bil_tangki_ppko').val(x);

                    var x = $('#bil_tangki_oleo').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#bil_tangki_oleo').val(x);

                    var x = $('#bil_tangki_others').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#bil_tangki_others').val(x);

                    kap_tangki_cpo
                    var x = $('#kap_tangki_cpo').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#kap_tangki_cpo').val(x);


                    var x = $('#kap_tangki_ppo').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#kap_tangki_ppo').val(x);

                    var x = $('#kap_tangki_cpko').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#kap_tangki_cpko').val(x);

                    var x = $('#kap_tangki_ppko').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#kap_tangki_ppko').val(x);

                    var x = $('#kap_tangki_oleo').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#kap_tangki_oleo').val(x);

                    var x = $('#kap_tangki_others').val();
                    x = x.replace(/,/g, '');
                    x = parseFloat(x, 10);
                    $('#kap_tangki_others').val(x);

                    return true;

                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#checkBtn').click(function() {
                       var cpo = $('#bil_tangki_cpo').val();
                       var ppo = $('#bil_tangki_ppo').val();
                       var cpko = $('#bil_tangki_cpko').val();
                       var ppko = $('#bil_tangki_ppko').val();
                       var others = $('#bil_tangki_others').val();


                        cpo = cpo.replace(/,/g, '');
                        cpo = parseFloat(cpo, 10);
                        console.log('cpo' + cpo);

                        ppo = ppo.replace(/,/g, '');
                        ppo = parseFloat(ppo, 10);
                        console.log('ppo' + ppo);

                        cpko = cpko.replace(/,/g, '');
                        cpko = parseFloat(cpko, 10);
                        console.log('cpko' + cpko);

                        ppko = ppko.replace(/,/g, '');
                        ppko = parseFloat(ppko, 10);
                        console.log('ppko' + ppko);

                        others = others.replace(/,/g, '');
                        others = parseFloat(others, 10);
                        console.log('others' + others);

                        // !x || !(x > 0)
                        if ((!cpo || !(cpo > 0)) && (!ppo  || !(ppo > 0)) && (!cpko  || !(cpko > 0))  && (!ppko  || !(ppko > 0))  && (!others  || !(others > 0)) ) {
                            console.log('lain');

                            toastr.error(
                                'Sila isi bilangan salah satu tangki produk',
                                'Ralat!', {
                                    "progressBar": true
                                })
                            return false;
                        }


                    });
                });
            </script>
            <script>
            function ableInput() {

                // console.log('ready');

                let bil_cpo = document.querySelector("#bil_tangki_cpo");
                let kap_cpo = document.querySelector("#kap_tangki_cpo");
                let bil_ppo = document.querySelector("#bil_tangki_ppo");
                let kap_ppo = document.querySelector("#kap_tangki_ppo");
                let bil_cpko = document.querySelector("#bil_tangki_cpko");
                let kap_cpko = document.querySelector("#kap_tangki_cpko");
                let bil_ppko = document.querySelector("#bil_tangki_ppko");
                let kap_ppko = document.querySelector("#kap_tangki_ppko");
                let bil_oleo = document.querySelector("#bil_tangki_oleo");
                let kap_oleo = document.querySelector("#kap_tangki_oleo");
                let bil_others = document.querySelector("#bil_tangki_others");
                let kap_others = document.querySelector("#kap_tangki_others");

                if (bil_cpo.value == '' || bil_cpo.value == '0') {
                    kap_cpo.disabled = true;
                    // $('#kap_tangki_cpo').val() == 0;
                    document.querySelector("#kap_tangki_cpo").value = "0";

                } else {
                    kap_cpo.disabled = false;
                }

                if (bil_ppo.value == '' || bil_ppo.value == '0') {
                    kap_ppo.disabled = true;
                    // $('#kap_tangki_cpo').val() == 0;
                    document.querySelector("#kap_tangki_ppo").value = "0";

                } else {
                    kap_ppo.disabled = false;
                }

                if (bil_cpko.value == '' || bil_cpko.value == '0') {
                    kap_cpko.disabled = true;
                    // $('#kap_tangki_cpo').val() == 0;
                    document.querySelector("#kap_tangki_cpko").value = "0";

                } else {
                    kap_cpko.disabled = false;
                }

                if (bil_ppko.value == '' || bil_ppko.value == '0') {
                    kap_ppko.disabled = true;
                    // $('#kap_tangki_cpo').val() == 0;
                    document.querySelector("#kap_tangki_ppko").value = "0";

                } else {
                    kap_ppko.disabled = false;
                }

                if (bil_oleo.value == '' || bil_oleo.value == '0') {
                    kap_oleo.disabled = true;
                    // $('#kap_tangki_cpo').val() == 0;
                    document.querySelector("#kap_tangki_oleo").value = "0";

                } else {
                    kap_oleo.disabled = false;
                }

                if (bil_others.value == '' || bil_others.value == '0') {
                    kap_others.disabled = true;
                    // $('#kap_tangki_cpo').val() == 0;
                    document.querySelector("#kap_tangki_others").value = "0";

                } else {
                    kap_others.disabled = false;
                }

            };
            </script>

         {{-- <script type="text/javascript">
            $(document).ready(function() {
                $('#checkBtn').click(function() {
                    cpo = $('#bil_tangki_cpo').val();
                    ppo = $('#bil_tangki_ppo').val();
                    cpko = $('#bil_tangki_cpko').val();
                    ppko = $('#bil_tangki_ppko').val();
                    oleo = $('#bil_tangki_oleo').val();
                    others = $('#bil_tangki_others').val();

                    if (cpo == 0 && ppo == 0 && cpko == 0 && ppko == 0 && oleo == 0 && others == 0) {
                        console.log('lain');

                        toastr.error(
                            'Sila isi bilangan salah satu tangki produk',
                            'Ralat!', {
                                "progressBar": true
                            })
                        return false;
                    }


                });
            });
        </script> --}}
        <script>
            function validation_jumlah() {
                var bil_tangki_cpo = document.getElementById('bil_tangki_cpo');
                var bcpo = bil_tangki_cpo.value.replace(/,/g, '');
                var bil_tangki_ppo = document.getElementById('bil_tangki_ppo');
                var bppo = bil_tangki_ppo.value.replace(/,/g, '');
                var bil_tangki_cpko = document.getElementById('bil_tangki_cpko');
                var bcpko = bil_tangki_cpko.value.replace(/,/g, '');
                var bil_tangki_ppko = document.getElementById('bil_tangki_ppko');
                var bppko = bil_tangki_ppko.value.replace(/,/g, '');
                var bil_tangki_ppko = document.getElementById('bil_tangki_oleo');
                var boleo = bil_tangki_oleo.value.replace(/,/g, '');
                var bil_tangki_others = document.getElementById('bil_tangki_others');
                var bothers = bil_tangki_others.value.replace(/,/g, '');


                var jumlah = $("#jumlah").val();
                var jumlah_input = 0;

                jumlah_input = parseFloat(Number(bcpo)) + parseFloat(Number(bppo)) +
                    parseFloat(Number(bcpko)) + parseFloat(Number(bppko)) + parseFloat(Number(
                        boleo)) + parseFloat(Number(bothers));

                document.getElementById('bil_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        </script>
        <script>
            function validation_jumlah2() {
                var kap_tangki_cpo = document.getElementById('kap_tangki_cpo');
                var kcpo = kap_tangki_cpo.value.replace(/,/g, '');

                var kap_tangki_ppo = document.getElementById('kap_tangki_ppo');
                var kppo = kap_tangki_ppo.value.replace(/,/g, '');

                var kap_tangki_cpko = document.getElementById('kap_tangki_cpko');
                var kcpko = kap_tangki_cpko.value.replace(/,/g, '');

                var kap_tangki_ppko = document.getElementById('kap_tangki_ppko');
                var kppko = kap_tangki_ppko.value.replace(/,/g, '');

                var kap_tangki_oleo = document.getElementById('kap_tangki_oleo');
                var koleo = kap_tangki_oleo.value.replace(/,/g, '');

                var kap_tangki_others = document.getElementById('kap_tangki_others');
                var kothers = kap_tangki_others.value.replace(/,/g, '');


                var jumlah = $("#jumlah2").val();
                var jumlah_input = 0;

                jumlah_input = parseFloat(Number(kcpo)) + parseFloat(Number(kppo)) +
                    parseFloat(Number(kcpko)) + parseFloat(Number(kppko)) + parseFloat(Number(
                        koleo)) + parseFloat(Number(kothers));

                document.getElementById('kap_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".floatNumberField").change(function() {
                        $(this).val(parseFloat($(this).val()).toFixed(2));
                    });
                });
            </script>
            {{-- <script>
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
            </script> --}}
            <script>
                function valid_nl() {

                    if ($('#e_nlkppk').val() == '') {
                        $('#e_nlkppk').css('border-color', 'red');
                        document.getElementById('err_nl').style.display = "block";


                    } else {
                        $('#e_nlkppk').css('border-color', '');
                        document.getElementById('err_nl').style.display = "none";

                    }

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
                        document.getElementById('err_email2').style.display = "none";
                        console.log('sini');

                    } else {
                        $('#e_email').css('border-color', '');
                        document.getElementById('err_email').style.display = "none";
                        document.getElementById('err_email2').style.display = "none";

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
   <script>
    function valid_cpo() {
        if ($('#bil_tangki_cpo').val() == '' || $('#bil_tangki_cpo').val() == '0') {
            $('#kap_tangki_cpo').css('border-color', '');
            document.getElementById('err_kcpo').style.display = "none";

        } else {
            if ($('#kap_tangki_cpo').val() == '' || $('#kap_tangki_cpo').val() == 0) {
                // console.log($('#kap_tangki_cpo').val());
                $('#kap_tangki_cpo').css('border-color', 'red');
                document.getElementById('err_kcpo').style.display = "block";
            } else {
                // console.log('kap_tangki no');
                $('#kap_tangki_cpo').css('border-color', '');
                document.getElementById('err_kcpo').style.display = "none";

            }
        }

    }
</script>
<script>
    function valid_ppo() {

        if ($('#bil_tangki_ppo').val() == '' || $('#bil_tangki_ppo').val() == '0') {

            $('#kap_tangki_ppo').css('border-color', '');
            document.getElementById('err_kppo').style.display = "none";
        }

         else {

            if ($('#kap_tangki_ppo').val() == '' || $('#kap_tangki_ppo').val() == 0) {
                $('#kap_tangki_ppo').css('border-color', 'red');
                document.getElementById('err_kppo').style.display = "block";
            } else {
                $('#kap_tangki_ppo').css('border-color', '');
                document.getElementById('err_kppo').style.display = "none";

            }
    }
}
</script>
<script>
    function valid_cpko() {
        // $( document ).ready(function() {
// console.log( "ready!" );

        if ($('#bil_tangki_cpko').val() == '' || $('#bil_tangki_cpko').val() == '0') {
            $('#kap_tangki_cpko').css('border-color', '');
            document.getElementById('err_kcpko').style.display = "none";


        } else {
            if ($('#kap_tangki_cpko').val() == '' || $('#kap_tangki_cpko').val() == '0') {
                $('#kap_tangki_cpko').css('border-color', 'red');
                document.getElementById('err_kcpko').style.display = "block";
            } else {
                $('#kap_tangki_cpko').css('border-color', '');
                document.getElementById('err_kcpko').style.display = "none";

            }

        }
// });

    }
</script>
<script>
    function valid_ppko() {


        if ($('#bil_tangki_ppko').val() == '' || $('#bil_tangki_ppko').val() == '0') {
            $('#kap_tangki_ppko').css('border-color', '');
            document.getElementById('err_kppko').style.display = "none";


        } else {
            if ($('#kap_tangki_ppko').val() == '' || $('#kap_tangki_ppko').val() == '0') {
                $('#kap_tangki_ppko').css('border-color', 'red');
                document.getElementById('err_kppko').style.display = "block";
            } else {
                $('#kap_tangki_ppko').css('border-color', '');
                document.getElementById('err_kppko').style.display = "none";

            }

        }


    }
</script>
<script>
    function valid_oleo() {


        if ($('#bil_tangki_oleo').val() == '' || $('#bil_tangki_oleo').val() == '0') {
            $('#kap_tangki_oleo').css('border-color', '');
            document.getElementById('err_koleo').style.display = "none";


        } else {
            if ($('#kap_tangki_oleo').val() == '' || $('#kap_tangki_oleo').val() == '0') {
                $('#kap_tangki_oleo').css('border-color', 'red');
                document.getElementById('err_koleo').style.display = "block";
            } else {
                $('#kap_tangki_oleo').css('border-color', '');
                document.getElementById('err_koleo').style.display = "none";
            }
        }
    }
</script>
<script>
    function valid_others() {

        if ($('#bil_tangki_others').val() == '' || $('#bil_tangki_others').val() == '0') {
            $('#kap_tangki_others').css('border-color', '');
            document.getElementById('err_others').style.display = "none";

        } else {
            if ($('#kap_tangki_others').val() == '' || $('#kap_tangki_others').val() == '0') {
                $('#kap_tangki_others').css('border-color', 'red');
                document.getElementById('err_others').style.display = "block";
            } else {
                $('#kap_tangki_others').css('border-color', '');
                document.getElementById('err_others').style.display = "none";

            }

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
        {{-- <script>
            const emailInput = document.getElementById('e_email_pg');

            emailInput.addEventListener('input', function() {
            if (emailInput.value.length > 50) {
                emailInput.value = emailInput.value.slice(0, 50);
            }
            });
        </script> --}}

            <script>
                function check() {
                    // (B1) INIT
                    var error = "",
                        field = "";

                    // nlkppk
                    field = document.getElementById("e_nlkppk");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#e_nlkppk').css('border-color', 'red');
                        document.getElementById('err_nl').style.display = "block";
                    }
                    // alamat premis 1500403125000
                    field = document.getElementById("kap_proses");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#kap_proses').css('border-color', 'red');
                        document.getElementById('err_proses').style.display = "block";
                    }

                    // alamat premis 1
                    field = document.getElementById("e_ap1");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#e_ap1').css('border-color', 'red');
                        document.getElementById('err_ap').style.display = "block";
                    }

                    // alamat surat-menyurat 1
                    field = document.getElementById("e_as1");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#e_as1').css('border-color', 'red');
                        document.getElementById('err_as').style.display = "block";
                    }

                    // no tel kilang
                    field = document.getElementById("e_notel");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#e_notel').css('border-color', 'red');
                        document.getElementById('err_notel').style.display = "block";
                    }

                    // email kilang
                    field = document.getElementById("e_email");
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#e_email').css('border-color', 'red');
                        document.getElementById('err_email').style.display = "block";
                        // document.getElementById('err_email2').style.display = "none";
                    }
                    if (!field.value.match(mailformat)) {
                        error += "Name must be 2-4 characters\r\n";
                        // alert("You have entered an invalid email address!");
                        $('#e_email').css('border-color', 'red');
                        document.getElementById('err_email2').style.display = "block";
                        console.log('error');
                    }





            // nama pegawai melapor
            field = document.getElementById("e_npg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_npg').css('border-color', 'red');
            document.getElementById('err_npg').style.display = "block";
            }

            // jawatan pegawai melapor
            field = document.getElementById("e_jpg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_jpg').css('border-color', 'red');
            document.getElementById('err_jpg').style.display = "block";
            }

            // no tel pegawai melapor
            field = document.getElementById("e_notel_pg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_notel_pg').css('border-color', 'red');
            document.getElementById('err_notelpg').style.display = "block";
            }

            // email pegawai melapor
            field = document.getElementById("e_email_pg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_email_pg').css('border-color', 'red');
            document.getElementById('err_emailpg').style.display = "block";
            }

            // nama pegawai bertanggungjawab
            field = document.getElementById("e_npgtg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_npgtg').css('border-color', 'red');
            document.getElementById('err_npgtg').style.display = "block";
            }

            // jawatan pegawai bertanggungjawab
            field = document.getElementById("e_jpgtg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_jpgtg').css('border-color', 'red');
            document.getElementById('err_jpgtg').style.display = "block";
            }

            // emel pengurus
            field = document.getElementById("e_email_pengurus");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_email_pengurus').css('border-color', 'red');
            document.getElementById('err_emailpengurus').style.display = "block";
            }

            // syarikat induk
            field = document.getElementById("e_syktinduk");
            if (!field.checkValidity()) {
            error += "Name must be 2-4 characters\r\n";
            $('#e_syktinduk').css('border-color', 'red');
            document.getElementById('err_syktinduk').style.display = "block";
            }

            // kumpulan
            field = document.getElementById("e_group");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
            $('#e_group').css('border-color', 'red');
            document.getElementById('err_group').style.display = "block";
            }


            cpo = $('#bil_tangki_cpo').val();
            ppo = $('#bil_tangki_ppo').val();
            cpko = $('#bil_tangki_cpko').val();
            ppko = $('#bil_tangki_ppko').val();
            oleo = $('#bil_tangki_oleo').val();
            others = $('#bil_tangki_others').val();

            kcpo = $('#kap_tangki_cpo').val();
            kppo = $('#kap_tangki_ppo').val();
            kcpko = $('#kap_tangki_cpko').val();
            kppko = $('#kap_tangki_ppko').val();
            koleo = $('#kap_tangki_oleo').val();
            kothers = $('#kap_tangki_others').val();

            if (cpo != 0 && kcpo == 0) {
                // $('#next').modal('hide');
                error += "Name must be 2-4 characters\r\n";
                $('#kap_tangki_cpo').css('border-color', 'red');
                document.getElementById('err_kcpo').style.display = "block";
            } else {
                $('#kap_tangki_cpo').css('border-color', '');
                document.getElementById('err_kcpo').style.display = "none";
            }

            if (ppo != 0 && kppo == 0) {
                error += "Name must be 2-4 characters\r\n";
                $('#kap_tangki_ppo').css('border-color', 'red');
                document.getElementById('err_kppo').style.display = "block";
            } else {
                $('#kap_tangki_ppo').css('border-color', '');
                document.getElementById('err_kppo').style.display = "none";
            }

            if (cpko != 0 && kcpko == 0) {
                error += "Name must be 2-4 characters\r\n";
                $('#kap_tangki_cpko').css('border-color', 'red');
                document.getElementById('err_kcpko').style.display = "block";
            } else {
                $('#kap_tangki_cpko').css('border-color', '');
                document.getElementById('err_kcpko').style.display = "none";
            }

            if (ppko != 0 && kppko == 0) {
                error += "Name must be 2-4 characters\r\n";
                $('#kap_tangki_ppko').css('border-color', 'red');
                document.getElementById('err_kppko').style.display = "block";
            } else {
                $('#kap_tangki_ppko').css('border-color', '');
                document.getElementById('err_kppko').style.display = "none";
            }

            if (oleo != 0 && koleo == 0) {
                error += "Name must be 2-4 characters\r\n";
                $('#kap_tangki_oleo').css('border-color', 'red');
                document.getElementById('err_koleo').style.display = "block";
            } else {
                $('#kap_tangki_oleo').css('border-color', '');
                document.getElementById('err_koleo').style.display = "none";
            }

            if (others != 0 && kothers == 0) {
                error += "Name must be 2-4 characters\r\n";
                $('#kap_tangki_others').css('border-color', 'red');
                document.getElementById('err_others').style.display = "block";
            } else {
                $('#kap_tangki_others').css('border-color', '');
                document.getElementById('err_others').style.display = "none";
            }

            // POMA
            // field = document.getElementById("e_poma");
            // if (!field.checkValidity()) {
            // error += "Name must be 2-4 characters\r\n";
            // }

            // (B4) RESULT
            if (error == "") {
                $('#next').modal('show');
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
            // return true;
            // } else {
            // toastr.error(
            // 'Terdapat maklumat tidak lengkap. Lengkapkan semua butiran bertanda (*) sebelum tekan butang Simpan',
            // 'Ralat!', {
            // "progressBar": true
            // })
            // return false;
            // }
            }
            </script>
            <script>
                function ValidateEmail()
                {
                var inputText = document.getElementById('e_email');
                console.log(inputText.value);
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(inputText.value.match(mailformat))
                {
                // alert("Valid email address!");
                // document.myform.e_email.focus();
                document.getElementById('err_email2').style.display = "none";

                return true;
                }
                else
                {
                    if(inputText.value != ''){
                    // alert("You have entered an invalid email address!");
                    $('#e_email').css('border-color', 'red');
                    document.getElementById('err_email2').style.display = "block";
                    return false;
                    }
                }
                }
            </script>
            <script>
                function ValidateEmailpg()
                {
                var inputText = document.getElementById('e_email_pg');
                console.log(inputText.value);
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(inputText.value.match(mailformat))
                {
                // alert("Valid email address!");
                // document.myform.e_email.focus();
                document.getElementById('err_email_pg').style.display = "none";

                return true;
                }
                else
                {
                    if(inputText.value != ''){
                    // alert("You have entered an invalid email address!");
                    $('#e_email_pg').css('border-color', 'red');
                    document.getElementById('err_email_pg').style.display = "block";
                    return false;
                    }
                }
                }
            </script>
            <script>
                function ValidateEmailpen()
                {
                var inputText = document.getElementById('e_email_pengurus');
                console.log(inputText.value);
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(inputText.value.match(mailformat))
                {
                // alert("Valid email address!");
                // document.myform.e_email.focus();
                document.getElementById('err_email_pen').style.display = "none";

                return true;
                }
                else
                {
                    if(inputText.value != ''){
                    // alert("You have entered an invalid email address!");
                    $('#e_email_pengurus').css('border-color', 'red');
                    document.getElementById('err_email_pen').style.display = "block";
                    return false;
                    }
                }
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
                    e_as1.value = e_ap1.value.toUpperCase();

                    var e_ap2 = document.getElementById("e_ap2"),
                        e_as2 = document.getElementById("e_as2");
                    e_as2.value = e_ap2.value.toUpperCase();

                    var e_ap3 = document.getElementById("e_ap3"),
                        e_as3 = document.getElementById("e_as3");
                    e_as3.value = e_ap3.value.toUpperCase();


                }
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
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e_ap2').focus();
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
                            document.getElementById('e_ap3').focus();
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
                            document.getElementById('e_as1').focus();
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
                            document.getElementById('e_as2').focus();
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
                            document.getElementById('e_as3').focus();
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
                            document.getElementById('e_notel').focus();
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
                            document.getElementById('e_nofax').focus();
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
                            document.getElementById('e_email').focus();
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
                            document.getElementById('e_npg').focus();
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
                            document.getElementById('e_jpg').focus();
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
                            document.getElementById('e_notel_pg').focus();
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
                            document.getElementById('e_email_pg').focus();
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
                            document.getElementById('e_npgtg').focus();
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
                            document.getElementById('e_jpgtg').focus();
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
                            document.getElementById('e_email_pengurus').focus();
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
                            document.getElementById('e_syktinduk').focus();
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
                            document.getElementById('kap_proses').focus();
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
                            document.getElementById('bil_tangki_cpo').focus();
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
                            document.getElementById('kap_tangki_cpo').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>

        <script>
            function nodecimal() {
                // let decimal = ".00"
                var x = parseFloat(document.getElementById("kap_tangki_cpo").value);
                if(isNaN(x)){
                    x = 0;
                }
                const removedDecimal = Math.round(x);
                document.querySelector("#kap_tangki_cpo").value = removedDecimal;
                console.log(removedDecimal);
            }
        </script>
            <script>

                $("#kap_proses").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#bil_tangki_cpo").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#kap_tangki_cpo").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#bil_tangki_ppo").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#kap_tangki_ppo").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#bil_tangki_cpko").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#kap_tangki_cpko").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#bil_tangki_ppko").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#kap_tangki_ppko").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#bil_tangki_oleo").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#kap_tangki_oleo").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#bil_tangki_others").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });

                $("#kap_tangki_others").keypress(function(event) {
                if ( event.which == 45 ) {
                    event.preventDefault();
                }
                });
            </script>


            </body>

            </html>
        @endsection
