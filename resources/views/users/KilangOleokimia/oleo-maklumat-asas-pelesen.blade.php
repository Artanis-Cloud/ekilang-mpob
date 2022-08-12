@extends('layouts.main')

@section('content')
    <div class="page-wrapper" style="transition: 0s;">
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
            <div class="card-body">
                <div class="">
                    <div class=" text-center">
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan </i>
                        </h5>
                    </div>
                    <hr>
                    <i>Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda ' </i><b style="color: red"> * </b><i>'</i>
                    <form action="{{ route('oleo.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}" method="post" onsubmit="return check()" novalidate>
                        @csrf
                        <div class="container center mt-5">
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                        class="control-label required col-form-label">
                                        Alamat Premis Berlesen</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_ap1" class="form-control" maxlength="60" required oninput="this.setCustomValidity(''); invokeFunc()"
                                        placeholder="Alamat Surat Menyurat 1" name="e_ap1" value="{{ $pelesen->e_ap1 }}">
                                    @error('e_ap1')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap2" class="form-control" maxlength="60" oninput="this.setCustomValidity(''); invokeFunc2()"
                                        placeholder="Alamat Surat Menyurat 2" name="e_ap2" value="{{ $pelesen->e_ap2 }}">
                                    @error('e_ap2')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap3" class="form-control" maxlength="60" oninput="this.setCustomValidity(''); invokeFunc3()"
                                        placeholder="Alamat Surat Menyurat 3" name="e_ap3" value="{{ $pelesen->e_ap3 }}">
                                    @error('e_ap3')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px"></div>
                                        <div class="col-md-7">
                                            <input onchange="alamat();"
                                                type="checkbox" class="custom-control-input"
                                                id="alamat_sama" name="alamat_sama" {{ old('alamat_sama') == 'on' ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="alamat_sama">Alamat sama seperti di
                                                atas</label>

                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Alamat Surat Menyurat</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_as1" class="form-control" maxlength="60" required
                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                            oninput="this.setCustomValidity(''); invokeFunc4()"
                                                placeholder="Alamat Surat Menyurat 1" name="e_as1" value="{{ $pelesen->e_as1 }}">
                                            @error('e_as1')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror

                                            <input type="text" id="e_as2" class="form-control" maxlength="60" oninput="this.setCustomValidity(''); invokeFunc5()"
                                                placeholder="Alamat Surat Menyurat 2" name="e_as2" value="{{ $pelesen->e_as2 }}">
                                            @error('e_as2')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror

                                            <input type="text" id="e_as3" class="form-control" maxlength="60" oninput="this.setCustomValidity(''); invokeFunc6()"
                                                placeholder="Alamat Surat Menyurat 3" name="e_as3" value="{{ $pelesen->e_as3 }}">
                                            @error('e_as3')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            No. Telefon (Pejabat / Kilang)</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_notel" class="form-control" maxlength="40" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                            oninput="this.setCustomValidity(''); invokeFunc7()"
                                                placeholder="No. Telefon Pejabat / Kilang" onkeypress="return isNumberKey(event)"
                                                name="e_notel" value="{{ $pelesen->e_notel }}" required>
                                            @error('e_notel')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label ">
                                            No. Faks</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_nofax" class="form-control" placeholder="No. Faks" maxlength="60" oninput="this.setCustomValidity(''); invokeFunc8()"
                                                name="e_nofax" value="{{ $pelesen->e_nofax }}" onkeypress="return isNumberKey(event)" >
                                            @error('e_nofax')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Alamat Emel Kilang</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="email" id="e_email" class="form-control" placeholder="Alamat Emel" maxlength="60" required
                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                            oninput="this.setCustomValidity(''); invokeFunc9()"
                                                name="e_email" value="{{ $pelesen->e_email }}">
                                            @error('e_email')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Nama Pegawai Melapor</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_npg" class="form-control" maxlength="60" placeholder="Nama Pegawai Melapor" required
                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc10()"
                                                name="e_npg" value="{{ $pelesen->e_npg }}">
                                            @error('e_npg')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Jawatan Pegawai Melapor</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_jpg" class="form-control" maxlength="60"
                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc11()"
                                                placeholder="Jawatan Pegawai Melapor" name="e_jpg" value="{{ $pelesen->e_jpg }}"
                                                required>
                                            @error('e_jpg')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            No. Telefon Pegawai Melapor</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_notel_pg" class="form-control" maxlength="40"
                                                placeholder="No. Telefon Pegawai Melapor" name="e_notel_pg"
                                                oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc12()"
                                                onkeypress="return isNumberKey(event)" value="{{ $pelesen->e_notel_pg }}"
                                                required multiple>
                                            @error('e_notel_pg')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Alamat Emel Pegawai Melapor</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_email_pg" class="form-control" maxlength="100"
                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc13()"
                                                placeholder="Alamat Emel Pegawai Melapor" name="e_email_pg"
                                                value="{{ $pelesen->e_email_pg }}" required multiple>
                                            @error('e_email_pg')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Nama Pegawai Bertanggungjawab</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_npgtg" class="form-control" maxlength="60"
                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc14()"
                                                placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                                value="{{ $pelesen->e_npgtg }}" required>
                                            @error('e_npgtg')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Jawatan Pegawai
                                            Bertanggungjawab</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_jpgtg" class="form-control" maxlength="60"
                                                placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                                oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc15()"
                                                value="{{ $pelesen->e_jpgtg }}" required>
                                            @error('e_jpgtg')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Alamat Emel Pengurus</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_email_pengurus" class="form-control" maxlength="60"
                                                placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                                oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc16()"
                                                value="{{ $pelesen->e_email_pengurus }}" required multiple>
                                            @error('e_email_pengurus')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Syarikat Induk</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="e_syktinduk" class="form-control" placeholder="Syarikat Induk"
                                            oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc17()"
                                                name="e_syktinduk" value="{{ $pelesen->e_syktinduk }}" required>

                                            @error('e_syktinduk')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Kumpulan </label>
                                        </div>
                                        <div class="col-md-7">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="e_group" name="e_group" required>
                                                    <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                        Kerajaan</option>
                                                    <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                        Swasta</option>
                                                </select>
                                            </fieldset>
                                            @error('e_group')
                                                <div class="alert alert-danger">
                                                    <strong>Sila buat pilihan di bahagian ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <label for="fname"
                                            class="control-label col-form-label required">
                                            Kapasiti Pemprosesan / Tahun</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" id="kap_proses" class="form-control"
                                                onkeypress="return isNumberKey(event)" placeholder="Kapasiti Pemprosesan / Tahun"
                                                oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc18()"
                                                name="kap_proses" value="{{ $pelesen->kap_proses }}" required>
                                            @error('kap_proses')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                            <span><br></span><label for="fname"
                                                class="control-label col-form-label required">
                                                Bilangan Tangki</label><br>
                                                <label for="fname"
                                                class="control-label col-form-label required">
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
                                                        <input type="text" class="form-control" name='bil_tangki_cpo' style="width:100%"
                                                            size="15" id="bil_tangki_cpo" required title="Sila isikan butiran ini."
                                                            onkeypress="return isNumberKey(event)"
                                                            value="{{ $pelesen->bil_tangki_cpo }}" onchange="validation_jumlah()" oninput="this.setCustomValidity(''); invokeFunc19()">
                                                        @error('bil_tangki_cpo')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name='bil_tangki_ppo' size="15"
                                                            onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_ppo"
                                                            required title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->bil_tangki_ppo }}" onchange="validation_jumlah()" oninput="this.setCustomValidity(''); invokeFunc20()">
                                                        @error('bil_tangki_ppo')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name='bil_tangki_cpko' size="15"
                                                            onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_cpko"
                                                            required title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->bil_tangki_cpko  }}" onchange="validation_jumlah()" oninput="this.setCustomValidity(''); invokeFunc21()">
                                                        @error('bil_tangki_cpko')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td> <input type="text" class="form-control" name='bil_tangki_ppko' size="15"
                                                            onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_ppko"
                                                            required title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->bil_tangki_ppko }}" onchange="validation_jumlah()" oninput="this.setCustomValidity(''); invokeFunc22()">
                                                        @error('bil_tangki_ppko')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text" class="form-control" name='bil_tangki_oleo' size="15"
                                                            onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_oleo"
                                                            required title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->bil_tangki_oleo }}" onchange="validation_jumlah()" oninput="this.setCustomValidity(''); invokeFunc23()">
                                                        @error('bil_tangki_oleo')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text" class="form-control" name='bil_tangki_others' size="15"
                                                            onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_others"
                                                            required title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->bil_tangki_others }}" onchange="validation_jumlah()" oninput="this.setCustomValidity(''); invokeFunc24()">
                                                        @error('bil_tangki_others')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <b>
                                                            <span id="bil_tangki_jumlah">{{ old('bil_tangki_jumlah') ?? number_format($jumlah, 2) }}</span>
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name='kap_tangki_cpo'
                                                            onkeypress="return isNumberKey(event)" style="width:100%" oninput="this.setCustomValidity(''); invokeFunc25()" id="kap_tangki_cpo"
                                                            onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->kap_tangki_cpo  }}">
                                                        @error('kap_tangki_cpo')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td>  <input type="text" class="form-control" name='kap_tangki_ppo'
                                                        onkeypress="return isNumberKey(event)" oninput="this.setCustomValidity(''); invokeFunc26()" style="width:100%" id="kap_tangki_ppo"
                                                            onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->kap_tangki_ppo  }}">
                                                        @error('kap_tangki_ppo')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td>  <input type="text" class="form-control" name='kap_tangki_cpko'
                                                            onkeypress="return isNumberKey(event)" style="width:100%" oninput="this.setCustomValidity(''); invokeFunc27()" id="kap_tangki_cpko"
                                                            onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->kap_tangki_cpko }}">
                                                        @error('kap_tangki_cpko')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td>  <input type="text" class="form-control" name='kap_tangki_ppko'
                                                            onkeypress="return isNumberKey(event)" style="width:100%" oninput="this.setCustomValidity(''); invokeFunc28()" id="kap_tangki_ppko"
                                                            onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->kap_tangki_ppko  }}">
                                                        @error('kap_tangki_ppko')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td>  <input type="text" class="form-control" name='kap_tangki_oleo'
                                                            onkeypress="return isNumberKey(event)" style="width:100%" oninput="this.setCustomValidity(''); invokeFunc29()" id="kap_tangki_oleo"
                                                            onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                            value="{{ $pelesen->kap_tangki_oleo }}">
                                                        @error('kap_tangki_oleo')
                                                            <div class="alert alert-danger">
                                                                <strong>Sila isi butiran ini</strong>
                                                            </div>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text" class="form-control" name='kap_tangki_others'
                                                        onkeypress="return isNumberKey(event)" style="width:100%" oninput="this.setCustomValidity(''); invokeFunc30()" id="kap_tangki_others"
                                                        onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                        value="{{ $pelesen->kap_tangki_others  }}">
                                                    @error('kap_tangki_others')
                                                        <div class="alert alert-danger">
                                                            <strong>Sila isi butiran ini</strong>
                                                        </div>
                                                    @enderror
                                                    </td>
                                                    <td> <b><span id="kap_tangki_jumlah">
                                                        {{ old('kap_tangki_jumlah') ?? number_format($jumlah2, 2) }}
                                                        </span>
                                                        </b>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="row mx-3" style="margin-left:14%">
                                        <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                            khusus untuk sesuatu produk. Sila campurkan kesemua
                                            bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                        </i>
                                    </div>


                                </div>


                                <div class="row justify-content-center form-group" style="margin-top: 2%">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
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
                                                <button type="button" class="close" data-dismiss="modal"
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
                                                <button type="submit" class="btn btn-primary ml-1" data-bs="modal" id="checkBtn">
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

                    </html>
                @endsection

    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="assets/js/main.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
        function validation_jumlah() {
            var bil_tangki_cpo = $("#bil_tangki_cpo").val();
            var bil_tangki_ppo = $("#bil_tangki_ppo").val();
            var bil_tangki_cpko = $("#bil_tangki_cpko").val();
            var bil_tangki_ppko = $("#bil_tangki_ppko").val();
            var bil_tangki_oleo = $("#bil_tangki_oleo").val();
            var bil_tangki_others = $("#bil_tangki_others").val();

            var jumlah = $("#jumlah").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(bil_tangki_cpo)) + parseFloat(Number(bil_tangki_ppo)) +
                parseFloat(Number(bil_tangki_cpko)) + parseFloat(Number(bil_tangki_ppko)) + parseFloat(Number(
                    bil_tangki_oleo)) + parseFloat(Number(bil_tangki_others));

            document.getElementById('bil_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
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
    <script>
        function validation_jumlah2() {
            var kap_tangki_cpo = $("#kap_tangki_cpo").val();
            var kap_tangki_ppo = $("#kap_tangki_ppo").val();
            var kap_tangki_cpko = $("#kap_tangki_cpko").val();
            var kap_tangki_ppko = $("#kap_tangki_ppko").val();
            var kap_tangki_oleo = $("#kap_tangki_oleo").val();
            var kap_tangki_others = $("#kap_tangki_others").val();

            var jumlah = $("#jumlah2").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(kap_tangki_cpo)) + parseFloat(Number(kap_tangki_ppo)) +
                parseFloat(Number(kap_tangki_cpko)) + parseFloat(Number(kap_tangki_ppko)) + parseFloat(Number(
                    kap_tangki_oleo)) + parseFloat(Number(kap_tangki_others));

            document.getElementById('kap_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
        }
    </script>


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
            kap_cpo.disabled = true;
            kap_ppo.disabled = true;
            kap_cpko.disabled = true;
            kap_ppko.disabled = true;
            kap_oleo.disabled = true;
            kap_others.disabled = true;
            bil_cpo.addEventListener("change", stateHandle);
            bil_ppo.addEventListener("change", stateHandle);
            bil_cpko.addEventListener("change", stateHandle);
            bil_ppko.addEventListener("change", stateHandle);
            bil_oleo.addEventListener("change", stateHandle);
            bil_others.addEventListener("change", stateHandle);

            // val_cpo = $('#kap_tangki_cpo').val();

            function stateHandle() {
                if (document.querySelector("#bil_tangki_cpo").value === "" || document.querySelector("#bil_tangki_cpo")
                    .value === "0") {
                    kap_cpo.disabled = true;
                    document.querySelector("#kap_tangki_cpo").value = "0";

                } else {
                    kap_cpo.disabled = false;
                }
                if (document.querySelector("#bil_tangki_ppo").value === "" || document.querySelector("#bil_tangki_ppo")
                    .value === "0") {
                    kap_ppo.disabled = true;
                    document.querySelector("#kap_tangki_ppo").value = "0";

                } else {
                    kap_ppo.disabled = false;
                }
                if (document.querySelector("#bil_tangki_cpko").value === "" || document.querySelector("#bil_tangki_cpko")
                    .value === "0") {
                    kap_cpko.disabled = true;
                    document.querySelector("#kap_tangki_cpko").value = "0";

                } else {
                    kap_cpko.disabled = false;
                }
                if (document.querySelector("#bil_tangki_ppko").value === "" || document.querySelector("#bil_tangki_ppko")
                    .value === "0") {
                    kap_ppko.disabled = true;
                    document.querySelector("#kap_tangki_ppko").value = "0";

                } else {
                    kap_ppko.disabled = false;
                }
                if (document.querySelector("#bil_tangki_oleo").value === "" || document.querySelector("#bil_tangki_oleo")
                    .value === "0") {
                    kap_oleo.disabled = true;
                    document.querySelector("#kap_tangki_oleo").value = "0";

                } else {
                    kap_oleo.disabled = false;
                }
                if (document.querySelector("#bil_tangki_others").value === "" || document.querySelector("#bil_tangki_others")
                    .value === "0") {
                    kap_others.disabled = true;
                    document.querySelector("#kap_tangki_others").value = "0";

                } else {
                    kap_others.disabled = false;
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
                  // kap_proses
                  field = document.getElementById("kap_proses");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki cpo
                    field = document.getElementById("bil_tangki_cpo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil_tangki_ppo
                    field = document.getElementById("bil_tangki_ppo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil_tangki_cpko
                    field = document.getElementById("bil_tangki_cpko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki ppko
                    field = document.getElementById("bil_tangki_ppko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki others
                    field = document.getElementById("bil_tangki_others");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap tangki cpo
                    field = document.getElementById("kap_tangki_cpo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap_tangki_ppo
                    field = document.getElementById("kap_tangki_ppo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap_tangki_cpko
                    field = document.getElementById("kap_tangki_cpko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap tangki ppko
                    field = document.getElementById("kap_tangki_ppko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap tangki others
                    field = document.getElementById("kap_tangki_others");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki oleo
                    field = document.getElementById("bil_tangki_oleo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap tangki oleo
                    field = document.getElementById("kap_tangki_oleo");
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
        <script>
            document.addEventListener('keypress', function (e) {
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
                document.getElementById('bil_tangki_ppo').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
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
        console.log(evt.which);
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
        console.log(evt.which);
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
                document.getElementById('bil_tangki_oleo').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
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
                document.getElementById('bil_tangki_others').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
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
    function invokeFunc25() {
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
        console.log(evt.which);
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
                document.getElementById('kap_tangki_cpko').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
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
                document.getElementById('kap_tangki_ppko').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
<script>
    function invokeFunc28() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('kap_tangki_oleo').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
<script>
    function invokeFunc29() {
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
        console.log(evt.which);
        return evt.which;
    }
</script>

        @endsection
