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
                    <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda ' </i><b style="color: red"> *
                    </b><i>'</i>
                    <form action="{{ route('isirung.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}" method="post" onsubmit="return check()" novalidate class="sub-form">
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
                                        oninput="this.setCustomValidity(''); invokeFunc(); valid_ap()"
                                        required >
                                    <p type="hidden" id="err_ap" style="color: red; display:none"><i>Sila isi butiran di
                                                                                bahagian ini!</i></p>
                                    @error('e_ap1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap2" class="form-control" maxlength="60"
                                        autocomplete="off" placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                        oninput="this.setCustomValidity(''); invokeFunc2()"
                                        value="{{ $pelesen->e_ap2 }}">
                                    @error('e_ap2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap3" class="form-control" maxlength="60"
                                        placeholder="Alamat Premis Berlesen 3" name="e_ap3"
                                        oninput="this.setCustomValidity(''); invokeFunc3()"
                                        value="{{ $pelesen->e_ap3 }}">

                                    @error('e_ap3')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
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
                                    <input type="text" id="e_as1" class="form-control" autocomplete="off"
                                        placeholder="Alamat Surat Menyurat 1" name="e_as1" maxlength="60"
                                        value="{{ $pelesen->e_as1 }}" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc4(); valid_as()">
                                        <p type="hidden" id="err_as" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
                                        @error('e_as1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_as2" class="form-control" maxlength="60"
                                        autocomplete="off" placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                        oninput="this.setCustomValidity(''); invokeFunc5()"
                                        value="{{ $pelesen->e_as2 }}">
                                    @error('e_as2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_as3" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                        oninput="this.setCustomValidity(''); invokeFunc6()"
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
                                        placeholder="No. Telefon Pejabat / Kilang" name="e_notel"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc7(); valid_notel()"
                                        value="{{ $pelesen->e_notel }}" required>
                                        <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
                                        @error('e_notel')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label" >
                                        No. Faks</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_nofax" class="form-control" placeholder="No. Faks"
                                        maxlength="40" oninput="this.setCustomValidity(''); invokeFunc8()" onkeypress="return isNumberKey(event)" name="e_nofax"
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
                                    <input type="email" id="e_email" class="form-control" placeholder="Alamat Emel" maxlength="60"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc9(); valid_email(); ValidateEmail()"
                                        name="e_email" value="{{ $pelesen->e_email }}" required>
                                        <p type="hidden" id="err_email" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
                                            <p type="hidden" id="err_email2" style="color: red; display:none"><i>Sila masukkan
                                                alamat emel yang betul!</i></p>
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
                                        placeholder="Nama Pegawai Melapor" name="e_npg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc10(); valid_npg()"
                                        value="{{ $pelesen->e_npg }}" required>
                                        <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
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
                                        placeholder="Jawatan Pegawai Melapor" name="e_jpg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc11(); valid_jpg()"
                                        value="{{ $pelesen->e_jpg }}" required>
                                        <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
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
                                        name="e_notel_pg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc12(); valid_notelpg()"
                                        onkeypress="return isNumberKey(event)"  value="{{ $pelesen->e_notel_pg }}" required>
                                        <p type="hidden" id="err_notelpg" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
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
                                            placeholder="Alamat Emel Pegawai Melapor"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc13(); valid_emailpg()"
                                            name="e_email_pg" value="{{ $pelesen->e_email_pg }}" required >
                                            <p type="hidden" id="err_emailpg" style="color: red; display:none"><i>Sila isi butiran di
                                                bahagian ini!</i></p>
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
                                        placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc14(); valid_npgtg()"
                                        value="{{ $pelesen->e_npgtg }}" required>
                                        <p type="hidden" id="err_npgtg" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
                                    @error('e_npgtg')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname" class="control-label col-form-label ">
                                        Jawatan Pegawai Bertanggungjawab<span  style="color:red">*</span></label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_jpgtg" class="form-control" maxlength="60"
                                        placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc15(); valid_jpgtg()"
                                        value="{{ $pelesen->e_jpgtg }}" required>
                                        <p type="hidden" id="err_jpgtg" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
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
                                        placeholder="Alamat Emel Pengurus" name="e_email_pengurus" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc16(); valid_emailpengurus()"
                                        value="{{ $pelesen->e_email_pengurus  }}" required multiple>
                                        <p type="hidden" id="err_emailpengurus" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>


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
                                        placeholder="Syarikat Induk" name="e_syktinduk" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc17(); valid_syktinduk()"
                                        value="{{ $pelesen->e_syktinduk}}" required>
                                        <p type="hidden" id="err_syktinduk" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
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
                                        <select class="form-control" id="e_group" name="e_group" required oninput="this.setCustomValidity(''); invokeFunc18(); valid_kumpulan()">

                                            <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                Kerajaan</option>
                                            <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                Swasta</option>
                                        </select>
                                        <p type="hidden" id="err_group" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
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
                                        placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses" required  oninvalid="this.setCustomValidity('Sila isi ruangan ini')" oninput="this.setCustomValidity(''); invokeFunc19(); valid_proses(); FormatCurrency()"
                                        onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_proses }}">
                                        <p type="hidden" id="err_proses" style="color: red; display:none"><i>Sila isi butiran di
                                            bahagian ini!</i></p>
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
                                        id="bil_tangki_cpko" title="Sila isikan butiran ini." oninput="this.setCustomValidity(''); invokeFunc20(); ableInput(); valid_cpko(); FormatCurrency(this)"
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
                                    <label for="fname" class="control-label col-form-label">
                                        Kapasiti Tangki Simpanan (Tan)<span  style="color:red">*</span></label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name='kap_tangki_cpko'
                                        style="width:20%" id="kap_tangki_cpko"
                                        oninput="this.setCustomValidity(''); validate_two_decimal(this); valid_cpko(); FormatCurrency(this)"
                                        title="Sila isikan butiran ini."
                                        onkeypress="return isNumberKey(event)"  value="{{ $pelesen->kap_tangki_cpko}}" required>
                                        <p type="hidden" id="err_kcpko" style="color: red; display:none"><i>Sila isi
                                            butiran di
                                            bahagian ini!</i></p>
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
                    <button type="button" class="btn btn-primary"  onclick="check()">Simpan</button>
                </div>

            </div>

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
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
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
            {{-- <script type="text/javascript">
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
            </script> --}}
           <script>
            $(document).ready(function() {
                // console.log('ready');

                let bil_cpko = document.querySelector("#bil_tangki_cpko");
                let kap_cpko = document.querySelector("#kap_tangki_cpko");
                if (bil_cpko.value != 0) {
                    kap_cpko.disabled = false;
                } else {
                    kap_cpko.disabled = true;
                }


            });
            </script>
            <script>
            function ableInput() {

                let bil_cpko = document.querySelector("#bil_tangki_cpko");
                let kap_cpko = document.querySelector("#kap_tangki_cpko");


                if (bil_cpko.value == '' || bil_cpko.value == '0') {
                    kap_cpko.disabled = true;
                    // $('#kap_tangki_cpo').val() == 0;
                    document.querySelector("#kap_tangki_cpko").value = "0";

                } else {
                    kap_cpko.disabled = false;
                }



            };
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

                    cpko = $('#bil_tangki_cpko').val();
                    kcpko = $('#kap_tangki_cpko').val();

                    if (cpko != 0 && kcpko == 0) {
                        error += "Name must be 2-4 characters\r\n";
                        $('#kap_tangki_cpko').css('border-color', 'red');
                        document.getElementById('err_kcpko').style.display = "block";
                    } else {
                        $('#kap_tangki_cpko').css('border-color', '');
                        document.getElementById('err_kcpko').style.display = "none";
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
        $('.sub-form').submit(function() {

            var x = $('#bil_tangki_cpko').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpko').val(x);

            var x = $('#kap_tangki_cpko').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpko').val(x);




            return true;

        });
    </script>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#checkBtn').click(function() {
                // checked = $("input[type=checkbox]:checked").length;
                // tangki = $('#bil_tangki_cpko').val();
                var x = $('#bil_tangki_cpko').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);

                if (!x || !(x > 0)) {
                    console.log(x);

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
                            document.getElementById('e_group').focus();
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
                function invokeFunc19() {
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
                function invokeFunc20() {
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

                $("#kap_proses").keypress(function(event) {
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
            </script>

            </body>

            </html>
        @endsection
