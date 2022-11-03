@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Profil Pelesen</h4>
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
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="row" style="padding: 20px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                        class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.1daftarpelesen.proses') }}" method="post" onsubmit="return check()" class="sub-form"
                            novalidate>
                            @csrf
                            <div class="card-body">
                                <div class=" text-center">
                                    <h3 style="color: rgb(39, 80, 71); margin-top:-50px">Daftar Pelesen Baru</h3><br>
                                </div>
                                <hr>
                                <div class="mb-2 col-8" style="text-align: left">
                                    <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda '</i><b style="color: red">
                                        *</b><i>'</i>
                                </div>

                                <div class="row" style="padding: 1%">
                                <div class="col-md-6">
                                    <p class="ml-5" style="border-bottom-style: solid; width: 73%; padding: 15px;">
                                        Maklumat Kilang
                                    </p>
                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            {{-- @if ($errors->any())
                                            {{ implode('', $errors->all('<div>:message</div>')) }}
                                            @endif --}}
                                            <label for="fname" class="control-label col-form-label required">
                                                Jenis Kilang</label>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group" style="margin-bottom: 20px ">
                                                <select class="form-control" name="e_kat" id="e_kat" required
                                                    onchange="poma(); showDetail(); showDetailkodpgw()" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_kat()">
                                                    <option selected hidden disabled value="">Sila Pilih Kilang</option>
                                                    @if (auth()->user()->sub_cat)
                                                        @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                                            @if ($cat == 'PL91')
                                                                <option value="PL91">KILANG BUAH</option>
                                                            @endif
                                                            @if ($cat == 'PL101')
                                                                <option value="PL101">KILANG PENAPIS</option>
                                                            @endif
                                                            @if ($cat == 'PL102')
                                                                <option value="PL102">KILANG ISIRUNG</option>
                                                            @endif
                                                            @if ($cat == 'PL104')
                                                                <option value="PL104">KILANG OLEOKIMIA</option>
                                                            @endif
                                                            @if ($cat == 'PL111')
                                                                <option value="PL111">PUSAT SIMPANAN</option>
                                                            @endif
                                                            @if ($cat == 'PLBIO')
                                                                <option value="PLBIO">KILANG BIODIESEL</option>
                                                            @endif
                                                            @if ($cat == null)
                                                                <option value="PL91">KILANG BUAH</option>
                                                                <option value="PL101">KILANG PENAPIS</option>
                                                                <option value="PL102">KILANG ISIRUNG</option>
                                                                <option value="PL104">KILANG OLEOKIMIA</option>
                                                                <option value="PL111">PUSAT SIMPANAN</option>
                                                                <option value="PL102">KILANG BIODIESEL</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                    <option value="PL91">KILANG BUAH</option>
                                                    <option value="PL101">KILANG PENAPIS</option>
                                                    <option value="PL102">KILANG ISIRUNG</option>
                                                    <option value="PL104">KILANG OLEOKIMIA</option>
                                                    <option value="PL111">PUSAT SIMPANAN</option>
                                                    <option value="PL102">KILANG BIODIESEL</option>
                                                    @endif

                                                </select>
                                                <p type="hidden" id="err_kat" style="color: red; display:none"><i>Sila buat
                                                        pilihan di
                                                        bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label class="control-label col-form-label required">Status e-Kilang</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <select class="form-control" name="e_status" required id="e_status" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity(''); valid_status()">
                                                <option selected value="">Sila Pilih</option>
                                                <option value="1">AKTIF</option>
                                                <option value="2">TIDAK AKTIF</option>
                                            </select>
                                            <p type="hidden" id="err_status" style="color: red; display:none"><i>Sila buat
                                                    pilihan di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label class="control-label col-form-label required">Status e-Mingguan</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <select class="form-control" name="e_stock" required id="e_stock" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity(''); valid_stock()">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                <option value="1">AKTIF</option>
                                                <option value="2">TIDAK AKTIF</option>
                                            </select>
                                            <p type="hidden" id="err_stock" style="color: red; display:none"><i>Sila buat
                                                    pilihan di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label class="control-label col-form-label required">Status Direktori</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <select class="form-control" name="directory" required id="directory" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity(''); valid_dir()">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                <option value="Y">YA</option>
                                                <option value="N">TIDAK</option>
                                            </select>
                                            <p type="hidden" id="err_dir" style="color: red; display:none"><i>Sila buat
                                                    pilihan di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>
                                    <div id="nonbio_container" style="display:block">
                                        <div class="row ml-5">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <label class="control-label col-form-label required">Kod Negeri </label>
                                            </div>
                                            <div id="101_container" class="col-md-6" style="margin-bottom: 20px; display:none">
                                                <select class="form-control" id="kodpgw" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_kodpgw()">
                                                    <option selected hidden value="">Sila Pilih</option>
                                                    <option value="FA">FA</option>
                                                    <option value="FB">FB</option>
                                                    <option value="FC">FC</option>
                                                    <option value="FD">FD</option>
                                                    <option value="FJ">FJ</option>
                                                    <option value="FP">FP</option>
                                                    <option value="FQ">FQ</option>
                                                    <option value="FS">FS</option>

                                                </select>
                                                <p type="hidden" id="err_kodpgw" style="color: red; display:none"><i>Sila buat
                                                        pilihan di
                                                        bahagian ini!</i></p>
                                            </div>
                                            <div id="104_container" class="col-md-6" style="margin-bottom: 20px; display:none">
                                                <select class="form-control"  id="kodpgw2" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_kodpgw()">
                                                    <option selected hidden value="">Sila Pilih</option>
                                                    <option value="CA">CA</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CJ">CJ</option>
                                                    <option value="CP">CP</option>
                                                    <option value="CS">CS</option>

                                                </select>
                                                <p type="hidden" id="err_kodpgw" style="color: red; display:none"><i>Sila buat
                                                        pilihan di
                                                        bahagian ini!</i></p>
                                            </div>
                                            <div id="07_container" class="col-md-6" style="margin-bottom: 20px; display:none">
                                                <select class="form-control" id="kodpgw3" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_kodpgw()">
                                                    <option selected hidden value="">Sila Pilih</option>
                                                    <option value="BB">BB</option>
                                                    <option value="BC">BC</option>
                                                    <option value="BJ">BJ</option>
                                                    <option value="BP">BP</option>
                                                    <option value="BQ">BQ</option>
                                                    <option value="BS">BS</option>

                                                </select>
                                                <p type="hidden" id="err_kodpgw" style="color: red; display:none"><i>Sila buat
                                                        pilihan di
                                                        bahagian ini!</i></p>
                                            </div>
                                            <div id="102_container" class="col-md-6" style="margin-bottom: 20px; display:none">
                                                <select class="form-control" id="kodpgw4" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_kodpgw()">
                                                    <option selected hidden value="">Sila Pilih</option>
                                                    <option value="JJ">JJ</option>
                                                    <option value="NS">NS</option>
                                                    <option value="PH">PH</option>
                                                    <option value="PK">PK</option>
                                                    <option value="PP">PP</option>
                                                    <option value="SA">SA</option>
                                                    <option value="SS">SS</option>
                                                    <option value="SW">SW</option>
                                                    <option value="WP">WP</option>

                                                </select>
                                                <p type="hidden" id="err_kodpgw" style="color: red; display:none"><i>Sila buat
                                                        pilihan di
                                                        bahagian ini!</i></p>
                                            </div>
                                            <div id="91_container" class="col-md-6" style="margin-bottom: 20px; display:block">
                                                <select class="form-control" id="kodpgw5" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); valid_kodpgw()">
                                                    <option selected value="">Sila Pilih</option>
                                                    <option value="JJ">JJ</option>
                                                    <option value="KB">KB</option>
                                                    <option value="KK">KK</option>
                                                    <option value="MM">MM</option>
                                                    <option value="NS">NS</option>
                                                    <option value="PH">PH</option>
                                                    <option value="PK">PK</option>
                                                    <option value="PP">PP</option>
                                                    <option value="SA">SA</option>
                                                    <option value="SS">SS</option>
                                                    <option value="SW">SW</option>
                                                    <option value="TT">TT</option>
                                                    <option value="WP">WP</option>

                                                </select>
                                                <p type="hidden" id="err_kodpgw" style="color: red; display:none"><i>Sila buat
                                                        pilihan di
                                                        bahagian ini!</i></p>
                                            </div>
                                        </div>
                                        <div class="row ml-5">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <label for="inputcom" class="control-label col-form-label required">Nombor
                                                    Siri</label>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                                <input type="text" id="nosiri" class="form-control"
                                                    onkeypress="return isNumberKey(event)" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="4"
                                                    oninput="setCustomValidity(''); invokeFunc(); valid_nosiri()"
                                                    placeholder="Nombor Siri" name="nosiri" value="{{ old('nombor_siri') }}">
                                                <p type="hidden" id="err_nosiri" style="color: red; display:none"><i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="lain_container" style="display:none">
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">Nombor
                                                Lesen</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_nl" class="form-control" required
                                                onkeypress="return isNumberKey(event)" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="12"
                                                oninput="setCustomValidity(''); invokeFunc2(); valid_nl()"
                                                placeholder="Nombor Lesen" name="e_nl" value="{{ old('nombor_lesen') }}">
                                            <p type="hidden" id="err_nl" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            @error('e_nl')
                                                <div class="col-12 alert alert-danger">
                                                    <strong>No. lesen sudah wujud!</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">Nama
                                                Premis</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_np" class="form-control" required style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                oninput="setCustomValidity(''); invokeFunc3(); valid_np(); this.value = this.value.toUpperCase()"
                                                placeholder="Nama Premis" name="e_np" value="{{ old('nama_premis') }}">
                                            <p type="hidden" id="err_np" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">Alamat
                                                Premis
                                                Berlesen</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 10px;">
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <input type="text" id="e_ap1" maxlength=60 class="form-control" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                    oninput="setCustomValidity(''); invokeFunc4(); valid_ap(); this.value = this.value.toUpperCase()"
                                                    placeholder="Alamat Premis 1" name="e_ap1" required
                                                    value="{{ old('alamat_premis_1') }}">
                                                <p type="hidden" id="err_ap" style="color: red; display:none"><i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px">
                                                {{-- <label for="inputcom" class="control-label col-form-label">Alamat Premis Berlesen</label> --}}
                                                <input type="text" id="e_ap2" maxlength=60 class="form-control" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                    oninput="setCustomValidity(''); invokeFunc5(); this.value = this.value.toUpperCase()"
                                                    placeholder="Alamat Premis 2" name="e_ap2"
                                                    value="{{ old('alamat_premis_1') }}">
                                            </div>
                                            <div class="form-group">
                                                {{-- <label for="inputcom" class="control-label col-form-label">Alamat Premis Berlesen</label> --}}
                                                <input type="text" id="e_ap3" class="form-control" maxlength="60"
                                                    oninvalid="setCustomValidity('Sila isi butiran ini')" style="text-transform:uppercase"
                                                    oninput="setCustomValidity(''); invokeFunc6(); this.value = this.value.toUpperCase()"
                                                    placeholder="Alamat Premis 3" name="e_ap3"
                                                    value="{{ old('alamat_premis_1') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">Alamat Surat
                                                Menyurat</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 10px;">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <input type="text" id="e_as1" class="form-control" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                    oninput="setCustomValidity(''); invokeFunc7(); valid_as(); this.value = this.value.toUpperCase()"
                                                    placeholder="Alamat Surat Menyurat 1" name="e_as1" required
                                                    value="{{ old('alamat_surat_1') }}">
                                                <p type="hidden" id="err_as" style="color: red; display:none"><i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                {{-- <label for="inputcom" class="control-label col-form-label">Alamat Surat Menyurat</label> --}}
                                                <input type="text" id="e_as2" class="form-control" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                    oninput="setCustomValidity(''); invokeFunc8(); this.value = this.value.toUpperCase()"
                                                    placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                                    value="{{ old('alamat_surat_1') }}">

                                            </div>

                                            <div class="form-group">
                                                {{-- <label for="inputcom" class="control-label col-form-label">Alamat Surat Menyurat</label> --}}
                                                <input type="text" id="e_as3" class="form-control" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                    oninput="setCustomValidity(''); invokeFunc9(); this.value = this.value.toUpperCase()"
                                                    placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                                    value="{{ old('alamat_surat_1') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">No. Telefon
                                                Kilang</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_notel" class="form-control" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="40"
                                                oninput="setCustomValidity(''); invokeFunc10(); valid_notel()"
                                                placeholder="No. Telefon Kilang" name="e_notel" required
                                                value="{{ old('no_tel_kilang') }}">
                                            <p type="hidden" id="err_notel" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label">No. Faks
                                                Kilang</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_nofax" class="form-control" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="40"
                                                oninput="setCustomValidity(''); invokeFunc11()" placeholder="No. Faks Kilang"
                                                name="e_nofax" value="{{ old('no_faks_kilang') }}">
                                        </div>
                                    </div>

                                    <div class="row ml-5">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">Alamat Emel
                                                Kilang</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_email" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="40"
                                                oninput="setCustomValidity(''); invokeFunc12(); valid_email(); ValidateEmail()"
                                                placeholder="ALAMAT EMEL KILANG" name="e_email" required
                                                value="{{ old('emel_kilang') }}">
                                            <p type="hidden" id="err_email" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                            <p type="hidden" id="err_email2" style="color: red; display:none"><i>Sila
                                                    masukkan
                                                    alamat emel yang betul!</i></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="" style="border-bottom-style: solid; width: 73%; padding: 15px;">
                                        Maklumat Pegawai dan Pengurus
                                    </p>
                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label ">Nama Pegawai
                                                Melapor</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_npg" class="form-control" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                oninput="setCustomValidity(''); invokeFunc13();
                                                // valid_npg();
                                                 this.value = this.value.toUpperCase()"
                                                placeholder="Nama Pegawai Melapor" name="e_npg"
                                                value="{{ old('nama_pegawai_lapor') }}">
                                            <p type="hidden" id="err_npg" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label">Jawatan
                                                Pegawai Melapor</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="e_jpg" style="margin-bottom: 10px;" style="text-transform:uppercase"
                                                class="form-control" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                maxlength="60" oninput="setCustomValidity(''); invokeFunc14();
                                                // valid_jpg();
                                                this.value = this.value.toUpperCase()"
                                                placeholder="JAWATAN PEGAWAI MELAPOR" name="e_jpg"
                                                value="{{ old('jawatan_pegawai_lapor') }}">
                                            <p type="hidden" id="err_jpg" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label ">No. Telefon
                                                Pegawai Melapor</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_notel_pg" class="form-control"
                                                placeholder="No. Telefon Pegawai Melapor" name='e_notel_pg' style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="40"
                                                oninput="setCustomValidity(''); invokeFunc15();
                                                // valid_notelpg()"
                                                value="{{ old('e_notel_pg') }}">
                                            <p type="hidden" id="err_notelpg" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label">Alamat Emel
                                                Pegawai Melapor</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_email_pg" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="40"
                                                oninput="setCustomValidity(''); invokeFunc16();
                                                // valid_emailpg()"
                                                placeholder="ALAMAT EMEL PEGAWAI MELAPOR" name="e_email_pg"
                                                value="{{ old('emel_pegawai') }}">
                                            <p type="hidden" id="err_emailpg" style="color: red; display:none"><i>Sila
                                                    isi butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label ">Nama
                                                Pegawai
                                                Bertanggungjawab</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_npgtg" class="form-control" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                oninput="setCustomValidity(''); invokeFunc17();
                                                // valid_npgtg();
                                                this.value = this.value.toUpperCase()"
                                                placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                                value="{{ old('nama_pegawai_jawab') }}">
                                            <p type="hidden" id="err_npgtg" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label">Jawatan
                                                Pegawai
                                                Bertanggungjawab</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_jpgtg" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" style="text-transform:uppercase"
                                                oninput="setCustomValidity(''); invokeFunc18();
                                                // valid_jpgtg();
                                                this.value = this.value.toUpperCase()" maxlength="60"
                                                placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                                value="{{ old('jawatan_pegawai_jawab') }}">
                                            <p type="hidden" id="err_jpgtg" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label">Alamat Emel
                                                Pengurus</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_email_pengurus" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="40"
                                                oninput="setCustomValidity(''); invokeFunc19();
                                                // valid_emailpengurus()"
                                                placeholder="ALAMAT EMEL PENGURUS" name="e_email_pengurus"
                                                value="{{ old('e_emel_pengurus') }}">
                                            <p type="hidden" id="err_emailpengurus" style="color: red; display:none"><i>Sila
                                                    isi butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>
                                    <p class="" style="border-bottom-style: solid; width: 73%; padding: 15px;">
                                        Lain - lain
                                    </p>
                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Negeri</label>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group" style="margin-bottom: 20px">
                                                <select class="form-control" id="negeri_id" name="e_negeri" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); invokeFunc20(); valid_negeri()"
                                                    onchange="ajax_daerah(this);ajax_kawasan(this)" required>
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p type="hidden" id="err_negeri" style="color: red; display:none"><i>Sila
                                                        buat pilihan di
                                                        bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Daerah</label>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group" style="margin-bottom: 20px">
                                                <select class="form-control" id="daerah_id" name='e_daerah' required
                                                    placeholder="Daerah" style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); invokeFunc21(); valid_daerah()">
                                                    <option selected hidden disabled value="">Sila Pilih Negeri Terlebih
                                                        Dahulu
                                                    </option>
                                                </select>
                                                <p type="hidden" id="err_daerah" style="color: red; display:none"><i>Sila
                                                        buat pilihan di
                                                        bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Kawasan</label>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group" style="margin-bottom: 20px;">
                                                <select class="form-control" id="kawasan_id" name='e_kawasan' required style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); invokeFunc22(); valid_kawasan()">
                                                    <option value="" selected hidden disabled>Sila Pilih
                                                        Daerah Terlebih Dahulu</option>
                                                </select>
                                                <p type="hidden" id="err_kawasan" style="color: red; display:none"><i>Sila
                                                        buat pilihan di
                                                        bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Syarikat Induk</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_syktinduk" class="form-control" required style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="60"
                                                oninput="setCustomValidity(''); invokeFunc23(); valid_syktinduk(); this.value = this.value.toUpperCase()"
                                                placeholder="Syarikat Induk" name="e_syktinduk">
                                            <p type="hidden" id="err_syktinduk" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Tahun Mula Beroperasi</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="e_year" class="form-control" required style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="4"
                                                oninput="setCustomValidity(''); invokeFunc24(); valid_year()"
                                                placeholder="Tahun Mula Beroperasi" name="e_year">
                                            <p type="hidden" id="err_year" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Kumpulan</label>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group" style="margin-bottom: 20px;">
                                                <select class="form-control" name="e_group" required id="e_group"  style="text-transform:uppercase"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity(''); invokeFunc25(); valid_kumpulan()">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    <option value="GOV">KERAJAAN</option>
                                                    <option value="IND">SWASTA</option>
                                                </select>
                                                <p type="hidden" id="err_group" style="color: red; display:none"><i>Sila
                                                    buat pilihan di
                                                    bahagian ini!</i></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div id="poma" style="display:none">
                                        <div class="row">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <label for="inputcom" class="control-label col-form-label required">
                                                    POMA</label>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="form-group" style="margin-bottom: 20px;">
                                                    <select class="form-control" name="e_poma" id="e_poma" style="text-transform:uppercase"
                                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                        oninput="setCustomValidity(''); invokeFunc26(); valid_poma()">
                                                        <option selected hidden value="">Sila Pilih</option>
                                                        <option value="poma">YA</option>
                                                        <option value="NULL">TIDAK</option>
                                                    </select>
                                                    <p type="hidden" id="err_poma" style="color: red; display:none"><i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="biogas" style="display:none">
                                        <div class="row">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <label for="inputcom" class="control-label col-form-label required">
                                                    Adakah terdapat kemudahan loji biogas di tapak kilang?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="form-group" style="margin-bottom: 20px;">
                                                    <select class="form-control" name="e_biogas" id="e_biogas" style="text-transform:uppercase"
                                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                        oninput="setCustomValidity(''); biogas()">
                                                        <option selected hidden value="">SILA PILIH</option>
                                                        <option value="1">YA</option>
                                                        <option value="2">TIDAK</option>
                                                    </select>
                                                    <p type="hidden" id="err_biogas" style="color: red; display:none"><i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="status_biogas" style="display:none">
                                        <div class="row">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <label for="inputcom" class="control-label col-form-label required">
                                                    Apakah status loji biogas tersebut?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="form-group" style="margin-bottom: 20px;">
                                                    <select class="form-control" name="e_status_biogas" id="e_status_biogas" style="text-transform:uppercase"
                                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                        oninput="setCustomValidity(''); ">
                                                        <option selected hidden value="">SILA PILIH</option>
                                                        <option value="3">TELAH SIAP</option>
                                                        <option value="2">DALAM PEMBINAAN</option>
                                                        <option value="1">DALAM PERANCANGAN</option>
                                                    </select>
                                                    <p type="hidden" id="err_biogas2" style="color: red; display:none"><i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i></p>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <label for="inputcom" class="control-label col-form-label">
                                                Kapasiti Pemprosesan / Tahun</label>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <input type="text" id="kap_proses" class="form-control" style="text-transform:uppercase"
                                                placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                onkeypress="return isNumberKey(event)"
                                                oninput="validate_two_decimal(this); setCustomValidity('');
                                                // valid_proses();
                                                FormatCurrency(this);"
                                              >
                                            <p type="hidden" id="err_proses" style="color: red; display:none"><i>Sila isi
                                                    butiran di
                                                    bahagian ini!</i></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row form-group justify-content-center"
                                    style="padding-top: 10px; text-align: center ">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary " id="checkBtn"
                                            onclick="check()">Tambah</button>
                                    </div>
                                </div>
                                {{-- <div class="row form-group" style="padding-top: 10px; ">
                                    <div class="text-right col-8 ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary ">Tambah</button>
                                    </div>
                                </div> --}}


                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu menambah pelesen ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1"
                                                    ata-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {{-- ajax daerah --}}
    <script>
        $('.sub-form').submit(function() {

            var x = $('#kap_proses').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_proses').val(x);


            return true;

        });
    </script>
    <script>
        function poma() {
            var buah = document.getElementById('e_kat');
            // console.log(buah.value == 'PL91');

            if (buah.value == 'PL91')
            {
                document.getElementById('poma').style.display = "block";
                document.getElementById('biogas').style.display = "block";

            } else {
                document.getElementById('poma').style.display = "none";
                document.getElementById('biogas').style.display = "none";

            }

        }
        </script>

    <script>
        function biogas() {
            var biogas = document.getElementById('e_biogas');

            if (biogas.value == '1')
            {
                document.getElementById('status_biogas').style.display = "block";

            } else {
                document.getElementById('status_biogas').style.display = "none";
                document.getElementById('e_status_biogas').value = null;


            }

        }
        </script>
    <script>
        function ajax_daerah(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_id").empty();
            //initialize selection
            $("#daerah_id").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-daerah/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#daerah_id").append('<option value="' + respond[x].kod_daerah + '">' +
                            respond[x]
                            .nama_daerah + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>
    <script>
        function ajax_kawasan(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#kawasan_id").empty();
            //initialize selection
            $("#kawasan_id").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-kawasan/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#kawasan_id").append('<option value="' + respond[x].kod_region + '">' +
                            respond[x]
                            .nama_region + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>

    {{-- remove leading zero --}}
    <script>
        $('input#kap_proses').keyup(function(e){
        if(this.value.substring(0,1) == "0")
        {
            this.value = this.value.replace(/^0+/g, '');
        }
    });
    </script>

    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("#message").removeAttr('value'); //tambah untuk remove flash message
            }, 5000); // 5 secs  (1 sec = 1000)
        });
    </script>

    {{-- <script type="text/javascript">
        function showDetail() {
            var cat = $('#e_kat').val();

            if (cat == "PL91") {
                document.getElementById('buah_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";
            } else {
                document.getElementById('buah_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }

            if (cat == "PL101") {
                document.getElementById('penapis_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";
            } else {
                document.getElementById('penapis_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }

        }
    </script> --}}
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
        function valid_kat() {

            if ($('#e_kat').val() == '') {
                $('#e_kat').css('border-color', 'red');
                document.getElementById('err_kat').style.display = "block";


            } else {
                $('#e_kat').css('border-color', '');
                document.getElementById('err_kat').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_status() {

            if ($('#e_status').val() == '') {
                $('#e_status').css('border-color', 'red');
                document.getElementById('err_status').style.display = "block";


            } else {
                $('#e_status').css('border-color', '');
                document.getElementById('err_status').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_stock() {

            if ($('#e_stock').val() == '') {
                $('#e_stock').css('border-color', 'red');
                document.getElementById('err_stock').style.display = "block";


            } else {
                $('#e_stock').css('border-color', '');
                document.getElementById('err_stock').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_dir() {

            if ($('#directory').val() == '') {
                $('#directory').css('border-color', 'red');
                document.getElementById('err_dir').style.display = "block";


            } else {
                $('#directory').css('border-color', '');
                document.getElementById('err_dir').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_kodpgw() {

            if ($('#kodpgw').val() == '') {
                $('#kodpgw').css('border-color', 'red');
                document.getElementById('err_kodpgw').style.display = "block";


            } else {
                $('#kodpgw').css('border-color', '');
                document.getElementById('err_kodpgw').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_nosiri() {

            if ($('#nosiri').val() == '') {
                $('#nosiri').css('border-color', 'red');
                document.getElementById('err_nosiri').style.display = "block";


            } else {
                $('#nosiri').css('border-color', '');
                document.getElementById('err_nosiri').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_nl() {

            if ($('#e_nl').val() == '') {
                $('#e_nl').css('border-color', 'red');
                document.getElementById('err_nl').style.display = "block";


            } else {
                $('#e_nl').css('border-color', '');
                document.getElementById('err_nl').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_np() {

            if ($('#e_np').val() == '') {
                $('#e_np').css('border-color', 'red');
                document.getElementById('err_np').style.display = "block";


            } else {
                $('#e_np').css('border-color', '');
                document.getElementById('err_np').style.display = "none";

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
                $('#e_email_pengurus').css('border-color', '');
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
        function valid_negeri() {

            if ($('#negeri_id').val() == '') {
                $('#negeri_id').css('border-color', 'red');
                document.getElementById('err_negeri').style.display = "block";


            } else {
                $('#negeri_id').css('border-color', '');
                document.getElementById('err_negeri').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_daerah() {

            if ($('#daerah_id').val() == '') {
                $('#daerah_id').css('border-color', 'red');
                document.getElementById('err_daerah').style.display = "block";


            } else {
                $('#daerah_id').css('border-color', '');
                document.getElementById('err_daerah').style.display = "none";

            }

        }
    </script>
    <script>
        function valid_kawasan() {

            if ($('#kawasan_id').val() == '') {
                $('#kawasan_id').css('border-color', 'red');
                document.getElementById('err_kawasan').style.display = "block";


            } else {
                $('#kawasan_id').css('border-color', '');
                document.getElementById('err_kawasan').style.display = "none";

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
        function valid_year() {

            if ($('#e_year').val() == '') {
                $('#e_year').css('border-color', 'red');
                document.getElementById('err_year').style.display = "block";


            } else {
                $('#e_year').css('border-color', '');
                document.getElementById('err_year').style.display = "none";

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

    <script>
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // kap proses
            field = document.getElementById("e_kat");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_kat').css('border-color', 'red');
                document.getElementById('err_kat').style.display = "block";
            }

            // kap proses
            field = document.getElementById("e_status");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_status').css('border-color', 'red');
                document.getElementById('err_status').style.display = "block";
            }

            // kap proses
            field = document.getElementById("e_stock");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_stock').css('border-color', 'red');
                document.getElementById('err_stock').style.display = "block";
            }

            // kap proses
            field = document.getElementById("directory");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#directory').css('border-color', 'red');
                document.getElementById('err_dir').style.display = "block";
            }

            var e_kat = $('#e_kat').val();

            if (e_kat != "PLBIO") {
                // kap proses
                field = document.getElementById("kodpgw");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                    $('#kodpgw').css('border-color', 'red');
                    document.getElementById('err_kodpgw').style.display = "block";
                }

                // kap proses
                field = document.getElementById("nosiri");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters\r\n";
                    $('#nosiri').css('border-color', 'red');
                    document.getElementById('err_nosiri').style.display = "block";
                }
            }
            // kap proses
            field = document.getElementById("e_nl");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_nl').css('border-color', 'red');
                document.getElementById('err_nl').style.display = "block";
            }

            // kap proses
            field = document.getElementById("e_np");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_np').css('border-color', 'red');
                document.getElementById('err_np').style.display = "block";
            }

            // kap proses
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
            } else if (!field.value.match(mailformat)) {
                error += "Name must be 2-4 characters\r\n";
                // alert("You have entered an invalid email address!");
                $('#e_email').css('border-color', 'red');
                document.getElementById('err_email2').style.display = "block";
                console.log('error');
            }

            // nama pegawai melapor
            // field = document.getElementById("e_npg");
            // if (!field.checkValidity()) {
            //     error += "Name must be 2-4 characters\r\n";
            //     $('#e_npg').css('border-color', 'red');
            //     document.getElementById('err_npg').style.display = "block";
            // }

            // jawatan pegawai melapor
            // field = document.getElementById("e_jpg");
            // if (!field.checkValidity()) {
            //     error += "Name must be 2-4 characters\r\n";
            //     $('#e_jpg').css('border-color', 'red');
            //     document.getElementById('err_jpg').style.display = "block";
            // }

            // no tel pegawai melapor
            // field = document.getElementById("e_email_pg");
            // if (!field.checkValidity()) {
            //     error += "Name must be 2-4 characters\r\n";
            //     $('#e_email_pg').css('border-color', 'red');
            //     document.getElementById('err_emailpg').style.display = "block";
            // }
            // emel pegawai melapor
            field = document.getElementById("e_notel_pg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_notel_pg').css('border-color', 'red');
                document.getElementById('err_notelpg').style.display = "block";
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

            // emel pengurus
            field = document.getElementById("negeri_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#negeri_id').css('border-color', 'red');
                document.getElementById('err_negeri').style.display = "block";
            }

            // emel pengurus
            field = document.getElementById("daerah_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#daerah_id').css('border-color', 'red');
                document.getElementById('err_daerah').style.display = "block";
            }

            // emel pengurus
            field = document.getElementById("kawasan_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#kawasan_id').css('border-color', 'red');
                document.getElementById('err_kawasan').style.display = "block";
            }

            // syarikat induk
            field = document.getElementById("e_syktinduk");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_syktinduk').css('border-color', 'red');
                document.getElementById('err_syktinduk').style.display = "block";
            }

            // syarikat induk
            field = document.getElementById("e_year");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_year').css('border-color', 'red');
                document.getElementById('err_year').style.display = "block";
            }

            // kumpulan
            field = document.getElementById("e_group");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_group').css('border-color', 'red');
                document.getElementById('err_group').style.display = "block";
            }

            // POMA
            var buah = document.getElementById('e_kat');
            if (buah.value == 'PL91') {
                     field = document.getElementById("e_poma");
                        if (!field.checkValidity()) {
                            error += "Name must be 2-4 characters\r\n";
                            $('#e_poma').css('border-color', 'red');
                            document.getElementById('err_poma').style.display = "block";
                        }
            }



                // POMA
                // field = document.getElementById("e_poma");
                // if (!field.checkValidity()) {
                // error += "Name must be 2-4 characters\r\n";
                // }

                // (B4) RESULT
                if (error == "") {
                    $('#myModal').modal('show');
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

    {{-- toaster --}}
    <script src="{{ asset('theme/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('theme/extra-libs/toastr/toastr-init.js') }}"></script>


    <script>
        function invokeFunc() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e_nl').focus();
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
                    document.getElementById('e_np').focus();
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
                    document.getElementById('e_ap1').focus();
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
        function invokeFunc5() {
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
        function invokeFunc6() {
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
        function invokeFunc7() {
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
        function invokeFunc8() {
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
        function invokeFunc9() {
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
        function invokeFunc10() {
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
        function invokeFunc11() {
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
        function invokeFunc12() {
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
        function invokeFunc13() {
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
        function invokeFunc14() {
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
        function invokeFunc15() {
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
        function invokeFunc16() {
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
        function invokeFunc17() {
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
        function invokeFunc18() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('negeri_id').focus();
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
                    document.getElementById('daerah_id').focus();
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
                    document.getElementById('kawasan_id').focus();
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
        function invokeFunc22() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e_year').focus();
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
        function invokeFunc24() {
            addEventListener('keydown', function(evt) {
                var whichKey = checkKey(evt);
                if (whichKey == 13) {
                    console.log('successful');
                    evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                    document.getElementById('e_poma').focus();
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
                    document.getElementById('kap_proses').focus();
                }

            });
        }

        function checkKey(evt) {
            console.log(evt.which);
            return evt.which;
        }
    </script>

    <script type="text/javascript">
        function showDetail() {
            var e_kat = $('#e_kat').val();

            if (e_kat == "PLBIO") {
                document.getElementById('nonbio_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";


            } else {
                document.getElementById('nonbio_container').style.display = "block";
                document.getElementById('lain_container').style.display = "none";

                // document.getElementById('isaw').style.display = "none";

            }
        }
    </script>

    <script type="text/javascript">
        function showDetailkodpgw() {
            var e_kat = document.getElementById('e_kat');

            if (e_kat.value == 'PL101') {


                document.getElementById('101_container').style.display = "block";
                $('#kodpgw').attr('name','kodpgw');

                document.getElementById('102_container').style.display = "none";
                // $('#102_container').attr('name','kodpgw');
                document.getElementById('104_container').style.display = "none";
                // $('#104_container').removeAttr('name');
                document.getElementById('07_container').style.display = "none";
                // $('#07_container').removeAttr('name');
                document.getElementById('91_container').style.display = "none";
                // $('#91_container').removeAttr('name');

            }
            else if (e_kat.value == 'PL104') {
                document.getElementById('104_container').style.display = "block";
                $('#kodpgw2').attr('name','kodpgw');
                document.getElementById('102_container').style.display = "none";
                // $('#12_container').removeAttr('name');
                document.getElementById('101_container').style.display = "none";
                // $('#101_container').removeAttr('name');
                document.getElementById('07_container').style.display = "none";
                // $('#07_container').removeAttr('name');
                document.getElementById('91_container').style.display = "none";
                // $('#91_container').removeAttr('name');

            }
            else if (e_kat.value == 'PL111') {
                document.getElementById('07_container').style.display = "block";
                $('#kodpgw3').attr('name','kodpgw');
                document.getElementById('102_container').style.display = "none";
                // $('#12_container').removeAttr('kodpgw');
                document.getElementById('104_container').style.display = "none";
                // $('#104_container').removeAttr('kodpgw');
                document.getElementById('101_container').style.display = "none";
                // $('#101_container').removeAttr('kodpgw');
                document.getElementById('91_container').style.display = "none";
                // $('#91_container').removeAttr('kodpgw');

            }
            else if (e_kat.value == 'PL102') {
                document.getElementById('102_container').style.display = "block";
                $('#kodpgw4').attr('name','kodpgw');
                document.getElementById('07_container').style.display = "none";
                // $('#07_container').removeAttr('kodpgw');
                document.getElementById('104_container').style.display = "none";
                // $('#104_container').removeAttr('kodpgw');
                document.getElementById('101_container').style.display = "none";
                // $('#101_container').removeAttr('kodpgw');
                document.getElementById('91_container').style.display = "none";
                // $('#91_container').removeAttr('kodpgw');

            }
            else {
                document.getElementById('91_container').style.display = "block";
                $('#kodpgw5').attr('name','kodpgw');
                document.getElementById('102_container').style.display = "none";
                // $('#12_container').removeAttr('kodpgw');
                document.getElementById('101_container').style.display = "none";
                // $('#101_container').removeAttr('kodpgw');
                document.getElementById('104_container').style.display = "none";
                // $('#104_container').removeAttr('kodpgw');
                document.getElementById('07_container').style.display = "none";
                // $('#07_container').removeAttr('kodpgw');

                // document.getElementById('isaw').style.display = "none";

            }
        }
    </script>

@endsection
