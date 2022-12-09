@extends('layouts.main')

@section('content')
    <div class="page-wrapper" style="transition: 0s;">

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
        <div class="card" style="margin-right:3%; margin-left:3%;">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-4 col-12"> --}}
                <div class=" text-center">
                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                    <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan </i>
                    </h5>
                    {{-- <p>Maklumat Kilang</p> --}}
                </div>
                <hr>
                <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda ' </i><b style="color: red"> *
                </b><i>'</i>
                {{-- @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif --}}
                <form action="{{ route('oleo.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}" method="post"  class="sub-form"
                    onsubmit="return check()" novalidate>
                    @csrf
                    <div class="container center mt-5">
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label required col-form-label">
                                    Alamat Premis Berlesen</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_ap1" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" required style="text-transform:uppercase"
                                    placeholder="Alamat Premis Berlesen 1" name="e_ap1" value="{{ $pelesen->e_ap1 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc(); valid_ap(); this.value = this.value.toUpperCase()">
                                <p type="hidden" id="err_ap" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                <input type="text" id="e_ap2" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Premis Berlesen 2" name="e_ap2" value="{{ $pelesen->e_ap2 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc2(); this.value = this.value.toUpperCase()">
                                <input type="text" id="e_ap3" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Premis Berlesen 3" name="e_ap3" value="{{ $pelesen->e_ap3 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc3(); this.value = this.value.toUpperCase()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin-left:30px">
                            <div class="col-sm-3 form-group" ></div>
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
                                <input type="text" id="e_as1" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                    placeholder="Alamat Surat Menyurat 1" name="e_as1" value="{{ $pelesen->e_as1 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc4(); valid_as(); this.value = this.value.toUpperCase()">
                                <p type="hidden" id="err_as" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                <input type="text" id="e_as2" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Surat Menyurat 2" name="e_as2" value="{{ $pelesen->e_as2 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc5(); this.value = this.value.toUpperCase()">
                                <input type="text" id="e_as3" class="form-control" maxlength=60 style="text-transform:uppercase"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Surat Menyurat 3" name="e_as3" value="{{ $pelesen->e_as3 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc6(); this.value = this.value.toUpperCase()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    No. Telefon (Pejabat / Kilang)</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_notel" class="form-control" maxlength=40
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                    oninput="this.setCustomValidity(''); invokeFunc7(); valid_notel()"
                                    value="{{ $pelesen->e_notel }}" required>
                                <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label">
                                    No. Faks</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_nofax" class="form-control" maxlength=40
                                    placeholder="No. Faks" name="e_nofax" value="{{ $pelesen->e_nofax }}"
                                    onkeypress="return isNumberKey(event)" oninput=" invokeFunc8()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Emel Kilang</label>
                            </div>
                            <div class="col-md-7">
                                <input type="email" id="e_email" class="form-control" maxlength=60
                                    placeholder="Alamat Emel"
                                    oninvalid="setCustomValidity('Sila isi Alamat Emel Kilang dengan betul')"
                                    name="e_email" value="{{ $pelesen->e_email }}" required
                                    oninput="this.setCustomValidity(''); invokeFunc9(); valid_email(); ValidateEmail()">
                                <p type="hidden" id="err_email" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                                <p type="hidden" id="err_email2" style="color: red; display:none"><i>Sila masukkan
                                        alamat emel yang betul!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Nama Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npg" class="form-control" maxlength=60
                                    placeholder="Nama Pegawai Melapor"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_npg"
                                    value="{{ $pelesen->e_npg }}" required style="text-transform:uppercase"
                                    oninput="this.setCustomValidity(''); invokeFunc10(); valid_npg(); this.value = this.value.toUpperCase()">
                                <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Jawatan Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_jpg" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" style="text-transform:uppercase"
                                    oninput="this.setCustomValidity(''); invokeFunc11(); valid_jpg(); this.value = this.value.toUpperCase()"
                                    placeholder="Jawatan Pegawai Melapor" name="e_jpg" value="{{ $pelesen->e_jpg }}"
                                    required>
                                <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    No. Telefon Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_notel_pg" maxlength=40 class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="No. Telefon Pegawai Melapor" name="e_notel_pg"
                                    oninput="this.setCustomValidity(''); invokeFunc12(); valid_notelpg()"
                                    value="{{ $pelesen->e_notel_pg }}" onkeypress="return isNumberKey(event)" required>
                                <p type="hidden" id="err_notelpg" style="color: red; display:none"><i>Sila isi butiran
                                        di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Emel Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_email_pg" maxlength=100 class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Emel Pegawai Melapor" name="e_email_pg"
                                    oninput="this.setCustomValidity(''); invokeFunc13(); valid_emailpg()"
                                    value="{{ $pelesen->e_email_pg }}" required multiple>
                                <p type="hidden" id="err_emailpg" style="color: red; display:none"><i>Sila isi butiran
                                        di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Nama Pegawai Bertanggungjawab</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npgtg" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" style="text-transform:uppercase"
                                    placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                    oninput="this.setCustomValidity(''); invokeFunc14(); valid_npgtg(); this.value = this.value.toUpperCase()"
                                    value="{{ $pelesen->e_npgtg }}" required>
                                <p type="hidden" id="err_npgtg" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label">
                                    Jawatan Pegawai
                                    Bertanggungjawab<span  style="color:red">*</span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_jpgtg" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" style="text-transform:uppercase"
                                    placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                    oninput="this.setCustomValidity(''); invokeFunc15(); valid_jpgtg(); this.value = this.value.toUpperCase()"
                                    value="{{ $pelesen->e_jpgtg }}" required>
                                <p type="hidden" id="err_jpgtg" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Emel Pengurus</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_email_pengurus" class="form-control" maxlength=100
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                    oninput="this.setCustomValidity(''); invokeFunc16(); valid_emailpengurus()"
                                    value="{{ $pelesen->e_email_pengurus }}" required multiple>
                                <p type="hidden" id="err_emailpengurus" style="color: red; display:none"><i>Sila isi
                                        butiran di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Syarikat Induk</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_syktinduk" class="form-control"
                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                    placeholder="Syarikat Induk" name="e_syktinduk" style="text-transform:uppercase"
                                    oninput="this.setCustomValidity(''); invokeFunc17(); valid_syktinduk(); this.value = this.value.toUpperCase()"
                                    value="{{ $pelesen->e_syktinduk }}" required>
                                <p type="hidden" id="err_syktinduk" style="color: red; display:none"><i>Sila isi butiran
                                        di
                                        bahagian ini!</i></p>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Kumpulan </label>
                            </div>
                            <div class="col-md-7">
                                <fieldset class="form-group">
                                    <select class="form-control" id="e_group" name="e_group" required
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        oninput="this.setCustomValidity(''); valid_kumpulan()">
                                        <option selected value="">Sila Pilih Kumpulan</option>

                                        <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                            KERAJAAN</option>
                                        <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                            SWASTA</option>
                                    </select>
                                    <p type="hidden" id="err_group" style="color: red; display:none"><i>Sila buat
                                            pilihan di
                                            bahagian ini!</i></p>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Kapasiti Pemprosesan / Tahun</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="kap_proses" class="form-control"
                                    onkeyup="FormatCurrency(this)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                    onchange="validation_jumlah()"
                                    oninput="this.setCustomValidity(''); valid_proses(); invokeFunc18(); FormatCurrency(this)"
                                    onkeypress="return isNumberKey(event)" value="{{ number_format($pelesen->kap_proses ?? 0) }}" required>
                                <p type="hidden" id="err_proses" style="color: red; display:none"><i>Sila isi butiran di
                                        bahagian ini!</i></p>
                            </div>
                        </div>


                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <span><br></span><label for="fname" class="control-label col-form-label required">
                                    Bilangan Tangki</label><br>
                                <label for="fname" class="control-label col-form-label">
                                    Kapasiti tangki Simpanan (Tan)<span  style="color:red">*</span></label>
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
                                            <input type="text" class="form-control" name='bil_tangki_cpo'
                                                style="width:100%" size="15" id="bil_tangki_cpo" required
                                                title="Sila isikan butiran ini." onkeypress="return point(event)"
                                                value="{{ number_format($pelesen->bil_tangki_cpo ?? 0 ) }}" onchange="validation_jumlah()"
                                                oninput="this.setCustomValidity(''); invokeFunc19(); ableInput(); valid_cpo(); FormatCurrency(this)">
                                            @error('bil_tangki_cpo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='bil_tangki_ppo'
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_ppo" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_ppo ?? 0) }}" onchange="validation_jumlah()"
                                                oninput="this.setCustomValidity(''); invokeFunc20(); ableInput(); valid_ppo(); FormatCurrency(this)">
                                            @error('bil_tangki_ppo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='bil_tangki_cpko'
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_cpko" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_cpko ?? 0) }}" onchange="validation_jumlah()"
                                                oninput="this.setCustomValidity(''); invokeFunc21(); ableInput(); valid_cpko(); FormatCurrency(this)">
                                            @error('bil_tangki_cpko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='bil_tangki_ppko'
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_ppko" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_ppko ?? 0) }}" onchange="validation_jumlah()"
                                                oninput="this.setCustomValidity(''); invokeFunc22(); ableInput(); valid_ppko(); FormatCurrency(this)">
                                            @error('bil_tangki_ppko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='bil_tangki_oleo'
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_oleo" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_oleo ?? 0) }}" onchange="validation_jumlah()"
                                                oninput="this.setCustomValidity(''); invokeFunc23(); ableInput(); valid_oleo(); FormatCurrency(this)">
                                            @error('bil_tangki_oleo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='bil_tangki_others'
                                                size="15" onkeypress="return point(event)" style="width:100%"
                                                id="bil_tangki_others" required title="Sila isikan butiran ini."
                                                value="{{ number_format($pelesen->bil_tangki_others ?? 0) }}" onchange="validation_jumlah()"
                                                oninput="this.setCustomValidity(''); invokeFunc24(); ableInput(); valid_others(); FormatCurrency(this)">
                                            @error('bil_tangki_others')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <b>
                                                <span  style="font-size: 10pt"
                                                    id="bil_tangki_jumlah">{{ old('bil_tangki_jumlah') ?? number_format($jumlah) }}</span>
                                            </b>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top">
                                        <td><input type="text" class="form-control" name='kap_tangki_cpo'
                                                onkeypress="return point(event)" style="width:100%"
                                                oninput="this.setCustomValidity(''); invokeFunc25(); valid_cpo(); FormatCurrency(this)"
                                                id="kap_tangki_cpo" onchange="validation_jumlah2()"
                                                title="Sila isikan butiran ini." value="{{ number_format($pelesen->kap_tangki_cpo ?? 0) }}">
                                                <p type="hidden" id="err_kcpo" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_cpo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_ppo'
                                                onkeypress="return point(event)"
                                                oninput="this.setCustomValidity(''); invokeFunc26(); valid_ppo(); FormatCurrency(this)"
                                                style="width:100%" id="kap_tangki_ppo" onchange="validation_jumlah2()"
                                                title="Sila isikan butiran ini." value="{{ number_format($pelesen->kap_tangki_ppo ?? 0) }}">
                                                <p type="hidden" id="err_kppo" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_ppo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_cpko'
                                                onkeypress="return point(event)" style="width:100%"
                                                oninput="this.setCustomValidity(''); invokeFunc27(); valid_cpko(); FormatCurrency(this)"
                                                id="kap_tangki_cpko" onchange="validation_jumlah2()"
                                                title="Sila isikan butiran ini." value="{{ number_format($pelesen->kap_tangki_cpko ?? 0) }}">
                                                <p type="hidden" id="err_kcpko" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_cpko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_ppko'
                                                onkeypress="return point(event)" style="width:100%"
                                                oninput="this.setCustomValidity(''); valid_ppko(); FormatCurrency(this)"
                                                id="kap_tangki_ppko" onchange="validation_jumlah2()"
                                                title="Sila isikan butiran ini." value="{{ number_format($pelesen->kap_tangki_ppko ?? 0) }}">
                                                <p type="hidden" id="err_kppko" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_ppko')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_oleo'
                                                onkeypress="return point(event)" style="width:100%"
                                                oninput="this.setCustomValidity('');  valid_oleo(); FormatCurrency(this)"
                                                id="kap_tangki_oleo" onchange="validation_jumlah2()"
                                                title="Sila isikan butiran ini." value="{{ number_format($pelesen->kap_tangki_oleo ?? 0) }}">
                                                <p type="hidden" id="err_koleo" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('kap_tangki_oleo')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control" name='kap_tangki_others'
                                                onkeypress="return point(event)" style="width:100%"
                                                oninput="this.setCustomValidity(''); valid_others(); FormatCurrency(this)"
                                                id="kap_tangki_others" onchange="validation_jumlah2()"
                                                title="Sila isikan butiran ini."
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
                                        <td> <b><span id="kap_tangki_jumlah"  style="font-size: 10pt">
                                                    {{ old('kap_tangki_jumlah') ?? number_format($jumlah2) }}
                                                </span>
                                            </b>
                                        </td>
                                    </tr>
                                </table>
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


            <div class="row justify-content-center form-group" style="margin-top: 2%; ">
                <button type="button" class="btn btn-primary" onclick="check(); autozero()"
                    >Simpan</button>
            </div>

            <div class="modal fade" id="next" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                PENGESAHAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Anda pasti mahu menyimpan maklumat ini?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" data-bs="modal" id="checkBtn">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ya</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            {{-- </div> --}}


            </section><!-- End Hero -->
            {{-- @endsection
@section('scripts') --}}
            {{-- <div id="preloader"></div> --}}
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>


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
                //  var data = $('bil_tangki_jumlah').html();
                // $('#jumlah').html(data);
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
            <script>
                function autozero() {
                    let zero = '0';
                    var bcpo = document.getElementById('bil_tangki_cpo');
                    if (bcpo.value == '0.00' || bcpo.value == 0) {
                        bcpo.value = zero;
                    }

                    var bppo = document.getElementById('bil_tangki_ppo');
                    if (bppo.value == '0.00' || bppo.value == 0) {
                        bppo.value = zero;
                    }

                    var bcpko = document.getElementById('bil_tangki_cpko');
                    if (bcpko.value == '0.00' || bcpko.value == 0) {
                        bcpko.value = zero;
                    }

                    var bppko = document.getElementById('bil_tangki_ppko');
                    if (bppko.value == '0.00' || bppko.value == 0) {
                        bppko.value = zero;
                    }

                    var boleo = document.getElementById('bil_tangki_oleo');
                    if (boleo.value == '0.00' || boleo.value == 0) {
                        boleo.value = zero;
                    }

                    var bothers = document.getElementById('bil_tangki_others');
                    if (bothers.value == '0.00' || bothers.value == 0) {
                        bothers.value = zero;
                    }

                    var kcpo = document.getElementById('kap_tangki_cpo');
                    if (kcpo.value == '0.00' || kcpo.value == 0) {
                        kcpo.value = zero;
                    }

                    var kppo = document.getElementById('kap_tangki_ppo');
                    if (kppo.value == '0.00' || kppo.value == 0) {
                        kppo.value = zero;
                    }

                    var kcpko = document.getElementById('kap_tangki_cpko');
                    if (kcpko.value == '0.00' || kcpko.value == 0) {
                        kcpko.value = zero;
                    }

                    var kppko = document.getElementById('kap_tangki_ppko');
                    if (kppko.value == '0.00' || kppko.value == 0) {
                        kppko.value = zero;
                    }

                    var koleo = document.getElementById('kap_tangki_oleo');
                    if (koleo.value == '0.00' || koleo.value == 0) {
                        koleo.value = zero;
                    }

                    var kothers = document.getElementById('kap_tangki_others');
                    if (kothers.value == '0.00' || kothers.value == 0) {
                        kothers.value = zero;
                    }
                }
            </script>
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
                    var bil_tangki_others = document.getElementById('bil_tangki_others');
                    var bothers = bil_tangki_others.value.replace(/,/g, '');


                    // var bil_tangki_cpo = $("#bil_tangki_cpo").val();
                    // var bil_tangki_ppo = $("#bil_tangki_ppo").val();
                    // var bil_tangki_cpko = $("#bil_tangki_cpko").val();
                    // var bil_tangki_ppko = $("#bil_tangki_ppko").val();
                    // var bil_tangki_others = $("#bil_tangki_others").val();

                    var jumlah = $("#jumlah").val();
                    var jumlah_input = 0;

                    jumlah_input = parseFloat(Number(bcpo)) + parseFloat(Number(bppo)) +
                        parseFloat(Number(bcpko)) + parseFloat(Number(bppko)) + parseFloat(Number(
                            bothers));

                    document.getElementById('bil_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            </script>
            <script>
                function validation_jumlah2() {
                // $(document).ready(function() {

                    var kap_tangki_cpo =  document.getElementById('kap_tangki_cpo');
                    var kcpo = kap_tangki_cpo.value.replace(/,/g, '');
                    var kap_tangki_ppo =  document.getElementById('kap_tangki_ppo');
                    var kppo = kap_tangki_ppo.value.replace(/,/g, '');
                    var kap_tangki_cpko =  document.getElementById('kap_tangki_cpko');
                    var kcpko = kap_tangki_cpko.value.replace(/,/g, '');
                    var kap_tangki_ppko =  document.getElementById('kap_tangki_ppko');
                    var kppko = kap_tangki_ppko.value.replace(/,/g, '');
                    var kap_tangki_others =  document.getElementById('kap_tangki_others');
                    var kothers = kap_tangki_others.value.replace(/,/g, '');

                    var jumlah = $("#jumlah2").val();
                    var jumlah_input = 0;

                    jumlah_input = parseFloat(Number(kcpo)) + parseFloat(Number(kppo)) +
                        parseFloat(Number(kcpko)) + parseFloat(Number(kppko)) + parseFloat(Number(
                            kothers));

                    document.getElementById('kap_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            </script>
        @endsection
        @section('scripts')
            <script type="text/javascript">
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
            {{-- <script>
                function valid_poma() {

                    if ($('#e_poma').val() == '') {
                        $('#e_poma').css('border-color', 'red');
                        document.getElementById('err_poma').style.display = "block";


                    } else {
                        $('#e_poma').css('border-color', '');
                        document.getElementById('err_poma').style.display = "none";

                    }

                }
            </script> --}}
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
                            if ($('#kap_tangki_cpo').val() == '' || $('#kap_tangki_cpo').val() == '0') {
                                console.log($('#kap_tangki_cpo').val());
                                $('#kap_tangki_cpo').css('border-color', 'red');
                                document.getElementById('err_kcpo').style.display = "block";
                            } else {
                                console.log('kap_tangki no');
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

        var x = $('#kap_tangki_cpo').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#kap_tangki_cpo').val(x);

        var x = $('#bil_tangki_ppo').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#bil_tangki_ppo').val(x);

        var x = $('#kap_tangki_ppo').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#kap_tangki_ppo').val(x);

        var x = $('#bil_tangki_cpko').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#bil_tangki_cpko').val(x);

        var x = $('#kap_tangki_cpko').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#kap_tangki_cpko').val(x);

        var x = $('#bil_tangki_ppko').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#bil_tangki_ppko').val(x);

        var x = $('#kap_tangki_ppko').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#kap_tangki_ppko').val(x);

        var x = $('#bil_tangki_oleo').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#bil_tangki_oleo').val(x);

        var x = $('#kap_tangki_oleo').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#kap_tangki_oleo').val(x);


        var x = $('#bil_tangki_others').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#bil_tangki_others').val(x);

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
           var oleo = $('#bil_tangki_oleo').val();
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

            oleo = oleo.replace(/,/g, '');
            oleo = parseFloat(oleo, 10);
            console.log('oleo' + others);

            others = others.replace(/,/g, '');
            others = parseFloat(others, 10);
            console.log('others' + others);

            // !x  !(x > 0)
            if ((!cpo || !(cpo > 0)) && (!ppo  || !(ppo > 0)) && (!cpko ||  !(cpko > 0))  && (!ppko ||  !(ppko > 0)) && (!oleo  || !(oleo > 0)) && (!others ||  !(others > 0)) ) {
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
                function check() {
                    // (B1) INIT
                    var error = "",
                        field = "";

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
                function ValidateEmail() {
                    var inputText = document.getElementById('e_email');
                    console.log(inputText.value);
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (inputText.value.match(mailformat)) {
                        // alert("Valid email address!");
                        // document.myform.e_email.focus();
                        document.getElementById('err_email2').style.display = "none";

                        return true;
                    } else {
                        if (inputText.value != '') {
                            // alert("You have entered an invalid email address!");
                            $('#e_email').css('border-color', 'red');
                            document.getElementById('err_email2').style.display = "block";
                            return false;
                        }
                    }
                }
            </script>

            {{-- <script>
                $('#submit').click(function() {
                    var
                        $checkbox = $('#address'),
                        e_ap1 = $('#e_ap1').val(),
                        e_ap2 = $('#e_ap2').val(),
                        e_ap3 = $('#e_ap3').val(),
                        e_as1 = $('#e_as1').val(),
                        e_as2 = $('#e_as2').val(),
                        e_as3 = $('#e_as3').val(),

                        // Billing address is always sent, no matter the checkbox state
                        billing(e_ap1, e_ap2, e_ap3);

                    // Shipping address depends on checkbox state
                    if ($("#el").is(':checked') {
                            shipping(e_ap1, e_ap2, e_ap3);
                            console.log(checked);
                        } else {
                            shipping(e_as1, e_as2, e_as3);
                        })
                });


                // $('.le-checkbox').on('change', function() {
                //         $("#deliveryadd").toggle();
                //         // .toggle() is simpler than .show() and .hide()
                //         // if (this.checked) {
                //         //     $("#deliveryadd").hide();
                //         // } else {
                //         //     $("#deliveryadd").show();
                //         // }
                //     }
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                    //console.log(evt.which);
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
                            document.getElementById('kap_tangki_ppo').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc20() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('bil_tangki_cpko').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc21() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('bil_tangki_ppko').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>

            <script>
                function invokeFunc22() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('bil_tangki_others').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc23() {
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
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>

            <script>
                function invokeFunc24() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('kap_tangki_ppo').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc25() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('kap_tangki_cpko').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc26() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('kap_tangki_ppko').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc27() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('kap_tangki_others').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    //console.log(evt.which);
                    return evt.which;
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

        @endsection
